
<?php
//подключение файлов
require_once(__DIR__ . '/libs/up.php');

     
?> <div class="content">
<?php echo "Тестируем: <br>";
$id=2;
$arr [] = ret_Row($id, 'randodna');            
//debug($arr);
$dog = R::dispense('randodna');
$dog->hr = $arr[0]['hr'];
$dog->ww = $arr[0]['ww'];
$dog->ff = $arr[0]['ff'];
$dog->bb = $arr[0]['bb'];
$dog->tt = $arr[0]['tt'];
$dog->mm = $arr[0]['mm'];
$dog->sex = $arr[0]['sex'];
$dog->lucky = $arr[0]['lucky'];
$dog->spd = $arr[0]['spd'];
$dog->agl = $arr[0]['agl'];
$dog->tch = $arr[0]['tch'];
$dog->jmp = $arr[0]['jmp'];
$dog->nuh = $arr[0]['nuh'];
$dog->fnd = $arr[0]['fnd'];
$dog->mut = $arr[0]['mut'];
$dog->dna = $arr[0]['dna'];
$dog->about = $arr[0]['about'];

 echo R::store($dog);
 //$dog = R::findOrCreate($arr);
 //debug($dog);

//$ids = [1];
//$books = R::loadAll('randodna', $ids);
//debug($books);
//foreach ($books as $key => $value) {
//    echo "[$key] = $value" ;
//}

//$id = 1;
//$dog = R::load('randodna', $id);
//debug($dog);
//$dog2 = R::dispense('randodna');
//
//foreach ($dog as $key => $value){ 
//    $dog2->$key = $value;
//    echo "[$key] = $value <br>" ;
//}
//echo R::store($dog);
?></div>     









