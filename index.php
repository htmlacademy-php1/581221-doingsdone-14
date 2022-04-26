<?php
// показывать или нет выполненные задачи
    $show_complete_tasks = rand(0, 1);
    $categories = ['Входящие', 'Учёба', 'Работа', 'Домашние дела', 'Авто'];
    $task_list = [
        [
            'task' => 'Собеседование в IT компании',
            'date' => '01.12.2019',
            'category' => 'Работа',
            'status' => false
        ],
        [
            'task' => 'Выполнить тестовое задание',
            'date' => '25.12.2019',
            'category' => 'Работа',
            'status' => false
        ],
        [
            'task' => 'Сделать задание первого раздела',
            'date' => '21.12.2019',
            'category' => 'Учеба',
            'status' => true
        ],
        [
            'task' => 'Встреча с другом',
            'date' => '22.12.2019',
            'category' => 'Входящие',
            'status' => false
        ],
        [
            'task' => 'Купить корм для кота',
            'date' => null,
            'category' => 'Домашние дела',
            'status' => false
        ],
        [
            'task' => 'Заказать пиццу',
            'date' => null,
            'category' => 'Домашние дела',
            'status' => false
        ]
    ];

    function get_tasks_amount(array $tasks, string $name) {
        $result = 0;

        foreach ($tasks as $task) {
            if ($task['category'] === $name) {
                $result++;
            }
        }

        return $result;
    };

    require_once('helpers.php');

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
