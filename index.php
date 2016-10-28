<?php 
include_once 'reg/handler.php'; // проверяем авторизирован ли пользователь 
if($user) { 
// выводим информацию для пользователя 
echo 'Привет, '.$user['username'].'!<br/> 

	<a href=\'reg/exit.php\'" class="right">
		<img src="../img/end2.png" width="160" height="160"> 
	</a> 
	';
	//if ($_COOKIE['role']==1)
	//	{
	//		header('Location: /adm/admPanel.php');	
	//	}
	//	else {
	//		header('Location: /main/main.php');
	//	}
		echo'
<a href=\'/main/main.php\'">
	<img src="img/main.png" width="160" height="160"> 
</a>' ; 
} else { 
// выводим информацию для гостя 
echo '
<link rel="stylesheet" href="style\style.css">
<body >
<div id=\'indexstyle\'>
	<fieldset>
		<legend>Добро пожаловать на наш сайт!</legend>
			<a href=\'reg/login.php\'>
				<img src=\'img/войти.png\' width="160" height="160"> 
			</a> 
			<a href=\'reg/register.php\'>
				<img src=\'img/зарег.png\' width="160" height="160"> 
			</a> 
	</fieldset>
</div>
</body>
'
;} 
?>
