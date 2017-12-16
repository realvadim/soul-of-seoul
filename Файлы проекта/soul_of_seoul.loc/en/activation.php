<?php
    //вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!
	session_start();
	require("./my_functions.php");

	if(userVerification()) {
		exit("<html><head><meta http-equiv=\"refresh\" content=\"0; url=./profile.php?id=$_SESSION[id]\"></head></html>");
	}

	$title = "Account activation";
	include "./header.php";
?>
<div id='content'>
	<?php
		include ("bd.php");
		//извлекаем аватарки тех пользователей, которые в течении часа не активировали свой аккаунт. Следовательно их надо удалить из базы, а так же и файлы их аватарок
		$result4 = mysql_query ("SELECT `avatar` FROM `users` WHERE `activation` = '0' AND UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 3600");
		if(mysql_num_rows($result4) > 0) {
			$myrow4 = mysql_fetch_array($result4);
			//удаляем аватары в цикле, если они не стандартные
			do {
				if ($myrow4['avatar'] != "../commonImages/avatars/net-avatara.jpg")
					unlink($myrow4['avatar']);
			}
			while($myrow4 = mysql_fetch_array($result4));
		}
		//удаляем пользователей из базы
		mysql_query("DELETE FROM `users` WHERE `activation` = '0' AND UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 3600");
		
		//код подтверждения
		if(isset($_GET['code']))
			$code = $_GET['code'];
		else
			errorGoBack("./about_seoul.php", "The account can not be activated...",$values,"Home");
		
		if(isset($_GET['login']))
			$login = $_GET['login'];
		else
			errorGoBack("./about_seoul.php", "The account can not be activated...",$values,"Home");

		$result = mysql_query("SELECT `id` FROM `users` WHERE `login` = \"$login\";", $db);
		$row = mysql_fetch_array($result);
		$activation = md5($row['id']).md5($login);
		if($activation == $code) {
			mysql_query("UPDATE `users` SET activation='1' WHERE login = \"$login\";",$db);
			echo ("			
				<div id='block500'>
					<p>Congratulations! Your email address was confirmed! Now you can log in with your username and password!</p>
					<p><a href='./login.php'>Log in</a></p>
				</div>
			");
		}
		else errorGoBack("./about_seoul.php", "Your email address was not confirmed...",$values,"Home");
	?>
</div>
<?php
	include "./footer.php";
?>