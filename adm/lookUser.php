
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
			$sqltmp = mysql_query('SELECT `ID`, `name`, `description`,`prioritet_id`, `data_create`, `data_end` 
					FROM `users_task` WHERE `ID` = "'.$_GET['id'].'"');
			if (!$sqltmp) {
				echo "<p> Произошла ошибка</p>";
			}
			else
				while ($result = mysql_fetch_array($sqltmp)) 
					{
						echo
						"<p>Логин: "  	    .$result['name']. 			"</p>
						<p>Пароль: "	    .$result['description'].	"</p> 	
						<p>Текущая роль: "	.$result['prioritet_id'].	"</p>	
						<p>Дата регистрации: ".$result['data_create'].	"</p>" ;
					}
		}	
	?>
	
   </fieldset>
  </form> 
  <br>
  <button onclick="location.href='main.php'">Вернуться</button>
 </body>
 </html>
