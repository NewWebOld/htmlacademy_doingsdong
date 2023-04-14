<?php

require_once('helpers.php');
require_once('functions.php');
require_once('data.php');
require_once('init.php');
require_once('models.php');

$sql_project = get_query_list_project();

$result_project = mysqli_query($link, $sql_project);
if ($result_project) {
    $categories = mysqli_fetch_all($result_project, MYSQLI_ASSOC);
} else {
    $error = mysqli_error($link);
    $page_content = include_template('error.php', ['error' => $error]);
}

$sql_task = get_query_list_task();

$result_task = mysqli_query($link, $sql_task);
if ($result_task) {
    $task = mysqli_fetch_all($result_task, MYSQLI_ASSOC);
} else {
    $error = mysqli_error($link);
    $page_content = include_template('error.php', ['error' => $error]);
}


$project = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($project === false) {
    
    http_response_code(404);
    die();
    
} else {
    $sql_id = "SELECT * FROM task WHERE task.project_id= ?";
    $stmt = mysqli_prepare($link, $sql_id);
    mysqli_stmt_bind_param($stmt, 'i', $project);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($res) {
        $project = mysqli_fetch_assoc($res);
        // обработка данных, полученных из базы данных
    } else {
        $error = mysqli_error($link);
        $page_content = include_template('error.php', ['error' => $error]);
    } 
}



$page_content = include_template('main.php', [
    'categories' => $categories,
    'task' => $task,
    'project' => $project
    
]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'user_name' => 'Максим',
    'title' => 'Дела в порядке'
    
]);

print($layout_content);

?>