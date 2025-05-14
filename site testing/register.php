<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'test web';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérifie si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère et sécurise les données
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $discord = htmlspecialchars($_POST['discord']);
    $instagrame = htmlspecialchars($_POST['Instagrame']);
    $telegram = htmlspecialchars($_POST['télégrame']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $phone = htmlspecialchars($_POST['phone']);
    $birthdate = $_POST['birthdate'];


    // Vérifie que les mots de passe correspondent
    if ($pass !== $cpass) {
        die("Les mots de passe ne correspondent pas.");
    }

    // Hash du mot de passe
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // Requête SQL
    $sql = "INSERT INTO users (pseudo, email, password, discord, instagrame, telegram, fname, lname, phone, birthdate)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$pseudo, $email, $hashed_pass, $discord, $instagrame, $telegram, $fname, $lname, $phone, $birthdate]);

    echo "Inscription réussie !";
}
?>
