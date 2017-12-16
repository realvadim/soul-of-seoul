<?php
	$title = "Themed travel";
	include "./header.php";
?>
<div id="content">
	<div class="block850">
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="850" height="400">
			<param name="movie" value="flash/themed_travel/themed_travel.swf">
			<param name="quality" value="high">
			<embed src="flash/themed_travel/themed_travel.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="850" height="400"></embed>
		</object>
	</div>
	<div id="block650">				
		<div class="child" style="min-height:167px;">
			<img src="./images/themed_travel/theme1.jpg" height="167" width="250" alt="Taekwondo" />
			<h1>Taekwondo</h1>
			<p class="desc">People come from around the world to learn Korea's national sport, taekwondo. There are experience programs available for first timers and more advanced students alike at very affordable rates.</p>
			<p class="link"><a href="./taekwondo.php">read more...</a></p>
		</div>
		<div class="child" style="min-height:166px; margin-bottom:0;">
			<img src="./images/themed_travel/theme2.jpg" height="166" width="250" alt="Beauty & Welness" />
			<h1>Beauty & Wellness</h1>
			<p class="desc">Let your stress melt away as you spend the day relaxing in a Korean style jjimjilbang spa, or getting acupuncture at an oriental hospital. Soothe your tired body with a full body massage or facial.</p>
			<p class="link"><a href="./beauty.php">read more...</a></p>
		</div>
	</div>
</div>
<?php
	include "./footer.php";
?>