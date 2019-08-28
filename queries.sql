/* заполнение справочника категорий */
INSERT INTO categories (id, name, symbol_code) 
VALUES 
('1', 'Доски и лыжи', 'boards'),
('2','Крепления', 'attachment'),
('3','Ботинки', 'boots'),
('4','Одежда','clothing'),
('5','Инструменты', 'tools'),
('6','Разное', 'other');

/* заполнение таблицы пользователей */
INSERT INTO users (id, email, password, name, contact) 
VALUES 
('1','slavka@bk.ru', '45kjkjh64KJ98JJKj', 'Вячеслав Иванов', 'Москва, переулок 1, дом 2, квартира 3, телефон 83-67-23'),
('2','bodrov@ya.ru', 'KJJHkpwv87jlTYTYp', 'Василий Бодров', 'Пермь, проспект 4, дом 5, квартира 6, телефон 4-65-82');

/* заполнение списка объявлений */
INSERT INTO lots (id, name, description, image, category, start_date, start_price, finish_date, finish_price, step, author) 
VALUES 
('1','2014 Rossignol District Snowboard',
 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.',
 'snowboard1.jpg',
 '1',
 '20190806224303',
 '10999',
 '20190816',
 '13999',
 '1000',
 '1'),
('2','DC Ply Mens 2016/2017 Snowboard',
 'Легкий маневренный сноуборд.',
 'snowboard2.jpg',
 '1',
 '20190804091240',
 '15999',
 '20190814',
 '19999',
 '1000',
 '1'),
('3','Крепления Union Contact Pro 2015 года размер L/XL',
 'Крепление для сноуборда.',
 'clamp1.png',
 '2',
 '20190814192232',
 '8000',
 '20190824',
 '12000',
 '1000',
 '1'),
('4','Ботинки для сноуборда DC Mutiny Charocal',
 'Ботинки для сноуборда.',
 'boots1.jpg',
 '3',
 '20190815104814',
 '10999',
 '20190825',
 '12999',
 '1000',
 '2'),
('5','Куртка для сноуборда DC Mutiny Charocal',
 'Куртка для сноуборда.',
 'jacket1.jpg',
 '4',
 '20190811140257',
 '10999',
 '20190821',
 '10999',
 '1000',
 '2'),
('6','Маска Oakley Canopy',
 'Маска горнолыжная.',
 'mask1.jpg',
 '6',
 '20190823192243',
 '5500',
 '20190830',
 '8500',
 '500',
 '1');

/* заполнение таблицы ставок */
INSERT INTO bets (date_bet, bet, user, id_lot) 
VALUES 
('20190815094823','9000', '2', '3'),
('20190816160728','10000', '2', '3');


/* получить все категории */
SELECT name FROM categories;

/* получить самые новые, открытые лоты */
SELECT l.name, l.start_price, l.image, l.finish_price, c.name FROM lots l, categories c WHERE l.category=c.id AND l.winner IS NULL;

/* показать лот по его id. Получите также название категории, к которой принадлежит лот */
SELECT l.name, l.start_price, l.image, l.finish_price, c.name FROM lots l, categories c WHERE l.category=c.id AND l.id=3;

/* обновить название лота по его идентификатору */
UPDATE lots SET name='Куртка для сноуборда DC Mutiny Charocal красная' WHERE id=5;

/* получить список ставок для лота по его идентификатору с сортировкой по дате */
SELECT u.name, l.name, b.bet, b.date_bet FROM bets b, users u, lots l WHERE b.user=u.id AND b.id_lot=l.id AND id_lot=3 ORDER BY date_bet;