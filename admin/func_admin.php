
<?php
/***************************************************************/
//  новые функции
/**************************************************************/

function selectAll(){
	return $array = R::getCol('SELECT name_kennel FROM kennels' );
 }

/***************************************************************/
//  базовые функции
/**************************************************************/

function test(){
	echo 'подключен файл func_admin.php';
}
/*Функция возвращает залогиненого пользователя из куки*/
function ret_owner(){
	return $_SESSION['logged_user']->login;
}
function debug($arr){
    echo '<pre>' . print_r($arr, true). '</pre>';
}

/*Функция распечатывает все опции собак из таблицы*/
function print_all(){

	 $array = R::getAll( 'SELECT * FROM animals' );
       foreach($array as $item) {
              foreach ($item as $key => $value) {
                 echo " | " . "$value";
                }    
              echo "<br><br>";
            }
}
/*Функция распечатывает все опции собак из таблицы*/
function insert_name($id,$name){
	 R::exec( 'UPDATE animals SET name=:name WHERE id = :id ', array(':name'=> $name, ':id' => $id));
	//$bean = R::load($id, $name);
	//$id = R::store($bean); // int
}
/*                                             *************************   голая/пух                     */
/*Функция возвращает тип собаки hrhr / HrHr / Hrhr*/
function ret_hr($id){
	 $string =R::getCol('SELECT hr FROM animals WHERE id = :id',
        [':id' => $id]);

	 return $string[0];
}
/*Функция пишет тип собаки по русски в зависимоти от Генетического типа*/
function print_hr($var){
	if ($var=='Hrhr') return 'голая';
	else return 'пуховая';
}
/*Функция считает голая или пух в зависимоти от родителей*/
function gol_pooh($on,$ona){
	//Hrhr - голый
	//hrhr - пух
	
	$temp='hrhr';
	if('hrhr'==$on){			//он пух
		if('hrhr'==$ona) return $ona;	//она пух= малыш пух
		else {							//она голая
			$num=Rand(1,2);
			if(1==$num) return $ona;	//шанс 50% на 50%
			else return $on;
		}
	}
	if('Hrhr'==$on){			//он голый
		if('Hrhr'==$ona){	//она Голая
			$num=Rand(1,3);
			ECHO $num;
			echo $ona;
			if(1==$num || 2==$num){
			 return $ona; //шанс 75% голый 25% пух
			}
			if(3==$num){
			 return $temp; // 25% пух
			}
			
		}
		else {							//она пух
			$num=Rand(1,2);
			if(1==$num) return $ona;		//шанс 50% на 50%
			else return $on;
		}
	}

}
/*                                             *************************    данные по параметру                 */
 /*Функция возвращает данные противоположного пола при вязке*/
function get_where($tabl, $param, $owner){

   	return R::getAssoc ('SELECT id,name FROM animals WHERE sex =:pol and breeder=:own', array(':pol'=> $param, ':own' => $owner));

}
/*                                             *************************    данные по ID                 */

 /*Функция возвращает данные по собаке по ее ID*/
function print_all_d($id){
	$array =  R::getAll( 'SELECT * FROM animals WHERE id = :id',
        [':id' => $id]); 
	foreach($array as $item) {
              foreach ($item as $key => $value) {
                 echo " | " . "$value";
                }    
              echo "<br><br>";
            }
}
//  /*Функция возвращает имя владельца по собаке по ее ID*/
// function ret_breeder($id){
// 	$string =  R::getCol( 'SELECT breeder FROM animals WHERE id = :id',
//         [':id' => $id]); 
		
// 	      return $string [0];
                
// }
/*Функция возвращает пол собаки по ее ID*/
// function ret_sex($id){
// 	$string =  R::getCol( 'SELECT sex FROM animals WHERE id = :id',
//         [':id' => $id]); 
		
// 	      return $string [0];
                
// }
// /*Функция возвращает имя собаки по ее ID*/
// function ret_name($id){
// 	If (0!=$id){
// 	$string =  R::getCol( 'SELECT name FROM animals WHERE id = :id',
//         [':id' => $id]); 
// 		return $string[0];
// 	}
// 	else return 'не извесно';
                
// }
// /*Функция возвращает название питомника собаки по ее ID*/
// function ret_ken($id){
// 	$string =  R::getCol( 'SELECT kennel FROM animals WHERE id = :id',
//         [':id' => $id]); 
		
// 	      return $string [0];
                
