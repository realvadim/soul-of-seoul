<?php
    //вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!
	session_start();
	require("./my_functions.php");

	if(userVerification()) {
		header("Location: ./profile.php?id=$_SESSION[id]");
		exit();
	}

	$title = "Вход";
	include "./header.php";
?>
<div id="content">
	<div id="block500">
		<h1>Вход</h1>
		<form action="test_login.php" method="POST">
			<p>
				<label>Имя пользователя:<br />
					<input name="login" type="text" maxlength="12" value="<?php echo $_GET['v0']; ?>" placeholder="Имя пользователя" />
				</label>
			</p>
			<p>
				<label>Пароль:<br />
					<input name="password" type="password" maxlength="15" placeholder="Пароль" />
				</label>
			</p>
			<p class="submit">
				<input type="submit" name="submit" value="Войти" />
			</p>
			<p><a href="./send_password.php">Забыли пароль?</a></p>
			<p><a href="./registration.php">Впервые на сайте? Зарегистрируйтесь!</a></p>
		</form>
	</div>
</div>
<?php
	include "./footer.php";
?>