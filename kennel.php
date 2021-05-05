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
        $char='all_dogs';
        ?>
<div class="content">
<p class="kennel"><br>Питомник: <?php echo $kennel;?> // Владелец: <?php echo $owner;?> // Количество собак: <?php echo $count;?><br><img src = "/pici/coins_mini.png"> <?php echo  $coins;
       
?>
<!--создаем форму с кнопками по сортировке собак на виды-->
<form method="POST" action="/kennel.php">
    <button type="submit" class="knopka" name="money" >кредит 50 000</button>
</form>
</p>
<?php
    if('all_dogs'==$char){
        
        $array[] = R::getAssoc('SELECT id,name FROM animals WHERE owner = :owner && status = 1' ,
        [':owner' => $owner]);
/*картинка суки/кобели*/              
?><p class="kennel"><img src = "/pici/male.png" width="3%"><img src = "/pici/female.png" width="3%"></p>
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
    if (isset ($_POST['money'])){
        put_money($owner, 50000);
    }
    
    