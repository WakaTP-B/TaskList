<?php
session_start();

require_once "bdd-crud.php";

if (isset($_SESSION["id"])) {
    $userID = $_SESSION["id"];
} else {
    header("Location: login.php");
}


if (isset($_POST["title"])) {

    $title = $_POST["title"];
    $description = $_POST["description"] ?? null;
    add_task($title, $description, $userID);
    header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ADD-Task</title>
</head>

<body class="add">
    <form action="" method="post">
        <input type="text" name="title" placeholder="Titre..."><br>
        <textarea name="description" rows="5" cols="50"></textarea><br>
        <input type="submit" value="Valider">
    </form>
    <a href="index.php">
        <== Retour à l'acceuil</a>
</body>

</html>