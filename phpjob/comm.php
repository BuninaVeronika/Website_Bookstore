<?php
session_start();
$login=$_SESSION['login'];
$id=$_POST['id'];
$commentar=filter_input(INPUT_POST,"commentar",FILTER_SANITIZE_SPECIAL_CHARS);
if(empty($commentar)){
    exit('Введите отзыв');
}
date_default_timezone_set('Europe/Moscow');
$today = date("y.m.d H:i:s"); 
if(empty($login)){
    echo 'Авторизуйтесь или зарегистрируйтесь на сайте';
}
else{
    include_once '../bd/bd_connect.php';
    $comment=mysql_query("INSERT INTO `comment`(`datatime`, `login`, `idbooks`, `otzuv`) VALUES ('$today','$login','$id','$commentar')");
    if($comment=='TRUE'){
        echo 'Спасибо за отзыв!';
    }
    else{
        echo 'Что-то явно пошло не так';
    }
}

