<?php
require "/libs/up.php";
      $id = $_GET['id']; 
      $owner=ret_owner();
      debug($id);



      $kennel = R::getCell('SELECT kennel FROM animals WHERE owner = :owner',
        [':owner' => $owner]);
        ?> <p class="kennel"><?php echo "<br>Питомник: " . '"' . $kennel . '"';
        echo "<br>Владелец: " . $_SESSION['logged_user']->login;

/*получаем количество вязок и количество щенков*/
        $lit=find_where('animals', $id,'litter');
        $pup=find_where('animals', $id,'puppy');
        $dad=find_where('animals', $id,'dad');
        $mum=find_where('animals', $id,'mum');
        $G1dad=find_where('animals', $id,'g1dad');
        $G1mum=find_where('animals', $id,'g1mum');
        $G0dad=find_where('animals', $id,'g0dad');
        $G0mum=find_where('animals', $id,'g0mum');



/*печать данных*/
  echo '<br>Вязок: ' . $lit;
  echo '<br>Щенков: ' . $pup;


 ?>
<p class="dog">
    <div id="mydog"><?php echo find_where('animals', $id,'name');?> 
    <img src="<?php echo print_pic($id);?>" width="13%"></div>
</p>
<p class="dad_mum">
    <div id="dad"><?php echo 'Отец<br>'; echo find_where('animals', $dad,'name'); ?>
      <img src="<?php echo find_where('animals', $dad,'url');?>" width="25%">
    </div>
    <div id="mum"><?php echo 'Мать<br>'; echo find_where('animals', $mum,'name'); ?>
      <img src="<?php echo find_where('animals', $mum,'url');?>" width="25%">
    </div>
</p>
<p class="GG_dad_mum">
    <div id="one"><?php echo 'Дедушка по линии отца<br>'; echo find_where('animals', $G1dad,'name'); ?>
      <img src="<?php echo find_where('animals', $G1dad,'url');?>" width="45%">
    </div>
    <div id="two"><?php echo 'Бабушка по линии отца<br>';echo find_where('animals', $G1mum,'name'); ?>
      <img src="<?php echo find_where('animals', $G1mum,'url');?>" width="45%">
    </div>
    <div id="three"><?php echo 'Дедушка по линии матери<br>'; echo find_where('animals', $G0dad,'name');?>
      <img src="<?php echo find_where('animals', $G0dad,'url');?>" width="45%">
    </div>
    <div id="four"><?php echo 'Бабушка по линии матери<br>';echo find_where('animals', $G0mum,'name'); ?>
      <img src="<?php echo find_where('animals', $G0mum,'url');?>" width="45%">
    </div>
</p>


</div>
    <!-- --------------------------------------  class="right_sidebar"  ----------------------------- -->   

<div class="right_sidebar" >
        <!-- ******************** кнопка вязка справа  *****************--> 

   <form method="POST">
      
     
      <a class="buttons" <?php echo '<a href="/name.php?id=' . $id . '">'?>назад</a>
                           
    </form>

</div class="right_sidebar" >

   
