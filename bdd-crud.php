<?php

function connect_database(): PDO
{
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
    return $bdd;
}


function redirect()
{
    if (isset($_SESSION["id"])) {
        header("Location: index.php");
    }
}

function add_task(string $title, ?string $description, int $userID)
{
    $bdd = connect_database();
    $addTask = $bdd->prepare("INSERT INTO tasks (title, description, userID) VALUES (?, ?, ?)");
    $addTask->execute([
        $title,
        $description,
        $userID
    ]);
}

function get_tasks_user(int $userID): array | null
{
    $bdd = connect_database();
    $get_tasks = $bdd->prepare("SELECT * FROM tasks WHERE userID=? AND status=0");
    $get_tasks->execute([$userID]);
    $tasks = $get_tasks->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}

function delete_task(int $taskID)
{
    $bdd = connect_database();
    $delete_task = $bdd->prepare("DELETE FROM tasks WHERE id=?");
    $delete_task->execute([
        $taskID
    ]);
}


function get_task(int $taskID)
{
    $bdd = connect_database();
    $get_task = $bdd->prepare("SELECT * FROM tasks WHERE id=? AND status =0");
    $get_task->execute([
        $taskID
    ]);
    return $get_task->fetch(PDO::FETCH_ASSOC);
}



function get_tasks_end(int $userID)
{
    $bdd = connect_database();
    $get_tasks = $bdd->prepare("SELECT * FROM tasks WHERE userID=? AND status=1");
    $get_tasks->execute([
        $userID
    ]);
    return $get_tasks->fetchAll(PDO::FETCH_ASSOC);
}


function end_task(int $taskID)
{
    $bdd = connect_database();
    $get_task = $bdd->prepare("UPDATE tasks SET status=1 WHERE id=?");
    $get_task->execute([
        $taskID
    ]);
}
