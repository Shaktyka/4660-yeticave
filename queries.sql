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

/* Получаем все категории */

SELECT * FROM categories;

/* получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории */

/* показать лот по его id. Получите также название категории, к которой принадлежит лот */

/* Обновление названия лота по его id; */

UPDATE lots
SET title ='Маска Oakley Canopy'
WHERE lot_id = 6;

/* получить список самых свежих ставок для лота по его идентификатору; */
