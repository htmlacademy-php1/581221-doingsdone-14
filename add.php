<?php
    require_once('init.php');
    require_once('helpers.php');
    require_once('functions.php');

    $projects = get_projects($link);
    $projects_id = array_column($projects, 'id');

    $page_content = include_template('add.php', [
        'projects' => $projects
    ]);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $required = ['name', 'project'];
        // $rules = [
        //     "project" => function($value) use ($projects_id) {
        //         return validate_project($value, $projects_id);
        //     },
        //     "name" => function($value) {
        //         return validate_name($value, 5, 200);
        //     }
        // ];

        $new_task = $_POST;

        $new_task_name = $new_task['name'];
        $new_task_date = $new_task['date'];
        $new_task_project = $new_task['project'];

        $filename = uniqid(). '.jpg';
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $filename);

        $new_task_path = 'uploads/' . $filename;

        $sql = "INSERT INTO tasks (name, link, dt_expire, user_id, project_id) VALUES ('$new_task_name', '$new_task_path', '$new_task_date', 1, '$new_task_project')";

        $stmt = db_get_prepare_stmt($link, $sql, $new_task);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            header('Location: /index.php?id=' . $new_task_project);
        }
        else {
            $content = include_template('error.php', ['error' => mysqli_error($link)]);
        }
    }



    $layout = include_template('layout.php', [
        'content' => $page_content,
        'title' => 'Добавление задачи'
    ]);

    print($layout);

