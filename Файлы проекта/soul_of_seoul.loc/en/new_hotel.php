<?php
	require("./auth.php");
	$title = "New hotel";
	include("./header.php");
?>
<div id="content">
	<div id="block900">
		<h1>New hotel</h1>
		<form action="./new_hotel_script.php" method="POST" enctype="multipart/form-data">
			<p>
				<label><span class="redFont">*</span>Hotel name:<br />
					<input name="name" type="text" maxlength="40" value="<?php echo $_GET['v0']; ?>" placeholder='Hotel name' />
				</label>
			</p>
			<p><span class="redFont">*</span>Classification:<br />
				<label><input name="classif" type="radio" value="5*" checked="checked" />5*</label>&nbsp;
				<label><input name="classif" type="radio" value="4*" />4*</label>&nbsp;
				<label><input name="classif" type="radio" value="3*" />3*</label>&nbsp;
				<label><input name="classif" type="radio" value="2*" />2*</label>&nbsp;
				<label><input name="classif" type="radio" value="1*" />1*</label>
			</p>
			<p><label for="description"><span class="redFont">*</span>Description:</label></p>
			<p><textarea name="description" id="description" rows="15" placeholder='Describe hotel here'><?php echo $_GET['v1']; ?></textarea></p>
			<p>Photos:<br />
				<input type="file" name="fupload[]" /><input type="file" name="fupload[]" />
				<input type="file" name="fupload[]" /><input type="file" name="fupload[]" />
				<input type="file" name="fupload[]" /><input type="file" name="fupload[]" />
			</p>
			<p><span class="redFont">*</span> denotes a mandatory field!</p>
			<p class="submit"><input type="submit" name="submit" value="Add information" /></p>
		</form>
	</div>
</div>
<?php
	include("./footer.php");
?>