<?php
	session_start();
	require("./my_functions.php");
	
	if(empty($_SESSION['login']) or empty($_SESSION['id']) or empty($_SESSION['password'])) {
		header("Location: ./login.php");
		exit();
	}
	
	if(!userVerification()) {
		header("Location: ./login.php");
		exit();
	}
?>