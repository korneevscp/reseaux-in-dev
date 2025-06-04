<?php
$host = "localhost";
$user = "root";
$pass = ""; // ton mot de passe MySQL
$dbname = "social_network";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $discord = $_POST["discord"];
    $instagram = $_POST["Instagram"];
    $telegram = $_POST["telegram"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phone = $_POST["phone"];
    $birthdate = $_POST["birthdate"];

    $stmt = $conn->prepare("INSERT INTO users2 (pseudo, email, password, discord, instagram, telegram, fname, lname, phone, birthdate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $pseudo, $email, $pass, $discord, $instagram, $telegram, $fname, $lname, $phone, $birthdate);

    if ($stmt->execute()) {
    header("Location: login.php");
    exit(); // Toujours utiliser exit() après une redirection
    } else {
    $error = htmlspecialchars($stmt->error);
    echo "<script>showNotification('❌ Erreur lors de l\\'inscription : $error', 'error');</script>";
    }


    $stmt->close();
    $conn->close();
}
?>
