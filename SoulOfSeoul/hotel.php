<!DOCTYPE html>
<!--Skill contest 2012, South Korea. WWW team - Bram, Samy, Vadim.-->
<?php
	//hotel.php
	$connect = mysql_connect("localhost","root","apmsetup") or die ("Connection failed!");
	mysql_select_db("soul_of_seoul",$connect) or die ("Selection failed!");
	
	$code = $_GET['code'];				
	
	$sql = "select * from hotels where code=$code;";
	$result = mysql_query($sql);	
	$hotel = mysql_fetch_array($result);	
	$title = $hotel[name];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">		
		<title>Soul of Seoul | <?= $title ?></title>
		<link href="css/style.css" type="text/css" rel="stylesheet">
		<style type="text/css">
			.block850_2 .hr_enter {
			color:#F6D74D;
			background-color:#F6D74D;
			margin-bottom:18px;
			border:none;
			height:3px;
			}
			
				#hotelListTable{
			width:100%;
			}
			
			#hotelListTable tr:nth-child(even){
			background:#E9E9E9;
			}
			
			#hotelListTable td, #hotelListTable th{
			text-align:center;
			padding:5px 5px 5px 20px;
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
			
			.tenpt {
			font-size:10pt;
			color:#999;
			}
			
			input[type=text] {
			height:27px;
			width:300px;
			border:1px solid #555;
			background:url(./images/accomodation/inputbg.jpg) repeat-x;
			font-family:Tahoma, Geneva, sans-serif;
			font-size:12pt;
			margin-top:2px;
			line-height:27px;
			}
			
			input[type=text]:focus {
			border:2px solid #F6D74D;
			background:#FFF;
			}
			
			textarea {
			background:url(./images/accomodation/textareabg.jpg) repeat;
			border:1px solid #555;
			font-family:Tahoma, Geneva, sans-serif;
			font-size:12pt;
			}
			
			textarea:focus {
			border:2px solid #F6D74D;
			background:#FFF;
			}
			
			input[type=submit],input[type=reset]{
			height:30px;
			border:0px solid #555;
			font-weight:bold;
			background:#F6D74D;
			width:200px;
			border-radius:20px;
			font-family:Tahoma, Geneva, sans-serif;	
			}
			
			input[type=reset]{
			width:120px;
			}
			
			#formTable {
			border:0px solid #000;
			border-collapse:collapse;
			width:100%;
			font-family:Tahoma, Geneva, sans-serif;
			font-size:11pt;
			}
			
			#formTable td {
			border:0px solid #000;
			padding:10px;
			}
			
			#formTable tr:last-child {
			text-align:center;
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
			<div>			
				<?php
					$html_code = $hotel[html_code];
					$html_code = stripslashes($html_code);				
					echo $html_code;
				?>
			</div>
			<div class="block850_2" style="">				
				<?php
					$sql = "select * from reviews where code=$code;";
					$result = mysql_query($sql);
					$quantity = mysql_num_rows($result);
					if ($quantity == 0) {
					echo 
					("
					<h1 class='h1_enter' style='font-size:1.3em;'>There are no reviews for &quot;$title&quot;</h1>
					<hr class='hr_enter'>
					");
					}
					else if ($quantity == 1) {
					echo 
					("
					<h1 class='h1_enter' style='font-size:1.3em;'>$quantity review for &quot;$title&quot;</h1>
					<hr class='hr_enter'>
						<table id='hotelListTable'>
							<tr style=''>
								<th style='width:20%;'>Name</th>
								<th style='width:60%;'>Review</th>
								<th style='width:20%;'>Rating</th>
							</tr>
					");
					}
					else
					{
						echo 
						("
						<h1 class='h1_enter' style='font-size:1.3em;'>$quantity reviews for &quot;$title&quot;</h1>
						<hr class='hr_enter'>
						<table id='hotelListTable'>
							<tr style=''>
								<th style='width:20%;'>Name</th>
								<th style='width:60%;'>Review</th>
								<th style='width:20%;'>Rating</th>
							</tr>
						");
						
					}
					/*echo 
					("
						<hr class='hr_enter'>
						<table id='hotelListTable'>
							<tr style=''>
								<th style='width:20%;'>Name</th>
								<th style='width:60%;'>Review</th>
								<th style='width:20%;'>Rating</th>
							</tr>
					");*/
					while ($review = mysql_fetch_array($result))
					{
						/*echo
						("
							<p>$review[name]</p>
							<p>$review[date]</p>
							<p>$review[rating]</p>
							<p>$review[reviewText]</p>
							<hr />
						");*/
						
						echo
						("
							
							<tr>
							<td><span class='bold'>$review[name]</span></td>
							<td style='text-align:left;'>$review[reviewText]<br /><br /><span class='tenpt'>$review[date]</span></td>
						");
						
						
						$review_rating = $review[rating];
						
							 if ($review_rating < 3) 
							{
								echo("<td><span class='low'>$review_rating</span></td>");
							}
							else if ($review_rating >=4)
							{
								echo("<td><span class='high'>$review_rating</span></td>");
							}
							else
							{
								echo("<td><span class='medium'>$review_rating</span></td>");
							}						
						
						
						
						
						
						/*echo
						("
							<td>$review[rating]</td>
							</tr>
														
						");*/
					
					}
					
						
						if ($quantity != 0) {
						
						echo 
					("
						
						
						</table>
						<hr class='hr_enter'>
					");
					}
					mysql_close();
				?>
			</div>
			<div class="block850_2" style="background:#E9E9E9;" >
				<h1 class='h1_enter' style='font-size:1.3em;'>Leave new review</h1>
				<hr class='hr_enter'>
				<form name="reviewAdding" method="POST" action="./reviewAdding.php">
					<input type="hidden" name="code" value="<?= $code ?>">
					<!--<p><label><span class="bold">Name:</span><br /> <input type="text" name="name"></label></p>
					<p><label for="review_text"><span class="bold">Review:</span><label><br /><textarea name="reviewText" cols="60" rows="5" id="review_text"></textarea></p>
					<p><span class="bold">Rating:</span><br />
						<input type="radio" name="rating" value="1">1
						&nbsp;
						<input type="radio" name="rating" value="2">2
						&nbsp;
						<input type="radio" name="rating" value="3" checked="checked">3
						&nbsp;
						<input type="radio" name="rating" value="4">4
						&nbsp;
						<input type="radio" name="rating" value="5">5
					</p>
					<p>
					<input type="reset" value="Clear">&nbsp;<input type="submit" name="submit" value="Add new review">
					</p>-->
					<table id="formTable">
						<tr>
							<td><label><span class="bold">Name:</span><br /> <input type="text" name="name" maxlength="22"></label></td>
							<td rowspan="2"><label for="review_text"><span class="bold">Review:</span><label><br /><textarea name="reviewText" cols="64" rows="6" id="review_text"></textarea></td>
						</tr>
						<tr>
							<td><span class="bold">Rating:</span><br />
						<input type="radio" name="rating" value="1">1
						&nbsp;
						<input type="radio" name="rating" value="2">2
						&nbsp;
						<input type="radio" name="rating" value="3" checked="checked">3
						&nbsp;
						<input type="radio" name="rating" value="4">4
						&nbsp;
						<input type="radio" name="rating" value="5">5</td>
						</tr>
						<tr>
							<td colspan="2"><input type="reset" value="Clear">&nbsp;<input type="submit" name="submit" value="Add new review"></td>
						</tr>
					</table>
				</form>
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