<?php

class AntiSpam
{
  private $logDir;
  private $submissionsFile;
  private $blockedIPsFile;

  public function __construct()
  {
    $this->logDir = SPAM_LOG_DIR;
    $this->submissionsFile = $this->logDir . '/submissions.json';
    $this->blockedIPsFile = $this->logDir . '/blocked_ips.json';

    // Crear directorio si no existe
    if (!file_exists($this->logDir)) {
      mkdir($this->logDir, 0755, true);
    }

    // Crear archivos si no existen
    if (!file_exists($this->submissionsFile)) {
      file_put_contents($this->submissionsFile, json_encode([]));
    }
    if (!file_exists($this->blockedIPsFile)) {
      file_put_contents($this->blockedIPsFile, json_encode([]));
    }

    // Limpiar logs antiguos (ejecutar ocasionalmente)
    if (rand(1, 100) <= 5) { // 5% de probabilidad
      $this->cleanOldLogs();
    }
  }

  /**
   * Verifica si la IP está bloqueada permanentemente
   */
  public function isIPBlocked($ip)
  {
    $blocked = $this->readJSON($this->blockedIPsFile);

    if (isset($blocked[$ip])) {
      $blockedUntil = $blocked[$ip]['until'];

      // Si el bloqueo expiró, desbloquear
      if (time() > $blockedUntil) {
        unset($blocked[$ip]);
        $this->writeJSON($this->blockedIPsFile, $blocked);
        return false;
      }

      return $blocked[$ip]['reason'] ?? 'IP blocked';
    }

    return false;
  }

  /**
   * Bloquea una IP temporalmente
   */
  public function blockIP($ip, $reason = 'Too many submissions', $hours = 24)
  {
    $blocked = $this->readJSON($this->blockedIPsFile);

    $blocked[$ip] = [
      'reason' => $reason,
      'until' => time() + ($hours * 3600),
      'blocked_at' => date('Y-m-d H:i:s')
    ];

    $this->writeJSON($this->blockedIPsFile, $blocked);
    error_log("BLOCKED IP: $ip - Reason: $reason");
  }

  /**
   * Verifica rate limiting por IP y email
   */
  public function checkRateLimit($ip, $email = null)
  {
    // Verificar si la IP está bloqueada
    if ($blockReason = $this->isIPBlocked($ip)) {
      return [$blockReason];
    }

    $submissions = $this->readJSON($this->submissionsFile);
    $now = time();
    $errors = [];

    // Filtrar envíos de esta IP
    $ipSubmissions = array_filter($submissions, function ($sub) use ($ip) {
      return $sub['ip'] === $ip;
    });

    // Contar envíos por hora
    $hourlyCount = 0;
    $dailyCount = 0;

    foreach ($ipSubmissions as $sub) {
      $age = $now - $sub['timestamp'];

      if ($age < 3600) { // Última hora
        $hourlyCount++;
      }
      if ($age < 86400) { // Últimas 24 horas
        $dailyCount++;
      }
    }

    // Verificar límites
    if ($hourlyCount >= SPAM_MAX_SUBMISSIONS_PER_HOUR) {
      $errors[] = 'Too many submissions from your IP. Please try again later.';

      // Si excede mucho, bloquear temporalmente
      if ($hourlyCount >= SPAM_MAX_SUBMISSIONS_PER_HOUR * 2) {
        $this->blockIP($ip, 'Excessive submissions', 2);
      }
    }

    if ($dailyCount >= SPAM_MAX_SUBMISSIONS_PER_DAY) {
      $errors[] = 'Daily submission limit reached. Please try again tomorrow.';
    }

    // Verificar límite por email si se proporciona
    if ($email) {
      $emailSubmissions = array_filter($submissions, function ($sub) use ($email) {
        return isset($sub['email']) && $sub['email'] === $email;
      });

      $emailHourlyCount = 0;
      foreach ($emailSubmissions as $sub) {
        if (($now - $sub['timestamp']) < 3600) {
          $emailHourlyCount++;
        }
      }

      if ($emailHourlyCount >= 2) {
        $errors[] = 'Too many submissions from this email address.';
      }
    }

    return empty($errors) ? true : $errors;
  }

