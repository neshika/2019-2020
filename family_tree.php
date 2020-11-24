<?php
//require "/libs/up.php";
require $_SERVER['DOCUMENT_ROOT']."/libs/up.php";
      $id = $_GET['id']; 
      $data_dog=ret_Row($id, 'animals');
      $f_data= ret_f_data_by_dog($id);
 ?>
<style>
 /* Shadow box для дедушек бабушек и родителей*/
 #borderdog{
     border: 5px outset #D0D0D0;
     height: 175px;
     width: 175px;
     margin: 0 auto 0 auto;
     padding-left: 3%;
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
<?PHP
    
 
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
 <table class="iksweb">
    <caption class="text_effect"><?php echo $data_dog['name'] . $data_dog['kennel'];?></caption>
    <tbody>
        <tr>
            <td colspan="4"><div id="borderdog"><?php pic_link($id, 150);?> </div></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">Отец:<div id="borderdad">
                <?php echo "<br>" . ret_Cell('name', $f_data['dad'], 'animals') . ret_f_data($f_data['dad']);?></td>
            <td colspan="2" style="text-align: center">Мать:<div id="bordermum">
                <?php echo "<br>" . ret_Cell('name', $f_data['mum'], 'animals') . ret_f_data($f_data['mum']);?></td>
        </tr>
        <tr>
            <td style="text-align: center">Дедушка по линии отца:<div id="borderdad">
                <?php echo "<br>" . ret_Cell('name', $f_data['g1dad'], 'animals') . ret_f_data($f_data['g1dad']);?></td></td>
            <td style="text-align: center">Бабушка по линии отца:<div id="bordermum">
                <?php echo "<br>" . ret_Cell('name', $f_data['g1mum'], 'animals') . ret_f_data($f_data['g1mum']);?></td></td>
            <td style="text-align: center">Дедушка по линии матери:<div id="borderdad">
                 <?php echo "<br>" . ret_Cell('name', $f_data['g0dad'], 'animals') . ret_f_data($f_data['g0dad']);?></td></td>
            <td style="text-align: center">Бабушка по линии матери:<div id="bordermum">
                <?php echo "<br>" . ret_Cell('name', $f_data['g0mum'], 'animals') . ret_f_data($f_data['g0mum']);?></td></td>
        </tr>
    </tbody>
</table>
</div>

