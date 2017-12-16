<?php
	require("./auth.php");
	include ("bd.php");
		
	if (isset($_POST['text'])) 
		$text = $_POST['text'];
		
	if(isset($_POST['code_poluchatel']))	
		$code_poluchatel = $_POST['code_poluchatel'];
		
	$code_author = $_SESSION['id'];	
	$date = date("Y-m-d");

	$title = "New post";
	include "./header.php";
?>
<div id="content">
	<?php	
		if (empty($code_author) or empty($text) or empty($code_poluchatel) or empty($date)) 
			errorGoBack("./profile.php?id=$code_poluchatel","Type the message!",$values,"Try again");
		
		$text = stripslashes($text);
		$text = htmlspecialchars($text);
		$text = nl2br($text);
		mysql_query("INSERT INTO messages (code_author, code_poluchatel, date, text) VALUES ('$code_author','$code_poluchatel','$date','$text');",$db);
		
		echo ("
			<div id='block500'>
				<p>The message was sent!</p>
				<p><a href='./profile.php?id=$code_poluchatel'>Back</a></p>
			</div>
		");
	?>
</div>
<?php
	include "./footer.php";
?>