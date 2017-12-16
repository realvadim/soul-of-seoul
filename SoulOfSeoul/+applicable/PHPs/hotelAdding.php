<?
	//hotelAdding.php
	$connect = mysql_connect("localhost","root","apmsetup") or die ("Connection failed!");
	mysql_select_db("soul_of_seoul",$connect) or die ("Selection failed!");
	
	$code = $_POST['code'];
	$name = $_POST['name'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$rating = $_POST['rating'];
	$category = $_POST['category'];
	$photos = $_POST['photos'];
	$reviews = $_POST['reviews'];	
	$html_code = addslashes($_POST['html_code']);
	
	/*echo $code;
	echo "<br /><br />";
	echo $name;
	echo "<br /><br />";
	echo $country;
	echo "<br /><br />";
	echo $city;
	echo "<br /><br />";
	echo $rating;
	echo "<br /><br />";
	echo $category;
	echo "<br /><br />";
	echo $photos;
	echo "<br /><br />";
	echo $reviews;
	echo "<br /><br />";
	echo $html_code;*/
	
	
	$sql = "insert into hotels(code,name,country,city,rating,category,ph_quan,rev_quan,html_code) values('$code','$name','$country','$city','$rating','$category','$photos','$reviews','$html_code');";
	
	$result = mysql_query($sql);
	mysql_close();
	if($result)
	{
		echo 
		("
		Insertion is successful!<br>
		<meta http-equiv='refresh' content='3; url=./hotelAdding.html'>
		");
	}
	else
	{
		echo 
		("
			<script>
				alert('Insertion is failed!');
				history.go(-1);
			</script>
		");
	}
?>