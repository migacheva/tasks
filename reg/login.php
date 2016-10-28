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
	if($user) { 
	header ('Location: index.php'); 
	exit(); 
	} 

	$session = array(); 
	$member = FALSE; 
	$valid_keys = array('expire', 'mid', 'secret', 'sid', 'sig'); 
	$app_cookie = $_COOKIE['vk_app_5453645']; 
	if ($app_cookie) { 
		$session_data = explode ('&', $app_cookie, 10); 
		foreach ($session_data as $pair) { 
		list($key, $value) = explode('=', $pair, 2); 
		if (empty($key) || empty($value) || !in_array($key, $valid_keys)) { 
			continue; 
		} 
		$session[$key] = $value; 
		} 
		foreach ($valid_keys as $key) { 
		if (!isset($session[$key])) return $member; 
		} 
		ksort($session); 

	$sign = ''; 
		foreach ($session as $key => $value) { 
		if ($key != 'sig') { 
			$sign .= ($key.'='.$value); 
		} 
		} 
		$sign .= APP_SHARED_SECRET; 
		$sign = md5($sign); 
		if ($session['sig'] == $sign && $session['expire'] > time()) { 
		$member = array( 
			'id' => intval($session['mid']), 
			'secret' => $session['secret'], 
			'sid' => $session['sid'] 
		); 
		} 
	}
	echo"<script>console.log('6s') </script>";

	if($member !== FALSE) { 
		echo"<script>console.log('123') </script>";
	} else { 
	/* Пользователь не авторизован в Open API */ 
	}
	if(!empty($_POST['login']) AND !empty($_POST['password'])) 
	{ 
		// фильтрируем логин и пароль 
		$login = mysql_real_escape_string(htmlspecialchars($_POST['login'])); 
		$password = mysql_real_escape_string(htmlspecialchars($_POST['password'])); 

		$search_user = mysql_result(mysql_query("SELECT role_id FROM `users_profiles` WHERE `username` = '".$login."' AND `password` = '".md5($password)."'"),0);
		
		echo"<script>console.log('SELECT COUNT(*) FROM `users_profiles` WHERE `username` = \"".$login."\" AND `password` = \"".md5($password)."\"') </script>";
				
		if(empty($search_user)) 
		{ 
		echo '
			<div>
				<fieldset id="centerLayer">
				<legend> Данные введены не верно</legend>
					<a href=\' /index.php\'"> 
						<img src="../img/back.png" width="160" height="160"> 
					</a>
				</fieldset>		
			</div>
		'; 
		exit(); 
		} 
		else 
		{ 
		// заносим логин и пароль в куки 
		$time = 60*60*24; // сколько времени хранить данные в куках 
		setcookie('username', $login, time()+$time, '/'); 
		setcookie('password', $password, time()+$time, '/');
		setcookie('role', $search_user, time()+$time, '/');
		if ($search_user==1){
			header('Location: /adm/admPanel.php');	
		}
		else {
			header('Location: /main/main.php');
		}
			
		
		exit(); 
		} 
	} 
	
	include("vk_auth.php");
	
	echo ' 

	<form action="login.php" method="POST" > 
		<fieldset id="centerLayer">
			<legend>Вход на сайт</legend>
			Логин:<br /> 
			<input name="login" type="text" autofocus required/><br /> 
			Пароль:<br /> 
			<input name="password" type="password" required/><br /> 
			 <!-- <input type="submit" class="vk_button" value="VK"/>	-->
			<input type="submit" value="Авторизироваться" /> 
		</fieldset>
	</form>  '; 
	?>

</body>

</html>
