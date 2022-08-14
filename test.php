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

     <link rel="stylesheet" type="text/css" href="css/main.css" />

</head>
<body>
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
                    <li><a href="/greateRes.php"><span>создать рецепт</span></a></li>
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
    <br>
    <form method="POST">
        <button type="submit" class="btn btn-dark" name="walk">Гулять <i class="fa fa-umbrella" aria-hidden="true"></i></button>
    </form>
    <?php 
      if(isset($_POST['walk'])){
        echo 'кнорка нажата';
        $id = 5;
        $owner = 'Nesh';
        $id_res = randoNumRes();
        ?><div><img src="<?php echo picRes($id_res); ?>" height="50px" accesskey="название"></div><?php
        randoRGB($id,$id_res,$owner);
      }
      /* Функция рандомно раздает количество красных, зеленых и синих шаров */
      function randoRGB($id_dog,$id_res,$owner){
        //echo ' now start ';
      $tbl = new Tabl();
      $itm = new OwnerItems();
      $cnt1 = $itm->retCountItemByOwner('red',$owner);
      $cnt2 = $itm->retCountItemByOwner('green',$owner);
      $cnt3 = $itm->retCountItemByOwner('blue',$owner);
      echo " было $cnt1 + $cnt2 + $cnt3 <br>";
      $count1 = $tbl->retCellById($id_res,'count1','resepts');
      $count2 = $tbl->retCellById($id_res,'count2','resepts');
      $count3 = $tbl->retCellById($id_res,'count3','resepts');
     //echo " было $count1 + $count2 + $count3 <br>";
     $count1 = Rand(1,$count1);
     $count2 = Rand(1,$count2);
     $count3 = Rand(1,$count3);
     echo " сколько добавить $count1 + $count2 + $count3 <br>";

       $itm->addItemToOwner('red',$owner,$count1); 
       $itm->addItemToOwner('green',$owner,$count2); 
       $itm->addItemToOwner('blue',$owner,$count3); 

       $cnt1 = $itm->retCountItemByOwner('red',$owner);
       $cnt2 = $itm->retCountItemByOwner('green',$owner);
       $cnt3 = $itm->retCountItemByOwner('blue',$owner);
       echo "  стало  $cnt1 + $cnt2 + $cnt3 <br>";
        
      }
      // получаем нномер рандомного рецепта(предмета) который принесла собака
      function randoNumRes(){
        $itm = new OwnerItems();
        $num = Rand(11,17);
        return $num;
      }
      // отрисовываем ранжомный предмет,который принесла сообака
      function picRes($num){
        $itm = new OwnerItems();
        return $itm->retUrlByName($itm->retReseptNameById($num));
      }
     
    ?>


</div>
<script src="https://use.fontawesome.com/e1a1261a75.js"></script>
      <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
    <script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
</div>
</body>
</html>