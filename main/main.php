<!DOCTYPE html>
<?php
 include_once 'Z:\home\migacheva_kp.ru\www\reg\db_connect.php'; // проверяем подключение к базе данных 
?>

<html style="height: 100%;">

<head>
  <title>Планирование задач</title>
	<link rel="stylesheet" href="../style/style.css">
 </head>
 <body>
  <header> 
	
	<a href='/reg/exit.php' class="right">
		<img src="../img/end2.png" width="80" height="80"> 
	</a> 
	<img src="../img/head7.png" width="100%" height="100%"> 
  </header>
  <div id="mainDiv"> 
		<div id="sidebar">	<!-- Левое меню-->
				<?php
					$sql = mysql_query('SELECT id, name, end FROM users_task left join users_profiles USING(user_id) WHERE username = "'.$_COOKIE['username'].'" and end=0');						
					while ($result = mysql_fetch_array($sql)) 
					{
						echo 	"<a href='/main/lookTask.php?id=".$result['id']."'> 
									".$result['id'].") ".$result['name']."<br>
								</a>" ;
					}				
				?>
		</div>
		<div id="content" > <!-- Основное меню-->
			
			<!--<details>
			<summary>Курсовой</summary> -->
				<table>
				 <thead id = "tableFont"> 
				  <tr>
				   <td class="centrImg"> Имя </td>
				   <td class="centrImg"> Дата завершения </td>
				   <td class="centrImg"> Просмотреть </td>
				   <td class="centrImg"> Редактировать </td>
				   <td class="centrImg"> Удалить </td>
				   <td class="centrImg"> Выполнено </td>
				  </tr>			 		 
				 </thead>
				 <tbody> 
					<?php		
						if($_GET['important'])
						{
							$sql = mysql_query('SELECT users_task.`ID`, users_task.`name`, `data_end`,end, prioritet_task.name as prioritet_name  FROM `users_task`
											join users_profiles USING(user_id)
											join prioritet_task ON prioritet_task.id = users_task.prioritet_id 
											WHERE username = "'.$_COOKIE['username'].'" and prioritet_task.name="Важно"');
						}
						else
						{
							if($_GET['current'])
							{
								$sql = mysql_query('SELECT users_task.`ID`, users_task.`name`, `data_end`,end, prioritet_task.name as prioritet_name  FROM `users_task`
											join users_profiles USING(user_id)
											join prioritet_task ON prioritet_task.id = users_task.prioritet_id 
											WHERE username = "'.$_COOKIE['username'].'" and end=0');
							}
							else
							{
								$sql = mysql_query('SELECT users_task.`ID`, users_task.`name`, `data_end`,end, prioritet_task.name as prioritet_name  FROM `users_task`
											join users_profiles USING(user_id)
											join prioritet_task ON prioritet_task.id = users_task.prioritet_id 
											WHERE username = "'.$_COOKIE['username'].'"');
							}
						}						
						//echo"<script>console.log('SELECT `ID`, `name`, `data_end`,end FROM `users_task` join users_profiles USING(user_id) WHERE username = \"".$_COOKIE['username']."\"') </script>";
						//echo"<script>console.log('SELECT end FROM `users_task`') </script>";
						while ($result = mysql_fetch_array($sql)) 
						{	
						
						// разделяет дату в массив для удобного вывода пользователю
						$dateArr=explode("-",$result['data_end']);
						
						
							if ($result['end'] ==1) {
								echo "<tr ";
								if ($result['prioritet_name'] == "Важно" or $result['prioritet_name'] == "Терпит" or $result['prioritet_name'] == "Не важно") 
							{
								if ($result['prioritet_name'] == "Важно") 
								{	
									echo" style= \"color: red;\"";
								}
								if ($result['prioritet_name'] == "Терпит") 
								{	
									echo" style= \"color: blue;\"";
								}
								if ($result['prioritet_name'] == "Не важно") 
								{	
									echo" style= \"color: lime;\"";
								}
								
							}
						echo "class = \"readyTask\">
										<td class=\"centrImg\">
											".$result['name']."
										</td>
										<td class=\"centrImg\">
											".$dateArr[2]."/".$dateArr[1]."
										</td>
										<td class=\"centrImg\"> 
											<a href='lookTask.php?id=".$result['ID']."'>
												<img src=\"../img/look.png\" width=\"25\" height=\"25\">
											</a>
										</td>
										<td  class=\"centrImg\"> 
											<a href='editTask.php?id=".$result['ID']."'>
												<img src=\"../img/red.png\" width=\"25\" height=\"25\">
											</a>
										</td>
										<td  class=\"centrImg\"> 
											<a href='?del=".$result['ID']."'>
												<img src=\"../img/del.png\" width=\"25\" height=\"25\">
											</a>
										</td>
										<td  class=\"centrImg\"> 
											<a href='?ready=".$result['ID']."&old=".$result['end']."'>
												<img src=\"../img/ready.png\" width=\"25\" height=\"25\">
												<!-- text-decoration: line-through;-->
											</a> 
										</td>
									</tr>";
								
							} 
							else {
								echo "<tr";
								if ($result['prioritet_name'] == "Важно" or $result['prioritet_name'] == "Терпит" or $result['prioritet_name'] == "Не важно") 
							{
								if ($result['prioritet_name'] == "Важно") 
								{	
									echo" style= \"color: red;\"";
								}
								if ($result['prioritet_name'] == "Терпит") 
								{	
									echo" style= \"color: blue;\"";
								}
								if ($result['prioritet_name'] == "Не важно") 
								{	
									echo" style= \"color: lime;\"";
								}
								
							}
						echo ">
										<td class=\"centrImg\">
											".$result['name']."
										</td>
										<td class=\"centrImg\">
											".$dateArr[2]."/".$dateArr[1]."
										</td>
										<td class=\"centrImg\"> 
											<a href='lookTask.php?id=".$result['ID']."'>
												<img src=\"../img/look.png\" width=\"25\" height=\"25\">
											</a>
										</td>
										<td  class=\"centrImg\"> 
											<a href='editTask.php?id=".$result['ID']."'>
												<img src=\"../img/red.png\" width=\"25\" height=\"25\">
											</a>
										</td>
										<td  class=\"centrImg\"> 
											<a href='?del=".$result['ID']."'>
												<img src=\"../img/del.png\" width=\"25\" height=\"25\">
											</a>
										</td>
										<td  class=\"centrImg\"> 
											<a href='?ready=".$result['ID']."&old=".$result['end']."'>
												<img src=\"../img/ready.png\" width=\"25\" height=\"25\">
												<!-- text-decoration: line-through;-->
											</a> 
										</td>
									</tr>";
								}
							}
				//Удаляем, если что
						if (isset($_GET['del'])) {
							$sqltmp = mysql_query('DELETE FROM `users_task` WHERE `ID` = "'.$_GET['del'].'"');
							if (!$sqltmp) {
								echo "<p> Произошла ошибка</p>";
							} 
							echo'<script> document.location="/main/main.php"</script>';  
						}
						// При нажатии на кнопку задача переходит в состояние "выполнено" end = 1
						if (isset($_GET['ready'])) {
							if($_GET['old']==0){
								$sqltmp = mysql_query('UPDATE users_task SET end = "1" WHERE `ID` = "'.$_GET['ready'].'"');
								
							}
							else {
								$sqltmp = mysql_query('UPDATE users_task SET end = "0" WHERE `ID` = "'.$_GET['ready'].'"');
							}
							//echo " <img src=\"../img/end.png\" width=\"25\" height=\"25\"> ";
							if (!$sqltmp) {
								echo "<p> Произошла ошибка</p>";
							} 
							//echo'<script> document.location="/main/main.php"</script>'; 
							echo'<script> document.location="/main/main.php"</script>';						
						}
					?>		
				 </tbody>
				</table>
<!--				
			</details> -->
    </div>
    <div id="ridhtbar"> <!-- Правое меню-->
        <p>
            <a href='addTask.php'">
                <img src="../img/add.png" width="80" height="80"> 
            </a>   
			<a href='obr_sv.php'">
				<img src="../img/obr_sv.png" width="80" height="80"> 
			</a> 
            <!-- Обратная связь --> 
        </p> 
		<p>
		<a href='../file/test.php'">
			<img src="../img/export.png" width="80" height="80"> 
		</a> 
		 		
        
			<?php
			// если это админ, показывается скрытая кнопка			
			if ($_COOKIE['role']==1)
				{
					echo " 
							<a href='../adm/admPanel.php'>
								<img src=\"../img/role.png\" width=\"80\" height=\"80\">
							</a> ";
				}
			?>
			<div class="bottom">
				<script>
					function EmptyOther(id)
					{
						switch(id)
						{
							case "important":
							{
								document.getElementById("current").checked = false;
								document.getElementById("all").checked = false;
								break;
							}
							case "current":
							{
								document.getElementById("important").checked = false;
								document.getElementById("all").checked = false;
								break;
							}
							default:
							{
								document.getElementById("important").checked = false;
								document.getElementById("current").checked = false;
							}
						}
					}
				</script>
				<form action = "main.php">
					<p>
						<label>
							Самые важные задачи
							<input type="radio" name="important" id="important" onclick="EmptyOther('important')"/>
						</label>
					</p>				
					<p>
						<label>
							Текущие задачи
							<input type="radio" name="current" id="current" onclick="EmptyOther('current')"/>					
						</label>
					</p>				
					<p>
						<label>
							Все задачи
							<input type="radio" name="all" id="all" onclick="EmptyOther('all')"/>
						</label>
					</p>       
					<input type="submit" value="Отфильтровать"/>
				</form>
			</div>  
<!--			<button onclick="location.href='/test/test3.php'">
				<img src="../img/test.png" width="145" height="40"> <br>
						Центральный блок
			</button> 
			
			<button onclick="location.href='/reg/register.php'">
				<img src="../img/test.png" width="145" height="40"><br>
						Добавить пользователя<br> Функция администратора
			</button>
		
			<a href='/adm/getUser.php'">
				<img src="../img/test.png" width="45" height="40">
						Админ панель<br> Функция администратора
			</a> 	
        </p>
-->	
		
    </div>
  </div>
  <footer> 
      <img src="../img/footer1.png" width="100%" height="100%">
  </footer>
</body>
</html>