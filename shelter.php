<?php
require_once(__DIR__ . '/libs/up.php');

        $array = R::getAssoc('SELECT id, breeder FROM animals WHERE owner = :owner && status = :name' ,
        [':owner' => 'shelter', ':name' => '1']);
        
        foreach($array as $key => $value) {
              echo "<br><hr><a>";
              dog_pic_size($key, 100); echo 'бывший заводчик: ' . $value;
              detalis($key);
        }    
        echo "<br>";
            
 