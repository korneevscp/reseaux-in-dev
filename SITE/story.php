<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id']) || empty($_FILES['story']['name'])) {
    exit();
}

$user_id = $_SESSION['user_id'];
$story_file = $_FILES['story'];

$story_path = 'uploads/stories/' . basename($story_file['name']);
move_uploaded_file($story_file['tmp_name'], $story_path);

$stmt = $pdo->prepare("INSERT INTO stories (user_id, file_path) VALUES (?, ?)");
$stmt->execute([$user_id, $story_path]);

header("Location: home.php");
