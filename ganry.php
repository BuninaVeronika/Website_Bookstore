<?php session_start();?>
<!DOCTYPE html>
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
            <div class="block">
                <span>
                    <h2>Жанры</h2>
            <?php
            include_once 'bd/bd_connect.php';
            
        $result=  mysql_query("SELECT `genre` FROM `books` GROUP BY `genre`");
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
    for ($i=0;$i<$row;$i++)
         {
    $array= mysql_fetch_assoc($result); //выборка строки из БД
        $genre=$array["genre"];
         if($_GET['name']==$genre){
print<<<ganry
        &rarr;
ganry;
                }       
print<<<ganry
        <li><a href="?name=$genre">$genre</a></li>
        <hr>
ganry;
        }
    }       
 ?>
        </span></div>
         <div class="vubor">
                <?php
                $name=$_GET['name'];
                     include_once 'bd/bd_connect.php';
            $book= mysql_query("SELECT * FROM `books` WHERE `genre`='$name'");
            $row= mysql_num_rows($book);
             for ($i=0; $i<$row; $i++) 
            { 
            $array= mysql_fetch_array($book);
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
        $year=$array["year"];
        $ISBN=$array["ISBN"];
        $format=$array["format"];
        $cover=$array["cover"];
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
        <span> $pages страниц</span><br>
        <span> $year года</span><br>
        <span>Рейтинг:<b>$ocenka</b></span><br>
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
            </div></div>
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


