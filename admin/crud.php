<?php require('settings.php'); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <title>CRUD_ADMIN</title>
  <meta charset="UTF-8">
  <!-- Стили -->
  <link rel="stylesheet" type="text/css" href="styleAdmin.css">
</head>
<<<<<<< HEAD
<?php
=======

<body>
  <div class="wrapper">
    <form action="crud.php" method="POST">
      <!--  /* форма создания ингредиента*/  -->
      <h1>Создать новый предмет</h1>
      <input type="text" placeholder="Внести новый предмет" name="ItemName">
      <button type="submit" name="addItem">Добавить в базу</button>
      <br>
      <input type="text" placeholder="Внести icons" name="icons">
      <button type="submit" name="addPic">Добавить картинку по имени предмета</button>
      <hr>
      <!--  /* форма создания рецепта*/  -->
      <h1>Создать новый рецепт</h1>
      <input type="text" placeholder="название рецепта" name="resept">
      <br><br>
      <input type="text" placeholder="ингредиент 1" name="item1"><input type="text" placeholder="кол-во 1" name="count1" size="5">
      <br>
      <input type="text" placeholder="ингредиент 2" name="item2"><input type="text" placeholder="кол-во 2" name="count2" size="5">
      <br>
      <input type="text" placeholder="ингредиент 3" name="item3"><input type="text" placeholder="кол-во 3" name="count3" size="5">
      <br>
      <input type="text" placeholder="ингредиент 4" name="item4"><input type="text" placeholder="кол-во 4" name="count4" size="5">
      <br><br>
      <button type="submit" name="addResept">Создать рецепт</button>
      <a class="buttons" href="admin.php">назад</a>
    <!--   Форма рецепта -->
    <details><summary>рецепт: </summary>
    <input type="text" placeholder="название рецепта" name="retResName"><input type="text" placeholder="ИД реца" name="retResId" size="10">
    <button type="submit" name="FndRes">Найти рецепт</button>
    </details> 
    </form>
    <?php
