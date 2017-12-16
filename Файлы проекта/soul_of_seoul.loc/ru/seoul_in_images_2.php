<?php
	$title = "Виды Сеула";
	include "./header.php";
?>
<div id="content">
	<div style="margin-bottom:20px;">
		<object id="Object1" type="application/x-shockwave-flash" data="../videos/player_flv_maxi.swf" width="1000" height="480">
			<noscript><a href="http://www.dvdvideosoft.com/products/dvd/Free-YouTube-Download.htm">youtube download</a></noscript>
			<param name="movie" value="./videos/player_flv_maxi.swf" />
			<param name="allowFullScreen" value="true" />
			<param name="wmode" value="opaque" />
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="quality" value="high" />
			<param name="menu" value="true" />
			<param name="autoplay" value="false" />
			<param name="autoload" value="false" />
			<param name="FlashVars" value="configxml=../videos/video2.xml" />
		</object>
	</div>	
	<div style="background:#E9E9E9; height:200px; width:847px; margin-left:113px;">
		<div class="videoPreview" id="selected">
			<a href="seoul_in_images_1.php"><img src="./images/seoul_in_images/preview1.jpg" height="130" width="229" alt="Preview 1" /></a>
			<p><a href="seoul_in_images_1.php">смотреть видео...</a></p>
		</div>
		<div class="videoPreview">
			<img src="./images/seoul_in_images/preview2.jpg" height="130" width="229" alt="Preview 2" id="selected" />
		</div>
		<div class="videoPreview" style="margin-right:0;">
			<a href="seoul_in_images_3.php"><img src="./images/seoul_in_images/preview3.jpg" height="130" width="229" alt="Preview 3" /></a>
			<p><a href="seoul_in_images_3.php">смотреть видео...</a></p>
		</div>
	</div>		
</div>
<?php
	include "./footer.php";
?>