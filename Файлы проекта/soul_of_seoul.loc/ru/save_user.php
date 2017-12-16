<?php
    //вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!
	session_start();
	require("./my_functions.php");

	if(userVerification()) {
		exit("<html><head><meta http-equiv=\"refresh\" content=\"0; url=./profile.php?id=$_SESSION[id]\"></head></html>");
	}

	$title = "Регистрация";
	include "./header.php";
?>
<div id="content">
	<?php
		$values = array();
		//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
		if(isset($_POST['login'])) {
			$login = $_POST['login'];
			$values[] = $login;
			if($login == '')
				unset($login);
		}
		
		//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
		if(isset($_POST['password'])) {
			$password = $_POST['password'];
			if($password == '')
				unset($password);
		}
		
		//заносим введенный пользователем e-mail, если он пустой, то уничтожаем переменную
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
			$values[] = $email;
			if($email == '')
				unset($email);
		}
		
		//заносим введенный пользователем защитный код в переменную $code, если он пустой, то уничтожаем переменную
		if(isset($_POST['code'])) {
			$code = $_POST['code'];		
			if($code == '')
				unset($code);
		}
		
		//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
		if(empty($login) or empty($password) or empty($code) or empty($email))
			errorGoBack("./registration.php", "Вы ввели не всю информацию!",$values,"Попробовать снова");
		
		//проверка е-mail адреса регулярными выражениями на корректность
		if(!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email))
			errorGoBack("./registration.php", "Неверно введен еmail адрес!",$values,"Попробовать снова");
		
		//добавляем проверку на длину логина и пароля
		if(strlen($login) < 3 or strlen($login) > 12)
			errorGoBack("./registration.php", "Имя пользователя должно состоять не менее, чем из 3 символов и не более, чем из 12!",$values,"Попробовать снова");
		
		if(strlen($password) < 6 or strlen($password) > 15)
			errorGoBack("./registration.php", "Пароль должен состоять не менее, чем из 6 символов и не более, чем из 15 символов!",$values,"Попробовать снова");
		
		//запускаем функцию, генерирующую код. Можно даже вывести ее в отдельный файл
		function generate_code() {
			$hours = date("H"); //час
			$minutes = substr(date("H"),0,1); //минута 
			$mouns = date("m"); //месяц
			$year_day = date("z"); //день в году
			$str = $hours.$minutes.$mouns.$year_day;
			$str = md5(md5($str)); //дважды шифруем в md5
			$str = strrev($str);
			$str = substr($str, 3, 6);
			$array_mix = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
			srand((float)microtime()*1000000);
			shuffle($array_mix); //Тщательно перемешиваем
			return implode("", $array_mix);
		}
		
		//проверяем код
		function chec_code($code) {
			$code = trim($code); 
			$array_mix = preg_split('//', generate_code(), -1, PREG_SPLIT_NO_EMPTY);
			$m_code = preg_split('//', $code, -1, PREG_SPLIT_NO_EMPTY);
			$result = array_intersect($array_mix, $m_code);
			if(strlen(generate_code()) != strlen($code))
				return FALSE;
			if(sizeof($result) == sizeof($array_mix))
				return TRUE;
			else
				return FALSE;
		}
			
		//после сравнения проверяем, пускать ли пользователя дальше или, он сделал ошибку
		if(!chec_code($_POST['code']))
			errorGoBack("./registration.php", "Код с картинки был введён неправильно!",$values,"Попробовать снова");

		//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
		$login = stripslashes($login);
		$login = htmlspecialchars($login);
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		//удаляем лишние пробелы
		$login = trim($login);
		$password = trim($password);
		
		//проверяем, отправил ли пользователь изображение
		if(!empty($_FILES['fupload']['name'])) {
			$fupload = $_FILES['fupload']['name'];
			//если переменная $fupload пуста, то удаляем ее
			if($fupload == '' or empty($fupload))
				unset($fupload);
		}
		
		//если переменной не существует (пользователь не отправил изображение), то присваиваем ему заранее приготовленную картинку с надписью "нет аватара"
		if(!isset($fupload) or empty($fupload) or $fupload == '')
			$avatar = "../commonImages/avatars/net-avatara.jpg";
		//иначе - загружаем изображение пользователя
		else
			$avatar = createThumb($_FILES['fupload'],$values);	
		
		//шифруем пароль
		$password = md5($password);
		//для надежности добавим реверс
		$password = strrev($password); 

		//подключаемся к базе
		include("bd.php");
		
		//проверка на существование пользователя с таким же логином
		$result = mysql_query("SELECT `id` FROM `users` WHERE `login` = \"$login\";",$db);
		$row = mysql_fetch_array($result);
		if(!empty($row['id']))
			errorGoBack("./registration.php", "Данное имя пользователя уже занято. Выберите, пожалуйста, другое.",$values,"Попробовать снова");
		
		//проверка на существование пользователя с таким же email
		$result = mysql_query("SELECT `id` FROM `users` WHERE `email` = \"$email\";",$db);
		$row = mysql_fetch_array($result);
		if(!empty($row['id']))
			errorGoBack("./registration.php", "Пользователь с таким email адресом уже зарегистрирован!",$values,"Попробовать снова");
		
		//если такого нет, то сохраняем данные
		$result2 = mysql_query("INSERT INTO `users`(`login`, `password`, `avatar`, `email`, `date`) VALUES(\"$login\", \"$password\", \"$avatar\", \"$email\", NOW());");
		
		//проверяем, есть ли ошибки
		if($result2 == 'TRUE') {
			//извлекаем идентификатор пользователя. Благодаря ему у нас и будет уникальный код активации
			$result3 = mysql_query ("SELECT `id` FROM `users` WHERE `login` = \"$login\";",$db);
			$row3 = mysql_fetch_array($result3);
			//код активации аккаунта. Зашифруем	через функцию md5 идентификатор и логин. Такое сочетание пользователь вряд ли сможет подобрать вручную через адресную строку
			$activation = md5($row3['id']).md5($login);
			
			//тема сообщения
			$subject = "Подтверждение регистрации";
			//содержание сообщение
			$message = "Здравствуйте! Благодарим Вас за регистрацию на проекте Soul Of Seoul.\n\nВаше имя пользователя: ".$login."\n\nПерейдите по ссылке ниже, чтобы активировать ваш аккаунт:\nhttp://soul_of_seoul.loc/ru/activation.php?login=".$login."&code=".$activation."\n\nС уважением,\nАдминистрация проекта Soul Of Seoul.";
			
			$header="From: 'Soul Of Seoul' <vadi7mir@gmail.com>". "\r\n";
			$header.="Content-type: text/plain; charset=\"utf-8\"";
			
			//отправляем сообщение
			mail($email, $subject, $message, $header);
			echo ("
				<div id='block500'>
					<p>
						Вам на email адрес выслано письмо с cсылкой, для подтверждения регистрации.
						<br />Внимание! Данная ссылка будет действительна в течение 1 часа.
					</p>
					<p><a href='./about_seoul.php'>На главную</a> | <a href='./login.php'>Войти</a></p>
				</div>
			");		
		}
		else 
			errorGoBack("./registration.php", "Вы не зарегистрированы...",$values,"Попробовать снова");
	?>
</div>
<?php
	include "./footer.php";
?>