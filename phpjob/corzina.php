<?php
session_start();
$login=$_SESSION['login'];
$name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
date_default_timezone_set('Europe/Moscow');
if (empty($login))
    {
    if (isset($_COOKIE['corzina']))
    {
    $zapisi.=$_COOKIE['corzina']." ".$name;
    setcookie('corzina',$zapisi,strtotime("+3 week"),'/');
    }
 else {
    setcookie('corzina',$name,strtotime("+3 week"),'/');
 }
    }
 else{
include_once '../bd/bd_connect.php';
$corzina= mysql_query("SELECT `korzina` FROM `registracia` WHERE `login`='$login'");
$row= mysql_fetch_array($corzina);
if ($row['0']>0)
    {
    $zapisi.=$row[0]."|".$name;
    $result=mysql_query("UPDATE `registracia` SET `korzina`='$zapisi' WHERE `login`='$login'");
    }
 else {
    $result=mysql_query("UPDATE `registracia` SET `korzina`='$name' WHERE `login`='$login'");
 }
 }
 print<<<t
 <p style='color:blue;'>&#10003;</p>
t;
 ?>