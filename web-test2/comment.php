<?php
session_start();
require 'db.php';

$user_id = $_SESSION['user_id'] ?? 1;
$post_id = $_POST['post_id'];
$content = $_POST['comment'];

$stmt = $pdo->prepare("INSERT INTO comments (user_id, post_id, content) VALUES (?, ?, ?)");
$stmt->execute([$user_id, $post_id, $content]);
// Supposons que $post_id et $user_id sont définis

// 1. Récupérer l’auteur du post
$stmt = $pdo->prepare("SELECT user_id FROM posts WHERE id = ?");
$stmt->execute([$post_id]);
$post_owner_id = $stmt->fetchColumn();

// 2. Ne pas notifier soi-même
if ($post_owner_id && $post_owner_id != $user_id) {
    $stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $username = $stmt->fetchColumn();

    $message = "$username a commenté votre post.";

    $stmt = $pdo->prepare("INSERT INTO notifications (user_id, content, is_read) VALUES (?, ?, 0)");
    $stmt->execute([$post_owner_id, $message]);
}

