<?php
    // показывать или нет выполненные задачи
    $show_complete_tasks = rand(0, 1);

    function get_tasks_amount(array $tasks, array $category) {
        $result = 0;

        foreach ($tasks as $task) {
            if ($task['t.project_id'] === $category['id']) {
                $result++;
            }
        }

        return $result;
    }

    function get_remain_hours($date) {
        return floor((strtotime($date) - time()) / 3600);
    }

    function show_error(&$content, $error) {
        $content = include_template('error.php', ['error' => $error]);
    }

    function get_projects($link) {
        $sql = "SELECT p.id, p.name, count(t.project_id) FROM projects p LEFT JOIN tasks t ON p.id = t.project_id GROUP BY p.id";
        $result = mysqli_query($link, $sql);

        if ($result) {
            $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

            return $projects;
        } else {
            $error = mysqli_error($link);
            $content = include_template('error.php', ['error' => $error]);
        }
    }

    function get_tasks($link, $project_id) {
        if ($project_id) {
            $sql = "SELECT t.id, t.name, t.link, t.status, t.dt_expire, p.id FROM tasks t RIGHT JOIN projects p ON t.project_id = p.id WHERE p.id = $project_id";
            $result = mysqli_query($link, $sql);

            if ($result) {
                $task_list = mysqli_fetch_all($result, MYSQLI_ASSOC);

                if (!$task_list[0]) {
                    header("location: /404.php");
                }

                return $task_list;
            } else {
                $error = mysqli_error($link);
                $content = include_template('error.php', ['error' => $error]);
            }
        } else {
            $sql = "SELECT id, name, status, dt_expire, project_id FROM tasks";
            $result = mysqli_query($link, $sql);

            if ($result) {
                $task_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $task_list;
            } else {
                $error = mysqli_error($link);
                $content = include_template('error.php', ['error' => $error]);
            }
        }
    }
?>
