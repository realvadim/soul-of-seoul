<?
	//reviewAdding.php
	$connect = mysql_connect("localhost","root","apmsetup") or die ("Connection failed!");
	mysql_select_db("soul_of_seoul",$connect) or die ("Selection failed!");	
	
	if ($_POST['name'] == "" || $_POST['reviewText'] == "")
	{
		echo
		("
			<script>
				alert('Please, fill all fields!');
				history.go(-1);
			</script>
		");
		exit;
	}
	
	
	
	
	$code = $_POST['code'];
	$name = $_POST['name'];
	$date = date("Y.m.d H:i");
	$reviewText = $_POST['reviewText'];
	$reviewText = nl2br($reviewText);
	$rating = $_POST['rating'];
	
	/*echo $code;
	echo "<br /><br />";
	echo $name;
	echo "<br /><br />";
	echo $reviewText;
	echo "<br /><br />";
	echo $rating;*/
	
	$sql = "insert into reviews(code,name,date,reviewText,rating) values('$code','$name','$date','$reviewText','$rating');";
	
	$result = mysql_query($sql);

	if($result)
	{
		//echo ("New review was added successfully!");
		//echo ("<script>location.href = './hotel.php?code=$code';</script>");
		echo 
		("
			New review was added successfully!<br>
			<meta http-equiv='refresh' content='3; url=./hotel.php?code=$code'>
		");
	}
	else
	{
		echo 
		("
			<script>
				alert('Review was not added!');
				history.go(-1);
			</script>
		");
		exit;
	}
	
	$sql = "select rev_quan, rating from hotels where code=$code;";
	$result = mysql_query($sql);
	$resultArray = mysql_fetch_array($result);
	$current_quan = $resultArray[rev_quan];
	//echo("$current_quan");
	//echo("<script>alert('sdfsdfs');</script>");
	$current_quan++;
	$sql = "update hotels set rev_quan=$current_quan where code=$code;";
	$result = mysql_query($sql);
	
	$current_rating = $resultArray[rating];
	//echo("$current_quan");
	//echo("<script>alert('sdfsdfs');</script>");
	if ($current_rating == 0) 
	{
		$current_rating = $rating;
	}
	else
	{
		$current_rating = ($current_rating + $rating)/2;
	}

	$sql = "update hotels set rating=$current_rating where code=$code;";
	$result = mysql_query($sql);
	
	
	mysql_close();	
?>