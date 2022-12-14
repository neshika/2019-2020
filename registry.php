<?php
require "db.php";
require "includes/functions.php";

?>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<link rel="stylesheet" href="/css/radio.css" type="text/css" />
<form action="rand_dog.php" method="POST">
  <button type="submit" class="knopka" name="rand">назад</button>
</form>
<form action="index.php" method="POST">
  <button type="submit" class="knopka" name="singup">Войти</button>
</form>


<?php
echo $_SESSION['url'];
?><br> <img src="<?php echo $_SESSION['url_pici'] ?>">
<?php

echo "<br>" . $_SESSION['url2'];
?><br> <img src="<?php echo $_SESSION['url2_pici'] ?>">
<?php

$data = $_POST;
//debug($data);

if (isset($data['do_sighup'])) {  //если кнопка нажата
  //регистрируем
  $errors = array();    //массив ошибки в него помещает название ошибок
  if ('' == trim($data['login'])) { //TRIM убирает все пробелы Если логин пустой
    $errors[] = 'поле логина не заполнено';
  }
  if ('' == trim($data['kennel'])) {  //TRIM убирает все пробелы Если питомник пустой
    $errors[] = 'название питомника не заполнено';
  }
  if ('' == ($data['password'])) {  // Если Пароль пустой   ПАРОЛЬ НЕ ТРИМАЕМ
    $errors[] = 'поле  password не заполнено';
  }
  if ($data['password2'] != $data['password']) { // Проверка на второй пароль.
    $errors[] = 'пароли не совпадают';
  }
  if ('' == trim($data['email'])) { //TRIM убирает все пробелы Если почта пустая
    $errors[] = 'не введена почта';
  }
  //проверка есть ли такой же пользователь

  if (R::count('users', "login = ?", array($data['login'])) > 0) {
    $errors[] = 'такой логин уже есть';
  }
  if (R::count('users', "email = ?", array($data['email'])) > 0) {
    $errors[] = 'уже есть такая почта';
  }
  if (R::count('users', "kennel = ?", array($data['kennel'])) > 0) {
    $errors[] = 'такой питомник уже есть';
  }
  if (empty($errors)) {
    //сохраняем данные  о пользователе.
   //var_dump($_SESSION['logged_user']['login']);
   //var_dump($data['login']);
    $_SESSION['logged_user']['login'] = $data['login'];
    //var_dump($_SESSION['logged_user']);

    var_dump($_SESSION['logged_user']['login']);
    //все хорошо, регистрируем 
    /*  создаем базу через REdBeen*/
    echo "<br>создаем пользователя";
    $user = R::dispense('users');
    $user->login = $data['login'];
    $user->email = $data['email'];
    $user->kennel = $data['kennel'];
    $user->f_time = date('d.m.Y');
    $user->l_time = date('d.m.Y');
    $user->online = 1;
    $user->sign = 1;
    $user->visits = 1;
    $user->password = password_hash($data['password'], PASSWORD_DEFAULT); //зашифровываем пароль
    $owner_id = R::store($user);

    echo "<br>создаем питомник";
    $ken = R::dispense('kennels');
    $ken->name_k = $data['kennel'];
    $ken->owner_k = $data['login'];
    $ken->date = date('d.m.Y');
    $ken->email = $data['email'];
    $ken->dogs = '2';
    R::store($ken);
    echo "<br>открываем счет в банке";
    $items = R::dispense('owneritems');
    $items->owner_id = $owner_id;
    $items->item_id = 1;
    $items->count = 0;
    R::store($items);

    echo "<br>вносим генетический код"; //randodna
    //создаем первую собаку        
    $arr[] = ret_Row(1, 'randodna');
    //debug($arr);

    $dog = R::dispense('randodna');
    $dog->sex = $arr[0]['sex'];
    $dog->lucky = $arr[0]['lucky'];
    $dog->spd = $arr[0]['spd'];
    $dog->agl = $arr[0]['agl'];
    $dog->tch = $arr[0]['tch'];
    $dog->jmp = $arr[0]['jmp'];
    $dog->nuh = $arr[0]['nuh'];
    $dog->fnd = $arr[0]['fnd'];
    $dog->mut = $arr[0]['mut'];
    $dog->dna = $arr[0]['dna'];
    $dog->about = $arr[0]['about'];
    $dog->url = $arr[0]['url'];
    $dog->url_puppy = $arr[0]['url_puppy'];
    echo $dna_id_dog1 = R::store($dog);

    //создаем вторую собаку
    $arr2[] = ret_Row(2, 'randodna');
    //debug($arr);
    $dog2 = R::dispense('randodna');
  
    $dog2->sex = $arr2[0]['sex'];
    $dog2->lucky = $arr2[0]['lucky'];
    $dog2->spd = $arr2[0]['spd'];
    $dog2->agl = $arr2[0]['agl'];
    $dog2->tch = $arr2[0]['tch'];
    $dog2->jmp = $arr2[0]['jmp'];
    $dog2->nuh = $arr2[0]['nuh'];
    $dog2->fnd = $arr2[0]['fnd'];
    $dog2->mut = $arr2[0]['mut'];
    $dog2->dna = $arr2[0]['dna'];
    $dog2->about = $arr2[0]['about'];
    $dog2->url = $arr2[0]['url'];
    $dog2->url_puppy = $arr2[0]['url_puppy'];
    echo $dna_id_dog2 = R::store($dog2);


    echo "<br>создаем предков собаки №1:";

    $dog11 = R::dispense('family');
    $dog11->mum = 0;
    $dog11->dad =0;
    $family_id = R::store($dog11);
    echo"<br> создали первую семью с ИД" . $family_id;


    echo "<br>создаем предков собаки №2:";

    $dog22 = R::dispense('family');
      $dog22->mum = 0;
      $dog22->dad =0;
    $family_id2 = R::store($dog22);
    echo"<br> создали первую семью с ИД" . $family_id2;
    
    
    echo "<br>создаем собак:";
    //расчет формулы возраста в зависимости от даты создания
    $age = 10;
    $date = new DateTime();
    $date->modify('-3 month');
    $date->format('d.m.Y');
    //конец расчета

    $dogs = R::dispense('animals');
    $dogs->name = 'Без имени';
    $dogs->race = 'КХС';
    $dogs->origin = '1';
    $dogs->breeder = 'Бесты-первый лучший';
    $dogs->owner = $data['login'];
    $dogs->kennel = $data['kennel'];
    $dogs->age_id = $age;
    $dogs->dna_id = $dna_id_dog1;
    $dogs->family_id = $family_id;
    $dogs->mark_id = 1; //отлично оценка
    $dogs->birth = $date->format('d.m.Y');
    // параметры, зависящие от пола
    $dogs->estrus = 14; //установка у суки течки
    $height = Rand(23, 30);
    $dogs->height = $height;
    $weight = Rand(3000, 4500);
    $dogs->weight = $weight;
  // сохраняем первую собаку(сука)
    $id_new_dog1 = R::store($dogs);


    echo "<br>Создана 1 собака" . $id_new_dog1;

    $dog2 = R::dispense('animals');
    $dog2->name = 'Без имени';
    $dog2->race = 'КХС';
    $dogs->origin = '1';
    $dog2->breeder = 'Бесты-первый лучший';
    $dog2->owner = $data['login'];
    $dog2->kennel = $data['kennel'];
    $dog2->age_id = $age;
    $dog2->dna_id = $dna_id_dog2;
    $dog2->family_id = $family_id2;
    $dog2->mark_id = 1; //отлично оценка
    $dog2->birth = $date->format('d.m.Y');
    // параметры, зависящие от пола
    $dog2->estrus = 0; //течки у кобеля не бывает
    $height = Rand(28, 33);
    $dog2->height = $height;
    $weight = Rand(4500, 5000);
    $dog2->weight = $weight;
    // сохраняем вторую собаку(кобель)
    $id_new_dog2 = R::store($dog2);
   

    echo "<br>Создана 2 собака" . $id_new_dog2;

    echo '<br><br>создаю счет в банке';
    $cost = R::dispense('owneritem');
    $cost->owner_id = $owner_id;
    $cost->item_id = 1;
    $cost->count = 0;
    R::store($cost);

    echo '<div style="color:green;">Добро пожаловать, все успешно!</div>';
   
  } else {

    //echo '<div id="okno">' . array_shift($errors) . '<a href="#" class="close">Закрыть окно</a></div>';
    echo array_shift($errors);
  }
}

if (isset($_POST['newName1'])) {
  if ("" != $_POST['name1']) {
    insert_data('animals', $id, 'name', $_POST['name1']);
  }
}
if (isset($_POST['newName2'])) {
  if ("" != $_POST['name2']) {
    insert_data('animals', $id, 'name', $_POST['name2']);
  }
}
