<!DOCTYPE html> 
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
<link rel="stylesheet" href="/css/styleagt.css" type="text/css" />
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="js/script.js"></script> 

<title>Cимулятор заводчика</title>
</head>
<marquee behavior="alternate" direction="right" bgcolor="#5E3561">Американский голый терьер</marquee>  
<?php require __DIR__ . "/html/navagt.html";// вставляем шапку АГТ?>

<body bgcolor="#22252F" body text="#C6BCD1">
    
     <br>
     <!-- начало кода -->
     <style>
      table {
        table-layout: fixed;
        text-align: left;
        border-collapse: separate;
        border-spacing: 5px;
        background: #CABDCF;
        border-radius: 20px;
        }
        .table1{
            background: #21252E;
            border-radius: 20px;
            vertical-align:top;            
        }
        
        th{
        font-size: 18px;
        padding: 10px;
        }
        td{
        background: #21252E;
        padding: 10px;
        }
       
        caption{
            caption-side: top;
        }
     </style>     

<?php 
//require "db.php";
require "includes/functions.php"; 

 echo "Parents: <br><hr>";?>
   
<?php
 $a_mum= f_rand_col('AA', 'Aa', 'aa');
 $b_mum= f_rand_col('BB', 'Bb', 'bb');
 $c_mum= f_rand_col('CC', 'CC', 'CC');
$d_mum= f_rand_col('DD', 'Dd', 'dd');
$p_mum= f_rand_col('PP', 'Pp', 'pp');
$m_mum= f_rand_col('mm', 'mm', 'mm');
$a_dad= f_rand_col('AA', 'Aa', 'aa');
 $b_dad= f_rand_col('BB', 'Bb', 'bb');
 $c_dad= f_rand_col('CC', 'CC', 'CC');
 $d_dad= f_rand_col('DD', 'Dd', 'dd');
 $p_dad= f_rand_col('PP', 'Pp', 'pp');
 $m_dad= f_rand_col('mm', 'mm', 'mm');
                                    
                                    
 ?>
      <input type="submit" class="knopka2" value="Обновить" onClick="window.location.reload( true );">
      <br>
      
      
