<?php
require "db.php";

$data = $_POST;
//var_dump($data);

if( isset($data['do_login']) ){
	$errors= array();
	$user = R::findOne ('users','login = ?', array($data['login']));

	if ($user){  //если Юзер найден
		//если логин существует, то проверяем пароль
		if ( password_verify($data['password'], $user->password)){

			//true
			//логиним пользователя
			$_SESSION['logged_user'] = $user;
			/*Добро пожаловать, все успешно!*/
				
			//внесение даты посещения в таблицу USERS
         R::exec( 'UPDATE users SET l_time=:value WHERE login = :id ', array(':value'=> date("Y-m-d"), ':id' => $_SESSION['logged_user']->login));
         R::exec( 'UPDATE users SET online=:value WHERE login = :id ', array(':value'=> '1', ':id' => $_SESSION['logged_user']->login));

    		//Проверка, если авторизовался админ переход в админку.
        			if('admin'==$_POST['login']){
        				header ('Location: admin/admin.php');
						exit;
					}
			//Для пользователя переход в офис учетки
                                       header ('Location:/office.php');
				exit;

		}else{
			$errors [] = 'пароль введен не верно' ;
		}

	}else{
		$errors [] = 'Пользователь не найден ' ;

	}	




	if (!empty($errors)){
		echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
	}

}
if( isset($data['lo_zoher']) ){
    require_once(__DIR__ . '/includes/func.php');
   // echo "Введите новый пароль.";
    $errors = array();
    if(''==trim($data['login'])){	//TRIM убирает все пробелы Если логин пустой
	$errors [] = 'поле логина не заполнено';
    }
    if(''==($data['password'])){	// Если Пароль пустой   ПАРОЛЬ НЕ ТРИМАЕМ
	$errors [] = 'поле  password не заполнено';
    }
    if (empty($errors)){
		//все хорошо, регистрируем 
		/*  создаем базу через REdBeen*/
		echo "меняем пароль";
                $owner_id = new Users();
                $id = $owner_id->retId($data ['login']);
                $user = R::load('users', $id);
		$user->password = password_hash($data ['password'], PASSWORD_DEFAULT); //зашифровываем пароль
		R::store ($user);
		echo '<div style="color:green;">Пароль успешно изменен</div><hr>';
    } else{
		echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
}

require_once(__DIR__ . '/html/login.html');
