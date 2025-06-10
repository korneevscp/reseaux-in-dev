<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id']) || empty($_POST['content']) || empty($_POST['title'])) {
    header("Location: home.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$content = htmlspecialchars($_POST['content']);
$title = htmlspecialchars($_POST['title']);

// Gestion du fichier uploadé
$fileName = null;
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'mp3', 'pdf'];
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $originalName = $_FILES['file']['name'];
    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    if (in_array($extension, $allowed)) {
        $newFileName = uniqid() . '.' . $extension;
        $destination = __DIR__ . '/uploads/' . $newFileName;
        if (move_uploaded_file($fileTmpPath, $destination)) {
            $fileName = $newFileName;
        }
    }
}

$stmt = $pdo->prepare("INSERT INTO posts (user_id, content, title, file) VALUES (?, ?, ?, ?)");
$stmt->execute([$user_id, $content, $title, $fileName]);

header("Location: home.php");
exit();
?>
