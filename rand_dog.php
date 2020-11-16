<?php

require "db.php";
require "includes/functions.php";


/*****************  НОВАЯ СОБАКА   ******************/
function rand_dog1($id){
  $data_dna['hr']=f_rand_col('HrHr','Hrhr','hrhr');
  $data_dna['ww']=f_rand_col('WW','Ww','ww');
  $data_dna['ff']=f_rand_col('FF','Ff','ff');
  $data_dna['bb']=f_rand_col('BB','Bb','bb');
  $data_dna['tt']=f_rand_col('TT','Tt','tt');
  $data_dna['mm']=f_rand_col('MM','Mm','mm');
 
   ('Hrhr'==$data_dna['hr'] ? $Hr='hr1' : $Hr='hr0');   //hr1 Hrhr - голая  // hr0 - hrhr  - пух
    ('ww'==$data_dna['ww'] ? $W='w0' : $W='w1');
    ('ff'==$data_dna['ff'] ? $F='f0' : $F='f1');
    ('bb'==$data_dna['bb'] ? $B='b0' : $B='b1');
    ('tt'==$data_dna['tt'] ? $T='t0' : $T='t1');
    ('mm'==$data_dna['mm'] ? $M='m0' : $M='m1');
    
        
    echo '<br>DNA^ ' . $dna=$Hr . $W . $F . $B . $T . $M;
         
    echo '<br>удача ' . $lucky= rand(1,100);
    echo '<br>скорость ' . $spd= rand(9,11);
    echo ' <br>уворот ' . $agl= rand(9,11);
    echo ' <br>обучение ' . $tch= rand(9,11);
    echo ' <br>прыжки ' . $jmp= rand(9,11);
    echo ' <br>нюх ' . $nuh= rand(9,11);
    echo ' <br>поиск ' . $fnd= rand(9,11);
    echo ' <br>мутации ' . $mut= rand(1,100);
    
    
    //$id = 1;
    // Загружаем объект с ID = 1
    $dog = R::load('randodna', $id);
    // Обращаемся к свойству объекта и назначаем ему новое значение
    $dog->hr = $data_dna['hr'];
    $dog->ww = $data_dna['ww'];
    $dog->ff = $data_dna['ff'];
    $dog->bb = $data_dna['bb'];
    $dog->tt = $data_dna['tt'];
    $dog->mm = $data_dna['mm'];
    $dog->lucky = $lucky;
    $dog->spd = $spd;
    $dog->agl = $agl;
    $dog->tch = $tch;
    $dog->jmp = $jmp;
    $dog->nuh = $nuh;
    $dog->fnd = $fnd;
    $dog->mut = $mut;
    $dog->dna = $dna;
    $dog->about = 'shop';

    // Сохраняем объект
    R::store($dog);
  
    return $dna;
    
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<title>Молодые родители</title>
</head>
<body>
<h1 align="center">Выбирите собак для племенного разведения...</h1>

<div style="background: #ed969e; text-align: center; height: 570px; width: 350px; float:left; margin-left: 180px;">
  <h2> самка: </h2>
	<?php 
	//echo "<br>" . f_bdika_sex();	//дает рандомный пол
/** Содаем рандомную собаку и выводим на экран **/	
  	$_SESSION['hr1']=$Hr=f_rand_col('HrHr','Hrhr','hrhr');
  	$_SESSION['ww1']=$W=f_rand_col('WW','Ww','ww');
  	$_SESSION['ff1']=$F=f_rand_col('FF','Ff','ff');
  	$_SESSION['bb1']=$B=f_rand_col('BB','Bb','bb');
  
  	$_SESSION['tt1']=$T=f_rand_col('TT','Tt','tt');
  	$_SESSION['mm1']=$M=f_rand_col('MM','Mm','mm');

      $all= "<br>".$Hr."<br>".$W."<br>".$F."<br>".$B."<br>".$T."<br>".$M;
    //echo $all;
     // $_SESSION['url']=$url=bdika_color ($Hr,$W,$F,$B,$T,$M);
      $_SESSION['url']=$url=rand_dog1('1');
      ?><br> <img src="<?php echo do_url($url)?>">
      
</div>
<div style="background: blue; text-align: center; height: 570px; width: 350px; float: right; margin-right: 180px; ">
    <h2> самец: </h2>
	<?php 
	//echo "<br>" . f_bdika_sex();	//дает рандомный пол
/** Содаем рандомную собаку и выводим на экран **/	
  	$_SESSION['hr2']=$Hr=f_rand_col('HrHr','Hrhr','hrhr');
    $_SESSION['ww2']=$W=f_rand_col('WW','Ww','ww');
    $_SESSION['ff2']=$F=f_rand_col('FF','Ff','ff');
    $_SESSION['bb2']=$B=f_rand_col('BB','Bb','bb');
  
    $_SESSION['tt2']=$T=f_rand_col('TT','Tt','tt');
    $_SESSION['mm2']=$M=f_rand_col('MM','Mm','mm');

      $all= "<br>".$Hr."<br>".$W."<br>".$F."<br>".$B."<br>".$T."<br>".$M;
    //echo $all;
     // $_SESSION['url2']=$url=bdika_color ($Hr,$W,$F,$B,$T,$M);
       $_SESSION['url2']=$url2=rand_dog1('2');
      ?><br> <img src="<?php echo do_url($url2)?>">

</div>
<form action="rand_dog.php" method="POST">
<button type="submit" class="knopka" name="rand">еще варианты</button>
</form>
<form action="blank_prist.php" method="POST">
<button type="submit" class="knopka" name="rand">отлично</button>
</form>
<form action="office.php" method="POST">
<button type="submit" class="knopka" name="back">назад</button>
</form>
</body>
</html>
