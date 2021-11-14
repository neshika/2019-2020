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
?>
<details>
  <summary></summary>
  <?php
  $puppy = new GreateNewDog();
  $rnd = new RandDog();
  $dna = new Dna();
  $tabl = new Tabl();
  $dog = new Dog();
  $prt = new PrintDog();
  $usr = new Users();
  $reg = new Registry; // Регистарционная книга

  $id_m = $_SESSION['id_m'];
  $id_d = $_SESSION['id_d'];
  $owner = $usr->retOwner();
  $count_puppy = 1; // количество рожденных щенков

  //************ Списываем средста за вязку 5 000 ***********//
  $puppy->buying($owner, 5000);

  /* возвращаем ДНК родителей*/
  $mum = $dna->retDna($dna->retDnaId($id_m));  //hr0w0f0b0t0m0
  $dad = $dna->retDna($dna->retDnaId($id_d)); //hr1w1f1b1t1m1

  /* выводим ДНК щенка на основе данных родителей */
  $puppy_dna = $puppy->DoDnaMumDad($mum, $dad); //hr1w1f1b1t1m1
  echo '<br>' . $puppy_dna; /* Не забыть внести DNA в таблицу Randodna*/

  //debug($dna_m = $dna->retAllDna($id_m));
  //debug($dna_d = $dna->retAllDna($id_d));
  //
  //echo '<br> spd =' . $new ->StatsFromMumDad($dna_m['spd'],$dna_d['spd'], $mutation, $plus);
  echo '<br>start ';
  $dna_id = $puppy->InsertDogDna($id_m,$id_d,$puppy_dna);
  echo ' two ';
  $id_new_dog = $puppy->insertDogAnimals($owner, $dna_id);

  // по умолчанию age_id 13, меняем на щенка 1
  $dog->setAge1($id_new_dog);
  $id_family_new_dpg = $puppy->insertNewPuppyFamilyTree($id_m, $id_d);
  $tabl->UpdateData('animals', $id_new_dog, 'breeder', $owner); //присваиваем заводчика новой собаке
  $puppy_dna = $rnd->doUrl($puppy_dna);
  $tabl->UpdateData('randodna', $dna_id, 'url', $puppy_dna); //вносим ДНК в таблицу РандоДНА
  $puppy_dna_mini = $rnd->DoUrlPuppy($puppy_dna);
  $tabl->UpdateData('randodna', $dna_id, 'url_puppy', $puppy_dna_mini); //вносим ДНК в таблицу РандоДНА
  $tabl->UpdateData('animals', $id_new_dog, 'family_id', $id_family_new_dpg); //вносим в таблицу сссылку на семью
  $tabl->UpdateData('animals', $id_new_dog, 'dna_id', $dna_id); //внести  ссылку на ДНА_ИД в таблицу Animals
  //$count_puppy = 1; // количество рожденных щенков
  echo ' $puppy->addPupAndLit($id_m, $id_d, $count_puppy) ';
  $puppy->addPupAndLit($id_m, $id_d, $count_puppy); //увеличить количество вязок и щенков

  // внести данные в регистарционную книгу registry
  $reg->insertReg($id_m, $id_d, $id_new_dog);

  $_SESSION['id_new'] = $id_new_dog;
    
  ?>
<summary></summary>
</details>
  <div class="wrapper2">
  <table width="100%" cellpadding="5" cellspacing="0">
    <tr><td id="col1"><h3>Щенок: <?php echo $id_new_dog;?></h3>
        <div align="center"><?php $prt->picLink($id_new_dog, 120);?></div>
        </td>
        <td id="col2"><h3>Характеристики: </h3>
                      <?php echo $prt->picSex($id_new_dog); $prt->printStats($id_new_dog);?>
        </td>
        <td id="buttom"><h3>Кнопки: </h3>
            <form method="POST" action="/kennel.php">
              <input type="submit" name="exit" value="В питомник" class="btn btn btn-dark">
            </form>
            <form method="POST" action="/office.php">
              <p>Имя щенка: 
              <textarea name="comment"></textarea></p>
              <input type="submit" value="Отправить" name="send" class="btn btn btn-dark">
            </form>
          </td>
    </tr>   
    <tr>
    <td id="lf"><h3>Мама: </h3> <?php echo $id_m; $prt->picLink($id_m, 75); $prt->printStats($id_m);?></td>
    <td id="rt"><h3>Папа: </h3> <?php echo $id_d; $prt->picLink($id_d, 75); $prt->printStats($id_d);?></td>
    </tr>
</table>
   
</div>

</body>
</html>




