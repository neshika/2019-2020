
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

 function test_ok(){
     $testok=Rand(1,100);
     if('13'!=$testok){
        echo 'newdog '  . $testok;
     }
     else{
         echo 'kennel ' . $testok; 
     }
 }
 test_ok();

 require '/libs/down.php';
 ?>



