<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT email, avatar FROM users2 WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if ($user === false) {
    // Aucun utilisateur trouvé, redirection ou message d'erreur
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Mon profil</h1>
    <p>Email : <?= htmlspecialchars($user['email']) ?></p>
    <img src="uploads/<?= htmlspecialchars($user['avatar'] ?? 'default.jpg') ?>" alt="Avatar" width="100">
    <form action="upload_avatar.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="avatar" required>
        <button type="submit">Changer d'avatar</button>
    </form>
    <p><a href="home.php">Retour</a></p>
</body>
</html>
