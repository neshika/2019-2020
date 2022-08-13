<?php 
/*require_once(__DIR__ . '/libs/up.php');*/
require_once(__DIR__ . '/db.php');
require_once(__DIR__ . '/includes/func.php');
$itm = new OwnerItems(); 
$tbl = new Tabl();

if (isset($_POST['find']) and (!empty($_POST['textRes']))) {
    $_GET['value'] = $itm->retReseptIdByName($_POST['textRes']);
    $_GET['id'] = $_GET['value'];
    //var_dump($_GET);
}
if(isset($_POST['find']) and (empty($_POST['textRes']))){
    //echo 'название не введено';
    ?><script>
            alert("Введите навание предмета для поиска");
        </script><?php
        //!!!скинуть все настройки см. книгу
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Симулятор заводчика</title>

     <link rel="stylesheet" type="text/css" href="css/main.css" />

</head>
<body>
 <style>
    .imgblock {
    position: relative;
    display: inline-block;
}

.imgblock img {
    height: 100px;
   /* width: 250px;*/
}
.imgblock span {
    /*background: rgba(0,0,0,0.7); (полупрозрачность)*/
    background: #222;
    color: #fff;
    border-radius: 2px;
    position: absolute;
    right: 0;
    bottom: 10px;
    font-size: 16px;
    padding: 3px 5px;
}
 </style> 
<div id="container">
    <div id="header">
        <table width="900">
            <tr>
                <td><h1>Симулятор заводчика</h1></td>
                <h2><td><img src="pici/left.png"><img src="pici/right.png"></td></h2>
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

<!--<div class="progress-bar">
  <span class="bar">
    <span class="progress"></span>
  </span>
</div>
-->

<div id="content">
<img src="pici/resnuh.png" alt="альтернативный текст" height="100px">
<img src="pici/resspd.png" alt="альтернативный текст" height="100px">
<img src="pici/restrn.png" alt="альтернативный текст" height="100px">
<img src="pici/поиск.png" alt="альтернативный текст" height="100px">
<img src="pici/spd.png" alt="альтернативный текст" height="100px">
<img src="pici/fnd.png" alt="альтернативный текст" height="100px">
<img src="pici/lck.png" alt="альтернативный текст" height="100px">
<br><hr>

<form action="test.php" method="GET">
    <table border="1">
        <tr><td><?php listResepts();?>
            </td>
            <td><h1>создать</h1>
<div>поиск 
</form>
<form action="test.php" method="POST">    
    <input type="text" placeholder="поиск" name="textRes"><button type="submit" name="find">поиск</button> 
</form>
<form action="test.php" method="GET">
</div><br>
<div><img src="<?php echo bdika();?>" height="100px" accesskey="название"><?php echo retNameInfoRes();?></div>
<div>Материалы:</div>
<div class='imgblock'>
    <?php insertPic($_GET['value'],'val1','count1');?>
</div>
<div class='imgblock'>
    <?php insertPic($_GET['value'],'val2','count2');?>
</div>
<div class='imgblock'>
    <?php insertPic($_GET['value'],'val3','count3');?>
</div>
<div class='imgblock'>
    <?php insertPic($_GET['value'],'val4','count4');?>
</div>



<br><div>кол-во предметов<input type="text"><button type="submit" name="plas">-</button><button type="submit" name="minus">+</button><button type="submit" name="min">min</button><button type="submit" name="max">max</button></div>
<p>
<button type="submit" name="greate">создать</button><button type="submit" name="greateAll">создать все</button><button type="submit" name="close">закрыть</button>
</p></form>

<?php

/*функция проверяет есть ли у данного итема ссылка на картинку, если нету, рисует пустой квадрат(blank2.png)*/
function retPicItem($val){
    $tbl = new Tabl();
    $itm = new OwnerItems();
    if (isset($_GET['value'])){
        $id_val = $tbl->retCellById($_GET['value'],$val,'resept');
        if(isset($id_val)){
            return $itm->retUrlById($id_val);
        }
        else{
            return '/Pici/blank2.png';
        }
    }
    
    
}
function bdikaZnach($id,$val){
    $tbl = new Tabl();
    $id_val = $tbl->retCellById($id,$val,'resept');
    if(isset($id_val)){
        return $id_val;
    }
    else{
        return false;
    }    
}
/*функция проверяет есть ли у данного рецепта по ШЬЕМУ(val) количество и выводит его на экран*/
function retCountItem($id,$count){
    $tbl = new Tabl();
    $itm = new OwnerItems();
    $tabl = 'resepts';
    return $tbl->retCellById($id, $count, $tabl);
  
}
/*фунуия проверяет есть ли выбранный рецепт или страница только ззагружена*/
function bdika(){
    if(false == retPicRes()){
        return 'Необходимо выбрать рецепт справа';
    }
    else{
        return retPicRes();
    }
}
/*функция проверяет есть ли у данного рецепта(итема) ссылка на картинку, если нету, рисует пустой квадрат(blank2.png)*/
function retPicRes(){
    $itm = new OwnerItems();
    if(isset($itm) && isset($_GET['value'])){
        return $itm->retUrlByName($itm->retReseptNameById($_GET['value'])); 
    }
    else{
        return false;
    }
    
}
/*функция проверяет есть ли у данного рецепта название и выводит текст название и его описание из поля info*/
function retNameInfoRes(){
    $tbl = new Tabl();
    $itm = new OwnerItems();
    if (isset($_GET['value'])){
        $_GET['name'] = $itm->retReseptNameById($_GET['value']);
        $array = $_GET['name'] . ' : ' . $tbl->retCellById($_GET['value'],'info','resepts');
        return $array;
    }
    else {
        return 'Необходимо выбрать рецепт справа';
    }
}
/* функция отрисовывает список рецептов в алфавитном порядке и в виде ссылки*/
function listResepts(){
    $itm = new OwnerItems();
    $res = R::getAll('SELECT * FROM `resepts` ORDER BY name');
    foreach ($res as $key=>$value){
    $_GET['id'] = $itm->retReseptIdByName($value['name']);
    echo '<a href="http://dog.ru/test.php?value=' .  $_GET['id']. '">' . $value['name'] . '<br></a>';
    
    }
}
function insertPic($id,$val,$count){
    $tbl = new Tabl();
    $itm = new OwnerItems();
    if(false!= bdikaZnach($id,$val)):?>
        <img src="<?php echo retpicItem($val);?>" accesskey="название">
        <?php 
        $id_item = $tbl->retCellById($id,$val,'resepts');
        $item = $itm->retNameById($id_item);
        $owner = ret_owner();
        $nujno = retCountItem($id,$count); 
        $est = $itm->retCountItemByOwner($item, $owner);
        $color = 'white';
        if($nujno > $est){
            $color = 'red';
        
        }
        echo "<span style=\"color:$color;\">$nujno  / $est </span>";
        endif;
}



?>


<script src="https://use.fontawesome.com/e1a1261a75.js"></script>
      <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
    <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
</div>
</body>
</html>