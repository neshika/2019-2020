<?php
//подключение файлов
require_once(__DIR__ . '/libs/up.php');


$owner=ret_owner(); //сохраняем название владельца в переменную из куки
/*Получаем запросом  навание питомника, при условии что владелец идентифицируется по куку Сессии*/
        $kennel = R::getCell('SELECT kennel FROM users WHERE login = :owner',
        [':owner' => $owner]);
        /*каунтом считаем сколько строк с собаками по владельцу*/        
         $count = R::count( 'animals', 'owner = :owner && status = 1',
        [':owner' => $owner]);
        $coins = print_money($owner);?>
<div class="content">
<p class="kennel"><br>Питомник: <?php echo $kennel;?> // Владелец: <?php echo $owner;?> // Количество собак: <?php echo $count;?><br><img src = "/pici/coins_mini.png"> <?php echo  $coins;
         $vip=Rand(1,5);
         // if('1'==$vip){
         // echo '</br> Вас посетила удача. Сегодня у вас родится больше щенков. ' . '</br>';
        // $vip=ret_url_from_dna('vip');
        //}

?>
<!--создаем форму с кнопками по сортировке собак на виды-->
<form method="POST" action="/kennel.php">
    <button type="submit" class="knopka" name="money" >кредит 50 000</button>
    <button type="submit" class="knopka" name="all_dogs">все собаки</button>
    <button type="submit" class="knopka" name="female">суки</button>
    <button type="submit" class="knopka" name="male">кобели</button>
    <button type="submit" class="knopka" name="puppy">щенки</button>
