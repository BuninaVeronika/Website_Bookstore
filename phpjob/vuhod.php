<?php
session_start();
$_SESSION['login'] = $login;
session_destroy();
echo 'Вы вышли с сайта';

