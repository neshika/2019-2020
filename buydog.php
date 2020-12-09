<?php

require_once(__DIR__ . '/libs/up.php');
//require_once(__DIR__ . '/includes/functions.php');
   $owner=ret_owner();
  debug($_POST);
?>
  <style>
   #dogs {
        -webkit-box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35); 
        box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35);
        margin: 0 auto 0 auto;
        padding: 10px;
        border: 10px;
        width: 300px;
        height: 300px;
}
</style>
<p class="content">
<a class="buttons" href="/office.php" >в офис</a>
<div id="dogs">

<?php if (isset($_POST['buy1'])){
    echo 'нажали 1 buy';
     
    printUrlFromDna($_SESSION['ulrdog1']);
    ///////////// рисует пол собаки
    echo $_SESSION['dog1_sex'];   
     //////////////////// проверка цены ........
     echo $_SESSION['dog1_price'];    
     

}
elseif (isset($_POST['buy2'])){
    echo 'нажали 2 buy';
    printUrlFromDna($_SESSION['ulrdog2']);
    ///////////// рисует пол собаки
    echo $_SESSION['dog2_sex'];     
     //////////////////// проверка цены ........
     echo $_SESSION['dog2_price'];  

}elseif (isset($_POST['buy3'])){
    echo 'нажали 3 buy';
     printUrlFromDna($_SESSION['ulrdog3']);
    ///////////// рисует пол собаки
    echo $_SESSION['dog3_sex'];     
     //////////////////// проверка цены ........
     echo $_SESSION['dog3_price'];  
}else
{
    echo 'не нажали';
} 
?>        
</p>    
