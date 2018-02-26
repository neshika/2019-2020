<?php
require "/libs/up.php";
      $id = $_GET['id'];
      $GLOBALS['Data_dog']=data_animals($id);

      //$GLOBALS ['MYDOG'] = 12;
      //echo $MYDOG;

      $owner=ret_owner();
     // $var = find_where('dna',$id,'hr');
//***************  вносим данные о состоянии энергии. Здоровья. счастья из базы************//
             //$_SESSION['vitality']=find_where('animals',$id,'vitality');
           // $_SESSION['vitality']=$GLOBALS['Data_dog']['vitality'];
           //  $_SESSION['hp']=$GLOBALS['Data_dog']['hp'];;
            // $_SESSION['joy']=$GLOBALS['Data_dog']['joy'];

             debug($timer);

/*<h1 style="font-size: 120%; font-family: Verdana, Arial, Helvetica, sans-serif; 
  color: #336">Заголовок</h1>*/
  if ( isset($_POST['newName']) ){ 
    if("" != $_POST['name1']){
       insert_data('animals',$id,'name',$_POST['name1']);
    }
    else {  // всплывающее окно, если имя не ввели
      ?> <script>alert ("ВВедите имя!");</script>   
      <?php
    }
  }
   if ( isset($_POST['add_age']) ){ 

    add_age($_SESSION['Dog']);
  }




////////////////////////////  Функции  /////////////////////////////////
function takeTime(){
  return $GLOBALS['timer'];
}

function giveTime($timer){

  //insert_data('animals',$id,'now',$timer);

  //var_dump($timer);
}



function Rando(){     //   дает рандомные данные для энергии, здоровья и счастья


 $_SESSION['vitality']=Rand(1,100);
 $_SESSION['hp']=Rand(1,100);
 $_SESSION['joy']=Rand(1,100);
 //$GLOBALS['timer']=1440;

  giveTime(1440);



}

function Well($vit,$hp,$joy){  //  проверяет , чтобы числа были в диапазоне 100
    if($vit>100)
        $vit=100;
    if($hp>100)
      $hp=100;
    
    if($joy>100)
      $joy=100;

    $string = [];
    $string[0]=$vit;
    $string[1]=$hp;
    $string[2]=$joy;

   // var_dump($string);
    
    return $string;

}

function Deem($buttom){   //  на срабатывание кнопки считает данные 


    $vit=$_SESSION['vitality'];
    $hp=$_SESSION['hp'];
    $joy=$_SESSION['joy'];



  var_dump($vit);
  var_dump($hp);
  var_dump($joy);
  echo '<br>===========   ';

    if('food'== $buttom){    //  если нажали кнопку "еда"  (+ 35 энергия, +1 счастье)
        $vit +=35;
        $joy +=1;
    }
    if('water'== $buttom){    //  если нажали кнопку "вода"  (+ 5 энергия, +1 счастье)
      $vit +=5;
      $joy +=1;
    }
     if('comp'== $buttom){    //  если нажали кнопку "чесать"  (- 3  энергия, +10 счастье)
      $vit -=3;
      $joy +=10;
    }
      if('walk'== $buttom){    //  если нажали кнопку "гулять"  (- 17  энергия, +15 счастье)
      $vit -=17;
      $joy +=15;
    }
     if('sleep'== $buttom){    //  если нажали кнопку "спать"  (+40  энергия, +1 счастье)
      $vit +=40;
      $joy +=1;
    }
    if('badd'== $buttom){    //  если нажали кнопку "Добавка"  (+15  энергия, +2 счастье)
      $vit +=15;
      $joy +=2;
    }
    if('vet'== $buttom){    //  если нажали кнопку "ветеринар"  (-10  энергия, -30 счастье, здоровье 100)
      $vit -=10;
      $joy -=30;
      $hp = 100;

    }
     if('train'== $buttom){    //  если нажали кнопку "тренировка"  (-60 энергия, +20 счастье)
      $vit -=60;
      $joy +=20;
    }
  $string = Well($vit,$hp,$joy);
  //var_dump($string);

  $_SESSION['vitality']= $string[0];
  $_SESSION['hp']=$string[1];
  $_SESSION['joy']=$string[2];

  //var_dump($GLOBALS['Data_dog']['id']);

 insert_data('animals',$GLOBALS['Data_dog']['id'],'vitality', $_SESSION['vitality']);
  insert_data('animals',$GLOBALS['Data_dog']['id'],'hp', $_SESSION['hp']);
  insert_data('animals',$GLOBALS['Data_dog']['id'],'joy', $_SESSION['joy']);

}





