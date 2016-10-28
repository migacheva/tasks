<?php
	include_once 'Z:\home\migacheva_kp.ru\www\reg\db_connect.php';
	echo "<script>console.log='update users_task set name=\"".$_GET['name']."\",description=\"".$_GET['description']."\",data_end=\"".$_GET['data_end']."\" WHERE `ID`=".$_GET['id'].";'</script>";
	if (isset($_GET['name']) or isset($_GET['description']) or isset($_GET['prioritet_id']) or isset($_GET['data_end']) ) {	
		$sql = mysql_query("update users_task set name=\"".$_GET['name']."\",description=\"".$_GET['description']."\",data_end=\"".$_GET['data_end']."\" WHERE `ID`=".$_GET['id']."");				
		
	}
	echo "<script>window.location='/main/editTask.php?id=".$_GET['id']."'</script>";
?>
