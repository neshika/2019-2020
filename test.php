
<?php
require "db.php";
        //подключение файлов
        
        require "/html/header.html";
        require "/html/nav.html";
        require "/html/aside.html";
        require "includes/functions.php"; 
        
?>
<div class="content">

    
    
    <script>
function change(idName) {
  if(document.getElementById(idName).style.display==='none') {
    document.getElementById(idName).style.display = '';
  } else {
    document.getElementById(idName).style.display = 'none';
  }
  return false;
}
</script>
<div style="display:none" id="test">Hi World! </div>
<a href="#" onclick="change('test')">Change</a>

<?php

echo "Тестируем: <br>";

function ret_dogs_by_owner($owner){
    return R::getAssoc ('SELECT name,dna_id FROM animals WHERE owner =:owner and status=1', array(':owner' => $owner));
}
function ret_id_by_param($dna_id){
   return R::getcell('SELECT id FROM animals WHERE dna_id =:dna_id', array(':dna_id'=> $dna_id));
    
}
function print_partner($test){
    dog_pic_size($test, 100);
    
}

function ret_dna_dogs($owner){
    $data[] =  ret_dogs_by_owner($owner);
     debug($data);
     foreach($data as $item) {
         foreach ($item as $key => $value) {
             
             //echo '/key ' . $key . 'val' . $value;
             //$data_2[] = R::getAssoc ('SELECT id FROM randodna WHERE sex=:sex and id=:id', array(':sex' => $sex, ':id' => $value));
             $sex_param_id=ret_Cell('sex', $value, randodna);
             if('0'==$sex_param_id){
               // echo '<br> пол собаки суки' . $value . ': ' . $sex_param_id ;
             
                $test=ret_id_by_param($value);
                //debug($test);
                echo '<br><hr>';
                
                $name=ret_Cell('name', $test, 'animals');
                 echo '<a href="/name.php?id=' . $test . '">' . "$name" . '  сука';  //$name - имя собаки // $test = id 
                 print_partner($test);
             }
             else{
                //echo '<br> пол собаки кобель' . $value . ': ' . $sex_param_id ;
             
                $test=ret_id_by_param($value);
                
                echo '<br><hr>';
                //debug($test);
                $name=ret_Cell('name', $test, 'animals');
                 echo '<a href="/name.php?id=' . $test . '">' . "$name" . '  кобель';  //$value - имя собаки // $key = id 
                 print_partner($test);
             }
             
         }    
     }
}


if(isset($_POST['dog_id'])  ){ 
    echo $id=$_POST['dog_id'];
    $owner='Nesh';
    
    $sex='0';
    ret_dna_dogs($owner);

     
     
     
    ////////////////////////////
    
    
    
    //echo '<br>' . do_dna($id);
    //dog_pic($id);
}   


?>

<form method="POST">
введите код собаки: <input type="text" name='dog_id'>
<input type="submit" name="ок" value="ok">
</form>
<?php


   
 require '/libs/down.php';
 ?>



