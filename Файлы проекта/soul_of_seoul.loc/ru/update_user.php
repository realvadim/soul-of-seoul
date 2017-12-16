<?php
	require("./auth.php");
	$title = "Редактирование данных аккаунта";
	include("./header.php");
?>
<div id="content">
	<?php
		$id = $_POST['userID'];
		$values = array();
		
		if(empty($_POST['username']) AND empty($_POST['password']) AND empty($_FILES['fupload']['name']))
			errorGoBack("./profile.php?id=$id", "Заполните поле(я), значение(я) которого(ых) вы хотите изменить!",$values,"Мой аккаунт");
		
		$linkText = "Мой аккаунт";
		
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
					errorGoBack("./profile.php?id=$id", "Данное имя пользователя уже занято. Выберите, пожалуйста, другое.",$values,"Попробовать снова");
					
				if(strlen($username) >= 3 AND strlen($username) <= 12) {
					$username = stripslashes($username);
					$username = htmlspecialchars($username);
					$username = trim($username);
					mysql_query("UPDATE `users` SET `login`=\"$username\" WHERE `id`=$id;",$db) or die(mysql_error());
				}
				else
					errorGoBack("./profile.php?id=$id", "Имя пользователя должно состоять не менее, чем из 3 символов и не более, чем из 12!",$values,"Попробовать снова");
			
				$linkText = "Вход";
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
					errorGoBack("./profile.php?id=$id", "Пароль должен состоять не менее, чем из 6 символов и не более, чем из 15!",$values,"Попробовать снова");
					
				$linkText = "Вход";
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
				<p>Изменения в данные вашего аккаунта были внесены успешно!</p>
				<p><a href='./login.php'>$linkText</a> | <a href='./about_seoul.php'>На главную</a></p>
			</div>
		");
	?>
</div>
<?php
	include "./footer.php";
?>