  /**
   * Registra un envío exitoso
   */
  public function logSubmission($ip, $email, $userAgent, $recaptchaScore = null)
  {
    $submissions = $this->readJSON($this->submissionsFile);

    // Agregar nuevo envío
    $submissions[] = [
      'ip' => $ip,
      'email' => $email,
      'timestamp' => time(),
      'datetime' => date('Y-m-d H:i:s'),
      'user_agent' => substr($userAgent, 0, 200),
      'recaptcha_score' => $recaptchaScore  // NUEVO: guardar score
    ];

    // Mantener solo los últimos 1000 registros
    if (count($submissions) > 1000) {
      $submissions = array_slice($submissions, -1000);
    }

    $this->writeJSON($this->submissionsFile, $submissions);
  }

  /**
   * Registra un intento de SPAM
   */
  public function logSpamAttempt($ip, $email, $reason, $data = [])
  {
    $spamFile = $this->logDir . '/spam_attempts.json';
    $attempts = $this->readJSON($spamFile);

    $attempts[] = [
      'ip' => $ip,
      'email' => $email,
      'reason' => $reason,
      'timestamp' => time(),
      'datetime' => date('Y-m-d H:i:s'),
      'data' => $data
    ];

    // Mantener solo los últimos 500 intentos
    if (count($attempts) > 500) {
      $attempts = array_slice($attempts, -500);
    }

    $this->writeJSON($spamFile, $attempts);
    error_log("SPAM ATTEMPT: IP=$ip, Email=$email, Reason=$reason");
  }

  /**
   * Limpia logs antiguos (más de 7 días)
   */
  private function cleanOldLogs()
  {
    $cutoff = time() - (7 * 86400); // 7 días

    // Limpiar submissions
    $submissions = $this->readJSON($this->submissionsFile);
    $submissions = array_filter($submissions, function ($sub) use ($cutoff) {
      return $sub['timestamp'] > $cutoff;
    });
    $this->writeJSON($this->submissionsFile, array_values($submissions));

    // Limpiar spam attempts
    $spamFile = $this->logDir . '/spam_attempts.json';
    if (file_exists($spamFile)) {
      $attempts = $this->readJSON($spamFile);
      $attempts = array_filter($attempts, function ($att) use ($cutoff) {
        return $att['timestamp'] > $cutoff;
      });
      $this->writeJSON($spamFile, array_values($attempts));
    }
  }

  /**
   * Verifica palabras prohibidas en el contenido
   */
  public function checkSpamWords($text)
  {
    $text = strtolower($text);
    $blockedWords = SPAM_BLOCKED_WORDS;

    foreach ($blockedWords as $word) {
      $word = trim(strtolower($word));
      if (empty($word)) continue;

      if (strpos($text, $word) !== false) {
        return "Your message contains prohibited content.";
      }
    }

    return false;
  }

  /**
   * Verifica múltiples URLs en el texto
   */
  public function checkExcessiveUrls($text, $maxUrls = 2)
  {
    $urlPattern = '/(https?:\/\/|www\.)/i';
    preg_match_all($urlPattern, $text, $matches);

    if (count($matches[0]) > $maxUrls) {
      return "Too many links in your message.";
    }

    return false;
  }

  /**
   * Verifica la longitud del mensaje
   */
  public function checkMessageLength($text, $minLength = 10, $maxLength = 5000)
  {
    $length = strlen(trim($text));

    if ($length < $minLength) {
      return "Message is too short.";
    }

    if ($length > $maxLength) {
      return "Message is too long.";
    }

    return false;
  }

  /**
   * Verifica tiempo mínimo de llenado del formulario
   */
  public function checkFormTimestamp($timestamp)
  {
    if (empty($timestamp) || !is_numeric($timestamp)) {
      return "Invalid form submission.";
    }

    $timeSpent = time() - (int)$timestamp;

    // Menos del tiempo mínimo = probable bot
    if ($timeSpent < SPAM_MIN_FORM_TIME) {
      return "Form submitted too quickly.";
    }

    // Más de 1 hora = sesión expirada
    if ($timeSpent > 3600) {
      return "Form session expired. Please refresh the page.";
    }

    return false;
  }

