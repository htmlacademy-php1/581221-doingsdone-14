INSERT INTO users(email, password, dt_add) VALUES
  ('vasya@mail.ru', 'secret', NOW()),
  ('user@yandex.ru', 'qwerty123', NOW());

INSERT INTO projects(name, user_id) VALUES
  ('Входящие', 1),
  ('Учеба', 1),
  ('Работа', 1),
  ('Домашние дела', 2),
  ('Авто', 2);

INSERT INTO tasks (status, name, dt_add, dt_expire, user_id, project_id) VALUES
  (0, 'Собеседование в IT компании', NOW(), '2022-04-30', 1, 3),
  (0, 'Выполнить тестовое задание', NOW(), '2022-04-29', 1, 3),
  (1, 'Сделать задание первого раздела', NOW(), '2022-04-28', 1, 2),
  (0, 'Встреча с другом', NOW(), '2019-12-22', 1, 1),
  (0, 'Купить корм для кота', NOW(), null, 2, 4),
  (0, 'Заказать пиццу', NOW(), null, 2, 4);

-- получить список из всех проектов для одного пользователя

SELECT name FROM projects WHERE user_id = 1;

-- получить список из всех задач для одного проекта

SELECT name FROM tasks WHERE project_id = 4;

-- пометить задачу как выполненную

UPDATE tasks SET status = 1 WHERE id = 32;

-- обновить название задачи по её идентификатору

UPDATE tasks SET name = 'Заказать суши' WHERE id = 36;
