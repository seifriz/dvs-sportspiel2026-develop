<?php
// Sicherheits-Hinweis: Diese Datei nicht ins Repo committen.
// Für echte Deployments lieber Umgebungsvariablen oder eine .env-Lösung verwenden.


// Absenderadresse deines Servers (nicht die Nutzeradresse!)
const MAIL_FROM = 'no-reply@deine-domain.tld';
const MAIL_FROM_NAME = 'Kontaktformular';


// Empfängeradresse(n) – z.B. dein Postfach
const MAIL_TO = 'ich@deine-domain.tld';


// SMTP Konfiguration
const SMTP_HOST = 'smtp.dein-mailprovider.tld';
const SMTP_USER = 'smtp-user';
const SMTP_PASS = 'smtp-passwort';
const SMTP_PORT = 587; // 587 (TLS) oder 465 (SMTPS)
const SMTP_SECURE = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; // oder ::ENCRYPTION_SMTPS


// Optional: strenger Modus für HTML-zu-Text
const STRIP_TAGS_ALLOWED = '<br><p><strong><em><ul><ol><li>'; // falls HTML erlaubt sein soll