<table>
    <tr>
        <td>
          
            <table class="table1" cellpadding="2">1
                <tr>
                    <td valign="top" height="300" width="300">фото папы:<br>
                        <?php $put2= 'pici/agt/' . bdika_col_dog($a_dad[0],$b_dad[0],$c_dad[0],$d_dad[0],$p_dad[0],$m_dad[0]). '.png';
                         ?><img src="<?php echo $put2;?>">
                    </td>
                    <td valign="top" rowspan="2">данные собаки левый столбец<br><br>
                        <li>Генетический код: <?php echo $a_dad . $b_dad . $c_dad . $d_dad . $p_dad . $m_dad;?></li>
                        <li>ОКРАС: <?php echo bdika_col_dog2($a_dad[0],$b_dad[0],$c_dad[0],$d_dad[0],$p_dad[0],$m_dad[0]);?></li>
                        <li>Цвет глаз: <?php echo print_col_ears_ru($p_dad,$d_dad,$c_dad,$a_dad);?></li>
                        <li>Пол: кабель</li>
                    </td>
                </tr>
                <tr>
                    <td>ГК: <?php echo do_gencode($a_dad[0],$b_dad[0],$c_dad[0],$d_dad[0],$p_dad[0],$m_dad[0]);?>
                        <br>Цве глаз: <br><?php echo print_col_ears($p_dad,$d_dad,$c_dad,$a_dad) .print_col_ears($p_dad,$d_dad,$c_dad,$a_dad);?>
                </td>
                </tr>
            </table>
    </td>
    <td>
        <table class="table1" cellpadding="2">2 
          
      <tr>
        <td valign="top" height="300" width="300">фото мамы: <br>
             <?php $put= 'pici/agt/' . bdika_col_dog($a_mum[0],$b_mum[0],$c_mum[0],$d_mum[0],$p_mum[0],$m_mum[0]) . '.png';
             ?><img src="<?php echo $put;?>">
        </td>
        <td valign="top" rowspan="2">данные собаки правый столбец<br><br>
            <li>Генетический код: <?php echo $a_mum . $b_mum . $c_mum . $d_mum . $p_mum . $m_mum;?></li>
            <li>ОКРАС: <?php echo bdika_col_dog2($a_mum[0],$b_mum[0],$c_mum[0],$d_mum[0],$p_mum[0],$m_mum[0]);?></li>
            <li>Цвет глаз: <?php echo print_col_ears_ru($p_mum,$d_mum,$c_mum,$a_mum);?></li>
            <li>Пол: сука</li>
        </td>
      </tr>
      <tr>
        <td>ГК: <?php echo do_gencode($a_mum[0],$b_mum[0],$c_mum[0],$d_mum[0],$p_mum[0],$m_mum[0]);?><br>
           Цвет глаз: <br><?php echo print_col_ears($p_mum,$d_mum,$c_mum,$a_mum) . print_col_ears($p_mum,$d_mum,$c_mum,$a_mum);?>
        </td> 
      </tr>
         
      </table>
            
            
        </td>
    </tr>
    <tr>
        <td colspan="2">3
            <table width="100%" >
                <tbody>
            <caption>ДЕТИ :</caption>
	
            <tr>
			<td>фото1</td>
                        <td rowspan="2">данные щенка 1<br>
                            <?php    
                            /* @var $aa_new для ввода переменной локуса А */
                            $aa_new1 = breeding($a_mum,$a_dad,'AA','aa','Aa');
                            echo "<br> aa_new: " . $aa_new1;
                            $bb_new1 = breeding($b_mum,$b_dad,'BB','bb','Bb');
                            echo "<br> bb_new: " . $bb_new1;
                            $cc_new1 = breeding($c_mum,$c_dad,'CC','cc','Cc');
                            echo "<br> cc_new: " . $cc_new1;
                            $dd_new1 = breeding($d_mum,$d_dad,'DD','dd','Dd');
                            echo "<br> dd_new: " . $dd_new1;
                            $pp_new1 = breeding($p_mum,$p_dad,'PP','pp','Pp');
                            echo "<br> pp_new: " . $pp_new1;
                            $mm_new1 = breeding($m_mum,$m_dad,'MM','mm','Mm');
                            echo "<br> mm_new: " . $mm_new1;?>
                            <li>Пол: <?php rando_sex();?></li>
                        </td>
			<td>фото2</td>
                        <td rowspan="2">данные щенка 2<br>
                            <?php    
                            /* @var $aa_new для ввода переменной локуса А */
                            $aa_new2 = breeding($a_mum,$a_dad,'AA','aa','Aa');
                            echo "<br> aa_new: " . $aa_new2;
                            $bb_new2 = breeding($b_mum,$b_dad,'BB','bb','Bb');
                            echo "<br> bb_new: " . $bb_new2;
                            $cc_new2 = breeding($c_mum,$c_dad,'CC','cc','Cc');
                            echo "<br> cc_new: " . $cc_new2;
                            $dd_new2 = breeding($d_mum,$d_dad,'DD','dd','Dd');
                            echo "<br> dd_new: " . $dd_new2;
                            $pp_new2 = breeding($p_mum,$p_dad,'PP','pp','Pp');
                            echo "<br> pp_new: " . $pp_new2;
                            $mm_new2 = breeding($m_mum,$m_dad,'MM','mm','Mm');
                            echo "<br> mm_new: " . $mm_new2;?>
                            <li>Пол: <?php rando_sex();?></li>
                        </td>
			<td>фото 3</td>
                        <td rowspan="2">данные щенка 3<br>
                            <?php    
                            /* @var $aa_new для ввода переменной локуса А */
                            $aa_new3 = breeding($a_mum,$a_dad,'AA','aa','Aa');
                            echo "<br> aa_new: " . $aa_new3;
                            $bb_new3 = breeding($b_mum,$b_dad,'BB','bb','Bb');
                            echo "<br> bb_new: " . $bb_new3;
                            $cc_new3 = breeding($c_mum,$c_dad,'CC','cc','Cc');
                            echo "<br> cc_new: " . $cc_new3;
                            $dd_new3 = breeding($d_mum,$d_dad,'DD','dd','Dd');
                            echo "<br> dd_new: " . $dd_new3;
                            $pp_new3 = breeding($p_mum,$p_dad,'PP','pp','Pp');
                            echo "<br> pp_new: " . $pp_new3;
                            $mm_new3 = breeding($m_mum,$m_dad,'MM','mm','Mm');
                            echo "<br> mm_new: " . $mm_new3;?>
                            <li>Пол: <?php rando_sex();?></li>
                        </td>
		</tr>
		<tr>
                    <td><li>Цвет кожи щенка 1: <br></li>
                       <?php  echo print_col_dog($aa_new1[0],$bb_new1[0],$cc_new1[0],$dd_new1[0],$pp_new1[0],$mm_new1[0]);?>
                        
                        <li>Цвет глаз: <br></li>
                         <?php $col_d=bdika_col_ears($p_dad,$d_dad,$c_dad,$a_dad);
                               $col_m=bdika_col_ears($p_mum,$d_mum,$c_mum,$a_mum);
                               $img=print_col_ears_mumdad($col_m,$col_d);
                               ?><img src="<?php echo $img;?>"><img src="<?php echo $img;?>">
                      
                    </td>
                    <td><li>Цвет кожи щенка 2: <br></li>
                       <?php  echo print_col_dog($aa_new2[0],$bb_new2[0],$cc_new2[0],$dd_new2[0],$pp_new2[0],$mm_new2[0]);?>
                        
                        <li>Цвет глаз: <br></li>
                         <?php $img=print_col_ears_mumdad($col_m,$col_d);
                               ?><img src="<?php echo $img;?>"><img src="<?php echo $img;?>">
                    </td>
                    <td><li>Цвет кожи щенка 3: <br></li>
                       <?php  echo print_col_dog($aa_new3[0],$bb_new3[0],$cc_new3[0],$dd_new3[0],$pp_new3[0],$mm_new3[0]);?>
                        
                        <li>Цвет глаз: <br></li>
                         <?php $img=print_col_ears_mumdad($col_m,$col_d);
                               ?><img src="<?php echo $img;?>"><img src="<?php echo $img;?>">
                    </td>
		</tr>
	</tbody>
        </table>
            
        </td>
    </tr>
