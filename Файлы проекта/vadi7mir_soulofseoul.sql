-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2013 at 10:57 PM
-- Server version: 5.1.66-rel14.1
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vadi7mir_soulofseoul`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_country` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `code_country`, `name`) VALUES
(1, 1, 'Seoul'),
(2, 1, 'Busan'),
(3, 1, 'Daegu');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'South Korea'),
(2, 'Kazakhstan'),
(3, 'Russia'),
(4, 'Turkey');

-- --------------------------------------------------------

--
-- Table structure for table `hotelphotos`
--

CREATE TABLE IF NOT EXISTS `hotelphotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_hotel` int(11) NOT NULL,
  `photoSrc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `hotelphotos`
--

INSERT INTO `hotelphotos` (`id`, `code_hotel`, `photoSrc`) VALUES
(72, 41, '../commonImages/hotels/1369122490_0.jpg'),
(73, 41, '../commonImages/hotels/1369122490_2.jpg'),
(74, 41, '../commonImages/hotels/1369122490_4.jpg'),
(75, 42, '../commonImages/hotels/1369123297_0.jpg'),
(76, 42, '../commonImages/hotels/1369123297_1.jpg'),
(77, 42, '../commonImages/hotels/1369123297_2.jpg'),
(78, 42, '../commonImages/hotels/1369123297_4.jpg'),
(79, 43, '../commonImages/hotels/1369124156_0.jpg'),
(80, 43, '../commonImages/hotels/1369124157_1.jpg'),
(81, 43, '../commonImages/hotels/1369124157_2.jpg'),
(82, 43, '../commonImages/hotels/1369124157_3.jpg'),
(83, 43, '../commonImages/hotels/1369124157_4.jpg'),
(84, 43, '../commonImages/hotels/1369124157_5.jpg'),
(85, 44, '../commonImages/hotels/1369142749_0.jpg'),
(86, 44, '../commonImages/hotels/1369142750_1.jpg'),
(87, 44, '../commonImages/hotels/1369142750_2.jpg'),
(88, 44, '../commonImages/hotels/1369142750_4.jpg'),
(89, 45, '../commonImages/hotels/1369143219_0.jpg'),
(90, 45, '../commonImages/hotels/1369143219_1.jpg'),
(91, 45, '../commonImages/hotels/1369143219_2.jpg'),
(92, 45, '../commonImages/hotels/1369143220_3.jpg'),
(93, 45, '../commonImages/hotels/1369143220_4.jpg'),
(94, 46, '../commonImages/hotels/1369143342_0.jpg'),
(95, 46, '../commonImages/hotels/1369143342_1.jpg'),
(96, 46, '../commonImages/hotels/1369143343_2.jpg'),
(97, 46, '../commonImages/hotels/1369143343_3.jpg'),
(98, 46, '../commonImages/hotels/1369143343_4.jpg'),
(99, 47, '../commonImages/hotels/1369143425_0.jpg'),
(100, 47, '../commonImages/hotels/1369143425_1.jpg'),
(101, 47, '../commonImages/hotels/1369143425_2.jpg'),
(102, 47, './images/hotel_photos/1369143425_4.jpg'),
(103, 48, './images/hotel_photos/1369143514_0.jpg'),
(104, 48, './images/hotel_photos/1369143514_1.jpg'),
(105, 48, './images/hotel_photos/1369143514_2.jpg'),
(106, 48, './images/hotel_photos/1369143514_4.jpg'),
(107, 49, './images/hotel_photos/1369143632_0.jpg'),
(108, 49, './images/hotel_photos/1369143632_1.jpg'),
(109, 49, './images/hotel_photos/1369143632_2.jpg'),
(110, 49, './images/hotel_photos/1369143632_4.jpg'),
(111, 50, './images/hotel_photos/1369143735_0.jpg'),
(112, 50, './images/hotel_photos/1369143736_2.jpg'),
(113, 50, './images/hotel_photos/1369143736_4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotelreviews`
--

CREATE TABLE IF NOT EXISTS `hotelreviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_hotel` int(11) NOT NULL,
  `code_user` int(11) NOT NULL,
  `review` text NOT NULL,
  `assessment` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `hotelreviews`
--

