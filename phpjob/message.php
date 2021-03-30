<?php
$tema=filter_input(INPUT_POST,"tema",FILTER_SANITIZE_SPECIAL_CHARS);
$messagemail=filter_input(INPUT_POST,"messagemail",FILTER_SANITIZE_SPECIAL_CHARS);
$textmail=filter_input(INPUT_POST,"textmail",FILTER_SANITIZE_SPECIAL_CHARS);
if (empty($tema) or empty($messagemail) or empty($textmail))
    {
    exit ("Вы ввели не всю информация, пожалуйста, заполните все поля выделенные синим");
    }
include_once '../bd/bd_connect.php';  
$result=  mysql_query("INSERT INTO `message`(`status`, `tema`, `email`, `mail`) VALUES ('На рассмотрение','$tema','$messagemail','$textmail')");
if ($result=='TRUE')
    {
    echo "Сообщение отправлено";
    }
 else {
    echo "Ошибка! Мы не смогли отправить ваше сообщение, попробуйте еще раз.";
    }



       