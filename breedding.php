<?php
require "db.php";
require "includes/functions.php";
 //R::fancyDebug( TRUE );
ini_set('display_errors',1);
error_reporting(E_ALL);


?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<title>Cимулятор заводчика</title>
</head>
<body>

 <?php
 
 echo "Вяжем двух собак.";

 $temp=(int)$_SESSION['para'];
 $temp2=(int)$_POST['ONONA'];

 $_SESSION['owner']=find_where('animals', $temp,'owner');
 
  if ('сука' === find_where('animals',$temp,'sex')){
            $id_m = $temp;
            $id_d = $temp2;
                   
      }
  if ('кобель' === find_where('animals',$temp,'sex')){
           $id_m = $temp2;
            $id_d = $temp; 
      } 
 
// ******************** вывод картинки мамы и папы по id  из базы *****************-->  
?>  
<div id="all_breed">

<div>
<?php if(bdika_balance($_SESSION['owner'],5000)){ //проверка остатка средств на вязку. если хватает активна кнопка "ВЯЗКА" ?>
            <form method="POST" action="/NewDog.php">
                <input type="submit" name="nazvanie_knopki" value="Вяжем" class="knopka"/>
            </form>
<?php }else 
      echo 'не достаточно средст для вязки!';

?>
<form method="POST" action="/kennel.php">
    <input type="submit" name="exit" value="Вернуться" class="knopka"/>
</form>
</div>

    <div id="left_breed">
        
    <?php echo '<br><br><br><br>Мама: ' . var_dump($id_m) . '<br>';
        dog_pic($id_m);
        detalis($id_m);
        f_tree($id_m);
        ?>
        <br>       
      
    </div>
    <div id="right_breed">
          <?php echo '<br><br><br><br>Папа: ' . var_dump($id_d);
         dog_pic($id_d);
        detalis($id_d);
        f_tree($id_d);
          ?>
         <br>      

    </div> 
</div>
 <?php 


$_SESSION['id_m']=$id_m;
$_SESSION['id_d']=$id_d;



?>
 <?php
 $plus=ancestry ($id_m,$id_d);
       echo '<br>'. $plus;
        if(0==$plus){
          ?><h3 style="color:red"><?php echo '<br>При вязки близкородственных партнеров возможны ухудшения качеств и получение мутаций! Будьте осторожнее!';?></h3><?php
        }
?>


</body>
</html>



