<?php
//подключение библиотеки redBeanphp
require __DIR__."/db.php";
require __DIR__."/includes/functions.php";
//require __DIR__."/mumdad.php";
?>

<!DOCTYPE html> 
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>

<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="js/script.js"></script> <img src=""/>
<link rel="stylesheet" href="/css/styleagt.css" type="text/css" />
<link rel="stylesheet" media="screen and (max-width: 600px)" href="/css/small.css" type="text/css" />



<title>Cимулятор заводчика</title>
</head>
<body bgcolor="#22252F" body text="#CABDCF">

    <ul id="navbar">
      <li><a href="/index.php">Главная</a></li>
      <li><a href="#">КХС</a>
       <ul>
            <li><a href="/kennel.php">Питомник</a></li>
            <li><a href="/office.php.php">Офис</a></li>
            <li><a href="/buy.php.php">магазин</a></li>
        </ul>
       </li>
      <li><a href="#">АГТ</a>
        <ul>
            <li><a href="/ears.php">Редактор глаз</a></li>
          <li><a href="/bred.php">Редактор окраса</a></li>
          <li><a href="/mumdad.php">Проверка родиетлей</a></li>
          <li><a href="/agt.php">База АГТ</a></li>
        </ul>
      </li>
      <li><a href="logout.php">Выход</a></li>
    </ul>
 
    <p>Абзац с текстом был добавлен для демонстрации того, что при открытии подпунктов меню они будут скрывать часть контента, а не сдвигать его.</p>
<marquee behavior="alternate" direction="right" bgcolor="#5E3561"><?php echo date('d.m.Y : h.m');?></marquee> 
 
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
<form method="POST" action="/agt.php">     
 <input type="submit" class="knopka2" value="Обновить" onClick="window.location.reload( true );">
 <button type="submit" class="knopka2" name="buy">Обновить родителей</button>
 
</form>
<?php
//если нажали кнопку "обновить родителей"
if ( isset($_POST['buy']) ){
        //данные мамы
    $id='1';
    $dog_id='1';
    $a_mum= f_rand_col('AA', 'Aa', 'aa');
     $b_mum= f_rand_col('BB', 'Bb', 'bb');
     $c_mum= f_rand_col('CC', 'CC', 'CC');
    $d_mum= f_rand_col('DD', 'Dd', 'dd');
    $p_mum= f_rand_col('PP', 'Pp', 'pp');
    $m_mum= f_rand_col('mm', 'mm', 'mm');
    $t_mum='tt';
    $sex='0';
    R::exec( 'UPDATE dna_agt SET id=:dog_id WHERE id = :id ', array(':dog_id'=> $dog_id, ':id' => $id));
    R::exec( 'UPDATE dna_agt SET a=:speed WHERE id = :id ', array(':speed'=> $a_mum, ':id' => $id));
    R::exec( 'UPDATE dna_agt SET b=:agility WHERE id = :id ', array(':agility'=> $b_mum, ':id' => $id));
    R::exec( 'UPDATE dna_agt SET c=:teach WHERE id = :id ', array(':teach'=> $c_mum, ':id' => $id));
    R::exec( 'UPDATE dna_agt SET d=:jump WHERE id = :id ', array(':jump'=> $d_mum, ':id' => $id));
    R::exec( 'UPDATE dna_agt SET p=:scent WHERE id = :id ', array(':scent'=> $p_mum, ':id' => $id));
    R::exec( 'UPDATE dna_agt SET m=:find WHERE id = :id ', array(':find'=> $m_mum, ':id' => $id));
    R::exec( 'UPDATE dna_agt SET t=:total WHERE id = :id ', array(':total'=> $t_mum, ':id' => $id));
    R::exec( 'UPDATE dna_agt SET sex=:total WHERE id = :id ', array(':total'=> $sex, ':id' => $id));


    //данные папы:
    $id2='2';
    $dog_id2='2';
    $a_dad= f_rand_col('AA', 'Aa', 'aa');
    $b_dad= f_rand_col('BB', 'Bb', 'bb');
    $c_dad= f_rand_col('CC', 'CC', 'CC');
    $d_dad= f_rand_col('DD', 'Dd', 'dd');
    $p_dad= f_rand_col('PP', 'Pp', 'pp');
    $m_dad= f_rand_col('mm', 'mm', 'mm');
    $t_dad='tt';
    $sex2='1';
    R::exec( 'UPDATE dna_agt SET id=:dog_id WHERE id = :id ', array(':dog_id'=> $dog_id2, ':id' => $id2));
    R::exec( 'UPDATE dna_agt SET a=:speed WHERE id = :id ', array(':speed'=> $a_dad, ':id' => $id2));
    R::exec( 'UPDATE dna_agt SET b=:agility WHERE id = :id ', array(':agility'=> $b_dad, ':id' => $id2));
    R::exec( 'UPDATE dna_agt SET c=:teach WHERE id = :id ', array(':teach'=> $c_dad, ':id' => $id2));
    R::exec( 'UPDATE dna_agt SET d=:jump WHERE id = :id ', array(':jump'=> $d_dad, ':id' => $id2));
    R::exec( 'UPDATE dna_agt SET p=:scent WHERE id = :id ', array(':scent'=> $p_dad, ':id' => $id2));
    R::exec( 'UPDATE dna_agt SET m=:find WHERE id = :id ', array(':find'=> $m_dad, ':id' => $id2));
    R::exec( 'UPDATE dna_agt SET t=:total WHERE id = :id ', array(':total'=> $t_dad, ':id' => $id2));
    R::exec( 'UPDATE dna_agt SET sex=:total WHERE id = :id ', array(':total'=> $sex2, ':id' => $id2));


}

