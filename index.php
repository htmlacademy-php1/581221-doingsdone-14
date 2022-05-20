<?php
    require_once('init.php');
    require_once('helpers.php');
    require_once('functions.php');

    $sql = "SELECT p.id, p.name, count(t.project_id) FROM projects p LEFT JOIN tasks t ON p.id = t.project_id GROUP BY p.id";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($link);
        $content = include_template('error.php', ['error' => $error]);
    }

    $project_id = filter_input(INPUT_GET, 'id');

    if ($project_id) {
        $sql = "SELECT id, name, status, dt_expire, project_id FROM tasks WHERE project_id = $project_id";
    } else {
        $sql = "SELECT id, name, status, dt_expire, project_id FROM tasks";
    }

    $result = mysqli_query($link, $sql);

    if ($result) {
        $task_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($link);
        $content = include_template('error.php', ['error' => $error]);
    }

    $page_content = include_template('main.php', [
        'task_list' => $task_list,
        'projects' => $projects,
        'project_id' => $project_id,
        'show_complete_tasks' => $show_complete_tasks
    ]);

    $layout = include_template('layout.php', [
        'content' => $page_content,
        'title' => 'Дела в порядке - Главная страница'
    ]);

    print($layout);
