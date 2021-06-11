<?php
//require "/libs/up.php";
require $_SERVER['DOCUMENT_ROOT']."/libs/up.php";
require_once(__DIR__ . '/includes/func.php');

      $id = $_GET['id']; 
      $dog = new Dog();
      $p_dog = new PrintDog();
      $family = new Family();
     
 ?>
<style>
 /* Shadow box для дедушек бабушек и родителей*/
 #borderdog{
     border: 5px outset #D0D0D0;
     height:175px;
     width:175px;
     margin: 0 auto 0 auto;
    padding-left: 1%;
    padding-top: 1%;
 }
 #bordermum{
     border: 5px outset #771275;
     height: 150px;
     width: 150px;
     margin: 0 auto 0 auto;
     padding-left: 1%;
     padding-top: 2%;
 }
 #borderdad{
     border: 5px outset #1B105B;
     height: 150px;
     width: 150px;
     margin: 0 auto 0 auto;
     padding-left: 1%;
     padding-top: 2%;
 }
</style>
<div class="content">
<p class="text_effect"><?php echo $dog->retName($id) . " " . "\"" . $dog->retKennel($id). "\"";?></p>
 <table class="iksweb" border="1">
    
    <tbody>
        <tr>
            <td colspan="4"><div id="borderdog"><?php $p_dog->picLink($id, 140);?></div></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">Отец: <?php echo $p_dog->retName($family->retDad($id));?><div id="borderdad">
                <?php echo $family->retPicMumDad($family->retDad($id));?></td>
            <td colspan="2" style="text-align: center">Мать: <?php echo $p_dog->retName($family->retMum($id));?><div id="bordermum">
                <?php echo $family->retPicMumDad($family->retMum($id));?></td>
        </tr>
        <tr>
            <td style="text-align: center">Дедушка по линии отца: <?php echo $p_dog->retName($family->retG1Dad($id));?><div id="borderdad">
                <?php echo $family->retPicMumDad($family->retG1Dad($id));?></td></td>
            <td style="text-align: center">Бабушка по линии отца: <?php echo $p_dog->retName($family->retG1Mum($id));?><div id="bordermum">
                <?php echo $family->retPicMumDad($family->retG1Mum($id));?></td></td>
            <td style="text-align: center">Дедушка по линии матери: <?php echo $p_dog->retName($family->retG0Dad($id));?><div id="borderdad">
                 <?php echo $family->retPicMumDad($family->retG0Dad($id));?></td></td>
            <td style="text-align: center">Бабушка по линии матери: <?php echo $p_dog->retName($family->retG0Mum($id));?><div id="bordermum">
                <?php echo $family->retPicMumDad($family->retG0Mum($id));?></td></td>
        </tr>
    </tbody>
</table>
</div>

