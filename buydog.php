<?php

require_once(__DIR__ . '/libs/up.php');
//require_once(__DIR__ . '/includes/functions.php');
   $owner=ret_owner();
  debug($_POST);
  
function dogPrice($id_dna){
       $arr = R::getRow( 'SELECT * FROM randodna WHERE id = :dna_id',
               [':dna_id' => $id_dna]);
        //debug($arr);

        if(1==$arr['sex']){
           // echo "кобель";
            if('Hrhr'==$arr['hr']){
                $cost=35000;
                if('bb'==$arr['bb']){
                $cost=$cost+20000;
                }
            }

            if('hrhr'==$arr['hr']){
                $cost=10000;
                if('bb'==$arr['bb']){
                $cost=$cost+25000;
                }
            }

        }
        if(0==$arr['sex']){
            //echo "сука";
            if('Hrhr'==$arr['hr']){ //голая
                $cost=45000;
                if('bb'==$arr['bb']){ //голая шоко
                $cost=$cost+30000;
                }
            }

            if('hrhr'==$arr['hr']){ //пуховая
                $cost=25000;
                if('bb'==$arr['bb']){ //пуховая шоко
                $cost=$cost+15000;
                }
            }

        }
         return $cost;  
}
function print_sex_pic($id_dna){
    $sex=ret_Cell('sex',$id_dna,'randodna');
    if(0==$sex){
	return '<img src = "/pic/female_mini.png">';
    }
else{
	return '<img src = "/pic/male_mini.png">';
    }
}

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
    echo print_sex_pic($_SESSION['id_dna']);   
     //////////////////// проверка цены ........
     echo dogPrice($_SESSION['id_dna']);    
     

}
elseif (isset($_POST['buy2'])){
    echo 'нажали 2 buy';
    printUrlFromDna($_SESSION['ulrdog2']);
    ///////////// рисует пол собаки
    echo print_sex_pic($_SESSION['id_dna2']);   
     //////////////////// проверка цены ........
     echo dogPrice($_SESSION['id_dna2']);    

}elseif (isset($_POST['buy3'])){
    echo 'нажали 3 buy';
     printUrlFromDna($_SESSION['ulrdog3']);
    ///////////// рисует пол собаки
    echo print_sex_pic($_SESSION['id_dna3']);   
     //////////////////// проверка цены ........
     echo dogPrice($_SESSION['id_dna3']);    
}else
{
    echo 'не нажали';
} 
?>        
</p>    
