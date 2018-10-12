
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
  if(document.getElementById(idName).style.display==='none') {
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
function greate_animal($id_m,$id_d){
    $dog_m= take_data_from($id_m,'animals');
    //$dog_d= take_data_from($id_d,'animals');
    
   
    $birth=date("d.m.Y");
//    debug($dog_m);
//    echo '<br>';
//    debug($dog_d);
    $dog_new=R::dispense('animals');        //создаем объект в таблицу
    $dog_new->name='';
    
    $dog_new->race=$dog_m['race'];
   
    $dog_new->breeder=$dog_m['owner'];
    $dog_new->owner=$dog_m['owner'];
    $dog_new->kennel=$dog_m['kennel'];
    $dog_new->age_id='1'; //только родился малыш
    
    
    $dog_new->birth=$birth;
    $dog_new->status='1';
        
    $id=R::store($dog_new); //сохраняем данные первичный ключ создается автоматом $id Index #@Animal#@

//greate DNA
    $dna_id = greate_dna($id, $id_m, $id_d);
    insert_data('animals',$id,'dna_id',$dna_id); //вставлянем данные в поле на ссылку dna
    
    //добавление щенка родителям и вязки Family
    $family_id = greate_family($id, $id_m, $id_d);
    insert_data('animals',$id,'family_id',$family_id); //вставлянем данные в поле на ссылку dna

    return $id; //возвращяем id новой собаки
}
//создаем family
function greate_family($id_new,$id_m,$id_d){
    
    $dog_m= take_data_from($id_m,'animals');
    $dog_d= take_data_from($id_d,'animals');
    //$dog_new= take_data_from($id_new,'animals');
    
    $dog_new=R::dispense('family');        //создаем объект в таблицу
    
        $dog_new->mum=$id_m;
        $dog_new->dad=$id_d;


        /*по линии матери*/
        //echo '<br>предки мамы: ';
	
        $dog_new->g0dad=$dog_m['dad'];   //отец матери для щенка дед
        $dog_new->g0mum=$dog_m['mum'];    //мать матери для женка бабка
	$dog_new->gg0dad1=$dog_m['g1dad'];
	$dog_new->gg0mum2=$dog_m['g1mum'];
	$dog_new->gg0dad3=$dog_m['g0dad'];	//прадед
	$dog_new->gg0mum4=$dog_m['g0mum'];	//прабабка
        
         /*по линии отца */
        //echo '<br>предки папы: ';
	$dog_new->g1dad=$dog_d['dad'];
	$dog_new->g1mum=$dog_d['mum'];
	$dog_new->gg1dad1=$dog_d['g1dad'];
	$dog_new->gg1mum2=$dog_d['g1mum'];
	$dog_new->gg1dad3=$dog_d['g0dad'];
	$dog_new->gg1mum4=$dog_d['g0mum'];

    $id=R::store($dog_new); //сохраняем данные первичный ключ создается автоматом
    insert_data('animals',$id_new,'dna_id',$id); //вставлянем данные в поле на ссылку dna
   return $id;  //возвращает ID внести в таблицу animals
   
    
}
function bdika_mutation($id_m,$id_d){
    
    $temp =0; //нет мутации
    $num =Rand(1,100);   //шанс получения мутации
    $f_data_m = ret_f_data_by_dog($id_m);   //родственники по линии матери
    $f_data_d = ret_f_data_by_dog($id_d);   //родственники по линии отца

    ////////////////////////////////////////////////проверка самки и родни партнера
    
    if($f_data_m['id']==$f_data_d['mum']){  //самка и мать партнера 75% мутация
        echo 'партнерша - мать';
        if($num>0 && $num<75){
            $temp=1;
        }
    }
     if( ($f_data_m['id']==$f_data_d['g1mum']) || ($f_data_m['id']==$f_data_d['g0mum']) ){  //самка и бабки партнера 50% мутация
        echo 'партнерша - бабка';
        if($num>50 && $num<100){
            $temp=1;
        }
    }
    if( ($f_data_m['id']==$f_data_d['gg1mum2']) || ($f_data_m['id']==$f_data_d['gg0mum2']) || ($f_data_m['id']==$f_data_d['gg1mum4']) || ($f_data_m['id']==$f_data_d['gg0mum4']) ){
        //самка и пробабки партнера 25% мутация
        echo 'партнерша - пробабка';
        if($num>0 && $num<25){
            $temp=1;
        }
    }
    
       /////////////////////////////////////////////проверка самца и родни партнера
    if($f_data_d['id']==$f_data_m['dad']){  //самец и отец партнерши 75%
        echo 'партнер - отец';
        if($num>0 && $num<75){
            $temp=1;
        }
    }
     if( ($f_data_d['id']==$f_data_m['g1dad']) || ($f_data_d['id']==$f_data_m['g0dad']) ){
         //самец и деды партнерши 50%
        echo 'партнер - дед';
        if($num>50 && $num<100){
            $temp=1;
        }
    }
    if( ($f_data_d['id']==$f_data_m['gg1dad1']) || ($f_data_d['id']==$f_data_m['gg0dad1']) || ($f_data_d['id']==$f_data_m['gg1dad3']) || ($f_data_d['id']==$f_data_m['gg0dad3']) ){
        //самец и прадеды партнерши 25%
        echo 'партнер прадед';
        if($num>0 && $num<25){
            $temp=1;    //если прошла мутация
        }
    }
    return $temp;
}
//создаем DNA
function greate_dna($id_new,$id_m,$id_d){
    
    $dna_m= take_data_from($id_m,'rando_dna');
    $dna_d= take_data_from($id_d,'rando_dna');
    
    
    echo '<br>даем окрас!';
    $tt = breedding($dna_m['tt'],$dna_d['tt'],'TT','tt','Tt');
   //$aa = breedding($dna_m['aa'],$dna_d['aa'],'AA','aa','Aa');
    $bb = breedding($dna_m['bb'],$dna_d['bb'],'BB','bb','Bb');
    $mm = breedding($dna_m['mm'],$dna_d['mm'],'MM','mm','Mm');
    $ww = breedding($dna_m['ww'],$dna_d['ww'],'WW','ww','Ww');
    $ff = breedding($dna_m['ff'],$dna_d['ff'],'FF','ff','Ff');
    

    $family_data=ret_f_data_by_dog($id_new);
    $hr_on=ret_hr($family_data['dad']);
    $hr_ona=ret_hr($family_data['mum']);
    $hr=gol_pooh($hr_on,$hr_ona);
    
    $dna = R::dispense( 'rando_dna' );
    
    $dna->hr = $hr;
    $dna->ww = $ww;
    $dna->ff = $ff;
    $dna->bb = $bb;
    $dna->mm= $mm;
    $dna->tt = $tt;
    
     //echo '<br> рандомный пол!';
    $pol=f_bdika_sex();
 
// echo '<br>создаем удачу!';
    $lucky=Rand(1,100);   
    
    $dna->sex = $pol;
    $dna->lucky = $lucky;
   
         //////////////////////////////   новые статы    
    $plus= bdika_mutation($id_m, $id_d);
    $mutation=Rand(1,100)/100;
    $spd=get_stats($dna_m['spd'],$dna_d['spd'],$plus);
    $agl=get_stats($dna_m['agl'],$dna_d['agl'],$plus);
    $tch=get_stats($dna_m['tch'],$dna_d['tch'],$plus);
    $jmp=get_stats($dna_m['jmp'],$dna_d['jmp'],$plus);
    $nuh=get_stats($dna_m['nuh'],$dna_d['nuh'],$plus);
    $fnd=get_stats($dna_m['fnd'],$dna_d['fnd'],$plus);
    
    $dna->spd=$spd;
    $dna->agl=$agl;
    $dna->tch=$tch;
    $dna->jmp=$jmp;
    $dna->nuh=$nuh;
    $dna->fnd=$fnd;
    $dna->mut=$mutation;
      
    
            
    $dna->about = 'owner';
    $id = R::store( $dna );
    
    $data_dna= do_dna($id);
    insert_data('rando_dna',$id,'dna',$data_dna);
    
    return $id;
}

Function ret_hr($id){
    
    return ret_cell('hr',ret_dna($id),'rando_dna');
  
}


echo "Тестируем: <br>";
?><img src="/pici/vip/test.png"><?php
?>
<form method="POST">
введите код собаки: <input type="text" name='dog_id'>
<input type="submit" name="ок" value="ok">
</form>
<?php

if(isset($_POST['dog_id'])  ){ 
  $id=$_POST['dog_id'];
    echo do_url(do_dna($id));
    dog_pic($id);
     $family_data=ret_f_data_by_dog($id);
     dog_pic($family_data['mum']);
     echo ret_hr($family_data['mum']) . '// ' . ret_hr($family_data['dad']);
     dog_pic($family_data['dad']);
   
}
 //$_POST['dog_id']=0;
 
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



