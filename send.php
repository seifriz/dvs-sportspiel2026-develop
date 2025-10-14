<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';


session_start();
header('Content-Type: application/json; charset=utf-8');


function jsonOut($ok, $msg, $extra = []) {
echo json_encode(array_merge(['success' => $ok, 'message' => $msg], $extra));
exit;
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
jsonOut(false, 'Ungültige Anfragemethode.');
}


// Honeypot: wenn ausgefüllt → Bot
if (!empty($_POST['company'] ?? '')) {
jsonOut(true, 'Danke!'); // still und leise erfolgreich vortäuschen
}


// CSRF-Check
if (empty($_POST['csrf_token']) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
jsonOut(false, 'Sicherheitsüberprüfung fehlgeschlagen (CSRF).');
}


// Eingaben einsammeln & validieren
$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$subject = trim((string)($_POST['subject'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));


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


// Optional: einfache Sanitization
$subjectSafe = htmlspecialchars($subject, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$messageSafe = nl2br(htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));


try {
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
$mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
$mail->addAddress(MAIL_TO);
// WICHTIG: Nutzer-Mail NICHT als setFrom nutzen, sonst SPF/DMARC‑Probleme
$mail->addReplyTo($email, $name);


// Inhalt
$mail->Subject = $subjectSafe;


$htmlBody = "<p><strong>Neue Kontaktanfrage</strong></p>"
. "<p><strong>Name:</strong> " . htmlspecialchars($name, ENT_QUOTES) . "<br>"
. "<strong>E‑Mail:</strong> " . htmlspecialchars($email, ENT_QUOTES) . "</p>"
. "<hr>"
. "<p>" . $messageSafe . "</p>";


$plainBody = "Neue Kontaktanfrage\n\n"
. "Name: {$name}\n"
. "E‑Mail: {$email}\n\n"
. "Nachricht:\n{$message}\n";


$mail->isHTML(true);
$mail->Body = $htmlBody;
$mail->AltBody = $plainBody;


$mail->send();


// CSRF-Token erneuern (One‑Time Token)
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));


jsonOut(true, 'Vielen Dank! Deine Nachricht wurde versendet.');
} catch (Exception $e) {
// Für Logging: $e->getMessage() NICHT im Frontend anzeigen
jsonOut(false, 'Versand leider fehlgeschlagen. Bitte später erneut versuchen.');
}