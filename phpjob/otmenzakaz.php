<?php
$idzak=$_POST['idzak'];
include_once '../bd/bd_connect.php';
$top=mysql_query("DELETE FROM `zakazi` WHERE `id`='$idzak'");
if($top=="TRUE"){
 echo 'удалили';   
}
else{
     echo'Ошибка, обратитесь к администратору сайта';

}