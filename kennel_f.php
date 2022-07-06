<?php
//require_once(__DIR__ . '/libs/up.php');
//подключение библиотеки redBeanphp
require $_SERVER['DOCUMENT_ROOT']."/db.php";
//подключение шапки
require_once(__DIR__ . '/html/header.html');
require_once(__DIR__ . '/includes/func.php');
//включение ошибок//включение отчета по ошибкам
ini_set('display_errors',1);
error_reporting(E_ALL);

$printdog = new PrintDog();
$dog = new Dog();
$owner = $dog->retOwnerNoId(); //сохраняем название владельца в переменную из куки
$ken = new Kennels();
$kennel = $ken->retKennel($owner);
$count = $ken->retCountFemaleDog($owner);
$coins = $printdog->printMoney($owner);
?>
<div class="content">
    <div class="kennel-stroka">
    Питомник: <?php echo $kennel;?> // Владелец: <?php echo $owner;?>// Количество сук в питомнике: <?php echo $count;?><br><?php $printdog->picCoins(); echo  $coins;?>
    </div>
    <!--создаем форму с кнопками по сортировке собак на виды-->
    
    <div>
    <img src = "/pici/female.png" width="3%">
    </div>
    <?php    $ken->printFemalesByKennel($owner); ?>

</div>