</table>
   
<?php

 
function ins($a,$char){//передаем маленькую
    if($a==$char){ //если маленькая
        return $char=$char . '0';
    }
 else {
        return $char=$char . '1';
    }
    

}
// высчитывает цвет глаз. возвращает цвет на английском
function bdika_col_ears($p,$d,$c,$a){
    //echo '<br> bdika ears p=' . $p . ' d= ' . $d . ' c= ' . $c . ' a= ' . $a . '<br>';
    if($c=='cc'){
        return 'red';
         
    }
    else{
            if($p=='pp' && $a=='aa'){
                return 'blue';
            }
            elseif($p=='pp' && $a!='aa'){
                return 'yellow';
            }
            elseif($d=='dd'){
                return 'brown';
            }
            else{
                return 'black';
            }
    }
}
// выводит на экран картинку цвета глаз
function print_col_ears($p,$d,$c,$a){
    $color=bdika_col_ears($p,$d,$c,$a);
    //echo '<br> bdika ears p=' . $color .'<br>';
    if($color=='red'){
        ?><img src="<?php echo 'pici/ears/red.png';?>"><?php
    }
    elseif($color=='blue'){
        ?><img src="<?php echo 'pici/ears/blue.png';?>"><?php
    }
   elseif($color=='yellow'){
         ?><img src="<?php echo 'pici/ears/yellow.png';?>"><?php
   }
    elseif($color=='brown'){
         ?><img src="<?php echo 'pici/ears/brown.png';?>"><?php
    }
    else{      
        ?><img src="<?php echo 'pici/ears/black.png';?>"><?php
    }
    
}
// выводит картинку глаз по родителям
function print_col_ears_mumdad($col_m,$col_d){
    $color=bdika_color($col_m,$col_d);
    //echo '<br> bdika ears p=' . $color .'<br>';
    if($color=='red'){
        $txt='pici/ears/' . $color . '.png';
   }
    elseif($color=='blue'){
        $txt='pici/ears/' . $color . '.png';
    }
   elseif($color=='yellow'){
         $txt='pici/ears/' . $color . '.png';
   }
    elseif($color=='brown'){
         $txt='pici/ears/' . $color . '.png';
    }
    else{      
        $txt='pici/ears/' . $color . '.png';
    }
    return $txt;
    
}
//выводит на экран цвет глаз по русски
function print_col_ears_ru($p,$d,$c,$a){
    $color=bdika_col_ears($p,$d,$c,$a);
    //echo '<br> bdika ears p=' . $color .'<br>';
    if($color=='red'){
        return 'красные';
    }
    elseif($color=='blue'){
        return 'голубые';
    }
   elseif($color=='yellow'){
         return 'желтые';
   }
    elseif($color=='brown'){
         return 'карие';
    }
    else{      
        return 'черные';
    }
    
}
// возвращает цвет глаз малыша в зависимости от цвета глаз родителей
function bdika_color($col_m,$col_d){
    $broun = ' = Карие'; //br
    $blue = ' = Голубые';//bl
    $green = ' = Зеленые';//gr
    $yellow = ' = Желтые';
    $black = ' = Черные';
    
    $col_new='0';
    
    $num=Rand(1,100);
    //=========================  если глаза одинаковые =========================
    if($col_d==$col_m){
        if($col_d=='brown'){   //если оба кариглазые
           // echo $num;
            if($num<'75'){
                $col_new='brown';
            }
            if(('75'<$num) && ($num<'81')){
                $col_new='blue';
            }
            if($num>'81'){
                $col_new='green';
            }
        }
        if($col_d=='blue'){   //если оба голубоглазые
          // echo $num;
            if($num=='1'){
                $col_new='green';
            }
            else {
                $col_new='blue';
            }
        }
        if($col_d=='green'){   //если оба зеленоглазые
           //echo $num;
            if($num>'98'){
                $col_new='brown';
            }
            if($num<'75'){
                $col_new='green';
                
            }
            else{
                $col_new='blue';
            }
        }
        if($col_d=='yellow'){
            $col_new='yellow';
        }
    }
    //=========================  если глаза разные =========================
   
    if($col_d!=$col_m){
      //  echo '<br>если глаза разные';
    // если карие глаза 
        if($col_d=='brown'){
           // echo '<br>папа второй карий';
            if($col_m=='green'){
                //
               // echo $num;
                if($num<'50'){   //отец карие+мать зеленые = карие
                    $col_new='brown';
                }
                if(('50'<$num) &&($num<'63')){//отец карие+мать зеленые = голубые
                    $col_new='blue';
                }
                if($num>'63'){  //отец карие+мать зеленые = зеленые
                    $col_new='green';
                }
            }
            if($col_m=='blue'){
                //
               //echo $num;
                if($num<'50'){   //отец карие+мать голубые = карие
                    $col_new='brown';
                }
                if(($num>='50') &&($num<'99')){//отец карие+мать голубые = голубые
                    $col_new='blue';
                }
                if($num>='99'){  //отец карие+мать голубые = зеленые
                    $col_new='green';
                }
            }
        }
        
        if($col_m=='brown'){
          //  echo '<br>мама первая карий';
            if($col_d=='green'){
                //
                //echo $num;
                if($num<'50'){   //мать карие+отец зеленые = карие
                    $col_new='brown';
                }
                if(('50'<$num) &&($num<'63')){//мать карие+отец зеленые = голубые
                    $col_new='blue';
                }
                if($num>'63'){  //мать карие+отец зеленые = зеленые
                    $col_new='green';
                }
            }
            if($col_d=='blue'){
                //
               //echo $num;
                if($num<'50'){   //мать карие+отец голубые = карие
                    $col_new='brown';
                }
                if(($num>='50') &&($num<'99')){//мать карие+отец голубые = голубые
                    $col_new='blue';
                }
                if($num>='99'){  //мать карие+отец голубые = зеленые
                    $col_new='green';
                }
            }
        }
    
    
    // если зеленые глаза 
        if($col_d=='green'){
            if($col_m=='blue'){
                  //
                    //echo $num;
                    if($num<'51'){   //отец зеленые +мать голубые = зеленый
                        $col_new='green';
                    }
                    if(($num>'50') &&($num<'99')){//отец зеленые +мать голубые = голубые
                        $col_new='blue';
                    }
                    if($num>='99'){  //отец зеленые +мать голубые = карий
                        $col_new='brown';
                    }
            }
        }
         if($col_m=='green'){
             if($col_d=='blue'){ 
                    //
                   //echo $num;
                    if($num<'50'){   //мать карие+отец голубые = зеленые
                        $col_new='green';
                    }
                    if(($num>='50') &&($num<'99')){//мать карие+отец голубые = голубые
                        $col_new='blue';
                    }
                    if($num>='99'){  //мать карие+отец голубые = карие
                        $col_new='brown';
                    }
             }
         }
    }
    //если глаза желтые
    if($col_d=='yellow'){
        if($num<='50'){
            $col_new='yellow';
            //echo 'желтый папа';
             return $col_new;
        }
        if($num>'50'){
            $col_new=$col_m;
           // echo 'другая мама';
            return $col_new;
        }
    }
    if($col_m=='yellow'){
        if($num<='50'){
            $col_new='yellow';
            return $col_new;
        }
        if($num>'50'){
            $col_new=$col_d;
            return $col_new;
        }
    }
     //если глаза черные
     if($col_d=='black'){
        if($num<='50'){
            $col_new='black';
            return $col_new;
        }
        if($num>'50'){
            $col_new=$col_m;
            return $col_new;
        }
    }
    if($col_m=='black'){
        if($num<='50'){
            $col_new='black';
            return $col_new;
        }
        if($num>'50'){
            $col_new=$col_d;
            return $col_new;
        }
    }
    
    
    return $col_new;
    
}

