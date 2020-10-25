<?php
//require "/libs/up.php";
require $_SERVER['DOCUMENT_ROOT']."/libs/up.php";
      $id = $_GET['id']; 
      $data_dog=ret_Row($id, 'animals');
      $f_data= ret_f_data_by_dog($id);
      
function retu_dad($f_data){
         $dad=ret_Cell('name', $f_data['dad'], 'animals');
      if($dad){
          ?><img src="<?php echo ret_Cell('url', $f_data['dad'], 'animals');?>" width="10%"><?php
          return $dad;
      }
      else{
          return 'данные отсутствуют';
      }
}
     

function retu_mam($f_data){
         $mum=ret_Cell('name', $f_data['mum'], 'animals');
      if($mum){
          ?><img src="<?php echo ret_Cell('url', $f_data['mum'], 'animals');?>" width="10%"><?php
          return $mum;
      }
      else{
          return 'данные отсутствуют';
      }
}

function retu_g1dad($f_data){
         $g1dad=ret_Cell('name', $f_data['g1dad'], 'animals');
      if($g1dad){
          ?><img src="<?php echo ret_Cell('url', $f_data['g1dad'], 'animals');?>" width="25%"><?php
          return $g1dad;
      }
      else{
          return 'данные отсутствуют';
      }
}
function retu_g1mum($f_data){
         $g1mum=ret_Cell('name', $f_data['g1mum'], 'animals');
      if($g1mum){
          ?><img src="<?php echo ret_Cell('url', $f_data['g1mum'], 'animals');?>" width="25%"><?php
          return $g1mum;
      }
      else{
          return 'данные отсутствуют';
      }
}
function retu_g0dad($f_data){
         $g0dad=ret_Cell('name', $f_data['g0dad'], 'animals');
      if($g0dad){
          ?><img src="<?php echo ret_Cell('url', $f_data['g0dad'], 'animals');?>" width="25%"><?php
          return $g0dad;
      }
      else{
          return 'данные отсутствуют';
      }
}
function retu_g0mum($f_data){
         $g0mum=ret_Cell('name', $f_data['g0mum'], 'animals');
      if($g0mum){
          ?><img src="<?php echo ret_Cell('url', $f_data['g0mum'], 'animals');?>" width="25%"><?php
          return $g0mum;
      }
      else{
          return 'данные отсутствуют';
      }
}
    
     
?>

<div class="content">
    <form method="POST">
       <a class="buttons" <?php echo '<a href="/name.php?id=' . $id . '">'?>назад</a>
    </form>
     <?php echo "<br>Питомник: " . '"' . $data_dog['kennel'] . '"';
        echo "<br>Заводчик: " . $data_dog['breeder'] . " Владелец: " . $data_dog['owner'];
        /*печать данных*/
    echo '<br>Вязок: ' .  $data_dog['litter'] . ' щенков: ' .  $data_dog['puppy'];?>
   <div class="mydog"><?php echo  $data_dog['name'];?> 
    <img src="<?php echo bdika_url($id);?>" width="10%"></div>
<p class="dad_mum">
<div id="dad">Отец:<br> <?php echo retu_dad($f_data);?></div>
<div id="mum">Мать:<br> <?php echo retu_mam($f_data);?></div>
</p>
<p class="GG_dad_mum">
<div id="one">Дедушка по линии отца:<br> <?php echo retu_g1dad($f_data);?></div>
<div id="two">Бабушка по линии отца:<br><?php echo retu_g1mum($f_data);?> </div>
<div id="three">Дедушка по линии матери:<br><?php echo retu_g0dad($f_data);?></div>
<div id="four">Бабушка по линии матери:<br><?php echo retu_g0mum($f_data);?></div>
</p>
</div>