/////////////////////   КНОПКА   РАНДОМНЫЕ Данные  ///////////////////////


if(isset($_POST['rand'])  ){       // если не нажата кнопка Рандомные   даем рандомные числа для витталити, хп и счастья

    Rando();

}

/////////////////////   КНОПКА    ЕДА    ////////////////////////////////


if(!isset($_POST['food'])  ){       // если не нажата кнопка "еда"   даем рандомные числа для витталити, хп и счастья

   // takeData($owner);
//***************  вносим данные о состоянии энергии. Здоровья. счастья из базы************//
             //$_SESSION['vitality']=find_where('animals',$id,'vitality');
            $_SESSION['vitality']=$GLOBALS['Data_dog']['vitality'];
             $_SESSION['hp']=$GLOBALS['Data_dog']['hp'];;
             $_SESSION['joy']=$GLOBALS['Data_dog']['joy'];


}
echo '<br> ===========  food   ';
//var_dump($_POST['food']);

if(isset($_POST['food'])  ){      //если нажали кнопку "еда"

  Deem('food');
  
  //$timer=find_where('animals',1,'now');
 // $timer=$timer-30;
  //giveTime($timer);
  

}
echo '<br> конец===========   '; 
$_POST['food']=NULL;




/////////////////////   КНОПКА    ПИТЬ    ////////////////////////////////

//echo '<br> ===========  water   ';
//var_dump($_POST['water']);

if(isset($_POST['water'])  ){      //если нажали кнопку "пить"

  Deem('water');
  
  $timer=find_where('animals',$id,'now');
  $timer=$timer-30;
  giveTime($timer);

}
//echo '<br> конец===========   '; 
$_POST['water']=NULL;


/////////////////////   КНОПКА    ЧЕСАТЬ    ////////////////////////////////

//echo '<br> ===========  comp   ';
//var_dump($_POST['comp']);

if(isset($_POST['comp'])  ){      //если нажали кнопку "чесать"

  Deem('comp');
  
  $timer=find_where('animals',$id,'now');
  $timer=$timer-60;
  giveTime($timer);

}
//echo '<br> конец===========   '; 
$_POST['comp']=NULL;

/////////////////////   КНОПКА    ГУЛЯТЬ    ////////////////////////////////

//echo '<br> ===========  walk   ';
//var_dump($_POST['walk']);

if(isset($_POST['walk'])  ){      //если нажали кнопку "гулять"

  Deem('walk');

  $timer=find_where('animals',$id,'now');
  $timer=$timer-90;
  giveTime($timer);

}
//echo '<br> конец===========   '; 
$_POST['walk']=NULL;

/////////////////////   КНОПКА    СПАТЬ    ////////////////////////////////

//echo '<br> ===========  sleep   ';
//var_dump($_POST['sleep']);

if(isset($_POST['sleep'])  ){      //если нажали кнопку "спать"

  Deem('sleep');

  $timer=find_where('animals',$id,'now');
  $timer=$timer-480;
  giveTime($timer);

}
//echo '<br> конец===========   '; 
$_POST['sleep']=NULL;


/////////////////////   КНОПКА    добавка    ////////////////////////////////

//echo '<br> ===========  badd   ';
//var_dump($_POST['badd']);

if(isset($_POST['badd'])  ){      //если нажали кнопку "добавка"

  Deem('badd');

  $timer=find_where('animals',$id,'now');
  $timer=$timer-90;
  giveTime($timer);

}
//echo '<br> конец===========   '; 
$_POST['badd']=NULL;

/////////////////////   КНОПКА    ветеринар    ////////////////////////////////

//echo '<br> ===========  vet   ';
//var_dump($_POST['vet']);

