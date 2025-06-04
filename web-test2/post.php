<?php
session_start();
require_once 'includes/db.php';

// Vérifie que l'utilisateur est connecté et que le contenu et le titre sont fournis
if (!isset($_SESSION['user_id']) || empty($_POST['content']) || empty($_POST['title'])) {
    header("Location: home.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$content = htmlspecialchars($_POST['content']);
$title = htmlspecialchars($_POST['title']);

// Vérifie que l'utilisateur existe dans la base de données
$check = $pdo->prepare("SELECT id FROM users2 WHERE id = ?");
$check->execute([$user_id]);

if ($check->rowCount() === 0) {
    die("Erreur : l'utilisateur avec l'ID $user_id n'existe pas dans la base de données.");
}

// Insertion du post
$stmt = $pdo->prepare("INSERT INTO posts (user_id, content, title) VALUES (?, ?, ?)");
$stmt->execute([$user_id, $content, $title]);

header("Location: home.php");
exit();
?>
