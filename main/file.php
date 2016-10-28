<!DOCTYPE html>
<html>
	<body>
		<header>
			<link rel="stylesheet" href="../style/style.css">
			<a href='/reg/exit.php'">
				<img src="../img/end2.png" width="80" height="80"> 
			</a> 
			<a href='../adm/admPanel.php'">
				<img src="../img/back.png" width="80" height="80"> 
			</a>
			<img src="../img/head7.png" width="100%" height="100%"> <br/>
		</header>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		   <fieldset id="centerLayerDinamic" >
				<legend>Загрузка файла</legend>
					<input type="file" name="filename"><br> 
					<input type="submit" value="Загрузить"><br>
			</fieldset>
		</form>
		<footer class = "bot">	
			<img src="../img/footer1.png" width="100%" height="100%">
		</footer>
	</body>
</html>