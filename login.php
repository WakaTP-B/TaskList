<?php
session_start();

require_once "bdd-crud.php";

redirect();

$bdd = connect_database();

if (isset($_POST["username"]) && isset($_POST["password"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $loguser = $bdd->prepare("SELECT * FROM users WHERE username=:username");
    $loguser->execute(['username' => $username]);

    $dbuser = $loguser->fetch();
    if ($dbuser) {

        $hash_password = $dbuser['password'];
        if (password_verify($password, $hash_password)) {

            $userID = $dbuser['id'];
            $username = $dbuser['username'];
            $_SESSION['id'] = $userID;
            $_SESSION['username'] = $username;
        }
        header("location: index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body class="login">
    <h1>Connexion</h1>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username..." required>
        <input type="password" name="password" placeholder="Password..." required>
        <button>Se connecter</button>
    </form>
    <a href="inscription.php">Pas de compte ? S'inscrire</a>
</body>

</html>