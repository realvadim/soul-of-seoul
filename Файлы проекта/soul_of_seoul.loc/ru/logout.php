<?php
	session_start();
	require("./my_functions.php");

	if(!userVerification()) {
		exit("<html><head><meta http-equiv=\"refresh\" content=\"0; url=./login.php\"></head></html>");
	}
	
	//уничтожаем переменные в сессиях
	unset($_SESSION['id']);
	unset($_SESSION['login']);
	unset($_SESSION['password']);
	
	session_destroy();
	
	// отправляем пользователя на главную страницу.
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=./login.php'></head></html>");
?>