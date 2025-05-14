<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id']) || empty($_POST['post_id'])) {
    header("Location: home.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$post_id = (int)$_POST['post_id'];

// Vérifier si l'utilisateur a déjà aimé ce post
$stmt = $pdo->prepare("SELECT * FROM likes WHERE post_id = ? AND user_id = ?");
$stmt->execute([$post_id, $user_id]);
$like = $stmt->fetch();

if ($like) {
    // Si l'utilisateur a déjà liké, supprimer le like
    $stmt = $pdo->prepare("DELETE FROM likes WHERE post_id = ? AND user_id = ?");
    $stmt->execute([$post_id, $user_id]);
} else {
    // Sinon, ajouter un like
    $stmt = $pdo->prepare("INSERT INTO likes (post_id, user_id) VALUES (?, ?)");
    $stmt->execute([$post_id, $user_id]);
}

header("Location: home.php");
