<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Редактирование Пользователя</title>
	</head>
	<body>
		<form action="update.php">
			<fieldset>
				<legend>Редактирование пользователя</legend>
					<?php 
					include_once 'Z:\home\migacheva_kp.ru\www\reg\db_connect.php';
							$sqltmp = mysql_query('SELECT users_profiles.user_id, users_profiles.username, users_profiles.`password`,users_profiles.role_id ,role.name as rolename FROM users_profiles LEFT JOIN role USING(role_id)  WHERE user_id ="'.$_GET['id'].'"');
							if (!$sqltmp) {
								echo "<p> Произошла ошибка</p>";
							}
							else
								while ($result = mysql_fetch_array($sqltmp)) 
								{
									echo	" 	<input type=\"hidden\" name=\"user_id\" value = ".$result['user_id']." >
												<p>Логин:    	<input type=\"text\" name=\"username\" size = \"20\" value = ".$result['username']." required> </p>
												<p>Пароль:		<input type=\"text\" name=\"password\" size = \"20\" value = ".$result['password']. " required>  </p> 
												<p>Выбор Роли: 
													<select name=\"role_id\" value=\"".$result['role_id']."\" onchange=\"document.getElementsByName('role_id')[0].value = document.getElementsByName('role_id')[0].options[document.getElementsByName('role_id')[0].selectedIndex].value;\">" 
													;
													$sqltmp1=mysql_query('SELECT * FROM role');
														while ($result = mysql_fetch_array($sqltmp1)) 
															{
																echo "<option value=\"".$result['role_id']."\">".$result['name']."</option>";
															}
											echo " 	</select> </p>";
								}
					?>				
		<br/>
		<br/>
		<input type="submit" value="Изменить данные пользователя">
		</fieldset>
 </form> 
 <br/>
 <button onclick="window.location='/adm/getUser.php'">Вернуться</button>
 </body>
 </html>









