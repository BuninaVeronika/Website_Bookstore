<?php
$id=$_POST['id'];
include_once '../bd/bd_connect.php';
$result=  mysql_query("DELETE FROM `books` WHERE `id`='$id'");
if($result=='TRUE'){
    echo"Удалили";
}
else{
    echo 'Ошибка удаления!Обратитесь к разработчику!';
}
