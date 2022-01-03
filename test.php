
<?php 
/*require_once(__DIR__ . '/libs/up.php');*/
require_once(__DIR__ . '/db.php');
require_once(__DIR__ . '/includes/func.php');


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Симулятор заводчика</title>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
     <link rel="stylesheet" type="text/css" href="css/test5.css" />
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/8fea78c7d8.css">

</head>
<body>
  
<div id="container">
    <div id="header">
        <table width="900">
            <tr>
                <td><h1>Симулятор заводчика</h1></td>
                <h2><td><img src="pici/test2.png"><img src="pici/test.png"></td></h2>
            </tr>
        </table>
                
    </div>
    <div id="nav">
        <ul>
            <li><a href="/index.php"><span>главная</span></a></li>
            <li><a href="/office.php"><span>офис</span></a></li>
            
            <li class="dropdown">
                <a href="/kennel.php"><span>КХС</span></a>
                <ul>
                    <li><a href="/kennel.php"><span>питомник</span></a></li>
                    <li><a href="/kennel_f.php"><span>суки</span></a></li>
                    <li><a href="/kennel_m.php"><span>кобели</span></a></li>
                    <li><a href="/kennel_p.php"><span>щенки</span></a></li>
                    <li><a href="shelter.php"><span>приют</span></a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="/mumdad.php"><span>АГТ</span></a>
                <ul>
                    <li><a href="#"><span>суки</span></a></li>
                    <li><a href="#"><span>кобели</span></a></li>
                    <li><a href="#"><span>щенки</span></a></li>
                    <li><a href="#"><span>история породы</span></a></li>
                    <li><a href="#"><span>расчет окраса</span></a></li>
                </ul>
            </li>
                    <li><a href="/logout.php">выйти</a></li>
            </ul>
    </div>
</div>

<div class="progress-bar">
  <span class="bar">
    <span class="progress"></span>
  </span>
</div>
<div id="content">
<?php
//phpinfo(); 
//$adm = new Adminka();
//$adm->randoTypeAll();
$kennel = new Kennels;
$dog = new Dna;
$prt = new PrintDog;
$owner = 'кто-то';

$count = $kennel->retCountDog($owner); //количество собак в питомнике
$array_dogs = $kennel->retAllDogsByKennel($owner); //перечень собак из питомника
//debug($array_dogs); 
$num = Rand(1 , $count); //рандомное количество id собак
//$num = 3;
$rand_arr = array_rand($array_dogs, $num); //получаем ИД собак для последующего вытягивания из общего количества.

//var_dump($rand_arr);
$arr_char = [];

if(is_array($rand_arr)){
    foreach ($rand_arr as $val) {
        foreach($array_dogs as $id => $value){
            if($val == $id){

               // echo '<br>id ' . $value . ' его ДНК ' . $dog->retDnaId($value) . ' его характер ' . $dog->retCharacter($value) . "<br>\r\n";
                if('Сангвиник' == $dog->retCharacter($value)){
                    echo 'Сегодня у сангвиника <strong>' . $prt->nameLink($value) . '</strong>  состояние веселое<br>';
                   $text = 'Сегодня У ' . $dog->retName($value) . ' состояние веселое.';
                   $arr_char[$value] = $text;
                }
                if('Холерик' == $dog->retCharacter($value)){
                    echo 'Сегодня собака <strong>' . $prt->nameLink($value) . '</strong> выла всю ночь(собака холерик), соседи вызвали полицию. Оплатить штраф? да/нет<br>';
                    $text = 'Сегодня собака ' . $dog->retName($value) . ' выла всю ночь, соседи вызвали полицию.';
                   $arr_char[$value] = $text;
                }
                if('Меланхолик' == $dog->retCharacter($value)){
                    echo 'Сегодня собаке <strong>' . $prt->nameLink($value) . '</strong> ничего не хотелось делать!(собака-меланхолик)<br>';
                    $text = 'Сегодня собаке ' . $dog->retName($value) . ' ничего не хотелось делать!';
                   $arr_char[$value] = $text;
                }
                if('Флегматик' == $dog->retCharacter($value)){
                    echo 'Сегодня флегматик <strong>' . $prt->nameLink($value) . '</strong> сидит около двери и ждет тебя... может поиграем? да/нет <br>';
                    $text = 'Сегодня ' . $dog->retName($value) . ' сидит около двери и ждет тебя...';
                   $arr_char[$value] = $text;
                }
            }
        }
    }
}

else{
    foreach($array_dogs as $id => $value){
        if($rand_arr == $id){
           // echo '<br>id ' . $value . ' его ДНК ' . $dog->retDnaId($value) . ' его характер ' . $dog->retCharacter($value) . "<br>\r\n";
           if('Сангвиник' == $dog->retCharacter($value)){
            echo 'Сегодня у сангвиника <strong>' . $prt->nameLink($value) . '</strong>  состояние веселое<br>';
           $text = 'Сегодня У ' . $dog->retName($value) . ' состояние веселое.';
           $arr_char[$value] = $text;
        }
        if('Холерик' == $dog->retCharacter($value)){
            echo 'Сегодня собака <strong>' . $prt->nameLink($value) . '</strong> выла всю ночь(собака холерик), соседи вызвали полицию. Оплатить штраф? да/нет<br>';
            $text = 'Сегодня собака ' . $dog->retName($value) . ' выла всю ночь, соседи вызвали полицию.';
           $arr_char[$value] = $text;
        }
        if('Меланхолик' == $dog->retCharacter($value)){
            echo 'Сегодня собаке <strong>' . $prt->nameLink($value) . '</strong> ничего не хотелось делать!(собака-меланхолик)<br>';
            $text = 'Сегодня собаке ' . $dog->retName($value) . ' ничего не хотелось делать!';
           $arr_char[$value] = $text;
        }
        if('Флегматик' == $dog->retCharacter($value)){
            echo 'Сегодня флегматик <strong>' . $prt->nameLink($value) . '</strong> сидит около двери и ждет тебя... может поиграем? да/нет <br>';
            $text = 'Сегодня ' . $dog->retName($value) . ' сидит около двери и ждет тебя...';
           $arr_char[$value] = $text;
        }
        }
    }


}

var_dump($arr_char);
    // if(0 != $value) {
    //     echo '<br>id ' . $value . ' его ДНК ' . $dog->retDnaId($value) . ' его характер ' . $dog->retCharacter($value) . "<br>\r\n";
    // if('Сангвиник' == $dog->retCharacter($value)){
    //     echo 'Сегодня у сангвиника <strong>' . $dog->retName($value) . '</strong>  состояние веселое<br>';
    // }
    // if('Холерик' == $dog->retCharacter($value)){
    //     echo 'Сегодня собак <strong>' . $dog->retName($value) . '</strong> холерик выла всю ночь, соседи вызвали полицию. Оплатить штраф? да/нет<br>';
    // }
    // if('Меланхолик' == $dog->retCharacter($value)){
    //     echo 'Сегодня собаке <strong>' . $dog->retName($value) . '</strong> - меланхолик. Ничего не хотелось делать!<br>';
    // }
    // if('Флегматик' == $dog->retCharacter($value)){
    //     echo 'Сегодня флегматик <strong>' . $dog->retName($value) . '</strong> сидит около двери и ждет тебя... может поиграем? да/нет <br>';
    // }
    // }
	
//}

?>

</div>




<script src="https://use.fontawesome.com/e1a1261a75.js"></script>
      <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
    <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
</body>
</html>