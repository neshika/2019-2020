<?php 
require "settings.php";
//require "db.php";


?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>SELECT_Dogs_ADMIN</title>
    <meta charset="UTF-8">
       <!-- Стили -->
   <link rel="stylesheet" type="text/css" href="styleAdmin.css">
  </head>

  <body>
    <div class="wrapper"> 
    <form method="POST" action="select_dogs.php">
   
    <table border="1">
    <tr>
        <td> <button>щенок</button><button>взрослая</button></td>
        <td>фото</td>
        <td><button>рандомн</button><button>создать ДНК</button></td>
    </tr>
    <tr>
        <td>Статы</td>
        <td>перечень\
            <li></li>
            <li></li>

        </td>
        <td><button>рандом</button><button>создать статы</button></td>
      
    </tr>
</table>
   
    
    </form>

    <a class="buttons" href="admin.php" >назад</a>
    </div>
   </body>
 </html>