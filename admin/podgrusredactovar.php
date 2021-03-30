<?php
print<<<tovar
                    <form id='redactirovanietovara' name='redac' method='POST' enctype="multipart/form-data">
                    <div class="books">
                    <span class="circle">
                        <input class='red' type='text' name='age' value='$age'>
                    </span>
                    <br>
                    <div class="ocenka">
                    <a but="$name" href='book.php?id=$id' class="name">

                        <input type='file' name='file'>
   <img class="cover" src="$img" alt="$name"></a>
        <div class="pokupai">
        <h4>Цена:
                        <input class='red' type='text' name='price' value='$price'>

        руб.</h4>
tovar;

print<<<tovar
  <h4>
        Акция:<input class='red' type='text' name='akcii' value='$akcii'>
   руб.</h4>
tovar;

print<<<tovar
<br><br>
         <p>
                        <input  type='text' name='presence' value='$presence'>
         </p><br><br>
        </div>
        </div>
        <div class="zagolovok">
        <h3>
                        <input  type='text' name='author' value='$author'>
        </h3>
        <h3>
                        <input  type='text' name='name' value='$name'>
        </h3>
        </div>
       <div class="zeni">
        <div class="specification">
        <p>Жанр:
                        <input type='text' name='genre' value='$genr'>
        </p><br>
        <p>Серия:
                        <input type='text' name='series' value='$series'>
        </p><br>
        <p>Издательство:
                        <input type='text' name='publishing' value='$publishing'>
        </p><br>
        <p>
                        <input type='text' name='cover' value='$cover'>
        обложка</p><br>
        <p>Формат:
                        <input type='text' name='format' value='$format'>
        </p><br>
        <p>ISBN:
                        <input type='text' name='isbn' value='$ISBN'>
        </p><br>
        <p>
                        <input type='text' name='year' value='$year'>
        года</p><br>
        <p>
                        <input type='text' name='pages' value='$pages'>
        страниц</p><br>
        </div>
        
        </div>
        
         <div class="opisanie">
         <p>Описание: 
                        <textarea class='redactir' name='history'>$history</textarea> 
         </p>           <input type='text' class="zakaz" name='id' value='$id'>
                            <span id='status'></span>
                            <input  type='button' value='Сохранить редактирование' onclick="soxtovar()">
                            <input but='$id' type='button' value='Удалить книгу' id='ydaltovat'>
        </div>
        
        </form>
        
        </div>  
        
        <div class="commentarii">
        
tovar;
        $commentarii=mysql_query("SELECT * FROM `comment` WHERE `idbooks`='$ide'");
        $row=mysql_num_rows($commentarii);
        if($row==0)
{
    echo "<p>Нет отзывов</p>";
}
else
{
      for($i=0;$i<$row;$i++){
            $arr= mysql_fetch_assoc($commentarii);
            $idcom=$arr['id'];
            $datatime=$arr["datatime"];
            $login=$arr["login"];
            $otzuv=$arr["otzuv"];
PRINT<<<com
        <form name="comm">
        <p >$login</p><p id='tyt'></p>
        <p><input type='text' class="zakaz" id='idcom' value='$idcom'></p>
        <input type='button'  but='$idcom' value='Удалить' class='ydalcomm'>
        <p><input type='text' class="otsuv" ih='$idcom' value='$otzuv'></p>
        <p>$datatime</p>
        
        <hr> 
        </form>
com;
}}

