<?php
require "db.php";
//require "includes/functions.php";?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Симулятор заводчика</title>
<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />-->
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
</head>
<body>
    <div class="imagewrap" style="text-align: center;">
        
        <p>
<?php  
/** Проверяет залогинен ли польззователь Если да, дает выбор действий **/
if( isset($_SESSION['logged_user'])):
    echo "Привет, " . $_SESSION['logged_user']['login'] . '!  Чем займемся?';
          
    if('admin' == $_SESSION['logged_user']['login'] ):
        echo '<br><a class="buttons" href="/admin/admin.php">В админку</a>';
    else:
        echo '<br><a class="buttons" href="/office.php" >В офис</a>';
    endif;?>
    <a class="buttons" href="/logout.php" >Выйти</a><?php
else:/** Если пользователь не залогинен создает рандомную собаку по данными поля. **/
    echo "<h1> Добро пожаловать в симулятор заводчика<br>Вы владеете питомником?<br></h1>";?>
    <img src="/pici/def.png">
    <br><br>
    <a class="buttons" href='/login.php'> Да </a>  
    <a class="buttons" href='rand_dog.php '> Нет </a><?php
endif;
