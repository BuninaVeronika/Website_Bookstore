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
         
</div>
         <div class="celikom">
    <div class="zakazati">
    <div class="otmena" id='kaz' title="Закрыть окно">&#215;</div>
    <div class="o_knige">
<?php
include_once 'bd/bd_connect.php';
if(isset($_GET['id'])){
$id=$_GET['id'];
$rot=  mysql_query("SELECT * FROM `books` WHERE `id`='$id'");
$arr=  mysql_fetch_assoc($rot);
 $author=$arr["author"];
 $name=$arr["name"];
 $img=$arr["img"];
 $price=$arr["price"];
 $akcii=$arr["akcii"];
 if(!$akcii==0){
   $price=$akcii;  
 }
print<<<inf
    <img class="cover" src="$img" alt="$name">
    <h3>$author</h3>
    <h3>$name</h3>
    <h4>$price &#8381;</h4>
    <form name="zakaz" id="zakazkig"  >
    <span class='zakaz'><input type="text" value='$id' id='id'></span>
    <p>
        Количество:<input class='red' type='text' id='col' value="1">
        </p>
inf;
}
if(isset($_GET['idihki'])){
            
            $corzina= mysql_query("SELECT `korzina` FROM `registracia` WHERE `login`='$login'");
            $rowe= mysql_fetch_array($corzina);
            $id=$rowe['0'];
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
print<<<inf
    <img class="cover" src="$img" alt="$name">
    <h3>$author</h3>
    <h3>$name</h3>
    <h4>$price &#8381;</h4>
    <form name="zakaz" id="zakazkig" >
    <span class='zakaz'><input type="text" value='$id' id='id'></span>
        <p class='zakaz'>
        Количество:<input class='red' type='text' id='col' value="1">
        </p>
inf;
}
             }
               }
}
        $login=$_SESSION['login'];
        $result=mysql_query("SELECT * FROM `registracia` WHERE `login`='$login' ");
        $array=  mysql_fetch_assoc($result);
        $familia=$array['familia'];
        $ima=$array['ima'];
        $o=$array['otchectvo'];
        $ad=$array['ad'];
        $do=$array['do'];
        $r=$array['r'];
        $e=$array['e'];
        $pindex=$array['pindex'];          
    
print<<<inf
        
    </div>
    <div class="o_knige">
    <h3>Форма заказа</h3>
    <br><br>
      <span id='status'></span>
        <table>
            <tr>
            <td>
        Фамилия:</td>
            <td><input type="text" id="fam" placeholder="Фамилия получателя" value="$familia"></td>
            </tr>
            <tr>
            <td>
        Имя:</td>
            <td><input type="text" id="i" placeholder="Имя получателя" value="$ima"></td>
            </tr>
        <tr>
            <td>
        Отчество:</td> 
            <td><input type="text" id="o" placeholder="Отчество получателя" value="$o"></td>
        </td>
            </tr>
            <tr>
            <td>
       Улица доставки:</td> 
            <td><input type="text" id="ad" placeholder="ул.****" value="$ad"></td>
            </tr>
             <tr>
            <td>
      Дом доставки:</td> 
            <td><input type="text" id="do" placeholder="д.****" value="$do"></td>
            </tr>
            <tr>
            <td>
      Квартира доставки:</td> 
            <td><input type="text" id="r" placeholder="кв.****" value="$r"></td>
        </td>
            </tr>
            <tr>
            <td>
      Город доставки:</td> 
            <td><input type="text" id="e" placeholder="г.**** или ***.обл ***р-н" value="$e"></td>
        </td>
            </tr>
        <tr>
            <td>
        Индекс почтового отделения:</td>
            <td><input type="text" id="pindex" placeholder="******" value="$pindex"></td>
        </td>
            </tr>
inf;

?>
        </table><br><br>
        <input type="button" value="Заказать" id="zakazati">
    </form>
    </div>
    <div class="o_knige">
    <h3>Вопросы</h3>
    <br>
    <p class="opisanie">*Пожалуйста, укажите достоверную информацию из документа удостоверяющего личность.
        В соответсиии с ним будет отправлен заказ.</p>
    <br><br>
    <p><b>Доставка</b><br><br>
        1.В соотвествии с заполненной вами формой, будет отправленна посылка.<br>
        2.Ваш заказ придет на указанное в форме почтовое отделение, после чего будет отправлено извещение на указанный адрес.<br>  
    </p>
    <p><b>Как оплатить?</b><br><br>
        1.Необходимо заполнить извещение о доставке направленное вам из почтового отделения.<br>
        2.Собрав необходимую сумму,паспорт и извещение явиться на почтовое отделение указанное в нем.<br>
    </p>
    
    </div>
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
