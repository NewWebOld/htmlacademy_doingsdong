insert into project (name_category, user_id)
values
	('Входящие', 1),
	('Учеба', 1),
	('Работа', 1),
	('Домашние дела', 2),
	('Авто', 2);

INSERT INTO users (email, name_user, password_user)
VALUES
	('max.web.tregubov@gmail.com', 'Максим', 'Anime5life!'),
    ('test@yandex.ru', 'Даша', 'Qwerty123');

insert into task (status, name_task, date_completion, user_id, project_id)
values
	(0, 'Поиграть в LoL', '2023-06-11', 1, 8),
	(0, 'Выполнить тестовое задание', '2023-03-30', 1, 3),
	(1, 'Сделать задание первого раздела', '2023-06-11', 1, 2),
	(0, 'Встреча с другом', '2023-06-27', 2, 1),
	(0, 'Купить корм для кот', '2023-06-11', 2, 4),
	(0, 'Заказать пиццу', '2023-06-11', 2, 4);


/*Получаем список всех проектов для одного пользователя*/
select project.name_category as 'Проекты', users.name_user as 'Пользователь'
from project 
join users on project.user_id = users.id 
where users.id = 1;
/*Получаем список всех задач для одного проекта*/
select task.name_task 
from task 
where project_id = 3;
/*Помечаем задачу как выполненую*/
update task
set status = 1
where name_task  = 'Поиграть в LoL';
/*Обновляем название задачи по её идентификатору*/
update task 
set name_task = 'LOL'
where id = 7;