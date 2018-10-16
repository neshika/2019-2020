
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
if(isset($_POST['dog_id'])  ){ 
    echo $id=$_POST['dog_id'];
    echo '<br> вязок : ' . ret_Cell('litter',$id,'animals') . '<br>===';
    ////////////////////////
    echo $id_m=1;
    echo $id_d=6;
    echo '<br>function greate_dna';
    $dna_m= take_data_from(ret_dna($id_m),'randodna');
    debug($dna_m);
    $dna_d= take_data_from(ret_dna($id_d),'randodna');
    debug($dna_d);
    
    
    echo '<br>даем окрас!';
    $tt = breeding($dna_m['tt'],$dna_d['tt'],'TT','tt','Tt');
    $bb = breeding($dna_m['bb'],$dna_d['bb'],'BB','bb','Bb');
    $mm = breeding($dna_m['mm'],$dna_d['mm'],'MM','mm','Mm');
    $ww = breeding($dna_m['ww'],$dna_d['ww'],'WW','ww','Ww');
    $ff = breeding($dna_m['ff'],$dna_d['ff'],'FF','ff','Ff');
    

    
    echo '<br> hr_m' . $hr_on = $dna_m['hr'];
    echo '<br> hr_d' . $hr_ona = $dna_d['hr'];
            

    $hr=gol_pooh($hr_on,$hr_ona);
    
    ('Hrhr'==$hr ? $Hr='hr1' : $Hr='hr0');   //hr1 Hrhr - голая  // hr0 - hrhr  - пух
    ('ww'==$ww ? $W='w0' : $W='w1');
    ('ff'==$ff ? $F='f0' : $F='f1');
    ('bb'==$bb ? $B='b0' : $B='b1');
    ('tt'==$tt ? $T='t0' : $T='t1');
    ('mm'==$mm ? $M='m0' : $M='m1');

    echo '<br> DNA new ' . $dna=$Hr . $W . $F . $B . $T . $M;
    
    
    ////////////////////////////
    
    
    
    //echo '<br>' . do_dna($id);
    //dog_pic($id);
}   


?>

<form method="POST">
введите код собаки: <input type="text" name='dog_id'>
<input type="submit" name="ок" value="ok">
</form>
<?php


   
 require '/libs/down.php';
 ?>



