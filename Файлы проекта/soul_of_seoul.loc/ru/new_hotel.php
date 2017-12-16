<?php
	require("./auth.php");
	$title = "Новый отель";
	include("./header.php");
?>
<div id="content">
	<div id="block900">
		<h1>Новый отель</h1>
		<form action="./new_hotel_script.php" method="POST" enctype="multipart/form-data">
			<p>
				<label><span class="redFont">*</span>Наименование отеля:<br />
					<input name="name" type="text" maxlength="40" value="<?php echo $_GET['v0']; ?>" placeholder='Наименование отеля' />
				</label>
			</p>
			<p><span class="redFont">*</span>Звёздность:<br />
				<label><input name="classif" type="radio" value="5*" checked="checked" />5*</label>&nbsp;
				<label><input name="classif" type="radio" value="4*" />4*</label>&nbsp;
				<label><input name="classif" type="radio" value="3*" />3*</label>&nbsp;
				<label><input name="classif" type="radio" value="2*" />2*</label>&nbsp;
				<label><input name="classif" type="radio" value="1*" />1*</label>
			</p>
			<p><label for="description"><span class="redFont">*</span>Описание:</label></p>
			<p><textarea name="description" id="description" rows="15" placeholder='Опишите отель здесь'><?php echo $_GET['v1']; ?></textarea></p>
			<p>Фото:<br />
				<input type="file" name="fupload[]" /><input type="file" name="fupload[]" />
				<input type="file" name="fupload[]" /><input type="file" name="fupload[]" />
				<input type="file" name="fupload[]" /><input type="file" name="fupload[]" />
			</p>
			<p>Поля, отмеченные <span class="redFont">*</span>, обязательны к заполнению!</p>
			<p class="submit"><input type="submit" name="submit" value="Добавить отель" /></p>
		</form>
	</div>
</div>
<?php
	include("./footer.php");
?>