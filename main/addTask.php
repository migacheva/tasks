<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Добавление задачи</title>
 </head>
 <body>
 <?php
 include_once 'Z:\home\migacheva_kp.ru\www\reg\db_connect.php'; // проверяем подключение к базе данных 
if (isset($_POST['data_end'])) {
	if ($_POST['data_end']>date("Y-m-d")){
    //Вставляем данные, подставляя их в запрос
    $sql = mysql_query("INSERT INTO `users_task` (`name`, `description`,`prioritet_id`, `data_create`, `data_end`, `user_id`) 
		VALUES ('".$_POST['name']."','".$_POST['description']."','".$_POST['prioritet_id']."',
				'".$_POST['data_create']."','".$_POST['data_end']."', 
				(SELECT user_id from users_profiles WHERE username = '".$_COOKIE['username']."'))");
	echo"<script>console.log('INSERT INTO `users_task` (`name`, `description`,`prioritet_id`, `data_create`, `data_end`, `user_id`)'+
							  'VALUES (\"".$_POST['name']."\",\"".$_POST['description']."\",\"".$_POST['prioritet_id']."\",'+
										 '\"".$_POST['data_create']."\",\"".$_POST['data_end']."\"  ,('+ 
								'SELECT user_id from users_profiles WHERE username = \"".$_COOKIE['username']."\"))'); </script>";
    //Если вставка прошла успешно
    if ($sql) {
        echo "<p>Данные успешно добавлены в таблицу.</p>";
		$uploaddir = '../file/uploads/';
				$uploadfile = $uploaddir.basename($_FILES['pictures']['name']);

				echo '<pre>';
				if (move_uploaded_file($_FILES['pictures']['tmp_name'], $uploadfile)) {
					//echo "Файл корректен и был успешно загружен.\n";
				} else {
					//echo "Возможная атака с помощью файловой загрузки!\n";
				}
				//echo $_FILES['pictures']['name'];
				//echo 'Некоторая отладочная информация:';
				//print_r($_FILES);

				print "</pre>";
    } else {
        echo "<p>Произошла ошибка.</p>";
    }
}
else 
	echo 'дата окончания больше текущей'; 
}
?>

  <form action="" method="post" enctype="multipart/form-data">
   <fieldset>
    <legend>Создание новой задачи</legend>
	
	<div>
			Название:
			<p><input type="text" name="name" autofocus required></p>
			Описание:
			<p>
				<textarea rows="10" cols="25" name="description"></textarea>
			</p>	
	</div>
    <p>
        Выбор приоритета:
        <select name="prioritet_id" onchange="document.getElementsByName('prioritet_id')[0].value = document.getElementsByName('prioritet_id')[0].options[document.getElementsByName('prioritet_id')[0].selectedIndex].value;">		
		<?php
		$sqltemp = mysql_query('SELECT `ID`, `name` FROM `prioritet_task`');
						while ($result = mysql_fetch_array($sqltemp)) 
						{
							echo "<option value=\"".$result['ID']."\">" .$result['name']."</option>";
						}
		 ?>
        </select>
    </p>
    <p>
		Дата создания : <?php echo date("Y-m-d H:i:s")?> 
		<input name="data_create" type="hidden" value="<?php echo date("Y-m-d H:i:s")?>">
	</p>
	
	<p>
		Дата завершения : <input type="date" name="data_end" value="<?php echo date("Y-m-d")?>" >
		
	</p>
    <p>
		<input type="file" name="pictures" />
	</p>
    <p><input type="submit" value="Добавить задачу"></p>     
   </fieldset>
  </form>
  </br>
  <button onclick="location.href='main.php'">Вернуться</button>
 </body>
</html>