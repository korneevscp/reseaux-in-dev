<?php
session_start();
require_once 'includes/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['avatar']['tmp_name'];
    $name = uniqid() . "_" . basename($_FILES['avatar']['name']);
    move_uploaded_file($tmp_name, "uploads/$name");

    $stmt = $pdo->prepare("UPDATE users SET avatar = ? WHERE id = ?");
    $stmt->execute([$name, $_SESSION['user_id']]);
}
header("Location: profile.php");