// выводит на экран текст окраса на английском
function bdika_col_dog($a,$b,$c,$d,$p,$m){
    //echo '<br><br>тут работает функция <br>';
   
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
   // echo "<br>a=" .$a ." b=" .$b . " c=" .$co ." d=" .$d ." p=" .$p ." m=" .$m ."<br>";
    
    if($m){
        return 'Летальный исход рождения Мерле';
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
        $temp='ayb1c1' . 'd' . $d . 'p' . $p . 'm' . $m ;
    }
    if($a && $b=='0'){
        $temp='aybcc1' . 'd' . $d . 'p' . $p . 'm' . $m ;
    }
    if($a=='0' && $b=='0'){
        $temp='a' . $a . 'bcc1' . 'd' . $d . 'p' . $p . 'm' . $m;
    }
     if($a=='0' && $b=='1'){
        $temp='a' . $a . 'b1c1' . 'd' . $d . 'p' . $p . 'm' . $m;
    }
    if($temp=='ayb1c1d1p1m0'){
        return 'red';
    }
    if($temp=='aybcc1d1p1m0'){
        return 'redcinamon';
    }
    if($temp=='aybcc1d0p1m0'){
        return 'strawshocoblack';
    }
    if($temp=='aybcc1d0p0m0'){
        return 'strawshocored';
    }
    if($temp=='aybcc1d1p0m0'){
        return 'silverfawn';
    }
    if($temp=='ayb1c1d0p1m0'){
        return 'strawblack';
    }
    if($temp=='ayb1c1d0p0m0'){
        return 'strawred';
    }
    if($temp=='ayb1c1d1p0m0'){
        return 'fawnredsable';
    }
    //////////////////////////// black //////////////////
    if($temp=='a0b1c1d1p1m0'){
        return 'black';
    }
    if($temp=='a0bcc1d1p1m0'){
        //return 'шоколадный';
        return 'shoco';
    }
    if($temp=='a0bcc1d0p1m0'){
       // return 'лиловый';
        return 'lilac';
    }
    if($temp=='a0bcc1d0p0m0'){
        //return 'абрикосовый';
        return 'apricot';
    }
    if($temp=='a0bcc1d1p0m0'){
        return 'lemongreen';
    }
    if($temp=='a0b1c1d0p1m0'){
        return 'blue';
    }
    if($temp=='a0b1c1d0p0m0'){
        return 'bluefawnsable';
    }
    if($temp=='a0b1c1d1p0m0'){
        return 'blacksable';
    }
   // return $temp;
    
   
}

