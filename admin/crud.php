<?php require('settings.php'); 
$itm = new OwnerItems(); 
$tbl = new Tabl();
?>
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
      <!--  /* форма создания ингредиента*/  -->
      <h1>Создать новый предмет</h1>
      <input type="text" class="stroka" placeholder="Внести новый предмет" name="ItemName">
      <button type="submit" class="knopka" name="addItem">Добавить в базу</button>
      <br>
      <input type="text" class="stroka" placeholder="Внести icons" name="icons">
      <button type="submit" class="knopka" name="addPic">Добавить картинку по имени предмета</button>
      <br>
      <!--   Форма поиска итема -->
      <h2>поиск предмета:</h2>
      <input type="text" class= "stroka" placeholder="название предмета" name="retItemName"><input type="text" class= "stroka" placeholder="ИД Предмета" name="retItemId" size="10">
      <button type="submit" class="knopka" name="FndItem">Найти предмет</button><?php
     // var_dump($_POST['FindItem']);
        if (isset($_POST['FndItem']) and (!empty($_POST['retItemName']))) {
              //echo 'knopka nagata и внесено название итема';
              $id_item = $itm->retItemIdByName($_POST['retItemName']);
              if (!empty($id_item)) {
                $_POST['retItemId'] = $id_item;
              }
             
        }
        if (isset($_POST['FndItem']) and (!empty($_POST['retItemId']))) {
        // echo 'knopka nagata  и введен ИД';
          $str_item = $tbl->retRow($_POST['retItemId'],'items');
          if(!empty($str_item)) {
           $itm->dataItem($str_item);
          }
        }

      /*Выводит данные таблицы Items*/
          echo '<details><summary>Таблица: Items</summary>';
          $tbl->PrintItems();
          echo '</details>';  ?>
      <br> <!--   кнопка возврата на предыдущую страницу -->
       <a class="buttons" href="admin.php">назад</a><br><hr>
      <!--  /* форма создания рецепта*/  -->
      <h1>Создать новый рецепт</h1>
      <input type="text" class="stroka2" placeholder="название рецепта" name="resept">
      <br><br>
      <input type="text" class="stroka" placeholder="ингредиент 1" name="item1">  <input type="text" class="stroka3" placeholder=" кол-во 1" name="count1" size="5">
      <textarea placeholder="описание" name="info" style="height: 121px; width: 451px;"></textarea>
      <br>
      <input type="text" class="stroka" placeholder="ингредиент 2" name="item2">  <input type="text" class="stroka3" placeholder=" кол-во 2" name="count2" size="5">
      <br>
      <input type="text" class="stroka" placeholder="ингредиент 3" name="item3">  <input type="text" class="stroka3" placeholder=" кол-во 3" name="count3" size="5">
      <br>
      <input type="text" class="stroka" placeholder="ингредиент 4" name="item4">  <input type="text" class="stroka3" placeholder=" кол-во 4" name="count4" size="5">
      <br><br>
      <button type="submit" class="knopka" name="addResept">Создать рецепт</button>
      <!--   Форма поиска рецепта -->
      <h2>поиск рецепта:</h2>
      <input type="text" class= "stroka" placeholder="название рецепта" name="retResName"><input type="text" class= "stroka" placeholder="ИД реца" name="retResId" size="10">
      <button type="submit" class="knopka" name="FndRes">Найти рецепт</button>
      <?php
        if (isset($_POST['FndRes']) and (!empty($_POST['retResName']))) {
              // echo 'knopka nagata и внесено название рецепта';
              $id_resepta = $itm->retReseptIdByName($_POST['retResName']);
              if (!empty($id_resepta)) {
              //  echo '  id ' . $id_resepta;
                $_POST['retResId'] = $id_resepta;
              }
              // else{
              //   echo 'рецепта с таким названием нету в базе.';
              //   var_dump($id_resepta);
              // }
            }
            if (isset($_POST['FndRes']) and (!empty($_POST['retResId']))) {
              //echo 'knopka nagata  и введен ИД';
              $str_resepta = $itm->retReseptNameById($_POST['retResId']);

              if (!empty($str_resepta)) {
                // debug($str_resepta);
                $itm->dataRes($str_resepta);
              }
            }
            /*Выводит данные таблицы Items*/
            echo '<details><summary>Таблица: Resepts</summary>';
            $tbl->printResepts();
            echo '</details>';  
            /* если нажали кнопку "Добавить в базу" и заполнили название предмента*/
            if ((isset($_POST['addItem'])) and (!empty($_POST['ItemName']))) {
              // echo 'Кнопка нажата, вы ввели: ' . $_POST['ItemName'];
              $new_id = $item->AddItem($_POST['ItemName']);
              if (FALSE != $new_id) {
                echo '<br> Новый id : ' . $new_id;
              }
            }
            /*Если нажали кнопку добавить картинку по имени*/
            if ((isset($_POST['addPic'])) and (!empty($_POST['ItemName']) and (!empty($_POST['icons'])))) {
              echo 'insert icons';
              $itm->AddIcon($_POST['ItemName'], $_POST['icons']);
            }


            /* форма создания рецепта*/
            //var_dump($_POST);
            if (isset($_POST['addResept'])) {

              if (empty($_POST['resept'])) {
                echo 'Введите название рецепта';
                unset($_POST['addResept']);
              } else {
                echo '<br>cоздаем рецепт <strong>' . $_POST['resept'] . '</strong>';
                if (empty($_POST['item1'])) {
                  echo '<br>неоходимо внести хотябы 1 ингердиент';
                } else {
                  //echo '<br>из ингредентов: ' . $_POST['item1'] . ', ' . $_POST['item2']. ' ,' .$_POST['item3']. ' ,' . $_POST['item4'] . '.';
                  if (!empty($_POST['item1'])) { //если веден 1 ингредиент и 
                    echo '<br>заполнен 1 ингредиент <br>';
                    $res = $_POST['resept']; // название рецепта



                    /* 1. Провека, если такой РЕЦЕПТ в ITEMS*/

                    //найти индекс ПОПОНА(рецепта)
                    $itemId = R::findOne('items', 'name LIKE ?', ["%$res%"]);
                    //var_dump($itemId);
                    if (NULL == $itemId) {
                      echo '<BR>создаем рецепт/создаем итем/ у итем проставляем ИД рецепта';
                      $new_id_res = $itm->AddResept($res);
                      $new_id_item = $itm->AddItem($res);
                      $tbl->UpdateData('items', $new_id_item, 'res_id', $new_id_res);
                    }
                    if (isset($itemId['id'])) {
                      // echo 'проверить его РЕС_ИД';
                      $id_res = R::getCell('SELECT `res_id` FROM items WHERE `id` = ? LIMIT 1', [$itemId['id']]);
                      if (NULL == $id_res) {
                        echo '<br>создаем рецепт/у итема проставляем ИД рецепта 22';
                        $new_id_res = $itm->AddResept($res);
                        $tbl->UpdateData('items', $itemId['id'], 'res_id', $new_id_res);
                      }
                      if (isset($id_res)) {
                        echo '<br>рецет уже существует';
                        $new_id_res = $id_res;
                        $resName = R::getCell('SELECT `name` FROM resepts WHERE `id` = ? LIMIT 1', [$new_id_res]);
                        // var_dump($VBaze);
                        if (NULL != $resName) {
                          echo '<br><strong>' . $resName . '</strong> уже есть в базе';
                          goto vse;
                        }
                      }
                    }

                    /* 2. Провека, если такой ИТЕМ в ITEMS*/
                    $itm1 = $_POST['item1']; // название Итема1
                    //создаем итем
                    $id_new_itm1 = $itm->AddItem($itm1);
                    if (FALSE == $id_new_itm1) { //если такой ИД есть в базе пересохраняем ИД из базы
                      $id_new_itm1 = $itm->retItemIdByName($itm1);
                    }
                    echo '<br>  $id_new_itm1 ' . $id_new_itm1;
                    echo '<br> $new_id_res ' . $new_id_res;
                    echo '<br> count1 ' . $_POST['count1'];
                    if (empty($_POST['count1'])) {
                      echo '<br>! количество по умолчанию = 1';
                      $_POST['count1'] = 1;
                    }
                    //внесни данные ИТМ1 и кол-ва по итем1
                    $tbl->UpdateData('resepts', $new_id_res, 'val1', $id_new_itm1);
                    $tbl->UpdateData('resepts', $new_id_res, 'count1', $_POST['count1']);



                    if (!empty($_POST['item2'])) {
                      /* 2. Провека, если такой ИТЕМ2 в ITEMS*/
                      $itm1 = $_POST['item2']; // название Итема1
                      //создаем итем
                      $id_new_itm1 = $itm->AddItem($itm1);
                      if (FALSE == $id_new_itm1) {
                        $id_new_itm1 = $itm->retItemIdByName($itm1);
                      }
                      echo '<br>  $id_new_itm2 ' . $id_new_itm1;
                      echo '<br> $new_id_res ' . $new_id_res;
                      echo '<br> count2 ' . $_POST['count2'];
                      //если количество не заполнено, по умолчанию проставляется 1
                      if (empty($_POST['count2'])) {
                        echo '<br>! количество по умолчанию = 1';
                        $_POST['count2'] = 1;
                      }
                      //внесни данные ИТМ2 и кол-ва по итем2
                      $tbl->UpdateData('resepts', $new_id_res, 'val2', $id_new_itm1);
                      $tbl->UpdateData('resepts', $new_id_res, 'count2', $_POST['count2']);
                    }

                    if (!empty($_POST['item3'])) {
                      /* 2. Провека, если такой ИТЕМ3 в ITEMS*/
                      $itm1 = $_POST['item3']; // название Итема1
                      //создаем итем
                      $id_new_itm1 = $itm->AddItem($itm1);
                      if (FALSE == $id_new_itm1) {
                        $id_new_itm1 = $itm->retItemIdByName($itm1);
                      }
                      echo '<br>  $id_new_itm3 ' . $id_new_itm1;
                      echo '<br> $new_id_res ' . $new_id_res;
                      echo '<br> count3 ' . $_POST['count3'];
                      if (empty($_POST['count3'])) {
                        echo '<br>! количество по умолчанию = 1';
                        $_POST['count3'] = 1;
                      }
                      //внесни данные ИТМ3 и кол-ва по итем3
                      $tbl->UpdateData('resepts', $new_id_res, 'val3', $id_new_itm1);
                      $tbl->UpdateData('resepts', $new_id_res, 'count3', $_POST['count3']);
                    }

                    if (!empty($_POST['item4'])) {
                      /* 2. Провека, если такой ИТЕМ4 в ITEMS*/
                      $itm1 = $_POST['item4']; // название Итема1
                      //создаем итем
                      $id_new_itm1 = $itm->AddItem($itm1);
                      if (FALSE == $id_new_itm1) {
                        $id_new_itm1 = $itm->retItemIdByName($itm1);
                      }
                      echo '<br>  $id_new_itm4 ' . $id_new_itm1;
                      echo '<br> $new_id_res ' . $new_id_res;
                      echo '<br> count4 ' . $_POST['count4'];
                      if (empty($_POST['count4'])) {
                        echo '<br>! количество по умолчанию = 1';
                        $_POST['count2'] = 4;
                      }
                      //внесни данные ИТМ4 и кол-ва по итем4
                      $tbl->UpdateData('resepts', $new_id_res, 'val4', $id_new_itm1);
                      $tbl->UpdateData('resepts', $new_id_res, 'count4', $_POST['count4']);
                    }
                  }
                  vse:
                // echo ' и всетаки рецепт <h4>' . $resName . '</h4> существует';
                }
              }
            }

            /*проверка если поле рецепт и итем1 не пусто, выводить данные на экран*/
            if ((!empty($_POST['resept'])) and (!empty($_POST['item1']))){
            // var_dump($_POST['resept']);
                    $itm->printResept($_POST['resept']);
            }?>
         
    </form>
  </div>
</body>
</div>
</html>