<?php
//require_once(__DIR__ . '/libs/up.php');
//подключение библиотеки redBeanphp
require $_SERVER['DOCUMENT_ROOT']."/db.php";
//подключение шапки
require_once(__DIR__ . '/html/header.html');
require_once(__DIR__ . '/includes/func.php');
//включение ошибок//включение отчета по ошибкам
ini_set('display_errors',1);
error_reporting(E_ALL);
 
if(!isset($_GET['id']) || !isset($_GET['owner'])){
    $id = $_SESSION['Dog'];
    $dog = new PrintDog();
    $owner = $dog->retOwner($id);
}
else{
    $id = $_GET['id'];
    $owner = $_GET['owner'];
}
/*Если кнопка "сменить имя" нажата*/
if ( isset($_POST['newName']) ){ 
    
    if("" != $_POST['name1']){
        $newName = new Tabl();
        $newName->UpdateData('animals', $id, 'name', $_POST['name1']);
    }
    else {  // всплывающее окно, если имя не ввели
        ?> <script>alert ("Введите имя");</script><?php
    }
}
/*Если нажата кнопка "Растить"*/

if ( !empty($_POST['add_age']) ){
    $age = new Dog();
    $age->addAge($id);
    
}
/*если нажата кнопка кушать*/

if (isset($_POST['eat'])){
    
}
$new_dog = new GreateNewDog();
$dna = new Dna();
$dog = new PrintDog();
$dna_id=$dog->retDnaId($id);
$rand_dog = new RandDog;
    
  
?>
<div class="dogcontent">
    <table>
        <tr>
            <td><div class="dannie">
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
                    <br>Кличка <?php echo $dog->picSex($id);?><strong><h1><?php echo $dog->retName($id) . " " . "\"" . $dog->retKennel($id) . "\"";?></h1></strong>
                    <hr>
                    <li> Заводчик: <?php echo $dog->retBreeder($id);?></li>    
                    <li> Хозяин: <?php echo $owner;?></li>
                    <li> Происхождение: <?php echo $dog->retOrignText($id);?></li>
                    <li> Оценка: <?php echo $dog->retMarkText($id) ?></li>
                    <li> Примерная стоимость собаки: <?php echo $rand_dog->dogPrice($dog->retDnaId($id)); ?></li>
                    <hr>
                    <li> ID собаки: <?php echo $id;?></li>

                    <li> Пол: <?php echo $dna->retSexText($dna_id);?></li>
                    <li> Возраст: <?php echo $dog->retAgeText($id);?></li>
                    <li> Помет: <?php echo $dog->retRegText($id)?></li>
                    <li> Вязок: <?php echo $dog->retLitter($id);?></li>
                    <li> Щенков: <?php echo $dog->retPuppy($id);?></li>
                    <li> Состояние:  <?php echo $dog->retEstrusStatus($id);?></li>
                    <li> Голая/пуховая:  <?php echo $dna->retGolPooh($dna_id)?></li>
                    <li> Шокоген:  <?php echo $dna->retShocoGen($dna_id)?></li>
                    <details>
                    <summary>статы</summary>
                    <?php $dog->printStats($id);?> 
                    </details>
                    
                </div>
            </div></td>
            <td><div class="kartinka">
                <div class="kartinka-img"><?php $dog->picLink($id, '75%');?></div>
                </div>
                <div class="arba">
                <button type="button" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Добавки +Энергия">
                        <i class="fa fa-leaf fa-2x" aria-hidden="true"></i><i class="fa fa-bolt" aria-hidden="true"></i>+</button>
                        <button type="button" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Спа уход +Счастье" >
                        <i class="fa fa-umbrella fa-2x" aria-hidden="true"></i> <i class="fa fa-certificate" aria-hidden="true"></i>+</button>
                        <button type="button" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Ветеринар +Здоровье">
                        <i class="fa fa-medkit fa-2x" aria-hidden="true"></i> <i class="fa fa-heart" aria-hidden="true"></i>+</button>
                        <button type="button" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Тренировка -Энергия+Счастье">
                        <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i> <i class="fa fa-bolt" aria-hidden="true"></i>-<i class="fa fa-certificate" aria-hidden="true"></i>+</button></div>
                
            </div></td>
        </tr>
        <tr>
            <td><div class="sobitia">
            <form method = POST>
                        <a href="<?php echo '/family_tree.php?id=' . $id;?>" class="btn btn btn-dark" role="button" aria-pressed="true">родословная</a><br>
                        <a href="<?php echo '/lit&pup.php?id=' . $id;?>" class="btn btn btn-dark" role="button" aria-pressed="true">щенки/пометы</a><br>
                        <?php if ('Без имени' == $dog->retName($id)):?>
                            <input class ="form-controll form-control-small" placeholder="Введите новое имя" type="text" name="name1">
                            <input class="btn btn-dark" name="newName" type="submit" value="Внести">
                    <?php endif;?>
                    </form>
                    <form method="POST" action = "/matting.php">
                        <?php $_SESSION['Dog']=$id;?>
                        <input class="btn btn-dark" name="matting" type="submit" value="Вязка">
                    </form>
                    <form method="POST" action = "/office.php">
                        <input class="btn btn-dark" name="shelter" type="submit" value="в приют">
                        <?php $_SESSION['Dog'] = $id; ?>
                    </form>
            </div></td>
            <td><div class="status">
                <div class="status-gk">
                    <li>Генетический код: <?php echo $dna->retDna($dna_id);?></li>
                    <li>ссылка на URL взрослый: <?php echo $dna->retUrl($dna_id);?></li> 
                    <li>ссылка на URL щенок: <?php echo $dna->retUrlPuppy($dna_id);?></li> 
                 </div>
                <div class="status-bar">
                <table width="100%">
                <tbody>
                    <tr>
                        <td><i class="fa fa-tachometer" aria-hidden="true"></i> Энергия</td>
                        <td width="66%"><div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $dog->retVitality($id) . '%';?>" aria-valuenow="75" aria-valuemin="0"                                                      aria-valuemax="100"><?php echo $dog->retVitality($id);?></div>
                        </div></td></tr>
                    <tr>
                        <td><i class="fa fa-sun-o" aria-hidden="true"></i> Счастье</td>
                         <td><div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $dog->retJoy($id) . '%';?>" aria-valuenow="75" aria-valuemin="0"                                                      aria-valuemax="100"><?php echo $dog->retJoy($id);?></div>
                         </div></td></tr>                         
                    <tr>
                        <td><i class="fa fa-heartbeat" aria-hidden="true"></i> Здоровье</td>
                        <td><div class="progress">
                             <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $dog->retHP($id) . '%';?>" aria-valuenow="75" aria-valuemin="0"                                                      aria-valuemax="100"><?php echo $dog->retHp($id);?></div>
                        </div></td></tr>
                </tbody>
                </table>   
                </div>
            </div></td>
        </tr>
    </table>
</div>

<div class="footer2">© Симулятор Заводчика</div>

<script src="https://use.fontawesome.com/e1a1261a75.js"></script>
<script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
<script src="{% static 'app/scripts/modernizr-2.6.2.js' %}"></script>
</body>
</html>
