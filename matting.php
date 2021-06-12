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
<link href="css/radio.css" rel="stylesheet" type="text/css"/>
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
    echo $print->picSex($id) . $id;$print->picLink($id, '50%');
    $sex_partner = $dog->retSexPartner($id);
    $str = $user->retDogByOwner($owner);
   //debug($data);
    
    $partners = $mat->bdikaSexPartner($str, $sex_partner);
    echo '<br>';
   foreach($partners as $id_p) {
       //echo $id;
       $print->picLink($id_p, '30%');
       //echo $print->retName($id);
       echo $_SESSION['para'] = $id;
       echo $_SESSION['ONONA'] = $id_p;
       ?><form method="post" action="breedding.php">
            <div style="display:none" class="radio_buttons">
            <input type="radio" NAME="ONONA" VALUE="<?=$id?>" class="btn btn-dark" checked />
             <label for="radio4">Вяжем</label>
            </div> 
             <input class="btn btn-dark" name="matting" type="submit" value="<?php echo $print->retName($id_p) . $id_p?>">
            
        </form><?php
           debug($_SESSION);
    }//endforeach
   
   ?>
</div>
