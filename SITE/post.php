<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id']) || empty($_POST['content'])) {
    header("Location: home.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$content = htmlspecialchars($_POST['content']);

$stmt = $pdo->prepare("INSERT INTO posts (user_id, content) VALUES (?, ?)");
$stmt->execute([$user_id, $content]);

header("Location: home.php");
