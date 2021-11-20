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
<style>
    .test{
    box-shadow: 10px 10px 5px 0px rgba(212, 6, 6, 0.75);
-webkit-box-shadow: 10px 10px 5px 0px rgba(99, 3, 3, 0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(230, 31, 31, 0.75);
}
</style>
<div class="kennel">
    <div class="kennel-stroka">
    Питомник: <?php echo $kennel;?> // Владелец: <?php echo $owner;?>// Собак: <?php echo $count;?><br><?php $printdog->picCoins(); echo  $coins;?>
    </div>
    <!--создаем форму с кнопками по сортировке собак на виды-->
    <form method="POST" action="/kennel.php">
        <button type="submit" class="kennel-knopka" name="money" >кредит 50 000</button>
    </form>
    <div class="kennel-pol">
    <img src = "/pici/male.png" width="3%"><img src = "/pici/female.png" width="3%">
    </div>
    <!-- начало таблицы c указанием собак-->
<!--<table class="table222 table-bordered222 table-inverse222">-->
<?php    // $ken->printDogsByKennel($owner);
     $data = R::getCol('SELECT id FROM animals WHERE owner = :owner && status = 1' , [':owner' => $owner]);
     // debug($data);
foreach($data as $id): ?>
<span class="dogk">
    <span class="dogk-pic"><?php $printdog->picLink($id, '150px'); ?></span>
    <span class="dogk-name">имя</span>
    <span class="dogk-sex">пол</span>
    <span class="dogk-estrus">течка</span>
    <span class="dogk-litpup">щенки</span>
</span>
<?php endforeach;
?>
</div>
<div class="test">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, vel?</div>


           


  