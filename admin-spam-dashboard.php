<?php
require_once __DIR__ . '/includes/env-loader.php';
require_once __DIR__ . '/clases/AntiSpam.php';

// Proteger con clave
if (!isset($_GET['key']) || $_GET['key'] !== KEY_ADMIN_SPAM_DASHBOARD) {
  die('Access denied');
}

$antiSpam = new AntiSpam();
$stats = $antiSpam->getStats();

// Leer archivos de logs
$submissionsFile = SPAM_LOG_DIR . '/submissions.json';
$spamFile = SPAM_LOG_DIR . '/spam_attempts.json';
$blockedIPsFile = SPAM_LOG_DIR . '/blocked_ips.json';

$submissions = file_exists($submissionsFile) ? json_decode(file_get_contents($submissionsFile), true) : [];
$spamAttempts = file_exists($spamFile) ? json_decode(file_get_contents($spamFile), true) : [];
$blockedIPs = file_exists($blockedIPsFile) ? json_decode(file_get_contents($blockedIPsFile), true) : [];

// Ordenar por más recientes
usort($submissions, fn($a, $b) => $b['timestamp'] - $a['timestamp']);
usort($spamAttempts, fn($a, $b) => $b['timestamp'] - $a['timestamp']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anti-SPAM Dashboard</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
      background: #f5f5f5;
      padding: 20px;
    }

    .container {
      max-width: 1400px;
      margin: 0 auto;
    }

    h1 {
      color: #333;
      margin-bottom: 30px;
      font-size: 2rem;
    }

    .stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .stat-card {
      background: white;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .stat-card h3 {
      color: #666;
      font-size: 0.9rem;
      text-transform: uppercase;
      margin-bottom: 10px;
    }

    .stat-card .number {
      font-size: 2.5rem;
      font-weight: bold;
      color: #333;
    }

    .stat-card.danger .number {
      color: #dc3545;
    }

    .stat-card.success .number {
      color: #28a745;
    }

    .stat-card.warning .number {
      color: #ffc107;
    }

    .section {
      background: white;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .section h2 {
      color: #333;
      margin-bottom: 20px;
      font-size: 1.4rem;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      text-align: left;
      padding: 12px;
      border-bottom: 1px solid #eee;
    }

    th {
      background: #f8f9fa;
      font-weight: 600;
      color: #666;
      font-size: 0.9rem;
      text-transform: uppercase;
    }

    tr:hover {
      background: #f8f9fa;
    }

    .badge {
      display: inline-block;
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .badge-danger {
      background: #dc3545;
      color: white;
    }

    .badge-success {
      background: #28a745;
      color: white;
    }

    .badge-warning {
      background: #ffc107;
      color: #333;
    }

    .badge-info {
      background: #17a2b8;
      color: white;
    }

    .ip {
      font-family: 'Courier New', monospace;
    }

    .timestamp {
      color: #666;
      font-size: 0.9rem;
    }

    code {
      background: #f4f4f4;
      padding: 2px 6px;
      border-radius: 3px;
      font-family: 'Courier New', monospace;
      font-size: 0.9rem;
    }

    .empty-state {
      text-align: center;
      padding: 40px;
      color: #999;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>🛡️ Anti-SPAM Dashboard</h1>

    <!-- Statistics -->
    <div class="stats">
      <div class="stat-card success">
        <h3>Valid Submissions (24h)</h3>
        <div class="number"><?= $stats['submissions']['last_day'] ?></div>
      </div>
      <div class="stat-card danger">
        <h3>SPAM Attempts (24h)</h3>
        <div class="number"><?= $stats['spam_attempts']['last_day'] ?></div>
      </div>
      <div class="stat-card warning">
        <h3>Blocked IPs</h3>
        <div class="number"><?= $stats['blocked_ips'] ?></div>
      </div>
      <div class="stat-card">
        <h3>Success Rate</h3>
        <div class="number">
          <?php
          $total = $stats['submissions']['last_day'] + $stats['spam_attempts']['last_day'];
          $rate = $total > 0 ? round(($stats['submissions']['last_day'] / $total) * 100) : 100;
          echo $rate . '%';
          ?>
        </div>
      </div>
    </div>

    <!-- Blocked IPs -->
    <?php if (!empty($blockedIPs)): ?>
      <div class="section">
        <h2>🚫 Blocked IPs</h2>
        <table>
          <thead>
            <tr>
              <th>IP Address</th>
              <th>Reason</th>
              <th>Blocked At</th>
              <th>Expires</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($blockedIPs as $ip => $data): ?>
              <tr>
                <td><code class="ip"><?= htmlspecialchars($ip) ?></code></td>
                <td><span class="badge badge-danger"><?= htmlspecialchars($data['reason']) ?></span></td>
                <td class="timestamp"><?= htmlspecialchars($data['blocked_at']) ?></td>
                <td class="timestamp"><?= date('Y-m-d H:i:s', $data['until']) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>

    <!-- Recent SPAM Attempts -->
    <div class="section">
      <h2>🚨 Recent SPAM Attempts (Last 20)</h2>
      <?php if (!empty($spamAttempts)): ?>
        <table>
          <thead>
            <tr>
              <th>Time</th>
              <th>IP</th>
              <th>Email</th>
              <th>Reason</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach (array_slice($spamAttempts, 0, 20) as $attempt): ?>
              <tr>
                <td class="timestamp"><?= htmlspecialchars($attempt['datetime']) ?></td>
                <td><code class="ip"><?= htmlspecialchars($attempt['ip']) ?></code></td>
                <td><?= htmlspecialchars($attempt['email']) ?></td>
                <td><span class="badge badge-danger"><?= htmlspecialchars($attempt['reason']) ?></span></td>
                <td>
                  <?php if (isset($attempt['data']['score'])): ?>
                    <span class="badge badge-warning">Score: <?= htmlspecialchars($attempt['data']['score']) ?></span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <div class="empty-state">No SPAM attempts recorded yet 🎉</div>
      <?php endif; ?>
    </div>

    <!-- Score Distribution -->
    <?php if (!empty($submissions)): ?>
      <div class="section">
        <h2>📊 reCAPTCHA Score Distribution (Valid Submissions)</h2>
        <?php
        $scoreRanges = [
          'excellent' => ['min' => 0.9, 'max' => 1.0, 'count' => 0, 'label' => '0.9 - 1.0 (Excellent)', 'class' => 'success'],
          'good' => ['min' => 0.7, 'max' => 0.9, 'count' => 0, 'label' => '0.7 - 0.9 (Good)', 'class' => 'success'],
          'fair' => ['min' => 0.5, 'max' => 0.7, 'count' => 0, 'label' => '0.5 - 0.7 (Fair)', 'class' => 'warning'],
          'suspicious' => ['min' => 0.3, 'max' => 0.5, 'count' => 0, 'label' => '0.3 - 0.5 (Suspicious)', 'class' => 'danger'],
          'bot' => ['min' => 0.0, 'max' => 0.3, 'count' => 0, 'label' => '0.0 - 0.3 (Bot)', 'class' => 'danger'],
        ];

        foreach ($submissions as $sub) {
          if (isset($sub['recaptcha_score'])) {
            $score = $sub['recaptcha_score'];
            foreach ($scoreRanges as $key => $range) {
              if ($score >= $range['min'] && $score <= $range['max']) {
                $scoreRanges[$key]['count']++;
                break;
              }
            }
          }
        }
        ?>

        <table>
          <thead>
            <tr>
              <th>Score Range</th>
              <th>Count</th>
              <th>Percentage</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $totalWithScore = array_sum(array_column($scoreRanges, 'count'));
            foreach ($scoreRanges as $range):
              if ($range['count'] > 0):
                $percentage = $totalWithScore > 0 ? round(($range['count'] / $totalWithScore) * 100, 1) : 0;
            ?>
                <tr>
                  <td><span class="badge badge-<?= $range['class'] ?>"><?= $range['label'] ?></span></td>
                  <td><strong><?= $range['count'] ?></strong></td>
                  <td><?= $percentage ?>%</td>
                </tr>
            <?php
              endif;
            endforeach;
            ?>
          </tbody>
        </table>

        <p style="margin-top: 15px; color: #666; font-size: 0.9rem;">
          <strong>Recommendation:</strong>
          <?php if ($scoreRanges['fair']['count'] > 0 || $scoreRanges['suspicious']['count'] > 0): ?>
            ⚠️ Consider increasing SPAM_RECAPTCHA_MIN_SCORE to 0.7 or higher
          <?php else: ?>
            ✅ Current threshold (<?= SPAM_RECAPTCHA_MIN_SCORE ?>) appears adequate
          <?php endif; ?>
        </p>
      </div>
    <?php endif; ?>

    <!-- Valid Submissions -->
    <div class="section">
      <h2>✅ Valid Submissions (Last 20)</h2>
      <?php if (!empty($submissions)): ?>
        <table>
          <thead>
            <tr>
              <th>Time</th>
              <th>IP</th>
              <th>Email</th>
              <th>reCAPTCHA Score</th> <!-- NUEVA COLUMNA -->
            </tr>
          </thead>
          <tbody>
            <?php foreach (array_slice($submissions, 0, 20) as $sub): ?>
              <tr>
                <td class="timestamp"><?= htmlspecialchars($sub['datetime']) ?></td>
                <td><code class="ip"><?= htmlspecialchars($sub['ip']) ?></code></td>
                <td><?= htmlspecialchars($sub['email']) ?></td>
                <td>
                  <?php if (isset($sub['recaptcha_score'])): ?>
                    <?php
                    $score = $sub['recaptcha_score'];
                    $badgeClass = 'badge-success';
                    if ($score < 0.5) $badgeClass = 'badge-danger';
                    elseif ($score < 0.7) $badgeClass = 'badge-warning';
                    ?>
                    <span class="badge <?= $badgeClass ?>">
                      <?= number_format($score, 2) ?>
                    </span>
                  <?php else: ?>
                    <span class="badge badge-info">N/A</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <div class="empty-state">No submissions yet</div>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>