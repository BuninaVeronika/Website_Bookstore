<?php
$idadmin=$_POST['idadmin'];
include_once '../bd/bd_connect.php';
$result=  mysql_query("DELETE FROM `message` WHERE `id`='$idadmin'");
if($result=='TRUE'){
    echo"Удалили";
}
else{
    echo 'Ошибка удаления!Обратитесь к разработчику!';
}