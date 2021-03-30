<?php session_start();?>
﻿<!DOCTYPE html>
<html>
    <head>
	<!--Шапка сайта -->
        <?php 
        include_once 'comp/podgrus.php';
        ?>
    </head>
    <body>
	<!--Блок с меню,логотипом,регистрацией,корзиной -->
        <?php 
        include_once 'comp/left.php';
        ?>
	<!--Блок с поиском -->
        <?php 
        include_once 'comp/search.php';
        ?>
        <div id="center">
            
            <?php
            include_once 'bd/bd_connect.php';
            $news= mysql_query("SELECT * FROM `news` ORDER BY `id` DESC");
            $arr= mysql_fetch_assoc($news); //выборка строки из БД
            $head=$arr["head"];
            $text=$arr["text"];
            $img=$arr["img"];
print<<<tovar
    <div class="glavnews">
                <img src="$img">
                <div>
                <h2>
                 $head
                </h2>
                </div>
                <span>
                  $text 
                </span>
        <a href="#vnis"><div class='vnis'>&darr;</div></a>
            </div>
        
        <h2>Популярные книги</h2>
        <div class="lavd">
tovar;
$result=  mysql_query("SELECT * FROM `books`ORDER BY `popular` DESC");
if(!result){
    die("Ошибка запроса");
}
$row=  mysql_num_rows($result);
if($row==0)
{
    Echo "Ничего не найдено";
}
else
{
    for ($i=0;$i<8;$i++)
    {
    $array= mysql_fetch_assoc($result); //выборка строки из БД
        $id=$array["id"];
        $author=$array["author"];
        $name=$array["name"];
        $genre=$array["genre"];
        $publishing=$array["publishing"];
        $pages=$array["pages"];
        $age=$array["age"];
        $price=$array["price"];
        $img=$array["img"];
        $ocenka=$array["ocenka"];
        $history=$array["history"];
        $akcii=$array["akcii"];
print<<<tovar
    <a name="vnis"></a>
    <div class="tovar">        
        <span class="circle">$age</span><br>
        <a but="$name" href='book.php?id=$id' class="name" >
            <img class="cover" src="$img" alt="$name"></a>
        <div class="specification">
        <a href="avtor.php?name=$author"><h3>$author</h3></a><br>
        <a but="$name" class="name" href='book.php?id=$id'><h3>"$name"</h3></a><br>
        <a  href='ganry.php?name=$genre' ><span>Жанр:<b>$genre</b></span></a><br>
        <span>Издательство:$publishing</span><br>
        <span> $pages страниц</span><br>
        <span><h4>Цена:$price руб.</h4></span><br>
        <div class="ocenka">Рейтинг:<b>$ocenka</b>
        </div>
        <form name="sail">
        <input  but="$id" type="button" class="pokupka">
        </form>
        </div>
        
     </div>
tovar;
}
}
print<<<top
</div>
top;
 ?>
        </div>
	<!--Подвал сайта с организацинными иконками и соц.сетями -->
       <?php 
        include_once 'comp/footer.php';
        ?>
	<!--Попап-всплывающие окна-->
        <?php 
        include_once 'comp/panel.php';
        ?>   
    </body>
</html>
