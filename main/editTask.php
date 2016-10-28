
<!DOCTYPE html>
<html>
<head>
  <title>Редактирование задачи</title>
 </head>
 <body>
  <form action = "update.php">
   <fieldset>
    <legend>Редактирование вашей задачи</legend>
	<?php 
		include_once 'Z:\home\migacheva_kp.ru\www\reg\db_connect.php'; // проверяем подключение к базе данных 
		//echo "<script>alert(".$_GET['id'].");</script>";
		//echo "<script>console.log(".$_GET['id'].");</script>";
		
		$sqltmp = mysql_query('SELECT users_task.ID, users_task.name, description, prioritet_id, data_create, data_end, end, prioritet_task.name as prioritet_name	FROM `users_task` LEFT JOIN prioritet_task ON users_task.prioritet_id = prioritet_task.id WHERE users_task.id = "'.$_GET['id'].'"');
			if (!$sqltmp) {
				echo "<p> Произошла ошибка</p>";
			}
			else
				while ($result = mysql_fetch_array($sqltmp)) 
				{
					if ($result['end'] == 0)
					{
						// Можно редактировать
						echo
						   " <input type=\"hidden\" name=\"id\" value = ".$result['ID']." >
							<p>Название:
								<input type=\"text\" name=\"name\" value = ".$result['name']." autofocus required>
							</p>
							<p>Описание:
								<textarea rows=\"10\" cols=\"25\" name=\"description\" required> ".$result['description']. " </textarea>
							</p> 
							<p>Приоритет:
								<select name=\"prioritet_id\" value=\"".$result['prioritet_id']."\" onchange=\"document.getElementsByName('prioritet_id')[0].value = document.getElementsByName('prioritet_id')[0].options[document.getElementsByName('prioritet_id')[0].selectedIndex].value;\">" 
							;	$sqltmp1=mysql_query('SELECT * FROM prioritet_task');
									while ($result1 = mysql_fetch_array($sqltmp1)) 
									{
										echo "<option value=\"".$result1['id']."\">".$result1['name']."</option>";
									}
								echo " 	</select> </p>";
						echo "<p>Дата создания: ".$result['data_create']."</p>";	
						echo "<p>Дата завершения: <input type=\"datetime\" name=\"data_end\" value=" .date("Y-m-d H:i:s");" required></p>"	;
								
						
					}
					else
					{
						// Нельзя редактировать, открыть страницу просмотра
						echo "<script> window.location = \"/main/lookTask.php?id=".$_GET['id']. "\" </script>";
					}
					
				}

?>
<br/>
<br/>
<br/>
<br/>
	<input type="submit" value="Изменить задачу">
   </fieldset>
  </form> 
  <br/>
  
  <button onclick="window.location='/main/main.php'">Вернуться</button>
 </body>
 </html>
