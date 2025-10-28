<?php

include('functions.php');
require_once __DIR__ . '/../includes/env-loader.php';
include('../clases/app.php');
include('../clases/AntiSpam.php');

// Inicializar Anti-SPAM
$antiSpam = new AntiSpam();
$userIP = AntiSpam::getUserIP();
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

// ============================================
// 1. VERIFICAR SI LA IP ESTÁ BLOQUEADA
// ============================================
if ($blockReason = $antiSpam->isIPBlocked($userIP)) {
  error_log("Blocked IP attempted submission: $userIP");
  exit('Your IP has been temporarily blocked due to suspicious activity. Please try again later.');
}

// ============================================
// 2. VERIFICAR HONEYPOT
// ============================================
if ($honeypotError = $antiSpam->checkHoneypot($_POST['website'] ?? '')) {
  $antiSpam->logSpamAttempt($userIP, $_POST['email'] ?? '', 'Honeypot triggered');
  $antiSpam->blockIP($userIP, 'Bot detected (honeypot)', 48);
  exit('Error submitting the form, please try again');
}

// ============================================
// 3. VERIFICAR TIMESTAMP
// ============================================
if ($timestampError = $antiSpam->checkFormTimestamp($_POST['form_timestamp'] ?? '')) {
  $errors['error_timestamp'] = $timestampError;
  $antiSpam->logSpamAttempt($userIP, $_POST['email'] ?? '', 'Invalid timestamp', [
    'timestamp' => $_POST['form_timestamp'] ?? 'missing'
  ]);
}

// ============================================
// 4. VERIFICAR reCAPTCHA
// ============================================
$token = $_POST['token'] ?? '';
$action = $_POST['action'] ?? '';

if (empty($token)) {
  $errors['error_recaptcha'] = 'reCAPTCHA verification failed.';
  $antiSpam->logSpamAttempt($userIP, $_POST['email'] ?? '', 'Missing reCAPTCHA token');
} else {
  $cu = curl_init();
  curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
  curl_setopt($cu, CURLOPT_POST, 1);
  curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query([
    'secret' => RECAPTCHA_KEY_SECRET,
    'response' => $token
  ]));
  curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($cu);
  curl_close($cu);

  $datos = json_decode($response, true);

  $score = $datos['score'] ?? 0;
  error_log("reCAPTCHA Score: $score | IP: $userIP | Email: " . ($_POST['email'] ?? 'N/A'));

  if (!$datos['success'] || $score < SPAM_RECAPTCHA_MIN_SCORE) {
    $errors['error_recaptcha'] = 'Security verification failed. Please try again.';
    $antiSpam->logSpamAttempt($userIP, $_POST['email'] ?? '', "reCAPTCHA failed (score: $score)", [
      'score' => $score,
      'success' => $datos['success'] ?? false
    ]);

    // Bloquear si el score es muy bajo
    if (($datos['score'] ?? 0) < 0.4) {
      $antiSpam->blockIP($userIP, 'Very low reCAPTCHA score', 12);
    }
  }
}

// ============================================
// 5. VALIDACIÓN DE CAMPOS
// ============================================
if (emptyInput($_POST['name'])) {
  $errors['error_name'] = 'Please enter your name.';
} else {
  $name = trim($_POST['name']);

  // Verificar patrones sospechosos en el nombre
  if ($nameError = $antiSpam->checkSuspiciousName($name)) {
    $errors['error_name'] = $nameError;
    $antiSpam->logSpamAttempt($userIP, $_POST['email'] ?? '', 'Suspicious name', ['name' => $name]);
  }
}

if (!emailCheck($_POST['email'])) {
  $errors['error_email'] = 'Please enter a valid email.';
} else {
  $email = trim($_POST['email']);

  // Verificar emails temporales
  if ($disposableError = $antiSpam->checkDisposableEmail($email)) {
    $errors['error_email'] = $disposableError;
    $antiSpam->logSpamAttempt($userIP, $email, 'Disposable email detected');
  }
}

if (emptyInput($_POST['comments'])) {
  $errors['error_comments'] = 'Please enter your comments.';
} else {
  $comments = trim($_POST['comments']);

  // Verificar longitud
  if ($lengthError = $antiSpam->checkMessageLength($comments)) {
    $errors['error_comments'] = $lengthError;
  }

  // Verificar palabras prohibidas
  if ($spamError = $antiSpam->checkSpamWords($comments)) {
    $errors['error_comments'] = $spamError;
    $antiSpam->logSpamAttempt($userIP, $email ?? '', 'Spam words detected', [
      'message_preview' => substr($comments, 0, 100)
    ]);
  }

  // Verificar URLs excesivas
  if ($urlError = $antiSpam->checkExcessiveUrls($comments)) {
    $errors['error_comments'] = $urlError;
    $antiSpam->logSpamAttempt($userIP, $email ?? '', 'Excessive URLs', [
      'message_preview' => substr($comments, 0, 100)
    ]);
  }
}

$phone = trim($_POST['phone'] ?? '');

// ============================================
// 6. VERIFICAR RATE LIMITING
// ============================================
if (!isset($errors)) {
  $rateLimitResult = $antiSpam->checkRateLimit($userIP, $email ?? null);
  if ($rateLimitResult !== true) {
    $errors = ['error_rate_limit' => implode(' ', $rateLimitResult)];
    $antiSpam->logSpamAttempt($userIP, $email ?? '', 'Rate limit exceeded');
  }
}

// ============================================
// 7. PROCESAR SI NO HAY ERRORES
// ============================================
if (!isset($errors)) {
  // Enviar los emails
  $app = new App;
  $sendClient = $app->sendContact($_POST);

  if ($sendClient) {
    // Registrar el envío exitoso CON el score de reCAPTCHA
    $recaptchaScore = isset($datos['score']) ? $datos['score'] : null;
    $antiSpam->logSubmission($userIP, $email, $userAgent, $recaptchaScore);

    $msg_contacto = 'Message received. We will answer you shortly. Thanks a lot!';
    $url = explode("?", $_SERVER['HTTP_REFERER']);
    header("Location: " . $url[0] . "?msg_contacto=" . urlencode($msg_contacto) . "#msg_contacto");
    exit;
  } else {
    error_log("Failed to send email: IP=$userIP, Email=$email");
    exit('Error sending email. Please try again later.');
  }
} else {
  // Redirigir con errores
  $url = explode("?", $_SERVER['HTTP_REFERER']);
  $name = $name ?? '';
  $email = $email ?? '';
  header("Location: " . $url[0] . "?name=$name&email=$email&phone=$phone&comments=$comments&errors=" . urlencode(serialize($errors)) . "#error");
  exit;
}
