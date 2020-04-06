
-- Создание таблицы данных

CREATE DATABASE gallery

-- Структура таблицы `images`

CREATE TABLE 'images'(
`id` int
(11) NOT NULL AUTO_INCREMENT,
`path` varchar
(255) NOT NULL,
`size` int
(11) NOT NULL,
`name` varchar
(64) NOT NULL,
`views` int
(11) DEFAULT NULL,
`description` text,
PRIMARY KEY
(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Данные таблицы `images`

INSERT INTO `images` (`
path`,
`size
`, `name`, `views`, `description`) VALUES
('images', 200000, '1.jpg', 0,  NULL),
('images', 200000, '2.jpg', 0,  NULL),
('images', 200000, '3.jpg', 0,  NULL),
('images', 200000, '4.jpg', 0,  NULL);