</form>
</p>
<?php
function all_dogs($owner,$char){
    if('all_dogs'==$char){
        
        $array[] = R::getAssoc('SELECT id,name FROM animals WHERE owner = :owner && status = 1' ,
        [':owner' => $owner]);
/*картинка суки/кобели*/              
?><p class="kennel"><img src = "/pic/male.png" width="10%"><img src = "/pic/female.png" width="10%"></p>
<!-- начало таблицы я указанием собак-->
<!--<table class="table222 table-bordered222 table-inverse222">-->
<table class="table">
    <tr>
    <?php
    foreach($array as $item) {
        $count=0; // считает количество столбиков не больше 4
        foreach ($item as $key => $value) {
            //echo '<br>' . $count;
/*сохранение данных о голости собаки + вязки/щенки*/
            $lit= ret_Cell('litter', $key,'animals');
            $pup=ret_cell('puppy', $key,'animals');
            $pol= ret_sex($key);
            
                if(0==$pol){
                    $sex='сука';
                }
                if(1==$pol){
                    $sex='кобель';
                }
            $GLOBALS['Data_dog']=data_animals($key);    //сохраняем данные по собаке
               
/*выводим на экран имя собаки как ссылку*/
            If('4'>$count){ //если еще не 4 столбика, вписываем
            ?>
            <td> <!-- строка таблицы --> 
                <a href="/name.php?id=<?php echo $key;?>"><img src="<?php echo bdika_url($key);?>" width="35%"> </a>                  
               <div><?php   //  вывод на экран количество вязок и щенков
                            echo '<br>имя: ' . $value;
                            echo '<br> пол : ' . $sex . '<br>';
                            echo bdika_estrus($key);
                            echo '<a href="/lit&pup.php?id=' . $key . '">' . "<br> вязки/дети: ". $lit .'/'. $pup;
                            $count=$count+1;
                            ?>
               </div>                           
                               
            
  <?php     }else{ //если закончилась стрка перехрдить на следующую
                ?></td></tr><td> <!-- строка таблицы -->
  
                <a href="/name.php?id=<?php echo $key;?>"><img src="<?php echo bdika_url($key);?>" width="35%"> </a>                  
               <div><?php   //  вывод на экран количество вязок и щенков
                            echo '<br>имя: ' . $value;
                            echo '<br> пол : ' . $sex . '<br>';
                            echo bdika_estrus($key);
                            echo '<a href="/lit&pup.php?id=' . $key . '">' . "<br> вязки/дети: ". $lit .'/'. $pup;?>
               </div>                       
                <?php
                 $count=1;   
                //}
            }
                            
             }    //foreach ($item as $key => $value) {
            echo "<br/>";
            }   // foreach($array as $item)
             
    }
    
    if('puppy'==$char){
        $array[] = R::getAssoc('SELECT id,name FROM animals WHERE owner = :owner && status = 1' ,
              [':owner' => $owner]);
    ?><img src = "/pic/Puppy_mini.png" alt = "щенки"> 
    <table class="table">
        <tr>
        
        
        <?php
           
              foreach($array as $item) {
                  $count=0; // считает количество столбиков не больше 4
                  foreach ($item as $key => $value) {
                     
/*сохранение данных о голости собаки + вязки/щенки*/
                    $GLOBALS['Data_dog']=data_animals($key);    //сохраняем данные по собаке
                      if(13>=$GLOBALS['Data_dog']['age_id']){ //возраст <6 месяцев
                      If('4'>$count){ //если еще не 4 столбика, вписываем
                          
                      ?>
                <td> <!-- строка таблицы --> 
                <?php
/*выводим имена кобелей как ссылки на страничку собаки*/
                    echo '<a href="/name.php?id=' . $key . '">';?>
                    <img src="<?php echo bdika_url($key);?>" width="50%"></a> 
                    <div>
                    <?php echo '<br>имя: ' . $value;
                    echo '<br>возраст: ' . print_age($key);?>
                    </div><?php
                 }else{ //если закончилась стрка перехрдить на следующую
                ?></td></tr><?php
                 $count=1;   
            }
                    }   //foreach ($item as $key => $value)  
                        
                  } //if(13>=$GLOBALS['Data_dog']['age_id']){
                  
            }   //foreach($array as $item)
            
    }
    
    
    if('female'==$char){
         $data[] =  ret_dogs_by_owner($owner);
         $countf=0;?>
        
         <table class="table">
        <tr>
          
        <?php foreach($data as $item) {
                     //$countf='0'; // считает количество столбиков не больше 4
        
                    foreach ($item as $id => $value) {
                        $countf='0'; // считает количество столбиков не больше 4
                     //echo 'foreach($data as $item)' . $countm;
            
            ?> <!-- <td> строка таблицы --> 
 <?php                  $sex= ret_sex($id);
                        $lit= ret_Cell('litter', $id,'animals');
                        $pup=ret_cell('puppy', $id,'animals');
                        $age= print_age($id);
                        $age_norma=ret_cell('age_id',$id,'animals');
                        $name=ret_Cell('name', $id, 'animals');
                        if(('0'== $sex) && (13<$age_norma)){  //и старше 6 месяцев
                           If('4'>$countf){ //если еще не 4 столбика, вписываем 
                                 ?><td><a href="/name.php?id=<?php echo $id;?>"><img src="<?php echo bdika_url($id);?>" width="100px"> </a> <?php
                                  ?><div><?php
                                   echo '<br>имя: ' . $name;
                                    echo '<br> возраст ' . $age . '<br>';
                                    echo bdika_estrus($id);
                                    echo '<a href="/lit&pup.php?id=' . $id . '">' . "<br> вязки/дети: ". $lit .'/'. $pup . '</a>'; 
                                    ?></div><?php                
                                    $countf=$countf+1;
                                    var_dump($countf);
                                }
                             else{
                                 ?></td></tr><?php
                                 $countf=0;
                                echo '<br>мы в else';
                                ?><td><a href="/name.php?id=<?php echo $id;?>"><img src="<?php echo bdika_url($id);?>" width="100px"> </a> <?php
                                  ?><div><?php
                                   echo '<br>имя: ' . $name;
                                    echo '<br> возраст ' . $age . '<br>';
                                    //  echo bdika_estrus($id);
                                    echo '<a href="/lit&pup.php?id=' . $id . '">' . "<br> вязки/дети: ". $lit .'/'. $pup . '</a>'; 
                                    ?></div><?php                
                                    $countf=$countf+1;
                                    //var_dump($countf);
                             }// If('4'>$countf){ //если еще не 4 столбика, вписываем 
                    }//elseif(('0'== $sex) && (13<$age_norma)){  //и старше 6 месяцев   
             } //foreach ($item as $id => $value) 
        }//foreach($data as $item)
    } //if female
    if('male'==$char){
         $data[] =  ret_dogs_by_owner($owner);
         //$countm=0;?>
        
         <table class="table">
        <tr>
          
        <?php foreach($data as $item) {
                     $countm='0'; // считает количество столбиков не больше 4
                     //echo 'foreach($data as $item)' . $countm;
        
                    foreach ($item as $id => $value) {
                        
            ?> <!-- <td> строка таблицы --> 
 <?php                  $sex= ret_sex($id);
                        $lit= ret_Cell('litter', $id,'animals');
                        $pup=ret_cell('puppy', $id,'animals');
                        $age= print_age($id);
                        $age_norma=ret_cell('age_id',$id,'animals');
                        $name=ret_Cell('name', $id, 'animals');
                        if(('1'== $sex) && (13<$age_norma)){  //и старше 6 месяцев
                             If('4'>$countm){ //если еще не 4 столбика, вписываем 
                                 ?><td><a href="/name.php?id=<?php echo $id;?>"><img src="<?php echo bdika_url($id);?>" width="100px"> </a> <?php
                                  ?><div><?php
                                   echo '<br>имя: ' . $name;
                                    echo '<br> возраст ' . $age . '<br>';
                                    //  echo bdika_estrus($id);
                                    echo '<a href="/lit&pup.php?id=' . $id . '">' . "<br> вязки/дети: ". $lit .'/'. $pup . '</a>'; 
                                    ?></div><?php                
                                    $countm=$countm+1;
                                    var_dump($countm);
                                }
                             else{
                                 ?></td></tr><?php
                                 $countm=1;
                                echo '<br>мы в else';
                                ?><td><a href="/name.php?id=<?php echo $id;?>"><img src="<?php echo bdika_url($id);?>" width="100px"> </a> <?php
                                  ?><div><?php
                                   echo '<br>имя: ' . $name;
                                    echo '<br> возраст ' . $age . '<br>';
                                    //  echo bdika_estrus($id);
                                    echo '<a href="/lit&pup.php?id=' . $id . '">' . "<br> вязки/дети: ". $lit .'/'. $pup . '</a>'; 
                                    ?></div><?php                
                                    $countm=$countm+1;
                                    //var_dump($countm);
                             }// If('4'>$countf){ //если еще не 4 столбика, вписываем 
                    }//elseif(('1'== $sex) && (13<$age_norma)){  //и старше 6 месяцев
                  
             } //foreach ($item as $id => $value) 
        }//foreach($data as $item)
    }
}
/************************* Ели нажата кнопка ВСЕ СОБАКИ выводим на экран всех собак, пренадлежащих владельцу*/
if( isset($_POST['money']) ){
       put_money($owner,50000);
      //echo print_money($owner);
}
if( isset($_POST['all_dogs']) ){
    all_dogs($owner,'all_dogs');
          }   //if( isset($_POST['all_dogs']))

          ?>
        </tr></table>
        

<?php
/****************************** Если нажата кнопка СУКИ выводим на экран всех собак, пренадлежащих владельцу*/
if( isset($_POST['female']) ){
            ?><p class="left"><img src = "/pic/female.png" alt = "девочки" width="10%"></p>
            
             <?php  all_dogs($owner, 'female'); //ret_dog_by_sex($owner,0);
                          
              
}
if( isset($_POST['male']) ){
        ?><p class="left"><img src = "/pic/male.png" alt = "мальчики" width="10%"></p>
        <?php    all_dogs($owner, 'male'); //ret_dog_by_sex($owner,1);
}
       

/******************************* Если нажата кнопка щенки выводим на экран всех щенков, пренадлежащих владельцу*/
if( isset($_POST['puppy']) ){
    all_dogs($owner, 'puppy');
         }   //if( isset($_POST['puppy']) )
