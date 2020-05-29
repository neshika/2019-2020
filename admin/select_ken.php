<?php
require "settings.php";
//require "includes/functions.php";

?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>SELECT_Kennel_ADMIN</title>
    <meta charset="UTF-8">
       <!-- Стили -->
   <link rel="stylesheet" type="text/css" href="styleAdmin.css">
  </head>

  <body>
    <div class="wrapper"><h1 align="center">Рабочая зона</h1>
      <div class="left">
          <form method="POST" action = "<?=$_SERVER['REQUESR_URI']?>">
                <input type="submit" value="тестируем" class = "knopka" name="go">
                <input type="submit" value="все питомники" class = "knopka" name="all">
                <input type="submit" value="новый питомник" class = "knopka" name="insert">
                <input type="submit" value="Что делаем" class = "knopka">
                <a class="buttons" href="admin.php" >назад</a>
          </form>
      </div>
     <div class="right">
    <p><?php echo 'давай поработаем... с чего начнем?<br>';?></p>
 <?php       
    //в случае если нажата кнопка, вызываем функцию проверяет тест
        if ( isset( $_POST['go'])){  
            test();  
        }  
    //выдает все существующие питомники
        if ( isset( $_POST['all'])){  
            echo '<pre>' . print_r(selectAll(), true). '</pre>';  
        } 
     //добавляет питомник
        if ( isset( $_POST['all'])){  
            echo '<pre>' . print_r(selectAll(), true). '</pre>';  
        } 
      
      
    ?>
     
    </div>
    </div>  
  
   </body>
 </html>