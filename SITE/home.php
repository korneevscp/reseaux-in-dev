<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$posts = $pdo->query("SELECT posts.*, users.email, users.avatar FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="dark-theme">
    <!-- Navbar -->
     <div id="notifications"></div>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="home.php" class="navbar-item">Fil d'actualité</a>
            <a href="chat_list.php" class="navbar-item">Messages</a>
            <a href="stories.php" class="navbar-item">Stories</a>
            <a href="notifications.php" class="navbar-item">Notifications</a>
            <a href="profile.php" class="navbar-item">Mon Profil</a>
            <a href="logout.php" class="navbar-item">Déconnexion</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h1>Fil d'actualité</h1>

        <!-- Formulaire de publication -->
        <form action="post.php" method="POST">
            <textarea name="content" placeholder="Exprimez-vous..." required></textarea>
            <button type="submit">Publier</button>
        </form>

        <!-- Affichage des posts -->
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <img src="uploads/<?= htmlspecialchars($post['avatar'] ?? 'default.png') ?>" width="50" style="border-radius: 50%;">
                <strong><?= htmlspecialchars($post['email']) ?></strong>
                <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>

                <!-- Compteur de likes -->
                <?php
                $likeStmt = $pdo->prepare("SELECT COUNT(*) FROM likes WHERE post_id = ?");
                $likeStmt->execute([$post['id']]);
                $likeCount = $likeStmt->fetchColumn();
                ?>
                <p>Likes: <?= $likeCount ?></p>

                <!-- Heure de publication -->
                <p><small>Publié le: <?= date('d-m-Y H:i', strtotime($post['created_at'])) ?></small></p>

                <!-- Bouton Like -->
                <form action="like.php" method="POST" style="display:inline;">
                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                    <button type="submit">👍 J’aime</button>
                </form>

                <!-- Formulaire de commentaire -->
                <form action="comment.php" method="POST" style="margin-top: 5px;">
                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                    <input type="text" name="comment" placeholder="Commenter..." required>
                    <button type="submit">💬</button>
                </form>

                <!-- Affichage des commentaires -->
                <div class="comments" style="margin-top: 10px;">
                    <?php
                    $stmt = $pdo->prepare("SELECT c.comment, u.email FROM comments c JOIN users u ON c.user_id = u.id WHERE c.post_id = ? ORDER BY c.created_at DESC");
                    $stmt->execute([$post['id']]);
                    foreach ($stmt as $comment) {
                        echo '<p><strong>' . htmlspecialchars($comment['email']) . ':</strong> ' . htmlspecialchars($comment['comment']) . '</p>';
                    }
                    ?>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>

    <script src="assets/ajax_notifications.js"></script> <!-- Si tu utilises AJAX pour notifications -->
</body>
</html>
