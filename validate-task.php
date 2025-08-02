<?php
session_start();
require_once "bdd-crud.php";

if (isset($_SESSION["id"]) && isset($_GET['taskID'])) {
    $userID = $_SESSION["id"];
    $username = $_SESSION["username"];
    $taskID = $_GET['taskID'];
    end_task($taskID);

    $tasksEnd = get_tasks_end($userID);
} else {
    header("Location: login.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tâche terminée</title>
</head>

<body class="validate">
    <H1>Historique</H1>
    <ul>
        <?php foreach ($tasksEnd as $taskEnd):
            $title = $taskEnd['title'];
            $description = $taskEnd['description'];
            $datebrut = new DateTime($taskEnd['created_at']);
            $date = $datebrut->format('d-m-Y  à H:i:s');
        ?>
            <li>
                <h3><?= $title ?></h3><br>
                <p><?= $description ?></p>
                <p>Création le : <?= $date ?></p>
            </li>
        <?php endforeach ?>
    </ul>
    <a href="index.php">
        <== Retour à l'acceuil</a>
</body>

</html>