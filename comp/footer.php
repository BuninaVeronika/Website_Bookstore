 <footer id="footer">
 <!--Соц.сети -->
          <a href="https://vk.com/homebookssait" title="Вконтакте"><div id="vk"></div></a>
          <a href="#" title="Одноклассники"><div id="ok" ></div></a>
          <a href="#" title="Фейсбук"><div id="fb" title="Фейсбук"></div></a>
<?php
session_start();
if($_SESSION['login']=='admin'){
print<<<admin
          <a href="admin.php"><div id="boss" title="Административная панель">&#9813;</div></a>
admin;
}
?>
		  <!--Блок с отправкой письма-->
          <div id="mail" title="Обратная связь"></div>
          <!--<a href="#" title="Написать письмо"><span class="podtext">Написать нам</span></a>-->
		   <!--Блок с информацией о доставке-->
          <a href="infokom.php?dostavka" title="Информация о доставке"><div id="dostavka"></div></a>
          <a href="infokom.php?sakazu" title="Как заказать"><div id="zakazu"></div></a>
          <!--<a href="#" title="Информация о доставке"><span class="podtext">О доставке</span></a>-->
		   <!--Блок с контактными данными-->
          <div id="kontaktu"title="Контакты"></div>
          
          <!--<a href="#" title="Контакты"><span class="podtext">Контакты</span></a>-->
        </footer>

