<?php

require "db.php";
require "includes/func.php";


/*****************  НОВАЯ СОБАКА   ******************/
function rand_dog1($id){

  $dog = new RandDog;
  if($id == 1){
    $sex = 0; //сука
  }
  else $sex = 1; //кобель
          
    echo '<br>DNA^ ' . $dna=$dog->randDna();
         
    echo '<br>удача ' . $lucky= rand(1,100);
    echo '<br>скорость ' . $spd= rand(9,11);
    echo ' <br>уворот ' . $agl= rand(9,11);
    echo ' <br>обучение ' . $tch= rand(9,11);
    echo ' <br>прыжки ' . $jmp= rand(9,11);
    echo ' <br>нюх ' . $nuh= rand(9,11);
    echo ' <br>поиск ' . $fnd= rand(9,11);
    echo ' <br>мутации ' . $mut= rand(1,100);
    
     
   $url = $dog->doUrl($dna);  
   $url_puppy = $dog->doUrlPuppy($url); 
    //$id = 1;
    // Загружаем объект с ID = 1
    $dog = R::load('randodna', $id);
    // Обращаемся к свойству объекта и назначаем ему новое значение
    $dog->sex = $sex;
    $dog->lucky = $lucky;
    $dog->spd = $spd;
    $dog->agl = $agl;
    $dog->tch = $tch;
    $dog->jmp = $jmp;
    $dog->nuh = $nuh;
    $dog->fnd = $fnd;
    $dog->mut = $mut;
    $dog->type = RandChar();
    $dog->dna = $dna;
    $dog->about = 'start';
    
    //создаем картинки собак
    
      $dog->url = $url;
      $dog->url_puppy = $url_puppy;
        // Сохраняем объект
        R::store($dog);
  
    return $url;
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
	   
      $_SESSION['url']=$url=rand_dog1('1');
      $_SESSION['url_pici']=$url;
      ?>
  <br> <img src="<?php echo $_SESSION['url_pici']?>">
 
</div>
<div style="background: blue; text-align: center; height: 570px; width: 350px; float: right; margin-right: 180px; ">
    <h2> самец: </h2>
	<?php 
	    $_SESSION['url2']=$url2=rand_dog1('2');
     $_SESSION['url2_pici']=$url2;
      ?><br> <img src="<?php echo $_SESSION['url2_pici']?>">
</div>
<form action="rand_dog.php" method="POST">
<button type="submit" class="knopka" name="rand">еще варианты</button>
</form>
<form action="blank_prist.php" method="POST">
<button type="submit" class="knopka" name="rand">отлично</button>
</form>
<form action="index.php" method="POST">
<button type="submit" class="knopka" name="back">назад</button>
</form>
</body>
</html>
