INSERT INTO categories SET name = 'Доски и лыжи';
INSERT INTO categories SET name = 'Крепления';
INSERT INTO categories SET name = 'Ботинки';
INSERT INTO categories SET name = 'Одежда';
INSERT INTO categories SET name = 'Инструменты';
INSERT INTO categories SET name = 'Разное';

INSERT INTO users 
SET email = 'ignat.v@gmail.com',
password = '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka',
data_register ='19.02.2018',
name = 'Игнат',
lots_id = '1',
rats_id = '1';

INSERT INTO users 
SET email = 'kitty_93@li.ru',
password = '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa',
data_register ='17.02.2018',
lots_id = '2',
name = 'Лиза',
rats_id = '2';

INSERT INTO users 
SET email = 'warrior07@mail.ru',
password = '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW',
data_register ='20.02.2018',
name = 'Руслан',
lots_id = '3';


INSERT INTO lots
SET name = '2014 Rossignol District Snowboard',
cat_id = '1',
start_price ='10999',
img_path = 'img/lot-1.jpg',
date_init ='16.02.19',
autor_id = '1';

INSERT INTO lots
SET name = 'DC Ply Mens 2016/2017 Snowboard',
cat_id = '1',
start_price ='159999',
img_path = 'img/lot-2.jpg',
date_init ='17.02.19',
autor_id = '2';

INSERT INTO lots
SET name = 'Крепления Union Contact Pro 2015 года размер L/XL',
cat_id = '2',
start_price ='8000',
date_init ='18.02.19',
img_path = 'img/lot-3.jpg',
autor_id = '3';

INSERT INTO lots
SET name = 'Ботинки для сноуборда DC Mutiny Charocal',
cat_id = '3',
start_price ='10999',
date_init ='19.02.19',
img_path = 'img/lot-4.jpg',
date_end = '20.02.19',
winner_id ='2',
count_favor = '3',
autor_id = '4';

INSERT INTO lots
SET name = 'Куртка для сноуборда DC Mutiny Charocal',
cat_id = '4',
start_price ='7500',
date_init ='20.02.19',
img_path = 'img/lot-5.jpg',
autor_id = '5';

INSERT INTO lots
SET name = 'Маска Oakley Canopy',
cat_id = '6',
start_price ='5400',
date_init ='15.02.19',
img_path = 'img/lot-6.jpg',
date_end = '16.02.19',
winner_id ='1',
count_favor = '3',
autor_id = '6';




INSERT INTO rats
SET date_rat = '01.01.19',
price = '6000',
autor_id ='1',
lots_id = '2';

INSERT INTO rats
SET date_rat = '02.01.19',
price = '6600',
autor_id ='2',
lots_id = '2';

-- Получить все категории
SELECT * FROM categories;

-- Получить самые новые, открытые лоты
SELECT * FROM lots l
JOIN categories c
ON l.cat_id = c.id
WHERE date_end IS NOT NULL ORDER BY date_init ASC;

-- Показать лот по его id, и название категории
SELECT * FROM lots l
JOIN categories c
ON l.cat_id = c.id
WHERE l.id = '5';

-- Обновить название лота по его идентификатору
UPDATE lots SET name = 'Доска два с***ка'
WHERE id = '2';

-- Получить список самых свежих ставок для лота по его ид
SELECT * FROM rats WHERE lots_id = '2' ORDER BY date_rat ASC;