if(isset($_POST['vet'])  ){      //если нажали кнопку "ветеринар"

  Deem('vet');

}
//echo '<br> конец===========   '; 
$_POST['vet']=NULL;

/////////////////////   КНОПКА    тренировка    ////////////////////////////////

//echo '<br> ===========  train   ';
//var_dump($_POST['train']);

if(isset($_POST['train'])  ){      //если нажали кнопку "тренировка"

  Deem('train');

  $timer=find_where('animals',$id,'now');
  $timer=$timer-540;
  giveTime($timer);

}
//echo '<br> конец===========   '; 
$_POST['train']=NULL;




?>








<!-- ******************** вывод питомника / имя собаки и картинка пола   выводит число счастья *****************-->    
          <div style="background: white; height: 80px; width: 1170px;"> <h3 align="center"><?php echo $GLOBALS['Data_dog']['name'];?><?php echo ' "' . $GLOBALS['Data_dog']['kennel'] . '" ';?> <?php echo ret_pic_sex($id) . $GLOBALS['Data_dog']['lucky'];?></h3>
           </div>
          
<!-- ******************** вывод доп меню собаки  заводчик / хозяин  *****************-->  
    <div style="background: yellow; height: 80px; width: 1170px;"> 
          <ul style="background: white; width: 45%; float: left;">
            <li>Заводчик: <?php echo $GLOBALS['Data_dog']['breeder'];?></li>
            <li>Хозяин: <?php echo $GLOBALS['Data_dog']['owner'];?></li>
            <li>Вязок: <?php echo $GLOBALS['Data_dog']['litter'];?></li>

          </ul>
<!-- ******************** вывод доп меню собаки  вид \\ Дата рождения \\ окрас    *****************-->       
        <ul style="background: white; width: 40%; float: right;">
          <li>тип:  <?php echo  print_hr($id);?></li>
          <li>возраст:  <?php echo ret_age($id);?></li>
          <li>Щенков: <?php echo $GLOBALS['Data_dog']['puppy'];?></li>
       </ul>
    </div>
<!-- ******************** вывод картинки собаки по id  *****************-->
 
<hr>
<form method="POST">
<table width="1170" cellpadding="3" cellspacing="0">
   <colgroup width="390">
  <tr>
      <td><input style="float: left;  margin-left: 30px;" id="button" name="food" type="submit" value="есть" class = "knopka">
          <input style="float: right;  margin-right: 30px;" id="button" name="water" type="submit" value="пить" class = "knopka">
          <br>
          <input style="float: left;  margin-left: 30px;" id="button" name="comp" type="submit" value="чесать" class = "knopka">
          <input style="float: right;  margin-right: 30px;" id="button" name="walk" type="submit" value="гулять" class = "knopka">
          <br>
          <input style="float: left;  margin-left: 30px;" id="button" name="sleep" type="submit" value="спать" class = "knopka">
          <input style="float: right;  margin-right: 30px;" id="button" name="up" type="submit" value="растить" class = "knopka">

        
    </td>

    <td style="border-width: 10px; text-align: center;"><?php dog_pic($id);?>
        
    </td> 
    <td>
      <input id="button" name="badd" type="submit" value="добавка" class = "knopka">
      <input id="button" name="knopka" type="submit" value="спа уход" class = "knopka">
      <input id="button" name="vet" type="submit" value="ветеринар" class = "knopka">
      <input id="button" name="tra" type="submit" value="тренировки" class = "knopka">
    </td>
  </tr>
</table>
<input id="button" name="rand" type="submit" value="рандомное число" class = "knopka">
<div style="margin-left: 450px""><table>
         <tr><td>Энергия</td><td><div class="meter"><span style="width: <?php echo$_SESSION['vitality'] . '%';?>"></span></div></td><td><?php echo$_SESSION['vitality'];?></td></tr>
            <tr><td>Здоровье</td><td><div class="meter"><span style="width: <?php echo$_SESSION['hp'] . '%';?>"></span></div></td><td><?php echo$_SESSION['hp'];?></td></tr>
            <tr><td>Счастье</td><td> <div class="meter"><span style="width: <?php echo$_SESSION['joy'] . '%';?>"></span></div></td><td><?php echo$_SESSION['joy'];?></td></tr>
      </table>
