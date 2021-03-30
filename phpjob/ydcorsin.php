<?php
session_start();
$login=$_SESSION['login'];
$id=$_POST['id'];
if(empty($login)){
             $array=explode(' ',$_COOKIE['corzina']);
             unset($array[array_search($id,$array)]);
             array_keys($array);
             $zapisi=implode(' ',$array);
             setcookie('corzina',$zapisi,strtotime("+3 week"),'/');
             
}
else{
            include_once '../bd/bd_connect.php';
            $corzina= mysql_query("SELECT `korzina` FROM `registracia` WHERE `login`='$login'");
            $rowe= mysql_fetch_array($corzina);    
            $result=explode('|',$rowe[0]);
            unset($result[array_search($id,$result)]);
            array_keys($result);
            $zapisi=implode('|',$result);
            $red=mysql_query("UPDATE `registracia` SET `korzina`='$zapisi' WHERE `login`='$login'");
}
echo 'удалили';