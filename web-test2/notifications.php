<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id'])) exit();

$user_id = $_SESSION['user_id'];
$notifications = $pdo->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC");
$notifications->execute([$user_id]);
$notifications = $notifications->fetchAll();

echo json_encode(['notifications' => $notifications]);