</div>

</form>
 
<!-- ******************** вывод Генетического кода собаки  скрытый текст*****************--> 
<!-- ******************** вывод статы собаки  *****************--> 

    <details>
      <summary>Генетический код</summary> 
          <?php //print_all_d($id);  
            detalis_green($id);

          ?>
    </details>
<!-- ******************** вывод родителей *****************--> 
<p align="center">Родители:<br>
    
                                  МАМА ========================= ПАПА

<?php if(!isset($id_m)): ?>
<!-- левая колонка мамы-->    
    <div style="float: left; width: 35%;">
<!-- имя мамы--> 
        <details>
             <summary><?php echo find_where('animals',(find_where('animals',$id,'mum')),'name');?></summary> 
<!-- картинка мамы--> 
            <?php 
                  $id_m=find_where('animals',$id,'mum');
                  if ('нет данных'!==$id_m){
                       // $row = R::getRow( 'SELECT * FROM animals WHERE id = :id',
                       // [':id' => $id_m]);
                        //f_get_image($row['hr'],$row['ww'],$row['ff'],$row['bb'] ,$row['tt'],$row['mm']);
                        dog_pic($id_m);?>

<!-- ******************** вывод Генетического кода собаки  скрытый текст*****************--> 
              <details>
                    <summary>Генетический код</summary> 
                    <?php /*print_all_d($id_m);*/ detalis($id_m);?>
              </details>


              <?php
                  }else
                    echo 'нет данных о предках'; ?>
        
           
       </details>
 <?php endif;    ?>
     </div class="content_mum">
<?php if(!isset($id_d)): ?>
<!-- правая колонка папы-->  
    <div style="float: right; width: 48%;">
<!-- имя папы-->  
      <details>
            <summary><?php echo find_where('animals',(find_where('animals',$id,'dad')),'name');?></summary> 
<!-- картинка папы-->  
              <?php 
                    $id_d=find_where('animals',$id,'dad');
                    if ('нет данных'!==$id_d){
                       // $row = R::getRow( 'SELECT * FROM animals WHERE id = :id',
                             // [':id' => $id_d]);
                        //f_get_image($row['hr'],$row['ww'],$row['ff'],$row['bb'] ,$row['tt'],$row['mm']);
                        dog_pic($id_d);?>

<!-- ******************** вывод Генетического кода собаки  скрытый текст*****************--> 
            <details>
                  <summary>Генетический код</summary> 
                  <?php /*print_all_d($id_d);*/ detalis($id_d);?>
            </details>


                      <?php }else
                      echo 'нет данных о предках'; ?>


                  
        </details>
    
    </div>
    </p>
    </main>

<?php endif;

?></div>
    <!-- --------------------------------------  class="right_sidebar"  ----------------------------- -->   

<div class="right_sidebar" >
        <!-- ******************** кнопка вязка справа  *****************--> 

   <form method="POST">
      
      
      <a class="buttons" <?php echo '<a href="/lit&pup.php?id=' . $id . '">'?>Родословная</a>
      <a class="buttons" <?php echo '<a href="/kennel.php">'?>в питомник</a>
      <p>
    <p><strong>Сменить имя:</strong></p>
    <input type="text" name="name1">
    <input id="button" name="newName" type="submit" value="Новое имя" class = "knopka">

                           
    </form>
    <form method="POST" action = "/office.php">
      <div align="right"><input id="button" name="shelter" type="submit" value="отдать в приют" class = "knopka"></div>
      <?php $_SESSION['Dog'] = $id; ?>
  </form>
  <form method="POST">
      <div align="right"><input id="button" name="add_age" type="submit" value="растим" class = "knopka"></div>
      <?php $_SESSION['Dog'] = $id; ?>
  </form>
  <form method="POST" action = "/matting.php">
      <?php If (1==bdika_age_for_breeding($GLOBALS['Data_dog'])){?>
      <div align="right"> <input id="button" name="knopka" type="submit" value="Вязка" class = "knopka" >
      </div>
      <?php $_SESSION['Dog'] = $id; var_dump($_SESSION['Dog']); }?>
      
  </form>

</div class="right_sidebar" >

     
