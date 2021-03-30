<?php
session_start();
$totlogin=$_SESSION['login'];
$oldpassword=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
$oldppassword=filter_input(INPUT_POST,"ppassword",FILTER_SANITIZE_SPECIAL_CHARS);
$password = trim($oldpassword);
$passwordes=  md5($password);
if (empty($oldpassword)or empty($oldppassword))
    {
    exit ("Заполните оба поля для измения пароля");
    }
include_once '../bd/bd_connect.php'; 
if($oldpassword==$oldppassword){
   $result= mysql_query("UPDATE `registracia` SET `password`='$passwordes' WHERE `login`='$totlogin'");
if ($result=='TRUE')
    {
    echo "Пароль изменен!";
    }
 else {
    echo "Ошибка изменения";
    } 
}
else{
    echo "Ваши пароли не совпадают";
}