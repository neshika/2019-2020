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
        $coins = print_money($owner);
        $char='puppy';?>
<div class="content">
<p class="kennel"><br>Питомник: <?php echo $kennel;?> // Владелец: <?php echo $owner;?>
    // Количество собак: <?php echo $count;?>
    // <img src = "/pici/coins_mini.png"><?php echo  $coins;
    
/****************************** Если нажата кнопка СУКИ выводим на экран всех собак, пренадлежащих владельцу*/
?><p class="left"><img src = "/pic/puppy_mini.png" alt = "щенки" width="3%"></p>
<?php  
 if('puppy'==$char){
        $array[] = R::getAssoc('SELECT id,name FROM animals WHERE owner = :owner && status = 1' ,
              [':owner' => $owner]);
   ?>
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
                    <img src="<?php echo bdika_url($key);?>" width="25%"></a> 
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
    