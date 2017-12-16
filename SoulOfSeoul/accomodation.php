<!DOCTYPE html>
<!--Skill contest 2012, South Korea. WWW team - Bram, Samy, Vadim.-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">		
		<title>Soul of Seoul | Accomodation</title>
		<link href="css/style.css" type="text/css" rel="stylesheet">
		<style type="text/css">
			#hotelListTable{
			width:100%;
			}
			
			#hotelListTable tr:nth-child(even){
			background:#E9E9E9;
			}
			
			#hotelListTable td, #hotelListTable th{
			text-align:center;
			padding:5px;
			color:#555;		
			font-family:Tahoma, Geneva, sans-serif;
			}
			
			#hotelListTable th{
			background:#B9B9B9 url(./images/accomodation/pattern.jpg) repeat-x;
			height:30px;
			}
			
			.block850_2 .hr_enter {
			color:#F6D74D;
			background-color:#F6D74D;
			margin-bottom:18px;
			border:none;
			height:3px;
			}	
				
			.noRating {
			color:#F6D74D;
			background-color:#F6D74D;
			border:none;
			height:3px;
			width:20px;
			}
			
			.low, .medium, .high {
			display:block;
			padding:10px;
			width:40px;
			margin:0 auto 0 auto;
			font-weight:bold;
			font-size:14pt;
			}
			
			.low {
			background:#F7EAEA;
			color:#A87575;
			}
			
			.medium {
			background:#FCF5C8;
			color:#C3B453;
			}
			
			.high {
			background:#E8F7E1;
			color:#66A449;
			}
			
			.location {
			font-size:10pt;
			}
			
			#hotelListTable td:last-child a {
			font-size:10pt;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
			  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="1000" height="190">
                <param name="movie" value="flash/header/header.swf">
                <param name="quality" value="high">
                <embed src="flash/header/header.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="190"></embed>
		      </object>	
			</div>
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
				<h1 class="h1_enter">Hotels in Seoul</h1>
				<hr class="hr_enter">
				<table id="hotelListTable">
					<tr>
						<th style="width:55%;">Hotel name</th>
						<th style="width:17%;">Category</th>
						<th style="width:11%;">Rating</th>
						<th style="width:17%;">Information</th>
					</tr>
					<?php
						$connect = mysql_connect("localhost","root","apmsetup") or die ("Connection failed!");
						mysql_select_db("soul_of_seoul",$connect) or die ("Selection failed!");
					
						$sql = "select * from hotels order by name;";
						$result = mysql_query($sql);
					
						while($hotel = mysql_fetch_array($result))
						{
							$hotel_rating = substr($hotel[rating],0,4);
							echo 
							("
								<tr>
									<td>
										<a href='./hotel.php?code=$hotel[code]'>$hotel[name]</a> <br />
										<span class='location'>$hotel[country], $hotel[city]</span>
									</td>
							");
							
							if($hotel[category] == "1*") 
							{
								echo
								("
									<td style='text-align:left; padding-left:20px;'>
										<img src='./images/accomodation/1star.png'>
									</td>
								");
							}
							else if($hotel[category] == "2*") 
							{
								echo
								("
									<td style='text-align:left; padding-left:20px;'>
										<img src='./images/accomodation/2stars.png'>
									</td>
								");
							}
							else if($hotel[category] == "3*") 
							{
								echo
								("
									<td style='text-align:left; padding-left:20px;'>
										<img src='./images/accomodation/3stars.png'>
									</td>
								");
							}
							else if($hotel[category] == "4*") 
							{
								echo
								("
									<td style='text-align:left; padding-left:20px;'>
										<img src='./images/accomodation/4stars.png'>
									</td>
								");
							}
							else if($hotel[category] == "5*") 
							{
								echo
								("
									<td style='text-align:left; padding-left:20px;'>
										<img src='./images/accomodation/5stars.png'>
									</td>
								");
							}
							
							
									
							if ($hotel_rating == 0)
							{
								echo("<td><hr class='noRating'></td>");
							}
							else if ($hotel_rating < 3) 
							{
								echo("<td><span class='low'>$hotel_rating</span></td>");
							}
							else if ($hotel_rating >=4)
							{
								echo("<td><span class='high'>$hotel_rating</span></td>");
							}
							else
							{
								echo("<td><span class='medium'>$hotel_rating</span></td>");
							}							
							
							echo 
							("
									<td>
										Reviews: $hotel[rev_quan] <br />
										Photos: $hotel[ph_quan] <br />
										<a href='./hotel.php?code=$hotel[code]'>read more...</a>
									</td>
								</tr>
							");
						}
					?>
				</table>
			</div>			
			<div id="footer">
				<img src="./images/footer/footer.jpg" height="130" width="1000" alt="Footer" id="Footer_image"  usemap="#footerImageMap" />
				<map id="footerImageMap" name="footerImageMap">
					<area shape="rect" alt="Follow Us on Facebook" title="Follow Us on Facebook" coords="847,43,879,77" href="http://www.facebook.com/koreatourism" target="_blank" />
					<area shape="rect" alt="Follow Us on Twitter" title="Follow Us on Twitter" coords="891,43,925,77" href="https://twitter.com/ktosydney" target="_blank" />
				</map>
			</div>
		</div>
	</body>
</html>