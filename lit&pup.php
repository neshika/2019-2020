<?php
require "/libs/up.php";
      $id = $_GET['id']; 
      $data_dog=ret_Row($id, 'animals');
     
?>
    <p class="kennel"><?php echo "<br>Питомник: " . '"' . $data_dog['kennel'] . '"';
    echo "<br>Заводчик: " . $data_dog['breeder'];
    echo "<br>Владелец: " . $data_dog['owner'];

/*печать данных*/
  echo '<br>Вязок: ' .  $data_dog['litter'];
  echo '<br>Щенков: ' .  $data_dog['puppy'] . '<br>';

 ?>
    <h1 align="center">Помет "В"</h1>
    <table width="100%" align="center" cellpadding="0" cellspacing="0" class="main_text" border="0">
     <tbody><tr>
        <td width="40%" align="center" valign="top">
            отец<br>
            <strong><?php echo 'имя';?></strong>
            <br><font color="#569ff6"><strong>оценка отлично</strong></font>
        </td>
  
        <td width="20%" align="center" valign="middle">
        </td>
  
        <td width="40%" align="center" valign="top">
            мать<br>
            <strong>Статус Империал Жун Ле Солей</strong>
            <br><font color="#569ff6"><strong>Чемпион Белоруссии, Чемпион НКП,<br>
             </strong></font>
        </td>
     </tr> 

    <tr><td colspan="3" height="10"></td></tr>

    <tr>
        <td width="40%" align="center" valign="top">
            <img class="photo" src="photos/sam1.jpg" width="300" height="250" alt="Олегро Катрин Итс Май Лайф" title="Олегро Катрин Итс Май Лайф">
        </td>
  
        <td width="20%" align="center" valign="middle">
        <br><br>
        <strong>дата рождения</strong>
        <br>
        02.01.2018
        <br><br>
          голый кобель<br>
          пуховый кобель<br>
          пуховая сука
          <br><br>
  <noindex><a rel="nofollow" class="main_link" href="http://www.ccddb.com/ru/database/pedigree.php?f=10685&amp;m=5719&amp;knee=4" target="_blank">родословная щенков</a></noindex>
  <br>
  </td>
  
  <td width="40%" align="center" valign="top">
    <img class="photo" src="photos/zhulya1.jpg" width="300" height="250" alt="Статус Империал Жун Ле Солей" title="Статус Империал Жун Ле Солей">
  </td>
 </tr>
</tbody></table>
    
    <h2 align="center">Щенки из этого помета</h2>
    
    <table width="90%" align="center" cellpadding="0" cellspacing="0" class="main_text" border="0">
     <tbody><tr>
          <td width="33%" align="center" valign="top">
          <a class="main_link" href="pometW18-1.php"><img class="photo" src="puppies/pomet57-W/1.jpg" width="250" height="167" alt="Щенки китайской хохлатой собаки" title="Щенки китайской хохлатой собаки"></a>
          </td>
    
          <td width="33%" align="center" valign="top">
          <a class="main_link" href="pometW18-2.php"><img class="photo" src="puppies/pomet57-W/2.jpg" width="250" height="167" alt="Щенки китайской хохлатой" title="Щенки китайской хохлатой"></a>
          </td>
  
      <td width="33%" align="center" valign="top">
      <a class="main_link" href="pometW18-3.php"><img class="photo" src="puppies/pomet57-W/3.jpg" width="250" height="167" alt="Щенки китайской хохлатой" title="Щенки китайской хохлатой"></a>
      </td>
    </tr>
 
 <tr>
  <td width="33%" align="center" valign="top">
  голый кобель<br>
  <strong>Статус Империал Винд оф Чейндж</strong><br>
  <font size="-2">свободен</font><br>
  <a class="main_link" href="pometW18-1.php">личная страница</a>
  </td>
  
  <td width="33%" align="center" valign="top">
 пуховый кобель<br>
  <strong>Статус Империал Вайт Энви</strong><br>
  <font size="-2">вл. Лисичкина Анастасия (Ханты-Мансийск)</font><br>
  <a class="main_link" href="pometW18-2.php">личная страница</a>
  </td>
  
  <td width="33%" align="center" valign="top">
пуховая сука<br>
  <strong>Статус Империал Вандерфул Голд</strong><br>
  <font size="-2">вл. Латаш Анна (Апатиты)</font><br>
  <a class="main_link" href="pometW18-3.php">личная страница</a>
  </td>
 </tr>
 </tbody></table>
    
   
      </div>
</div>
    <!-- --------------------------------------  class="right_sidebar"  ----------------------------- -->   

<div class="right_sidebar" >
        <!-- ******************** кнопка вязка справа  *****************--> 

   <form method="POST">
      
     
      <a class="buttons" <?php echo '<a href="/name.php?id=' . $id . '">'?>назад</a>
                           
    </form>

</div class="right_sidebar" >

   
