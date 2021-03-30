<?php
session_start();
$totlogin=$_SESSION['login'];
$familia=  filter_input(INPUT_POST,"familia",FILTER_SANITIZE_SPECIAL_CHARS);
$ima= filter_input(INPUT_POST,"ima",FILTER_SANITIZE_SPECIAL_CHARS);
$mmail=filter_input(INPUT_POST,"mmail",FILTER_SANITIZE_SPECIAL_CHARS);
$oldlogin=$_POST['login'];
$login = trim($oldlogin);
$telefon=filter_input(INPUT_POST,"telefon",FILTER_SANITIZE_SPECIAL_CHARS);
$rdata=filter_input(INPUT_POST,"rdata",FILTER_SANITIZE_SPECIAL_CHARS);
$o=filter_input(INPUT_POST,"o",FILTER_SANITIZE_SPECIAL_CHARS);
$ad=filter_input(INPUT_POST,"ad",FILTER_SANITIZE_SPECIAL_CHARS);
$do=filter_input(INPUT_POST,"do",FILTER_SANITIZE_SPECIAL_CHARS);
$r=filter_input(INPUT_POST,"r",FILTER_SANITIZE_SPECIAL_CHARS);
$e=filter_input(INPUT_POST,"e",FILTER_SANITIZE_SPECIAL_CHARS);
$pindex=trim(filter_input(INPUT_POST,"pindex",FILTER_SANITIZE_SPECIAL_CHARS));
include_once '../bd/bd_connect.php';  
if($totlogin==$login){
    $result=  mysql_query("UPDATE `registracia` SET `familia`='$familia',`ima`='$ima',`otchectvo`='$o',`mmail`='$mmail',`login`='$login ',`telefon`='$telefon',`rdata`='$rdata',`ad`='$ad',`do`='$do',`r`='$r',`e`='$e',`pindex`='$pindex' WHERE `login`='$totlogin'");
if ($result=='TRUE')
    {
    $_SESSION['login']=$login;
    echo "Личные данные отредактированны!";
    }
 else {
    echo "Ошибка редактирования.";
    }
}
else{
$query = ("SELECT * FROM `registracia` WHERE login='$login'");
$sql = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($sql) > 0) {
exit ('Такой логин уже существует, введите, пожалуйста, другой.');
}
else {
        $result=  mysql_query("UPDATE `registracia` SET `familia`='$familia',`ima`='$ima',`otchectvo`='$o',`mmail`='$mmail',`login`='$login ',`telefon`='$telefon',`rdata`='$rdata',`ad`='$ad',`do`='$do',`r`='$r',`e`='$e',`pindex`='$pindex' WHERE `login`='$totlogin'");
if ($result=='TRUE')
    {
    $_SESSION['login']=$login;
    echo "Личные данные отредактированны!";
    }
 else {
    echo "Ошибка редактирования";
    }
    }
}