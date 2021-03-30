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
            <h2>Случайная книга</h2>
            <?php
            include_once 'bd/bd_connect.php';
            $booke=  mysql_query("SELECT * FROM `books`");
            $bro=  mysql_num_rows($booke);
            $book=rand(1,$bro);
        $books=  mysql_query("SELECT * FROM `books` WHERE `id`='$book' ");
        if(!$books){
            die("Ошибка запроса");
        }
        else
        {
    $array= mysql_fetch_assoc($books); //выборка строки из БД
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
print<<<tovar
    <div class="slucknig">
        <span class="circle">$age</span><br>
        <a but="$name" href='book.php?id=$id' class="name" ><img class="cover" src="$img" alt="$name"></a>
        <div class="specification">
        <a href="avtor.php?name=$author"><h3>$author</h3></a><br>
        <a but="$name"  href='book.php?id=$id'><h3>"$name"</h3></a><br>
         <a  href='ganry.php?name=$genre' ><span>Жанр:<b>$genre</b></span></a><br>
        <span>Издательство:$publishing</span><br>
        <span> $pages страниц</span><br>
        <span><h4>Цена:$price &#8381;</h4></span><br>
       <div class="ocenka">Рейтинг:<b>$ocenka</b><br>
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
    <div class="vetu">
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
       </div>  
tovar;
    }
print<<<tovar
         </div>
        <form name="sail">
        <input  but="$id" type="button" class="pokupka">
        </form>
        </div>
        <div class="opisanie"><p>Описание: $history</p></div>
     </div>
tovar;
    }     
 ?>
                  
                    
            <div class="news">
                <h2>Лучшее по итогам рейтинга</h2>
            <?php
            include_once 'bd/bd_connect.php';
$result1=  mysql_query("SELECT * FROM `books` ORDER BY `ocenka` DESC");
if(!result1){
    die("Ошибка запроса");
}
$row1=  mysql_num_rows($result1);
if($row1==0)
{
    Echo "Ничего не найдено";
}
else
{
    for ($i=0;$i<4;$i++)
    {
    $array= mysql_fetch_assoc($result1); //выборка строки из БД
        $id=$array["id"];
        $author=$array["author"];
        $name=$array["name"];
        $genre=$array["genre"];
        $pages=$array["pages"];
        $age=$array["age"];
        $price=$array["price"];
        $img=$array["img"];
        $ocenka=$array["ocenka"];
print<<<tovar
 <div class="tovar">
        <span class="circle">$age</span><br>
        <a but="$name" href='book.php?id=$id' class="name" ><img class="cover" src="$img" alt="$name"></a>
        <a href="avtor.php?name=$author"><h3>$author</h3></a><br>
        <a but="$name" href='book.php?id=$id'><h3>"$name"</h3></a><br>
        <div class="specification">
        <span><h4>Цена:$price&#8381;</h4></span><br>
        <span>Рейтинг:<b>$ocenka</b></span><br>
        <a  href='ganry.php?name=$genre' ><span>Жанр:<b>$genre</b></span></a><br>
        <div class="ocenka">
        </div>
        </div>
        <form name="sail">
        <input  but="$id" type="button" class="pokupka">
        </form>
     </div>

tovar;
    }
}       
 ?>
            </div> 
              
                    <div class="news">
                        <h2>Акции</h2>
           <?php
            include_once 'bd/bd_connect.php';
$result=  mysql_query("SELECT * FROM `books` ORDER BY `akcii` DESC");
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
    for ($i=0;$i<4;$i++)
    {
    $array= mysql_fetch_assoc($result); //выборка строки из БД
        $id=$array["id"];
        $author=$array["author"];
        $name=$array["name"];
        $genre=$array["genre"];
        $pages=$array["pages"];
        $price=$array["price"];
        $akcii=$array["akcii"];
        $img=$array["img"];
print<<<tovar
 <div class="akcii">
        <div class="akc"><h5>$akcii руб.</h5></div>
        <a but="$name" href='book.php?id=$id' class="name" ><img class="cover" src="$img" alt="$name"></a>
        <div class="specification">
        <a href="avtor.php?name=$author"><h3>$author</h3></a><br>
        <a but="$name" href='book.php?id=$id'><h3>"$name"</h3></a><br>
         <a  href='ganry.php?name=$genre' ><span>Жанр:<b>$genre</b></span></a><br>
        <span> $pages страниц</span><br>
        <span><h4>Цена:$price&#8381;</h4></span><br>
        </div>
         <form name="sail">
        <input  but="$id" type="button" class="pokupka">
        </form>
     </div>

tovar;
    }
}       
 ?>
                    </div>
                    <div class="news">
                 <h2>Поступления</h2>
            <?php
            include_once 'bd/bd_connect.php';
            $resulte=mysql_query("SELECT * FROM `books` ORDER BY `id` DESC");
            if(!$resulte){
                    die("Ошибка запроса");
                }
                $rowe=mysql_num_rows($resulte);
                if($rowe==0)
                {
                    Echo "Ничего не найдено";
                }
                else
                {
                    for ($i=0;$i<4;$i++)
                    {
    $array= mysql_fetch_assoc($resulte); //выборка строки из БД
        $id=$array["id"];
        $author=$array["author"];
        $name=$array["name"];
        $genre=$array["genre"];
        $pages=$array["pages"];
        $age=$array["age"];
        $price=$array["price"];
        $img=$array["img"];
print<<<tovar
 <div class="tovar">
        <span class="circle">$age</span><br>
        <a but="$name" href='book.php?id=$id' class="name" ><img class="cover" src="$img" alt="$name"></a>
        <a href="avtor.php?name=$author"><h3>$author</h3></a><br>
        <a but="$name" href='book.php?id=$id'><h3>"$name"</h3></a><br>
        <div class="specification">
        <span><h4>Цена:$price&#8381;</h4></span><br>
        <span>$pages страниц</span><br>
        <a  href='ganry.php?name=$genre' ><span>Жанр:<b>$genre</b></span></a><br>
        <div class="ocenka">
        </div>
        </div>
        <form name="sail">
        <input  but="$id" type="button" class="pokupka">
        </form>
     </div>

tovar;
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
