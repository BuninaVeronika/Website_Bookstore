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
            <div class="specification">
                <div class="admin">
                 <a class='tok' href="?dobtovar"><p>&#10010; Добавить товар</p></a>
                 <a id='zak' href="?zakazu"><p>&#9998; Управление заказами</p></a>
                 <a class='tok' href="?dobnews"><p>&#9672; Добавить новость</p></a>
                 <a class='tok' href="?sobadmin"><p>&#9993; Сообщения администратору</p></a>
                </div>
            </div>

           <?php
           include_once 'bd/bd_connect.php';
           if($_SESSION['login']==admin){
           if(isset($_GET["dobtovar"])){
print<<<dob
                <div class="reg">
               <h3>Добавление товара</h3>
                
               <div class='dobavlenie'>
                <form name="dob" id="dobbooks" method='POST' enctype="multipart/form-data">
                <table>
               <tr>
   <td>Изображение:</td>
       <td><input type='file' id="file" name="file" required></td>
               </tr>
               <tr>
    <td>Автор:</td>
    <td><input type='text' name="author"  placeholder='Фамилия Имя' class='dob' required></td>
               </tr>
               <tr>
    <td>Название:</td>
        <td><input type='text' name="name"  placeholder='Название произведения' class='dob' required></td>
               </tr>
               <tr>
   <td>Жанр:</td>
       <td><input type='text' name="genre"  placeholder='Жанр книги' class='dob' required></td>
               </tr>
               <tr>
   <td>Серия:</td>
       <td><input type='text' name="series"  placeholder='Серия книги' class='dob' required></td>
               </tr>
               <tr>
   <td>Издательство:</td>
       <td><input type='text' name="publishing"  placeholder='Издательство' class='dob' required></td>
               </tr>
               <tr>
   <td>Год:</td>
       <td><input type='text' name="year"  placeholder='Год издания' class='dob' required></td>
               </tr>
               <tr>
   <td>Страницы:</td>
       <td><input type='text' name="pages"  placeholder='Количество страниц' class='dob' required></td>
               </tr>
               <tr>
   <td>ISBN:</td>
       <td><input type='text' name="isbn"  required></td>
               </tr>
               <tr>
   <td>Формат:</td>
       <td><input type='text' name="format"  placeholder='Формат книги' class='dob' required></td>
               </tr>
               <tr>
   <td>Обложка:</td>
       <td>
            <input type='text' name="cover" placeholder='Тип обложки' required>
    </td>
               </tr>
               <tr>
   <td>Возврастное ограничение:</td>
       <td>
           <input type='text' name="age" placeholder='xx+' required>
               </td>
               </tr>
               <tr>
   <td>Стоимость:</td>
       <td><input type='text' name="price" placeholder='Цена в рублях' required></td>
               </tr>
               <tr>
   <td>Описание:</td>
       <td><textarea id="history"  name="history"  placeholder='Краткое описание книги' required></textarea>
               </td>
               </tr>
               <tr>
   <td>Акция:</td>
       <td><input type='text' name="akcii"  placeholder='Стоимость по акции' class='dob'></td>
                 </tr>
   </table>
               </div>
               <span id='status' class="dobvet"></span>
                <br>
                <input type="button" id="dobtovar" value="Добавить товар"  onclick="feedbackAjax()">
            </form>
            </div>
               
dob;
}
if(isset($_GET["dobnews"])){
print<<<dob
               <div class='reg'>
               <h3>Добавление новости на главную страницу</h3>
               <span>*На главной странице демонстрируется последняя добавленная вами новость<span>
                
               <div class='dobavlenie'>
                <form name="dobnews" id="dobnews" method='POST' enctype="multipart/form-data">
                <table>
               <tr>
   <td>Изображение:</td>
       <td><input type='file' id="file" name="file" required></td>
               </tr>
               <tr>
    <td>Заголовок:</td>
    <td><input type='text' name="zagolovok" class='dob' required></td>
               </tr>
               <tr>
    <td>Текст:</td>
        <td><textarea name="texting" class='textarea'></textarea>
            </td>
               </tr>
               <span id='status' class="dobvet"></span>
                <br>
               </table>
                <input type="button" value="Добавить новость"  onclick="dobnewsing()">
            </form>
               
            </div>
                </div>
               
dob;
           }
           /*Заказы товара*/
           if(isset($_GET["zakazu"])){
print<<<go
   <div class='zakr'>
                <a class='tok' href="?zakazu=tekyh"><p>&starf; Текущие заказы</p></a>
                <a class='tok' href="?zakazu=podtv"><p>&#10003; Подтвержденные</p></a>
                 <a class='tok' href="?zakazu=proces"><p>&circlearrowright; В процессе доставки</p></a>
            </div>
go;
               if($_GET["zakazu"]=='tekyh'){
print<<<mail
               <div class='obadmin'>
mail;
            $tekyh=  mysql_query("SELECT * FROM `zakazi` WHERE `status`='На формирование'");
            $tekyhro= mysql_num_rows($tekyh);
            for ($a=0; $a<$tekyhro; $a++) 
            {
                $tek= mysql_fetch_assoc($tekyh);
                $tekid=$tek['id'];
                $tekidbooks=$tek['idbooks'];
                $tekfio=$tek['fio'];
                $tekadress=$tek['adress'];
                $tekdata=$tek['data'];
                $tekpindex=$tek['pindex'];
                $tekkolichestvo=$tek['kolichestvo'];
                $tekstatus=$tek['status'];
print<<<mail
          <table class='tab'>
                <tr>
                <td>
mail;
$ron=  mysql_query("SELECT * FROM `zakazi` WHERE `idbooks` LIKE '%|%' AND `id`='$tekid'");
$mon= mysql_num_rows($ron);
if($mon>0){
$resy= explode('|',$tekidbooks);
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
        <a but="$nameet" class="name" href='book.php?id=$value'>"$nameet"</a><br>
korzina;

             }
             }
print<<<korzina
             </td>
                         <td>Цена: $uu руб.</td>
                    </tr>
korzina;
$uu=0;
}
else{
    $ho= mysql_query("SELECT * FROM `books` WHERE `id`='$tekidbooks'");
    $yo=  mysql_fetch_assoc($ho);
    $idk=$yo['name'];
    $top=$yo['price'];
    $cena=$top*$tekkolichestvo;
print<<<korzina
        
        <a but="$idk" class="name" href='book.php?id=$tekidbooks'>"$idk"</a><br>
        </td>
                         <td>Цена: $cena руб.</td>
                    </tr>
korzina;
}

print<<<mail
                     
                    <tr>
                        <td><b>Заказчик:</b></td>
                        <td>$tekfio</td>
                    </tr>
                    <tr>
                        <td><b>Адрес доставки:</b></td>
                        <td>$tekadress</td>
                    </tr> 
         <tr>
                        <td><b>Индекс почтового отделения:</b></td>
                        <td>$tekpindex</td>
                    </tr> 
          <tr>
                        <td><b>Количество экземляров:</b></td>
                        <td>$tekkolichestvo</td>
                    </tr> 
         <tr>
                        <td>$tekdata</td>
                        <td></td>
                    </tr> 
         
         <tr>
                        <td><input  class="sform" type="button" rab="$tekid" value='Заказ сформирован'></td>
                        <td></td>
                    </tr> 
        
         </table>
mail;
            }
print<<<mail
               </div>
mail;
               }
               
               
               
               
               
               if($_GET["zakazu"]=='podtv'){
print<<<mail
               <div class='obadmin'>
mail;
            $tekyh=  mysql_query("SELECT * FROM `zakazi` WHERE `status`='Завершено'");
            $tekyhro= mysql_num_rows($tekyh);
            for ($a=0; $a<$tekyhro; $a++) 
            {
                $tek= mysql_fetch_assoc($tekyh);
                $tekid=$tek['id'];
                $tekidbooks=$tek['idbooks'];
                $tekfio=$tek['fio'];
                $tekadress=$tek['adress'];
                $tekpindex=$tek['pindex'];
                $tekkolichestvo=$tek['kolichestvo'];
                $tekdata=$tek['data'];
                $tekstatus=$tek['status'];
                $teknomer=$tek['nomer'];
print<<<mail
          <table class='tab'>
                <tr>
                <td>
mail;
$ron=  mysql_query("SELECT * FROM `zakazi` WHERE `idbooks` LIKE '%|%' AND `id`='$tekid'");
$mon= mysql_num_rows($ron);
if($mon>0){
$resy= explode('|',$tekidbooks);
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
        <a but="$nameet" class="name" href='book.php?id=$value'>"$nameet"</a><br>
korzina;

             }
             }
print<<<korzina
             </td>
                         <td>Цена: $uu руб.</td>
                    </tr>
korzina;
$uu=0;
}
else{
    $ho= mysql_query("SELECT * FROM `books` WHERE `id`='$tekidbooks'");
    $yo=  mysql_fetch_assoc($ho);
    $idk=$yo['name'];
    $top=$yo['price'];
    $cena=$top*$tekkolichestvo;
print<<<korzina
        
        <a but="$idk" class="name" href='book.php?id=$tekidbooks'>"$idk"</a><br>
        </td>
                         <td>Цена: $cena руб.</td>
                    </tr>
korzina;
}

