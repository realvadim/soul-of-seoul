<?php
	require("./auth.php");
	include("./bd.php");
	$title = "All users";
	include "./header.php";
?>
<div id="content">
	<div id="block900">
		<h1 class="h1_enter">All users</h1>
		<?php
			$result = mysql_query("SELECT `login`,`id`,`avatar` FROM `users` WHERE `activation` = 1 ORDER BY `login`;",$db);
			while($row = mysql_fetch_array($result)) 
				echo ("
					<div class=\"user\">
						<p><a href=\"./profile.php?id=$row[id]\"><img src=\"$row[avatar]\" width=\"150\" height=\"150\" alt=\"$row[login]\" /></a></p>
						<p><a href=\"./profile.php?id=$row[id]\">$row[login]</a></p>
					</div>
				");
		?>
	</div>
</div>
<?php
	include "./footer.php";
?>