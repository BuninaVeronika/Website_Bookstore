<?php
$connect=@mysql_connect("localhost","nika","1469");
if(!$connect)
    {
die("СУБД не подключена".mysql_errno());    
}
mysql_set_charset("utf8",$connect);
if (!mysql_select_db("homebooks",$connect))
{
die("Ошибка БД".mysql_errno());
}
