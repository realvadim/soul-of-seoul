<?php
    //вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!
	session_start();
	require("./my_functions.php");

	if(userVerification()) {
		header("Location: ./profile.php?id=$_SESSION[id]");
		exit();
	}

	$title = "Entry";
	include "./header.php";
?>
<div id="content">
	<div id="block500">
		<h1>Entry</h1>
		<form action="test_login.php" method="POST">
			<p>
				<label>Username:<br />
					<input name="login" type="text" maxlength="12" value="<?php echo $_GET['v0']; ?>" placeholder="Username" />
				</label>
			</p>
			<p>
				<label>Password:<br />
					<input name="password" type="password" maxlength="15" placeholder="Password" />
				</label>
			</p>
			<p class="submit">
				<input type="submit" name="submit" value="Log in" />
			</p>
			<p><a href="./send_password.php">Forgot your password?</a></p>
			<p><a href="./registration.php">Not registered yet? Sign up!</a></p>
		</form>
	</div>
</div>
<?php
	include "./footer.php";
?>