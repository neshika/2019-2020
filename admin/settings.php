<?php
//файл db.php

require "../libs/rb.php";

R::setup( 'mysql:host=127.0.0.1;dbname=My_bd',
        'root', 'root' ); //for both mysql or mariaDB
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/func.php'); //функции класс adminka

?>