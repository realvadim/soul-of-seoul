<?php
	require("./auth.php");
	$title = "New hotel";
	include "./header.php";
?>
<div id="content">
	<?php
		$values = array();
		
		if(isset($_POST['name'])) {
			$name = $_POST['name'];
			$values[] = $name;
			if($name == '')
				unset($name);
		}
		
		if(isset($_POST['description'])) {
			$description = $_POST['description'];
			$values[] = $description;
			if($description == '')
				unset($description);
		}
		
		if(empty($name) or empty($description))
			errorGoBack("./new_hotel.php", "Fill all the mandatory fields!",$values,"Try again");
		
		$photosName = array();
		
		for($i = 0; $i < 6; $i++) {
			if ($_FILES['fupload']['name'][$i] != "")
				$photosName[] = loadCompressedPhoto($_FILES['fupload']['name'][$i],$_FILES['fupload']['tmp_name'][$i],$_FILES['fupload']['size'][$i],$i,$values);	
		}
		
		$name = stripslashes($name);
		$name = htmlspecialchars($name);
		$description = stripslashes($description);
		$description = htmlspecialchars($description);
		$description = nl2br($description);
		$classif = $_POST['classif'];

		include("./bd.php");
		
		$result = mysql_query("INSERT INTO `hotels`(`name`,`classif`,`description`) VALUES(\"$name\",\"$classif\",\"$description\");",$db) or die(mysql_error());
		
		$id = mysql_fetch_array(mysql_query("SELECT `id` FROM `hotels` WHERE `name` = \"$name\";",$db));
		$id = $id['id'];
		
		foreach($photosName as $photoName)
			mysql_query("INSERT INTO `hotelphotos`(`code_hotel`,`photoSrc`) VALUES($id,\"$photoName\");",$db) or die(mysql_error());

		mysql_close();
		
		if($result == 'TRUE') {
			echo ("
				<div id='block500'>
					<p>Information about new hotel was successfully saved on the site Soul of Seoul!<br />Thank you very much for your contribution!</p>
					<p><a href='./accomodation.php'>Accomodation</a> | <a href='./about_seoul.php'>Home</a></p>
				</div>
			");		
		}
		else 
			errorGoBack("./new_hotel.php", "Information about new hotel was not saved...", $values,"Try again");
	?>
</div>
<?php
	include "./footer.php";
?>