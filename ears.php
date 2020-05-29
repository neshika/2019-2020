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
     <!-- начало кода -->
      
<?php 
//require "db.php";
require "includes/functions.php"; 

echo "Тестируем генетику глаз: <br><hr>";
function bdika_color($col_m,$col_d){
    $broun = ' = Карие'; //br
    $blue = ' = Голубые';//bl
    $green = ' = Зеленые';//gr
    $col_new='0';
    
    $num=Rand(1,100);
    //=========================  если глаза одинаковые =========================
    if($col_d==$col_m){
        if($col_d=='br'){   //если оба кариглазые
            echo $num;
            if($num<'75'){
                $col_new='br';
            }
            if(('75'<$num) && ($num<'81')){
                $col_new='bl';
            }
            if($num>'81'){
                $col_new='gr';
            }
        }
        if($col_d=='bl'){   //если оба голубоглазые
            echo $num;
            if($num=='1'){
                $col_new='gr';
            }
            else {
                $col_new='bl';
            }
        }
        if($col_d=='gr'){   //если оба зеленоглазые
            echo $num;
            if($num>'98'){
                $col_new='br';
            }
            if($num<'75'){
                $col_new='gr';
                
            }
            else{
                $col_new='bl';
            }
        }
    }
    //=========================  если глаза разные =========================
   
    if($col_d!=$col_m){
        echo '<br>если глаза разные';
    // если карие глаза 
        if($col_d=='br'){
            echo '<br>папа второй карий';
            if($col_m=='gr'){
                //
                echo $num;
                if($num<'50'){   //отец карие+мать зеленые = карие
                    $col_new='br';
                }
                if(('50'<$num) &&($num<'63')){//отец карие+мать зеленые = голубые
                    $col_new='bl';
                }
                if($num>'63'){  //отец карие+мать зеленые = зеленые
                    $col_new='gr';
                }
            }
            if($col_m=='bl'){
                //
                echo $num;
                if($num<'50'){   //отец карие+мать голубые = карие
                    $col_new='br';
                }
                if(($num>='50') &&($num<'99')){//отец карие+мать голубые = голубые
                    $col_new='bl';
                }
                if($num>='99'){  //отец карие+мать голубые = зеленые
                    $col_new='gr';
                }
            }
        }

        if($col_m=='br'){
            echo '<br>мама первая карий';
            if($col_d=='gr'){
                //
                echo $num;
                if($num<'50'){   //мать карие+отец зеленые = карие
                    $col_new='br';
                }
                if(('50'<$num) &&($num<'63')){//мать карие+отец зеленые = голубые
                    $col_new='bl';
                }
                if($num>'63'){  //мать карие+отец зеленые = зеленые
                    $col_new='gr';
                }
            }
            if($col_d=='bl'){
                //
                echo $num;
                if($num<'50'){   //мать карие+отец голубые = карие
                    $col_new='br';
                }
                if(($num>='50') &&($num<'99')){//мать карие+отец голубые = голубые
                    $col_new='bl';
                }
                if($num>='99'){  //мать карие+отец голубые = зеленые
                    $col_new='gr';
                }
            }
        }
    
    
    // если зеленые глаза 
        if($col_d=='gr'){
            if($col_m=='bl'){
                  //
                    echo $num;
                    if($num<'51'){   //отец зеленые +мать голубые = зеленый
                        $col_new='gr';
                    }
                    if(($num>'50') &&($num<'99')){//отец зеленые +мать голубые = голубые
                        $col_new='bl';
                    }
                    if($num>='99'){  //отец зеленые +мать голубые = карий
                        $col_new='br';
                    }
            }
        }
         if($col_m=='gr'){
             if($col_d=='bl'){ 
                    //
                    echo $num;
                    if($num<'50'){   //мать карие+отец голубые = зеленые
                        $col_new='gr';
                    }
                    if(($num>='50') &&($num<'99')){//мать карие+отец голубые = голубые
                        $col_new='bl';
                    }
                    if($num>='99'){  //мать карие+отец голубые = карие
                        $col_new='br';
                    }
             }
         }
    }
    return $col_new;
    
}





echo "пераметры родителей: ";
$broun = ' = Карие'; //br
$blue = ' = Голубые';//bl
$green = ' = Зеленые';//gr


$input = array("br", "gr", "bl");
$rand_keys = array_rand($input, 1);
$rand_keys2 = array_rand($input, 1);



echo 'мама' . $col_m= $input[$rand_keys] . "";
$pic_col="pici/ears/" . $col_m . '.png';
 ?><img src="<?php echo $pic_col;?>"><?php
 
 
echo " + ";


echo ' папа' . $col_d= $input[$rand_keys2];
$pic_col="pici/ears/" . $col_d . '.png';
 ?><img src="<?php echo $pic_col;?>"><?php

//вызываем фугкцию проверки 
 
 $col_new=bdika_color($col_m, $col_d);
 $pic_col="pici/ears/" . $col_new . '.png';
  ?><img src="<?php echo $pic_col;?>"><?php

?>
     
 </div>




