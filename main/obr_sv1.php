<?php 
// если была нажата кнопка "Отправить" 

if($_POST['submit']) { 
        
	$title = substr(htmlspecialchars(trim($_POST['title'])), 0, 1000); 
	$mess =  substr(htmlspecialchars(trim($_POST['mess'])), 0, 1000000); 
    //    $to = 'Lika.gallifrey@yandex.ru'; 
    //    $from='test@test.ru'; 
    //    mail($to, $title, $mess, $from); 
    //    echo 'Спасибо! Ваше письмо отправлено.'; 
	date_default_timezone_set('Etc/UTC');
	require 'Z:\home\migacheva_kp.ru\www\modules\PHPMailer-master\PHPMailerAutoload.php';

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;

	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	
	$mail->Username = "todolistextreme@gmail.com";
	$mail->Password = "extreme123";

	$mail->setFrom('todolistextreme@gmail.com');
	$mail->addAddress('Lika.gallifrey@yandex.ru');

	$mail->Subject = $title;
	$mail->Body = $mess;

	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}
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