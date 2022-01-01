<?php
//require_once(__DIR__ . '/libs/up.php');
//подключение библиотеки redBeanphp
require $_SERVER['DOCUMENT_ROOT'] . "/db.php";
//подключение шапки
require_once(__DIR__ . '/html/header.html');
require_once(__DIR__ . '/includes/func.php');
/* http://dog.ru/name.php?id=1&owner=nesh */
//включение ошибок//включение отчета по ошибкам
ini_set('display_errors', 1);
error_reporting(E_ALL);



if (!isset($_GET['id']) || !isset($_GET['owner'])) {
    $id = $_SESSION['Dog'];
    $dog = new PrintDog();
    $owner = $dog->retOwner($id);
} else {
    $id = $_GET['id'];
    $owner = $_GET['owner'];
}

$new_dog = new GreateNewDog();
$dna = new Dna();
$dog = new PrintDog();
$dna_id = $dog->retDnaId($id);
$rand_dog = new RandDog;

/*Если кнопка "сменить имя" нажата*/
if (isset($_POST['newName'])) {

    if ("" != $_POST['name1']) {
        $newName = new Tabl();
        $newName->UpdateData('animals', $id, 'name', $_POST['name1']);
    } else {  // всплывающее окно, если имя не ввели
?> <script>
            alert("Введите имя");
        </script><?php
                }
            }
            /*Если нажата кнопка продать
if( isset($_POST['cell'])){
   ?> 
    <SCRIPT LANGUAGE="javascript">
        if (confirm("Хотите продать собаку?")) {
            var peremka = 'продана';
           alert("Собака продана");
        }
        else {
            var peremka = 'отмена';
           alert("Оставляем собаку");
            
           
            }
               
    </SCRIPT>
    <?php
    
    if (isset($_GET['u_name']))
    {
        echo '<script type="text/javascript">';
        echo 'document.location.href="' . $_SERVER['REQUEST_URI'] . '&u_name=" + peremka';
        echo '</script>';
       
        if('продана' == $_GET['u_name']){
            $newName = new Tabl();
            $newName->UpdateData('animals', $_GET['id'], 'owner', 'shop');?>
            <script type="text/javascript">
                function goToOtherPage() {
                    window.location.href = "http://www.yandex.ru/";
                }

                window.setTimeout(goToOtherPage, 1);
            </script>
        <?php }
        exit;
               
    }
    else {
        echo '<script type="text/javascript">';
        echo 'document.location.href="' . $_SERVER['REQUEST_URI'] . '&u_name=" + peremka';
        echo '</script>';
        exit();
    }
   
    
}
*/
            /*Если нажата кнопка "Растить"*/

            if (!empty($_POST['add_age'])) {
                $age = new Dog();
                $age->addAge($id);
            }
            /*если нажата кнопка кушать*/

            if (isset($_POST['eat'])) {
            }
            /* Проверка внесения данных*/
            function bdika($cell, $count)
            {

                if ($cell >= 0 && $cell <= 100) {
                    $cell = $cell + $count;
                    if ($cell > 100) {
                        $cell = 100;
                    }
                    if ($cell < 0) {
                        $cell = 0;
                    }
                    return $cell;
                }
            }
            /*если нажата кнопка добавки - добавляет 13 энергии*/
            if (isset($_POST['badd'])) {
                $cell = $dog->retVitality($id);
                $vit = bdika($cell, 13);
                $dog->UpdateData('animals', $id, 'Vitality', $vit);
            }
            /*если нажата кнопка спа салон - добавляет 21 счастья*/
            if (isset($_POST['spa'])) {
                $cell = $dog->retJoy($id);
                $joy = bdika($cell, 21);
                $dog->UpdateData('animals', $id, 'joy', $joy);
            }

            /*если нажата кнопка ветврач - добавляет 5 здоровья*/
            if (isset($_POST['vet'])) {
                $cell = $dog->retHp($id);
                $hp = bdika($cell, 5);
                $dog->UpdateData('animals', $id, 'Hp', $hp);
            }
            /*если нажата кнопка тренировки - добавляет -10 энергии + 10 здоровья*/
            if (isset($_POST['train'])) {
                $vit = $dog->retVitality($id);
                if ($vit >= 0 && $vit <= 100) {
                    $vit = $vit - 10;
                    if ($vit > 100) {
                        $vit = 100;
                    }
                    if ($vit < 0) {
                        $vit = 0;
                    }
                }
                $hp = $dog->retHp($id);
                $hp = bdika($hp, 10);
                $dog->UpdateData('animals', $id, 'Vitality', $vit);
                $dog->UpdateData('animals', $id, 'Hp', $hp);
            }



                    ?>
