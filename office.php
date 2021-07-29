<?php
require "db.php";
		//подключение файлов
		require_once(__DIR__ . '/html/header.html');
               		
?><div class="content">
<?php
//require "includes/functions.php";
require "includes/func.php";

?><hr><a href="http://dog.ru/test.php">тестим тут</a><hr> <?php


$login = $_SESSION['logged_user']->login;
echo 'Добро пожаловать, ' . $GLOBALS['name']= $login . ' .<br>';
echo '<br>сегодня: ' . date('d.m.Y');
$dog = new Dog;
$user = new Users;
$tabl = new Tabl;
$ken = new Kennels;
$rand_dog = new RandDog;
$event = new Office;




$now=date('d.m.Y');  //03.08.2017
$owner = $user->retOwner();
$dog->countDogs($owner); // считает количество собак у владельца


if($now!=$user->retLTime($owner)){
//echo '<br> разые';
    $visits = $user->retVisits($owner);
    $visits+=1;
    $tabl->UpdateData('users',$user->retId($owner),'visits',$visits);
    $tabl->UpdateData('users',$user->retId($owner),'l_time',$now);
}    
echo '<br> количество посещений: ' . $user->retVisits($owner);
echo '<br> собак в питомнике: ' . $ken->retCountDog($owner); // считает количество собак у владельца

echo "<h3><li>Последние новости</li></h3>";

if (isset($_POST['comment'])) { //если в форме NewDog включена кнопка отправки имени собаки
    echo '<br> родился малыш: ';
    echo $a = $_POST['comment'];
    // echo $_SESSION['id_new'];
    $tabl->UpdateData('animals',$_SESSION['id_new'],'name',$_POST['comment']);
   // insert_data('animals',$_SESSION['id_new'],'name',$_POST['comment']);
//  insert_name($_SESSION['id_new'],$_POST['comment']);
    if ($tabl->retCell('l_time', $id, 'users') == $now ) {
        //echo '<br> Чудо свершилось! рождены: <br>';
        //$count = R::count( 'animals', 'owner = :owner && status = 1',[':owner' => $owner]);
        //$array[] = R::getAssoc('SELECT id FROM animals WHERE owner = :owner && status = 1' ,[':owner' => $owner);
        //debug($array);
         foreach($array as $item) {
            foreach ($item as $key => $value) {
                if ( ('Без имени' == $tabl->retCell('name', $key,'animals')) || (''== $tabl->retCell('name', $key,'animals')) ){
                    echo '<br>необходимо дать имя новой собаке: ';
                    echo '<a href="/name.php?id=' . $key . '">';?>
                    <img src="<?php echo $tabl->retCell('url_puppy',$key,'animals');?>" width="5%" float="left"></a><?php
                }
            }
        }
              						
    } //find_where('users', $id,'l_time') == $now 
} //isset($_POST['comment'])

echo "<h3><li>Важные события:</h3>";
    $num = 0;
    $num = $event->randoEvent();
    if (2 == $num){ //если выпал щенок
        ?>
        <form method="POST" action="office.php">
        <div> Что делаем с щенком ?
        <input type="submit" class="btn btn-dark" name="puppy" value="Пристроить">
        <input type="button" class="btn btn-dark" name="my_puppy" value="Оставить">
        <div>
        </form>
        <?php
        
    }
    if (3 == $num){ //если выпала старая собака
        ?>
        <form method="POST" action="office.php">
        <input type="submit" class="btn btn-dark" name="old_dog" value="Пристроить собаку"><br>
        </form>
        <?php
    }
     if( isset($_POST['puppy']) ){ 
        //если кнопка пристроить малыша нажата
        echo 'Щенок нашел хорошие руки! Новые папа и мама его обожают! ';
        unset($_POST['puppy']);
    }
    if( isset($_POST['old_dog']) ){ 
        //если кнопка пристроить взрослую собаку нажата
         echo 'Собака нашла свою старость в добрых руках!';
          unset($_POST['old_dog']);
    }
   
   
    /*Проверяем, есть ли в питомнике собаки без Имени и даем ссылку на страницу*/
    $name = 'Без имени';
    $array = R::getAssoc('SELECT id FROM animals WHERE owner = :owner && name = :name' ,
            [':owner' => $owner, ':name' => $name]);
    $obj = new PrintDog; //создаем объект класса распечатки собаки

    If(!empty($array)){
        echo "Нужно дать имена малышам на их страничке:";
        foreach ($array as $key => $value) {
            //pic_link($key, 55);
           $obj->picLink($key, 55);
        }
    }

    if( isset($_POST['shelter']) ){ 
        echo 'Cобака отдана в приют!';
        //echo '<br>Вы не смогли ее содержать!';
        $id = $_SESSION['Dog'];
        $obj->picLink($id, 50);
        //dog_pic_size($id, 50);

        $ret_dna = $dog->retDnaId($id);
        // Загружаем объект с ID = собаки, который взяли из animals
            $dog = R::load('randodna', $ret_dna);
        // Обращаемся к свойству объекта и назначаем ему новое значение
        $dog->about = 'shelter';
        // Сохраняем объект
         R::store($dog);

        //высчитываем стоимость в зависимости от параметров
        $price=$rand_dog->dogPrice($id);
     //**************************  уменьшаем стоимость на 50 % ***************** //
      $price=$price/2;
      $obj->printMoney($login);
      $dog->putMoney($login,$price);
      echo 'Выручка составила: ' . $price;
      $dogshelter = R::load('animals', $id);
      $dogshelter->owner='shelter';
      R::store($dogshelter);

    }
    //кнопка купить собаку. акция актуальна только сегодня
    $rando = rand(1, 100);
     if ($rando == 1){
         ?>
                    <h3><li>Только сегодня акция: </li></h3>";   

                    <form action="buy.php" method="POST">
                        <button type="submit" class="knopka" name="buy">Купить собаку</button>
                    </form>
         <?php           
     }


                     
                     
			 