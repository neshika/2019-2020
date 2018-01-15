
<?php
require "db.php";
        //подключение файлов
        
        require "/html/header.html";
        require "/html/nav.html";
        require "/html/aside.html";
        require "includes/functions.php"; 
        
?>
<div class="content">

<?php



echo "Тестируем: <br>";

$id=3;

/*
echo $sex = rand_sex();
add_sex($id, $sex);
 echo '<br>' . take_sex($id);
 echo w_sex($id);
 
 
 $url=do_url(rand_dog1($id));
 ?>
 
 

     
 <?php

  $dna_id=find_where('animals',$id,'dna_id');
   $data_dog=take_data_from($dna_id,'rando_dna');
debug($data_dog);

?><img align="center" src = "<?php echo $data_dog['url'];?>" width="25%"><?php
*/
$data_dna= take_data_from(ret_dna($id), 'rando_dna');
debug($data_dna);

 require '/libs/down.php';
 ?>