print<<<mail
                     
                    <tr>
                        <td><b>Заказчик:</b></td>
                        <td>$tekfio</td>
                    </tr>
                    <tr>
                        <td><b>Адрес доставки:</b></td>
                        <td>$tekadress</td>
                    </tr> 
         <tr>
                        <td><b>Индекс почтового отделения:</b></td>
                        <td>$tekpindex</td>
                    </tr> 
          <tr>
                        <td><b>Количество экземляров:</b></td>
                        <td>$tekkolichestvo</td>
                    </tr> 
        <tr>
                        <td><b>Номер отслеживания товара:</b></td>
                        <td>$teknomer</td>
                    </tr> 
                        <tr>
                        <td>$tekdata</td>
                        <td></td>
                    </tr>  
         <tr>
                        <td><input  class="ydalkazak" type="button" yop="$tekid" value='Оплачено-Удалить'></td>
                        <td></td>
                    </tr> 
        
         </table>
mail;
            }
print<<<mail
               </div>
mail;

               }
               
               
               
               
               
               if($_GET["zakazu"]=='proces'){
print<<<mail
               <div class='obadmin'>
mail;
            $tekyh=  mysql_query("SELECT * FROM `zakazi` WHERE `status`='В процессе'");
            $tekyhro= mysql_num_rows($tekyh);
            for ($a=0; $a<$tekyhro; $a++) 
            {
                $tek= mysql_fetch_assoc($tekyh);
                $tekid=$tek['id'];
                $tekidbooks=$tek['idbooks'];
                $tekfio=$tek['fio'];
                $tekadress=$tek['adress'];
                $tekpindex=$tek['pindex'];
                $tekkolichestvo=$tek['kolichestvo'];
                $tekdata=$tek['data'];
                $tekstatus=$tek['status'];
                $teknomer=$tek['nomer'];
print<<<mail
          <table class='tab'>
                <div class="ydalkazak" yop="$tekid" title="Удалить из корзины">
                    <div class="otmena" ><br>&#215;</div></div>
                <tr>
                <td>
mail;
$ron=  mysql_query("SELECT * FROM `zakazi` WHERE `idbooks` LIKE '%|%' AND `id`='$tekid'");
$mon= mysql_num_rows($ron);
if($mon>0){
$resy= explode('|',$tekidbooks);
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
        <a but="$nameet" class="name" href='book.php?id=$value'>"$nameet"</a><br>
korzina;

             }
             }
print<<<korzina
             </td>
                         <td>Цена: $uu руб.</td>
                    </tr>
korzina;
$uu=0;
}
else{
    $ho= mysql_query("SELECT * FROM `books` WHERE `id`='$tekidbooks'");
    $yo=  mysql_fetch_assoc($ho);
    $idk=$yo['name'];
    $top=$yo['price'];
    $cena=$top*$tekkolichestvo;
print<<<korzina
        
        <a but="$idk" class="name" href='book.php?id=$tekidbooks'>"$idk"</a><br>
        </td>
                         <td>Цена: $cena руб.</td>
                    </tr>
korzina;
}

