<?php
session_start();

require_once "bdd-crud.php";

if (isset($_SESSION["id"])) {
    $userID = $_SESSION["id"];
    $username = $_SESSION["username"];
} 
else {
    header("Location: login.php");
}

$tasks = get_tasks_user($userID);


// echo '<pre> $_SESSION = ';
// print_r($_SESSION);
// echo '<pre> $tasks = ';
// print_r($tasks);
// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TaskList</title>
</head>

<body class="index">
    <header>
        <a class="logout" href="logout.php">Logout</a>
        <!-- <a href="inscription.php">Se créer un compte</a>
        <a href="login.php">Login</a> -->
    </header>
<h1>Bienvenue <?= $username ?></h1>
    <h2>Liste des tâches</h2>
    <div class="tasks">
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li><?= $task['title'] ?>
                    <a href="show-task.php?taskID=<?= $task['id'] ?>">Description</a>
                    <a href="validate-task.php?taskID=<?= $task['id'] ?>">Terminer</a>
                    <a href="delete-task.php?taskID=<?= $task['id'] ?>">Supprimer</a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>

    <div>
        <a href="add-task.php">Ajouter une tâche</a>

    </div>
</body>

</html>