<?php
session_start();
require 'db.php';

$user_id = $_SESSION['user_id'] ?? 0;

if ($user_id) {
    $stmt = $pdo->prepare("UPDATE notifications SET is_read = 1 WHERE user_id = ?");
    $stmt->execute([$user_id]);
}
