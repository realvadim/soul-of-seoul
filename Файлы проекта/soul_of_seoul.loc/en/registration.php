<?php
    //вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!
	session_start();
	require("./my_functions.php");

	if(userVerification()) {
		exit("<html><head><meta http-equiv=\"refresh\" content=\"0; url=./profile.php?id=$_SESSION[id]\"></head></html>");
	}

	$title = "Registration";
	include "./header.php";
?>
<div id="content">
	<div id="block500">
		<h1>Registration</h1>
		<form action="save_user.php" method="POST" enctype="multipart/form-data">
			<p>
				<label><span class="redFont">*</span>Username:<br />
					<input type="text" name="login" maxlength="12" value="<?php echo $_GET['v0']; ?>" placeholder="Username" />
				</label>
			</p>
			<p>
				<label><span class="redFont">*</span>Create your password:<br />
					<input type="password" name="password" maxlength="15" placeholder="Password" />
				</label>
			</p>
			<p>
				<label><span class="redFont">*</span>Your email address:<br />
					<input name="email" type="text" maxlength="100" value="<?php echo $_GET['v1']; ?>" placeholder="Email" />
				</label>
			</p>
			<p>
				<label>
					Choose avatar:<br />
					<input type="file" name="fupload">
				</label>
			</p>
			<!-- В “./code/my_codegen.php” генерируется код и рисуется изображение -->		
			<p><span class="redFont">*</span>Enter the code:<br /><img src="../code/my_codegen.php"></p>
			<p><input type="text" name="code" placeholder="Code" /></p>
			<p><span class="redFont">*</span> denotes a mandatory field!</p>
			<p class="submit">
				<input type="submit" name="submit" value="Register" />			
			</p>
			<p><a href="./login.php">Already registered? Log in now!</a></p>
		</form>
	</div>
</div>
<?php
	include "./footer.php";
?>