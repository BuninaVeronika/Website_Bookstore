<?php session_start();
include_once 'bd/bd_connect.php';
$ide=$_GET['id'];
$result=mysql_query("SELECT * FROM `books` WHERE `id`='$ide'");
$arra= mysql_fetch_assoc($result);
$genre=$arra["genre"];
setcookie('tovar',$genre,strtotime("+3 days"),'/');
?>
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
                        
/*Админ вывод*/  
                $resultad=  mysql_query("SELECT * FROM `books` WHERE `id`='$ide'");
                $array= mysql_fetch_assoc($resultad); //выборка строки из БД
                $id=$array["id"];
                $author=$array["author"];
                $name=$array["name"];
                $genr=$array["genre"];
                $series=$array["series"];
                $publishing=$array["publishing"];
                $year=$array["year"];
                $pages=$array["pages"];
                $ISBN=$array["ISBN"];
                $format=$array["format"];
                $cover=$array["cover"];
                $age=$array["age"];
                $price=$array["price"];
                $img=$array["img"];
                $presence=$array["presence"];
                $ocenka=$array["ocenka"];
                $popular=$array["popular"];
                $akcii=$array["akcii"];
                $history=$array["history"];
                if ($_SESSION['login']==='admin'){
                    
                    include_once 'admin/podgrusredactovar.php';
                }
                
                
/* Просто вывод товара*/              
               
             
                else{
print<<<tovar
    <div class="books">
        <span class="circle">$age</span><br>
        <div class="ocenka">
        
        <a but="$name" href='book.php?id=$id' class="name" >
tovar;
if(!$akcii==0){
print<<<tovar
   <div class="akc"><h5>$akcii руб.</h5></div>
tovar;

}
print<<<tovar
   <img class="cover" src="$img" alt="$name"></a>
        
         <div class="pokupai">
        <h4>Цена:$price руб.</h4><br><br>
         <p>$presence</p><br><br>
        <input  but="$id" type="button" class="pokupka">
      <a href='zakazi.php?id=$id'><input type="button" value="Купить" class="zakazal"></a>
        </div>
       
        </div>
        <div class="zagolovok">
        <a href="avtor.php?name=$author"><h3>$author</h3></a>
        <a href='book.php?id=$id'><h3>"$name"</h3></a>
        </div>
       <div class="zeni">
        <div class="specification">
         <a  href='ganry.php?name=$genre' ><p>Жанр:<b>$genre</b></p></a><br>
        <p>Серия:$series</p><br>
        <p>Издательство:$publishing</p><br>
        <p>$cover обложка</p><br>
        <p>Формат:$format</p><br>
        <p>ISBN:$ISBN</p><br>
        <p>$year года</p><br>
        <p>$pages страниц</p><br>
        </div>
        <h4>Рейтинг:$ocenka</h4><br>
tovar;
$res= mysql_query("SELECT `liked` FROM `registracia` WHERE `login`='$login'");
             $arra= mysql_fetch_array($res);
             $resa=explode('|',$arra[0]);
             if(in_array($id,$resa)){
print<<<top

        <p>&#9786;Спасибо за оценку</p>
top;
             }
else{
print<<<tovar
    
        <p class="vetu">
            
                Оценить:
            <input class="cenka" but="$id" type="radio" value="1" name="ocenka" id='1'>
        <label for="1">&#9734;</label>
                <input class="cenka" but="$id" type="radio" value="2" name="ocenka" id='2'>
        <label for="2">&#9734;</label>
                    <input class="cenka" but="$id" type="radio" value="3" name="ocenka" id='3'>
        <label for="3">&#9734;</label>
                        <input class="cenka" but="$id" type="radio" value="4" name="ocenka" id='4'>
        <label for="4">&#9734;</label>
                            <input class="cenka" but="$id" type="radio" value="5" name="ocenka" id='5'>
        <label for="5">&#9734;</label>
    
            </p>
        
         
tovar;
    }
print<<<tovar
        
        </div>
        
         <div class="opisanie">
            <p>Описание: $history</p>
        </div>
        </div>  
        <div class="commentarii">
        <span class="vet"></span>
        <form name="comm">
        <input type="text" id='commentar' placeholder="Напиши свой отзыв к книге">
        <input type="button" but="$id" id='comm' value="Отправить" title="Оставить отзыв"><br><br>
        </form>
        
tovar;
        $tok=mysql_query("SELECT `id` FROM `books` WHERE `id`='$ide'");
        $idehka= mysql_fetch_assoc($tok);
        $poisk=$idehka["id"];
        $commentarii=mysql_query("SELECT * FROM `comment` WHERE `idbooks`='$poisk'");
        $row=mysql_num_rows($commentarii);
        if($row==0)
{
    echo "<p>Ваш отзыв может быть первым</p>";
}
else
{
      for($i=0;$i<$row;$i++){
            $arr= mysql_fetch_assoc($commentarii);
            $datatime=$arr["datatime"];
            $login=$arr["login"];
            $otzuv=$arr["otzuv"];
PRINT<<<com
        <form name="comm">
        <p>$login</p>
        <p>$otzuv</p>
        <p>$datatime</p>
        <hr>  
com;
}}
$chet= mysql_query("SELECT `popular` FROM `books` WHERE `id`='$ide'");
$parray= mysql_fetch_assoc($chet);
$chislo=$parray["popular"]+1;
mysql_query("UPDATE `books` SET `popular`='$chislo' WHERE `id`='$ide'");
                }
?>
          </form>
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
