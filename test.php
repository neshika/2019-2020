
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

////функция выводит картинку собаки по параметру сука / кобель
//function maleFemale($id,$param_sex){
//    $sex= ret_sex($id);
//    if(($param_sex==$sex) && ('0'== $sex)){
//        echo '<br> пол:'. $sex . '<hr>';
//        $name=ret_Cell('name', $id, 'animals');
//                 echo '<a href="/name.php?id=' . $id . '">' . "$name" . '  сука';  //$name - имя собаки // $test = id 
//                 print_partner($id);
//    }
//    if($param_sex==$sex && ('1'== $sex)){
//        echo '<br><hr>';
//        $name=ret_Cell('name', $id, 'animals');
//                 echo '<a href="/name.php?id=' . $id . '">' . "$name" . '  кобель';  //$name - имя собаки // $test = id 
//                 print_partner($id);
//    }
//    
//}
////выводит функция id собаки по параметру dna_id
//function ret_id_by_param($dna_id){  //4
//   return R::getcell('SELECT id FROM animals WHERE dna_id =:dna_id', array(':dna_id'=> $dna_id));
//    
//}
////печатает картинку партнера размера 100 пикселей
//function print_partner($test){
//    dog_pic_size($test, 100);
//    
//}
//
//function ret_dog_by_sex($owner,$param_sex){
//    $data[] =  ret_dogs_by_owner($owner);
//    // debug($data);
//     foreach($data as $item) {
//         foreach ($item as $id => $value) {
//             
//             echo '<br>/id ' . $id . '   dna_id ' . $value[dna_id];
//             maleFemale($id,$param_sex);
//             
//         }    
//     }
//}


if(isset($_POST['dog_id'])  ){ 
    echo $id=$_POST['dog_id'];
    echo '<br> Владелец: ' . $owner='Nesh';
    
    if(0== ret_sex($id)){
        ret_dog_by_sex($owner,0);
    }
    if(1== ret_sex($id)){
        ret_dog_by_sex($owner,1);
    }
    //echo '<br> выводим сук: ' .$param_sex='0';
     //echo '<br> выводим кобелей: ' .$param_sex='1';
    ret_dog_by_sex($owner,$param_sex);

     
     
     
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



