<?php
//файл db.php

require "../libs/rb.php";

R::setup(
        'mysql:host=127.0.0.1;dbname=my_bd',
        'root',
        '321478828'
); //for both mysql or mariaDB
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/func.php'); //функции класс adminka

