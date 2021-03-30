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
               $bucv=$_GET['bucv'];
               if(isset($bucv)){
print<<<bucv
           <div id="vuiti">
           <div class="kva">
               <span>
                    <h4>Результаты по выборке <h2>$bucv</h2></h4>
        </div>
        </div>
bucv;

print<<<tor

   
         <div class="kva">
             <h4>Книги</h4>
tor;
         include_once 'bd/bd_connect.php';  
        $result=  mysql_query("SELECT * FROM `books` WHERE `name` LIKE '$bucv%'");
        if(!result){
          die("Ошибка запроса");
        }
        $row=  mysql_num_rows($result);
        if($row==0)
        {
         Echo "По данному запросу нету книг";
        }
        else
    {
    for ($i=0;$i<$row;$i++)
         {
    $array= mysql_fetch_assoc($result); //выборка строки из БД
        $id=$array["id"];  
        $name=$array["name"];      
print<<<ganry
        <li><a href="book.php?id=$id">$name</a></li>
        <hr>
ganry;
        }
    }       
print<<<ctuk
           </div>
            <div class="kva">
            <h4>Авторы</h4>
ctuk;
        $resultat=  mysql_query("SELECT DISTINCT `author` FROM `books` WHERE `author`  LIKE '$bucv%'");
        if(!$resultat){
          die("Ошибка запроса");
        }
        $rowe=  mysql_num_rows($resultat);
        if($rowe==0)
        {
         Echo "По данному запросу нет авторов";
        }
        else
    {
    
    for ($i=0;$i<$rowe;$i++)
         {
    $arra= mysql_fetch_assoc($resultat); //выборка строки из БД
        $id=$arra["id"];  
        $author=$arra["author"];      
print<<<ganry
        <li><a href="avtor.php?name=$author">$author</a></li>
        <hr>
        </span>
ganry;
        }
    }  
               }
               else{
                   include_once 'bd/bd_connect.php'; 
                   $poisk=$_POST['poisk'];
                   $resu=  mysql_query("SELECT * FROM `books` WHERE `author` LIKE '%$poisk%' or `name` LIKE '%$poisk%'");
                   $rowa= mysql_num_rows($resu);
                   if($rowa==0){
                       echo 'Не найдено';
                   }
                   else{
             for ($i=0; $i<$rowa; $i++) 
            { 
            $arr= mysql_fetch_array($resu);
            $id=$arr["id"];
            $author=$arr["author"];
            $namer=$arr["name"];
            $genre=$arr["genre"];
            $publishing=$arr["publishing"];
            $series=$arr["series"];
            $pages=$arr["pages"];
            $age=$arr["age"];
            $price=$arr["price"];
            $img=$arr["img"];
            $ocenka=$arr["ocenka"];
print<<<tovar
    <div class="tovar">
        <span class="circle">$age</span><br>
        <a href='book.php?name=$namer' class="name" ><img class="cover" src="$img" alt="$namer"></a>
        <div class="specification">
        <a href="avtor.php?name=$author"><h3>$author</h3></a><br>
        <a class="name" href="book.php?id=$id"><h3>"$namer"</h3></a><br>
        <span>Жанр:$genre</span><br>
        <span>Серия:$series</span><br>
        <span>Издательство:$publishing</span><br> 
        <span>Рейтинг:$ocenka</span><br>
        <span><h4>Цена:$price руб.</h4></span><br>
         <form name="sail">
        <input  but="$id" type="button" class="pokupka">
        </form>
        </div>
        </div>
tovar;
    }
}       
               }
 ?>
        
           </div>
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
