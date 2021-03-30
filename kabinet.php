<?php
session_start();
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
        $id=$_SESSION['login'];
        $result=mysql_query("SELECT * FROM `registracia` WHERE `login`='$id' ");
        $array=  mysql_fetch_assoc($result);
        $familia=$array['familia'];
        $ima=$array['ima'];
        $o=$array['otchectvo'];
        $mmail=$array['mmail'];
        $password=$array['password'];
        $login=$array['login'];
        $telefon=$array['telefon'];
        $rdata=$array['rdata'];
        $ad=$array['ad'];
        $do=$array['do'];
        $r=$array['r'];
        $e=$array['e'];
        $pindex=$array['pindex'];
print<<<red
<div class="reg">
        <h2>Личный кабинет</h2>
         
            <form name="reg">
                <table>
                    <tr>
                        <td>Фамилия</td>
                        <td><input  class="registr" type="text" id="familia" value="$familia"  title="Введите свою фамилию"></td>
                    </tr>
                    <tr>
                        <td>Имя</td>
                        <td><input class="registr" type="text" id="ima" value="$ima"  title="Введите своe имя"></td>
                    </tr>
        <tr>
            <td>
        Отчество:</td> 
            <td><input type="text" id="o" placeholder="Отчество получателя" value="$o"></td>
        </td>
            </tr>
                    <tr>
                        <td>E-mail*</td>
                        <td><input  class="registr" type="email" id="mmail" value="$mmail" pattern="^\D[\w]{3,15}@[\w]{3,15}\.(com|en|org|ru|ua)" title="e-mail на который мы сможем отправлять информацию о доставке и приближающихся акциях"></td>
                    </tr>
                    <tr>
                        <td>Логин*</td>
                        <td><input  class="registr" type="text" id="login"  value="$login"  pattern=""  title="Придумайте Имя которое будет отображаться на сайте"></td>
                    </tr>
                    <tr>
                        <td>Телефон</td>
                        <td><input class="registr" type="text" id="telefon" value="$telefon"  pattern="" title="Укажите номер телефона, для получения уведомлений о доставке"></td>
                    </tr>
                    <tr>
                        <td>Дата рождения</td>
                        <td><input  class="registr" type="date" id="rdata" value="$rdata"  pattern="" title="Введите дату рождения для участия в некоторых акциях" ></td>
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
                </table>
       <span class="otvet"></span>
                <br><br>
                <input  type="button" id="redac" value="Редактировать">
                <input  type="button" id="vuiti" value="Выйти из уч.записи">
            </form>
        
            <br><br>
        <h2>Сменить пароль</h2>
                <table>
                    <tr>
                        <td>Пароль*</td>
                        <td><input class="registr" type="password" id="password"  title="Придумайте сложный пароль"></td>
                    </tr>
                    <tr>
                        <td>Подтвердите пароль*</td>
                        <td><input class="registr" type="password" id="ppassword"  pattern=""  title="Придумайте сложный пароль"></td>
             </tr>
    </table><br>

           <input  type="button" id="smena" value="Сменить"><br><br><br>
        <hr>
           <input  type="button" id="ydld" value="Удалить учетную запись">
            </div>
          
red;

                    ?>
            <div class="kabinet">
                <h2>Рекомендуем</h2>
                <?php
                $name=$_COOKIE['tovar'];
                if(empty($name)){
                }
                else {
                     include_once 'bd/bd_connect.php';
            $book= mysql_query("SELECT * FROM `books` WHERE `genre`='$name' ORDER BY RAND() LIMIT 1");
        $arra=  mysql_fetch_assoc($book);
        $id=$arra["id"];
        $author=$arra["author"];
        $name=$arra["name"];
        $genre=$arra["genre"];
        $publishing=$arra["publishing"];
        $pages=$arra["pages"];
        $age=$arra["age"];
        $price=$arra["price"];
        $img=$arra["img"];
        $ocenka=$arra["ocenka"];
        $year=$arra["year"];
        $ISBN=$arra["ISBN"];
        $format=$arra["format"];
        $cover=$arra["cover"];
        $history=$arra["history"];
print<<<tovar
    <div class="tovar">
        <div class="avtor">
        <span class="circle">$age</span><br>
        <a but="$name" href='book.php?id=$id' class="name" ><img class="cover" src="$img" alt="$name"></a>
        <div class="specification">
        <a href="avtor.php?name=$author"><h3>$author</h3></a><br>
        <a but="$name" class="name" href='book.php?id=$id'><h3>"$name"</h3></a><br>
        <span>Издательство:$publishing</span><br> 
        <span>Формат:$format</span><br>
        <span>$cover обложка</span><br>
        <span>Рейтинг:<b>$ocenka</b></span><br>
        <span> $pages страниц</span><br>
        <span> $year года</span><br>
        <span><h4>Цена:$price руб.</h4></span><br>
                <form name="sail">
        <input  but="$id" type="button" class="pokupka">
        </form>
        </div>

     </div>
        </div>
tovar;
    }       
                    ?>
            </div>
        </div>
	<!--ШПодвал сайта с организацинными иконками и соц.сетями -->
       <?php 
        include_once 'comp/footer.php';
        ?>
	<!--Попап-всплывающие окна-->
        <?php 
        include_once 'comp/panel.php';
        ?>   
    </body>
</html>


