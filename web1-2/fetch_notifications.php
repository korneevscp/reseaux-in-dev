<?php
session_start();
require 'db.php';

$user_id = $_SESSION['user_id'] ?? 0;

if ($user_id) {
    $stmt = $pdo->prepare("SELECT id, content, created_at FROM notifications WHERE user_id = ? AND is_read = 0 ORDER BY created_at DESC LIMIT 5");
    $stmt->execute([$user_id]);
    $notifications = $stmt->fetchAll();

    foreach ($notifications as $notif) {
        echo "<div class='notif'>" . htmlspecialchars($notif['content']) . "<br><small>" . $notif['created_at'] . "</small></div>";
    }
}
