<?php
//require_once(__DIR__ . '/libs/up.php');
//подключение библиотеки redBeanphp
require $_SERVER['DOCUMENT_ROOT']."/db.php";
//подключение шапки
require_once(__DIR__ . '/html/header.html');
require_once(__DIR__ . '/includes/func.php');
//включение ошибок//включение отчета по ошибкам
ini_set('display_errors',1);
error_reporting(E_ALL);

$id = $_GET['id']; 
$prt = new PrintDog(); 
$tbl = new Tabl();
$reg = new Registry;

function regbook_mum($id){
    return  R::getAssoc('SELECT * FROM registry WHERE mum= :id ORDER BY date DESC', [':id' => $id]);
}
function regbook_dad($id){
    return  R::getAssoc('SELECT * FROM registry WHERE dad= :id ORDER BY date DESC', [':id' => $id]);
}
if(0 == $prt->retSex($id)){
    $array = regbook_mum($id);
}
else {
    $array = regbook_dad($id);
}
$data_dog = $tbl->retRow($id, 'animals');


function ret_count($id){
    $reg = new Registry;
    if('0' != $reg->retFemale($id)){
        echo '<br>девочек: ' . $reg->retFemale($id) . '<br>';
    }
    if('0'!= $reg->retMale($id)){
        echo '<br>мальчиков: ' . $reg->retMale($id) . '<br>';
    }
}

?>
<style>
.content{
    margin: 0 auto;
    width: 850px;
    height: auto;
}    
.tabl-lit {
    border: 1px solid black;
    width: 800px;
    table-layout: fixed;
    border-collapse: collapse;
    margin-bottom: 50px;
    
}
.pomet{
    
    text-align: center;
    margin-bottom: 10px;
       
}
.tabl-dad {
    text-align: center;
    height: 200px;
}
.tabl-birth{
        text-align: center;
        padding-top: 2rem;
    
}
.tabl-mum {
    text-align: center;
}
.tabl-pup {
    text-align: center;
    padding-top: 2rem;
}
.testim p {
color: blue;
}
.testim a {
color: red;
}
</style>
<div class="content">
<?php
        if ($array): 
            foreach($array as $key => $value):?>
                <div class="pomet"><h1>Помет: "<?php echo $array[$key]['lit'];?>"</h1></div>
                <table class="tabl-lit">
                    <tbody>
                    <tr>
                        <td><div class="tabl-dad">Кобель: <br><?php echo $prt->picSex($array[$key]['dad']) . $prt->picLink($array[$key]['dad'], '150px');?></div></td>
                        <td class="tabl-birth">Дата рождения: <br><?php echo date_create($array[$key]['date'])->format('d-m-Y');?><br><?php  ret_count($key);?></td>
                        <td><div class="tabl-mum">Сука: <br><?php echo $prt->picSex($array[$key]['mum']) . $prt->picLink($array[$key]['mum'], '150px');?></div></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="tabl-pup">Щенки этого помета: <br><?php $reg->do_do($key)?></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                           
           <?php endforeach; 
        endif;
    ?>
    
</div>
 <div class= "testim">
<p>Изменяем цвет текста абзаца и <a href=”#”>ссылки</a></p>
</div>


