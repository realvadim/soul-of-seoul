<?php
	$title = "Рекомендуемые направления";
	include "./header.php";
?>
<div id="content">
	<div>
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="1000" height="400">
			<param name="movie" value="flash/rec_dest/rec_dest.swf">
			<param name="quality" value="high">
			<embed src="flash/rec_dest/rec_dest.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="400"></embed>
		</object>
	</div>
	<div id="blockWithSticker2">
		<img src="./images/rec_dest/top5.png" height="68" width="109" alt="Top 5 in Seoul" id="top5Sticker"/>
		<div class="destination">
			<img src="./images/rec_dest/dest1.jpg" height="158" width="240" alt="Сеульская башня" />
			<h1>Сеульская башня</h1>
			<p class="desc">Поднимаясь с вершины горы Намсан (262m) является любимой достопримечательностью Сеула, что стало представлять сам город.</p>
			<p class="link"><a href="./n_seoul_tower.php">читать далее...</a></p>
		</div>
		<div class="destination">
			<img src="./images/rec_dest/dest2.jpg" height="158" width="240" alt="Дворец Кёнбоккун" />
			<h1>Дворец Кёнбоккун</h1>
			<p class="desc">Построен в 1395 году. Кёнбоккун, пожалуй, самый красивый и величественный дворец Сеула.</p>
			<p class="link"><a href="./gyeongbokgung_palace.php">читать далее...</a></p>
		</div>
		<div class="destination">
			<img src="./images/rec_dest/dest3.jpg" height="158" width="240" alt="Плавучий остров" />
			<h1>Плавучий остров</h1>
			<p class="desc">Расположен недалеко от южной части моста Банпо. Это первый в истории страны искусственный остров, который плавает на поверхности реки Хан.</p>
			<p class="link"><a href="./floating_island.php">читать далее...</a></p>
		</div>
		<div class="destination">
			<img src="./images/rec_dest/dest4.jpg" height="158" width="240" alt="63 сити" />
			<h1>63 сити</h1>
			<p class="desc">Высота этого 63-этажного небоскрёба достигает 264м. Это здание является самым высоким и самым узнаваемым зданием Кореи.</p>
			<p class="link"><a href="./63_city.php">читать далее...</a></p>
		</div>
		<div class="destination" style="margin-bottom:0;">
			<img src="./images/rec_dest/dest5.jpg" height="158" width="240" alt="Everland" />
			<h1>Everland</h1>
			<p class="desc">Everland был открыт в 1976 году как первый семейный парк в Корее. Парк является домом для более чем 40 захватывающих дыхание аттракционов.</p>
			<p class="link"><a href="./everland.php">читать далее...</a></p>
		</div>
	</div>			
</div>
<?php
	include "./footer.php";
?>			