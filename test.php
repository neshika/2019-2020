
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
<?php


$id = 1;
$array_fml = R::getRow('SELECT * FROM `family` WHERE `id` = ? ', [$id]);
       // echo 'что в строке'  . $id . '<br>';
        debug($array_fml);

        $fml = R::dispense('family');
            
        foreach ($array_fml as $key => $value)
        {
            
            if ($key != 'id'){
                //echo $key . " = " . $value . ' ';
                $fml->$key = 0;
            }
            
        }
        $id_new_fml = R::store($fml);
        echo 'new afamily ' . $id_new_fml;

?>


<script src="https://use.fontawesome.com/e1a1261a75.js"></script>
      <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
    <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
</body>
</html>