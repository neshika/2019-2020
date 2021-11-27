<?php
require $_SERVER['DOCUMENT_ROOT']."/libs/up.php";?>

<style>
  .border2 {
    padding: 5px;
        margin: 25px;
        width: 800px;
        -webkit-box-shadow: 5px 5px 15px 5px #727272; 
        box-shadow: 5px 5px 15px 5px #727272;
        border-radius: 15px;
  }
  .dannie {
    padding: 3px;
    width: 400px;
    height: auto;
  }
  .kartinka {
    padding: 5px;
    width: 400px;
    height: 400px;
  }
  .sobitia {
    padding: 1px;
  }
  .status {
    padding: 1px;
  }
     
    table{
        width: 100%;
        border-collapse:collapse;
        border-spacing:0
            
    }
    table, td, th{
        border: 1px solid #595959;

    }
    td, th{
        padding: 3px;
        width: 30px;
        height: 25px;
    }
    th{
        background-color: #7accee!important;
    }
</style>
<div class="border2">
<table>
    <tr>
        <td><div class="dannie">данные</div></td>
        <td><div class="kartinka"> картинка </div></td>
    </tr>
    <tr>
        <td><div class="sobitia"> ссылки</div></td>
        <td><div class="status">статус бар</div></td>
    </tr>
  </table> 
</div>