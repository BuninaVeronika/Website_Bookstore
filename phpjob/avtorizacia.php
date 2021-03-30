<?php
session_start();
$login=filter_input(INPUT_POST,"login",FILTER_SANITIZE_SPECIAL_CHARS);
$password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
$passwordes=  md5($password);
if (empty($login) or empty($password))
    {
    exit ("Вы ввели не всю информация, пожалуйста, заполните все поля выделенные синим");
    }
include_once '../bd/bd_connect.php';

$query = mysql_query("SELECT * FROM `registracia` WHERE `login`='$login' AND `password`='$passwordes'");
$myrow=mysql_fetch_array($query);
if (empty($myrow))
    {
    exit ("Извините, введённый вами логин или пароль неверный");
    }
    else {
    $_SESSION['login']=$login; 
    echo("Вы авторизованны!");
    }