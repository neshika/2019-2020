<?php

function test(){
	echo 'подключен файл functions.php';
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
	
	/*$beans = R::findMulti( 'book,page', '
        SELECT book.*, page.* FROM book
        INNER JOIN page.book_id = book.id
        WHERE book.category = ?
    ', [ $cat] );

     $book  = R::findOne( 'book', ' title = ? ', [ 'SQL Dreams' ] );

     $books  = R::find( 'book', ' rating < :rating ', [ ':rating' => 2 ] );

     $needles = R::find('needle',' haystack = :haystack
	ORDER BY :sortorder',
	array( 'sortorder'=>$sortorder, ':haystack'=>$haystack ));
    */

     //$array = R::find ($tabl, 'sex =:pol and breeder=:own', array(':pol'=> $param, ':own' => $owner));
	// R::getAll( 'SELECT * FROM page WHERE title = :title',
      //  [':title' => 'home']  
    //);
	return R::getAssoc ('SELECT id,name FROM animals WHERE sex =:pol and breeder=:own', array(':pol'=> $param, ':own' => $owner));
	//debug($array);
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
 /*Функция возвращает имя владельца по собаке по ее ID*/
function ret_breeder($id){
	$string =  R::getCol( 'SELECT breeder FROM animals WHERE id = :id',
        [':id' => $id]); 
		
	      return $string [0];
                
}
/*Функция возвращает пол собаки по ее ID*/
function ret_sex($id){
	$string =  R::getCol( 'SELECT sex FROM animals WHERE id = :id',
        [':id' => $id]); 
		
	      return $string [0];
                
}
/*Функция возвращает имя собаки по ее ID*/
function ret_name($id){
	If (0!=$id){
	$string =  R::getCol( 'SELECT name FROM animals WHERE id = :id',
        [':id' => $id]); 
		return $string[0];
	}
	else return 'не извесно';
                
}
/*Функция возвращает название питомника собаки по ее ID*/
function ret_ken($id){
	$string =  R::getCol( 'SELECT kennel FROM animals WHERE id = :id',
        [':id' => $id]); 
		
	      return $string [0];
                
}
/*Функция возвращает дата создания питомника собаки по ее ID*/
function ret_birth($id){
	$string =  R::getCol( 'SELECT birth FROM animals WHERE id = :id',
        [':id' => $id]); 
			
	      return $string [0];
                
}
/*Функция возвращает маму собаки по ее ID*/
function ret_mum($id){
	$string =  R::getCol( 'SELECT mum FROM animals WHERE id = :id',
        [':id' => $id]); 
			if(0==$string [0]) return 0;
			else  return (int)$string [0];
                
}
/*Функция возвращает папу собаки по ее ID*/
function ret_dad($id){
	$string =  R::getCol( 'SELECT dad FROM animals WHERE id = :id',
        [':id' => $id]); 
			
	      if(0==$string [0]) return 0;
			else  return (int)$string [0];
                
}
/*Функция возвращает название картинки в зависимости от пола собаки по ее ID*/
function ret_pic($id){
	If('сука'==ret_sex($id))
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

/*                                             *************************    функции для вывода картинки на экран  */
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




// проверка голая или пух=========================================== вывод картинки по параметрам
function f_get_image($Hr,$W,$F,$B,$T,$M){
	//echo 'f_get_image($Hr,$W,$F,$B,$T,$M);';
	
		if ($Hr=="hrhr") // если пух
			return f_pooh($W,$F,$B,$T,$M);
		else 
			return f_gol($W,$F,$B,$T,$M);
			
}


//проверка голой=======================================================
function f_gol($W,$F,$B,$T,$M){
	if ($W=='ww'){	// если не белый цвет
		if ($F=='ff'){	//если не рыжий
			if ($B=='bb'){	//шоко
				return shoko_ttmm();
			}
			if (($B == 'Bb') || ($B == 'BB')){ //черный
				return black_ttmm();
			}
		}
					
		else{
			return orange_ttmm($M);
		}
	}
				
	else{
		//белая
		return white_ttmm($B,$T,$M);
	}
}


//проверка пуха===============================================================
function f_pooh($W,$F,$B,$T,$M){
		
	if($W=='ww')
		return orange($F,$B,$M);
	
	else
		return hr_white_ttmm($B);


	

}
/////////////////////////////////////////////////1.пуховки hrhr///////////////////////////////////////////

//1.1 пуховки белый (шоко/черный)
function hr_white_ttmm($B){	
	if ($B=='bb')	//шоко
		return $GLOBALS['hr_white_sh'];
	else 			//черный
		return $GLOBALS['hr_white'];
}
//1.2 пуховки рыжий (рыжий/рыжий с пятнами)
function hr_orange_ttmm($M){
	if ($M!='mm')	//если пятна
		return $GLOBALS['hr_orangeMM'];
	else           //без пятен
		return $GLOBALS['hr_orange'];
}
//1.3 пуховки шоко (шоко/шоко с пятнами)
function hr_shoko_ttmm($M){
	if ($M!='mm')	//если пятна
		return $GLOBALS['hr_shokoMM'];
	else           //без пятен
		return $GLOBALS['hr_shoko'];
}
//1.3 пуховки черный (черный/черный с пятнами)
function hr_black_ttmm($M){
	if ($M!='mm')	//если пятна
		return $GLOBALS['hr_blackMM'];
	else           //без пятен
		return $GLOBALS['hr_black'];
}

/////////////////////////////////////////////////2.голые Hrhr///////////////////////////////////////////

//1.1 голый белый (шоко/черный)
function white_ttmm($B,$T,$M){	
	if(($T=="tt") && ($M=="mm")){
			return $GLOBALS['white'];
		}
		elseif (($T=="tt") && ($M!="mm")){
			if($B == "bb")
				return $GLOBALS['shokoMM'];
			if(($B == "BB") || ($B == "Bb"))
				return $GLOBALS['blackMM'];
		}
		elseif (($T!="tt") && ($M=="mm")){
			if($B == "bb") 
				return $GLOBALS['shokoTT'];
			if(($B == "BB") || ($B == "Bb"))
				return $GLOBALS['blackTT'];
		}
		else{
			if($B == "bb") 
				return $GLOBALS['shokoTTMM'];
			if(($B == "BB") || ($B == "Bb"))
				return $GLOBALS['blackTTMM'];
		}
}
//1.2 пуховки рыжий (рыжий/рыжий с пятнами)
function orange_ttmm($M){
	if ($M!='mm')	//если пятна
		return $GLOBALS['orangeMM'];
	else           //без пятен
		return $GLOBALS['orange'];
}
//1.3 пуховки шоко (шоко/шоко с пятнами)
function shoko_ttmm(){
	return $GLOBALS['shoko'];
}
//1.3 пуховки черный (черный/черный с пятнами)
function black_ttmm(){
	return $GLOBALS['black'];
}


//////////////////////////////

function orange($F,$B,$M){
	if ($F!='ff')
		return hr_orange_ttmm($M);
	else 
		return hr_shoko_black($B, $M);


}
function hr_shoko_black($B, $M){
	if ($B=='bb')	//шоко
		return hr_shoko_ttmm($M);
	else  //черный
		return hr_black_ttmm($M);
}

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
?>