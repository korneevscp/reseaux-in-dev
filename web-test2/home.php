<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$limit = 10;
$offset = 0; // ou basé sur $_GET['page']
$stmt = $pdo->prepare("
    SELECT posts.*, users.avatar 
    FROM posts 
    JOIN users ON posts.user_id = users.id 
    ORDER BY posts.created_at DESC
    LIMIT ? OFFSET ?
");
$stmt->bindValue(1, $limit, PDO::PARAM_INT);
$stmt->bindValue(2, $offset, PDO::PARAM_INT);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
$user_id = $_SESSION['user_id'];
foreach ($posts as $post): ?>
  <div class="post">
    <img src="<?= htmlspecialchars($post['avatar']) ?>" alt="Avatar" width="40">
    <h3><?= htmlspecialchars($post['title']) ?></h3>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    <small>Publié le <?= htmlspecialchars($post['created_at']) ?></small>
  </div>
<?php endforeach; ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="dark-theme">
    <!-- Navbar -->
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

    <!-- Contenu principal -->
    <div class="container">
        <h1>Fil d’actualité</h1>

        <!-- Formulaire de publication -->
        <form action="post.php" method="POST">
            <textarea name="content" placeholder="Exprimez-vous..." required></textarea>
            <button type="submit">Publier</button>
        </form>

  <?php
    foreach ($posts as $post):?>
        <div class="post">
            <strong><?= htmlspecialchars($post['email']) ?></strong><br>
            <img src="avatars/<?= htmlspecialchars($post['avatar']) ?>" width="40" alt="Avatar"><br>
            <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
            <small><?= htmlspecialchars($post['created_at']) ?></small>
        </div>
<?php   endforeach; ?>

    </div>
</body>
</html>
