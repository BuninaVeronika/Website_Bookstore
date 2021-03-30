<?php session_start();
include_once 'bd/bd_connect.php';
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
        
    <div id="center" >
    <div class="kor">
            <?php
           
            $login=$_SESSION['login'];

                if (empty($login))
                { 
                    if(isset($_COOKIE['corzina'])){
             $result= explode(' ',$_COOKIE['corzina']);
             foreach($result as $value){
             for ($i =count($result); $i<=count($result); $i++) 
            { 
            $books=mysql_query("SELECT * FROM `books` WHERE `id`='$value'");
            $array= mysql_fetch_array($books);
        $id=$array["id"];
        $author=$array["author"];
        $name=$array["name"];
        $age=$array["age"];
        $img=$array["img"];
        $price=$array["price"];
        $akcii=$array["akcii"];
        if(!$akcii==0){
   $price=$akcii;  
 }
 $f+=$price;

print<<<tovar
        <div class="zina">
    <div class="tovar">
         <div class="ydalenie" ydal="$id" title="Удалить из корзины"><div class="otmena" >&#215;</div></div>
        <div class="avtor">
        <span class="circle">$age</span><br>
        <a but="$name" href='book.php?id=$id' class="name" ><img class="cover" src="$img" alt="$name"></a>
        <div class="specification">
        <a href="avtor.php?name=$author"><h3>$author</h3></a><br>
        <a but="$name" class="name" href='book.php?id=$id'><h3>"$name"</h3></a><br>
        <span><h4>Цена:$price руб.</h4></span><br>
        <a href='zakazi.php?id=$id'><input type="button" value="Купить" class="zakazal"></a>
        </div>
         </div>
        </div>
        </div>
        
tovar;
        
                    }
                               
                    
            }
             $rot=$f;
print<<<t
                    <div class='obhzak'><h4>$rot руб.</h4> <input type="button" value="Оформить заказ" class="zaka"></div>
t;
                    
            }
                
                    else{
                        echo"Вы пока не добавили товар в корзину";
                    }
                }
 else{
            
            $corzina= mysql_query("SELECT `korzina` FROM `registracia` WHERE `login`='$login'");
            $rowe= mysql_fetch_array($corzina);
            $r=mysql_num_rows($corzina);
               if($rowe[0]==0){
                        echo"Вы пока не добавили товар в корзину";
               }
               else{
            $result= explode('|',$rowe[0]);
             foreach($result as $value){
             for ($i = count($result); $i <= count($result); $i++) 
            { 
            $books=mysql_query("SELECT * FROM `books` WHERE `id`='$value'");
            $array= mysql_fetch_array($books);
            $id=$array["id"];
            $author=$array["author"];
            $name=$array["name"];
            $age=$array["age"];
            $img=$array["img"];
            $price=$array["price"];
            $akcii=$array["akcii"];
        if(!$akcii==0){
   $price=$akcii.'*';  
 }
         $f+=$price;
         
print<<<tovar
        <div class="zina">
        <div class="tovar">
        <div class="ydalenie" ydal="$id" title="Удалить из корзины"> 
        <div class="otmena" >&#215;</div>
        </div>
        <div class="avtor">
        <span class="circle">$age</span><br>
        <a but="$name" href='book.php?id=$id' class="name" ><img class="cover" src="$img" alt="$name"></a>
        <div class="specification">
        <a href="avtor.php?name=$author"><h3>$author</h3></a><br>
        <a but="$name" class="name" href='book.php?id=$id'><h3>"$name"</h3></a><br>
        <span><h4>Цена:$price руб.</h4></span><br>
        <a href='zakazi.php?id=$id'><input type="button" value="Купить" class="zakazal"></a>
        </div>
        </div>
        </div>
        </div>

        
tovar;

}

            
            }
            $rot=$f;
            $korzina=$rowe['korzina'];
print<<<t
                    <div class='obhzak'><h4>$rot руб.</h4><a href='zakazi.php?idihki=$korzina'><input type="button" value="Оформить заказ" class="zaka"></a></div>
t;
            
            }
            }
print<<<t
        </div>
t;
            
  if(isset($login)){      
            
print<<<t
<div class="moizakazi"> 
            <h2>Заказы</h2>
t;
            $hotoh=  mysql_query("SELECT * FROM `zakazi` WHERE `login`='$login'");
            $roho= mysql_num_rows($hotoh);
            for ($a=0; $a<$roho; $a++) 
            {

            $ar=mysql_fetch_assoc($hotoh);
            $idzak=$ar['id'];
            $idbooks=$ar['idbooks'];
            $status=$ar['status'];
            $nomer=$ar['nomer'];
            $kolichestvo=$ar['kolichestvo'];
            $hote= mysql_query("SELECT * FROM `books` WHERE `id`='$idbooks'");
            $are=mysql_fetch_assoc($hote);
            $namee=$are['name'];
            $pricee=$are["price"];
            $akciie=$are["akcii"];
        if(!$akciie==0){
   $pricee=$akciie.'*';  
 }
 $cena=$pricee*$kolichestvo;
print<<<korzina
<div class="zina">
        <div class="tovar">
        <div class="avtor">
korzina;
$ron=  mysql_query("SELECT * FROM `zakazi` WHERE `idbooks` LIKE '%|%' AND `login`='$login' AND `id`='$idzak'");
$mon= mysql_num_rows($ron);
if($mon>0){
$resy= explode('|',$idbooks);
           foreach ($resy as $value){
             for ($i = count($resy); $i <= count($resy); $i++) 
            {
                 $hotet= mysql_query("SELECT * FROM `books` WHERE `id`='$value'");
                 $aret=mysql_fetch_assoc($hotet);
                 $nameet=$aret['name'];
                 $pri=$aret["price"];
            $akc=$aret["akcii"];
        if(!$akc==0){
   $pri=$akc.'*';  
 }
 $uu+=$pri;
print<<<korzina
        <a but="$nameet" class="name" href='book.php?id=$value'><h3>"$nameet"</h3></a><br>
korzina;

             }
             }
print<<<korzina

        <span><h4>Цена:$uu руб.</h4></span><br>
        <p>Номер для отслеживания товара:$nomer</p>
korzina;
}

else{
print<<<korzina
        
        <a but="$namee" class="name" href='book.php?id=$idbooks'><h3>"$namee"</h3></a><br>
        <span><h4>Цена:$cena руб.</h4></span><br>
        <p>Количество:$kolichestvo</p><br>
        <p>Номер для отслеживания товара:$nomer</p>
korzina;
}
$uu=0;
if($status=='На формирование'){
print<<<korzina
        <input type="button" class="otmenazakaz" skr="$idzak" value="Отменить заказ" >
korzina;
}
if($status=='В процессе'){
print<<<korzina

        <input type="button" value="Подтвердить получение" gora="$idzak" class="gora">
korzina;
}
if($status=='Завершено'){
print<<<korzina
<h4>Спасибо за покупку!</h4>
korzina;
}
print<<<korzina
        </div>
        </div>
        </div>            
korzina;
            }
print<<<r
 </div>
r;
  }
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
