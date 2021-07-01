<?php
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');
        $print_dog = new PrintDog;
        $array = R::getAssoc('SELECT id, breeder FROM animals WHERE owner = :owner && status = :name' ,
        [':owner' => 'shelter', ':name' => '1']);
        
        foreach($array as $id => $value) {
              echo "<br><hr><a>";
              $print_dog->picLink($id, 100); echo 'бывший заводчик: ' . $value;
              $print_dog->detalis($id);
        }    
                 
 