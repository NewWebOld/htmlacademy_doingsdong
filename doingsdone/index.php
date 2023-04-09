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

$show_id = 'project_id';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if ($id === null || !is_numeric($id)) {
    
} else {
    $sql_id = get_query_show_id($id);
    $res = mysqli_query($link, $sql_id);
    if ($res) {
        $project_id = mysqli_fetch_assoc($res);
    } else {
        $error = mysqli_error($link);
        $page_content = include_template('error.php', ['error' => $error]);
    }
}
/*
http_response_code(404);
    die();
*/


$page_content = include_template('main.php', [
    'categories' => $categories,
    'task' => $task,
    'project_id' => $project_id
]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'user_name' => 'Максим',
    'title' => 'Дела в порядке'
    
]);

print($layout_content);

?>