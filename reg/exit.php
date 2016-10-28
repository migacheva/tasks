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

	// проверяем авторизацию пользователя 
	if($user) { 
	setcookie('username', '', time()-1, '/'); 
	setcookie('password', '', time()-1, '/'); 
	setcookie('role', '', time()-1, '/');
	//session_destroy(); 
	echo' 

	<div  id="centerLayerDinamic">	
		<fieldset>
			<legend>Вы успешно вышли!</legend>
			<a href=\'login.php\'">
				<img src="../img/войти.png" width="140" height="140">
			</a> 
			<a href=\'/index.php\'">
				<img src="../img/main.png" width="140" height="140"> 
			</a> 
		</fieldset>
	</div>
	'; 
	} else { 
	echo 	'
			<div id="centerLayer">
				<fieldset>
					<legend>Войти</legend>
					<a href=\'login.php\'">
					<img src="../img/войти.png" width="160" height="160">
					</a>
<!--					<a href=\'login.php\'">
						<img src="../img/войти.png" width="160" height="160">
					</a>
-->
				</fieldset>
			</div>
		'; 
	} 
	echo'</body>
	</html>';
	?>
</body>
</html>
