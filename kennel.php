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
$count = $ken->retCountDog($owner);
$coins = $printdog->printMoney($owner);

/* если нажата кнопка "кредит 50 000" */
if (isset ($_POST['money'])){
    $dog->putMoney($owner, 50000); 
    
  }    
?>
<div class="content">
    <div class="kennel-stroka">
    Питомник: <?php echo $kennel;?> // Владелец: <?php echo $owner;?>// Собак: <?php echo $count;?><br><?php $printdog->picCoins(); echo  $coins;?>
    </div>
    <!--создаем форму с кнопками по сортировке собак на виды-->
    <form method="POST" action="/kennel.php">
        <button type="submit" class="knopka" name="money" >кредит 50 000</button>
    </form>
    <div class="kennel-pol">
    <img src = "/pici/male.png" width="3%"><img src = "/pici/female.png" width="3%">
    </div>
    <!-- начало таблицы c указанием собак-->
<!--<table class="table222 table-bordered222 table-inverse222">-->
<?php    $ken->printDogsByKennel($owner); ?>

</div>



           


  