<?php
//файл db.php

require 'libs/rb.php';
// локальное подключение
if ($_SERVER['HTTP_HOST'] == 'dog.ru') {
  R::setup(
    'mysql:host=127.0.0.1;dbname=my_bd',
    'root',
    '321478828'
  );
} else {
  // db www.neshika.ru
  R::setup(
    'mysql:host=localhost;dbname=ca33905_dog',
    'ca33905_dog',
    'Z321478828z'
  );
}
session_start();

//echo 'db включена';