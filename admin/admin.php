<?php
require "settings.php";
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>Название</title>
    <meta charset="UTF-8">
       <!-- Стили -->
   <link rel="stylesheet" type="text/css" href="styleAdmin.css">
  </head>

  <body>
    <div class="wrapper">  <h1>Админка</h1>   
      <div class="side">
        <ul class="menu">
        <li class ="menu__list"><a href="">CRUD</a>
          <ul class ="menu__drop">
          
              <li ><a href="crud.php">Меняем базу</a></li>
              <li><a href="#">ПодПункт 2</a></li>
              <li><a href="#">ПодПункт 3</a></li>
              <li><a href="#">ПодПункт 4</a></li>
              <li><a href="#">ПодПункт 5</a></li>
          </ul>
        </li>
        <li><a href="#">Пункт 2</a></li>
        <li class ="menu__list"><a href="#">Получить данные</a>
          <ul class ="menu__drop">
            <li><a href="select_ken.php">по питомникам</a></li>
            <li><a href="select_breeds.php">по заводчикам</a></li>
            <li><a href="select_owns.php">по владельцам</a></li>
            <li><a href="select_dogs.php">по собакам</a></li>
            <li><a href="#">ПодПункт 5</a></li>
          </ul>
        </li>
          <li><a href="#">Пункт 4</a></li>
          <li class ="menu__list"><a href="#">Пункт 5</a>
          <ul class ="menu__drop">
            <li><a href="#">ПодПункт 1</a></li>
            <li><a href="#">ПодПункт 2</a></li>
            <li><a href="#">ПодПункт 3</a></li>
            <li><a href="#">ПодПункт 4</a></li>
            <li><a href="#">ПодПункт 5</a></li>
          </ul>
          </li>
          </br>
          <a class="buttons" href="/logout.php" >Выйти</a>
        </ul>
      </div>
    </div>
           <!-- Конец кода -->
    <!-- Подключаем скрипты -->
    <script src="http://yastatic.net/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/js.js"></script>
  </body>
</html>