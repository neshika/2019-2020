<?php require('settings.php'); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <title>CRUD_ADMIN</title>
  <meta charset="UTF-8">
  <!-- Стили -->
  <link rel="stylesheet" type="text/css" href="styleAdmin.css">
</head>

<body>
  <div class="wrapper">
    <form action="crud.php" method="POST">
      <input type="text" placeholder="Внести новый предмет" name="ItemName">
      <button type="submit" name="addItem">Добавить в базу</button>
      <input type="text" placeholder="Внести icons" name="icons">
      <button type="submit" name="addPic">Добавить картинку по имени</button>
      <a class="buttons" href="admin.php">назад</a>
    </form>
    <?php

    $data = $_POST;
    $item = new OwnerItems();
    $tbl = new Tabl();
   /* если нажали кнопку "Добавить в базу" и заполнили название предмента*/
    if ( (isset($data['addItem'])) AND (!empty($data['ItemName'])) ) {
     // echo 'Кнопка нажата, вы ввели: ' . $data['ItemName'];
      $new_id = $item->AddItem($data['ItemName']);
      if(FALSE != $new_id){
        echo '<br> Новый id : ' . $new_id;
      }
    }
    /*Если нажали кнопку добавить картинку по имени*/
    if( (isset($data['addPic'])) AND (!empty($data['ItemName']) AND (!empty($data['icons'])))){
        echo 'insert icons';
        $item->AddIcon($data['ItemName'],$data['icons']);

    }
    
    /*Выводит данные таблицы Items*/
      $tbl->PrintItem();
   ?>
  </div>
</body>

</html>