// выводит на экран текст окраса на русском
function bdika_col_dog2($a,$b,$c,$d,$p,$m){
    //echo '<br><br>тут работает функция <br>';
   
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
   // echo "<br>a=" .$a ." b=" .$b . " c=" .$co ." d=" .$d ." p=" .$p ." m=" .$m ."<br>";
    
    if($m){
        return 'Летальный исход рождения Мерле';
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
        $temp='ayb1c1' . 'd' . $d . 'p' . $p . 'm' . $m ;
    }
    if($a && $b=='0'){
        $temp='aybcc1' . 'd' . $d . 'p' . $p . 'm' . $m ;
    }
    if($a=='0' && $b=='0'){
        $temp='a' . $a . 'bcc1' . 'd' . $d . 'p' . $p . 'm' . $m;
    }
     if($a=='0' && $b=='1'){
        $temp='a' . $a . 'b1c1' . 'd' . $d . 'p' . $p . 'm' . $m;
    }
    if($temp=='ayb1c1d1p1m0'){
        return 'красный';
    }
    if($temp=='aybcc1d1p1m0'){
        return 'бронзовый';
    }
    if($temp=='aybcc1d0p1m0'){
        return 'темно-каштановый';
    }
    if($temp=='aybcc1d0p0m0'){
        return 'бледно-коричневый';
    }
    if($temp=='aybcc1d1p0m0'){
        return 'серебрянный';
    }
    if($temp=='ayb1c1d0p1m0'){
        return 'темно-персиковый';
    }
    if($temp=='ayb1c1d0p0m0'){
        return 'светло-персиковый';
    }
    if($temp=='ayb1c1d1p0m0'){
        return 'красный олений';
    }
    //////////////////////////// black //////////////////
    if($temp=='a0b1c1d1p1m0'){
        return 'черный';
    }
    if($temp=='a0bcc1d1p1m0'){
        //return 'шоколадный';
        return 'шоколадный';
    }
    if($temp=='a0bcc1d0p1m0'){
       // return 'лиловый';
        return 'лиловый';
    }
    if($temp=='a0bcc1d0p0m0'){
        //return 'абрикосовый';
        return 'абрикосовый';
    }
    if($temp=='a0bcc1d1p0m0'){
        return 'лимонный';
    }
    if($temp=='a0b1c1d0p1m0'){
        return 'голубой';
    }
    if($temp=='a0b1c1d0p0m0'){
        return 'голубой олений';
    }
    if($temp=='a0b1c1d1p0m0'){
        return 'черный соболиный';
    }
   // return $temp;
    
   
}


