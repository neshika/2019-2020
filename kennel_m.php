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
<p class="kennel"><br>Питомник: <?php echo $kennel;?> // Владелец: <?php echo $owner;?>
    // Количество собак: <?php echo $count;?>
    // <img src = "/pici/coins_mini.png"><?php echo  $coins;
    
/****************************** Если нажата кнопка СУКИ выводим на экран всех собак, пренадлежащих владельцу*/
?><p class="left"><img src = "/pici/male.png" alt = "мальчики" width="3%"></p>
<?php  
  $ken->printMalesByKennel($owner);