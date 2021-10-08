
<?php 
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');


//$mum = 'hr0w0f0b0t0m0';
//$dad = 'hr1w1f1b1t1m1';
//$puppy_dna = DoDnaMumDad($mum, $dad);
//echo '<br>' . $puppy_dna; /* Не забыть внести DNA в таблицу Randodna*/
//
$new = new GreateNewDog();
$dna = new Dna();
$tabl = new Tabl();
$dog = new Dog();
//
$id_m = 1;
$id_d = 3;
$count_puppy = 1; // количество рожденных щенков
$owner = 'Nesh';
//
//
////debug($dna_m = $dna->retAllDna($id_m));
////debug($dna_d = $dna->retAllDna($id_d));
////
////echo '<br> spd =' . $new ->StatsFromMumDad($dna_m['spd'],$dna_d['spd'], $mutation, $plus);
//
//$dna_id = $new->InsertDogDna($id_m,$id_d,$puppy_dna);
//$id_new_dog = $new->insertDogAnimals($owner, $dna_id);
//$id_family_new_dpg = $new->insertNewPuppyFamilyTree($id_m, $id_d);
////$tabl->UpdateData('animals', $id_new_dog, 'breeder', $owner); //присваиваем заводчика новой собаке
////$tabl->UpdateData('randodna', $dna_id, 'url', $puppy_dna); //вносим ДНК в таблицу РандоДНА
////$tabl->UpdateData('animals', $id_new_dog, 'family_id', $id_family_new_dpg); //вносим в таблицу сссылку на семью
////$tabl->UpdateData('animals', $id_new_dog, 'dna_id', $dna_id); //внести  ссылку на ДНА_ИД в таблицу Animals
////$count_puppy = 1; // количество рожденных щенков
////$new->addPupAndLit($id_m, $id_d, $count_puppy); //увеличить количество вязок и щенков

//$itm = new OwnerItems();
//$item = 1;
//$owner = 'Дима';
//$money = 5000;
////echo ' now ' .$now = $itm->retItemByOwner($item, $owner);
////echo ' delet ' . $itm->removeItemByOwner($item, $owner, $count);
////echo ' now soff ' .$now = $itm->retItemByOwner($item, $owner);
////$new->buying($owner, $money);

echo $mum = $dna->retDna($dna->retDnaId($id_m));