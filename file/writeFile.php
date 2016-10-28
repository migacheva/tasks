<!DOCTYPE html>
<html>
	<body>
		<header>
			<link rel="stylesheet" href="../style/style.css">
			<a href='/reg/exit.php'">
				<img src="../img/end2.png" width="80" height="80"> 
			</a> 
			<a href='../main/main.php'">
				<img src="../img/back.png" width="80" height="80"> 
			</a>
			<img src="../img/head7.png" width="100%" height="100%"> <br/>
		</header>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		   <fieldset id="centerLayerDinamic" >
				<legend>Сохранить задачу в файл</legend>
					<?php 
						$fp = fopen('../file/tasks.txt', 'a');
						$mytext = "Это строку необходимо нам записать\r\n"; // Исходная строка
						$test = fwrite($fp, $mytext); // Запись в файл
						if ($test) echo 'Данные в файл успешно занесены.';
						else echo 'Ошибка при записи в файл.';
						fclose($fp); //Закрытие файла
					?>
					
			</fieldset>
		</form>
		<footer class = "bot">	
			<img src="../img/footer1.png" width="100%" height="100%">
		</footer>
	</body>
</html>