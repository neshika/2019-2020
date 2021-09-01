<?php 
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');

$id_m = 4;
$id_d = 6;

$family_mum = new Family();
$family_dad = new Family();
$tabl = new Tabl();


$f_data_m  = $tabl->TakeDataFrom($family_mum->retFamilyId($id_m), 'family'); // получаем id на фамилию  //родственники по линии матери
$f_data_d = $tabl->TakeDataFrom($family_dad->retFamilyId($id_d), 'family'); //Получаем данные из семьи  //родственники по линии отца

    echo '<br>function bdika_mutation <br>';
    $temp =0; //нет мутации
    $num =Rand(1,100);   //шанс получения мутации
 
    ////////////////////////////////////////////////проверка самки и родни партнера
    
    if($f_data_m['id']==$f_data_d['mum']){  //самка и мать партнера 75% мутация
        echo 'партнерша - мать';
        if($num>0 && $num<75){
            $temp=1;
        }
    }
     if( ($f_data_m['id']==$f_data_d['g1mum']) || ($f_data_m['id']==$f_data_d['g0mum']) ){  //самка и бабки партнера 50% мутация
        echo 'партнерша - бабка';
        if($num>50 && $num<100){
            $temp=1;
        }
    }
    if( ($f_data_m['id']==$f_data_d['gg1mum2']) || ($f_data_m['id']==$f_data_d['gg0mum2']) || ($f_data_m['id']==$f_data_d['gg1mum4']) || ($f_data_m['id']==$f_data_d['gg0mum4']) ){
        //самка и пробабки партнера 25% мутация
        echo 'партнерша - пробабка';
        if($num>0 && $num<25){
            $temp=1;
        }
    }
    
       /////////////////////////////////////////////проверка самца и родни партнера
    if($f_data_d['id']==$f_data_m['dad']){  //самец и отец партнерши 75%
        echo 'партнер - отец';
        if($num>0 && $num<75){
            $temp=1;
        }
    }
     if( ($f_data_d['id']==$f_data_m['g1dad']) || ($f_data_d['id']==$f_data_m['g0dad']) ){
         //самец и деды партнерши 50%
        echo 'партнер - дед';
        if($num>50 && $num<100){
            $temp=1;
        }
    }
    if( ($f_data_d['id']==$f_data_m['gg1dad1']) || ($f_data_d['id']==$f_data_m['gg0dad1']) || ($f_data_d['id']==$f_data_m['gg1dad3']) || ($f_data_d['id']==$f_data_m['gg0dad3']) ){
        //самец и прадеды партнерши 25%
        echo 'партнер прадед';
        if($num>0 && $num<25){
            $temp=1;    //если прошла мутация
        }
    }
    return $temp;
