<?php
//подключение файлов
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');

ini_set('display_errors',1);
error_reporting(E_ALL);
echo "Создаем рандомную собаку по-другому: <br>";
?>
<style>
   #dogs {
        -webkit-box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35); 
        box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35);
        margin: 0 auto 0 auto;
        padding: 10px;
        border: 10px;
}
</style>
 <form method="POST" action="buydog.php">
    <table border="0" cellpadding="25" text-align="center">
        <caption><h1>Aктуальные предложения на сегодня:</h1><br></caption>
    <td><div id="dogs">
        <?php 
       $obj3 = new RandDog;
       $obj3->InsertData(3);
       $url=$obj3->retUrl(3); //рисуте URL
       echo ' Url ' . $url;
       $obj3->dogPic($url);
       $url_pup=$obj3->retUrlPuppy(3);
       echo " url_pup " . $url_pup;
       echo '<br>' . $obj3->dogPic($url_pup);
       echo $obj3->picSex(3);  //рисует пол собаки
       echo $obj3->dogPrice(3); // проверка цены ........
        ?><button type="submit" class="knopka" name="buy1" >Купить</button></div></td>
    </td>
   
 </table>
</form>


    