>>>>>>> ef947700f0e0a7ee0816ef9988d8e11086f61b0b

    $data = $_POST;
    $item = new OwnerItems();
    $tbl = new Tabl();
     function printResept($resept){
     
      $tbl = new Tabl();
      $item = new OwnerItems();

      $id = $item->retReseptIdByName($resept);
      $stringRes = $tbl->retRow($id,'resepts');
      var_dump($stringRes);
      $item1 = $item->retNameById($stringRes['val1']);
      $item2 = $item->retNameById($stringRes['val2']);
      $item3 = $item->retNameById($stringRes['val3']);
      $item4 = $item->retNameById($stringRes['val4']);
     


      ?>
      <table class="iksweb">
      <h1>Создан новый рецепт:</h1>
        <tbody>
          <tr>
            <td ><?php $item = new OwnerItems();$item->printPic($resept,'resept');?></td>
            <td colspan="3" class = "nazvanie"><?php echo $resept;?></td>
          </tr>
          <tr>
            <td colspan="4"  class = "td3">материалы</td>
          </tr>
          <tr>
            <td class = "tameriali"><?php $item->printPic($item1,'item');?></td>
            <td class = "tameriali"><?php $item->printPic($item2,'item');?></td>
            <td class = "tameriali"><?php $item->printPic($item3,'item');?></td>
            <td class = "tameriali"><?php $item->printPic($item4,'item');?></td>
          
          </tr>
        </tbody>
      </table>
      <?php
     }

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
    // echo '<details><summary>Таблица: Items</summary>';
    // $tbl->PrintItem();
    // echo '</details>';  
   
    /* форма создания рецепта*/
    //var_dump($_POST);
    if(isset($_POST['addResept'])){
      
      if(empty($_POST['resept'])){
       echo 'Введите название рецепта' ;
       unset($_POST['addResept']);
      }
      else{
        echo '<br>cоздаем рецепт <strong>' . $_POST['resept'] . '</strong>';
        if(empty($_POST['item1'])){
          echo '<br>неоходимо внести хотябы 1 ингердиент';
        }
        else{
          //echo '<br>из ингредентов: ' . $_POST['item1'] . ', ' . $_POST['item2']. ' ,' .$_POST['item3']. ' ,' . $_POST['item4'] . '.';
          if(!empty($_POST['item1'])){ //если веден 1 ингредиент и 
            echo '<br>заполнен 1 ингредиент <br>';
            $res = $_POST['resept']; // название рецепта
            
            
            
            /* 1. Провека, если такой РЕЦЕПТ в ITEMS*/ 

            //найти индекс ПОПОНА(рецепта)
            $itemId = R::findOne('items', 'name LIKE ?', ["%$res%"]);
            //var_dump($itemId);
            if (NULL == $itemId){
              echo '<BR>создаем рецепт/создаем итем/ у итем проставляем ИД рецепта';
              $new_id_res = $item->AddResept($res);
              $new_id_item = $item->AddItem($res);
              $tbl->UpdateData('items', $new_id_item, 'res_id', $new_id_res);

            }
            if(isset($itemId['id'])){
             // echo 'проверить его РЕС_ИД';
              $id_res = R::getCell('SELECT `res_id` FROM items WHERE `id` = ? LIMIT 1', [$itemId['id']]);
              if(NULL == $id_res){
                 echo '<br>создаем рецепт/у итема проставляем ИД рецепта 22';
                 $new_id_res = $item->AddResept($res);
                 $tbl->UpdateData('items', $itemId['id'], 'res_id', $new_id_res);
              }
              if(isset($id_res)){
                  echo '<br>рецет уже существует';
                  $new_id_res = $id_res;
                  $resName = R::getCell('SELECT `name` FROM resepts WHERE `id` = ? LIMIT 1', [ $new_id_res]);
                  // var_dump($VBaze);
                    if(NULL != $resName){
                       echo '<br><strong>' . $resName . '</strong> уже есть в базе'; 
                       goto vse;
                   
                    }
                   
                  
              }
            }

             /* 2. Провека, если такой ИТЕМ в ITEMS*/ 
             $itm1 = $_POST['item1']; // название Итема1
             //создаем итем
             $id_new_itm1 = $item->AddItem($itm1);
             if(FALSE == $id_new_itm1){ //если такой ИД есть в базе пересохраняем ИД из базы
                $id_new_itm1 = $item->retItemIdByName($itm1);
             }
             echo '<br>  $id_new_itm1 ' . $id_new_itm1;
             echo '<br> $new_id_res ' . $new_id_res; 
             echo '<br> count1 ' . $_POST['count1'];
             if(empty($_POST['count1'])){
              echo '<br>! количество по умолчанию = 1';
              $_POST['count1'] = 1;
            } 
             //внесни данные ИТМ1 и кол-ва по итем1
             $tbl->UpdateData('resepts',$new_id_res, 'val1', $id_new_itm1);
             $tbl->UpdateData('resepts',$new_id_res, 'count1', $_POST['count1']);
            
            
            
             if(!empty($_POST['item2'])){
               /* 2. Провека, если такой ИТЕМ2 в ITEMS*/ 
                $itm1 = $_POST['item2']; // название Итема1
                //создаем итем
                $id_new_itm1 = $item->AddItem($itm1);
                if(FALSE == $id_new_itm1){
                    $id_new_itm1 = $item->retItemIdByName($itm1);
                }
                echo '<br>  $id_new_itm2 ' . $id_new_itm1;
                echo '<br> $new_id_res ' . $new_id_res; 
                echo '<br> count2 ' . $_POST['count2']; 
                //если количество не заполнено, по умолчанию проставляется 1
                if(empty($_POST['count2'])){
                  echo '<br>! количество по умолчанию = 1';
                  $_POST['count2'] = 1;
                }
                //внесни данные ИТМ2 и кол-ва по итем2
                $tbl->UpdateData('resepts',$new_id_res, 'val2', $id_new_itm1);
                $tbl->UpdateData('resepts',$new_id_res, 'count2', $_POST['count2']);
          
            }

            if(!empty($_POST['item3'])){
              /* 2. Провека, если такой ИТЕМ3 в ITEMS*/ 
               $itm1 = $_POST['item3']; // название Итема1
               //создаем итем
               $id_new_itm1 = $item->AddItem($itm1);
               if(FALSE == $id_new_itm1){
                   $id_new_itm1 = $item->retItemIdByName($itm1);
               }
               echo '<br>  $id_new_itm3 ' . $id_new_itm1;
               echo '<br> $new_id_res ' . $new_id_res; 
               echo '<br> count3 ' . $_POST['count3']; 
               if(empty($_POST['count3'])){
                echo '<br>! количество по умолчанию = 1';
                $_POST['count3'] = 1;
              }
               //внесни данные ИТМ3 и кол-ва по итем3
               $tbl->UpdateData('resepts',$new_id_res, 'val3', $id_new_itm1);
               $tbl->UpdateData('resepts',$new_id_res, 'count3', $_POST['count3']);
         
           }

           if(!empty($_POST['item4'])){
            /* 2. Провека, если такой ИТЕМ4 в ITEMS*/ 
             $itm1 = $_POST['item4']; // название Итема1
             //создаем итем
             $id_new_itm1 = $item->AddItem($itm1);
             if(FALSE == $id_new_itm1){
                 $id_new_itm1 = $item->retItemIdByName($itm1);
             }
             echo '<br>  $id_new_itm4 ' . $id_new_itm1;
             echo '<br> $new_id_res ' . $new_id_res; 
             echo '<br> count4 ' . $_POST['count4']; 
             if(empty($_POST['count4'])){
              echo '<br>! количество по умолчанию = 1';
              $_POST['count2'] = 4;
            }
             //внесни данные ИТМ4 и кол-ва по итем4
             $tbl->UpdateData('resepts',$new_id_res, 'val4', $id_new_itm1);
             $tbl->UpdateData('resepts',$new_id_res, 'count4', $_POST['count4']);
          }
         }
         vse:
         echo 'и всетаки от существует';
        }
      }
    }
