<?php

use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

const MAIL_FROM = MAIL_FROM_ENV;
const MAIL_FROM_NAME = MAIL_FROM_NAME_ENV;
const MAIL_TO = MAIL_TO_ENV;

const SMTP_HOST = SMTP_HOST_ENV;
const SMTP_USER = SMTP_USER_ENV;
const SMTP_PASS = SMTP_PASS_ENV;
const SMTP_PORT = SMTP_PORT_ENV;
// Optionaler Fallback für Secure-Methode
$secureMode = strtolower($_ENV['SMTP_SECURE'] ?? 'tls');
$secureConstant = match ($secureMode) {
    'tls' => PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS,
    'ssl' => PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS,
    default => PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS,
};
const SMTP_SECURE = $secureConstant;

// Optional: strenger Modus für HTML-zu-Text
const STRIP_TAGS_ALLOWED = '<br><p><strong><em><ul><ol><li>'; // falls HTML erlaubt sein soll