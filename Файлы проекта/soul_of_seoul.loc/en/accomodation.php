<?php
	session_start();
	require("./my_functions.php");
	$title = "Accomodation in Seoul";
	include "./header.php";
?>
<div id="content">
	<div id="blockWithSticker" style="width:655px; padding-left:175px;">
		<img src="./images/accomodation/sticker.png" height="76" width="181" alt="Accomodation in Seoul" id="aboutSeoulSticker" style="left:-20px;"/>
		<p>Being the heart of South Korea, Seoul boasts of hotels of some world-renowned groups such as Hilton, Hyatt, JW Marriott, Ritz Carlton etc. Finding right accommodation according to the need and budget is not a difficult task in the city. Enjoy the world-class hospitality and guest service offered by the hotels of Seoul.</p>
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
			echo("<h1 class=\"h1_enter\">Hotels in Seoul ($numberOfHotels)</h1><hr class=\"hr_enterYellow\">");
				
			if($numberOfHotels > 0) {
				echo ("
					<table id=\"hotelListTable\">
					<tr>
						<th>Hotel name</th>
						<th>Category</th>
						<th>Rating</th>
						<th>Information</th>
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
								Reviews: $r<br />
								Photos: $p<br />
								<a href='./hotel.php?id=$hotel[id]' class='tenpt'>read more...</a>
							</td>
						</tr>
					");
				}
				
				echo ("<tr><td colspan=\"4\" style=\"padding:25px 10px;\">");

				if(userVerification())
					echo ("<a href=\"./new_hotel.php\">Add information about a hotel</a>");
				else
					echo ("<a href=\"./registration.php\">Register</a> or <a href=\"./login.php\">log in</a> in order to leave reviews, add information about hotels and chat with other users of the site.");
				echo ("</td></tr></table>");
			}	
		?>
	</div>
</div>
<?php
	include "./footer.php";
?>