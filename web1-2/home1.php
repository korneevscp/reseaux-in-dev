<?php
include('includes/db.php'); // Fichier de configuration pour la connexion à la base de données
session_start();

$postsQuery = "SELECT posts.id, posts.title, posts.content, posts.created_at, users.username, users.avatar FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC";
$postsResult = mysqli_query($conn, $postsQuery);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Réseau Social</title>
    <link rel="stylesheet" href="styles4.css"> <!-- Lien vers ton fichier CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

</head>

<body>

    <div class="headernav">
        <div class="search">
            <div class="wrap">
                <input type="text" class="txt" placeholder="Rechercher...">
                <button>🔍</button>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="posts-container">
            <?php while ($post = mysqli_fetch_assoc($postsResult)) { ?>
                <div class="post">
                    <div class="wrap-ut">
                        <div class="userinfo">
                            <img class="avatar" src="avatars/<?php echo $post['avatar']; ?>" alt="Avatar">
                            <p><?php echo htmlspecialchars($post['username']); ?></p>
                        </div>

                        <div class="posttext">
                            <h2><?php echo htmlspecialchars($post['title']); ?></h2> <!-- Affiche le titre ici -->
                            <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                            <div class="postinfo">
                                <p class="time"><?php echo date("d M Y, H:i", strtotime($post['created_at'])); ?></p>
                                <p class="views">Views: 123</p>
                            </div>
                        </div>
                    </div>
                    <div class="comments">
                        <div class="commentbg">
                            <span class="mark"></span>
                            <p>Commentaire exemple</p>
                        </div>
                    </div>
                    <div class="postinfobot">
                        <div class="likeblock">
                            <button class="btn-primary">Like</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="paginationforum">
            <ul>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
            </ul>
        </div>

    </div>

    <footer>
        <p>&copy; 2025 Mon Réseau Social</p>
    </footer>

</body>

</html>

<?php
mysqli_close($conn); // Fermeture de la connexion à la base de données
?>

