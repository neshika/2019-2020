<?php

require_once(__DIR__ . '/libs/up.php');
//require_once(__DIR__ . '/includes/functions.php');
   $owner=ret_owner();
  // debug($_POST);
   $_SESSION['id_dna']=3;
   $_SESSION['id_dna2']=4;
   $_SESSION['id_dna3']=5;
   
    rand_dog1($_SESSION['id_dna']);
    rand_dog1($_SESSION['id_dna2']);
   rand_dog1($_SESSION['id_dna3']);
 ?>  
<style>
   #dogs {
        -webkit-box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35); 
        box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35);
        margin: 0 auto 0 auto;
        padding: 10px;
        border: 10px;
}
</style>
<div class="content">
    <form method="POST" action="buy.php">
    <h3 align="center">сумма в вашем кошельке: <?php print_item($owner,1); //  рисует деньги?></h3>
    <form method="POST" action="buy.php">
                    <button type="submit" class="knopka" name="money">кредит 50 000</button>
                </form>    
                <!--<form onsubmit="document.getElementById('money').disabled = true"><input id="submitButton" type="submit"/></form>-->
    </form>
</form>      
 <?php   
(isset($_POST['buy']) ? vip_buy() : No()); //если кнопку купить нажали делаем функцию vip_buy иначе делаем  функцию NO

 if(isset($_POST['money'])){
       echo 'мы в функции';
        put_money($owner, '50000');
      unset($_POST['money']);
       echo '<br>принтуем';
      //  var_dump((unset)$_POST);
        debug($_POST);
       // header("Location: ".$_SERVER["REQUEST_URI"]."");
        //header("Refresh:2;url={$_SERVER['REQUEST_URI']}");
       //echo ' <script type="text/javascript"> location.reload(); </script>';
        echo 'конец функции';
   }   

function No(){
    echo '<div class="content"><h1>нет собак в продаже!</h1></div>';
    ?><a class="buttons" href="/kennel.php" >в питомник</a><?php
    exit;
}
/*****************  НОВАЯ СОБАКА   ******************/
//возвращает hr0w1f0b1t1m0
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
    
      $dna=$Hr . $W . $F . $B . $T . $M;  
      $lucky= rand(1,100);
      $spd= rand(9,11);
      $agl= rand(9,11);
      $tch= rand(9,11);
      $jmp= rand(9,11);
      $nuh= rand(9,11);
      $fnd= rand(9,11);
      $mut= rand(1,100);
      $pol=Rand(0,1);
 /* echo '<br>DNA^ ' . $dna;
   echo '<br>удача ' . $lucky;
   echo '<br>скорость ' . $spd;
   echo ' <br>уворот ' . $agl;
   echo ' <br>обучение ' . $tch;
   echo ' <br>прыжки ' . $jmp;
   echo ' <br>нюх ' . $nuh;
   echo ' <br>поиск ' . $fnd;
   echo ' <br>мутации ' . $mut;
   echo 'pol: ' . $pol;*/
   
       
    //$id = 3;
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
    $dog->about='shop';
    $dog->sex = $pol;

    // Сохраняем объект
    R::store($dog);
  
    return $dna;
    
}
function dogPrice($id_dna){
       $arr = R::getRow( 'SELECT * FROM randodna WHERE id = :dna_id',
               [':dna_id' => $id_dna]);
        //debug($arr);

        if(1==$arr['sex']){
           // echo "кобель";
            if('Hrhr'==$arr['hr']){
                $cost=35000;
                if('bb'==$arr['bb']){
                $cost=$cost+20000;
                }
            }

            if('hrhr'==$arr['hr']){
                $cost=10000;
                if('bb'==$arr['bb']){
                $cost=$cost+25000;
                }
            }

        }
        if(0==$arr['sex']){
            //echo "сука";
            if('Hrhr'==$arr['hr']){ //голая
                $cost=45000;
                if('bb'==$arr['bb']){ //голая шоко
                $cost=$cost+30000;
                }
            }

            if('hrhr'==$arr['hr']){ //пуховая
                $cost=25000;
                if('bb'==$arr['bb']){ //пуховая шоко
                $cost=$cost+15000;
                }
            }

        }
         return $cost;  
}
function print_sex_pic($id_dna){
    $sex=ret_Cell('sex',$id_dna,'randodna');
    if(0==$sex){
	return '<img src = "/pic/female_mini.png">';
    }
else{
	return '<img src = "/pic/male_mini.png">';
    }
}

function vip_buy(){
?>         
    <table border="0" cellpadding="25" text-align="center">
        <caption><h1>Aктуальные предложения на сегодня</h1><br></caption>
    <td><div id="dogs">
    <?php 
   printUrlFromDna($_SESSION['id_dna'],50);
    ///////////// рисует пол собаки
    echo print_sex_pic($_SESSION['id_dna']);   
     //////////////////// проверка цены ........
     echo dogPrice($_SESSION['id_dna']);    
  
     ?><button type="submit" class="knopka" name="buy" >Купить</button></div></td>
           
        </td>
        <td><div id="dogs">  <?php 
            printUrlFromDna($_SESSION['id_dna2'],50);
            ///////////// рисует пол собаки
            echo print_sex_pic($_SESSION['id_dna2']);   
            //////////////////// проверка цены ........
            echo dogPrice($_SESSION['id_dna2']);   
            ?> <button type="submit" class="knopka" name="buy2" >Купить</button></div></td>
        <td><div id="dogs">  <?php 
            printUrlFromDna($_SESSION['id_dna3'],50);
            ///////////// рисует пол собаки
            echo print_sex_pic($_SESSION['id_dna3']);   
            //////////////////// проверка цены ........
            echo dogPrice($_SESSION['id_dna3']);   
            ?> <button type="submit" class="knopka" name="buy3" >Купить</button></div></td>
      </tr>
     

    </table>
</form>
<?php
}  //end of function vip_buy(){

