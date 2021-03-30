<?php
session_start();
$login=$_SESSION['login'];
include_once '../bd/bd_connect.php';
mysql_query("DELETE FROM `registracia` WHERE `login`='$login'");
echo 'удалили';
session_destroy();