<?php
require __DIR__.'/../vendor/autoload.php';
Dotenv\Dotenv::createImmutable(__DIR__.'/..')->load();

$keys = ['APP_ENV','MAIL_FROM','MAIL_TO','SMTP_HOST','SMTP_USER','SMTP_PORT','SMTP_SECURE'];
header('Content-Type: text/plain; charset=utf-8');
foreach ($keys as $k) {
  $v = $_ENV[$k] ?? '(leer)';
  if ($k === 'SMTP_USER') { // minimal maskieren
    $v = substr($v,0,2).'…';
  }
  echo str_pad($k,12).": ".$v.PHP_EOL;
}
