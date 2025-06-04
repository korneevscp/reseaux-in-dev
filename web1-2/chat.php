<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id']) || empty($_GET['user_id'])) {
    header("Location: home.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$receiver_id = (int)$_GET['user_id'];

// Récupérer les messages entre les utilisateurs
$messages = $pdo->prepare("SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY created_at ASC");
$messages->execute([$user_id, $receiver_id, $receiver_id, $user_id]);
$messages = $messages->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Messagerie</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Messagerie avec <?= htmlspecialchars($receiver_id) ?></h1>

    <div class="chat-box">
        <?php foreach ($messages as $msg): ?>
            <div class="message <?= $msg['sender_id'] == $user_id ? 'sent' : 'received' ?>">
                <p><?= htmlspecialchars($msg['message']) ?></p>
                <small><?= $msg['created_at'] ?></small>
            </div>
        <?php endforeach; ?>
    </div>

    <form action="message.php" method="POST">
        <textarea name="message" placeholder="Écrivez un message..."></textarea>
        <input type="hidden" name="receiver_id" value="<?= $receiver_id ?>">
        <button type="submit">Envoyer</button>
    </form>

    <a href="home.php">Retour au fil d'actualité</a>
</body>
</html>

