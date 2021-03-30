<?php
$c=$_POST['c'];
$nomer=$_POST['nomer'];
$yop=$_POST['yop'];
$rab=$_POST['rab'];
$gora=$_POST['gora'];
include_once '../bd/bd_connect.php';
if(isset($nomer)){
mysql_query("UPDATE `zakazi` SET `nomer`='$nomer' WHERE `id`='$c'");
echo 'Номер успешно добавлен';
}
if(isset($yop)){
mysql_query("DELETE FROM `zakazi` WHERE `id`='$yop'");
echo 'Заказ удален';
}
if(isset($rab)){
mysql_query("UPDATE `zakazi` SET `status`='В процессе' WHERE `id`='$rab'");
echo 'Товар отправлен в раздел "В процессе доставки"';
}
if(isset($gora)){
mysql_query("UPDATE `zakazi` SET `status`='Завершено' WHERE `id`='$gora'");
echo 'Завершено';
}