<?php 

mysql_connect('localhost', 'root', 'root') or die('Ошибка соединения с MySQL!'); 
mysql_select_db('task') or die ('Ошибка соединения с базой данных MySQL!'); 
mysql_set_charset('utf8'); // выставляем кодировку базы данных 

?>