<?php
	require("./auth.php");
	$title = "New review";
	include "./header.php";
?>
<div id="content">
	<?php
		$values = array();
		
		if(isset($_POST['reviewText'])) {
			$reviewText = $_POST['reviewText'];
			$values[] = $reviewText;
			if($reviewText == '')
				unset($reviewText);
		}
		
		$hotelID = $_POST['hotelID'];
		
		if(empty($reviewText))
			errorGoBack("./hotel.php?id=$hotelID", "Fill all the mandatory fields!",$values,"Try again");
			
		$rating = $_POST['rating'];
		$userID = $_POST['userID'];
		
		$reviewText = stripslashes($reviewText);
		$reviewText = htmlspecialchars($reviewText);
		$reviewText = nl2br($reviewText);
		
		$date = date("d.m.Y, at H:i");
		
		include("./bd.php");
		
		$result = mysql_query("INSERT INTO `hotelreviews`(`code_hotel`,`code_user`,`review`,`assessment`,`date`) VALUES($hotelID, $userID,\"$reviewText\",$rating,\"$date\");",$db) or die(mysql_error());
		
		mysql_close();
		
		if($result == 'TRUE') {
			echo ("
				<div id='block500'>
					<p>Thank you, your review was successfully added!</p>
					<p><a href='./hotel.php?id=$hotelID'>Hotel page</a> | <a href='./about_seoul.php'>Home</a></p>
				</div>
			");		
		}
		else 
			errorGoBack("./hotel.php?id=$hotelID", "The review was not added...", $values,"Hotel page");
	?>
</div>
<?php
	include "./footer.php";
?>