// выводит на экрас генокод a0bcc1d0p0m0
Function do_gencode($a,$b,$c,$d,$p,$m){
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
    if($m){
       // echo 'Летальный исход рождения Мерле';
        die;
    }
    if(!$co){
        // цветной текст
       // echo '<div style="color: red">'  . '<br>рождение собаки с браком, т.к. Алель С рецессивна <br>' . '</div>';
       // echo $pic_col="pici/agt/c0/c0.png";
        return $pic_col;
        die;
        
    }
    if($a && $b=='1'){
        $temp='ayb1c1' . 'd' . $d . 'p' . $p . 'm' . $m ;
    }
    if($a && $b=='0'){
        $temp='aybcc1' . 'd' . $d . 'p' . $p . 'm' . $m ;
    }
    if($a=='0' && $b=='0'){
        $temp='a' . $a . 'bcc1' . 'd' . $d . 'p' . $p . 'm' . $m;
    }
     if($a=='0' && $b=='1'){
        $temp='a' . $a . 'b1c1' . 'd' . $d . 'p' . $p . 'm' . $m;
    }
    return $temp;
    
}
// выводит на экран картинку цвета кожи
Function print_col_dog($a,$b,$c,$d,$p,$m){
    $genCode= do_gencode($a, $b, $c, $d, $p, $m);
    ?><img src="<?php echo 'pici/agt/' . $genCode . '.png';?>"><?php
}
//функция рандомного пола
function rando_sex(){
     $quotes[] = 'кобель';
     $quotes[] = 'сука';
     //srand ((double) microtime() * 1000000);
    $random_number = rand(0,count($quotes)-1);
    echo ($quotes[$random_number]);
}
