<?php
$idcom=$_POST['idcom'];
include_once '../bd/bd_connect.php';
$result=  mysql_query("DELETE FROM `comment` WHERE `id`='$idcom'");
if($result=='TRUE'){
    echo"Удалили";
}
else{
    echo 'Ошибка удаления!Обратитесь к разработчику!';
}

