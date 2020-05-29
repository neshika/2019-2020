<!DOCTYPE html> 
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<link rel="stylesheet" href="/css/radio.css" type="text/css" />
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="js/script.js"></script> 

<title>Cимулятор заводчика</title>
</head>
<body>
<div class="content">
     <a href=http://dog.ru/index.php>на главную</a>
     <br>
     <!-- начало кода -->
      
<?php 
//require "db.php";
require "includes/functions.php"; 

echo "Тестируем окрас: <br><hr>";

echo "пераметры родителей: ";
function ins($a,$char){//передаем маленькую
    if($a==$char){ //если маленькая
        return $char=$char . '0';
    }
 else {
        return $char=$char . '1';
    }
    

}
function bdika_col_ears($p,$d,$c,$a){
    echo '<br> bdika ears p=' . $p . ' d= ' . $d . ' c= ' . $c . ' a= ' . $a . '<br>';
    if($c=='cc'){
        ?><img src="<?php echo 'pici/ears/red.png';?>"><?php
         echo '<div style="color: red">'  . 'RED' . '</div>';
         
    }
    else{



            if($p=='pp' && $a=='aa'){
                ?><img src="<?php echo 'pici/ears/bl.png';?>"><?php
                echo '<div style="color: blue">'  . 'blue/green' . '</div>';
            }
            elseif($p=='pp' && $a!='aa'){
                ?><img src="<?php echo 'pici/ears/ye.png';?>"><?php
                echo '<div style="color: yellow">'  . 'yellow' . '</div>';
            }
            elseif($d=='dd'){
                ?><img src="<?php echo 'pici/ears/br.png';?>"><?php
                echo '<div style="color: brown">'  . 'brown' . '</div>';
            }
            else{
                ?><img src="<?php echo 'pici/ears/ba.png';?>"><?php
                echo '<div style="color: black">'  . 'black' . '</div>';;
            }
    }
    
}
function bdika_col_dog($a,$b,$c,$d,$p,$m){
    echo '<br><br>тут работает функция <br>';
    ?>
     <input type="submit" class="knopka" value="Обновить" onClick="window.location.reload( true );">
     
    <?php
    /*************** ЛОКУС с/с - это голубоглазый адьбинос - брак***********/
    /*************** ЛОКУС m(Мерле) - Летален***********/
    /*************** ЛОКУС P(цвет глаз) степень осветления***********/
    /*************** ЛОКУС D врожденная интенсивность пигментации ********/
    
    $m=ins($m, 'm');
    $m=$m[1];
    $co=ins($c, 'c');
    $co=$co[1];
    $a=ins($a, 'a');
    $a=$a[1];
    $b=ins($b, 'b');
    $b=$b[1];
    $p=ins($p, 'p');
    $p=$p[1];
    $d=ins($d, 'd');
    $d=$d[1];
    echo "<br>a=" .$a ." b=" .$b . " c=" .$co ." d=" .$d ." p=" .$p ." m=" .$m ."<br>";
    
    if($m){
        echo 'Летальный исход рождения Мерле';
        die;
    }
    if(!$co){
        // цветной текст
        echo '<div style="color: red">'  . '<br>рождение собаки с браком, т.к. Алель С рецессивна <br>' . '</div>';
        echo $pic_col="pici/agt/c0/c0.png";
        return $pic_col;
        die;
        
    }
    if($a && $b=='1'){
        echo $temp='ayb1c1' . 'd' . $d . 'p' . $p . 'm' . $m ;
    }
    if($a && $b=='0'){
        echo $temp='aybcc1' . 'd' . $d . 'p' . $p . 'm' . $m ;
    }
    if($a=='0' && $b=='0'){
        echo $temp='a' . $a . 'bcc1' . 'd' . $d . 'p' . $p . 'm' . $m;
    }
     if($a=='0' && $b=='1'){
        echo $temp='a' . $a . 'b1c1' . 'd' . $d . 'p' . $p . 'm' . $m;
    }
    if($temp=='ayb1c1d1p1m0'){
        echo '<br>RED';
    }
    if($temp=='aybcc1d1p1m0'){
        echo '<br>RED cinamon';
    }
    if($temp=='aybcc1d0p1m0'){
        echo '<br>Straw black ears';
    }
    if($temp=='aybcc1d0p0m0'){
        echo '<br>Straw red ears';
    }
    if($temp=='aybcc1d1p0m0'){
        echo '<br>Silver Fawn';
    }
    if($temp=='ayb1c1d0p1m0'){
        echo '<br>Straw black ears soloma';
    }
    if($temp=='ayb1c1d0p0m0'){
        echo '<br>Straw red ears soloma';
    }
    if($temp=='ayb1c1d1p0m0'){
        echo '<br>Fawn Red Sable';
    }
    //////////////////////////// black //////////////////
    if($temp=='a0b1c1d1p1m0'){
        echo '<br>black';
    }
    if($temp=='a0bcc1d1p1m0'){
        echo '<br>choco';
    }
    if($temp=='a0bcc1d0p1m0'){
        echo '<br>lilac';
    }
    if($temp=='a0bcc1d0p0m0'){
        echo '<br>apricot';
    }
    if($temp=='a0bcc1d1p0m0'){
        echo '<br>champan lemon';
    }
    if($temp=='a0b1c1d0p1m0'){
        echo '<br>blue';
    }
    if($temp=='a0b1c1d0p0m0'){
        echo '<br>blue fawn sable';
    }
    if($temp=='a0b1c1d1p0m0'){
        echo '<br>black sable';
    }
    ?><img src="<?php echo 'pici/agt/' . $temp . '.png';?>"><?php
    /*
    if($co){   //Если С/*
        
        if($a and $b and $c and $d and $p){ //красная линия
            echo "<br>Красная линия<br>";
            echo "<br>Красный<br>";
            echo $pic_col="pici/agt/ayb1c1d1p1.png";
            return $pic_col;
        }
        if(!$a){   //черная линия
            
            echo "<br>Черная линия<br>";
            if(!$b){    //choko,lilac,lemon
                if(!$p && $c and $d){ // p0 color Lemon bc
                    echo "<br>Лемон Шампанское<br>";
                    echo $pic_col="pici/agt/a0bcc1d1p0.png";
                    return $pic_col;

                }
                if($p && $c){  //
                    if($d){ //shoko
                        echo "<br>Шоколадный<br>";
                        echo $pic_col="pici/agt/a0bcc1d1p1.png";
                        return $pic_col;
                    }
                    if(!$d){    //lilac
                        echo "<br>Лилак<br>";
                        echo $pic_col="pici/agt/a0bcc1d0p1.png";
                        return $pic_col;

                    }
                }
            }
            if($b){// black, blue BB
                if($d && $c && $p){ //black
                        echo "<br>Черный<br>";
                        echo $pic_col="pici/agt/a0b1c1d1p1.png";
                        return $pic_col;
                    }
                    if(!$d && $c && $p){    //blue
                        echo "<br>Голубой<br>";
                        echo $pic_col="pici/agt/a0b1c1d0p1.png";
                        return $pic_col;

                    }
                if($d && !$p){ //black
                        echo "<br>светло Черный<br>";
                        //echo $pic_col="pici/agt/a0b1c1d1p1.png";
                        //return $pic_col;
                    }
                    if(!$d && !$p){    //blue
                        echo "<br>светло Голубой<br>";
                       // echo $pic_col="pici/agt/a0b1c1d0p1.png";
                        //return $pic_col;

                    }
                
            }
        }
        
    }
    //ins($a, 'a');
    //ins($b, 'b');
    //ins($c, 'c');
    //ins($d, 'd');
    //ins($p, 'p');
    //ins($p, 'p');
    
    //echo $new_url=ins($a, 'a') . ins($b, 'b') . ins($c, 'c') . ins($d, 'd') . ins($p, 'p') . "<br>";
    //return $new_url;
  */  
}

$aa_new = breeding('AA','aa','AA','aa','Aa');
echo "<br> aa_new: " . $aa_new;
$bb_new = breeding('Bb','bb','BB','bb','Bb');
echo "<br> bb_new: " . $bb_new;
$cc_new = breeding('Cc','cc','CC','cc','Cc');
echo "<br> cc_new: " . $cc_new;
$dd_new = breeding('Dd','dd','DD','dd','Dd');
echo "<br> dd_new: " . $dd_new;
$pp_new = breeding('Pp','pp','PP','pp','Pp');
echo "<br> pp_new: " . $pp_new;
$mm_new = breeding('m','mm','MM','mm','Mm');
echo "<br> mm_new: " . $mm_new;

bdika_col_ears($pp_new,$dd_new,$cc_new,$aa_new);

$pic_col=bdika_col_dog($aa_new[0],$bb_new[0],$cc_new[0],$dd_new[0],$pp_new[0],$mm_new[0]);

 ?><img src="<?php echo $pic_col;?>"><?php

?>
 
  
 </div>
    




