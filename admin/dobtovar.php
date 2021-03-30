<?php
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
        $history=$_POST["history"];
        $akcii=$_POST["akcii"];
        $filename=$_FILES["file"]["name"];
        $tmppath=$_FILES["file"]["tmp_name"];
        $uploaddir="../img/cover/";
        $newimg=$uploaddir.$filename;
        if(empty($newimg)or empty($author)or empty($name)or empty($genre)or empty($series)or empty($publishing)
                or empty($year)or empty($pages)or empty($ISBN)or empty($format)
                or empty($price)or empty($history)){
            exit ('Все поля обязательны для заполнения');
        }
        if (!move_uploaded_file($tmppath,$newimg)) {  //функция для перемещения файла из временного хранилища
            die("Ошибка загрузки файла на сервер");
        }
        include_once '../bd/bd_connect.php';
        $rot= mysql_query("INSERT INTO `books`(`author`, `name`, `genre`, `series`, `publishing`, `year`, `pages`, `ISBN`, `format`, `cover`, `age`, `price`, `img`, `presence`, `history`, `akcii`, `reiting`, `ocenka`, `popular`) VALUES ('$author','$name','$genre','$series','$publishing','$year','$pages','$ISBN','$format','$cover','$age','$price','img/cover/$filename','Есть в наличии','$history','$akcii','','','1')");
        if($rot=='TRUE'){
            echo 'добавлен';
        }
        else{
            echo'Не добавили по какой-то причине, напишите разработчику';
        }