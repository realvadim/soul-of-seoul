<?php
	session_start();
?>
<!DOCTYPE html>
<!-- 
Проект для олимпиады МУИТ
Файл создан: 12.10.2012
Последнее обновление: 19.05.2013
Автор: Miropolskiy Vadim
-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">		
		<title>Soul of Seoul | <?php echo $title; ?></title>
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<link href="../css/mmenu.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="./js/jquery-1.7.2.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){    
			  $('#mmenu li').hover(function () {
				 clearTimeout($.data(this,'timer'));
				 $('ul',this).stop(true,true).slideDown(200);
			  }, function () {
				$.data(this,'timer', setTimeout($.proxy(function() {
				  $('ul',this).stop(true,true).slideUp(200);
				}, this), 100));
			  });
			});
		</script>
		<script type='text/javascript' src='./js/spoiler.js'></script>
		<link href="../css/pirobox/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="./js/jquery.min.js"></script>
		<script type="text/javascript" src="./js/jquery-ui-1.8.2.custom.min.js"></script>
		<script type="text/javascript" src="./js/pirobox_extended.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$().piroBox_ext({
				piro_speed : 700,
					bg_alpha : 0.5,
					piro_scroll : true //pirobox always positioned at the center of the page
				});
			});
		</script>
		<link rel="shortcut icon" href="./images/favicon.png" type="image/png">
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div class="languages">
					<table>
						<tr>
							<?php
								$currentURL = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
								$currentURL = str_replace("/ru/","/en/",$currentURL);
							?>
							<td style="width:40%;"><a href="http://<?= $currentURL ?>" title="In English"><img src="./images/english.png" width="32" height="32"></a>&nbsp;&nbsp;<img src="./images/russian.png" width="32" height="32" /></td>
							<?php								
								include("./bd.php");
								$login = $_SESSION['login'];
								$password = $_SESSION['password'];
								$result = mysql_query("SELECT `id` FROM `users` WHERE `login` = \"$login\" AND `password` = \"$password\";",$db);
								$row = mysql_fetch_array($result);
								mysql_close();
		
								//если данные пользователя верны
								if(!empty($row['id']))
									echo ("
										<td style=\"width:20%;\">
											<a href=\"./all_users.php\" title=\"All users\">
												<img src=\"./images/users.png\" width=\"40\" height=\"40\" />
											</a>
										</td>
										<td style=\"width:40%;\">
											Здравствуйте, <a href=\"./profile.php?id=$_SESSION[id]\" title=\"Мой аккаунт\"><span class=\"bold\">$login</span></a>!  | <a href=\"./sitemap.php\">Карта сайта</a>
										</td>
										</tr>
										</table>
									");
								else
									echo ("
										<td style=\"width:20%;\">
											<img src=\"./images/usersGray.png\" width=\"40\" height=\"40\" />
										</td>
										<td style=\"width:40%;\">
											<a href=\"./registration.php\">Регистрация</a> | <a href=\"./login.php\">Вход</a> | <a href=\"./sitemap.php\">Карта сайта</a>
										</td>
										</tr>
										</table>
									");
							?>
				</div>
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="1000" height="110">
					<param name="movie" value="flash/header/header.swf">
					<param name="quality" value="high">
					<embed src="flash/header/header.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="110"></embed>
				</object>
				<nav>
					<ul id="mmenu">
						<li class="blue">
							<a href="./about_seoul.php">О Сеуле</a>
							<ul class="blue">
								<li><a href="./loc_and_weather.php">Расположение и погода</a></li>
								<li><a href="./general_info.php">Общая информация</a></li>
								<li><a href="./seoul_in_images_1.php">Виды Сеула</a></li>
							</ul>
						</li>
						<li class="green">
							<a href="./destinations.php">Направления</a>
							<ul class="green">
								<li><a href="./rec_dest.php">Рекомендуемые</a></li>
								<li><a href="./what_to_do.php">Чем заняться</a></li>
							</ul>
						</li>
						<li class="pink">
							<a href="./attractions.php">Достояния</a>
							<ul class="pink">
								<li><a href="./themed_travel.php">Тематические путешествия</a></li>
								<li><a href="./events.php">События</a></li>
							</ul>
						</li>
						<li class="yellow"><a href="./accomodation.php">Размещение</a></li>
						<li class="purple">
							<a href="./culture.php">Культура</a>
							<ul class="purple">
								<li><a href="./lifestyle.php">Стиль жизни</a></li>
								<li><a href="./han_style.php">Стиль Хан</a></li>
								<li><a href="./korean_dramas.php">Корейские сериалы</a></li>
								<li><a href="./dine_and_shop.php">Обед и шоппинг</a></li>
								<li><a href="./unesco.php">Наследие ЮНЕСКО</a></li>
							</ul>
						</li>
						<li class="orange"><a href="./rk_and_rk.php">РК и РК</a></li>
					</ul>
				</nav>
			</div>