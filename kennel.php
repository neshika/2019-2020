<?php
//подключение файлов
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');

$printdog = new PrintDog();
$dog = new Dog();
$owner=ret_owner(); //сохраняем название владельца в переменную из куки
$ken = new Kennels();
$kennel = $ken->retKennel($owner);
$count = $ken->retCountDog($owner);
$coins = $printdog->printMoney($owner);

   
?>
<div class="content">
    <p class="kennel"><br>Питомник: <?php echo $kennel;?> // Владелец: <?php echo $owner;?> // Количество собак: <?php echo $count;?><br><?php $printdog->picCoins(); echo  $coins;
       
?>
<!--создаем форму с кнопками по сортировке собак на виды-->
<form method="POST" action="/kennel.php">
    <button type="submit" class="knopka" name="money" >кредит 50 000</button>
</form>
</p>
<?php
  
/*картинка суки/кобели*/              
?><p class="kennel"><img src = "/pici/male.png" width="3%"><img src = "/pici/female.png" width="3%"></p>
<!-- начало таблицы я указанием собак-->
<!--<table class="table222 table-bordered222 table-inverse222">-->
<?php     $ken->printDogsByKennel($owner); 

/* если нажата кнопка "кредит 50 000" */
  if (isset ($_POST['money'])){
      $dog->putMoney($owner, 50000); 
      
    }    