INSERT INTO `hotelreviews` (`id`, `code_hotel`, `code_user`, `review`, `assessment`, `date`) VALUES
(33, 41, 156, 'В данный отель ехали целенаправленно, так как уже были там ранее год назад. Помню свое первое впечатление от прошлой поездки: Ой как-то все так мрачненько (в голове мелькали сравнения с ранее посещаемыми гостинницами), однако придраться оказалось совершенно не к чему...<br />\n<br />\nОтель расположен в 10 минутах ходьбы от ближайшей станции метро, в 15-20 минутах ходьбы от Инсадона (улицы с потрясающими сувенирными лавками).<br />\n<br />\nНомера стандартные, без особых изысков: но безупречно убранные всегда.<br />\n<br />\nПостельное белье меняли один раз в три дня, полотенца - ежедневно.<br />\n<br />\nЧто касается завтраков - всегда все свежее, вкусное, но есть один минус - всегда одно и то же: сок, кофе, тосты с джемом, омлет, сосиска, обжаренный картофель и салат из капусты.<br />\n<br />\nЧто касается персонала отеля: на первый взгляд может показаться, что они всегда равнодушны, но однако ни одна просьба наша не осталось неудовлетворенной. Все очень хорошо говорят по английски.<br />\n<br />\nМое впечатление: очень хорошее сочетание: цена - качество, я бы его даже отнес в твердую четверку!', 5, '21.05.2013, в 13:52'),
(34, 42, 156, 'Отель не порадовал. Останавливался на Клубном этаже Экзекьютив. но даже на нем - номера дрянь, а лаунж забит прожорливыми американцами. Номера обшарпанные, ванные комнаты вообще позор. В общем Хилтон в своем репертуаре - сколько раз зарекался, но и в этот раз остановился там, о чем и пожалел.', 3, '21.05.2013, в 14:03'),
(35, 44, 159, 'Я выбрал этот отель, потому что это было около аэропорта и предложило бесплатную услугу посадки. Я звонил им по прибытию, и фургон прибыл, чтобы подобрать меня меньше чем через 10 минут. Номер был немного старым, и доступ в интернет был через довольно старый и грязный кабель, который был свернут и придерживался между телевидением и стеной. Когда я не мог найти кабель, ресепшн направил техника по обслуживанию наверх сразу же, чтобы помочь. Была дополнительная оплата 3,000won/day для Пользования Интернетом. Скорость была хорошо когда-то связана. Не было никакого Wi-Fi.Завтрак был также дополнительной платой 13,000won, но, поскольку это оказалось, 2-ой ресторан этажа реконструировался, так не было открытым на завтрак.', 2, '21.05.2013, в 19:29'),
(36, 42, 159, 'Я провел две ночи в Великой Хилтон в апреле 2013. Персонал там был доброжелательным, хорошо осведомленным, размещение, и говорил лучших англичан о где угодно, я когда-либо останавливался в Корее. Отель был 10 минутами ходьбы от самой близкой станции метро, но это была хорошая прогулка. У них также есть почасовый трансферный автобус, который уронит вас на станции на пути к Itaewon. У завтрака было хорошее соединение азиатских и Западных вариантов. Это был хороший способ начать день.Для 10,000 выигранных было очень легко сесть на №6005 автобус от Аэропорта Инчхона до отеля. Автобус остановился у основания холма, и я боялся, что должен буду тащить свои сумки до отеля. Нет. Я автобус-шаттл из отеля обнаружился и привез мне к регистрации. Я доставил такси в аэропорт назад, потому что шел дождь. Всегда есть такси, стоявшие в очереди в отеле, поэтому, легко захватить то. Стоимость поездки назад была 50,000 выигранных и заняла приблизительно 45 минут.Если бы вы - турист, я не уверенный, что останавливался бы здесь, поскольку это немного далеко от действия. Для меня это было отличным, потому что мой бизнес был около Стадиона чемпионата мира.', 4, '21.05.2013, в 19:44'),
(37, 51, 163, 'Хороший отель, хороший сервис.', 5, '22.05.2013, в 10:02');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `classif` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `code_country` int(11) NOT NULL DEFAULT '1',
  `code_city` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `classif`, `description`, `code_country`, `code_city`) VALUES
