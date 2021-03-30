<div id="left_block">
 <!--Блок с логотипом-->
 <a href="index.php" ><div id="logo" alt="Логотип/Сова" title="HomeBooks-На главную страницу"></div></a>
			 <!--Меню сайта-->
            <nav id="menu">
                <a href="index.php"><li id="a">Главная</li></a>
                <a href="ganry.php"><li id="b">Жанры</li></a>
                <a href="avtor.php"><li id="c">Авторы</li></a>
                <a href="news.php"><li id="d">Новости</li></a>
                <a href="o nas.php"><li id="f">О нас</li></a>
            </nav>
			 <!--Корзина-->
                         <a href="korzina.php"><div id="corsina" alt="Корзина" title="Ваши товары">
                                 <div class="tochet">
                                     <?php
             include_once 'bd/bd_connect.php';
            $login=$_SESSION['login'];
                if (empty($login))
                { 
                    if(isset($_COOKIE['corzina'])){
             $result= explode(' ',$_COOKIE['corzina']);
             $tovar=count($result);
print<<<tovar
        <p>$tovar</p>
tovar;
                    }
                    
            }
               else{
            include_once 'bd/bd_connect.php';
            $corzina= mysql_query("SELECT `korzina` FROM `registracia` WHERE `login`='$login'");
            $rowe= mysql_fetch_array($corzina);
            if($rowe[0]==0){
print<<<tovar
        <p>0</p>
tovar;
}
else{
            $result= explode('|',$rowe[0]);
            $tovar=count($result);
print<<<tovar
        <p>$tovar</p>
tovar;
}
}
            ?>
                                 </div>    
                             </div></a>
			 <!--Регистрация и авторизация-->
            <div id="reg" alt="Регистрация/Авторизация" title="Вход на сайт и регистрация"></div>
            <div id="inf">
              2011 - 2017 ©Книжный интернет-магазин «HomeBooks»<br>
              Full stack web developer:Бунина Вероника
          </div>
        </div>

