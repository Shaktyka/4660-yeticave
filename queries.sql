/* Вставка списка категорий */

INSERT INTO categories (category)
VALUES ('Доски и лыжи');
INSERT INTO categories (category)
VALUES ('Крепления');
INSERT INTO categories (category)
VALUES ('Ботинки');
INSERT INTO categories (category)
VALUES ('Одежда');
INSERT INTO categories (category)
VALUES ('Инструменты');
INSERT INTO categories (category)
VALUES ('Разное');

/* Вставка данных двух пользователей */

INSERT INTO users (email, user_pass, user_name, contacts, avatar, reg_date)
VALUES ('ignat.v@gmail.com', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', 'Игнат', 'Skype: ignat_boss', 'img/avatar.jpg', '2018-09-24 10:20:05');

INSERT INTO users (email, user_pass, user_name, contacts, avatar, reg_date)
VALUES ('kitty_93@li.ru', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', 'Леночка', 'ВКонтакте https://vk.com/lenochka', 'img/lena.jpg', '2018-09-25 12:55:55');

INSERT INTO users (email, user_pass, user_name, contacts, avatar, reg_date)
VALUES ('anton_ant@bk.ru', 'o41IEdMHkYoSVa$2y$10$rnJ7rxmIe63ABubWtSjUhwgggtxbHQs0AS0hgnO', 'Anthony', 'Пиши в слак: anthony_anthony', '', '2018-09-26 15:00:25');

/* Вставка списка объявлениям */

INSERT INTO lots (user_id, title, category_id, description, img_path, start_date, start_price, end_date, bet_step)
VALUES (1, '2014 Rossignol District Snowboard', 1, 'The Rossignol District Amptek Snowboard is an user-friendly freestyle board for the aspiring park and pipe riders. Rossignol combines with slight camber for a forgiving yet stable ride. A softer symmetrical flex makes the District an easy-to-ride board.', 'img/lot-1.jpg', '2018-09-24 11:20:00', 10999, '2018-09-25 11:20:00', 2000);

INSERT INTO lots (user_id, title, category_id, description, img_path, start_date, start_price, end_date, bet_step)
VALUES (1, 'DC Ply Mens 2016/2017 Snowboard', 1, 'As park-builders continue to add menacing new features, DC continues to evolve their boards to match the increasing technicality of terrain parks. The DC Ply Snowboard is concrete proof. With their Tear The Roof Off construction, this board does everyything to stay light and controllable in the air.', 'img/lot-2.jpg', '2018-09-24 13:20:00', 159999, '2018-09-25 13:20:00', 3000);

INSERT INTO lots (user_id, title, category_id, description, img_path, start_date, start_price, end_date, bet_step)
VALUES (2, 'Крепления Union Contact Pro 2015 года размер L/XL', 2, 'Почти новые. Так и не научилась пользоваться :(((', 'img/lot-3.jpg', '2018-09-25 14:15:00', 8000, '2018-09-26 14:15:00', 500);

INSERT INTO lots (user_id, title, category_id, description, img_path, start_date, start_price, end_date, bet_step)
VALUES (2, 'Ботинки для сноуборда DC Mutiny Charocal', 3, 'Совсем новые! Отличные ботинки, рекомендую всем!!!', 'img/lot-4.jpg', '2018-09-25 15:15:00', 10999, '2018-09-26 15:15:00', 1500);

INSERT INTO lots (user_id, title, category_id, description, img_path, start_date, start_price, end_date, bet_step)
VALUES (1, 'Куртка для сноуборда DC Mutiny Charocal', 4, 'Бывала во многих передрягах. С автографом снежного барса и следами неудачной встречи нового года.', 'img/lot-5.jpg', '2018-09-26 09:10:00', 7500, '2018-09-27 09:10:00', 200);

INSERT INTO lots (user_id, title, category_id, description, img_path, start_date, start_price, end_date, bet_step)
VALUES (1, 'Маска Oakley Can', 6, 'Увеличенный объем линзы и низкий профиль оправы маски Canopy способствуют широкому углу обзора, а специальное противотуманное покрытие поможет ориентироваться в условиях плохой видимости.', 'img/lot-6.jpg', '2018-09-26 11:30:00', 5400, '2018-09-27 11:30:00', 300);

/* Вставка двух ставок по объявлению */

INSERT INTO bets (user_id, lot_id, bet_date, amount)
VALUES (2, 1, '2018-09-25 06:35:05', 12999);

INSERT INTO bets (user_id, lot_id, bet_date, amount)
VALUES (1, 4, '2018-09-25 22:03:35', 12499);

INSERT INTO bets (user_id, lot_id, bet_date, amount)
VALUES (3, 1, '2018-09-26 15:15:05', 12999);

INSERT INTO bets (user_id, lot_id, bet_date, amount)
VALUES (3, 4, '2018-09-26 15:20:45', 12499);

/* Получаем все категории */

SELECT * FROM categories;

/* Показываем новые, открытые лоты (название, стартовая цена, ссылка на изображение, цена, количество ставок, название категории). */



/* Показываем лот и его категорию по id лота. */

/* Если нужно только название лота и котегории */
SELECT title, category FROM lots
JOIN categories
ON category_id = cat_id
WHERE lot_id = 1;

/* Если нужны более подробные данные по лоту и его категория */

SELECT title, category, description, img_path, start_date, end_date, start_price, bet_step 
FROM lots l
JOIN categories c
ON l.category_id = c.cat_id
WHERE l.lot_id = 1;

/* Обновление названия лота по его id; */

UPDATE lots
SET title ='Маска Oakley Canopy'
WHERE lot_id = 6;

/* Список самых свежих ставок для лота по его идентификатору; */
