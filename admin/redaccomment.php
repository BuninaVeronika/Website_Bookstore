<?php
$idcom=$_POST['idcom'];
$otzuv=$_POST['otzuv'];
include_once '../bd/bd_connect.php';
$result=  mysql_query("UPDATE `comment` SET `otzuv`='$otzuv' WHERE `id`='$idcom'");
if($result=='TRUE'){
    echo"Отредактировано";
}
else{
    echo 'Ошибка редактирования!Обратитесь к разработчику!';
}

