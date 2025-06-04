<?php
session_start();
require 'db.php';

$user_id = $_SESSION['user_id'] ?? 1;

// Si clic sur "Like"
if (isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];
    $stmt = $pdo->prepare("INSERT INTO likes (user_id, post_id) VALUES (?, ?) ON DUPLICATE KEY UPDATE id = id");
    $stmt->execute([$user_id, $post_id]);
    exit;
}

// Si on demande juste le nombre de likes
if (isset($_GET['fetch_count'])) {
    $post_id = $_GET['fetch_count'];
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM likes WHERE post_id = ?");
    $stmt->execute([$post_id]);
    echo $stmt->fetchColumn();
    exit;
}
