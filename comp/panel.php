<div class="mblock">
 <!--Блок с обратной связью-->
 <div class="otmena" title="Закрыть окно">&#215;</div>
                <h3>Ваше сообщение <br> администратору сайта</h3>
                <div class="message"></div>
                <form id="tmail" name="message">
                    <table>
                        <tr>
                            <td><input type="text"  id="tema" class="registr" title="Введите тему сообщения" placeholder="Тема письма:" pattern="" required></td>
                    </tr>
                        <tr>
                            <td><input type="email"  id="messagemail" class="registr" title="Введите ваш mail-адрес " placeholder="Ваша электронная почта:" pattern="" required></td>
                    </tr>
                        <tr>
                        <td><textarea  form="tmail" id="textmail" placeholder="Ваше сообщение:"  pattern="" required  pattern="" required></textarea></td>
                    </tr>
                </table>
                <br>
                
               <input class="butt" type="button" id="totpr" value="Отправить">
            </form>
</div>
<div class="ablock">
 <!--Блок с авторизацией-->
    <div class="otmena" title="Закрыть окно">&#215;</div>
 <?php 
             if(empty($_SESSION['login'])){
print<<<reg
                <h3>Авторизация</h3><br><br>
                
                <div class="tuta"></div>
            <form name="avt">
                <table>
                <tr>
                        <td><input class="registr" type="text" id="alogin" placeholder="Логин" title="Введите Имя которое вы указали при регистрации"></td>
                    </tr>
                    <tr>
                        <td><input  class="registr" type="password" id="apassword" placeholder="Пароль" title="Введите пароль который вы указали при регистрации"></td>
                    </tr>
                </table>
                <br>
                <input class="butt" type="button" id="aotpr" value="Войти">
                <a href="regavt.php" id="areg">Регистрация</a> 
               <br>
            </form>
reg;
             }
             else{
print<<<cabinet
                 <a href="kabinet.php"><img src="img/cova1.png">Личный кабинет</a>
cabinet;
             }
?>
</div>
<div class="kblock" title="Закрыть окно">
 <!--Блок с контактной информацией-->
    <div class="otmena">&#215;</div>
                <h3>Контактная информация</h3><br><br><br>
                <p>&#9743;+7 920 709 71 69</p><br>
                <address>&#10000; Курская обл.,г.Льгов,<br><br>ул.Л.Толстого,д.94</address><br>
               <a href="mailto:homebooks@gmail.com">&#9993; homebooks@gmail.com</a><br>
</div>
﻿

