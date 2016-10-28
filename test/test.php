<!doctype html>
<html lang="ru">
<head>
<title>Админ-панель</title>
</head>
<body>
<?php
$host="localhost";
$user="root";
$pass="root"; //установленный вами пароль
$db_name="task3";
$link=mysql_connect($host,$user,$pass);
mysql_select_db($db_name,$link);

//Если переменная Name передана
if (isset($_POST["Name"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysql_query("INSERT INTO `qqq` (`Name`, `Price`) 
                        VALUES ('".$_POST['Name']."','".$_POST['Price']."')");
    //Если вставка прошла успешно
    if ($sql) {
        echo "<p>Данные успешно добавлены в таблицу.</p>";
    } else {
        echo "<p>Произошла ошибка.</p>";
    }
}
?>
<table>
<form action="" method="post">
    <tr>
        <td>Наименование:</td>
        <td><input type="text" name="Name"></td>
    </tr>
    <tr>
        <td>Цена:</td>
        <td><input type="text" name="Price" size="3"> руб.</td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
    </tr>
</form>
</table>

<?php
//Удаляем, если что
if (isset($_GET['del'])) {
    $sql = mysql_query('DELETE FROM `qqq` WHERE `ID` = "'.$_GET['del'].'"');
    if ($sql) {
        echo "<p>Товар удален.</p>";
    } else {
        echo "<p>Произошла ошибка.</p>";
    }
}

//Получаем данные
$sql = mysql_query('SELECT `ID`, `Name` FROM `qqq`');
while ($result = mysql_fetch_array($sql)) {
    echo $result['ID'].") ".$result['Name']." - <a href='?del=".$result['ID']."'>Удалить</a><br>";
}
?>
</body>