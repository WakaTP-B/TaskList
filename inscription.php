<?php
session_start();

require_once "bdd-crud.php";

redirect();

$bdd = connect_database();

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $adduser = $bdd->prepare("INSERT INTO users (username, password) VALUES (?,?)");
    $adduser->execute([
        $username,
        $hash_password
    ]);
    header("location: login.php");
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>

<body class="inscription">
    <h1>Formulaire d'incription</h1>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username..." required>
        <input type="password" name="password" placeholder="Password..." required>
        <button>Inscription</button>
    </form>
    <a href="login.php">Déjà un compte ? ==> Login</a>
</body>

</html>