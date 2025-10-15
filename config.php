<?php

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Kleiner Helper: liest aus $_ENV / $_SERVER / getenv()
function envv(string $key, $default = null) {
    return $_ENV[$key] ?? $_SERVER[$key] ?? (getenv($key) !== false ? getenv($key) : $default);
}

define('APP_ENV', $_ENV['APP_ENV'] ?? 'production');

define('MAIL_FROM',      $_ENV['MAIL_FROM']      ?? '');
define('MAIL_FROM_NAME', $_ENV['MAIL_FROM_NAME'] ?? 'Kontaktformular');
define('MAIL_TO',        $_ENV['MAIL_TO']        ?? '');

define('SMTP_HOST', $_ENV['SMTP_HOST'] ?? '');
define('SMTP_USER', $_ENV['SMTP_USER'] ?? '');
define('SMTP_PASS', $_ENV['SMTP_PASS'] ?? '');
define('SMTP_PORT', (int)($_ENV['SMTP_PORT'] ?? 587));

$sec = strtolower((string)envv('SMTP_SECURE','tls'));
define('SMTP_SECURE', $sec === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS);
