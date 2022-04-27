<?php

    require_once('helpers.php');
    require_once('data.php');
    require_once('functions.php');

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
