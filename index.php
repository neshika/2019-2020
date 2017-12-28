<?php

require "db.php";
require "includes/functions.php";
/** Проверяет залогинен ли польззователь Если да, дает выбр действий **/

	//var_dump($_POST);
	
	if ( isset($_SESSION['logged_user']) ){ 
		include_once "html/index_session.html";

 	echo "Привет, " . $_SESSION['logged_user']->login . '!  Чем займемся?';
	 	if ('admin'==$_SESSION['logged_user']->login)
	 		{?>
	 		<a class="buttons" href="admin/admin.php" >В админку</a>
	 		<?php }else{

	 		?>

	 			<a class="buttons" href="/office.php" >В офис</a>
				<a class="buttons" href="/logout.php" >Выйти</a>
	<?php }
	}else{ /** Если пользователь не залогинен создает рандомную собаку по данными поля. **/
		include_once "html/index_NOsession.html";?>

		<div class="image_wrap">
		<img src="/Pic/def.png" class="def_pic">
		<br>
		

  		<a class="buttons" href='/login.php'>Да</a>
		<a class="buttons" href='rand_dog.php '>НЕТ</a>

		<?php
		
/** Содаем рандомную собаку и выводим на экран **/	
         	$Hr=f_rand_col('HrHr','Hrhr','hrhr');
         	$W=f_rand_col('WW','Ww','ww');
         	$F=f_rand_col('FF','Ff','ff');
         	$B=f_rand_col('BB','Bb','bb');
         
         	$T=f_rand_col('TT','Tt','tt');
         	$M=f_rand_col('MM','Mm','mm');

             $all= "<br>".$Hr."<br>".$W."<br>".$F."<br>".$B."<br>".$T."<br>".$M;
             echo $all . '<br>';
        	$url=bdika_color ($Hr,$W,$F,$B,$T,$M);
        	
       }?>
       <img src = "<?php echo $url; ?>" width="50%">
	<!--<div id="my_text">Здесь мы изучаем блоки и CSS</div> -->
	<p class="text_effect">Ваша удача рядом</p>
	</div>