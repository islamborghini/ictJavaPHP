<?php
$server = 'localhost'; // Имя или адрес сервера
$user = 'root'; // Имя пользователя БД
$password = ''; // Пароль пользователя
$dbname = 'java'; // Название БД
$db = mysqli_connect($server, $user, $password, $dbname);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        mysqli_select_db($db,$dbname)
    or die("Could not select DB: " . mysql_error());
?>