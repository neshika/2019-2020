<?php
//require "/libs/up.php";
require $_SERVER['DOCUMENT_ROOT']."/libs/up.php";
      $id = $_GET['id']; 
      $data_dog=ret_Row($id, 'animals');
      $f_data= ret_f_data_by_dog($id);
 ?>
<style>
    #demoObjectdad {
-webkit-box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, inset 5px 5px 15px -2px rgba(255,184,230,0), 5px 5px 15px -2px rgba(255,184,230,0); 
box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, inset 5px 5px 15px -2px rgba(255,184,230,0), 5px 5px 15px -2px rgba(255,184,230,0);
background: #050E77;
height: 150px;
width: 150px;
margin: 0 auto 0 auto;
padding-left: 5%;
padding-top: 1%;
}
#demoObjectmum {
-webkit-box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, inset 5px 5px 15px -2px rgba(255,184,230,0), 5px 5px 15px -2px rgba(255,184,230,0); 
box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, inset 5px 5px 15px -2px rgba(255,184,230,0), 5px 5px 15px -2px rgba(255,184,230,0);
background: #771275;
height: 150px;
width: 150px;
margin: 0 auto 0 auto;
padding-left: 5%;
padding-top: 1%;
}
body#tinymce {
background: #2B2A29
}
</style>
<?PHP
     
    
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

function ret_f_data($f_data){
    if(0!=$f_data){
        ?><a href="/name.php?id=<?php echo $f_data?>"><img src="<?php echo bdika_url($f_data);?>"width="60%"></a><?php
    }
    else{
        echo 'данные отсутствуют';
    }
    
}
    
     
?>


<div class="content">
    <form method="POST">
        <!--<a class="buttons" <?php //echo '<a href="/name.php?id=' . $id . '">'?>назад</a>-->
    </form>
     <?php echo "<br>Питомник: " . '"' . $data_dog['kennel'] . '"';
        echo "<br>Заводчик: " . $data_dog['breeder'] . " Владелец: " . $data_dog['owner'];
        /*печать данных*/
    echo '<br>Вязок: ' .  $data_dog['litter'] . ' щенков: ' .  $data_dog['puppy'];?>
            
<table class="iksweb">
	<tbody>
		<tr>
                    <td colspan="4"><div class="mydog"><?php echo  $data_dog['name']; pic_link($id, 150);?> </div></td>
		</tr>
		<tr>
			<td colspan="2">Отец:<div id="demoObjectdad"><?php echo ret_Cell('name', $f_data['dad'], 'animals'); ret_f_data($f_data['dad']);?></td>
			<td colspan="2">Мать:<div id="demoObjectmum"><?php echo ret_Cell('name', $f_data['mum'], 'animals'); ret_f_data($f_data['mum']);?></td>
		</tr>
		<tr>
			<td>Дедушка по линии отца:<div id="demoObjectdad"><?php echo ret_Cell('name', $f_data['g1dad'], 'animals'); ret_f_data($f_data['g1dad']);?></td></td>
			<td>Бабушка по линии отца:<div id="demoObjectmum"><?php echo ret_Cell('name', $f_data['g1mum'], 'animals'); ret_f_data($f_data['g1mum']);?></td></td>
			<td>Дедушка по линии матери:<div id="demoObjectdad"><?php echo ret_Cell('name', $f_data['g0dad'], 'animals'); ret_f_data($f_data['g0dad']);?></td></td>
			<td>Бабушка по линии матери:<div id="demoObjectmum"><?php echo ret_Cell('name', $f_data['g0mum'], 'animals'); ret_f_data($f_data['g0mum']);?></td></td>
		</tr>
	</tbody>
</table>
 </div>

