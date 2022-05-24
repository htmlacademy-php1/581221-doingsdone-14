<div class="content">
    <section class="content__side">
        <h2 class="content__side-heading">Проекты</h2>

        <nav class="main-navigation">
            <ul class="main-navigation__list">
                <?php foreach ($projects as $project): ?>
                    <li class="main-navigation__list-item <?php if ($project['id'] === $project_id): ?>main-navigation__list-item--active<?php endif; ?>">
                        <a class="main-navigation__list-item-link" href="index.php?id=<?=$project['id']; ?>"><?=$project['name']; ?></a>
                        <span class="main-navigation__list-item-count"> <?=$project['count(t.project_id)']; ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <a class="button button--transparent button--plus content__side-button"
            href="pages/form-project.html" target="project_add">Добавить проект</a>
    </section>

    <main class="content__main">
        <h2 class="content__main-heading">Список задач</h2>

        <form class="search-form" action="index.php" method="post" autocomplete="off">
            <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

            <input class="search-form__submit" type="submit" name="" value="Искать">
        </form>

        <div class="tasks-controls">
            <nav class="tasks-switch">
                <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                <a href="/" class="tasks-switch__item">Повестка дня</a>
                <a href="/" class="tasks-switch__item">Завтра</a>
                <a href="/" class="tasks-switch__item">Просроченные</a>
            </nav>

            <label class="checkbox">
                <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
                <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?php if ($show_complete_tasks): ?>checked<?php endif; ?> >
                <span class="checkbox__text">Показывать выполненные</span>
            </label>
        </div>

        <table class="tasks">
            <?php foreach ($task_list as $task_item): ?>
                <?php if ($task_item['name']): ?>
                    <?php if ($task_item['status'] && $show_complete_tasks === 0) continue; ?>
                    <tr class="tasks__item task
                        <?php if ($task_item['status']): ?>task--completed
                        <?php elseif ($task_item['dt_expire'] !== null && get_remain_hours($task_item['dt_expire']) <= 24): ?> task--important <?php endif; ?>">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1" <?php if ($task_item['status']): ?>checked<?php endif; ?>>
                                <span class="checkbox__text"><?=$task_item['name']; ?></span>
                            </label>
                        </td>

                        <td class="task__file">
                            <a class="download-link" href="<?=$task_item['link']; ?>"></a>
                        </td>

                        <td class="task__date"><?=$task_item['dt_expire'] = date('Y-m-d'); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach ?>
        </table>
    </main>
</div>
