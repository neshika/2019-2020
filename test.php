<?php 
/*require_once(__DIR__ . '/libs/up.php');*/
require_once(__DIR__ . '/db.php');
require_once(__DIR__ . '/includes/func.php');
$itm = new OwnerItems(); 
$tbl = new Tabl();



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Симулятор заводчика</title>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
     
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
        <tr><td><?php $res = R::findAll('resepts');
    
                foreach ($res as $key=>$value){
                    $_GET['id'] = $itm->retReseptIdByName($value['name']);
                    echo '<a href="http://dog.ru/test.php?value=' .  $_GET['id']. '">' . $value['name'] . '<br></a>';

                    
                }
               ?>
            </td>
            <td><h1>создать</h1>
<div>поиск 
    <input type="text" placeholder="поиск"> <button type="submit" name="find">поиск</button> 
</div><br>
<div><img src="<?php  echo $itm->retUrlByName($itm->retReseptNameById($_GET['value'])) ?>" height="100px" accesskey="название">
    <?php if (isset($_GET['value'])){
            $_GET['name'] = $itm->retReseptNameById($_GET['value']);
            echo $_GET['name'];
            echo ' : ' . $tbl->retCellById($_GET['value'],'info','resepts');
     //var_dump($tbl->retCellById($_GET['value'],'info','resepts'));
    }?></div>
<div>Материалы:</div>
<img src="<?php $id_val1 = $tbl->retCellById($_GET['value'],'val1','resept'); echo $itm->retUrlById($id_val1); ?>" height="100px" accesskey="название">
<img src="<?php $id_val2 = $tbl->retCellById($_GET['value'],'val2','resept'); echo $itm->retUrlById($id_val2); ?>" height="100px" accesskey="название">
<img src="<?php $id_val3 = $tbl->retCellById($_GET['value'],'val3','resept'); echo $itm->retUrlById($id_val3); ?>" height="100px" accesskey="название">
<img src="<?php $id_val4 = $tbl->retCellById($_GET['value'],'val4','resept'); echo $itm->retUrlById($id_val4); ?>" height="100px" accesskey="название">

<br><div>кол-во предметов<input type="text"><button type="submit" name="plas">+</button><button type="submit" name="minus">-</button><button type="submit" name="min">min</button><button type="submit" name="max">max</button></div>
<p>
<button type="submit" name="greate">создать</button><button type="submit" name="greateAll">создать все</button><button type="submit" name="close">закрыть</button>
</p</form>



<?php



?>


<script src="https://use.fontawesome.com/e1a1261a75.js"></script>
      <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
    <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
</div>
</body>
</html>