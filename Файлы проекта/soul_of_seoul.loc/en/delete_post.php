<?php
	require("./auth.php");
	$userID = $_SESSION['id'];
	$title = "Delete post";
	include "./header.php";
?>
<div id="content">
	<?php
		if(isset($_GET['id'])) 
			$id = $_GET['id'];
		else 
			errorGoBack("./profile.php?id=$userID", "The message can not be deleted...",$values,"My account");
			
		if(!preg_match("|^[\d]+$|", $id)) 
			errorGoBack("./profile.php?id=$userID", "The message can not be deleted...",$values,"My account");
			
		include("./bd.php");
		mysql_query("DELETE FROM `messages` WHERE `id` = \"$id\";");
		echo ("
			<div id='block500'>
				<p>The message was successfully deleted!</p>
				<p><a href='./profile.php?id=$userID'>My account</a></p>
			</div>
		");
	?>
</div>
<?php
	include "./footer.php";
?>