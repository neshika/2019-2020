<?php
require "/libs/up.php";
      $id = $_GET['id'];

      //$GLOBALS ['MYDOG'] = 12;
      //echo $MYDOG;

      $owner=ret_owner();
     // $var = find_where('dna',$id,'hr');
      //***************  вносим данные о состоянии энергии. Здоровья. счастья из базы************//
             $_SESSION['vitality']=find_where('animals',$id,'vitality');
             $_SESSION['hp']=find_where('animals',$id,'hp');;
             $_SESSION['joy']=find_where('animals',$id,'joy');;
      

/*<h1 style="font-size: 120%; font-family: Verdana, Arial, Helvetica, sans-serif; 
  color: #336">Заголовок</h1>*/
  if ( isset($_POST['newName']) ){ 
    if("" != $_POST['name1']){
       insert_data('animals',$id,'name',$_POST['name1']);
    }
    else {  // всплывающее окно, если имя не ввели
      ?> <script>alert ("ВВедите имя!");</script>   
      <?php
    }
  }
   if ( isset($_POST['add_age']) ){ 

    add_age($_SESSION['Dog']);
  }

?>

<!-- ******************** вывод питомника / имя собаки и картинка пола   выводит число счастья *****************-->    
          <div style="background: white; height: 80px; width: 1170px;"> <h3 align="center"><?php echo find_where('animals',$id,'name');?><?php echo ' "' . find_where('animals',$id,'kennel') . '" ';?> <?php echo ret_pic($id) . find_where('animals',$id,'lucky');?></h3>
           </div>
          
<!-- ******************** вывод доп меню собаки  заводчик / хозяин  *****************-->  
    <div style="background: yellow; height: 80px; width: 1170px;"> 
          <ul style="background: white; width: 45%; float: left;">
            <li>Заводчик: <?php echo find_where('animals',$id,'breeder');?></li>
            <li>Хозяин: <?php echo find_where('animals',$id,'owner');?></li>
            <li>Вязок: <?php echo find_where('animals', $id,'litter');?></li>

          </ul>
<!-- ******************** вывод доп меню собаки  вид \\ Дата рождения \\ окрас    *****************-->       
        <ul style="background: white; width: 40%; float: right;">
          <li>тип:  <?php echo  print_hr(find_where('dna',$id,'hr'));?></li>
          <li>возраст:  <?php echo ret_age($id);?></li>
          <li>Щенков: <?php echo find_where('animals', $id,'puppy');?></li>
       </ul>
    </div>
<!-- ******************** вывод картинки собаки по id  *****************-->
 

<table width="1170" cellpadding="3" cellspacing="0">
   <colgroup width="390">
  <tr>
      <td><input style="float: left;  margin-left: 30px;" id="button" name="knopka" type="submit" value="есть" class = "knopka">
          <input style="float: right;  margin-right: 30px;" id="button" name="knopka" type="submit" value="пить" class = "knopka">
          <br>
          <input style="float: left;  margin-left: 30px;" id="button" name="knopka" type="submit" value="чесать" class = "knopka">
          <input style="float: right;  margin-right: 30px;" id="button" name="knopka" type="submit" value="гулять" class = "knopka">
          <br>
          <input style="float: left;  margin-left: 30px;" id="button" name="knopka" type="submit" value="спать" class = "knopka">
          <input style="float: right;  margin-right: 30px;" id="button" name="knopka" type="submit" value="растить" class = "knopka">

        
    </td>

    <td style="border-width: 10px; text-align: center;"><img src="<?php echo from_id_to_url($id);?>">
        
    </td> 
    <td>
      <input id="button" name="knopka" type="submit" value="добавка" class = "knopka">
      <input id="button" name="knopka" type="submit" value="спа уход" class = "knopka">
      <input id="button" name="knopka" type="submit" value="ветеринар" class = "knopka">
      <input id="button" name="knopka" type="submit" value="тренировки" class = "knopka">
    </td>
  </tr>
</table>
<div style="margin-left: 450px""><table>
         <tr><td>Энергия</td><td><div class="meter"><span style="width: <?php echo$_SESSION['vitality'] . '%';?>"></span></div></td><td><?php echo$_SESSION['vitality'];?></td></tr>
            <tr><td>Здоровье</td><td><div class="meter"><span style="width: <?php echo$_SESSION['hp'] . '%';?>"></span></div></td><td><?php echo$_SESSION['hp'];?></td></tr>
            <tr><td>Счастье</td><td> <div class="meter"><span style="width: <?php echo$_SESSION['joy'] . '%';?>"></span></div></td><td><?php echo$_SESSION['joy'];?></td></tr>
      </table>
