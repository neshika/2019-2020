<?php
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');

//debug($_SESSION);

if(isset ($_POST['exit'])){ //если нажимали actmatting
    $id = $_SESSION['id_m'];
    $id_p = $_SESSION['id_d'];
}
else{   //если перешли с кнопки "вязка"
    $id=(int)$_POST['ONONA'];
    $id_p=(int)$_POST['para'];
}

var_dump($id);
var_dump($id_p);

$dog = new Dog;
$print = new PrintDog;
$user = new Users;
$mat = new Matting;
$owner = $dog->retOwner($id);

 
if ('0' == $dog->retSex($id)){
        $id_m = $id;
        $id_d = $id_p;
}
if ('1' == $dog->retSex($id)){
           $id_m = $id_p;
           $id_d = $id; 
} 
 

?>

<style>
.cont{
    width: 800px;
    height: auto;
    /*background: #D0D0D0;*/
    padding-left: 5px;
    margin: 0 auto;
    -webkit-box-shadow: 5px 5px 15px 5px #727272; 
    box-shadow: 5px 5px 15px 5px #727272;
        /*border-radius: 15px;*/
}
table{
   
}
#tr1 {
  /* border: 1px solid #D0D0D0; /*серые стрки между таблицей*/
    vertical-align: top; /* Выравнивание по верхнему краю ячейки */
}
#col1 {
width: 250px;
 border: 1px solid #D0D0D0; /*серые стрки между таблицей*/
/*background: #F5F5DC; /* Цвет фона первой колонки */
}
#col2 {
 border: 1px solid #D0D0D0; /*серые стрки между таблицей*/
/*background: #FFEBCD; /* Цвет фона второй колонки */
}
#col3 {
 width: 250px;
/*background: #F5F5DC; /* Цвет фона третьей колонки */
 border: 1px solid #D0D0D0; /*серые стрки между таблицей*/
}

</style>
<div class="cont"><h1 align="center"> Вяжем двух собак</h1>
<table width="100%" cellpadding="5" cellspacing="0">
<tr id="tr1">
    <td id="col1"><h3 align="center">Мама: </h3>
    <?php $print->picLink($id_m, '50%');
    echo '<br>'. $id_m .'<br>'. $dog->retName($id_m) . '<br>щенков ' . $print->retPuppy($id_m);
       
           /*print_lit_pup($id_m);
           detalis($id_m);
           f_tree($id_m);  */  ?>
    </td>
     <td id="col2"><h3 align="center">Особенности: </h3>
        <?php
        $_SESSION['id_m']=$id_m;
        $_SESSION['id_d']=$id_d;
                  
                    echo ' самка: ' . $mat->bdikaForBreed($id_m);
                    echo ' <br>самец: ' . $mat->bdikaForBreed($id_d);
                        
                   if($mat->bdikaMutation($id_m, $id_d)):  //если вернулся 1, то есть мутация ?>
                        <h3 style="color:red" align="center">При вязки близкородственных партнеров возможны ухудшения качеств и получение мутаций! Будьте осторожнее!</h3>
              <?php Endif;
              
                    echo $money = $user->retMoney($owner);
                    if($money >= 5000): //проверка остатка средств на вязку. если хватает активна кнопка "ВЯЗКА" ?>
                          
                      <form method="POST" action="/NewDog.php">
                                <input type="submit" name="nazvanie_knopki" value="Вяжем" class="btn btn btn-dark"/>
                      </form>
               <?php Endif; ?>
                     <!-- кнопки для формы-->
                            <br>
                           <a href="/kennel.php" class="btn btn btn-dark" role="button" aria-pressed="true">в офис</a>
                           <a href="<?php echo '/matting.php?id=' . $id;?>" class="btn btn btn-dark" role="button" aria-pressed="true">вернутся к собаке</a>
                           <a href="/actmatting.php" class="btn btn btn-dark" role="button" aria-pressed="true">акт вязки</a><br>
                                  </td>
        <td id="col3"><h3 align="center">Папа:</h3>
                <?php $print->picLink($id_d, '55%');
                echo '<br>'. $id_d .'<br>' . $dog->retName($id_d) .  '<br>щенков ' . $print->retPuppy($id_d);
             
              /* print_lit_pup($id_d);
               detalis($id_d);
               f_tree($id_d);*/?>
             
        </td>
   </tr>
  </table>
    </div>        

  
  