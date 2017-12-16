<?php
	require("./auth.php");
	$userID = $_SESSION['id'];
	$title = "Удаление сообщения";
	include "./header.php";
?>
<div id="content">
	<?php
		if(isset($_GET['id'])) 
			$id = $_GET['id'];
		else 
			errorGoBack("./profile.php?id=$userID", "Невозможно удалить сообщение...",$values,"Мой аккаунт");
			
		if(!preg_match("|^[\d]+$|", $id)) 
			errorGoBack("./profile.php?id=$userID", "Невозможно удалить сообщение...",$values,"Мой аккаунт");
			
		include("./bd.php");
		mysql_query("DELETE FROM `messages` WHERE `id` = \"$id\";");
		echo ("
			<div id='block500'>
				<p>Сообщение было удалено!</p>
				<p><a href='./profile.php?id=$userID'>Мой аккаунт</a></p>
			</div>
		");
	?>
</div>
<?php
	include "./footer.php";
?>