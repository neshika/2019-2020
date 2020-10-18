<?php
//подключение файлов
/*require "/html/header.html";
require "/html/nav.html";
require "/html/aside.html";
*/
require "/libs/up.php";

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
/************************* Ели нажата кнопка ВСЕ СОБАКИ выводим на экран всех собак, пренадлежащих владельцу*/
if( isset($_POST['money']) ){
       put_money($owner,50000);
      //echo print_money($owner);
}
if( isset($_POST['all_dogs']) ){
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
/*сохранение данных о голости собаки + вязки/щенки*/
            $lit= ret_Cell('litter', $key,'animals');
            $pup=ret_cell('puppy', $key,'animals');
            $pol= ret_sex($key);
            $count=$count+1;
                if(0==$pol){
                    $sex='сука';
                }
                if(1==$pol){
                    $sex='кобель';
                }
            $GLOBALS['Data_dog']=data_animals($key);    //сохраняем данные по собаке
               
/*выводим на экран имя собаки как ссылку*/
            If('5'!=$count){ //если еще не 4 столбика, вписываем
            ?>
            <td> <!-- строка таблицы --> 
                <a href="/name.php?id=<?php echo $key;?>"><img src="<?php echo bdika_url($key);?>" width="35%"> </a>                  
               <div><?php   //  вывод на экран количество вязок и щенков
                            echo '<br>имя: ' . $value;
                            echo '<br> пол : ' . $sex . '<br>';
                            echo bdika_estrus($key);
                            echo '<a href="/lit&pup.php?id=' . $key . '">' . "<br> вязки/дети: ". $lit .'/'. $pup;?>
               </div>                           
                               
            
  <?php     }else{ //если закончилась стрка перехрдить на следующую
                ?></td></tr><?php
                 $count=0;   
            }
                            
             }    //foreach ($item as $key => $value) {
            echo "<br/>";
            }   // foreach($array as $item)
             
          }   //if( isset($_POST['all_dogs']))

          ?>
        </tr></table>
        

<?php
/****************************** Если нажата кнопка СУКИ выводим на экран всех собак, пренадлежащих владельцу*/
if( isset($_POST['female']) ){
            ?><p class="left"><img src = "/pic/female.png" alt = "девочки" width="10%"></p>
             <?php ret_dog_by_sex($owner,0);
                          
              
}
if( isset($_POST['male']) ){
        ?><p class="left"><img src = "/pic/male.png" alt = "мальчики" width="10%"></p>
        <?php ret_dog_by_sex($owner,1);
}
       

/******************************* Если нажата кнопка щенки выводим на экран всех щенков, пренадлежащих владельцу*/
if( isset($_POST['puppy']) ){
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
                      If('5'!=$count){ //если еще не 4 столбика, вписываем
                          
                      ?>
                <td> <!-- строка таблицы --> 
                <?php
/*выводим имена кобелей как ссылки на страничку собаки*/
                    echo '<a href="/name.php?id=' . $key . '">';?>
                    <img src="<?php echo bdika_url($key);?>" width="10%"></a> 
                    <div>
                    <?php echo '<br>имя: ' . $value;
                    echo '<br>возраст: ' . print_age($key);?>
                    </div><?php
                 }else{ //если закончилась стрка перехрдить на следующую
                ?></td></tr><?php
                 $count=0;   
            }
                    }   //foreach ($item as $key => $value)  
                        
                  } //if(13>=$GLOBALS['Data_dog']['age_id']){
                  
            }   //foreach($array as $item)
            
         }   //if( isset($_POST['puppy']) )
