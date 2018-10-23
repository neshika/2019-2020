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
 $temp=(int)$_SESSION['para'];
$temp2=(int)$_POST['ONONA'];

 $_SESSION['owner']= ret_Cell('owner', $temp,'animals');
 
  if ('0' === ret_sex($temp)){
            $id_m = $temp;
            $id_d = $temp2;
                   
      }
  if ('1' === ret_sex($temp)){
           $id_m = $temp2;
            $id_d = $temp; 
      } 
 
// ******************** вывод картинки мамы и папы по id  из базы *****************-->  
?>  
<table>
    <colgroup>
        <col span='2' style="background: khaki"></colgroup>
    <caption><h1>Вяжем двух собак</h1></caption>
        <tr>
            <th><h3>Мама: <?php echo $id_m;
                            dog_pic($id_m);
                            detalis($id_m);
                            f_tree($id_m);    ?>
                    
                </h3>
            <th>
                <h3>Папа:<?php echo $id_d;
                            dog_pic($id_d);
                            detalis($id_d);
                            f_tree($id_d);?>
                 </h3>
            </th>
            <th>
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
            </th>
              
        </tr>
</table>
 <?php 
$_SESSION['id_m']=$id_m;
$_SESSION['id_d']=$id_d;

        if(bdika_mutation($id_m,$id_d)){  //если вернулся 1, то есть мутация
          ?><h3 style="color:red"><?php echo '<br>При вязки близкородственных партнеров возможны ухудшения качеств и получение мутаций! Будьте осторожнее!';?></h3><?php
        }
?>
</body>
</html>



