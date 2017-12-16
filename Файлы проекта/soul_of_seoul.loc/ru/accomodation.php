<?php
	session_start();
	require("./my_functions.php");
	$title = "Размещение";
	include "./header.php";
?>
<div id="content">
	<div id="blockWithSticker" style="width:655px; padding-left:175px;">
		<img src="./images/accomodation/sticker.png" height="76" width="181" alt="Accomodation in Seoul" id="aboutSeoulSticker" style="left:-20px;"/>
		<p>Будучи сердцем Южной Кореи, Сеул может похвастаться отелями некоторых всемирно известных групп, таких как Hilton, Hyatt, JW Marriott, Ritz Carlton и т.д. Найти подходящее место проживания в соответствии с потребностями и бюджетом не является сложной задачей в городе. Наслаждайтесь гостеприимством и обслуживанием мирового класса, предлагаемых  в отелях Сеула.</p>
	</div>
	<div style="margin-bottom:20px;">
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="1000" height="520">
			<param name="movie" value="flash/accomodation/accomodation.swf">
			<param name="quality" value="high">
			<embed src="flash/accomodation/accomodation.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="520"></embed>
		</object>
	</div>
	<div class="block850_2" style="padding:20px;">
		<?php
			include("./bd.php");
				
			$result = mysql_query("SELECT * FROM `hotels` ORDER BY `name`;",$db);					
			$numberOfHotels = mysql_num_rows($result);
			echo("<h1 class=\"h1_enter\">Отели Сеула ($numberOfHotels)</h1><hr class=\"hr_enterYellow\">");
				
			if($numberOfHotels > 0) {
				echo ("
					<table id=\"hotelListTable\">
					<tr>
						<th>Отель</th>
						<th>Класс</th>
						<th>Оценка туристов</th>
						<th>Информация</th>
					</tr>
				");
					
				while($hotel = mysql_fetch_array($result)) {					
					$classif = hotelStars($hotel['classif']);					
					$info = joinMysqlTables($hotel['id']);	
					$co = $info['co'];
					$ci = $info['ci'];
					$ra = $info['ra'];
					$r = $info['r'];
					$p = $info['p'];
					echo("
						<tr>
							<td>
								<a href='./hotel.php?id=$hotel[id]'>$hotel[name]</a>
								<br />
								<span class='location'>$co,$ci</span>
							</td>
					");				
					echo ("
						<td>
							<img src=\"$classif\">
						</td>
					");
					echo ("<td>".hotelRating($ra)."</td>");		
					echo ("
							<td>
								Отзывы: $r<br />
								Фото: $p<br />
								<a href='./hotel.php?id=$hotel[id]' class='tenpt'>Читать далее...</a>
							</td>
						</tr>
					");
				}
				
				echo ("<tr><td colspan=\"4\" style=\"padding:25px 10px;\">");

				if(userVerification())
					echo ("<a href=\"./new_hotel.php\">Добавить информацию о новом отеле</a>");
				else
					echo ("<a href=\"./registration.php\">Зарегистрируйтесь</a> или <a href=\"./login.php\">авторизуйтесь</a>, чтобы добавлять отзывы, информацию о новых отелях и общаться с другими пользователями сайта.");
				echo ("</td></tr></table>");
			}	
		?>
	</div>
</div>
<?php
	include "./footer.php";
?>