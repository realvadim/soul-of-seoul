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
	<div id="block500">
		<h1>Регистрация</h1>
		<form action="save_user.php" method="POST" enctype="multipart/form-data">
			<p>
				<label><span class="redFont">*</span>Имя пользователя:<br />
					<input type="text" name="login" maxlength="12" value="<?php echo $_GET['v0']; ?>" placeholder="Имя пользователя" />
				</label>
			</p>
			<p>
				<label><span class="redFont">*</span>Придумайте пароль:<br />
					<input type="password" name="password" maxlength="15" placeholder="Пароль" />
				</label>
			</p>
			<p>
				<label><span class="redFont">*</span>Ваш email адрес:<br />
					<input name="email" type="text" maxlength="100" value="<?php echo $_GET['v1']; ?>" placeholder="Email" />
				</label>
			</p>
			<p>
				<label>
					Выберите аватар:<br />
					<input type="file" name="fupload">
				</label>
			</p>
			<!-- В “./code/my_codegen.php” генерируется код и рисуется изображение -->		
			<p><span class="redFont">*</span>Введите код с картинки:<br /><img src="../code/my_codegen.php"></p>
			<p><input type="text" name="code" placeholder="Код" /></p>
			<p>Поля, отмеченные <span class="redFont">*</span>, обязательны к заполнению!</p>
			<p class="submit">
				<input type="submit" name="submit" value="Зарегистрироваться" />
			</p>
			<p><a href="./login.php">Уже зарегистрированы? Войдите сейчас!</a></p>
		</form>
	</div>
</div>
<?php
	include "./footer.php";
?>