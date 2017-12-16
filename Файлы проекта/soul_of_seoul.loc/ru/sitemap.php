<?php
	$title = "Карта сайта";
	include "./header.php";
?>
<div id="content">	
	<div class="block850_2" style="background:#E9E9E9; padding-bottom:20px;">
		<h1 class="h1_enter">Карта сайта</h1>
		<hr class="hr_enterPink">
		<p>На страничках настоящего веб-сайта можно найти множество интересной и полезной информации о столице Южной Кореи и о самой стране в целом, о наиболее популярных направлениях в этой стране, о проходящих фестивалях и о культуре корейского народа. Отдельный раздел сайта посвящён сотрудничеству республики Казахстан и Южной Кореи в различных сферах, таких как, экономика, образование и культура. В разделе «Размещение» представлена информация о некоторых отелях Сеула. Авторизованные пользователи имеют возможность добавлять описание новых отелей, информация о которых отсутствует на сайте. Сразу же после подтверждения регистрации и входа на сайт, пользователь перенаправляется на страницу своего аккаунта, где он может посмотреть список других зарегистрированных пользователей и общаться с кем-либо из них.</p>
		<ul id="sitemap">
			<li class="blue">
				<a href="./about_seoul.php">О Сеуле</a>
				<ul>
					<li><a href="./loc_and_weather.php">Расположение и погода</a></li>
					<li><a href="./general_info.php">Общая информация</a></li>
					<li><a href="./seoul_in_images_1.php">Виды Сеула</a></li>
				</ul>
			</li>
			<li class="green">
				<a href="./destinations.php">Направления</a>
				<ul>
					<li>
						<a href="./rec_dest.php">Рекомендуемые</a>
						<ul>
							<li><a href="./n_seoul_tower.php">Сеульская башня</a></li>
							<li><a href="./gyeongbokgung_palace.php">Дворец Кёнбоккун</a></li>
							<li><a href="./floating_island.php">Плавучий остров</a></li>
							<li><a href="./63_city.php">63 сити</a></li>
							<li><a href="./everland.php">Everland</a></li>
						</ul>
					</li>
					<li>
						<a href="./what_to_do.php">Чем заняться</a>
						<ul>
							<li><a href="./inkigayo.php">ТВ станция Inkigayo SBS</a></li>
							<li><a href="./street_food.php">Уличная еда</a></li>
							<li><a href="./karaoke.php">Караоке</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="pink">
				<a href="./attractions.php">Достояния</a>
				<ul>
					<li>
						<a href="./themed_travel.php">Тематические путешествия</a>
						<ul>
							<li><a href="./taekwondo.php">Тхэквондо</a></li>
							<li><a href="./beauty.php">Красота и здоровье</a></li>
						</ul>
					</li>
					<li>
						<a href="./events.php">События</a>
						<ul>
							<li><a href="./lantern.php">Праздник фонарей</a></li>
							<li><a href="./cherry_blossom.php">Фестиваль цветения сакуры</a></li>
							<li><a href="./dance.php">Международный фестиваль танца</a></li>
							<li><a href="./fireworks.php">Международный фестиваль салютов</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="yellow"><a href="./accomodation.php">Размещение</a></li>
			<li class="purple">
				<a href="./culture.php">Культура</a>
				<ul>
					<li><a href="./lifestyle.php">Стиль жизни</a></li>
					<li><a href="./han_style.php">Стиль Хан</a></li>
					<li>
						<a href="./korean_dramas.php">Корейские сериалы</a>
						<ul>
							<li><a href="./secret_garden.php">Таинственный сад</a></li>
							<li><a href="./my_princess.php">Моя прицесса</a></li>
							<li><a href="./city_hunter.php">Городской охотник</a></li>
						</ul>
					</li>
					<li><a href="./dine_and_shop.php">Обед и шоппинг</a></li>
					<li><a href="./unesco.php">Наследие ЮНЕСКО</a></li>
				</ul>
			</li>
			<li class="orange"><a href="./rk_and_rk.php">РК и РК</a></li>
		</ul>				
	</div>
</div>
<?php
	include "./footer.php";
?>