<<<<<<< HEAD
   
   

   ?>
   
<body>
  <div class="wrapper">
    <form action="crud.php" method="POST">
      <!--  /* форма создания ингредиента*/  -->
      <h1>Создать новый предмет</h1>
      <input type="text" placeholder="Внести новый предмет" name="ItemName">
      <button type="submit" name="addItem">Добавить в базу</button>
      
      <br>
      <input type="text" placeholder="Внести icons" name="icons">
      <button type="submit" name="addPic">Добавить картинку по имени предмета</button>
      <br>
      
    
      
      <br>
      <hr>
      <!--  /* форма создания рецепта*/  -->
      <h1>Создать новый рецепт</h1>
      <input type="text" placeholder="название рецепта" name="resept">
      <br><br>
      <input type="text" placeholder="ингредиент 1" name="item1"><input type="text" placeholder="кол-во 1" name="count1" size="5">
      <br>
      <input type="text" placeholder="ингредиент 2" name="item2"><input type="text" placeholder="кол-во 2" name="count2" size="5">
      <br>
      <input type="text" placeholder="ингредиент 3" name="item3"><input type="text" placeholder="кол-во 3" name="count3" size="5">
      <br>
      <input type="text" placeholder="ингредиент 4" name="item4"><input type="text" placeholder="кол-во 4" name="count4" size="5">
      <br><br>
      <button type="submit" name="addResept">Создать рецепт</button>
      
      <?php if((!empty($_POST['resept'])) AND (!empty($_POST['item1']))){
          printResept($_POST['resept']);
      }

     
       ?>
      <a class="buttons" href="admin.php">назад</a>
    </form>
    
=======
    if(isset($_POST['FndRes']) AND (!empty($_POST['retResName']))){
     // echo 'knopka nagata и внесено название рецепта';
      $id_resepta = $item->retReseptIdByName($_POST['retResName']);
      if(!empty($id_resepta)){
        echo '  id ' . $id_resepta;
        $_POST['retResId'] = $id_resepta;
      }
    }
      if(isset($_POST['FndRes']) AND (!empty($_POST['retResId']))){
       //echo 'knopka nagata  и введен ИД';
        $str_resepta = $item->retReseptNameById($_POST['retResId']);
       
        if(!empty($str_resepta)){
        // debug($str_resepta);
         dataRes($str_resepta);
        }
      }
     function dataRes($str_resepta){
      $item = new OwnerItems();
      ?>
      <h2><?php echo $str_resepta['name'] . ' id = ' . $str_resepta['id']; ?></h2>
      <div class="table2">
            <table class="table">
          <tr>
              <td> <?php echo $item->retNameItemById($str_resepta['val1']);?> </td>
              <td> <?php echo $str_resepta['count1'];?> </td>
          </tr>
          <tr>
            <td> <?php echo $item->retNameItemById($str_resepta['val2']);?> </td>
              <td> <?php echo $str_resepta['count2'];?> </td>
          </tr>
          <tr>
            <td> <?php echo $item->retNameItemById($str_resepta['val3']);?> </td>
              <td> <?php echo $str_resepta['count3'];?> </td>
          </tr>
          <tr>
            <td> <?php echo $item->retNameItemById($str_resepta['val4']);?> </td>
              <td> <?php echo $str_resepta['count4'];?> </td>
          </tr>
      </table>
    </div>
     
      
      
<?php    
     }

?>
>>>>>>> ef947700f0e0a7ee0816ef9988d8e11086f61b0b
  </div>
</body>

</html>