<?php
    require_once('init.php');
    require_once('helpers.php');
    require_once('functions.php');

    $projects = get_projects($link);

    $project_id = filter_input(INPUT_GET, 'id');

    $task_list = get_tasks($link, $project_id);

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
