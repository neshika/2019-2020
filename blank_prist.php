<?php
require "db.php";
//require "includes/functions.php";

$data = $_POST;
//debug($_POST);

?>

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <title>Cимулятор заводчика</title>
</head>

<body>
  <style>
    body {
      background-color: #FFCCFF;
    }

    /* общий фон */

    div {
      width: 600px;
      /* ширина */
      height: 800px;
      /* высота */
      padding: 30px 20px 30px 50px;
      /* внутренние отступы - верх, право, низ, лево */
      margin: 50px auto;
      /* выравнивание по центру */
      box-shadow: 10px 10px 20px black;
      /* небольшая тень для объемности */
      background-color: #F2F2F2;
      /* цвет фона в блоке */
      font-family: "Times New Roman";
      /* нужный шрифт */

    }

    img {
      width: 15%;
      /*background: white;*/

    }

    #zatemnenie {
      background: rgba(102, 102, 102, 0.5);
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      display: none;
    }

    #okno {
      width: 300px;
      height: 50px;
      text-align: center;
      padding: 15px;
      border: 3px solid #0000cc;
      border-radius: 10px;
      color: #0000cc;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      margin: auto;
      background: #fff;
    }

    #zatemnenie:target {
      display: block;
    }

    .close {
      display: inline-block;
      border: 1px solid #0000cc;
      color: #0000cc;
      padding: 0 12px;
      margin: 10px;
      text-decoration: none;
      background: #f2f2f2;
      font-size: 14pt;
      cursor: pointer;
    }

    .close:hover {
      background: #e6e6ff;
    }
  </style>
  <form action="/registry.php" method="POST">
    <div>
      <h1 align="center"> <img src="/pici/logo_mini.png" alt="logo">Витруальное кинологическое объединение<br>
        ЗАЯВКА НА РЕГИСТРАЦИЮ ЗАВОДСКОЙ ПРИСТАВКИ <br></h1>
      <p> <input type="radio" name="ken">Питомник
        <input type="radio" name="ken">Заводская приставка
      </p>
      <hr>

      <p> Имя заводчика*: <input type="text" name="login" value="<?php echo @$data['login']; ?>"><br>
        Электронный адрес*: <input type="email" name="email"><br>
        Пароль*:<input type="password" name="password" value="<?php echo @$data['password']; ?>">
        Еще раз пароль*:<input type="password" name="password2" value="<?php echo @$data['password2']; ?>">
      </p>
      <hr>

      <p> Название питомника/заводской приставки*: <input type="test" name="kennel" maxlength="20"><br><br>
        <!-- Префикс: <input type="radio" name="pref" value="Nosuf">   
            Суффикс:  <input type="radio" name="pref" value ="suf" onclick="document.getElementById('qw').style.display=(this.checked)?'block':'none';" >
                 <p id="qw" style="display:none;" >
                     <select  name="list">
                        <option value="1">с</option>
                        <option value="2">со</option>
                        <option value="3">из</option>
                        <option value="4">от</option>
                    </select>
           -->
      </p>
      <hr>
      </p>



      <input id="button" name="do_sighup" type="submit" value="Регистрация" class="knopka">
      <a class="buttons" href="/index.php">На главную</a>


  </form>
  <p></p>
  </div>

</body>

</html>