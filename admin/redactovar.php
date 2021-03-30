<?php
        $id=$_POST["id"];
        $author=$_POST["author"];
        $name=$_POST["name"];
        $genre=$_POST["genre"];
        $series=$_POST["series"];
        $publishing=$_POST["publishing"];
        $year=$_POST["year"];
        $pages=$_POST["pages"];
        $ISBN=$_POST["isbn"];
        $format=$_POST["format"];
        $cover=$_POST["cover"];
        $age=$_POST["age"];
        $price=$_POST["price"];
        $presence=$_POST["presence"];
        $history=$_POST["history"];
        $akcii=$_POST["akcii"];
        $filename=$_FILES["file"]["name"];
        $tmppath=$_FILES["file"]["tmp_name"];
        $uploaddir="../img/cover/";
        $newimg=$uploaddir.$filename;
        if(empty($author)or empty($name)or empty($genre)or empty($series)or empty($publishing)
                or empty($year)or empty($pages)or empty($ISBN)or empty($format)
                or empty($price)or empty($history)){
            exit ('Все поля обязательны для заполнения');
        }
        include_once '../bd/bd_connect.php';
if($filename==''){
        $rot= mysql_query("UPDATE `books` SET `author`='$author',`name`='$name',`genre`='$genre',`series`='$series',`publishing`='$publishing',`year`='$year',`pages`='$pages',`ISBN`='$ISBN',`format`='$format',`cover`='$cover',`age`='$age',`price`='$price',`presence`='$presence',`history`='$history',`akcii`='$akcii' WHERE `id`='$id'");
        if($rot=='TRUE'){
            echo 'Редактирование прошло успешно';
        }
        else{
            echo'Не добавили по какой-то причине, напишите разработчику';
        }
        }
 else{
     if (!move_uploaded_file($tmppath,$newimg)) {  //функция для перемещения файла из временного хранилища
            die("Ошибка загрузки файла на сервер");
        }
        $rot= mysql_query("UPDATE `books` SET `author`='$author',`name`='$name',`genre`='$genre',`series`='$series',`publishing`='$publishing',`year`='$year',`pages`='$pages',`ISBN`='$ISBN',`format`='$format',`cover`='$cover',`age`='$age',`price`='$price',`img`='img/cover/$filename',`presence`='$presence',`history`='$history',`akcii`='$akcii' WHERE `id`='$id'");
        if($rot=='TRUE'){
            echo 'Редактирование прошло успешно';
        }
        else{
            echo'Не добавили по какой-то причине, напишите разработчику';
        }
        }