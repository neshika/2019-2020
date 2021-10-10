<?php
//файл db.php

require "libs/rb.php";
//R::setup('mysql:host=127.0.0.1;dbname=My_bd',
 //       'root', 'root' ); //for both mysql or mariaDB
R::setup('mysql:host=localhost;dbname=id8694121_my_bd',
     'id8694121_name', 'dg(pEz4qUSCZRS4' );
session_start();
//echo 'db включена';
