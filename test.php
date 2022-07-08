
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
<?php

$owner = 'Nesh';
$green = 'green';
$red = 'red';
$blue = 'blue';
$numR =rand(1,5); 
$item = new OwnerItems();
// $itm = $item->retIdOwnerItems(10,$owner);
// var_dump($itm);
// $count = $item->retCountItemByOwner(10,$owner);
// //var_dump($count);
// if(FALSE != $count)
// {
//     echo $count;
// }
// else
// echo "такого итема нету";
// $id = $item->retItemIdByName('green');
// var_dump($id);

// echo '<hr>';
// $idStroki = $item->retIdOwnerItems($nameItem, $owner);
// var_dump($idStroki);
//echo '<br>was ' . $item->retCountItemByOwner($nameItem, $owner);
//$item->addItemToOwner($nameItem, $owner,100);
//echo '<br>now ' . $item->retCountItemByOwner($nameItem, $owner);
//$item->removeItemByOwner($nameItem, $owner, 10);
//echo '<br>now - ' . $item->retCountItemByOwner($nameItem, $owner);

?>


<script src="https://use.fontawesome.com/e1a1261a75.js"></script>
      <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
    <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
</body>
</html>