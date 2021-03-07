<?php
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');
  $owner=ret_owner();
 
 
?>
  <style>
   #dogs {
        -webkit-box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35); 
        box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35);
        margin: 0 auto 0 auto;
        padding: 10px;
        border: 10px;
        width: 400px;
        height: auto;
}
</style>
<p class="content">
<a class="buttons" href="/office.php" >в офис</a>
<div id="dogs">
<?php 
/**
 * @param id собаки из animals
 * @return 0 вносит данные в две таблицы
 * @todo проверитm работу
 */
function insertDogFamilyTree($id){
    $dog22 = R::dispense('family');
        foreach ($dog22 as $key) {
            if($key!='id'){
                $dog22->$key=0;  //вносим всех предков по нулям
            }
        }      
    $family_id2 = R::store($dog22);  
    
    /* созраняем данные о семье в таблице animals*/
    $book = R::load('animals', $id);
    $book->family_id = $family_id2;
    R::store($book);
 }
function insertDogAnimals($owner,$dna_id,$ulrdog){
    $kennel=R::getCell('SELECT `name_k` FROM `kennels` WHERE `owner_k` = ? LIMIT 1', [$owner]);
    $dogs = R::dispense('animals');
     $dogs->name='Без имени';
     $dogs->race='КХС';
     $dogs->origin='1';
     $dogs->breeder='Бесты-первый лучший';
     $dogs->owner=$owner;
     $dogs->kennel=$kennel;
     $dogs->age_id=10;
     $dogs->dna_id=$dna_id;
     $dogs->family_id=0;
     $dogs->mark_id=1; //отлично оценка
     $dogs->birth=$date->format('d.m.Y');
     
     /*сохраняем id новой собаки*/
     $id_new_dog1 = R::store($dogs);
     
     /*вносим в табл URL*/
     insert_url( $id_new_dog1,$ulrdog);
     insert_url_puppy($id_new_dog1);
    
     return $id_new_dog1;
 
}

function updateShopOwner($id){
    $book = R::load('randodna', $id);
    // Обращаемся к свойству объекта и назначаем ему новое значение
    $book->about = 'owner';
    // Сохраняем объект
    R::store($book);
}
if (isset($_POST['buy1'])){
   // echo 'нажали 1 buy <br>';
    $obj1 = new RandDog;
    
    $obj1->dogPic($obj1->doUrl(3));
  //  echo $obj1->retDna(3) . '<br>'; 
    echo $obj1->picSex(3);  //рисует пол собаки
    echo $obj1->dogPrice(3); // проверка цены ........
    
    $stat1 = new Dna;
    $stat1->printStats(3);
    
}
elseif (isset($_POST['buy2'])){
    //echo 'нажали 2 buy';
    $obj2 = new RandDog;
    $obj2->dogPic($obj2->doUrl(4));
    echo $obj2->retDna(4) . '<br>'; 
    echo $obj2->picSex(4);  //рисует пол собаки
    echo $obj2->dogPrice(4); // проверка цены ........
    
    $stat2 = new Dna;
    $stat2->printStats(4);
    

}elseif (isset($_POST['buy3'])){
   // echo 'нажали 3 buy';
    $obj3 = new RandDog;
    $obj3->dogPic($obj3->doUrl(5));
    echo $obj3->retDna(5) . '<br>'; 
    echo $obj3->picSex(5);  //рисует пол собаки
    echo $obj3->dogPrice(5); // проверка цены ........
    
    $stat3 = new Dna;
    $stat3->printStats(5);
}else
{
    echo 'не нажали';
} 
?>     

</p>  
