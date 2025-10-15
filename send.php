<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// DEBUG
use PHPMailer\PHPMailer\SMTP;
//DEBUG

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/config.php';

// Startet Session für CSRF
session_start();

// Response-Header: JSON (Client erwartet JSON)
header('Content-Type: application/json; charset=utf-8');

// Response-Helfer:
// - Einheitlicher Rückgabekanal: Immer { success: bool, message: string, .. }.
function jsonOut($ok, $msg, $extra = [])
{
    echo json_encode(array_merge(['success' => $ok, 'message' => $msg], $extra));
    exit;
}

// Methoden-Check:
// - Verhindert GET/HEAD/etc. – nur POST ist erlaubt.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonOut(false, 'Ungültige Anfragemethode.');
}

// Honeypot:
// Spart dir Captchas bei einfachen Bots, ohne UX zu verschlechtern.
// - Botbremse, wenn ausgefüllt → Bot
// - Feld "company" ist im Formular versteckt. Menschen lassen es leer.
if (!empty($_POST['company'] ?? '')) {
    jsonOut(true, 'Danke!'); // still und leise erfolgreich vortäuschen
}

// CSRF-Check:
// Verhindert Fremdseiten, die „in deinem Namen“ Formulare abschicken.
// - Token, das in index.php in die Session gelegt wurde, muss exakt passen.
// - hash_equals verhindert Timing-Angriffe.
// - Schützt gegen „Cross-Site Request Forgery“.
if (empty($_POST['csrf_token']) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    jsonOut(false, 'Sicherheitsüberprüfung fehlgeschlagen (CSRF).');
}

// Eingaben einsammeln:
// - trim
// - Typ-Cast-Reduzierung
$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$subject = trim((string)($_POST['subject'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

// Server-Validierung:
// - Serverseitig ist entscheidend (Client-Checks kann man umgehen)
// - Die Plausible Grenzen verhindern Missbrauch und Speicher-/Mail-Probleme
if (mb_strlen($name) < 2 || mb_strlen($name) > 80) {
    jsonOut(false, 'Bitte einen gültigen Namen angeben.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonOut(false, 'Bitte eine gültige E‑Mail-Adresse angeben.');
}
if ($subject === '' || mb_strlen($subject) > 120) {
    jsonOut(false, 'Bitte einen Betreff angeben (max. 120 Zeichen).');
}
if (mb_strlen($message) < 10 || mb_strlen($message) > 3000) {
    jsonOut(false, 'Bitte eine Nachricht mit 10–3000 Zeichen schreiben.');
}

// Sanitization für Mailinhalte (Optional)
// - Wandelt Benutzereingaben in harmlosen Text (kein HTML/JS in der Mail)
// - Formatiert Zeilenumbrüche für die HTML-Version (nl2br)
$subjectSafe = htmlspecialchars($subject, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$messageSafe = nl2br(htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));

try {
// PHPMailer konfigurieren
    $mail = new PHPMailer(true);

// SMTP
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USER;
    $mail->Password = SMTP_PASS;
    $mail->Port = SMTP_PORT;
    $mail->SMTPSecure = SMTP_SECURE;

// Absender & Empfänger
// From: Immer deine Domainadresse (passend zu SPF/DMARC).
// WICHTIG: Nutzer-Mail NICHT als setFrom nutzen, sonst SPF/DMARC‑Probleme
    $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
    $mail->addAddress(MAIL_TO);
// Reply-To: Setzt die Antwortadresse auf die Nutzeradresse – richtige Art, damit „Antworten“ beim Nutzer landen.
    $mail->addReplyTo($email, $name);

// Inhalt (HTML & Plain)
    $mail->Subject = $subjectSafe;

    $htmlBody = "<p><strong>Name:</strong> " . htmlspecialchars($name, ENT_QUOTES) . "<br>"
        . "<strong>Mail:</strong> " . htmlspecialchars($email, ENT_QUOTES) . "</p>"
        . "<hr>"
        . "<p>" . $messageSafe . "</p>";

    $plainBody = "Name: {$name}\n"
        . "E‑Mail: {$email}\n\n"
        . "Nachricht:\n{$message}\n";

    $mail->isHTML(true);
    $mail->Body = $htmlBody;
    $mail->AltBody = $plainBody;

// Senden
    $mail->send();

// CSRF-Token erneuern (One‑Time Token)
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// JSON-Erfolgsmeldung für das Frontend
    jsonOut(true, 'Vielen Dank! Deine Nachricht wurde versendet.');

} catch (Exception $e) {
// Für Logging: $e->getMessage() NICHT im Frontend anzeigen
    jsonOut(false, 'Versand leider fehlgeschlagen. Bitte später erneut versuchen.');
}
