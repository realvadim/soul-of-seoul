<?php
    //вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!
	session_start();
	require("./my_functions.php");

	if(userVerification())
		exit("<html><head><meta http-equiv=\"refresh\" content=\"0; url=./profile.php?id=$_SESSION[id]\"></head></html>");

	$title = "Запрос нового пароля";
	include "./header.php";
?>
<div id="content">	
	<?php
		//require("./my_functions.php");
		if(isset($_POST['login'])) {
			$login = $_POST['login'];
			$values[] = $login;
			if($login == '') unset($login);    
		}
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
			$values[] = $email;
			if ($email == '') unset($email);
		}
		if(isset($login) and isset($email)) {
			include ("./bd.php");
			$result = mysql_query("SELECT `id` FROM `users` WHERE `login` = \"$login\" AND `email` = \"$email\" AND activation='1';", $db);
			$row = mysql_fetch_array($result);
			
			//если активированного пользователя с таким логином и е-mail адресом нет
			if(empty($row['id']) or $row['id'] == '')
				errorGoBack("./send_password.php", "Пользователя с таким email адресом и/или логином не обнаружено в базе данных...", $values,"Попробовать снова");
			
			//если пользователь с таким логином и email адресом найден, то необходимо сгенерировать для него случайный пароль, обновить его в базе и отправить на email
			$datenow = date('YmdHis');
			$new_password = md5($datenow);
			
			//извлекаем из шифра 10 символов начиная со второго. Это и будет наш случайный пароль. Далее запишем его в базу, зашифровав точно так же, как и обычно
			$new_password = substr($new_password, 2, 10);
			$new_password_sh = strrev(md5($new_password));
			mysql_query("UPDATE `users` SET `password` = \"$new_password_sh\" WHERE `login` = \"$login\";",$db);
			
			//тема сообщения
			$subject = "Восстановление пароля";
			//содержание сообщение
			$message = "Здравствуйте, ".$login."!\n\nНовый пароль к Вашему аккаунту был автоматически создан после получения соответствующего запроса.\nТеперь Вы сможете войти на сайт, используя его.\nПосле входа желательно сменить данный пароль.\n\nВаш новый пароль: ".$new_password."\n\nС уважением,\nАдминистрация проекта Soul Of Seoul.";
			$header="From: 'Soul Of Seoul' <vadi7mir@gmail.com>". "\r\n";
			$header.="Content-type: text/plain; charset=\"utf-8\"";
			
			//отправляем сообщение
			mail($email, $subject, $message, $header);
			echo "<div id='block500'><p>На Ваш email адрес отправлено письмо с новым паролем.</p><p><a href=\"./login.php\">Вход</a></p></div>";
		}
		//если данные не введены
		else echo ("
				<div id='block500'>
				<h1>Запрос нового пароля</h1>
				<form action='#' method='POST'>
					<p>
						<label>Имя пользователя:<br />
							<input type='text' name='login' maxlength='30' value='$_GET[v0]' placeholder='Имя пользователя' />
						</label>
					</p>
					<p>
						<label>Email адрес:<br />
							<input type='text' name='email' value='$_GET[v1]' placeholder='Email адрес' />
						</label>
					</p>
					<p class='submit'><input type='submit' name='submit' value='Получить новый пароль'></p>
					<p><a href=\"./login.php\">Вход</a></p>
				</form>
				</div>
			");
	?>
</div>
<?php
	include "./footer.php";
?>