echo 'ТЕСТИМ выводим базу данных: DNA_AGT' . print_al();?>

<table>
    <tr>
        <td>
          
            <table class="table1" cellpadding="2">2
                <tr>
                    <td valign="top" height="300" width="300">фото папы:<br>
                        <?php 
                        $id2='2';
                        $tabl='dna_agt';
                        $array2=take_data_from($id2, $tabl);
                        $put= 'pici/agt/' . bdika_col_dog($array2['a'][0],$array2['b'][0],$array2['c'][0],$array2['d'][0],$array2['p'][0],$array2['m'][0]). '.png';
                        ?><img src="<?php echo $put;?>">
                    </td>
                    <td valign="top" rowspan="2">данные собаки левый столбец<br><br>
                        <li>Генетический код: <?php echo $array2['a'] . $array2['b'] . $array2['c'] . $array2['d'] . $array2['p'] . $array2['m'];?></li>
                        <li>ОКРАС: <?php echo bdika_col_dog2($array2['a'][0],$array2['b'][0],$array2['c'][0],$array2['d'][0],$array2['p'][0],$array2['m'][0]);?></li>
                        <li>Цвет глаз: <?php echo print_col_ears_ru($array2['p'],$array2['d'],$array2['c'],$array2['a']);?></li>
                        <li>Пол: кабель</li>
                    </td>
                </tr>
                <tr>
                    <td>ГК: <?php echo do_gencode($array2['a'][0],$array2['b'][0],$array2['c'][0],$array2['d'][0],$array2['p'][0],$array2['m'][0]);?>
                    <br>Цвет глаз: <br><?php echo print_col_ears($array2['p'],$array2['d'],$array2['c'],$array2['a']) .print_col_ears($array2['p'],$array2['d'],$array2['c'],$array2['a']);?>
                    </td>
                </tr>
            </table>
    </td>
    <td>
        <table class="table1" cellpadding="2">1 
          
      <tr>
        <td valign="top" height="300" width="300">фото мамы: <br>
             <?php
             $id='1';
                $tabl='dna_agt';
                $array=take_data_from($id, $tabl);
             $put2= 'pici/agt/' . bdika_col_dog($array['a'][0],$array['b'][0],$array['c'][0],$array['d'][0],$array['p'][0],$array['m'][0]). '.png';
                ?><img src="<?php echo $put2;?>">
        </td>
        <td valign="top" rowspan="2">данные собаки правый столбец<br><br>
            <li>Генетический код: <?php echo $array['a'] . $array['b'] . $array['c'] . $array['d'] . $array['p'] . $array['m'];?></li>
            <li>ОКРАС: <?php echo bdika_col_dog2($array['a'][0],$array['b'][0],$array['c'][0],$array['d'][0],$array['p'][0],$array['m'][0]);?></li>
            <li>Цвет глаз: <?php echo print_col_ears_ru($array['p'],$array['d'],$array['c'],$array['a']);?></li>
            <li>Пол: сука</li>
        </td>
      </tr>
      <tr>
        <td>ГК: <?php echo do_gencode($array['a'][0],$array['b'][0],$array['c'][0],$array['d'][0],$array['p'][0],$array['m'][0]);?>
        <br>Цвет глаз: <br><?php echo print_col_ears($array['p'],$array['d'],$array['c'],$array['a']) .print_col_ears($array['p'],$array['d'],$array['c'],$array['a']);?>
        </td>
      </tr>
         
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
Function print_col_dog($a,$b,$c,$d,$p,$m){
    $genCode= do_gencode($a, $b, $c, $d, $p, $m);
    ?><img src="<?php echo 'pici/agt/' . $genCode . '.png';?>"><?php
}


///////////////  окрас и расчет цвета глаз ///////////////////
//
//// высчитывает цвет глаз. возвращает цвет на английском
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



//функция выводит данные из таблицы DNA_AGT
function print_al(){

	 $array = R::getAll( 'SELECT * FROM dna_agt' );
       foreach($array as $item) {
              foreach ($item as $key => $value) {
                 echo " | " . "$value";
                }    
              echo "<br><br>";
            }
}
?>
    
</body>