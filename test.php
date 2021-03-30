<?php
//подключение файлов
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');
?>
<style>
    .border{
        -webkit-box-shadow: 5px 5px 15px 5px #000000, 5px 5px 15px 5px #000000; 
        box-shadow: 5px 5px 15px 5px #000000, 5px 5px 15px 5px #000000;
    }
    .border2{
        padding: 5px;
        margin: 25px;
        -webkit-box-shadow: 5px 5px 15px 5px #727272; 
        box-shadow: 5px 5px 15px 5px #727272;
        border-radius: 15px;
        
    }
     .border_pic{
        padding: 10px;
        margin: 25px;
        width: 300px;
        height: 300px;
        -webkit-box-shadow: 5px 5px 15px 5px #727272; 
        box-shadow: 5px 5px 15px 5px #727272;
        border-radius: 15px;
    .border_text{
        padding: 5px;
        margin: 25px;
        /*width: 800px;*/
        height: 300px;
        -webkit-box-shadow: 5px 5px 15px 5px #727272; 
        box-shadow: 5px 5px 15px 5px #727272;
        border-radius: 15px;
        
    }
</style>    
<?php    
  if(!isset($_GET['id'])){
     $id = $_SESSION['Dog'];
     $owner = $_SESSION['owner'];
    }
    else{
        $id = $_GET['id'];
        $owner = $_GET['owner'];
    }
    
    
    
?>
<div class="border2">
<?php
   // echo $id . '<br>' . $owner;
    $dog = new PrintDog();
    $new_dog = new GreateNewDog();
    $dna = new Dna();
    
    $dna_id=$dog->retDnaId($id);
    
    
?>
    <table>
        <tr>
            <td><div class="border_pic">
        <?php $dog->picLink($id, 300);?>
    </div></td>
            <td> <div class="border_text">
                    Кличка: <strong> <?php echo $dog->retName($id) . " " . $dog->retKennel($id);?></strong>
                    <hr>
           <li>Заводчик: <?php echo $dog->retBreeder($id);?></li>    
           <li>Хозяин: <?php echo $owner;?></li>
           <li>Происхождение: <?php echo $dog->retOrignText($id);?></li>
           <li>Оценка: <?php echo $dog->retMarkText($id) ?></li>
            <hr>
           <li>ID собаки: <?php echo $id;?></li>
            <li>Генетический код: <?php echo $dna->retDna($dna_id);?></li>
           <li>пол: <?php echo $dna->retSexText($dna_id);?></li>
           <li>Возраст: <?php echo $dog->retAgeText($id);?></li>
           <li>Вязок: <?php echo $dog->retLitter($id);?></li>
           <li>Щенков: <?php echo $dog->retPuppy($id);?></li>
           <li>Состояние: // <?php echo $dog->retEstrus($id);?></li>
           
    </div></td>
        </tr>
    </table>
    
   
<!-- <table class="table table-dark table-hover">
 <thead>
 
  </thead>
  <tbody>
    <tr>
      <td  height="300" width="300"><?php //$dog->picLink($id, 300);?></td>
      <td><li>Генетический код: </li>
           <li>Владелец: <?php //echo $owner;?></li>
           <li>ID собаки: <?php //echo $id;?></li></td>
      <td>@mdo</td>
    </tr>
    <tr>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>




