<?php
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');
?>

<div class="container-sm">

<?php    
        $print_dog = new PrintDog;
        $fam = new Family;
        $array = R::getAssoc('SELECT id, breeder FROM animals WHERE owner = :owner && status = :stat' ,
        [':owner' => 'shelter', ':stat' => '1']);
        
        foreach($array as $id => $value):?>
        
            <table class="table table-dark">
            <tbody>
            <tr>
                <td><?php  echo  $print_dog->picSex($id); 
                    echo 'имя: ' . $print_dog->retName($id); 
                    $print_dog->printDogPic($id,'150rem');
                    echo '<br>мать: ' . $print_dog->retName($fam->retMum($id));
                    echo '<br>отец: ' . $print_dog->retName($fam->retDad($id));
                    echo '<br>кол-во щенков: ' . $print_dog->retPuppy($id);
                    echo '<br>кол-во вязок: ' . $print_dog->retLitter($id);
                ?></td>
                <td><?php echo '<br>бывший заводчик: <br>' . $value;$print_dog->printStats($id);?></td>
            </tr>
            </tbody>
            </table>
        
<?php  endforeach;   

