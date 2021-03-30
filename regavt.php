<?php
session_start();
if(isset($_SESSION['login'])){
    header('Location: kabinet.php');
exit;
}
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
             <h2>Регистрация</h2>
             <?php 
             if(empty($_SESSION['login'])){
print<<<reg
                 <div class="reg">
            <span class="otvet"></span>
            <form name="reg">
                <table>
                    <tr>
                        <td>Фамилия</td>
                        <td><input  class="registr" type="text" id="familia" placeholder="Только буквы" pattern="" title="Введите свою фамилию"></td>
                    </tr>
                    <tr>
                        <td>Имя</td>
                        <td><input class="registr" type="text" id="ima" placeholder="Только буквы" pattern="" title="Введите своe имя"></td>
                    </tr>
                    <tr>
                        <td>E-mail*</td>
                        <td><input  class="registr" type="email" id="mmail" placeholder="В формате ****@****.**" pattern="^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" required title="e-mail на который мы сможем отправлять информацию о доставке и приближающихся акциях"></td>
                    </tr>
                    <tr>
                        <td>Логин*</td>
                        <td><input  class="registr" type="text" id="login"  placeholder="Соблюдаем анонимность"  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required title="Придумайте Имя которое будет отображаться на сайте"></td>
                    </tr>
                    <tr>
                        <td>Пароль*</td>
                        <td><input class="registr" type="password" id="password" placeholder="Не менее 6 символов"  pattern="^[a-zA-Z0-9_]{6,18}$" required title="Придумайте сложный пароль"></td>
                    </tr>
                    <tr>
                        <td>Подтвердите пароль*</td>
                        <td><input class="registr" type="password" id="ppassword" placeholder="Повторите пароль"  pattern="^[a-zA-Z0-9_]{6,18}$" required title="Придумайте сложный пароль"></td>
                    </tr>
                    <tr>
                        <td>Телефон</td>
                        <td><input class="registr" type="text" id="telefon" placeholder="8 xxx xxx xx xx"  pattern="" title="Укажите номер телефона, для получения уведомлений о доставке"></td>
                    </tr>
                    <tr>
                        <td>Дата рождения</td>
                        <td><input  class="registr" type="date" id="rdata" placeholder="дд.мм.гггг"  pattern="" title="Введите дату рождения для участия в некоторых акциях" ></td>
                    </tr>
                </table>
                <br>
                <input  type="button" id="rotpr" value="Зарегистрироваться">
            </form>
            </div>
                        <div class="reg">
                            <ol>
                                <li>Поля с звездочкой и выделенные синим являются обязательными для заполнения.</li>
                                <li>Зарегистрированные пользователи могут оставлять отзывы к книгам и оформлять заказы.</li>
                                <li>Укажите настоящий e-mail на него будет отправляться информация о заказе.</li>
                                <li>Пароль должен быть не менее 6 символов, латинских букв или цифр для больше безопастности персональных данных.</li>
                                <li>По желанию укажите телефон, на него будут отправляться смс-уведомления о заказе.</li>
                                <li>Мы гарантируем, что Ваши данные не будут использованы для рассылки нежелательной информации и ни при каких условиях не будут переданы третьим лицам.</li>
                            </ol>
                        </div>
reg;
             }
            ?>
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