// }
// /*Функция возвращает дата создания питомника собаки по ее ID*/
// function ret_birth($id){
// 	$string =  R::getCol( 'SELECT birth FROM animals WHERE id = :id',
//         [':id' => $id]); 
			
// 	      return $string [0];
                
// }
// /*Функция возвращает маму собаки по ее ID*/
// function ret_mum($id){
// 	$string =  R::getCol( 'SELECT mum FROM animals WHERE id = :id',
//         [':id' => $id]); 
// 			if(0==$string [0]) return 0;
// 			else  return (int)$string [0];
                
// }
// /*Функция возвращает папу собаки по ее ID*/
// function ret_dad($id){
// 	$string =  R::getCol( 'SELECT dad FROM animals WHERE id = :id',
//         [':id' => $id]); 
			
// 	      if(0==$string [0]) return 0;
// 			else  return (int)$string [0];
                
// }
/*Функция возвращает название картинки в зависимости от пола собаки по ее ID*/
function ret_pic($id){
	If('сука'==find_where($id,'sex'))
		return '<img src = "/pic/female_mini.png">';
	else
		return '<img src = "/pic/male_mini.png">';
	
                
}

/*                                             *************************    1 страница рандомная собака  */
function f_rand_col($param, $param2, $param3){
	$num=Rand(1,3);
	if ( $num == 1)
		$col = $param;
	if ($num == 2)
		$col = $param2;
	else
		$col = $param3;
	return $col;
	
}
/*                                             *************************    1 страница рандомная пол собаки  */
function f_bdika_sex(){
	if(Rand(1,2)==1)
		$sex='кобель';
	else
		$sex='сука';
	return $sex;

}
?>
<!-------------------<img src="<?php echo $_POST['url']?>" width="100%"> -----$_POST['url']= $anwer;---------->

 
 <?php
 /*Функция вносит путь до картинки собаки*/
function insert_url($url,$id){
	R::exec( 'UPDATE animals SET url=:name WHERE id = :id ', array(':name'=> $url, ':id' => $id));

}
 /*Функция рисует путь до картинки для пухов собак*/
 function ret_need($array2, $need){

 		if (strrpos($array2 , $need)){

 			$anwer="pic/" . $need . "/" . $array2 . ".png";
 			return $anwer;
 		}
 		
 		
 }
  /*Функция вносит в переменную $_POST['url'] путь до картинки*/
 function ret_img($array){ //hr_white
 		//$array='hr_shoko';
			$need='';
			$anwer="pic/" . $array . ".png";
 		
 		if (strrpos($array , 'r_')){
 			$anwer="pic/hrhr/" . $array . ".png";
 		 		
 		}elseif(strrpos($array , $need)){
 			$anwer="pic/" . $array . ".png";

 		}else{
 			$need='MM';
 			
 		//echo "<br>need  " . $need;
 			if (strrpos($array , $need)) $anwer=ret_need($array, $need);
 			$need='TT';
 			
 		//echo "<br>need  " . $need;
 			if (strrpos($array , $need)) $anwer=ret_need($array, $need);
 			$need='TM';
 			
 		//echo "<br>need  " . $need;
 			if (strrpos($array , $need)) $anwer=ret_need($array, $need);
 		}
 		
 		
 		$_POST['url']= $anwer;
 		//var_dump($_POST['url']);
}





 
// $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
 //$GLOBALS["$hr_black"]

//пуховые виды ====================================================
	//черный пух
	$hr_black='<img src="pic/hrhr/hr_black.png">';
	$hr_blackMM='<img src="pic/hrhr/hr_blackMM.png">';

	//рыжий пух
	$hr_orange='<img src="pic/hrhr/hr_orange.png">';
	$hr_orangeMM='<img src="pic/hrhr/hr_orangeMM.png">';

	//шоко пух
	$hr_shoko='<img src="pic/hrhr/hr_shoko.png">';
	$hr_shokoMM='<img src="pic/hrhr/hr_shokoMM.png">';

	//белый пух
	$hr_white='<img src="pic/hrhr/hr_white.png">';
	$hr_white_sh='<img src="pic/hrhr/hr_white_sh.png">';




//echo 'проверка пятен и крапа';
	//голые виды ====================================================
