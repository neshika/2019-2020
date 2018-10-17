<?php
require "/libs/up.php";

//*******************проверяем пол выбранной собаки, чтобы вывести противоположных партнеров
function bdika_pol($id_dog){  
  $owner = ret_cell('owner',$id_dog,'animals'); 
  //echo $owner;
      
        $dna_id= ret_dna($id_dog);  
        if ('0' === ret_cell('sex',$dna_id,'randodna')){

              $array [] = get_where('animals', 'кобель', $owner);
              
            }else{
            
              $array [] = get_where('animals', 'сука', $owner);
            }
        return $array;
}

//*******************проверяем возраст выбранной собаки, чтобы вывести в рамках
function bdika_age($id){    //$key
    $data_dog= take_data_from($id, 'animals');
    //echo ret_age($id);
    if ((13>$data_dog['age_id']) || (('сука' == $data_dog['sex']) && (58>=$data_dog['age_id']) && (13>$data_dog['age_id'])) ){ //кобель >6 мес. сука>6 мес, < 7лет
        return 0;
    }
    else return 1;
}

$id_dog= $_SESSION['Dog'];// выгружаем из памяти id собаки 


/***************************   рисуем собаку и ее характеристики*********************/
?>
<div style="background: white; text-align: center; height: 350px; width: 350px; margin-left: 180px;">
    <?php dog_pic($id_dog);?>
   
</div>
    <details>
        <summary> 
          <?php echo "Выбранная собака: " . find_where('animals',$id_dog,'name');?>
                
         </summary> 
                <?php detalis($id_dog);?>        
   </details>

<div style="background: yellow;">
<?php /********************проверяем пол выбранной собаки, чтобы вывести противоположных партнеров******************/
    
      $array = bdika_pol($id_dog);?>
      <h3 align="center"><?php echo 'Партнеры: ';?></h3><?php
   /***************************вывожу на экран возможных парнтеров в зависимости от пола*************************/ 
   debug($array);
   
   foreach($array as $item) {
              foreach ($item as $key => $value) {
               if(bdika_age($key)){ 
                    echo "<hr><br>";
                    echo '<br>основной: ' . $id_dog;
                    echo '<br>партнер: ' . $key;

                    if(1== bdika_age($key)){
                        $contact=ret_str_contact($key,$id_dog); 
                    }

                    if(!empty($contact))
                      echo $contact;


                    if(1== bdika_age($id_dog)){
                        $contact=ret_str_contact($id_dog,$key); 
                    }  

                    if(!empty($contact))
                       echo ' Партнер - ' . $contact;
    /**********************выводим на экран имя собаки как ссылку*********************************/
                   ?>
                    <form method="post" action="breedding.php">
                          <?php $_SESSION['para']=$id_dog;
                          echo '<a href="/name.php?id=' . $key . '">' . "$value";  //$value - имя собаки // $key = id 

                          ?>

                              <details>
                                  <summary> Статы и ГК</summary> 
                                      <?php  detalis($key); ?>
                              </details> 
                              </a> 
                          <div style="background: black; height: 150px; width: 150px;">
                              <div style="display:none;" class="radio_buttons">
                                    <input type="radio" NAME="ONONA" VALUE="<?=$key?>" class="knopka" checked />
                                    <label for="radio4">Вяжем</label>

                              </div>
                              <img src="<?php echo find_where('animals',$key,'url');?>" width="100%" >


                          </div>
                    <input type="submit" class="knopka" value="Вяжем">
                    </form> 
                    <?php

                }    //if(bdika_age($id))
              }   //foreach ($item as $key => $value) {
        } //foreach($array as $item) { 
        ?>
</div></div>
    <!-- --------------------------------------  class="right_sidebar"  ----------------------------- -->   

<div class="right_sidebar" >
        <!-- ******************** кнопка вязка справа  *****************--> 
          <a class="buttons" <?php echo '<a href="/name.php?id=' . $id_dog . '">'?>назад</a>

</div class="right_sidebar" >

