<?php

require_once(__DIR__ . '/libs/up.php');
//require_once(__DIR__ . '/includes/functions.php');
   $owner=ret_owner();
  debug($_POST);
?>
  <style>
   #dogs {
        -webkit-box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35); 
        box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35);
        margin: 0 auto 0 auto;
        padding: 10px;
        border: 10px;
        width: 300px;
        height: 300px;
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
    echo 'нажали 1 buy';
     
    printUrlFromDna($_SESSION['ulrdog1']);
    ///////////// рисует пол собаки
    echo $_SESSION['dog1_sex'];   
     //////////////////// проверка цены ........
     echo $_SESSION['dog1_price'];    
     

}
elseif (isset($_POST['buy2'])){
    echo 'нажали 2 buy';
    printUrlFromDna($_SESSION['ulrdog2']);
    ///////////// рисует пол собаки
    echo $_SESSION['dog2_sex'];     
     //////////////////// проверка цены ........
     echo $_SESSION['dog2_price'];  

}elseif (isset($_POST['buy3'])){
    echo 'нажали 3 buy';
     printUrlFromDna($_SESSION['ulrdog3']);
    ///////////// рисует пол собаки
    echo $_SESSION['dog3_sex'];     
     //////////////////// проверка цены ........
     echo $_SESSION['dog3_price'];  
}else
{
    echo 'не нажали';
} 
?>        
</p>    
