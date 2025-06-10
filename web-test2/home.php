<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$stmt = $pdo->query("
    SELECT posts.id, posts.content, posts.title, posts.created_at, posts.file, users2.pseudo, users2.avatar
    FROM posts
    JOIN users2 ON posts.user_id = users2.id
    ORDER BY posts.created_at DESC
");

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/style.css" />
</head>
<body class="dark-theme">
    <nav class="navbar">
        <div class="navbar-container">
            <a href="home.php">Fil</a>
            <a href="chat_list.php">Messages</a>
            <a href="stories.php">Stories</a>
            <a href="notifications.php">Notifications</a>
            <a href="profile.php">Profil</a>
            <a href="logout.php">Déconnexion</a>
        </div>
    </nav>

    <div class="container">
        <h1>Fil d’actualité</h1>

        <form action="post.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Titre du post" required />
            <textarea name="content" placeholder="Exprimez-vous..." required></textarea>
            <input type="file" name="file" accept=".jpg,.jpeg,.png,.gif,.mp4,.mp3,.pdf" />
            <button type="submit">Publier</button>
        </form>

        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h3><?= htmlspecialchars($post['title']) ?></h3>
                <strong><?= htmlspecialchars($post['pseudo']) ?></strong><br />
                <img src="uploads/<?= htmlspecialchars($post['avatar']) ?>" width="40" alt="Avatar" />
                <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>

                <?php if ($post['file']): 
                    $ext = strtolower(pathinfo($post['file'], PATHINFO_EXTENSION));
                    $filePath = "uploads/" . htmlspecialchars($post['file']);
                ?>
                    <?php if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                        <img src="<?= $filePath ?>" alt="Image jointe" style="max-width: 300px; max-height: 300px;" />
                    <?php elseif (in_array($ext, ['mp4'])): ?>
                        <video controls width="300">
                            <source src="<?= $filePath ?>" type="video/mp4" />
                            Votre navigateur ne supporte pas la vidéo.
                        </video>
                    <?php elseif (in_array($ext, ['mp3'])): ?>
                        <audio controls>
                            <source src="<?= $filePath ?>" type="audio/mpeg" />
                            Votre navigateur ne supporte pas l'audio.
                        </audio>
                    <?php elseif ($ext === 'pdf'): ?>
                        <a href="<?= $filePath ?>" target="_blank">Voir le fichier PDF</a>
                    <?php else: ?>
                        <a href="<?= $filePath ?>" target="_blank">Télécharger le fichier</a>
                    <?php endif; ?>
                <?php endif; ?>

                <small>Publié le <?= htmlspecialchars($post['created_at']) ?></small>
            </div>
        <?php endforeach; ?>

        <div class="pagination">
            <!-- Pagination logic here -->
            <a href="?page=1">1</a>
            <a href="?page=2">2</a>
            <a href="?page=3">3</a>
        </div>
    </div>
</body>
</html>
