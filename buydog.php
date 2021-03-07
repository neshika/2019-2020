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
Class GreateNewDog{
    public function updateDNA($id) {
      $post = R :: getRow('SELECT * FROM `randodna` WHERE `id` = ? LIMIT 1', [$id]);
       // debug($post);
        //for each customer post create a new bean as a row/record          
            $bean = R::dispense('randodna');
             //assign column values 
             $bean->sex = $post['sex'];
             $bean->lucky = $post['lucky'];
             $bean->dna = $post['dna'];
             $bean->about = 'owner';
             $bean->spd = $post['spd'];
             $bean->agl = $post['agl'];
             $bean->tch = $post['tch'];
             $bean->jmp = $post['jmp'];
             $bean->nuh = $post['nuh'];
             $bean->fnd = $post['fnd'];
             $bean->mut = $post['mut'];
             //push row to array
            debug($bean);
       //store the whole array of beans at once               
        return R::store($bean);
    }
    public function updateShopOwner($id){
        $dog = R::load('randodna', $id);
        // Обращаемся к свойству объекта и назначаем ему новое значение
        $dog->about = 'owner';
        // Сохраняем объект
        R::store($dog);
    }
    
    public function insertDogAnimals($owner,$dna_id,$urldog){
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
     insert_url( $id_new_dog1,$urldog);
     insert_url_puppy($id_new_dog1);
    
     return $id_new_dog1;
 
    }
    public function insertDogFamilyTree($id){
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
        
    
} //end class GreateNewDog




if (isset($_POST['buy1'])){
   // echo 'нажали 1 buy <br>';
    $obj1 = new RandDog;
    
    $obj1->dogPic($obj1->doUrl(3));
    echo $obj1->retDna(3) . '<br>'; 
    echo $obj1->picSex(3);  //рисует пол собаки
    echo $obj1->dogPrice(3); // проверка цены ........
    
    $stat1 = new Dna;
    $stat1->printStats(3);
    
    $newDog1 = new GreateNewDog;
    echo $newDNA1 = $newDog1->updateDNA(3);
    
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
    
    $newDog2 = new GreateNewDog;
    echo $newDNA2 = $newDog2->updateDNA(4);
    

}elseif (isset($_POST['buy3'])){
   // echo 'нажали 3 buy';
    $obj3 = new RandDog;
    $obj3->dogPic($obj3->doUrl(5));
    echo $obj3->retDna(5) . '<br>'; 
    echo $obj3->picSex(5);  //рисует пол собаки
    echo $obj3->dogPrice(5); // проверка цены ........
    
    $stat3 = new Dna;
    $stat3->printStats(5);
    
    $newDog3 = new GreateNewDog;
    echo $newDNA3 = $newDog1->updateDNA(5);
}else
{
    echo 'не нажали';
} 
?>     

</p>  
