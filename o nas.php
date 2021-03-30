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
<div class="glavnews">
                <img src="img/zag.png" alt="Миленькая картиночка для вас"/>
                <div>
                <h2>
                 С чего все началось?
                </h2>
                </div>
                <span>
С детства в нас развивается любовь к книгам!<br>
Дружба, приключения, наука окружают нас на каждой странице, погружая в вселенную, созданную автором.<br>
Думаю,  каждый хоть раз в жизни выпадал из реальности, читая книгу по душе.<br>
Так и родилась мечта. <br>Мечта дарить людям целые миры.<br> Миры в твердом переплете.
                </span>
            </div>   
            <div class="lav">
                <h2>
                 Сотрудники нашей компании
                </h2>
     <div class="sot">
        <img src="img/dir.jpg" alt=""/>
        <span><b>Директор</b></span><br>
        <span>Безалтынных Олеся Алексеевна</span>
     </div>
     <div class="sot">
        <img src="img/men.jpg" alt=""/>
        <span><b>Менеджер продаж</b></span><br>
        <span>Кульмина Анастасия Андреевна</span>
     </div>
     <div class="sot">
        <img src="img/admin.jpg" alt=""/>
        <span><b>Администратор сайта</b></span><br>
        <span>Нирвина Антонина Андреевна</span>
     </div>
     <div class="sot">
        <img src="img/smm.jpg" alt=""/>
        <span><b>SMM-менеджер</b></span><br>
        <span>Аркопенко Антонина Алексеевна</span>
     </div>         
        </div>
                   <div class="lav">
                <h2>
                 Наши партнеры
                </h2>
     <div class="sot">
         <img src="img/1par.jpg" alt="Книжное Издательство Славянка"/> Книжное Издательство "Славянка"
         
     </div>
                       <div class="sot">
         <img src="img/2par.jpg" alt="Издательский центр"/> Издательский центр "Планета"
         
     </div>
                       <div class="sot">
         <img src="img/4par.jpg" alt="Издательский центр"/> Издательский центр "Академия"
         
     </div>
                       <div class="sot">
         <img src="img/3par.jpg" alt="Издательский дом"/> Издательский дом "Пронто-центр"
         
                       </div>
         <span class='opisanie'>С предложениями писать к нам на почту <a href='homebooks@gmail.com'>HomeBooks@gmail.com</a> или администратору сайта &#9993;</span>
        </div>
               <div class="lav">
                <h2>
                 Контактная информация
                </h2>
               <div class="tovar">
                   <span class='opisanie'>
                       <b>Директор компании:</b><br>
                       Безалтынных Олеся Алексеевна<br><br>
                       <b>Фактический адрес:</b><br>
                       Курская область,город Льгов, улица Л.Толстого, дом 94<br><br>
                       <b>Почтовый индекс:</b> 308654<br><br>
                       <b>Телефонный номер:</b>8(920)709-71-69<br><br>
                       <b>Электронная почта:</b>Homebooks@gmail.com<br><br>
                   </span>
               </div>
                   <div class="karta">
                      <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A255453f916b43763437a41a5ac6022d2b1f54d831487075f030c19386f2a803f&amp;width=450&amp;height=350&amp;lang=ru_RU&amp;scroll=true"></script>
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
