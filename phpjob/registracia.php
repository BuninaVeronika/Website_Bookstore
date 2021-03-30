<?php
session_start();
$familia=  filter_input(INPUT_POST,"familia",FILTER_SANITIZE_SPECIAL_CHARS);
$ima= filter_input(INPUT_POST,"ima",FILTER_SANITIZE_SPECIAL_CHARS);
$mmail=filter_input(INPUT_POST,"mmail",FILTER_SANITIZE_SPECIAL_CHARS);
$oldlogin=filter_input(INPUT_POST,"login",FILTER_SANITIZE_SPECIAL_CHARS);
$oldpassword=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
$oldppassword=filter_input(INPUT_POST,"ppassword",FILTER_SANITIZE_SPECIAL_CHARS);
$login = trim($oldlogin);
$password = trim($oldpassword);
$passwordes=  md5($password);
$telefon=filter_input(INPUT_POST,"telefon",FILTER_SANITIZE_SPECIAL_CHARS);
$rdata=filter_input(INPUT_POST,"rdata",FILTER_SANITIZE_SPECIAL_CHARS);
if (empty($login) or empty($password)or empty($mmail))
    {
    exit ("Вы ввели не всю информация, пожалуйста, заполните все поля выделенные синим");
    }

include_once '../bd/bd_connect.php';  

$query = ("SELECT * FROM `registracia` WHERE login='$login'");
$sql = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($sql) > 0) {
exit ('Такой логин уже существует, введите, пожалуйста, другой.');
}
else {
    if($oldpassword==$oldppassword){
        $result=  mysql_query("INSERT INTO `registracia`(`familia`, `ima`, `otchectvo`, `mmail`, `login`, `password`, `telefon`, `rdata`, `ad`, `do`, `r`, `e`, `pindex`, `korzina`, `liked`) VALUES ('$familia','$ima','','$mmail','$login','$passwordes','$telefon','$rdata','','','','','','','')");
if ($result=='TRUE')
    {
    $_SESSION['login']=$login;
    echo "Вы успешно зарегистрированы!";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    }
    else{
 exit("Ваши пароли не совпадают");
}
}
 