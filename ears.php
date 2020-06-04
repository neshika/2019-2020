<?php 
//require "db.php";
require "includes/functions.php"; 

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


//echo "пераметры родителей: ";

$input = array("brown", "green", "blue","black","yellow");
$rand_mum = array_rand($input, 1);
$rand_dad = array_rand($input, 1);
$col_m=$input[$rand_mum];
$col_d= $input[$rand_dad];
//echo 'мама' . $col_m= $input[$rand_keys] . "";
$pic_col="pici/ears/" . $col_m . '.png';
$pic_col2="pici/ears/" . $col_d . '.png';
//вызываем фуyкцию проверки 
 $col_new=bdika_color($col_m, $col_d);
 $pic_col3="pici/ears/" . $col_new . '.png';

?>


<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>

<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="js/script.js"></script> <img src=""/>

<!-- <link rel="stylesheet" href="/css/style.css" type="text/css" /> -->

<link rel="stylesheet" href="/css/styleagt.css" type="text/css" />
<!--<link rel="stylesheet" href="/css/radio.css" type="text/css" />-->

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
        </ul>
      </li>
      <li><a href="logout.php">Выход</a></li>
    </ul>
<div id="cont">
     <!-- начало кода -->
     <p>Тестируем генетику глаз:</p> <input type="submit" class="knopka2" value="Обновить" onClick="window.location.reload( true );">
 
     <table border="1" width="40%" cellpadding="5"><caption>Данные родителей<br></caption>
	<tbody>
		<tr>
			<td> мама: <?php echo $col_m;?> <img src="<?php echo $pic_col;?>"></td>
			<td>папа: <?php echo $col_d;?> <img src="<?php echo $pic_col2;?>"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">малыш:<?php echo $col_new;?> <img src="<?php echo $pic_col3;?>"></td>
		</tr>
	</tbody>
</table>
     
 </div> <!-- конец класса cont-->