//orange
	$orangeMM='<img src="pic/MM/OrangeMM.png"';
	$orange='<img src="pic/Orange.png">';

	//black
	$black='<img src="pic/black.png">';
	$blackTTMM='<img src="pic/TTMM/blackTTMM.png">';
	$blackMM='<img src="pic/MM/blackMM.png">';
	$blackTT='<img src="pic/TT/blackTT.png">';

	//shoko

	$shoko='<img src="pic/shoko.png">';
	$shokoTTMM='<img src="pic/TTMM/shokoTTMM.png">';
	$shokoMM='<img src="pic/MM/shokoMM.png">';
	$shokoTT='<img src="pic/TT/shokoTT.png">';

	//white
	$witeTTMM='<img src="pic/TTMM/whiteTTMM.png">';
	$white='<img src="pic/white.png">';

/*	//orange
	$orangeMM='<img src="pic/orange/OrangeMM.png"';
	$orange='<img src="pic/orange/Orange.png">';

	//black
	$black='<img src="pic/black/black.png">';
	$blackTTMM='<img src="pic/white/blackTTMM.png">';
	$blackMM='<img src="pic/white/blackMM.png">';
	$blackTT='<img src="pic/white/blackTT.png">';

	//shoko

	$shoko='<img src="pic/shoko/shoko.png">';
	$shokoTTMM='<img src="pic/white/shokoTTMM.png">';
	$shokoMM='<img src="pic/white/shokoMM.png">';
	$shokoTT='<img src="pic/white/shokoTT.png">';

	//white
	$witeTTMM='<img src="pic/white/whiteTTMM.png">';
	$white='<img src="pic/white/white.png">';


*/


/////////////////////////////////////////////////1.пуховки hrhr///////////////////////////////////////////


//1.3 пуховки шоко (шоко/шоко с пятнами)
function hr_shoko_ttmm($M){
	if ($M!='mm')	//если пятна
		ret_img('hr_shokoMM');
	else           //без пятен
		ret_img('hr_shoko');
}
//1.3 пуховки черный (черный/черный с пятнами)
function hr_black_ttmm($M){
	if ($M!='mm')	//если пятна
		ret_img('hr_blackMM');
	else           //без пятен
		ret_img('hr_black');
}

function hr_shoko_black($B, $M){
	if ($B=='bb')	//шоко
		hr_shoko_ttmm($M);
	else  //черный
		hr_black_ttmm($M);
}
//1.2 пуховки рыжий (рыжий/рыжий с пятнами)
function hr_orange_ttmm($M){
	if ($M!='mm')	//если пятна
		ret_img('hr_orangeMM');
	else           //без пятен
		ret_img('hr_orange');
}

function orange($F,$B,$M){
	if ($F!='ff')
		hr_orange_ttmm($M);
	else 
		hr_shoko_black($B, $M);


}

//1.1 пуховки белый (шоко/черный)
function hr_white_ttmm($B){	
	if ($B=='bb')	//шоко
		ret_img('hr_white_sh');
	else 			//черный
		ret_img('hr_white');
}


/////////////////////////////////////////////////2.голые Hrhr///////////////////////////////////////////

//1.1 голый белый (шоко/черный)
function white_ttmm($B,$T,$M){	
	if(($T=="tt") && ($M=="mm")){
			ret_img('white');
		}
		elseif (($T=="tt") && ($M!="mm")){
			if($B == "bb")
				ret_img('shokoMM');
			if(($B == "BB") || ($B == "Bb"))
				ret_img('blackMM');
		}
		elseif (($T!="tt") && ($M=="mm")){
			if($B == "bb") 
				ret_img('shokoTT');
			if(($B == "BB") || ($B == "Bb"))
				ret_img('blackTT');
		}
		else{
			if($B == "bb") 
				ret_img('shokoTM');
			if(($B == "BB") || ($B == "Bb"))
				ret_img('blackTM');
		}
}
//1.2 пуховки рыжий (рыжий/рыжий с пятнами)
function orange_ttmm($M){
	if ($M!='mm')	//если пятна
		ret_img('orangeMM');
	else           //без пятен
		ret_img('orange');
}
//1.3 пуховки шоко (шоко/шоко с пятнами)
function shoko_ttmm(){
	ret_img('shoko');
}
//1.3 пуховки черный (черный/черный с пятнами)
function black_ttmm(){
	ret_img('black');
}


//проверка голой=======================================================
function f_gol($W,$F,$B,$T,$M){
	if ($W=='ww'){	// если не белый цвет
		if ($F=='ff'){	//если не рыжий
			if ($B=='bb'){	//шоко
				shoko_ttmm();
			}
			if (($B == 'Bb') || ($B == 'BB')){ //черный
				black_ttmm();
			}
		}
					
		else{
			orange_ttmm($M);
		}
	}
				
	else{
		//белая
		white_ttmm($B,$T,$M);
	}
}


