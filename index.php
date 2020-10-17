<?php

require "db.php";
require "includes/functions.php";?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Симулятор заводчика</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
</head>
<body>
    <div class="image_wrap">
        <p>
<?php  
/** Проверяет залогинен ли польззователь Если да, дает выбр действий **/
if ( isset($_SESSION['logged_user'])){
    $a=7;
echo "Привет, " . $_SESSION['logged_user']->login . '!  Чем займемся?';?>
             
    <a class="buttons" href="/office.php" >В офис</a>
    <a class="buttons" href="/logout.php" >Выйти</a>
<?php
}Else{/** Если пользователь не залогинен создает рандомную собаку по данными поля. **/
    echo "<h1> Добро пожаловать в симулятор заводчика<br>Вы владеете питомником?<br></h1>";
?>
    <img src="/Pic/def.png" class="def_pic"><br>
    <a class="buttons" href='/login.php'>Да</a>
    <a class="buttons" href='rand_dog.php '>НЕТ</a>
<?php }