<?php
    // показывать или нет выполненные задачи
    $show_complete_tasks = rand(0, 1);


    function get_tasks_amount(array $tasks, array $category) {
        $result = 0;

        foreach ($tasks as $task) {
            if ($task['project_id'] == $category['id']) {
                $result++;
            }
        }

        return $result;
    };

    function get_remain_hours($date) {
        return floor((strtotime($date) - time()) / 3600);
    }
?>
