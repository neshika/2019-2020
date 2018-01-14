
<?php
require "db.php";
        //подключение файлов
        
        require "/html/header.html";
        require "/html/nav.html";
        require "/html/aside.html";
        require "includes/functions.php"; 
        
?>
<div class="content">

<?php
/////////////////  Функция создания рандомного пола для собаки
function rand_sex(){
    return Rand(0,1);
}

/////////////////  внести пол
function add_sex($id,$sex){
    insert_data('rando_dna',$id,'sex',$sex);
}
//////////////  вывести пол
function take_sex($id){
    return find_where('rando_dna', $id, 'sex');
}
////////////////  пол буквами
function w_sex($id){
    $sex=take_sex($id);
    if(0==$sex){
        return 'сука';
    }
    if(1==$sex){
        return 'кобель';
    }
    else{
        return 'стерильно';
    }
}
//////////////////////////////////////////////////////////////////////
function rand_dog1($id,$prop){
  $data_dna['hr']=f_rand_col('HrHr','Hrhr','hrhr');
  $data_dna['ww']=f_rand_col('WW','Ww','ww');
  $data_dna['ff']=f_rand_col('FF','Ff','ff');
  $data_dna['bb']=f_rand_col('BB','Bb','bb');
  $data_dna['tt']=f_rand_col('TT','Tt','tt');
  $data_dna['mm']=f_rand_col('MM','Mm','mm');
 
   ('Hrhr'==$data_dna['hr'] ? $Hr='hr1' : $Hr='hr0');   //hr1 Hrhr - голая  // hr0 - hrhr  - пух
    ('ww'==$data_dna['ww'] ? $W='w0' : $W='w1');
    ('ff'==$data_dna['ff'] ? $F='f0' : $F='f1');
    ('bb'==$data_dna['bb'] ? $B='b0' : $B='b1');
    ('tt'==$data_dna['tt'] ? $T='t0' : $T='t1');
    ('mm'==$data_dna['mm'] ? $M='m0' : $M='m1');
    
        
    echo '<br>' . $dna=$Hr . $W . $F . $B . $T . $M;
    
    echo '<br>' . $url=do_url($dna);
    
       
    echo '<br>' . $sex=rand_sex();
    echo '<br>' . $lucky= rand(1,100);
    echo '<br>' . $spd= rand(9,11);
    echo '<br>' . $agl= rand(9,11);
    echo '<br>' . $tch= rand(9,11);
    echo '<br>' . $jmp= rand(9,11);
    echo '<br>' . $nuh= rand(9,11);
    echo '<br>' . $fnd= rand(9,11);
    echo '<br>' . $mut= rand(1,100);
    
    R::exec( 'UPDATE rando_dna SET id=$id');
    R::exec( 'UPDATE rando_dna SET dog_id=0 WHERE id = :id ', array(':id' => $id));
    R::exec( 'UPDATE rando_dna SET hr=:hr WHERE id = :id ', array(':hr'=> $data_dna['hr'], ':id' => $id));
    R::exec( 'UPDATE rando_dna SET ww=:ww WHERE id = :id ', array(':ww'=> $data_dna['ww'], ':id' => $id));
    R::exec( 'UPDATE rando_dna SET ff=:ff WHERE id = :id ', array(':ff'=> $data_dna['ff'], ':id' => $id));
    R::exec( 'UPDATE rando_dna SET bb=:bb WHERE id = :id ', array(':bb'=> $data_dna['bb'], ':id' => $id));
    R::exec( 'UPDATE rando_dna SET tt=:tt WHERE id = :id ', array(':tt'=> $data_dna['tt'], ':id' => $id));
    R::exec( 'UPDATE rando_dna SET mm=:mm WHERE id = :id ', array(':mm'=> $data_dna['mm'], ':id' => $id));
    R::exec( 'UPDATE rando_dna SET sex=:sex WHERE id = :id ', array(':sex'=> $sex, ':id' => $id));
    R::exec( 'UPDATE rando_dna SET lucky=:lucky WHERE id = :id ', array(':lucky'=> $lucky, ':id' => $id));
    R::exec( 'UPDATE rando_dna SET spd=:spd WHERE id = :id ', array(':spd'=> $spd, ':id' => $id));
    R::exec( 'UPDATE rando_dna SET agl=:agl WHERE id = :id ', array(':agl'=> $agl, ':id' => $id));
     R::exec( 'UPDATE rando_dna SET tch=:tch WHERE id = :id ', array(':tch'=> $tch, ':id' => $id));
    R::exec( 'UPDATE rando_dna SET jmp=:jmp WHERE id = :id ', array(':jmp'=> $jmp, ':id' => $id));
     R::exec( 'UPDATE rando_dna SET nuh=:nuh WHERE id = :id ', array(':nuh'=> $nuh, ':id' => $id));
    R::exec( 'UPDATE rando_dna SET fnd=:fnd WHERE id = :id ', array(':fnd'=> $fnd, ':id' => $id));
     R::exec( 'UPDATE rando_dna SET mut=:mut WHERE id = :id ', array(':mut'=> $mut, ':id' => $id));
      R::exec( 'UPDATE rando_dna SET url=:url WHERE id = :id ', array(':url'=> $url, ':id' => $id));
       R::exec( 'UPDATE rando_dna SET prop=:prop WHERE id = :id ', array(':prop'=> $prop, ':id' => $id));
    
    return $dna;
    
    
}

echo "Тестируем: <br>";

$id=1;
echo $sex = rand_sex();
add_sex($id, $sex);
 echo '<br>' . take_sex($id);
 echo w_sex($id);
 
 
 $url=do_url(rand_dog1($id,'buy'));
 ?>
 
 <img align="center" src = "<?php echo $url;?>" width="25%">

     
     <?php
$data_dog=take_data_from($id,'animals');
debug($data_dog);


 require '/libs/down.php';



