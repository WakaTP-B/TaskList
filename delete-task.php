<?php
session_start();
require_once "bdd-crud.php";

if (isset($_GET['taskID'])) {
    $taskID = $_GET['taskID'];
    delete_task($taskID);
    header("Location: index.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une tache</title>
</head>
<body>
    
</body>
</html>