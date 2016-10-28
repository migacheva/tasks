<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<header> 
		<link rel="stylesheet" href="../style/style.css">
	</header> 
	<?php 
	include_once 'handler.php'; // проверяем авторизирован ли пользователь 

	// если да, перенаправляем его на главную страницу 
	//if($user) { 
	//header ('Location: index.php'); 
	//exit(); 
	//} 

	
	if ($_POST['password1'] != $_POST['password2']) 
	{
		echo 'Пароли не совпадают';
	}
	else
	{
		if (!empty($_POST['login'])) 
		{ 


			// фильтрируем логин и пароль 
			$login = mysql_real_escape_string(htmlspecialchars($_POST['login'])); 
			$password = mysql_real_escape_string(htmlspecialchars($_POST['password1'])); 
			$email = mysql_real_escape_string(htmlspecialchars($_POST['email'])); 

			// проверяем есть ли логин в нашей базе данных 
			if (mysql_result(mysql_query("SELECT COUNT(*) FROM `users_profiles` WHERE `username` = '".$login."' LIMIT 1;"), 0) != 0)
			{ 
			echo '
			<div>
				<fieldset id="centerLayer">
					<legend>Выбранный логин уже зарегистрирован!</legend>
					<a href=\'login.php\'">
						<img src="../img/войти.png" width="160" height="160">
					</a> 
					<a href=\'register.php\'">
						<img src="../img/back.png" width="160" height="160">	
					</a>
				</fieldset >
			</div >'; 
			exit(); 
			}
			
			// заносим данные в таблицу,пароль кодируем в md5 
			mysql_query("INSERT INTO `users_profiles` (`username`, `password`,`data_create`, `email`) VALUES ('".$login."', '".md5($password)."','".date("Y-m-d")."','".$email."')");
			
			//echo"<script>console.log('INSERT INTO `users_profiles` (`username`, `password`,`data_create`) VALUES (\"".$login."\", \"".md5($password)."\",\"".date("Y-m-d")."\")') </script>";
			
			echo 
			'
			<div>
				<fieldset id="centerLayer">
					<legend>Вы успешно зарегистрированы!</legend>
						<a href=\'login.php\'">
							<img src="../img/войти.png" width="160" height="160">
						</a>                           
						<a href=\'/index.php\'">       
							<img src="../img/main.png" width="160" height="160">	
						</a> 
				</fieldset >
			</div>
			'; 
			exit(); 

		} 
	}
	
	// форма регистрации 
	echo ' 
	<form action="register.php" method="POST" id="centerLayerX"> 
		<fieldset >			
		<legend>Регистрация</legend>
			Сегодня: '.date("Y-m-d H:i:s").'<br/>
			Логин:<br/> 
			<input name="login" type="text" value="" autofocus required/><br/>
			Email:<br/> 
			<input name="email" type="email" value="" required/><br/> 
			Пароль:<br/> 
			<input name="password1" type="password" value="" required><br/> 
			Введите пароль еще раз:<br/> 
			<input name="password2" type="password" value="" required><br/> 			
			<button value="Зарегистрироваться">
				<img src="../img/key.png" width="80" height="80"> 
			</button> 
			<a href=\'/index.php\'">
				<img src="../img/main.png" width="80" height="80">
			</a>
			';
			// если это админ, показывается скрытая кнопка			
			if ($_COOKIE['role']==1)
				{
					echo " 
							<a href='../adm/admPanel.php'>
								<img src=\"../img/back.png\" width=\"80\" height=\"80\">
							</a> ";
				}
			echo '
		
		</fieldset>
	</form>
 ';
	?>
</body>
</html>