//проверка пуха===============================================================
function f_pooh($W,$F,$B,$T,$M){
		
	if($W=='ww')
		orange($F,$B,$M);
	
	else
		hr_white_ttmm($B);

}

// проверка голая или пух===========================================
function f_get_image($Hr,$W,$F,$B,$T,$M){
	//echo 'f_get_image($Hr,$W,$F,$B,$T,$M);';
	
		if ($Hr=="hrhr") // если пух
			f_pooh($W,$F,$B,$T,$M);
		else 
			f_gol($W,$F,$B,$T,$M);
			
}

///////////////////////////////////////////////////////////////////////////////////////////
?>

<?php
function breedding($on,$ona,$temp, $temp2,$temp3){
//$on="TT";
//$ona="Tt";
//$temp="TT";
//$temp2="tt";
//$temp3="Tt";
$num=0;

	echo "код самца: $on <br>";
	echo "код самки: $ona <br>";

	if ($on==$temp && $ona==$temp){	//AA
			echo 'Оба родителя ';
			$num=$on;
			return $num;
			die();
	}
	if($on==$temp2 && $ona==$temp2){	//аа
		echo 'Оба родителя ';
		$num=$ona;
		return $num;
		die();
	}
	if($on==$temp3 && $ona==$temp3){	//AaАа
		$num=rand(1,100);
		echo $num;
		if($num>1 && $num<50){
			$num=$on;
			return $num;
			die();
		}
		else{							//AA
			$num=rand(1,2);
			echo $num;
			if($num%2){
				$num=$temp;
				return $num;
				die();
			}
			else{						//aa
				$num=$temp2;
				return $num;
				die();
			}
		}
	}
	if($on==$temp3 && $ona==$temp2){	//Aa aa
		$num=rand(1,100);
		echo $num;
		if($num>=1 && $num<=50){
			$num=$on;
			return $num;
			die();
		}
		else{						//aa
				$num=$ona;
				return $num;
				die();
			}
	}
	if($on==$temp2 && $ona==$temp3){	//aa Aa
		$num=rand(1,100);
		echo $num;
		if($num>1 && $num<50){		//aa
			$num=$ona;
			return $num;
			die();
		}
		else{						//Aa
				$num=$on;
				echo $num;
				die();
			}
	}
	if($on==$temp && $ona==$temp3){	//AA Aa
		$num=rand(1,100);
		echo $num;
		if($num>=1 && $num<=50){		//AA
			$num=$on;
			return $num;
			die();
		}
		else{						//aa
				$num=$ona;
				return $num;
				die();
			}
	}
	if($on==$temp3 && $ona==$temp){	//Aa AA
		$num=rand(1,100);
		echo $num;
		if($num>=1 && $num<=50){		//AA
			$num=$ona;
			return $num;
			die();
		}
		else{						//aa
				$num=$on;
				return $num;
				die();
			}
	}
	else{ 
		echo 'разные';
		$num=$temp3;
		return $num;
		die();
	}
}


