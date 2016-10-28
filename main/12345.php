<html>
<head>

</head>
<body>
	
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="pictures" />
		<input type="submit" value="Отправить" />
		<?php
				$uploaddir = '../file/uploads/';
				$uploadfile = $uploaddir.basename($_FILES['pictures']['name'][0]);

				echo '<pre>';
				if (move_uploaded_file($_FILES['pictures']['tmp_name'][0], $uploadfile)) {
					echo "Файл корректен и был успешно загружен.\n";
				} else {
					echo "Возможная атака с помощью файловой загрузки!\n";
				}
				echo $_FILES['pictures']['name'][0];
				echo 'Некоторая отладочная информация:';
				print_r($_FILES);

				print "</pre>";

			?>
	</form>

</body>
</html>	
	
	
