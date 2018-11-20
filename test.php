
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


if(isset($_POST['dog_id'])  ){ 
    echo $id=$_POST['dog_id'];
    echo '<br> Владелец: ' . $owner='Nesh';
    
    bdika_estrus($id);
}    
 ?>
<form method="POST">
введите код собаки: <input type="text" name='dog_id'>
<input type="submit" name="ок" value="ok">
</form>
<?php


   
 require '/libs/down.php';
 ?>



