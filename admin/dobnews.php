<?php
        $zagolovok=$_POST["zagolovok"];
        $texting=$_POST["texting"];
        $filename=$_FILES["file"]["name"];
        $tmppath=$_FILES["file"]["tmp_name"];
        $uploaddir="../img/cover/";
        $newimg=$uploaddir.$filename;
        if(empty($zagolovok)or empty($texting)){
            exit ('Все поля обязательны для заполнения');
        }
        if (!move_uploaded_file($tmppath,$newimg)) {  //функция для перемещения файла из временного хранилища
            die("Ошибка загрузки файла на сервер");
                }
        include_once '../bd/bd_connect.php';
        $rot= mysql_query("INSERT INTO `news`(`head`, `text`, `img`) VALUES ('$zagolovok','$texting','img/cover/$filename')");
        if($rot=='TRUE'){
            echo 'добавлен';
        }
        else{
            echo'Не добавили по какой-то причине, напишите разработчику';
        }