<div class="dogcontent">
    <table>
        <tr>
            <td>
                <div class="dannie">
                    <div class="dannie-knopki">
                        <form method="POST">
                            <button type="submit" class="btn btn-dark" name="eat">Есть <i class="fa fa-cutlery" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-dark">Пить <i class="fa fa-tint" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-dark">Чесать <i class="fa fa-bath" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-dark">Гулять <i class="fa fa-umbrella" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-dark">Спать <i class="fa fa-bed" aria-hidden="true"></i></button>
                            <input type="submit" class="btn btn-dark" name="add_age" value="Растить">

                        </form>
                    </div>
                    <div class="dannie-text">
                        <br>Кличка <?php echo $dog->picSex($id); ?><strong>
                            <h1><?php echo $dog->retName($id) . " " . "\"" . $dog->retKennel($id) . "\""; ?></h1>
                        </strong>
                        <hr>
                        <li> Заводчик: <?php echo $dog->retBreeder($id); ?></li>
                        <li> Хозяин: <?php echo $owner; ?></li>
                        <li> Происхождение: <?php echo $dog->retOrignText($id); ?></li>
                        <li> Оценка: <?php echo $dog->retMarkText($id) ?></li>
                        <li> Примерная стоимость собаки: <?php echo $rand_dog->dogPrice($dog->retDnaId($id)); ?></li>
                        <li> <a href="/text/char.php">?</a> Характер собаки: <?php echo $dog->printChar($id); ?> </li>
                        <hr>
                        <li> ID собаки: <?php echo $id; ?></li>

                        <li> Пол: <?php echo $dna->retSexText($dna_id); ?></li>
                        <li> Возраст: <?php echo $dog->retAgeText($id); ?></li>
                        <li> Помет: <?php echo $dog->retRegText($id) ?></li>
                        <li> Вязок: <?php echo $dog->retLitter($id); ?></li>
                        <li> Щенков: <?php echo $dog->retPuppy($id); ?></li>
                        <li> Состояние: <?php echo $dog->retEstrusStatus($id); ?></li>
                        <li> Голая/пуховая: <?php echo $dna->retGolPooh($dna_id) ?></li>
                        <li> Шокоген: <?php echo $dna->retShocoGen($dna_id) ?></li>
                        <details>
                            <summary>статы</summary>
                            <?php $dog->printStats($id); ?>
                        </details>

                    </div>
                </div>
            </td>
            <td>
                <div class="kartinka">
                    <div class="kartinka-img"><?php /*if (isset ($_GET['u_name'])) {echo $_GET['u_name'];}*/ $dog->picLink($id); ?></div>

                </div>
            </td>
        </tr>
        <tr>
            <td>

                <div class="sobitia">
                    <form method=POST>
                        <a href="<?php echo '/family_tree.php?id=' . $id; ?>" class="btn btn btn-dark" role="button" aria-pressed="true">родословная</a><br>
                        <a href="<?php echo '/lit&pup.php?id=' . $id; ?>" class="btn btn btn-dark" role="button" aria-pressed="true">щенки/пометы</a><br>
                        <?php if ('Без имени' == $dog->retName($id)) : ?>
                            <input class="form-controll form-control-small" placeholder="Введите новое имя" type="text" name="name1">
                            <input class="btn btn-dark" name="newName" type="submit" value="Внести">
                        <?php endif; ?>
                    </form>
                    <form method="POST" action="/matting.php">
                        <?php $_SESSION['Dog'] = $id; ?>
                        <input class="btn btn-dark" name="matting" type="submit" value="Вязка">
                    </form>
                    <form method="POST" action="/office.php">
                        <input class="btn btn-dark" name="shelter" type="submit" value="в приют">
                        <?php $_SESSION['Dog'] = $id; ?>
                    </form>
                    <form method="POST">
                        <input type="submit" class="btn btn-dark" name="cell" value="продать" disabled="disabled">
                    </form>
                </div>
            </td>
            <td>
               <!-- <div class="status">
                    <div class="progress5-bar5">
                        <span class="bar5">
                            <span class="progress5"></span>
                        </span>
                    </div>-->
                    <div class="arba">
                        <form method="POST">
                            <button type="submit" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Добавки +Энергия" name="badd">
                                <i class="fa fa-leaf fa-2x" aria-hidden="true"></i><i class="fa fa-bolt" aria-hidden="true"></i>+</button>
                            <button type="submit" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Спа уход +Счастье" name="spa">
                                <i class="fa fa-umbrella fa-2x" aria-hidden="true"></i> <i class="fa fa-certificate" aria-hidden="true"></i>+</button>
                            <button type="submit" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Ветеринар +Здоровье" name="vet">
                                <i class="fa fa-medkit fa-2x" aria-hidden="true"></i> <i class="fa fa-heart" aria-hidden="true"></i>+</button>
                            <button type="submit" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Тренировка -Энергия+Счастье" name="train">
                                <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i> <i class="fa fa-bolt" aria-hidden="true"></i>-<i class="fa fa-certificate" aria-hidden="true"></i>+</button>
                        </form>
                    </div>

                </div>
                <div class="status-gk">
                    <li>Генетический код: <?php echo $dna->retDna($dna_id); ?></li>
                    <li>ссылка на URL взрослый: <?php echo $dna->retUrl($dna_id); ?></li>
                    <li>ссылка на URL щенок: <?php echo $dna->retUrlPuppy($dna_id); ?></li>
                </div>
                <div class="status-bar">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td><i class="fa fa-tachometer" aria-hidden="true"></i> Энергия</td>
                                <td width="66%">
                                    <div class="progress11">
                                        <div class="progress-bar11 bg-success" role="progressbar" style="width: <?php echo $dog->retVitality($id) . '%'; ?>" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $dog->retVitality($id); ?></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-sun-o" aria-hidden="true"></i> Счастье</td>
                                <td>
                                    <div class="progress11">
                                        <div class="progress-bar11 bg-warning" role="progressbar" style="width: <?php echo $dog->retJoy($id) . '%'; ?>" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $dog->retJoy($id); ?></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-heartbeat" aria-hidden="true"></i> Здоровье</td>
                                <td>
                                    <div class="progress11">
                                        <div class="progress-bar11 bg-danger" role="progressbar" style="width: <?php echo $dog->retHP($id) . '%'; ?>" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $dog->retHp($id); ?></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
</div>
</td>
</tr>
</table>
</div>

<div class="footer2">© Симулятор Заводчика</div>

<script src="https://use.fontawesome.com/e1a1261a75.js"></script>
<script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
<script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
</body>

</html>