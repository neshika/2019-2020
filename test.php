
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
?><img src="/pici/vip/test.png"><?php
?>
<form method="POST">
введите код собаки: <input type="text" name='dog_id'>
<input type="submit" name="ок" value="ok">
</form>
<?php

if(isset($_POST['dog_id'])  ){ 
    echo $id=$_POST['dog_id'];
     
   echo ret_hr($id); 
    
    
//  $id=$_POST['dog_id'];
//    echo do_url(do_dna($id));
//    dog_pic($id);
//     $family_data=ret_f_data_by_dog($id);
//     dog_pic($family_data['mum']);
//     echo ret_hr($family_data['mum']) . '// ' . ret_hr($family_data['dad']);
//     dog_pic($family_data['dad']);
   
}
 //$_POST['dog_id']=0;
 
/*
 * 
 *  //$data_dna=do_dna($_POST['dog_id']);
   //$url=do_url($data_dna);
   //insert_url($_POST['dog_id'],$url);
  
 * 
 * 
echo $sex = rand_sex();
add_sex($id, $sex);
 echo '<br>' . take_sex($id);
 echo w_sex($id);
 
 
 $url=do_url(rand_dog1($id));
 ?>
 
 

     
 <?php

  $dna_id=find_where('animals',$id,'dna_id');
   $data_dog=take_data_from($dna_id,'randodna');
debug($data_dog);

?><img align="center" src = "<?php echo $data_dog['url'];?>" width="25%"><?php

$data_dna= take_data_from(ret_dna($id), 'randodna');
debug($data_dna);

foreach ($data_dna as $key => $value) {
    echo '[' . $key . ']  : ' . $value . "<br />\n";
}
//$arr = array("one", "two", "three");
//reset($arr);
//while (list($key, $value) = each($arr)) {
//    echo "Ключ: $key; Значение: $value<br />\n";
//}
//
//foreach ($arr as $key => $value) {
//    echo "Ключ: $key; Значение: $value<br />\n";
//}
////Ключ: 0; Значение: one
////Ключ: 1; Значение: two
////Ключ: 2; Значение: three
////Ключ: 0; Значение: one
////Ключ: 1; Значение: two
////Ключ: 2; Значение: three

*/
 require '/libs/down.php';
 ?>



