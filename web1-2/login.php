<?php
session_start();
require_once 'includes/db.php'; // Connexion via fichier centralisé

$error = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];

    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT * FROM users2 WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["user_id"] = $user["id"];
            header("Location: home.php");
            exit();
        } else {
            $error = "Email ou mot de passe invalide.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <link rel="stylesheet" href="style3.css">
</head>
<body>
<form method="POST">
  <h1>Connexion</h1>
  <div class="inset">
    <?php if ($error): ?>
      <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <p>
      <label for="email">Adresse e-mail :</label>
      <input type="email" name="email" id="email" required>
    </p>
    <p>
      <label for="password">Mot de passe :</label>
      <input type="password" name="password" id="password" required>
    </p>
    <p>
      <input type="checkbox" name="remember" id="remember">
      <label for="remember">Se souvenir de moi 14 jours</label>
    </p>
  </div>
  <p class="p-container">
    <span><a href="register.php">Créer un compte ?</a></span>
    <input type="submit" value="Se connecter">
  </p>
</form>
</body>
</html>
