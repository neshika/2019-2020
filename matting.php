<?php
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');

$id = $_SESSION['Dog'];
$dog = new Dog;
$print = new PrintDog;
$user = new Users;
$owner = $dog->retOwner($id);
$mat = new Matting;
//debug($_SESSION)

?>
<!-- <link href="css/radio.css" rel="stylesheet" type="text/css"/>  -->
<style>
.AlfaDog{
    width: 500px;
    height: auto;
    /*background: #D0D0D0;*/
        padding-left: 5px;
        margin-left: 25px;
        -webkit-box-shadow: 5px 5px 15px 5px #727272; 
        box-shadow: 5px 5px 15px 5px #727272;
        /*border-radius: 15px;*/
}
.radio_butt{
    
}
</style>
<div class="AlfaDog">
   <?php
   //распечатка основной собаки:
    echo $print->picSex($id) . $id; $print->picLink($id, '25%');
    echo 'док:' . $print->retOrignText($id);
    $sex_partner = $dog->retSexPartner($id);
    $str = $user->retDogByOwner($owner);
   //debug($data);
    
    $partners = $mat->bdikaSexPartner($str, $sex_partner);
    echo '<br>';
   foreach($partners as $id_p) {
       //echo $id;
    //расчечатка подходящих партнеров
       $age = $dog->retAgeId($id_p); //распечатываем только половозрелых самцов и самок старше 14 и меньше 7 лет
       If( ((1 == $sex_partner) && ($age < 79) && ($age > 16)) || ( (0 == $sex_partner) && ($age > 16) && ($age < 59)) ){
       $print->picLink($id_p, '30%');
       echo $print->retAgeText($id_p) . '/док:' . $print->retOrignText($id_p);
       
       ?><form method="POST" action="/breedding.php">
           <input type="hidden" name="para" value="<?php echo $id_p;?>" >
            <input type="hidden" name="ONONA" value="<?php echo $id;?>">
            <input type="submit" class = "btn btn-dark" name ="partner" value="<?php echo 'вязка c ' .  $print->retName($id_p);?>" >
        </form>
           <?php
       } //end if;    
           
    }//endforeach
   
   ?>
</div>