print<<<mail
                     
                    <tr>
                        <td><b>Заказчик:</b></td>
                        <td>$tekfio</td>
                    </tr>
                    <tr>
                        <td><b>Адрес доставки:</b></td>
                        <td>$tekadress</td>
                    </tr> 
         <tr>
                        <td><b>Индекс почтового отделения:</b></td>
                        <td>$tekpindex</td>
                    </tr> 
          <tr>
                        <td><b>Количество экземляров:</b></td>
                        <td>$tekkolichestvo</td>
                    </tr> 
         
         <tr>
                        <td><b>Номер для отслеживания:</b></td>
                        <td><input  class="pot" type="text" c='$tekid' value='$teknomer'>
                            </td>
                    </tr> 
         <tr>
                        <td>$tekdata</td>
                        <td></td>
                    </tr> 
        
         </table>
mail;
            }
print<<<mail
               </div>
mail;
               }
           }
 /*Заказы товара*/
           if(isset($_GET["sobadmin"])){
print<<<mail
               <div class='obadmin'>
mail;

               $maile=mysql_query("SELECT * FROM `message` WHERE `status`='На рассмотрение'");
               $raw=  mysql_num_rows($maile);
               for($i=0;$i<$raw;$i++){
               $arrar=  mysql_fetch_assoc($maile);
               $idadmin=$arrar["id"];
               $tema=$arrar["tema"];
               $status=$arrar["status"];
               $emaili=$arrar["email"];
               $maili=$arrar["mail"];
print<<<mail
               <div id='status'></div>
               <div class='mail'>
                <p><b>Тема сообщения:</b>$tema</p> <br>
                <p><b>Электронный адрес:</b>$emaili</p><br>
                <p><b>Сообщение:</b>$maili</p><br>
                <input type='button' value='Удалить' but='$idadmin' class='ydaladminmail'>
                </div>
                
        
mail;

           }
           print<<<mail
           </div>
mail;
           
           }
           }
           else{
               echo 'Вы не администратор сайта, данные функции не работают на вашем аккаунте';
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
