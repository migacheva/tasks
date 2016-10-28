<?php
    $host="localhost";
    $user="root";
    $pass="root"; //установленный вами пароль
    $db_name="task";
    $link=mysql_connect($host,$user,$pass);
    mysql_select_db($db_name,$link);
?>