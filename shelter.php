<?php
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');
?>
<?php    
        $print_dog = new PrintDog;
        $fam = new Family;
        $array = R::getAssoc('SELECT id, breeder FROM animals WHERE owner = :owner && status = :stat' ,
        [':owner' => 'shelter', ':stat' => '1']);
        
        foreach($array as $id => $value):?>
             <div class="box-content h-auto w-25 p-4 border-4">
                <div class="grid grid-cols-2 gap-4">
                    <div> <?php  echo  $print_dog->picSex($id); 
                                echo 'имя: ' . $print_dog->retName($id); 
                                $print_dog->printDogPic($id,'150rem');
                                echo 'мать: ' . $print_dog->retName($fam->retMum($id));
                                echo '<br>отец: ' . $print_dog->retName($fam->retDad($id));
                                echo '<br>кол-во щенков: ' . $print_dog->retPuppy($id);
                                echo '<br>кол-во вязок: ' . $print_dog->retLitter($id);
                           ?>
                    </div>
                    <div><?php echo '<br>бывший заводчик: <br>' . $value;$print_dog->printStats($id);?></div>
                      
                </div>    
            </div>   
 <?php  endforeach;    

 