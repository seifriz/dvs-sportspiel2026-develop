<?php
require __DIR__ . '/config.php';

echo "ROOT = " . realpath(__DIR__ . '/..') . PHP_EOL;
echo "VENDOR = " . realpath(__DIR__ . '/../vendor') . PHP_EOL;
echo "ENV: MAIL_FROM = " . MAIL_FROM . PHP_EOL;
