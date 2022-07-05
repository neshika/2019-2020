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
    <input type="text" placeholder="Внести новый предмет" name="ItemName">
    <button type="submit" name="addItem">Добавить в базу</button>
    <?php
    $data = $_POST;
    if (isset($data['addItem'])) {
      echo 'Кнопка нажата';
    }

    ?>

    <a class="buttons" href="admin.php">назад</a>
  </div>
</body>

</html>