
<?php
require "/libs/up.php";
//подключение файлов
//require "/html/header.html";
//require "/includes/functions.php"; 
        
?> <div class="content">
<?php echo "Тестируем: <br>";


$data[] = ret_dogs_by_owner(ret_owner());

//debug($data);
?><table class="table">
    <tr>
<?php foreach ($data as $item) {
    $count=0;
    foreach ($item as $key => $value) {
        if('4'>$count){
           ?> <td><?php
           $boo = maleFemale($key,'1');
           
           $count=$count+1; 
           echo $boo;
        }
        else{
            ?></td></tr><?php $count=1; ?> <td><?php maleFemale($key,'1'); echo "count" . $count;
        }
    }
    
}
echo "==count" . $count;
            
?></div>     









