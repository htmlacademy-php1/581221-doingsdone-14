<?php
    // показывать или нет выполненные задачи
    $show_complete_tasks = rand(0, 1);


    function get_tasks_amount(array $tasks, string $name) {
        $result = 0;

        foreach ($tasks as $task) {
            if ($task['category'] === $name) {
                $result++;
            }
        }

        return $result;
    };
?>