  /**
   * Verifica el campo honeypot
   */
  public function checkHoneypot($value)
  {
    if (!empty($value)) {
      return "Bot detected.";
    }
    return false;
  }

  /**
   * Verifica patrones sospechosos en el nombre
   */
  public function checkSuspiciousName($name)
  {
    // Nombres con muchos números
    if (preg_match('/\d{4,}/', $name)) {
      return "Invalid name format.";
    }

    // Nombres con URLs
    if (preg_match('/(https?:\/\/|www\.)/i', $name)) {
      return "Invalid name format.";
    }

    // Nombres muy cortos o muy largos
    if (strlen($name) < 2 || strlen($name) > 100) {
      return "Name must be between 2 and 100 characters.";
    }

    return false;
  }

  /**
   * Verifica emails temporales comunes
   */
  public function checkDisposableEmail($email)
  {
    $disposableDomains = [
      'tempmail',
      'guerrillamail',
      '10minutemail',
      'throwaway',
      'mailinator',
      'trashmail',
      'yopmail',
      'maildrop',
      'temp-mail',
      'getnada',
      'fakeinbox',
      'mohmal'
    ];

    $emailLower = strtolower($email);

    foreach ($disposableDomains as $domain) {
      if (strpos($emailLower, $domain) !== false) {
        return "Please use a permanent email address.";
      }
    }

    return false;
  }

  /**
   * Obtiene estadísticas de SPAM
   */
  public function getStats()
  {
    $submissions = $this->readJSON($this->submissionsFile);
    $spamFile = $this->logDir . '/spam_attempts.json';
    $spamAttempts = file_exists($spamFile) ? $this->readJSON($spamFile) : [];
    $blockedIPs = $this->readJSON($this->blockedIPsFile);

    $now = time();
    $hourAgo = $now - 3600;
    $dayAgo = $now - 86400;

    // Contar envíos legítimos
    $submissionsLastHour = count(array_filter($submissions, fn($s) => $s['timestamp'] > $hourAgo));
    $submissionsLastDay = count(array_filter($submissions, fn($s) => $s['timestamp'] > $dayAgo));

    // Contar intentos de SPAM
    $spamLastHour = count(array_filter($spamAttempts, fn($s) => $s['timestamp'] > $hourAgo));
    $spamLastDay = count(array_filter($spamAttempts, fn($s) => $s['timestamp'] > $dayAgo));

    return [
      'submissions' => [
        'total' => count($submissions),
        'last_hour' => $submissionsLastHour,
        'last_day' => $submissionsLastDay
      ],
      'spam_attempts' => [
        'total' => count($spamAttempts),
        'last_hour' => $spamLastHour,
        'last_day' => $spamLastDay
      ],
      'blocked_ips' => count($blockedIPs),
      'recent_spam' => array_slice(array_reverse($spamAttempts), 0, 10)
    ];
  }

  /**
   * Obtiene la IP del usuario (considerando proxies)
   */
  public static function getUserIP()
  {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
      $ip = trim($ips[0]);
    } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_REAL_IP'])) {
      $ip = $_SERVER['HTTP_X_REAL_IP'];
    }

    return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : $_SERVER['REMOTE_ADDR'];
  }

  /**
   * Lee un archivo JSON
   */
  private function readJSON($file)
  {
    if (!file_exists($file)) {
      return [];
    }

    $content = file_get_contents($file);
    $data = json_decode($content, true);

    return is_array($data) ? $data : [];
  }

  /**
   * Escribe un archivo JSON con bloqueo
   */
  private function writeJSON($file, $data)
  {
    $json = json_encode($data, JSON_PRETTY_PRINT);

    // Usar file locking para evitar race conditions
    $fp = fopen($file, 'c');
    if (flock($fp, LOCK_EX)) {
      ftruncate($fp, 0);
      fwrite($fp, $json);
      fflush($fp);
      flock($fp, LOCK_UN);
    }
    fclose($fp);
  }
}
