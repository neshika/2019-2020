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

echo $id = $_GET['id']; 
?>
<div class="content">
    <table class="tabl-lit">
    <caption class="tabl-caption"><div>Помет: Д</div></caption>
    <tbody>
    <tr>
        <td><div class="tabl-dad">Отец:</div></td>
        <td class="tabl-birth">Дата рождения</td>
        <td class="tabl-mum">Мать</td>
    </tr>
    <tr>
        <td></td>
        <td class="tabl-pup">Щенки этого помета:</td>
        <td></td>
    </tr>
    </tbody>
 </div>
 <div class=”block”>
<p>Изменяем цвет текста абзаца и <a href=”#”>ссылки</a></p>
</div>

