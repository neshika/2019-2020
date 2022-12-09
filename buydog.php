<?php
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');
$owner = ret_owner();
?>
<style>
   #dogs {
      -webkit-box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0, 0, 0, 0.35);
      box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0, 0, 0, 0.35);
      margin: 0 auto 0 auto;
      padding: 10px;
      border: 10px;
      width: 800px;
      height: auto;
   }
</style>
<p class="content">
   <a class="buttons" href="/office.php">в офис</a>
<div id="dogs">
   <?php



   if (isset($_POST['buy1'])) {
      echo 'выбрали первую собаку <br>';
      $obj1 = new RandDog;
      echo $obj1->picSex(3); //рисует пол собаки
      $obj1->dogPic($obj1->retUrl(3)); //рисует собаку
      //$obj1->dogPic($obj1->retUrlPuppy(3)); //рисует собаку_щенка
      echo $obj1->retDna(3) . '<br>';  //пишет ГК
      echo $obj1->picCoins();
      echo $obj1->dogPrice(3); // проверка цены ........      

      /* создаем собаку Animals */
      $newDog1 = new GreateNewDog;
      $newDNA1 = $newDog1->updateDNA(3);  //копируем из dna 3 в новую

      if (isset($newDNA1)) {
         echo '<br> ДНК код первой собаки: ' . $newDNA1;
         $id_dog1 = $newDog1->insertDogAnimals($owner, $newDNA1); //вносим данные в animals
         $stat1 = new PrintDog();
         $stat1->printStats($id_dog1); // распечатали статы у собаки
         if (isset($id_dog1)) {
            echo '<br> ИД собаки: ' . $id_dog1;
            echo '<br> Внесена семья по номером: ' . $newDog1->insertDogFamilyTree($id_dog1); //вносим данные в familytree
         }
      }
   } elseif (isset($_POST['buy2'])) {
      echo 'выбрали вторую собаку <br>';
      $obj2 = new RandDog;
      echo $obj2->picSex(4); //рисует пол собаки
      $obj2->dogPic($obj2->retUrl(4)); //рисует собаку
      //$obj2->dogPic($obj2->retUrlPuppy(4)); //рисует собаку_щенка
      echo $obj2->retDna(4) . '<br>';  //пишет ГК
      echo $obj2->picCoins();
      echo $obj2->dogPrice(4); // проверка цены ........      


      /* создаем собаку Animals */
      $newDog2 = new GreateNewDog;
      $newDNA2 = $newDog2->updateDNA(4);  //копируем из dna 4 в новую
      if (isset($newDNA2)) {
         echo '<br> ДНК код второй собаки: ' . $newDNA2;
         $id_dog2 = $newDog2->insertDogAnimals($owner, $newDNA2); //вносим данные в animals
         $stat2 = new PrintDog();
         $stat2->printStats($id_dog2);   // распечатали статы у собаки
         if (isset($id_dog2)) {
            echo '<br> ИД собаки: ' . $id_dog2;
            echo '<br> Внесена семья по номером: ' . $newDog2->insertDogFamilyTree($id_dog2); //вносим данные в familytree
         }
      }
   } elseif (isset($_POST['buy3'])) {
      echo 'выбрали третью собаку <br>';
      $obj3 = new RandDog;
      echo $obj3->picSex(5); //рисует пол собаки
      $obj3->dogPic($obj3->retUrl(5)); //рисует собаку
      //$obj3->dogPic($obj3->retUrlPuppy(5)); //рисует собаку_щенка
      echo $obj3->retDna(5) . '<br>';  //пишет ГК
      echo $obj3->picCoins();
      echo $obj3->dogPrice(5); // проверка цены ........      


      /* создаем собаку Animals */
      $newDog3 = new GreateNewDog;

      $newDNA3 = $newDog3->updateDNA(5);  //копируем из dna 5 в новую
      if (isset($newDog3)) {
         echo '<br> ДНК код третьей собаки: ' . $newDNA3;
         $id_dog3 = $newDog3->insertDogAnimals($owner, $newDNA3); //вносим данные в animals
         $stat3 = new PrintDog();
         $stat3->printStats($id_dog3);   // распечатали статы у собаки
         if (isset($id_dog3)) {
            echo '<br> ИД собаки: ' . $id_dog3;
            echo '<br> Внесена семья по номером: ' . $newDog3->insertDogFamilyTree($id_dog3); //вносим данные в familytree
         }
      }
   } else {
      echo 'Не выбрали ни одной собаки для покупки';
   }
   ?>

   </p>