(41, 'Biwon', '3*', 'Расположение: <br />\r\nГородской, центр<br />\r\n <br />\r\nТранспортная доступность:<br />\r\nБлизость к аэропорту - близко (&gt; 20 до 40 км)<br />\r\n<br />\r\nОб отеле:<br />\r\nОтель Biwon отличается безупречным сервисом, гостеприимной атмосферой и уютными номерами. Отель удобно расположен в самом сердце города, потому будет выгодным предложением и для туристов, и для деловых людей.<br />\r\n <br />\r\nМесторасположение:<br />\r\nОтель расположен в центре города, неподалеку от Changgyeonggung Palace и Dongdaemun Market. Международный аэропорт находится в 57 км от отеля.<br />\r\n <br />\r\nКоличество номеров:<br />\r\n100 номеров.<br />\r\n <br />\r\nТипы номеров:<br />\r\nСтандартные одноместные и двухместные номера.<br />\r\n <br />\r\nОписание номеров:<br />\r\nПросторные и функциональные номера, укомплектованы современной и удобной мебелью.<br />\r\n- ТВ со спутниковыми каналами;<br />\r\n- мини-бар с холодильником;<br />\r\n- кондиционер;<br />\r\n- радио;<br />\r\n- ванная комната с душевой кабиной, феном и туалетными принадлежностями.<br />\r\n <br />\r\nИнфраструктура отеля:<br />\r\n- просторный холл.<br />\r\n <br />\r\nТипы питания:<br />\r\n- буфет с континентальным завтраком.<br />\r\n <br />\r\nБесплатный сервис:<br />\r\n- круглосуточное обслуживание.<br />\r\n <br />\r\nПлатный сервис:<br />\r\n- автостоянка;<br />\r\n- обслуживание номеров;<br />\r\n- прачечная.<br />\r\n <br />\r\nРазвлечения и спорт:<br />\r\n- экскурсии;<br />\r\n- прогулки.<br />\r\n <br />\r\nДля детей:<br />\r\n- не предоставляется.<br />\r\n <br />\r\nРестораны, бары:<br />\r\n- уютный ресторан корейской и международной кухонь;<br />\r\n- стильный бар на верхнем этаже отеля с чудесно панорамой города и большим выбором напитков и закусок.<br />\r\n<br />\r\nЧитать полностью на http://www.tophotels.ru/main/hotel/al22505/', 1, 1),
(42, 'Grand Hilton Seoul Hotel', '5*', 'Расположение:<br />\r\nГородской, близко к центру<br />\r\n<br />\r\nТранспортная доступность:<br />\r\nБлизость к аэропорту - рядом (до 20 км)<br />\r\n<br />\r\nЧитать полностью на http://www.tophotels.ru/main/hotel/al20846/', 1, 1),
(43, 'President', '4*', 'Расположение:<br />\r\nГородской, центр<br />\r\n<br />\r\nТранспортная доступность:<br />\r\nБлизость к аэропорту - близко (&gt; 20 до 40 км)<br />\r\n<br />\r\nОб отеле:<br />\r\nОтель President построен в 1973 году и полностью отреставрирован в 2001 году. Отель порадует теплой домашней атмосферой, уютными номерами, профессиональным обслуживанием и радушным приемом.<br />\r\n <br />\r\nМесторасположение:<br />\r\nОтель расположен в центре города, рядом с Lotte Department Store, Myeongdong Cathedral, Namdaemun Market и Deoksugung Palace. Международный аэропорт находится в 57 км от отеля.<br />\r\n <br />\r\nКоличество номеров:<br />\r\n303 номера.<br />\r\n <br />\r\nТипы номеров:<br />\r\nСтандартные одноместные, двухместные и трехместные номера, номера Suites.<br />\r\n <br />\r\nОписание номеров:<br />\r\nНомера декорированы в корейском стиле, просторные и аккуратные, укомплектованы современной и удобной мебелью.<br />\r\n- ТВ со спутниковыми каналами;<br />\r\n- мини-бар с холодильником;<br />\r\n- кондиционер;<br />\r\n- рабочий стол;<br />\r\n- сейф;<br />\r\n- телефон с прямым набором;<br />\r\n- голосовая почта;<br />\r\n- кофеварка и чайник;<br />\r\n- ванная комната с ванной или душевой кабиной, халатом, тапочками, феном и туалетными принадлежностями.<br />\r\n <br />\r\nИнфраструктура отеля:<br />\r\n- бальный зал;<br />\r\n- лифт; <br />\r\n- конференц-зал;<br />\r\n- бизнес-центр.<br />\r\n <br />\r\nТипы питания:<br />\r\n- буфет с континентальным завтраком.<br />\r\n <br />\r\nБесплатный сервис:<br />\r\n- круглосуточное обслуживание;<br />\r\n- комнаты для некурящих;<br />\r\n- комнаты и оборудование для людей с физическими недостатками;<br />\r\n- свежие газеты;<br />\r\n- транспорт до аэропорта.<br />\r\n <br />\r\nПлатный сервис:<br />\r\n- автостоянка;<br />\r\n- прокат автомобилей;<br />\r\n- сейф у администратора;<br />\r\n- обслуживание номеров;<br />\r\n- пункт обмена валюты;<br />\r\n- магазин подарков;<br />\r\n- организация встреч и банкетов;<br />\r\n- химчистка;<br />\r\n- прачечная;<br />\r\n- парикмахерская;<br />\r\n- косметический салон;<br />\r\n- заказ билетов;<br />\r\n- организация экскурсий;<br />\r\n- услуги переводчика;<br />\r\n- услуги секретаря;<br />\r\n- доступ в Интернет;<br />\r\n- факс;<br />\r\n- принтер.<br />\r\n <br />\r\nРазвлечения и спорт:<br />\r\n- экскурсии;<br />\r\n- прогулки.<br />\r\n <br />\r\nДля детей:<br />\r\n- няня.<br />\r\n <br />\r\nРестораны, бары:<br />\r\n- японский ресторан Dong Hae;<br />\r\n- ресторан с меню шведский стол;<br />\r\n- гриль-бар Iron Plate.<br />\r\n<br />\r\nЧитать полностью на http://www.tophotels.ru/main/hotel/al24818/', 1, 1),
(44, 'Airport Hotel Seoul', '2*', 'Об отеле:<br />\r\nОтель &quot;Александра&quot; располагает 15 номерами и 6 люксами, полностью оборудованными в соответствии с современными тенденциями и требованиями.<br />\r\n<br />\r\nПри строительстве отеля, большое внимание было уделено деталям, которые дают приятное ощущение тепла, что сделает ваш отдых еще более гармоничным. В каждом номере имеется: кондиционер, сейф, телефон, ЖК-телевизор и мини-бар. 9 номеров и 3 апартамента с террасами и в 6 номерах есть французские балконы.<br />\r\n<br />\r\nМесторасположение: <br />\r\nОтель расположен в Рафаиловичи. Это небольшой рыбацкий поселок, с Бечичским пляжем, протяженностью 2000м и кристально чистым морем. Этот пляж в 1936 г в Париже награжден как самый красивый естественный пляж в Европе. В Рафаиловичах есть небольшая удобная бухта для яхт, моторных лодок и катеров. Средиземноморский климат предлагает Вам 226 солнечных дней в году.<br />\r\n<br />\r\nРафаиловиче и Будву связывает пешеходная дорожка протяжённостью 3.2 км, а от Святого Стефана - 2 км. Ежедневно через каждые 30 минут из Рафаиловича до Будви и местных пляжей ходят лодки.<br />\r\n<br />\r\nУдаленность от крупных городов: <br />\r\nRafailovići - Tivat 28 км (до аэропорта – 23 км)<br />\r\nRafailovići - Herceg Novi 50 км<br />\r\nRafailovići - Podgorica 65 км<br />\r\nRafailovići - Budva 3 км<br />\r\nRafailovići – Bar 36 км<br />\r\nRafailovići - Beograd 550 км<br />\r\nRafailovići – Sarajevo 300 км<br />\r\nRafailovići – Zagreb 650 км<br />\r\n<br />\r\nКоличество номеров: <br />\r\n21 номер.<br />\r\n<br />\r\nТипы номеров: <br />\r\n- стандартные двухместные номера;<br />\r\n- двухместный номер с видом на море;<br />\r\n- двухместный номер Супериор;<br />\r\n- Экзекьютив Люкс;<br />\r\n- Superior люкс.<br />\r\n<br />\r\nОписание номеров: <br />\r\nСтандартные двухместные номера - 6 двухместных номеров, каждый с видом на горы. Каждый номер оснащен двуспальной кроватью (200x180) и диван-кроватью (для ребенка). Ванная комната оснащена душевой кабиной. Площадь номера составляет 22 квадратных метров. Во всех номерах есть французский балкон. Максимальное количество гостей: 2 основных места + 1 ребенок (для детей до 12 лет).<br />\r\n<br />\r\nДвухместный номер с видом на море - 3 двухместных номера с видом на море. Каждый номер оснащен двуспальной кроватью (200x180), и диван-кроватью (для ребенка). Ванная комната оснащена душевой кабиной. Площадь номера составляет 25 квадратных метров. Все три номера имеют французский балкон. Максимальное количество гостей: 2 основных места + 1 ребенок (для детей до 12 лет).<br />\r\n<br />\r\nSuperior двухместный номер - 6 двухместных номеров. Каждый номер оснащен двуспальной кроватью (200x180), и диван-кровать (для ребенка). Ванная комната оснащена душевой кабиной. Площадь номера составляет 22 квадратных метров. Все номера имеют террасы. Максимальное количество гостей: 2 основных места + 1 ребенок (для детей до 12 лет).<br />\r\n<br />\r\nЭкзекьютив Люкс - 3 просторных апартамента с роскошным видом на горы, подходит для 4 человек. В апартаментах есть гостиная с диван-кроватью, мини-бар, ЖК-телевизор и кондиционер, спальня с двуспальной кроватью. Ванная комната оснащена душевой кабиной. В квартире также дальнейшее мини-кухня для приготовления горячих напитков. Площадь апартаментов: 40 квадратных метров. Максимальное количество гостей 2 основных + 2 дополнительных спальных мест (диван).<br />\r\n<br />\r\nSuperior люкс - 3 элегантных и просторных апартамента с шикарным видом для 4 человек. Этот превосходная квартира включает в себя гостиную с диваном, обеденным столом, мини-баром, ЖК-телевизором и кондиционером и балконом, спальня с двуспальной кроватью. Ванная комната оснащена душевой кабиной. В квартире также есть мини-кухня для приготовления горячих напитков. Площадь квартиры: 54 квадратных метра. Максимальное количество гостей 2 основных + 2 дополнительных спальных мест (диван)<br />\r\n- автоматизированный дверной замок с электронным доступом;<br />\r\n- панель контроля температуры в прикроватной зоне;<br />\r\n- прикроватная панель управления «Не беспокоить, Уберите в комнате и Выключить свет»<br />\r\n- кнопка экстренной помощи в ванной комнате;<br />\r\n- кондиционер;<br />\r\n- мини-бар;<br />\r\n- рабочий стол с кабельным Интернетом;<br />\r\n- беспроводной Интернет во всех общественных зонах отеля;<br />\r\n- 1 цифровой (на рабочем столе) и 1 аналоговый телефон, прямой городской телефонный номер;<br />\r\n- LCD телевизор диагональю 32``со спутниковым телевидением, платным телевидением (31 каналов), видео по запросу, возможность использования телевизора для выхода в Интернет, пользования услугами отеля, прослушивания радио<br />\r\n- датчики безопасности и пожарной сигнализации;<br />\r\n- сейф.<br />\r\n<br />\r\nИнфраструктура отеля: <br />\r\n- конференц-зал.<br />\r\n<br />\r\nСервис: <br />\r\n- Интернет;<br />\r\n- уборка номеров;<br />\r\n- стойка регистрации и обслуживания гостей;<br />\r\n- прачечная.<br />\r\n<br />\r\nРазвлечения и спорт: <br />\r\n- сауна;<br />\r\n- тренажерный зал.<br />\r\n<br />\r\nРестораны, бары: <br />\r\n- ресторан и винный бар ,,Александар“ - уникальная магия на пене от моря через архитектуру, дизайн, богатую и разностороннюю разновидность блюд и напитков, запах моря и Средиземья. В вечерние часы, наслаждаясь на втором этаже ресторана модернистической обстановкой со видом на море и ароматом лаванды, Вы проведение незабываемые романтические моменты.<br />\r\nНаходясь во внутренней части ресторана, интерьер выглядит так, что Вы думаете что находитесь во дворце, с вечерним звуками пианино.<br />\r\nРесторан и винный бар ,,Александар“ предлагает царство вкуса разных континентов, экзотических ароматов и пряностей средиземноморской и интернациональной кухни, в которой национальные черногорские особенности объединяются с современными дополнениями и новыми вкусами мировой кулинарии. Очень богатая карта вин для всех кто любит вино - вкусы разных континентов отобранных вина из всего мира, до фирменных черногорских, Вы можете найти в ресторане и винном баре.<br />\r\nРесторан и бар также обеспечивает организацию рабочих завтраков, бизнес и формальных обедов и ужинов, коктейлей с лучшим соотношением качества и цены. Роскошный и современный аутентичный интерьер доставит Вам удовольствие, которое навсегда останется в памяти.', 1, 1),
(45, 'Fraser Place Central Seoul', '5*', 'Отель входит в сеть Fraser Place<br />\r\n<br />\r\nРасположение: смотреть на карте <br />\r\nГородской, близко к центру <br />\r\nТранспортная доступность:<br />\r\nБлизость к аэропорту - рядом (до 20 км)<br />\r\n<br />\r\nОб отеле:<br />\r\nОтель Fraser Place Central Seoul славиться своей неподражаемой гостеприимностью, прекрасным обслуживанием и теплой домашней атмосферой. Отель порадует и туристов, и деловых людей, так как отличается удобным расположением и предлагает широкий спектр услуг и развлечений.<br />\r\n <br />\r\nМесторасположение:<br />\r\nОтель расположен в центре города, в районе Kangbuk.<br />\r\n <br />\r\nКоличество номеров:<br />\r\n237 номеров.<br />\r\n <br />\r\nТипы номеров:<br />\r\nСтандартные номера, номера Deluxe, номера Executive, номера Premier.<br />\r\n <br />\r\nОписание номеров:<br />\r\nУютные и комфортабельные номера с отличным оснащением и красивым интерьером, укомплектованы современной и удобной мебелью. В большинстве номеров имеется отдельная гостиная и кухонный уголок.<br />\r\n- ТВ со спутниковыми каналами;<br />\r\n- DVD плеер;<br />\r\n- скоростной Интернет;<br />\r\n- мини-бар с холодильником;<br />\r\n- кондиционер;<br />\r\n- рабочий стол;<br />\r\n- сейф;<br />\r\n- телефон;<br />\r\n- утюг;<br />\r\n- кофеварка и чайник;<br />\r\n- ванная комната с ванной или душевой кабиной, феном и туалетными принадлежностями.<br />\r\n <br />\r\nИнфраструктура отеля:<br />\r\n- библиотека;<br />\r\n- сад;<br />\r\n- просторный холл;<br />\r\n- конференц-зал на 60 мест;<br />\r\n- бизнес-центр.<br />\r\n <br />\r\nТипы питания:<br />\r\n- завтрак.<br />\r\n <br />\r\nБесплатный сервис:<br />\r\n- круглосуточное обслуживание.<br />\r\n <br />\r\nПлатный сервис:<br />\r\n- автостоянка;<br />\r\n- транспорт до аэропорта;<br />\r\n- заказ лимузинов;<br />\r\n- обслуживание номеров;<br />\r\n- пункт обмена валюты;<br />\r\n- химчистка;<br />\r\n- прачечная;<br />\r\n- услуги секретаря;<br />\r\n- доступ в Интернет;<br />\r\n- факс;<br />\r\n- принтер.<br />\r\n <br />\r\nРазвлечения и спорт:<br />\r\n- сауна;<br />\r\n- турецкая баня;<br />\r\n- фитнес-центр;<br />\r\n- крытый бассейн.<br />\r\n <br />\r\nДля детей:<br />\r\n- няня;<br />\r\n- детская площадка;<br />\r\n- детский бассейн.<br />\r\n <br />\r\nРестораны, бары:<br />\r\n- уютный ресторан на первом этаже отеля, угостит блюдами национальной и международной кухонь.', 1, 1),
(46, 'Friend', '3*', 'Расположение:<br />\r\nГородской, близко к центру <br />\r\nТранспортная доступность:<br />\r\nБлизость к аэропорту - близко (&gt; 20 до 40 км)<br />\r\n<br />\r\nОб отеле:<br />\r\nОтель Friend предлагает своим гостям комфортные и просторные номера, профессиональное обслуживание по высшему стандарту, теплую дружелюбную атмосферу.<br />\r\n <br />\r\nМесторасположение:<br />\r\nОтель расположен в районе Seocho- Gu, рядом с Seoul Art Center и Nambu Express Bus Terminal.<br />\r\n <br />\r\nКоличество номеров:<br />\r\n60 номеров.<br />\r\n <br />\r\nТипы номеров:<br />\r\nСтандартные одноместные и двухместные номера.<br />\r\n <br />\r\nОписание номеров:<br />\r\nВсе номера оформлены в традиционном корейском стиле, укомплектованы современной и удобной мебелью, имеют полы с подогревом.<br />\r\n- ТВ со спутниковыми каналами;<br />\r\n- скоростной Интернет;<br />\r\n- мини-бар с холодильником;<br />\r\n- кондиционер;<br />\r\n- телефон;<br />\r\n- ванная комната с душевой кабиной, феном и туалетными принадлежностями.<br />\r\n <br />\r\nИнфраструктура отеля:<br />\r\n- лифт; <br />\r\n- конференц-зал;<br />\r\n- бизнес-центр.<br />\r\n <br />\r\nТипы питания:<br />\r\n- буфет с континентальным завтраком.<br />\r\n <br />\r\nБесплатный сервис:<br />\r\n- круглосуточное обслуживание.<br />\r\n <br />\r\nПлатный сервис:<br />\r\n- автостоянка;<br />\r\n- сейф у администратора;<br />\r\n- комната для хранения багажа;<br />\r\n- обслуживание номеров;<br />\r\n- прачечная;<br />\r\n- доступ в Интернет;<br />\r\n- факс;<br />\r\n- принтер.<br />\r\n <br />\r\nРазвлечения и спорт:<br />\r\n- Spa;<br />\r\n- джакузи.<br />\r\n <br />\r\nДля детей:<br />\r\n- не предоставляется.<br />\r\n <br />\r\nРестораны, бары:<br />\r\n- просторный ресторан с расслабляющей неформальной атмосферой, в меню блюда международной кухни.', 1, 1),
(47, 'Grand Hyatt Seoul', '5*', 'Отель входит в сеть Grand Hyatt<br />\r\n<br />\r\nРасположение:<br />\r\nГородской, центр <br />\r\nТранспортная доступность:<br />\r\nБлизость к аэропорту - близко (&gt; 20 до 40 км)<br />\r\n<br />\r\nОб отеле:<br />\r\nРасположение: <br />\r\nВ центре города, на территории живописного сада в 10 акров, на склоне холма Намсан, в 90 минутах езды от международного аэропорта Инчхон (Incheon), 30 минутах от торгово-выставочного центра, 10 минутах от делового центра города, рядом с торговымцентром района Итхэвон.<br />\r\n<br />\r\nВ отеле: 602 номера (категории: стандартные двухместные - TWIN иDBL, люкс - sute и KING). 10 ресторанов и баров, предлагающих разнообразную кухню. Бизнес-центр,галерея магазинов, банкетный зал, бальный зал, зал для коктейлей. Салон красоты, парикмахерская.<br />\r\n<br />\r\nВ номере: <br />\r\nСпутниковое телевидение + канал CNN, прямая телефонная линия с автоответчиком, индивидуально контролируемый кондиционер, ванная комната (ванна и душ отдельно), мини-бар, фен, радио, часы, автоматический будильник, высокоскоростной интернет, рабочий стол, халат, тапочки, сейф, минеральная вода и ежедневные газеты дополнительно. Предусмотрены удобства для инвалидов. В номерах Suite – высокотехнологичное оборудование: стерео-система, телевизор, видеоплеер, гардеробная комната, джакузи. Современная красивая обстановка, из всех номеров открываются потрясающие виды на реку Ханган или гору Намсан.<br />\r\n<br />\r\nСпорт и развлечения: <br />\r\nCпортивный зал, зал для аэробики открытый и закрытый бассейн, сауна, массаж, SPA. Теннисные и сквош-корты,ледовый каток (только зимой), беговая дорожка.', 1, 1),
(48, 'Holiday Inn Seongbuk', '4*', 'Отель входит в сеть Holiday Inn<br />\r\n<br />\r\nРасположение:<br />\r\nГородской, близко к центру <br />\r\nТранспортная доступность:<br />\r\nБлизость к аэропорту - далеко (&gt; 40 км)', 1, 1),
(49, 'Hotel Irene City', '2*', 'В отеле Irene City, удобно расположенном в 350 метрах от станции метро City Hall, гостям предлагаются номера в минималистском стиле с телевизором с плоским экраном и кабельными каналами, а также бесплатным беспроводным доступом в Интернет. В отеле работает круглосуточная стойка регистрации и предоставляются услуги прачечной.<br />\r\n<br />\r\nОт отеля Irene City - 15 минут ходьбы до модного торгового района Мёндон. До культурного района Инсадон - 8 минут езды, а до популярного рынка Намдэмун можно за 8 минут дойти пешком.<br />\r\n<br />\r\nНомера обставлены мебелью из светлого дерева и оснащены кондиционером, туалетным столиком и мини-баром. В собственной ванной комнате установлена ванна. В здании отеля работает караоке.', 1, 1),
(50, 'Hotel Sky Incheon Airpor', '3*', 'Транспортная доступность:<br />\r\nБлизость к аэропорту - близко (&gt; 20 до 40 км)<br />\r\n<br />\r\nОб отеле:<br />\r\nМесторасположение:<br />\r\nОтель Sky находится примерно в 10 км от аэропорта Инчхона и менее чем в 600 метрах от станции метро Unseo. Отель Sky, Incheon Airport находится в 15-ти минутах езды от аэропорта Гимпо.<br />\r\n <br />\r\nКоличество номеров:<br />\r\n88 номеров<br />\r\n <br />\r\nТипы номеров:<br />\r\n- стандартные номера<br />\r\n- номера класса «Люкс»<br />\r\n <br />\r\nОписание номеров:<br />\r\nНомера оснащены кондиционерами, кабельным телевидением и мини-баром. В отдельных ванных комнатах предоставляются фены.<br />\r\n <br />\r\nИнфраструктура отеля:<br />\r\n- бизнес-центр<br />\r\n <br />\r\nТипы питания:<br />\r\n- завтраки<br />\r\n <br />\r\nСервис:<br />\r\n- бесплатный круглосуточный трансфер до аэропорта<br />\r\n- бесплатный доступ в Интернет<br />\r\n- круглосуточный отдел регистрации и обслуживания гостей<br />\r\n- ускоренная регистрация заезда/отъезда<br />\r\n- камера хранения багажа<br />\r\n- обмен валюты<br />\r\n- прокат автомобилей<br />\r\n- обслуживание номеров<br />\r\n- Интернет<br />\r\n- парковка<br />\r\n <br />\r\nРазвлечения и спорт:<br />\r\n- пешие прогулки<br />\r\n <br />\r\nРестораны, бары:<br />\r\nВ ресторане Myungpumkwan подают блюда корейской кухни<br />\r\n <br />\r\nДополнительная информация:<br />\r\nРазмещение домашних животных допускается по предварительному запросу. Дополнительная плата не взимается', 1, 1),
(51, 'Astoria Hotel Seoul  ', '4*', '<br />\r\n <br />\r\n13-2 Namhak-dong , Jung-gu, Сеул, Южная Корея <br />\r\n<br />\r\nОтель расположен в сердцевине района Jung-gu. Прогулка до достопримечательности Myeongdong Cathedral займёт всего 10 минут. Отель расположен в нескольких минутах пешком до достопримечательности Myeong-dong, в 20-ти минутах пешком до центра города.<br />\r\n<br />\r\nAstoria Hotel Seoul предлагает гостям множество услуг премиум класса, таких, как 24-часовой бизнес-центр, обмен валюты и круглосуточная работа рецепции. В услуги отеля включены: лифт, сейф и прачечная. В здании отеля работает торговый центр.<br />\r\n<br />\r\nВ номерах с кондиционером предусмотрены такие удобства, как мини-бар, кино-каналы премиум-класса и светонепронецаемые шторы. Во всех номерах есть бесплатные туалетные принадлежности, кабельное/спутниковое телевидение и ванная комната. Для дополнительного комфорта гостей предлагаются тапочки и халаты.<br />\r\n<br />\r\nAstoria Hotel Seoul также имеет собственные ресторан и бар. Ресторан предлагает блюда местной кухни. В определенные часы клиентам также доступно обслуживание номеров.<br />\r\n<br />\r\nОт отеля до аэропорта Gimpo International Airport (GMP) можно добраться на транспорте за 40 минут. Отель расположен в 20 минутах ходьбы от таких достопримечательностей, как N Seoul Tower и Cheonggyecheon.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loginerrors`
--

CREATE TABLE IF NOT EXISTS `loginerrors` (
  `ip` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `col` int(1) NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_author` int(11) NOT NULL,
  `code_poluchatel` int(11) NOT NULL,
  `date` date NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `code_author`, `code_poluchatel`, `date`, `text`) VALUES
(13, 158, 156, '2013-05-20', 'Hi!'),
(14, 156, 158, '2013-05-20', 'Hello! What do you think about the site?'),
(22, 156, 163, '2013-05-21', 'Привет! Ну вот и зарегистрировалась :DD<br />\r\n<br />\r\nНравится сайт?'),
(23, 156, 162, '2013-05-21', 'Приветствую :)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(160) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activation` int(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=166 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `avatar`, `email`, `activation`, `date`) VALUES
(156, 'vadi7mir', '44e3b58cb458c5a0629bbaeeb7d91843', '../commonImages/avatars/1368996363.jpg', 'vadi7mir@gmail.com', 1, '2013-05-20 02:44:32'),
(158, 'Light', 'b3082296c479bd8a2c99ec71a2824261', '../commonImages/avatars/1369031796.jpg', 'light192@gmail.com', 1, '2013-05-20 12:36:36'),
(159, 'HiddenWind', '233a32f74bde53805ec694821f066709', '../commonImages/avatars/1369046608.jpg', 'herman2292@gmail.com', 1, '2013-05-20 14:39:40'),
(162, 'Artmadiar', '05e8b9fc0b282421fa560b62d080cc40', '../commonImages/avatars/net-avatara.jpg', 'artmadiar@gmail.com', 1, '2013-05-21 09:24:02'),
(163, 'antoninam', '7ff61ed0c8e3e2b89971d51d2bf1d847', '../commonImages/avatars/1369106894.jpg', 'antoninagcvp@mail.ru', 1, '2013-05-21 09:28:14'),
(164, 'Junk', '04f873e477bdf9f186913a685d06a2a9', '../commonImages/avatars/1369240892.jpg', 'mail.axel.ru@bk.ru', 1, '2013-05-22 22:41:32'),
(165, 'Ainura', '9b2779c19b124c71eb3d29e913f28a70', '../commonImages/avatars/1369327855.jpg', 'anya_i.76@mail.ru', 1, '2013-05-23 22:50:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
