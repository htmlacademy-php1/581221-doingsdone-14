<?php

    require_once('init.php');
    require_once('helpers.php');
    require_once('data.php');
    require_once('functions.php');


    $sql = "SELECT id, name FROM projects";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($link);
        $content = include_template('error.php', ['error' => $error]);
    }

    $sql = "SELECT id, name, status, dt_expire, project_id FROM tasks";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $task_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($link);
        $content = include_template('error.php', ['error' => $error]);
    }

    $page_content = include_template('main.php', [
        'task_list' => $task_list,
        'categories' => $categories,
        'show_complete_tasks' => $show_complete_tasks
    ]);

    $layout = include_template('layout.php', [
        'content' => $page_content,
        'title' => 'Дела в порядке - Главная страница'
    ]);

    print($layout);
?>




