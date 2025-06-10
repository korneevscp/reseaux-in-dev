<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['avatar']['tmp_name'];
        $original_name = basename($_FILES['avatar']['name']);
        $name = uniqid() . "_" . $original_name;
        $destination = __DIR__ . "/uploads/$name";

        if (move_uploaded_file($tmp_name, $destination)) {
            $stmt = $pdo->prepare("UPDATE users2 SET avatar = ? WHERE id = ?");
            $stmt->execute([$name, $_SESSION['user_id']]);
        } else {
            // Gestion de l'erreur lors du déplacement du fichier
            echo "Erreur lors du déplacement du fichier.";
        }
    } else {
        // Gestion des erreurs de téléchargement
        echo "Erreur lors du téléchargement du fichier.";
    }
}

header("Location: profile.php");
exit();
?>
