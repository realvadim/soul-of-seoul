<?php
	require("./auth.php");
	$title = "User account";
	include "./header.php";
?>
<div id="content">
	<?php	
		//id "хозяина" странички
		if(isset($_GET['id']))
			$id = $_GET['id'];
		else 
			errorGoBack("./about_seoul.php", "The user account can not be displayed...",$values,"Home");
		
		//если id не число, то останавливаем скрипт
		if (!preg_match("|^[\d]+$|", $id)) 
			errorGoBack("./about_seoul.php", "The user account can not be displayed...",$values,"Home");
			
		include ("bd.php");	
		//Извлекаем все данные пользователя с данным id
		$result = mysql_query("SELECT * FROM `users` WHERE `id` = \"$id\";", $db);
		$row = mysql_fetch_array($result);
		if(empty($row['login'])) 
			errorGoBack("./about_seoul.php", "The user does not exist! Perhaps he was deleted.",$values,"Home");
	?>
	<div id="block900">
		<p class="profileImage"><img src="<?php echo $row['avatar']; ?>" width="285" height="285" alt="<?php echo $row['login']; ?>" /></p>
		<h1><?php echo $row['login']; ?></h1>
		<p id="logoutLink"><a href='./logout.php'>Logout (<?php echo $_SESSION['login']; ?>)</a></p>
		<?php
			//Если страничка принадлежит вошедшему, то предлагаем изменить данные и выводим личные сообщения
			if($_SESSION['id'] == $id) {
				echo ("
					<p>Email address: <a href=\"mailto:$row[email]\">$row[email]</a></p>
					<br />
					<p><a href=\"./new_hotel.php\" target=\"_blank\">Add information about a hotel</a></p>
					<div class=\"jquery-spoiler\">
						<a href=\"#\">Edit account</a>
						<div class=\"invisible\">
							<form action='update_user.php' method='POST' enctype='multipart/form-data'>
								<input type='hidden' name='userID' value='$_SESSION[id]' />
								<p>
									<label>New username:<br />
										<input name='username' type='text' maxlength='12' value='$_GET[v0]' placeholder='New username' />
									</label>
								</p>
								<p>
									<label>New password:<br />					
										<input name='password' type='password' maxlength='15' placeholder='New password' />
									</label>
								</p>
								<p>
									<label>New avatar:<br />
										<input type='FILE' name='fupload' />
									</label>
								</p>
								<p class=\"submit\">
									<input type='submit' name='submit' value='Apply' />
								</p>
							</form>
						</div>
					</div>
					<table id=\"messageTable\">	
				");
				
				//извлекаем сообщения пользователя, сортируем по идентификатору в обратном порядке, т.е. самые    новые сообщения будут вверху
				$tmp = mysql_query("SELECT * FROM `messages` WHERE code_poluchatel = \"$_SESSION[id]\" OR code_author = \"$_SESSION[id]\" ORDER BY `id` DESC;", $db);
				$messages = mysql_fetch_array($tmp);
				if(!empty($messages['id'])) {
					//выводим все сообщения в цикле
					$id = $messages['id'];
					echo ("
						<tr>
							<th colspan=\"6\">All messages</th>
						</tr>
						<tr>
							<th>Photo</th>
							<th>From</th>
							<th>To</th>
							<th width=\"100px\">Date</th>
							<th>Message</th>
							<th>&nbsp;</th>
						</tr>
					");
					do {
						$code_author = $messages['code_author'];
						$code_poluchatel = $messages['code_poluchatel'];
						if($code_author != $_SESSION['id']) 
							$result4 = mysql_query("SELECT `avatar` FROM `users` WHERE `id` = \"$code_author\";",$db);
						else 
							$result4 = mysql_query("SELECT `avatar` FROM `users` WHERE `id` = \"$code_poluchatel\";",$db);
						$row4 = mysql_fetch_array($result4);
						if (!empty($row4['avatar'])) 
							$avatar = $row4['avatar'];
						//если такового нет, то выводим стандартный (может этого пользователя уже давно удалили)
						else 
							$avatar = "../commonImages/avatars/net-avatara.jpg";
						
						$result5 = mysql_query("SELECT `login` FROM `users` WHERE `id` = $code_author;",$db);
						$row5 = mysql_fetch_array($result5);
						$author = $row5['login'];
						
						$result5 = mysql_query("SELECT `login` FROM `users` WHERE `id` = $code_poluchatel;",$db);
						$row5 = mysql_fetch_array($result5);
						$poluchatel = $row5['login'];
						
						if($_SESSION['id'] == $code_author) {
							$author = "Me";
							$interlocutor = $code_poluchatel;
							$poluchatel = "<a href=\"./profile.php?id=$interlocutor\">".$poluchatel."</a>";
						}
						else {
							$poluchatel = "Me";
							$interlocutor = $code_author;
							$author = "<a href=\"./profile.php?id=$interlocutor\">".$author."</a>";
						}
						
						echo ("
							<tr>
								<td><a href=\"./profile.php?id=$interlocutor\"><img alt='' src='$avatar' height='70' width='70' /></a></td>
								<td>$author</td>
								<td>$poluchatel</td>
								<td>$messages[date]</td>
								<td>$messages[text]</td>
								<td><a href='./delete_post.php?id=$messages[id]'>Удалить</a></td>
							</tr>
						");
					}
					while($messages = mysql_fetch_array($tmp));
				}
				//если сообщений не найдено
				else 
					echo ("<tr><td>No messages</td></tr>");
				echo ("</table>");
			}
			//если страничка чужая, то выводим только некторые данные и форму для отправки cообщений
			else 
				echo ("
					<form action='./new_post.php' method='POST'>
						<p><label for='text'>Your message:</label></p>
						<p><textarea id='text' name='text' rows='8' placeholder='Type message here'></textarea></p>
						<p class=\"submit\"><input type='submit' name='submit' value='Send' /></p>
						<!--<input type='text' name='code_poluchatel' value='$row[login]'>-->
						<input type='hidden' name='code_poluchatel' value='$id'>
					</form>
				");
		?>
	</div>
</div>
<?php
	include "./footer.php";
?>