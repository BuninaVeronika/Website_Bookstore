<?php
session_start();
$login=$_SESSION['login'];
$idbooks=$_POST['id'];
$col=trim(filter_input(INPUT_POST,"col",FILTER_SANITIZE_SPECIAL_CHARS));
$fam=filter_input(INPUT_POST,"fam",FILTER_SANITIZE_SPECIAL_CHARS);
$i=filter_input(INPUT_POST,"i",FILTER_SANITIZE_SPECIAL_CHARS);
$o=filter_input(INPUT_POST,"o",FILTER_SANITIZE_SPECIAL_CHARS);
$ad=filter_input(INPUT_POST,"ad",FILTER_SANITIZE_SPECIAL_CHARS);
$do=filter_input(INPUT_POST,"do",FILTER_SANITIZE_SPECIAL_CHARS);
$r=filter_input(INPUT_POST,"r",FILTER_SANITIZE_SPECIAL_CHARS);
$e=filter_input(INPUT_POST,"e",FILTER_SANITIZE_SPECIAL_CHARS);
$pindex=trim(filter_input(INPUT_POST,"pindex",FILTER_SANITIZE_SPECIAL_CHARS));

date_default_timezone_set('Europe/Moscow');
$today = date("y.m.d");
if (empty($login))
    {
    exit ("Нужно пройти авторизацию или регистрацию на сайте");
    }
if (empty($fam)or empty($i) or empty($o)or empty($ad)or empty($do)or empty($r)or empty($e)or empty($pindex)or empty($col))
    {
    exit ("Пожалуйста, заполните все поля формы");
    }
include_once '../bd/bd_connect.php';
$zakaz= mysql_query("INSERT INTO `zakazi`(`idbooks`, `login`, `fio`, `adress`, `pindex`, `kolichestvo`, `data`, `status`, `nomer`) VALUES ('$idbooks','$login','$fam $i $o','$ad $do $r $e','$pindex','$col','$today','На формирование',' ')");
if($zakaz=='TRUE'){
    echo 'Удачно';
    
                $vot=mysql_query("SELECT * FROM `zakazi` WHERE `idbooks` LIKE '%|%' AND `login`='$login' AND `idbooks`='$idbooks'");
                $rou=mysql_num_rows($vot); 
                if(!$rou==0){
                    mysql_query("UPDATE `registracia` SET `korzina`=''");
                }
                else{
            $corzina= mysql_query("SELECT `korzina` FROM `registracia` WHERE `login`='$login'");
            $rowe= mysql_fetch_array($corzina);    
            $result=explode('|',$rowe[0]);
            unset($result[array_search($idbooks,$result)]);
            array_keys($result);
            $zapisi=implode('|',$result);
            $red=mysql_query("UPDATE `registracia` SET `korzina`='$zapisi' WHERE `login`='$login'");
            
                }
}
else{
    exit('Ошибка, обратитесь к администратору сайта') ;
}               