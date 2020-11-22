
<?php
//подключение файлов
//require_once(__DIR__ . '/libs/up.php');
require $_SERVER['DOCUMENT_ROOT']."/db.php";
//require $_SERVER['DOCUMENT_ROOT']."/includes/functions.php";
//require $_SERVER['DOCUMENT_ROOT'].'/html/header.html';
ini_set('display_errors',1);
error_reporting(E_ALL);



echo "Тестируем: <br>";
//////////////////////////////////////// ишем нужную сторку данныек в таблицу
 $test = R::load( 'test', 1 );
    // а можно и так  $query = R::getAll( 'SELECT * FROM jobs' ); 
    //echo($test);
    foreach ($test as $key => $value) {
       if($key!='id'){
            echo "[$key]=$value <br>";  
       }
}


//////////////////////////////////////// веносим данные в таблицу, выводим 
$test = R::load( 'test', 4 );
$dog = R::dispense('test');
foreach ($test as $key => $value) {
       if($key!='id'){
            $dog->$key=$test[$key];  
       }
}      
echo "<br>";
echo R::store($dog);       


//////////////////////////////////////// удалить данные из таблицы по индексу

$testdel = R::load('test', 3); // Загружаем
echo 'удали индекс!';
//R::trash($testdel); // Удаляем







