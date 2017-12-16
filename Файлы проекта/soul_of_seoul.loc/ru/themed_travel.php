<?php
	$title = "Тематические путешествия";
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
			<img src="./images/themed_travel/theme1.jpg" height="167" width="250" alt="Тхэквондо" />
			<h1>Тхэквондо</h1>
			<p class="desc">Люди приезжают со всего мира, чтобы познакомиться с национальным видом спорта Кореи - тхэквондо. Существует целый спектр программ, доступных как для новичков, так и для продвинутых студентов.</p>
			<p class="link"><a href="./taekwondo.php">читать далее...</a></p>
		</div>
		<div class="child" style="min-height:166px; margin-bottom:0;">
			<img src="./images/themed_travel/theme2.jpg" height="166" width="250" alt="Beauty & Welness" />
			<h1>Красота и здоровье</h1>
			<p class="desc">Позвольте вашему стрессу расстаять, пока вы проводите весь день в СПА в корейском стиле - Jjimjilbang. Запишитесь на процедуру иглоукалывания или успокойте уставшее тело прекрасным массажем.</p>
			<p class="link"><a href="./beauty.php">читать далее...</a></p>
		</div>
	</div>
</div>
<?php
	include "./footer.php";
?>