<?php
	require("./auth.php");
	$title = "Edit profile";
	include("./header.php");
?>
<div id="content">
	<?php
		$id = $_POST['userID'];
		$values = array();
		
		if(empty($_POST['username']) AND empty($_POST['password']) AND empty($_FILES['fupload']['name']))
			errorGoBack("./profile.php?id=$id", "Input the data you want to change!",$values,"My account");
		
		$linkText = "My account";
		
		include("./bd.php");	
		
		if(isset($_POST['username'])) {
			$username = $_POST['username'];
			
			if($username == $_SESSION['login'])
				exit("<html><head><meta http-equiv=\"Refresh\" content=\"0; url=./profile.php?id=$id\"></head></html>");
			
			if($username != '') {
				$values[] = $username;
				
				$result = mysql_query("SELECT `id` FROM `users` WHERE `login`=\"$username\";",$db) or die(mysql_error());
				$row = mysql_fetch_array($result);
				if(!empty($row['id']))
					errorGoBack("./profile.php?id=$id", "This username is already taken. Please select a different.",$values,"Try again");
					
				if(strlen($username) >= 3 AND strlen($username) <= 12) {
					$username = stripslashes($username);
					$username = htmlspecialchars($username);
					$username = trim($username);
					mysql_query("UPDATE `users` SET `login`=\"$username\" WHERE `id`=$id;",$db) or die(mysql_error());
				}
				else
					errorGoBack("./profile.php?id=$id", "The username must consist of at least 3 characters and no more than 12 characters!",$values,"Try again");
			
				$linkText = "Log in";
			}
		}
		
		if(isset($_POST['password'])) {
			$password = $_POST['password'];
			if($password != '') {
				$values[] = $password;
				if(strlen($password) >= 6 AND strlen($password) <= 15) {
					$password = stripslashes($password);
					$password = htmlspecialchars($password);
					$password = trim($password);
					$password = md5($password);
					$password = strrev($password);
					mysql_query("UPDATE `users` SET `password`=\"$password\" WHERE `id`=$id;",$db) or die(mysql_error());
				}
				else
					errorGoBack("./profile.php?id=$id", "The password must consist of at least 6 characters and no more than 15 characters!",$values,"Try again");
					
				$linkText = "Log in";
			}
		}
		
		if(!empty($_FILES['fupload']['name'])) {
			$result2 = mysql_query("SELECT `avatar` FROM `users` WHERE `id`=$id;",$db) or die(mysql_error());
			$row2 = mysql_fetch_array($result2);
			if($row2['avatar'] != "../commonImages/avatars/net-avatara.jpg")
				unlink($row2['avatar']);
			$avatar = createThumb($_FILES['fupload'],$values);
			mysql_query("UPDATE `users` SET `avatar`=\"$avatar\" WHERE `id`=$id;",$db) or die(mysql_error());
		}
		
		mysql_close();
		
		echo ("
			<div id='block500'>
				<p>Changes in your account details have been made successfully!</p>
				<p><a href='./login.php'>$linkText</a> | <a href='./about_seoul.php'>Home</a></p>
			</div>
		");
	?>
</div>
<?php
	include "./footer.php";
?>