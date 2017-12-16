<?php
	//вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!
	session_start();
	require("./my_functions.php");
	if(userVerification())
		exit("<html><head><meta http-equiv=\"refresh\" content=\"0; url=./profile.php?id=$_SESSION[id]\"></head></html>");

	$title = "Log in";
	include "./header.php";
?>
<div id="content">
	<?php	
		//require("./my_functions.php");
		$values = array();
		
		//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
		if(isset($_POST['login'])) {
			$login = $_POST['login'];
			$values[] = $login;
			if ($login == '') 
				unset($login);
		}
		
		//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
		if(isset($_POST['password'])) {
			$password = $_POST['password']; 
			if($password == '') 
				unset($password);
		}
		
		//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
		if(empty($login) or empty($password)) 
			errorGoBack("./login.php", "Fill both of the fields!",$values,"Try again");
		
		//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
		$login = stripslashes($login);
		$login = htmlspecialchars($login);
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		
		//удаляем лишние пробелы
		$login = trim($login);
		$password = trim($password);

		//подключаемся к базе
		include ("bd.php");          

		//минипроверка на подбор паролей
		$ip = getenv("HTTP_X_FORWARDED_FOR");
		if(empty($ip) || $ip == 'unknown') 
			$ip = getenv("REMOTE_ADDR"); //извлекаем ip          
		
		//удаляем ip-адреса ошибавшихся при входе пользователей через 15 минут
		mysql_query("DELETE FROM `loginerrors` WHERE UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 900;");
			
		//извлекаем из базы количество неудачных попыток входа за последние 15 минут у пользователя с данным ip 
		$result = mysql_query("SELECT `col` FROM loginerrors WHERE ip = \"$ip\";", $db);
		$row = mysql_fetch_array($result);
		
		//если ошибок больше двух, т.е три, то выдаем сообщение
		if ($row['col'] > 2)
			errorGoBack("./about_seoul.php", "You used invalid username or password 3 times. Access to the account is denied for 15 minutes.",$values,"Homepage");         
		
		//шифруем и переворачиваем пароль:
		$password = md5($password);
		$password = strrev($password);
		
		//извлекаем из базы все данные о пользователе с введенным логином и паролем
		$result = mysql_query("SELECT * FROM `users` WHERE `login` = \"$login\" AND `password` = \"$password\"    AND activation='1';",$db);
		$row = mysql_fetch_array($result);
		
		//если пользователя с введенным логином и паролем не существует, то делаем запись о том, что данный ip не смог войти
		if (empty($row['id'])) {
			$select = mysql_query ("SELECT `ip` FROM loginerrors WHERE `ip` = \"$ip\";");
			$tmp = mysql_fetch_row($select);
			
			//проверяем, есть ли пользователь в таблице "loginerrors"
			if ($ip == $tmp[0]) {		 
				$result52 = mysql_query("SELECT `col` FROM loginerrors WHERE ip=\"$ip\";",$db);
				$row52 = mysql_fetch_array($result52);          
				//прибавляем еще одну попытку неудачного входа
				$col = $row52[0] + 1; 
				mysql_query("UPDATE loginerrors SET `col` = $col, `date` = NOW() WHERE `ip` = \"$ip\";");
			}
			//если за последние 15 минут ошибок не было, то вставляем новую запись в таблицу "loginerrors"
			else 
				mysql_query("INSERT INTO `loginerrors` (`ip`, `date`, `col`) VALUES (\"$ip\",NOW(),1);");
			
			errorGoBack("./login.php", "The username and/or password you entered are invalid!",$values,"Try again");
		}
		else {
			//Запускаем пользователю сессию!		
			//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
			$_SESSION['login'] = $row['login']; 
			$_SESSION['id'] = $row['id'];
			$_SESSION['password'] = $row['password'];
			
			//перенаправляем пользователя на главную страничку, там ему и сообщим об удачном входе               
			echo "<html><head><meta http-equiv='Refresh' content='0; URL=./profile.php?id=$row[id]'></head></html>";
		}
	?>