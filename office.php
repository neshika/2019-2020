<?php
require "db.php";
		//подключение файлов
		require_once(__DIR__ . '/html/header.html');
		
?><div class="content">
<?php
require "includes/functions.php";
echo 'Добро пожаловать, ' . $GLOBALS['name']=$_SESSION['logged_user']->login . ' .';
echo ' Сегодня: ' . date('d.m.Y');
$id=get_id($_SESSION['logged_user']->login);
$owner= ret_owner();
$l_time= ret_Cell('l_time', $id,'users');
$f_time= ret_Cell('f_time', $id,'users');
$now=date('d.m.Y');  //03.08.2017
$visits= ret_Cell('visits',$id,'users');
if($now!=$l_time){
// echo 'разые';
    $visits=$visits+1;
    insert_data('users',$id,'visits',$visits);
    insert_data('users',$id,'l_time',$now);
}
echo '<br> количество посещений: ' . $visits;


echo "<h3><li>Последние новости</li></h3>";

if (isset($_POST['comment'])) { //если в форме NewDog включена кнопка отправки имени собаки
    echo '<br> родился малыш: ';
    echo $a = $_POST['comment'];
    // echo $_SESSION['id_new'];
    insert_data('animals',$_SESSION['id_new'],'name',$_POST['comment']);
//  insert_name($_SESSION['id_new'],$_POST['comment']);
    if (ret_Cell('l_time', $id, 'users') == $now ) {
        //echo '<br> Чудо свершилось! рождены: <br>';
        //$count = R::count( 'animals', 'owner = :owner && status = 1',[':owner' => $owner]);
        //$array[] = R::getAssoc('SELECT id FROM animals WHERE owner = :owner && status = 1' ,[':owner' => $owner);
        //debug($array);
         foreach($array as $item) {
            foreach ($item as $key => $value) {
                if ( ('Без имени'==ret_cell('name', $key,'animals')) || (''==ret_cell('name', $key,'animals')) ){
                    echo '<br>необходимо дать имя новой собаке: ';
                    echo '<a href="/name.php?id=' . $key . '">';?>
                    <img src="<?php echo ret_cell('url_puppy',$key,'animals');?>" width="5%" float="left"></a><?php
                }
            }
        }
              						
    } //find_where('users', $id,'l_time') == $now 
} //isset($_POST['comment'])

echo "<h3><li>Важные события: </li></h3>";   

/*Проверяем, есть ли в питомнике собаки без Имени и даем ссылку на страницу*/
$name = 'Без имени';
$array = R::getAssoc('SELECT id FROM animals WHERE owner = :owner && name = :name' ,
        [':owner' => $owner, ':name' => $name]);
If(!empty($array)){
    echo "Нужно дать имена малышам на их страничке:";
    foreach ($array as $key => $value) {
        pic_link($key, 55);
    }
}




				
if( isset($_POST['shelter']) ){ 
    echo 'Cобака отдана в приют!';
    //echo '<br>Вы не смогли ее содержать!';
    $id = $_SESSION['Dog'];
    dog_pic_size($id, 50);
    
    $ret_dna= ret_dna($id);
    // Загружаем объект с ID = собаки, который взяли из animals
        $dog = R::load('randodna', $ret_dna);
    // Обращаемся к свойству объекта и назначаем ему новое значение
    $dog->about = 'shelter';
    // Сохраняем объект
     R::store($dog);
     
    //высчитываем стоимость в зависимости от параметров
    $price=pricing($id);
 //**************************  уменьшаем стоимость на 50 % ***************** //
  $price=$price/10;
  put_money($_SESSION['logged_user']->login,$price);
  echo 'Выручка составила: ' . $price;
  $dogshelter = R::load('animals', $id);
  $dogshelter->owner='shelter';
  R::store($dogshelter);
  

}

                     
                     
			 