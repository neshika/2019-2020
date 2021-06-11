<?php
//подключение файлов
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');
$printdog = new PrintDog();

$owner=ret_owner(); //сохраняем название владельца в переменную из куки
/*Получаем запросом  навание питомника, при условии что владелец идентифицируется по куку Сессии*/
        $kennel = R::getCell('SELECT kennel FROM users WHERE login = :owner',
        [':owner' => $owner]);
        /*каунтом считаем сколько строк с собаками по владельцу*/        
         $count = R::count( 'animals', 'owner = :owner && status = 1',
        [':owner' => $owner]);
        $coins = print_money($owner);
        $char='female';?>
<div class="content">
<p class="kennel"><br>Питомник: <?php echo $kennel;?> // Владелец: <?php echo $owner;?>
    // Количество собак: <?php echo $count;?>
    // <img src = "/pici/coins_mini.png"><?php echo  $coins;
    
/****************************** Если нажата кнопка СУКИ выводим на экран всех собак, пренадлежащих владельцу*/
?><p class="left"><img src = "/pici/female.png" alt = "девочки" width="3%"></p>
<?php  if('female'==$char){
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
                                 ?><td><?php $printdog->picLink($id,'10%'); ?><div><?php
                                   echo '<br>имя: ' . $name;
                                    echo '<br> возраст ' . $age . '<br>';
                                    echo bdika_estrus($id);
                                    echo '<a href="/lit&pup.php?id=' . $id . '">' . "<br> вязки/дети: ". $lit .'/'. $pup . '</a>'; 
                                    ?></div><?php                
                                    $countf=$countf+1;
                                   // var_dump($countf);
                                }
                             else{
                                 ?></td></tr><?php
                                 $countf=0;
                              //  echo '<br>мы в else';
                                ?><td><?php $printdog->picLink($id, '35%'); ?><div><?php
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