-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 15 2020 г., 19:42
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name_image` varchar(64) NOT NULL,
  `name_product` varchar(64) NOT NULL,
  `number_views` int(11) NOT NULL DEFAULT 1 COMMENT 'количество просмотров',
  `price_product` int(11) NOT NULL,
  `description` text NOT NULL COMMENT 'описание товара'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name_image`, `name_product`, `number_views`, `price_product`, `description`) VALUES
(1, '10021029b.jpg', 'Фотоаппарат зеркальный Canon EOS 2000D EF-S 18-55 III Kit', 2, 24990, '9 точек фокусировки – вы можете быть уверены, что все важные детали на снимке получатся чёткими. При этом лица камера распознает автоматически.'),
(2, '30047907b.jpg', 'Смартфон Samsung Galaxy A71 Black(SM-A715F/DSM)', 13, 29990, 'Вам не понадобится большой фотоаппарат. Эта модель снабжена четырьмя камерами, которые позволяют делать потрясающие селфи, насыщенные пейзажи, фиксировать красивые ночные сцены и яркие моменты спортивных состязаний. Дополнительные фильтры дадут возможность сразу обработать кадры, чтобы поделиться ими с друзьями.'),
(3, '30046825b.jpg', 'Ноутбук ASUS F540UB-DM1514T', 26, 34990, 'Вы можете купить Ноутбук ASUS F540UB-DM1514T в магазинах М.Видео по доступной цене. Ноутбук ASUS F540UB-DM1514T: описание, фото, характеристики, отзывы покупателей, инструкция и аксессуары.'),
(4, '10021620b.jpg', 'Телевизор Samsung UE50RU7200U', 5, 35990, 'C технологией PurColor вы увидите оттенки такими, какими они должны быть в жизни. Насыщенные, но при этом естественные цвета помогут вам лучше погрузиться в происходящее на экране. А благодаря HDR 10+ освещение сцен будет выглядеть натуральным, без засвеченных или слишком тёмных участков.'),
(5, 'nofhoto.jpg', 'Тест', 2, 50000, 'описание'),
(16, '8.jpg', 'товар', 3, 5000, 'qwgqwg'),
(18, '8.jpg', 'товар', 1, 5000, 'qwgqwg'),
(19, '4.jpg', 'товар2', 1, 100000, 'vddfbdf');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL COMMENT 'автор отзыва',
  `text` text NOT NULL COMMENT 'текст отзыва',
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `user_name`, `text`, `id_product`) VALUES
(1, 'Катя', 'Неплохая недорогая камера. Объектив стандартный и на все дела пойдет. Можно и по портретам сработать и по пейзажам. Снимки делает четкие, с приличной резкостью. Фокусирует по 9 точкам поэтому делает это очень быстро. Корпус ухватистый. В руках держать удобно. Сбрасывает фото по вай-фай плюс по НФЦ можно. Матрица крупная 22.3 x 14.9 миллиметров. Стабилизатор очень эффективный. Снимаю с рук и никакой дрожи в кадре.', 1),
(2, 'Андрей', 'Пользуюсь уже неделю, заряд держит отлично, заряжается очень быстро. Звук отличный, даже в наушниках. А дисплей просто сказка, очень сочный, без бликов, камера которая «врезана» в дисплей смотрится рамного лучше, чем каплевидный вырез. В игры не играю, тем кому нужен идеальным смартфон, с отличным соотношением и балансом, однозначно стоит рассмотреть данную модель к покупке.', 2),
(3, 'Виталий', 'Напишу подробно, так как сам долго выбирал. До недавнего времени дома стоял старый и надёжный Sony. Но с появлением детей появилась необходимость включать современные мультики днем и при этом иметь возможность просматривать фильмы в 4К по блютуз наушникам вечером. Выбирал между LG и Samsung. Изначально смотрел 43 дюйма с пределом в 30000 руб. Однако позже перешёл на 50 и соответственно пришлось перешагнуть за 30к. Все таки сидя на диване 50 смотрится явно лучше. Проблема возникла именно с выбором модели имеющей блютуз. Да. 2020 год на дворе. По совету друзей чаша весов перевалила на сторону самсунга,так как видел аналогичные модели в гостях. Одно знал точно, что это должна быть 7 серия и год выпуска 2019. Так как в квартире работает умный дом от яндекса, а телевизоры самсунг 2019 года выпуска 7 серии работают с Алисой. Очень удобно. И вот упёрся в блютуз, а точнее его поголовное отсутствие. Самое интересное, что во всех сетях, и эльдорадо и м.видео и днс и даже в официальном самсунг, все говорили, что подключить наушники блютуз можно только начиная с моделей 7400 и выше. Решил позвонить на горячую линию. Молодой человек уверил, что данная модель имеет все:и Алису и блютуз и управление голосом и т.д. И все таки в одном из магазинов м. видео нашёлся консультант, который сказал:\"да стопудово работает, что я только к нему по блютуз не подключал\". И жестом руки, взяв с соседней полки колонку JBL, он за 2 секунды её подключил. При всем при этом, на него была очень хорошая цена и 7000 руб бонусами в м.видео. Я купил. Доволен как индюк. Повесил на стену, подключил вай фай, умный дом с Алисой, блютуз наушники. Всё летает, ничего не глючит. 4К с ivi и megogo грузит без глюков. Цветопередача 1400,что по сравнению с Sony 2000-х годов просто космос. В общем получил все что хотел. Советую однозначно. ', 4),
(4, 'Анастасия', 'Не нагревается вообще, бесшумный, цветопередача отличная, для игр самое то, не заедает', 3),
(5, 'Виктория', 'Может я конечно придераюсь, но он не стоит этих денег на мой взгляд. Очень лёгкий это плюс, но когда открываешь крышку низ ноута подскакивает. Изображение отдает какой-то желтизной, звук глуховат. Быстро нагревается и гудит и это в первый день работы. Брала чисто смотреть фильмы, но недовольна картинкой и звуком. Окна открывает ни так быстро как хотелось бы, несколько действий одновременно начинает уже тормозить. Играть я не играю, мне кажется он взорвется от перегрева если на нем час поиграть. В общем начинка отличная, но на деле много косяков. Просто свой старый ноут покупала в 3 раза дешевле и в принципе он не намного отличается от этого, хотя он селерон.', 3),
(6, 'Камиль', 'Тест', 1),
(7, 'Камиль', 'отзыв', 4),
(8, 'Камиль', 'отзыв', 4),
(9, 'Камиль', 'отзыв2', 4),
(10, 'Камиль', 'faghreaahba', 1),
(11, 'Камиль', 'ЕШе отзыв', 1),
(12, 'Камиль', 'ЕШе отзыв', 1),
(13, 'Камиль', 'hrtjej', 3),
(14, 'Камиль', 'qwfqg', 2),
(15, 'Камиль', 'vearbebeanb', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_number` int(64) NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` varchar(64) NOT NULL DEFAULT 'не оплачен'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `phone_number`, `address`, `status`) VALUES
(1, 2, 123456789, 'Магнитогорск', 'не оплачен'),
(2, 1, 123465789, 'Аскарово', 'не оплачен'),
(3, 1, 123456789, 'Уфа', 'не оплачен'),
(4, 2, 1123, 'Аскарово', 'не оплачен'),
(5, 2, 1123, 'Аскарово', 'не оплачен'),
(6, 1, 1123, 'Аскарово', 'не оплачен'),
(7, 1, 1123, 'Аскарово', 'не оплачен'),
(8, 1, 1123, 'Аскарово', 'не оплачен'),
(9, 1, 1123, 'Аскарово', 'не оплачен');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `good_name` varchar(250) NOT NULL,
  `count` int(64) NOT NULL,
  `price` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `good_id`, `good_name`, `count`, `price`) VALUES
(1, 1, 1, 'Тест', 1, '24990');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `role` varchar(64) NOT NULL DEFAULT '0',
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `role`, `user_login`, `user_password`) VALUES
(1, 'Камиль', 'admin', 'admin', '$2y$10$ihYMblUYwt1iEPRdMtnrZeQnBso7DAOZw91FDHzuiaoF4W0TQYWZi'),
(2, 'Гость', '0', 'guest', '$2y$10$PwljfiBx9RvCIj87E0kpwukMAPx2F6yzVk8c42Bl2RjLgiqtPGTnu'),
(4, 'ТЕСТ', '0', 'mike', '$2y$10$kz0XaCqS5IYdEomXpUQzMuls9eMB4FXmnom3csw9biwihLqiWJ8Ue'),
(5, 'JOHN', '0', 'john', '$2y$10$CRbDusYDu3gLVxMnhjot2egYiOs4r5zJj48DJTy/5qhEQAbPEEMN6');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
