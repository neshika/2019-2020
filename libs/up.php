<?php
//подключение библиотеки redBeanphp
require $_SERVER['DOCUMENT_ROOT']."/db.php";

//подключение файла с функциями
//require $_SERVER['DOCUMENT_ROOT']."/includes/functions.php";

require $_SERVER['DOCUMENT_ROOT'].'/html/header.html';
//require '/public_html/html/header.html';
//require $_SERVER['DOCUMENT_ROOT'].'/html/nav.html';
//require $_SERVER['DOCUMENT_ROOT'].'/html/aside.html';

//включение отчета по ошибкам
ini_set('display_errors',1);
error_reporting(E_ALL);