</div>


 
<!-- ******************** вывод Генетического кода собаки  скрытый текст*****************--> 
<!-- ******************** вывод статы собаки  *****************--> 

    <details>
      <summary>Генетический код</summary> 
          <?php print_all_d($id);  
                detalis($id);

          ?>
    </details>
<!-- ******************** вывод родителей *****************--> 
<p align="center">Родители:<br>
    
                                  МАМА ========================= ПАПА

<?php if(!isset($id_m)): ?>
<!-- левая колонка мамы-->    
    <div style="float: left; width: 35%;">
<!-- имя мамы--> 
        <details>
             <summary><?php echo find_where('animals',(find_where('animals',$id,'mum')),'name');?></summary> 
<!-- картинка мамы--> 
            <?php 
                  $id_m=find_where('animals',$id,'mum');
                  if ('нет данных'!==$id_m){
                       // $row = R::getRow( 'SELECT * FROM animals WHERE id = :id',
                       // [':id' => $id_m]);
                        //f_get_image($row['hr'],$row['ww'],$row['ff'],$row['bb'] ,$row['tt'],$row['mm']);
                        ?><img src="<?php echo from_id_to_url($id_m);?>">

<!-- ******************** вывод Генетического кода собаки  скрытый текст*****************--> 
              <details>
                    <summary>Генетический код</summary> 
                    <?php print_all_d($id_m); detalis($id_m);?>
              </details>


              <?php
                  }else
                    echo 'нет данных о предках'; ?>
        
           
       </details>
 <?php endif;    ?>
     </div class="content_mum">
<?php if(!isset($id_d)): ?>
<!-- правая колонка папы-->  
    <div style="float: right; width: 48%;">
<!-- имя папы-->  
      <details>
            <summary><?php echo find_where('animals',(find_where('animals',$id,'dad')),'name');?></summary> 
<!-- картинка папы-->  
              <?php 
                    $id_d=find_where('animals',$id,'dad');
                    if ('нет данных'!==$id_d){
                       // $row = R::getRow( 'SELECT * FROM animals WHERE id = :id',
                             // [':id' => $id_d]);
                        //f_get_image($row['hr'],$row['ww'],$row['ff'],$row['bb'] ,$row['tt'],$row['mm']);
                        ?><img src="<?php echo from_id_to_url($id_d);?>">

<!-- ******************** вывод Генетического кода собаки  скрытый текст*****************--> 
            <details>
                  <summary>Генетический код</summary> 
                  <?php print_all_d($id_d); detalis($id_d);?>
            </details>


                      <?php }else
                      echo 'нет данных о предках'; ?>


                  
        </details>
    
    </div>
    </p>
    </main>

<?php endif;

?></div>
    <!-- --------------------------------------  class="right_sidebar"  ----------------------------- -->   

<div class="right_sidebar" >
        <!-- ******************** кнопка вязка справа  *****************--> 

   <form method="POST">
      
      
      <a class="buttons" <?php echo '<a href="/lit&pup.php?id=' . $id . '">'?>Родословная</a>
      <a class="buttons" <?php echo '<a href="/kennel.php">'?>в питомник</a>
      <p>
    <p><strong>Сменить имя:</strong></p>
    <input type="text" name="name1">
    <input id="button" name="newName" type="submit" value="Новое имя" class = "knopka">

                           
    </form>
    <form method="POST" action = "/office.php">
      <div align="right"><input id="button" name="shelter" type="submit" value="отдать в приют" class = "knopka"></div>
      <?php $_SESSION['Dog'] = $id; ?>
  </form>
  <form method="POST">
      <div align="right"><input id="button" name="add_age" type="submit" value="растим" class = "knopka"></div>
      <?php $_SESSION['Dog'] = $id; ?>
  </form>
  <form method="POST" action = "/matting.php">
      <div align="right"><input id="button" name="knopka" type="submit" value="Вязка" class = "knopka">
      </div>
      <?php $_SESSION['Dog'] = $id; var_dump($_SESSION['Dog']); ?>
      
  </form>

</div class="right_sidebar" >

     
