<?php
//подключение библиотеки redBeanphp
require "db.php";

//подключение файла с функциями
require "includes/functions.php";
//для распечатки собак в нужном размере
//require "get_image.php"; //возвращает $_POST['url']
//включение отчета по ошибкам
ini_set('display_errors',1);
error_reporting(E_ALL);

require "/html/header.html";

//require "/html/aside.html";
?>