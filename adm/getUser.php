<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Админ панель</title>
  <link rel="stylesheet" href="/style/style.css">
 </head>
 <body>
<header> 
	<img src="../img/head7.png" width="100%" height="100%"> 
</header>
<form id="midl">
	<fieldset>
    <legend>Получение информации о пользователях</legend>
		<table>
			<thead id = "tableFont"> 
			  <tr>
			   <td class="centrImg"> id </td>
			   <td class="centrImg"> Логин </td>
			   <!--<td class="centrImg"> Пароль </td>-->
			   <td class="centrImg"> Роль </td>
			   <td class="centrImg"> Дата создания </td>
			   <td class="centrImg"> Редактировать </td>
			   <td class="centrImg"> Удалить </td>
			  </tr>			 		 
			 </thead>
			 <tbody> 
				<?php		
					include_once 'Z:\home\migacheva_kp.ru\www\reg\db_connect.php'; // проверяем подключение к базе данных 
								//Получаем данные				
					$sql = mysql_query('SELECT * FROM users_profiles LEFT JOIN role USING(role_id)');
					while ($result = mysql_fetch_array($sql)) 
					{
						echo 	"<tr>
									<td class=\"centrImg\">" .$result['user_id']."</td>
									<td class=\"centrImg\">".$result['username']."</td>
									"//<td class=\"centrImg\">".$result['password']."</td>
									;echo"
									<td  class=\"centrImg\">".$result['name']."
									</td>
									<td class=\"centrImg\">".$result['data_create']."</td>
									<td  class=\"centrImg\">
										<a href='/adm/editUser.php?id=" .$result['user_id']."'>
											<img src=\"/img/red.png\" width=\"25\" height=\"25\">
										</a>
									</td>
									<td  class=\"centrImg\">
										<a href='?del=".$result['user_id']."'>
											<img src=\"/img/del.png\" width=\"25\" height=\"25\">
										</a>
									</td>
								</tr>";
					};
					//Удаляем, если что
					if (isset($_GET['del'])) {
						$sqltmp = mysql_query('DELETE FROM `users_profiles` WHERE `user_id` = "'.$_GET['del'].'"');
						if (!$sqltmp) {
							echo "<p> Произошла ошибка</p>";
						}
						echo'<script> document.location="/adm/getUser.php"</script>';
					}
				?>
			 </tbody>
		</table> 
	</fieldset>
</form>
<br/>
<a href='/adm/admPanel.php'>
	<img src="../img/back.png" width="100" height="100"> 
</a>
<footer class = "bot">
	
	<img src="../img/footer1.png" width="100%" height="100%">
</footer>
</body>
</html>