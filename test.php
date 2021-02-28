
<?php
require "db.php";
        //подключение файлов
require_once(__DIR__ . '/libs/up.php');
        
?>
    
     <script>
        
        
function change(idName) {
  if(document.getElementById(idName).style.display==='none') {
    document.getElementById(idName).style.display = '';
  } else {
    document.getElementById(idName).style.display = 'none';
  }
  return false;
}
</script>
 <style>
      #zatemnenie {
        background: rgba(102, 102, 102, 0.5);
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        display: none;
      }
       #zatemnenie2 {
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
        border: 3px solid #66029A;
        border-radius: 10px;
        color: #ff0000;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        margin: auto;
        background: #E0E0E0;
      }
      #zatemnenie:target {display: block;}
      #zatemnenie2:target {display: block;}
      .close {
        display: inline-block;
        border: 2px solid #66029A;
        color: #a675b3;
        padding: 0 12px;
        margin: 10px;
        text-decoration: none;
        background: linear-gradient(#3b2751, #271739);
        font-size: 14pt;
        cursor:pointer;
      }
      
    .close:not(.active) {
        box-shadow: inset 0 1px 1px rgba(111, 55, 125, 0.8), inset 0 -1px 0px rgba(63, 59, 113, 0.2), 0 9px 16px 0 rgba(0, 0, 0, 0.3), 0 4px 3px 0 rgba(0, 0, 0, 0.3), 0 0 0 1px #150a1e;
        background-image: linear-gradient(#3b2751, #271739);
        text-shadow: 0 0 21px rgba(223, 206, 228, 0.5), 0 -1px 0 #311d47;
        outline: none;
    }
      .close:not(.active):hover,
        .close:not(.active):focus {
            transition: color 200ms linear, text-shadow 500ms linear;
            color: #fff;
            text-shadow: 0 0 21px rgba(223, 206, 228, 0.5), 0 0 10px rgba(223, 206, 228, 0.4), 0 0 2px #2a153c;
            outline: none;
        }
    .close:not(:hover) {
         transition: 0.6s;
        outline: none;
   }

      .close:hover {
          background: #3b2751;
          transition: 0.6s;
      }
    </style>
<div class="content">
    <div id="zatemnenie">
      <div id="okno">
        Вязка была неудачная, собакам нужно отдохнуть<br>
        <a href="/office.php" class="close">закрыть</a>
      </div>
    </div>
 <div id="zatemnenie2">
      <div id="okno"><font color="green" >
          Родилось каунт щенков</font><br>
        <a href="#" class="close">закрыть</a>
      </div>
    </div>
 <!--<div style="display:none" id="test">Hi World! </div>
<a href="#" onclick="change('test')">Change</a>

-->

<?php


echo "Тестируем: <br>";

 function test_ok(){
     $testok=Rand(1,100);
     $testok=13;
     if('13'!=$testok){
        
        ?><a href="#zatemnenie2"><?php echo 'newdog '  . $testok; ?></a><?php
     }
     else{
         ?><a href="#zatemnenie"><?php echo 'kennel '  . $testok; ?></a><?php 
     }
 }

 require '/libs/down.php';
 ?>



