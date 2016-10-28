<?php 
// если была нажата кнопка "Отправить" 
if($_POST['submit']) {
		$message='555';
		//кому письмо
		$toMail = 'Lika.gallifrey@yandex.ru';
		
		mail ("$toMail", $_POST['title'] , "Данное письмо отправлено из приложения \"Планирование задач\" как в службу поддержки \n \n \n Текст письма: ".$_POST['mess']."\n------- \n С уважением ".$_COOKIE['username'] , "From: Lika.gallifrey@yandex.ru");		
        echo 'Спасибо! Ваше письмо отправлено.'; 
	}	 
?> 
 <head>
  <meta charset="utf-8">
  <title>Обратная связь</title>
 </head>
 <body>
  <form action="" method=post>
   <fieldset>

	<div align="center"> 
	<p> 
		Вы пишете в службу поддержки, будем рады вам помочь!
	<p> 
	  Teма<br /> 
	  <input type="text" name="title" size="40" required><br /> 
	  Сообщение<br /> 
	  <textarea name="mess" rows="10" cols="40" required></textarea> 
	  <br /> 
	  <input type="submit" value="Отправить" name="submit"></div> 
   </fieldset>
  </form> <br>
  <button onclick="location.href='main.php'">Вернуться</button>
 </body>
 

