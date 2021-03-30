<?php
session_start();
$ocenka=$_POST['ocenka'];
$login=$_SESSION['login'];
$id=$_POST['id'];
include_once '../bd/bd_connect.php';
if(isset($login)){
             $res= mysql_query("SELECT `liked` FROM `registracia` WHERE `login`='$login'");
             $arra= mysql_fetch_array($res);
             $resa=explode('|',$arra[0]);
             if(in_array($id,$resa)){
                 echo 'Вы уже оценили книгу';
             }
             else
                 {
$ocenk= mysql_query("SELECT `reiting` FROM `books` WHERE `id`='$id'");
$row= mysql_fetch_array($ocenk);
if ($row['0']>0)
    {
    $zapisi.=$row[0]."|".$ocenka;
    $result=mysql_query("UPDATE `books` SET `reiting`='$zapisi' WHERE `id`='$id'");
    echo "Спасибо за оценку";
    }
 else {
    $result=mysql_query("UPDATE `books` SET `reiting`='$ocenka' WHERE `id`='$id'");
    echo "Спасибо за оценку";
 }
 $result= mysql_query("SELECT `reiting` FROM `books` WHERE `id`='$id'");
$array= mysql_fetch_array($result);
$resultat=explode('|',$array[0]);
$summa=array_sum($resultat);
$chislo=count($resultat);
$sum=round($summa/$chislo,2);
mysql_query("UPDATE `books` SET `ocenka`='$sum' WHERE `id`='$id'");
$liked= mysql_query("SELECT `liked` FROM `registracia` WHERE `login`='$login'");
$arrayl= mysql_fetch_array($liked);
if ($arrayl['0']>0)
    {
    $zzapisi.=$arrayl[0]."|".$id;
    $result=mysql_query("UPDATE `registracia` SET `liked`='$zzapisi' WHERE `login`='$login'");
    }
 else {
    mysql_query("UPDATE `registracia` SET `liked`='$id' WHERE `login`='$login'");
 }
             }
 }
 else{
 echo 'Выполните вход на сайт';
 }