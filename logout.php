<?php
//logout.php
	require "db.php";
	
	$tabl = 'users';
	$cell = 'online';
	$value = 0;
	$log  = $_SESSION['logged_user']['login'];
	R::exec('UPDATE ' .  $tabl . ' SET ' . $cell . '=:aa WHERE login = :log ', [
		':aa' => $value,
		':log' => $log
	]);
	unset($_SESSION['logged_user']);
         session_unset();
	header ('Location: / ');
?>

