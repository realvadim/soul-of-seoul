<?php
	$title = "What to do";
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
		<img src="./images/what_to_do/top3.png" height="87" width="109" alt="Top 3 to do in Seoul" id="top5Sticker" style="left:-18px;"/>
		<div class="destination">
			<img src="./images/what_to_do/leisure1.jpg" height="159" width="240" alt="Inkigayo SBS Station TV" />
			<h1>Inkigayo SBS Station TV</h1>
			<p class="desc">Seoul Broadcasting System (SBS) - is a national South Korean television and radio network. It is the only private commercial broadcaster with wide regional network affiliates to operate in the country.</p>
			<p class="link"><a href="./inkigayo.php">read more...</a></p>
		</div>
		<div class="destination">
			<img src="./images/what_to_do/leisure2.jpg" height="158" width="240" alt="Street food" />
			<h1>Street food</h1>
			<p class="desc">Korea offers a unique place to get a quick bite-street food carts. These food carts are scattered throughout all the sidewalks of Korea. A customer can walk up to the cart and order a wide variety of inexpensive food.</p>
			<p class="link"><a href="./street_food.php">read more...</a></p>
		</div>				
		<div class="destination">
			<img src="./images/what_to_do/leisure3.jpg" height="180" width="240" alt="Karaoke" />
			<h1>Karaoke</h1>
			<p class="desc">Karaoke in Korea became popular in the 80′s and 90′s after the Karaoke machine was invented in Japan in the 70′s. Karaoke is called Norebang (singing room) in Korea. You can find the Norebang sign everywhere in Korea especially in entertainment districts or student areas.</p>
			<p class="link"><a href="./karaoke.php">read more...</a></p>
		</div>
	</div>
</div>
<?php
	include "./footer.php";
?>