/*                                   *************************    данные Для бридинга говой собаки**********  */
function Start($id_m,$id_d){
////////////////////////////////////////////////////////////////TT
//        данные из поля      TT  мамы
$dogs_m =  R::getAssoc('SELECT *  FROM animals WHERE id = :id',
        [':id' => $id_m]);  
foreach ($dogs_m as $dog) {
	//echo $dog['name'];
	//echo $dog['tt'];
	$TT_m=$dog['tt'];
	$AA_m=$dog['aa'];
	$BB_m=$dog['bb'];
	$MM_m=$dog['mm'];
	$WW_m=$dog['ww'];
	$FF_m=$dog['ff'];
	$hr_ona=$dog['hr'];
	$race_m=$dog['race'];
	$breeder_m=$dog['breeder'];
	$owner_m=$dog['owner'];
	$kennel_m=$dog['kennel'];
	
}
//        данные из поля      TT  папы
$dogs_d =  R::getAssoc('SELECT *  FROM animals WHERE id = :id',
        [':id' => $id_d]);  
foreach ($dogs_d as $dog) {
	//echo $dog['name'];
	//echo $dog['tt'];
	$TT_d=$dog['tt'];
	$AA_d=$dog['aa'];
	$BB_d=$dog['bb'];
	$MM_d=$dog['mm'];
	$WW_d=$dog['ww'];
	$FF_d=$dog['ff'];
	$hr_on=$dog['hr'];
	
}
//echo "<br> mum: " . $TT_m;
//echo "<br> dad: " . $TT_d;


$tt_new = breedding($TT_d,$TT_m,'TT','tt','Tt');
echo "<br> tt_new: " . $tt_new;
$aa_new = breedding($AA_d,$AA_m,'AA','aa','Aa');
echo "<br> aa_new: " . $aa_new;
$bb_new = breedding($BB_d,$BB_m,'BB','bb','Bb');
echo "<br> bb_new: " . $bb_new;
$mm_new = breedding($MM_d,$MM_m,'MM','mm','Mm');
echo "<br> mm_new: " . $mm_new;
$ww_new = breedding($WW_d,$WW_m,'WW','ww','Ww');
echo "<br> ww_new: " . $ww_new;
$ff_new = breedding($FF_d,$FF_m,'FF','ff','Ff');
echo "<br> ff_new: " . $ff_new;

$pol=f_bdika_sex();
echo '=================';
var_dump($hr_on);
var_dump($hr_ona);


echo '=================';
echo $hr_new=gol_pooh($hr_on,$hr_ona);
echo '=================';
$birth=date("Y-m-d");

//////////////////////////////////////////////////////////// обновление данных во всей таблице по столбцу

//Создаем объект (bean) работающий с таблицей dogs

//выставляем значение полей, тип поля будет автоматически модифицирован в зависимости от значения
$dogs=R::dispense( 'animals' );
//$dogs->name='';
$dogs->race=$race_m;
$dogs->breeder=$breeder_m;
$dogs->owner=$owner_m;
$dogs->kennel=$kennel_m;
$dogs->birth=$birth;
$dogs->now='0';

$dogs->aa=$aa_new;
$dogs->bb=$bb_new;
$dogs->ww=$ww_new;
$dogs->tt=$tt_new;
$dogs->mm=$mm_new;
$dogs->ff=$ff_new;

$dogs->id='';
$dogs->mum=$id_m;
$dogs->dad=$id_d;


$dogs->sex=$pol;
$dogs->hr=$hr_new;

$dogs->status='1';




//Сохраняем, первичный ключ id создается автоматически
$id = R::store( $dogs );
return $id;



/*
$id=R::count('animals'); //counts all pages
var_dump($id);

for($i=1;$i<=$id;$i++){

$dog = R::dispense( 'animals'); 
$dog->status = '1';
$dog->id=$i;
R::store( $dog );
}
*///////////////////////////////////////////////////////////
//Создаем объект (bean) работающий с таблицей book
//$book = R::dispense( 'dogs' );

//выставляем значение полей, тип поля будет автоматически модифицирован в зависимости от значения
//$book->tt = $tt_new;


//Сохраняем, первичный ключ id создается автоматически
//$id = R::store($book);

///////////////////////////////////////////////////////////
//Создаем объект (bean) работающий с таблицей book

//выставляем значение полей, тип поля будет автоматически модифицирован в зависимости от значения
//$book->aa = $tt_new2;


//Сохраняем, первичный ключ id создается автоматически
//$id = R::store($book);

}

function find_where($id,$value){
	   $row = R::getRow( 'SELECT * FROM animals WHERE id = :id',
       [':id' => $id]);
      // debug($row);
       
       switch ($value) {
            case 'url':
              return $row[$value];
              break;
            case 'litter':
              return $row[$value];
              break;
            case 'puppy':
              return $row[$value];
              break;
            case 'status':
              return $row[$value];
              break;
            case 'ff':
              return $row[$value];
              break;
            case 'ww':
              return $row[$value];
              break;
            case 'mm':
              return $row[$value];
              break;
            case 'tt':
              return $row[$value];
              break;
            case 'bb':
              return $row[$value];
              break;
            case 'aa':
              return $row[$value];
              break;
            case 'hr':
              return $row[$value];
              break;
            case 'dad':
            	if ('0'!==$row[$value])
              			return $row[$value];
              	else 
              			return 'нет данных';
              
              break;
            case 'mum':
             	if ('0'!==$row[$value])
              			return $row[$value];
              	else 
              			return 'нет данных';
              
              break;
            case 'now':
              return $row[$value];
              break;
            case 'birth':
              return $row[$value];
              break;
            case 'kennel':
              return $row[$value];
              break;
            case 'owner':
              return $row[$value];
              break;
            case 'breeder':
              return $row[$value];
              break;
            case 'race':
              return $row[$value];
              break;
            case 'sex':
              return $row[$value];
              break;
            case 'name':
              return $row[$value];
              break;
            case 'id':
              return $row[$value];
              break;
        }
}
?>