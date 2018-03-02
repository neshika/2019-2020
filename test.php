
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
  if(document.getElementById(idName).style.display=='none') {
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

?>
<form method="POST">
введите код собаки: <input type="text" name='dog_id'>
<input type="submit" name="ок" value="ok">
</form>
<?php

if(isset($_POST['dog_id'])  ){ 
    

    
echo '<a href="/name.php?id=' . $_POST['dog_id'] . '">';?>
                            						

<img src="<?php echo find_where('animals',$_POST['dog_id'],'url_puppy');?>" width="5%" float="left"></a>
    
<?php    
$_POST['dog_id']=0;
}
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

$data_dna= take_data_from(ret_dna($id), 'rando_dna');
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



