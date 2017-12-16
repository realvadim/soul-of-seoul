<?php
	$title = "Чем заняться";
	include "./header.php";
?>
<div id="content">
	<div>
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="1000" height="400">
			<param name="movie" value="flash/what_to_do/what_to_do.swf">
			<param name="quality" value="high">
			<embed src="flash/what_to_do/what_to_do.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="400"></embed>
		</object>
	</div>
	<div id="blockWithSticker2">
		<img src="./images/what_to_do/top3.png" height="87" width="109" alt="Топ 3 в Сеуле" id="top5Sticker" style="left:-18px;"/>
		<div class="destination">
			<img src="./images/what_to_do/leisure1.jpg" height="159" width="240" alt="ТВ станция Inkigayo SBS" />
			<h1>ТВ станция Inkigayo SBS</h1>
			<p class="desc">Seoul Broadcasting System (SBS) - национальный оператор южнокорейского теле и радио сети. Это единственная частная коммерческая телекомпания с широкой региональной сетью филиалов по всей стране.</p>
			<p class="link"><a href="./inkigayo.php">читать далее...</a></p>
		</div>
		<div class="destination">
			<img src="./images/what_to_do/leisure2.jpg" height="158" width="240" alt="Уличная еда" />
			<h1>Уличная еда</h1>
			<p class="desc">Корея предлагает множество уникальных кафешек, где можно быстро перекусить. Эти тележки еды разбросаны на всех тротуарах Кореи.</p>
			<p class="link"><a href="./street_food.php">читать далее...</a></p>
		</div>				
		<div class="destination">
			<img src="./images/what_to_do/leisure3.jpg" height="180" width="240" alt="Караоке" />
			<h1>Караоке</h1>
			<p class="desc">Караоке в Корее стало популярным в 80-х и 90-х годах после того, как оно было изобретено в Японии в 70-х. В Корее караоке называется Норэбан (노래방). Норэбан означает - комната песни. Вы можете увидеть надпись 노래방 практически везде в Корее, особенно в развлекательных и студенческих районах.</p>
			<p class="link"><a href="./karaoke.php">читать далее...</a></p>
		</div>
	</div>
</div>
<?php
	include "./footer.php";
?>