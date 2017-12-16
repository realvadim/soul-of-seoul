<?php
	function errorGoBack($url, $er, $s, $linkText) {
		if(!empty($s)) {
			if(!preg_match("^\?^",$url))
				$url .= "?";
			else $url .= "&";
			
			$vars = http_build_query($s, 'v') . "\n";
			$url .= $vars;
		}
		echo ("
			<div id=\"errorBlock\">
					<h2>Ошибка</h2>
					<p>$er</p>
					<p><a href=\"$url\">$linkText</a></p>
			</div>
			</div>		
		");
		include "./footer.php";
		exit();
	}
	
	function hotelStars($classif) {
		switch($classif) {
			case "1*":
				return "./images/accomodation/1star.png";
				break;
			case "2*":
				return "./images/accomodation/2stars.png";
				break;
			case "3*":
				return "./images/accomodation/3stars.png";
				break;
			case "4*":
				return "./images/accomodation/4stars.png";
				break;
			case "5*":
				return "./images/accomodation/5stars.png";
				break;
		}
	}
	
	function hotelRating($rating) {
		if($rating == 0) {
			return "<hr class='noRating'>";
			exit();
		}
		switch($rating) {
			case ($rating > 0 AND $rating < 3 ):
				return "<span class='low'>$rating</span>";
				break;
			case ($rating >= 3 AND $rating < 4):
				return "<span class='medium'>$rating</span>";
				break;
			case $rating >= 4:
				return "<span class='high'>$rating</span>";
				break;
			//Не работает так ???
			//case $rating == 0:
			//	return "<hr class='noRating'>";
			//	break;
		}		
	}
	
	function userVerification() {
		include("./bd.php");
		$login = $_SESSION['login'];
		$password = $_SESSION['password'];
		$result = mysql_query("SELECT `id` FROM `users` WHERE `login` = \"$login\" AND `password` = \"$password\";",$db);
		$row = mysql_fetch_array($result);
		mysql_close();
		
		//если данные пользователя верны
		if(!empty($row['id']))
			return true;
		else
			return false;
	}
	
	function joinMysqlTables($id) {
		include("./bd.php");
		
		$result = mysql_query("SELECT * FROM `hotels` WHERE `id`=$id;",$db);
		$hotel = mysql_fetch_array($result);
		
		$coCi = mysql_query("SELECT cities.`name` AS `city`, countries.`name` AS `country` FROM `cities`,`countries` WHERE cities.`id` = $hotel[code_city] AND countries.`id` = $hotel[code_country];",$db) or die(mysql_error());
		$coCi = mysql_fetch_array($coCi);
		
		$revNum = mysql_query("SELECT COUNT('id') AS `number` FROM `hotelreviews` WHERE `code_hotel` = $hotel[id];",$db);
		$revNum = mysql_fetch_array($revNum);
						
		if($revNum['number'] != 0) {
			$sqlSum = mysql_query("SELECT SUM(`assessment`) AS `sum` FROM `hotelreviews` WHERE `code_hotel` = $hotel[id];",$db);
			$sqlSum = mysql_fetch_array($sqlSum);
			$rating = $sqlSum['sum'] / $revNum['number'];
			$rating = round($rating, 2);
		}
		else
			$rating = 0;
					
		$phNum = mysql_query("SELECT COUNT('id') AS `number` FROM `hotelphotos` WHERE `code_hotel` = $hotel[id];",$db);
		$phNum = mysql_fetch_array($phNum);
		
		mysql_close();
		
		return array("co"=>$coCi['country'], "ci"=>$coCi['city'], "ra"=>$rating, "r"=>$revNum['number'], "p"=>$phNum['number']);
	}
	
	function createThumb($fupload,$values) {
		//проверка формата исходного изображения
		if(preg_match('/[.](JPG)|(jpg)|(gif)|(GIF)|(png)|(PNG)|(jpeg)|(JPEG)$/', $fupload['name'])) {    
			//папка, куда будет загружаться начальная картинка и ее сжатая копия
			$path_to_90_directory = '../commonImages/avatars/'; 
				
			$filename = $fupload['name'];
			$source = $fupload["tmp_name"];
			$target = $path_to_90_directory.$filename;				
				
			//загрузка оригинала в папку $path_to_90_directory
			move_uploaded_file($source, $target);
				
			//если оригинал был в формате gif, то создаем изображение в этом же формате. Необходимо для последующего сжатия
			if(preg_match('/[.](GIF)|(gif)$/', $filename))
				$im = imagecreatefromgif($target);
				
			//если оригинал был в формате png, то создаем изображение в этом же формате. Необходимо для последующего сжатия
			if(preg_match('/[.](PNG)|(png)$/', $filename))
				$im = imagecreatefrompng($target);
				
			//если оригинал был в формате jpg, то создаем изображение в этом же формате. Необходимо для последующего сжатия
			if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename))
				$im = imagecreatefromjpeg($target);
							
			//СОЗДАНИЕ КВАДРАТНОГО ИЗОБРАЖЕНИЯ И ЕГО ПОСЛЕДУЮЩЕЕ СЖАТИЕ ВЗЯТО С САЙТА www.codenet.ru           
			//cоздание квадрата 300x300
			//dest - результирующее изображение 
			//w - ширина изображения 
			//ratio - коэффициент пропорциональности           
				
			//квадратная 300x300. Можно поставить и другой размер
			$w = 300;          
				
			//создаём исходное изображение на основе исходного файла и определяем его размеры			
			//вычисляем ширину
			$w_src = imagesx($im);
			//вычисляем высоту изображения
			$h_src = imagesy($im);
				
			//создаём пустую квадратную картинку. Важно именно truecolor, иначе будем иметь 8-битный результат
			$dest = imagecreatetruecolor($w,$w);           
				
			//вырезаем квадратную серединку по x, если фото горизонтальное 
			if($w_src > $h_src) 
				imagecopyresampled($dest, $im, 0, 0, round((max($w_src,$h_src) - min($w_src,$h_src))/2), 0, $w, $w, min($w_src,$h_src), min($w_src,$h_src));
				
			//вырезаем квадратную верхушку по y, если фото вертикальное (хотя можно тоже серединку) 
			if($w_src < $h_src) 
				imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, min($w_src,$h_src), min($w_src,$h_src));
				
			//квадратная картинка масштабируется без вырезок 
			if ($w_src == $h_src) 
				imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);           
				
			//вычисляем время в настоящий момент
			$date = time();
				
			//сохраняем изображение формата jpg в нужную папку, именем будет текущее время. Сделано, чтобы у аватаров не было одинаковых имен
			imagejpeg($dest, $path_to_90_directory.$date.".jpg");
			
			//заносим в переменную путь до аватара
			$delfull = $path_to_90_directory.$filename; 
			
			//удаляем оригинал загруженного изображения, он нам больше не нужен. Задачей было - получить миниатюру
			unlink($delfull);
				
			return $path_to_90_directory.$date.".jpg";
		}
		//в случае несоответствия формата, выдаем соответствующее сообщение
		else 
			errorGoBack("./registration.php", "Аватар должен быть в формате JPG, GIF или PNG!",$values);
	}
	
	function loadCompressedPhoto($name, $tmp_name, $size, $i, $values) {
		if(preg_match('/[.](JPG)|(jpg)|(gif)|(GIF)|(png)|(PNG)|(jpeg)|(JPEG)$/', $name)) {
			if($size <= 4194304) {
				$filename = $name;
				$source = $tmp_name;
				$target = '../commonImages/hotels/'.$filename;
				
				move_uploaded_file($source, $target);
					
				if(preg_match('/[.](GIF)|(gif)$/', $filename))
					$im = imagecreatefromgif($target);
				if(preg_match('/[.](PNG)|(png)$/', $filename))
					$im = imagecreatefrompng($target);
				if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename))
					$im = imagecreatefromjpeg($target);
								
				$w_src = imagesx($im);
				$h_src = imagesy($im);
				$dest = imagecreatetruecolor($w_src,$h_src);
				imagecopyresampled($dest, $im, 0, 0, 0, 0, $w_src, $h_src, $w_src, $h_src);				
				$date = time()."_".$i;
				imagejpeg($dest, '../commonImages/hotels/'.$date.".jpg");
				
				$delfull = '../commonImages/hotels/'.$filename; 
				unlink($delfull);
					
				return '../commonImages/hotels/'.$date.".jpg";
			}
			else 
				errorGoBack("./new_hotel.php", "Максимальный размер одной фотографии - 4мб!",$values);
		}
		else 
			errorGoBack("./new_hotel.php", "Фотографии должны быть в формате JPG, GIF или PNG!",$values);
	}
?>