<?php
session_start();
require_once "bdd-crud.php";

if (isset($_GET['taskID'])) {
    $taskID = $_GET['taskID'];
    $task = get_task($taskID);
    $title = $task['title'];
    $description = $task['description'];
    $datebrut = new DateTime($task['created_at']);
    $date = $datebrut->format('d-m-Y  à H:i:s');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Single Task</title>
</head>

<body class="show">
    <h2><?= $title ?></h2>
    <p><?= $description ?></p>
    <p>Date de création : <?= $date ?></p>

    <footer>
         <a href="index.php"><== Retour à l'acceuil</a>
    </footer>
</body>

</html>