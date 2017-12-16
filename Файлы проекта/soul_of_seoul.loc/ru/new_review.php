<?php
	require("./auth.php");
	$title = "Новый отзыв";
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
			errorGoBack("./hotel.php?id=$hotelID", "Заполните все поля формы написания отзыва!",$values,"Попробовать снова");
			
		$rating = $_POST['rating'];
		$userID = $_POST['userID'];
		
		$reviewText = stripslashes($reviewText);
		$reviewText = htmlspecialchars($reviewText);
		$reviewText = nl2br($reviewText);
		
		$date = date("d.m.Y, в H:i");
		
		include("./bd.php");
		
		$result = mysql_query("INSERT INTO `hotelreviews`(`code_hotel`,`code_user`,`review`,`assessment`,`date`) VALUES($hotelID, $userID,\"$reviewText\",$rating,\"$date\");",$db) or die(mysql_error());
		
		mysql_close();
		
		if($result == 'TRUE') {
			echo ("
				<div id='block500'>
					<p>Спасибо, Ваш отзыв к отелю был успешно добавлен!</p>
					<p><a href='./hotel.php?id=$hotelID'>Страница отеля</a> | <a href='./about_seoul.php'>На главную</a></p>
				</div>
			");		
		}
		else 
			errorGoBack("./hotel.php?id=$hotelID", "Ваш отзыв не добавлен добавлен...", $values,"Страница отеля");
	?>
</div>
<?php
	include "./footer.php";
?>