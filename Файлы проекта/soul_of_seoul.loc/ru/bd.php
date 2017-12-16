<?php
	$db = mysql_connect("localhost","root","");
	mysql_select_db("vadi7mir_soulofseoul",$db);
	
	mysql_query ("set character_set_client='utf8'"); 
	mysql_query ("set character_set_results='utf8'"); 
	mysql_query ("set collation_connection='utf8_general_ci'"); 
?>