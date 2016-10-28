<?php
	include_once 'Z:\home\migacheva_kp.ru\www\reg\db_connect.php';
	//echo "update users_profiles set username=\"".$_GET['username']."\",password=\"".$_GET['password']."\",role_id=\"".$_GET['role_id']."\" WHERE `user_id`=".$_GET['user_id']."";
	if (isset($_GET['username']) or isset($_GET['password']) or isset($_GET['role_id']) ) {	
		$sql = mysql_query("update users_profiles set username=\"".$_GET['username']."\",password=\"".$_GET['password']."\",role_id=\"".$_GET['role_id']."\" WHERE `user_id`=".$_GET['user_id']."");				
	}
	echo "<script>window.location='/adm/editUser.php?id=".$_GET['user_id']."'</script>";
?>
