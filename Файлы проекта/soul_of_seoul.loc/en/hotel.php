<?php
	session_start();
	require("./my_functions.php");
	$title = "Accommodation in Seoul";
	include "./header.php";
?>
<div id="content">
	<?php
		if(isset($_GET['id']))
			$id = $_GET['id'];
		else 
			errorGoBack("./accomodation.php", "Information about the hotel can not be displayed...",$values,"Accommodation");
				
		if(!preg_match("|^[\d]+$|", $id)) 
			errorGoBack("./accomodation.php", "Information about the hotel can not be displayed...",$values,"Accommodation");
			
		include("./bd.php");
		
		$result = mysql_query("SELECT * FROM `hotels` WHERE `id` = $id;",$db);	
		$hotel = mysql_fetch_array($result);
		
		$title = $hotel['name'];
		
		if(empty($hotel['name']))
			errorGoBack("./accomodation.php", "Information about the hotel can not be displayed...",$values,"Accomodation");
			
		$info = joinMysqlTables($id);
		$co = $info['co'];
		$ci = $info['ci'];
		$ra = $info['ra'];
		$r = $info['r'];
		$p = $info['p'];

		$classif = $hotel['classif'];
		$description = $hotel['description'];
	?>
	<div class="block850_2" style="background:#E9E9E9;">
		<?php
			$hotelStars = hotelStars($classif);
			echo ("
				<h1 style=\"margin-top:0;\">$title <img src=\"$hotelStars\" /></h1>
				<hr class='hr_enterYellow'>
				<p><span class=\"bold\">$co, $ci</span></p>
				<br />
				<p>$description</p>
			");
		?>
	</div>
	<?php
		$result2 = mysql_query("SELECT * FROM `hotelphotos` WHERE `code_hotel` = $id;",$db);
		if(mysql_num_rows($result2) > 0) {
			echo ("<div class=\"block850_2\" style=\"background:#E9E9E9;\"><ul><h2>Photos ($p)</h2><hr class='hr_enterYellow'>");
			$i = 1;
			while($photo = mysql_fetch_array($result2)){
				echo ("
					<li class=\"photo\">
						<a href=\"$photo[photoSrc]\" rel=\"gallery\"  class=\"pirobox_gall\" title=\"Photo $i\">
							<img src=\"$photo[photoSrc]\" width=\"266\" height=\"185\" />
						</a>
					</li>
				");
				$i++;
			}
			echo ("</ul></div>");
		}
	?>	
	<div class="block850_2" style="background:#E9E9E9; padding-bottom:10px;">
		<?php
			if(userVerification())
				echo ("
					<br />
					<h2>Leave a review</h2>
					<hr class=\"hr_enterYellow\">
					<form name=\"newReview\" method=\"POST\" action=\"./new_review.php\">
						<input type=\"hidden\" name=\"hotelID\" value=\"$id\">
						<input type=\"hidden\" name=\"userID\" value=\"$_SESSION[id]\">
						<p><span class=\"redFont\">*</span>Rating:<br />
							<label><input type=\"radio\" name=\"rating\" value=\"1\">1</label>&nbsp;
							<label><input type=\"radio\" name=\"rating\" value=\"2\">2</label>&nbsp;
							<label><input type=\"radio\" name=\"rating\" value=\"3\" checked=\"checked\">3&nbsp;
							<label><input type=\"radio\" name=\"rating\" value=\"4\">4</label>&nbsp;
							<label><input type=\"radio\" name=\"rating\" value=\"5\">5</label>
						</p>
						<p><label for=\"reviewText\"><span class=\"redFont\">*</span>Review:</label><br /><textarea placeholder=\"Type review here\" name=\"reviewText\" rows=\"7\" id=\"reviewText\"></textarea></p>
						<p><span class=\"redFont\">*</span> denotes a mandatory field!</p>
						<p class=\"submit\"><input type=\"submit\" name=\"submit\" value=\"Add a review\"></p>
					</form>		
				");
			else
				echo ("
					<p class=\"loginRequest\"><a href=\"./registration.php\">Register</a> or <a href=\"./login.php\">log in</a> in order to leave reviews, add information about hotels and chat with other users of the site.</p>
				");
			
			$result3 = mysql_query("SELECT * FROM `hotelreviews` WHERE `code_hotel` = $id ORDER BY `id` DESC;",$db);
			if ($r <= 0)
				echo ("
					<h2>No reviews</h2>
					<hr class='hr_enterYellow'>
				");
			else {
				$average = hotelRating($ra);
				echo ("
						<h2>Reviews ($r) $average</h2>
						<hr class='hr_enterYellow'>
				");
				while($review = mysql_fetch_array($result3)) {
					$result4 = mysql_query("SELECT * FROM `users` WHERE `id`=".$review['code_user'].";",$db);
					$user = mysql_fetch_array($result4);
					$avatar = $user['avatar'];
					$name = $user['login'];
					$assessment = hotelRating($review[assessment]);
					echo ("
						<div class=\"review\">
							<a href=\"./profile.php?id=$review[code_user]\"><img alt=\"\" src=\"$avatar\" height=\"70\" width=\"70\" /></a>
							<h3><a href=\"./profile.php?id=$review[code_user]\">$name</a></h3>
							$assessment
							<br />
							<p>$review[date]</p>
							<p class=\"reviewText\">$review[review]</p>
						</div>
						<br />
					");
				}						
			}
			///////////////////////////////////////////////////////////////////mysql_close();
		?>
	</div>
</div>
<?php
	include "./footer.php";
?>