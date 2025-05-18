-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 07 2023 г., 06:21
-- Версия сервера: 8.0.31
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `red-atom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `id_post` int NOT NULL,
  `id_user` int NOT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `status`, `id_post`, `id_user`, `content`, `created_date`) VALUES
(28, 1, 64, 71, 'Здравствуйте, это первый отправленный комментарий', '2023-05-27 16:31:17'),
(29, 0, 64, 71, 'Этот комментарий прошел модерацию', '2023-05-27 16:31:31'),
(33, 0, 64, 71, 'СТАС', '2023-05-27 20:39:00'),
(35, 1, 64, 76, 'Это мой коммент', '2023-05-28 21:52:35'),
(36, 1, 64, 77, 'Комментарий', '2023-06-03 00:42:08');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint NOT NULL,
  `id_topic` int DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `title`, `img`, `content`, `status`, `id_topic`, `created_date`) VALUES
(63, 71, 'Дневник разработчика №1', '!default.png', '<p>Здравствуйте, уважаемые игроки! Мы к вам с новостями:<br><br>1. Администрация объявляет о начале тестирования нового вида доступа к серверу - пробный период и регистрация.<br><br>Данный вид доступа обусловлен тем, что каждый игрок имеет возможность зайти и поиграть на сервере, но зарегистрированный игрок имеет следующие права:<br><br>1. Право бесплатно получить жильё на любой станции.<br>2. Право подавать жалобы на игроков<br>3. Право на обжалование наказания.<br>4. Право на вступление в группировку.<br>5. Право на управление группировкой.<br>6. Право занимать посты хелпера, куратора и старшего куратора.<br>7. Право определять вектор развития сервера и модификации через голосования.<br>8. Возможность видеть процесс работы над модификацией в канале \"Разработка\".<br>9. Возможность видеть инсайды от администрации.<br>10. Возможность коммуницировать с игроками сервера через основной чат.<br>11. Право на создание своей группировки.<br><br>Также к незарегистрированным игрокам в несколько раз строже, чем обычно. Вы должны осознавать, что пока вы не зарегистрированы вы находитесь на испытательном сроке.<br><br>2. Введена старая система гражданств.<br><br>На нашем сервере, каждый зарегистрированный игрок может бесплатно получить жильё на любой из предложенных ниже станций.<br><br>Для этого вам необходимо связаться с начальником выбранной вами станции через discrod и обсудить получение квартиры.<br><br>Квартира игроку предоставляется полностью бесплатно, НО по истечению 2х дней игрок обязан платить начальнику станции аренду за проживание, размер которой обговаривается заранее с начальником.</p>', 1, 30, '2023-05-22 13:47:32'),
(64, 71, 'Обновление #1', '1684753220_UGxEOQ6XE1s.jpg', '<h2><strong>Внутриигровые добавления</strong></h2><p><strong>Новые локации и станции</strong></p><p> </p><p>В первом обновлении были добавлены новые станции на карту, а именно Белорусская и Маяковская.</p><p>Белорусская будет являться станцией принадлежащей новой группировке “Фермы”. Основная специализация станции - выращивание провизии.</p><p>Маяковская - заброшенная станция сразу после Тверской. Она непригодна для жизни, но игрокам предстоит узнать почему.<br>Вместе с новыми станциями были добавлены и необходимые технические помещения.</p><p><br><strong>Изменения на старых локациях</strong></p><p> </p><p>Были исправлены многие недоработки, которые обнаружили игроки.</p><p>Было добавлено освещение на Метромосту, для удобства перестрелок на нём.<br>Дизайн станции Новокузнецкая немного изменился. В пустую часть станции была добавлена палатка как и зона для торговца. Подвалы были замурованы из-за ненадобности.<br><br><br><br><strong>Изменения системы гражданств</strong></p><p> </p><p>В данном обновлении будет изменена система получения гражданств, поскольку она давала недобросовестным игрокам слишком просто получать жилье и быстро терять “интерес” к серверу.</p><p>Отныне гражданство можно получить на станциях Рейха и Красной Линии только через написание истории своего персонажа и отправки ее в соответствующую форму (см.”гражданства” в discord).</p><p>Гражданство КЛ/Рейха дает право возможности покупки жилья на их станциях. Цена на жильё будет регулироваться администрацией.</p><p>Гражданство можно получить рп-путём через начальника станции, но за значимое количество игровой валюты.</p><p>На нейтральных станциях можно сразу же приобретать жилье через начальника станции, без написания квент/получения гражданства.</p><p>Ранее выданные гражданства аннулируются.<br><br><br><strong>Система рейтинга</strong></p><p> </p><p>Администрацией вводится система рейтинга для стимуляции группировок к активности.</p><p>Рейтинг будет вестись по десятибалльной шкале. Стартовая точкой в ней является пять.</p><p> </p><p><strong>Что если группировка набрала 10/10?</strong></p><p><br>Если она сможет удержать данный параметр до конца сезона, то она становится лучшей по мнению администрации в данном сезоне.</p><p> </p><p><strong>Что если группировка набрала 0/10?</strong></p><p><br>Она получает 1 выговор. Если она находится в таком состоянии больше двух дней - то она расформировывается.</p><p> </p><p><strong>Кто начисляет баллы?</strong></p><p><br>Баллы начисляются администрацией на баланс группировки, также как и отнимаются.</p><p> </p><p><strong>Для чего они необходимы?</strong></p><p><br>Количество баллов показывает отношение администрации к данной группировке. Чем их больше - тем больше вам будет помогать администрация, например, устраивать какие-то ивенты или обустраивать станции.</p><p> </p><p><strong>За что начисляются баллы?</strong></p><p><br>Баллы начисляются администрацией за проведение мероприятий группировкой, помощь новичкам, создание атмосферы и в целом хорошее отыгрывание роли.</p><p> </p><p><strong>За что отнимаются баллы?</strong></p><p> </p><p>За неадекватное поведение, руин атмосферы и нарушение правил.</p><p> </p><p><strong>Изменение времени работы сервера</strong></p><p> </p><p>Начались трудные учебные дни, поэтому время запуска сервера переносится на 16.00 по МСК, а время выключения на 00.00 по МСК.</p><p> </p><p><strong>Вайп</strong></p><p> </p><p>Произошел полный вайп персонажей и построек. Также как и вайп отношений между группировками.</p><p>Появился раздел в Discord #лор, в котором будет записываться информация, которая является известной всем игрокам на сервере. В основном туда будут записываться итоги сезона.</p>', 1, 28, '2023-05-22 14:00:20');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int NOT NULL,
  `name` varchar(121) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(28, 'Обновления', 'Для обновлений'),
(29, 'Игровые', 'Для игровых событи'),
(30, 'Дневник', 'Дневник разработчика');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `admin` tinyint NOT NULL,
  `blocked` tinyint NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `blocked`, `username`, `email`, `password`, `created`) VALUES
(71, 1, 0, '123password', '123@password', '$2y$10$tznw95YscHqXQcTcoGA1qOl0kDV7lCVWqA6Ce04aZTA7VT5Fvl9K2', '2023-05-19 09:06:50'),
(73, 0, 0, 'test2', 'test2@password', '$2y$10$2r1MXXS9Ivx73YwSAbGeS..2vUVFitokF3gNZo5sqeFzpgsos3kNC', '2023-05-19 09:35:00'),
(75, 0, 1, 'banned', 'banned@password', '$2y$10$vpjoecLa/tcDfVkg2EUjLeivgmfyXMsBisCxrNreGNSTq5lMoKE8e', '2023-05-27 18:02:37'),
(76, 0, 1, 'user', 'user@password', '$2y$10$R/fAEJdK0ikv4xuSJ9A8GuRA/eUfuCmsviz1uECfW/5srRScyxRT6', '2023-05-28 18:32:40'),
(77, 1, 0, 'username', 'username@pass', '$2y$10$YWEdRsoxJJk9.g/sj4f7LufWWYRS3AEmtQMnjZRiKzDS1VuGpw3ke', '2023-06-02 09:23:33'),
(78, 0, 0, 'testmail', 'mail@mail', '$2y$10$ear1EFl2kdRz991jClE.v.RGVj1z/O5339443umygeYnQuX26JivO', '2023-06-04 15:07:19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
