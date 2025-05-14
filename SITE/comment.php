<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id']) || empty($_POST['comment']) || empty($_POST['post_id'])) {
    header("Location: home.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$post_id = (int)$_POST['post_id'];
$comment = htmlspecialchars($_POST['comment']);

$stmt = $pdo->prepare("INSERT INTO comments (user_id, post_id, comment) VALUES (?, ?, ?)");
$stmt->execute([$user_id, $post_id, $comment]);

header("Location: home.php");
