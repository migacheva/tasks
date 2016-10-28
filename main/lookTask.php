
<!DOCTYPE html>
<html>
<head>
  <title>Просмотр задачи</title>
 </head>
 <body>
  <form>
   <fieldset>
    <legend>Просмотр вашей задачи</legend>
	<?php 
		include_once 'Z:\home\migacheva_kp.ru\www\reg\db_connect.php'; // проверяем подключение к базе данных 
		//echo "<script>alert(".$_GET['id'].");</script>";
		//echo "<script>console.log(".$_GET['id'].");</script>";
		if (isset($_GET['id'])) {
			$sqltmp = mysql_query('	SELECT users_task.id, users_task.name, users_task.description, users_task.data_create, users_task.data_end, prioritet_task.name as priorName
									FROM users_task	
									LEFT JOIN prioritet_task
									ON users_task.prioritet_id=prioritet_task.id
									WHERE users_task.id="'.$_GET["id"].'"');
			if (!$sqltmp) {
				echo "<p> Произошла ошибка</p>";
			}
			else
				while ($result = mysql_fetch_array($sqltmp)) 
					{
						echo
						"<p>Название: "  	    .$result['name']. 			"</p>
						<p>Описание: "		    .$result['description'].		"</p> 	
						<p>Приоритет: "			.$result['priorName'].		"</p>	
						<p>Дата создания: "	    .$result['data_create'].		"</p>	
						<p>Дата завершения: "   .$result['data_end'].		"</p>"	;
					}
		}	
?>
	
   </fieldset>
  </form> 
  <br>
  <button onclick="location.href='main.php'">Вернуться</button>
 </body>
 </html>
