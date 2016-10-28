<?
	$action="index3.php?id_catalog=".$_POST['id_catalog']."";
?>

<form action=<? echo $action; ?> method=post ENCTYPE=multipart/form-data>

<?
	$query = 'SELECT prioritet_id FROM prioritet_task';
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
		echo "<select type=text name='name'>";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	   echo '<option selected value="'.$line['name'].'" >'.$line['name'];
			  }
		echo "</select>\n";
?>
<INPUT TYPE=submit class=button VALUE="отправить">
</form>
