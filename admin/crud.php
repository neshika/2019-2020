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
    </form>
    <?php

    $data = $_POST;
    $item = new OwnerItems();
    //var_dump($data['addItem']);
  
    if ( (isset($data['addItem'])) AND (!empty($data['ItemName'])) ) {
     // echo 'Кнопка нажата, вы ввели: ' . $data['ItemName'];
      $new_id = $item->AddItem($data['ItemName']);
      if(FALSE != $new_id){
        echo '<br> Новый id : ' . $new_id;
      }
      
    }
    // else{
    //   echo 'Предмен не введен';
    // }
    ?>


    <a class="buttons" href="admin.php">назад</a>
  </div>
</body>

</html>