<?php
	$title = "Recommended destinations";
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
			<img src="./images/rec_dest/dest1.jpg" height="158" width="240" alt="N Seoul Tower" />
			<h1>N Seoul Tower</h1>
			<p class="desc">Rising up from the summit of Namsan Mountain (262m) is a beloved city landmark that has come to represent the city itself.</p>
			<p class="link"><a href="./n_seoul_tower.php">read more...</a></p>
		</div>
		<div class="destination">
			<img src="./images/rec_dest/dest2.jpg" height="158" width="240" alt="Gyeongbokgung Palace" />
			<h1>Gyeongbokgung palace</h1>
			<p class="desc">Built in 1395. Gyeongbokgung Palace is arguably the most beautiful and remains the grandest one.</p>
			<p class="link"><a href="./gyeongbokgung_palace.php">read more...</a></p>
		</div>
		<div class="destination">
			<img src="./images/rec_dest/dest3.jpg" height="158" width="240" alt="Floating Island" />
			<h1>Floating Island</h1>
			<p class="desc">Located near the southernmost part of Banpo Bridge, is the nation’s first-ever artificial island that floats on the surface of Hangang River.</p>
			<p class="link"><a href="./floating_island.php">read more...</a></p>
		</div>
		<div class="destination">
			<img src="./images/rec_dest/dest4.jpg" height="158" width="240" alt="63 CITY" />
			<h1>63 city</h1>
			<p class="desc">With 63 floors measuring a height of 264m, the 63 Building is Korea’s tallest and most recognized building.</p>
			<p class="link"><a href="./63_city.php">read more...</a></p>
		</div>
		<div class="destination" style="margin-bottom:0;">
			<img src="./images/rec_dest/dest5.jpg" height="158" width="240" alt="Everland" />
			<h1>Everland</h1>
			<p class="desc">Everland Resort was opened in 1976 as the first family park in Korea. The park is home to over 40 heart-pounding rides and attractions.</p>
			<p class="link"><a href="./everland.php">read more...</a></p>
		</div>
	</div>			
</div>
<?php
	include "./footer.php";
?>			