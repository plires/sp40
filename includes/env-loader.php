<?php
// includes/env-loader.php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Definir constantes desde variables de entorno
define('BASE', $_ENV['BASE_URL']);
define('ENVIRONMENT', $_ENV['ENVIRONMENT']);

// Social Media
define('RRSS_FACEBOOK', $_ENV['RRSS_FACEBOOK']);
define('RRSS_INSTAGRAM', $_ENV['RRSS_INSTAGRAM']);
define('RRSS_LINKEDIN', $_ENV['RRSS_LINKEDIN']);
define('RRSS_YOUTUBE', $_ENV['RRSS_YOUTUBE']);

// ReCAPTCHA
define('RECAPTCHA_KEY_SITE', $_ENV['RECAPTCHA_KEY_SITE']);
define('RECAPTCHA_KEY_SECRET', $_ENV['RECAPTCHA_KEY_SECRET']);

// Email Configuration
define('SMTP', $_ENV['SMTP_HOST']);
define('USERNAME', $_ENV['SMTP_USERNAME']);
define('PASSWORD', $_ENV['SMTP_PASSWORD']);
define('EMAIL_PORT', $_ENV['SMTP_PORT']);

define('EMAIL_CLIENT', $_ENV['EMAIL_CLIENT']);
define('NAME_CLIENT', $_ENV['NAME_CLIENT']);
define('EMAIL_CHARSET', $_ENV['EMAIL_CHARSET']);

// Convertir string CSV a array para EMAIL_CC
$emailCcString = $_ENV['EMAIL_CC'] ?? '';
define('EMAIL_CC', !empty($emailCcString) ? explode(',', $emailCcString) : []);

// Constantes adicionales (no sensibles)
define('URI', $_SERVER['REQUEST_URI']);
define('EMAIL_BCC', '');
define('EMAIL_SUBJECT', 'Gracias por tu contacto');
define('EMAIL_ENCODING', 'quoted printable');
