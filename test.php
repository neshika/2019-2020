
<?php
require "db.php";
        //подключение файлов
        
        require "/html/header.html";
        require "/html/nav.html";
        require "/html/aside.html";
        require "includes/functions.php"; 
        
?>
<div class="content">

    
    
    <script>
function change(idName) {
  if(document.getElementById(idName).style.display=='none') {
    document.getElementById(idName).style.display = '';
  } else {
    document.getElementById(idName).style.display = 'none';
  }
  return false;
}
</script>
<div style="display:none" id="test">Hi World! </div>
<a href="#" onclick="change('test')">Change</a>

<?php
function testim($id_m,$id_d){
    $dog_m= take_data_from($id_m,'animals');
    $dog_d= take_data_from($id_d,'animals');
    $pol= f_bdika_sex();
    $lucky=Rand(1,100);
    $birth=date("d.m.Y");
//    debug($dog_m);
//    echo '<br>';
//    debug($dog_d);
    $dog_new=R::dispense('animals');        //создаем объект в таблицу
    $dog_new->name='';
    $dog_new->lucky=$lucky;
    $dog_new->race=$dog_m['race'];
    $dog_new->sex=$pol;
    $dog_new->breeder=$dog_m['breeder'];
    $dog_new->owner=$dog_m['owner'];
    $dog_new->kennel=$dog_m['kennel'];
    $dog_new->age_id='1'; //только родился малыш
    
    //отдельно Family  DNA
    $dog_new->birth=$dog_m['birth'];
    $dog_new->status='1';
    
    //добавление щенка родителям и вязки
    
    //URL в DNA делаем
    
    
    
    $id=R::store($dog_new); //сохраняем данные первичный ключ создается автоматом
    return $id; //возвращяем id новой собаки
}
//создаем DNA
function greate_family($id,$id_m,$id_d){
    
    $dog_m= take_data_from($id_m,'animals');
    $dog_d= take_data_from($id_d,'animals');
    $dog_new= take_data_from($id,'animals');
    
    $dog_new=R::dispense('family');        //создаем объект в таблицу
    
        $dogs->mum=$id_m;
        $dogs->dad=$id_d;


        /*по линии матери*/
        //echo '<br>предки мамы: ';
	
        $dog_new->g0dad=$dog_m['dad'];   //отец матери для щенка дед
        $dog_new->g0mum=$dog_m['mum'];    //мать матери для женка бабка
	$dog_new->gg0dad1=$dog_m['g1dad'];
	$dog_new->gg0mum2=$dog_m['g1mum'];
	$dog_new->gg0dad3=$dog_m['g0dad'];	//прадед
	$dog_new->gg0mum4=$dog_m['g0mum'];	//прабабка

        //$dogs->g0dad=$G0dad;
        //$dogs->g0mum=$G0mum;
       // $dogs->gg0dad1=$GG0dad1;
        //$dogs->gg0mum2=$GG0mum2;
       // $dogs->gg0dad3=$GG0dad3;
        //$dogs->gg0mum4=$GG0mum4;
        
         /*по линии отца */
        //echo '<br>предки папы: ';
	$G1dad=$dog['dad'];
	$G1mum=$dog['mum'];
	$GG1dad1=$dog['g1dad'];
	$GG1mum2=$dog['g1mum'];
	$GG1dad3=$dog['g0dad'];
	$GG1mum4=$dog['g0mum'];
	
        $dogs->g1dad=$G1dad;
        $dogs->g1mum=$G1mum;
        $dogs->gg1dad1=$GG1dad1;
        $dogs->gg1mum2=$GG1mum2;
        $dogs->gg1dad3=$GG1dad3;
        $dogs->gg1mum4=$GG1mum4;
        
    
    $id=R::store($dog_new); //сохраняем данные первичный ключ создается автоматом
   
   
    
}



echo "Тестируем: <br>";

?>
<form method="POST">
введите код собаки: <input type="text" name='dog_id'>
<input type="submit" name="ок" value="ok">
</form>
<?php

if(isset($_POST['dog_id'])  ){ 
  //$id=$_POST['dog_id'];
    testim (7,8);
  
}
 $_POST['dog_id']=0;
 
/*
 * 
 *  //$data_dna=do_dna($_POST['dog_id']);
   //$url=do_url($data_dna);
   //insert_url($_POST['dog_id'],$url);
  
 * 
 * 
echo $sex = rand_sex();
add_sex($id, $sex);
 echo '<br>' . take_sex($id);
 echo w_sex($id);
 
 
 $url=do_url(rand_dog1($id));
 ?>
 
 

     
 <?php

  $dna_id=find_where('animals',$id,'dna_id');
   $data_dog=take_data_from($dna_id,'rando_dna');
debug($data_dog);

?><img align="center" src = "<?php echo $data_dog['url'];?>" width="25%"><?php

$data_dna= take_data_from(ret_dna($id), 'rando_dna');
debug($data_dna);

foreach ($data_dna as $key => $value) {
    echo '[' . $key . ']  : ' . $value . "<br />\n";
}
//$arr = array("one", "two", "three");
//reset($arr);
//while (list($key, $value) = each($arr)) {
//    echo "Ключ: $key; Значение: $value<br />\n";
//}
//
//foreach ($arr as $key => $value) {
//    echo "Ключ: $key; Значение: $value<br />\n";
//}
////Ключ: 0; Значение: one
////Ключ: 1; Значение: two
////Ключ: 2; Значение: three
////Ключ: 0; Значение: one
////Ключ: 1; Значение: two
////Ключ: 2; Значение: three

*/
 require '/libs/down.php';
 ?>



