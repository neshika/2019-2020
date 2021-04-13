<?php
//подключение файлов
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');
     
?>
<style>
    .border{
        -webkit-box-shadow: 5px 5px 15px 5px #000000, 5px 5px 15px 5px #000000; 
        box-shadow: 5px 5px 15px 5px #000000, 5px 5px 15px 5px #000000;
    }
    .border2{
        padding: 5px;
        margin: 25px;
        -webkit-box-shadow: 5px 5px 15px 5px #727272; 
        box-shadow: 5px 5px 15px 5px #727272;
        border-radius: 15px;
        
    }
     .border_pic{
        padding: 10px;
        margin: 25px;
        width: 300px;
        height: 300px;
        -webkit-box-shadow: 5px 5px 15px 5px #727272; 
        box-shadow: 5px 5px 15px 5px #727272;
        border-radius: 15px;
    .border_text{
        padding: 5px;
        margin: 25px;
        width: 800px;
        height: 500px;
        
        -webkit-box-shadow: 5px 5px 15px 5px #727272; 
        box-shadow: 5px 5px 15px 5px #727272;
        border-radius: 15px;
        
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
    .stroka1{
        width: 800px;
    }
}


</style>    
<?php    
  if(!isset($_GET['id']) || !isset($_GET['owner'])){
     $id = $_SESSION['Dog'];
     $dog = new PrintDog();
     $owner = $dog->retOwner($id);
    // $owner = $_SESSION['owner'];
    }
    else{
        $id = $_GET['id'];
        $owner = $_GET['owner'];
    }
    
    
    
?>
<div class="border2">
<?php
   // echo $id . '<br>' . $owner;
    //$dog = new PrintDog();
    $new_dog = new GreateNewDog();
    $dna = new Dna();
    $dog = new PrintDog();
    $dna_id=$dog->retDnaId($id);
    
    
?>
   
<div class="table-responsive"><table>
	<tbody>
		<tr class="stroka1">
                    <td class="текст"><div class="border_text">
                   
                        Кличка: <strong> <?php echo $dog->retName($id) . " " . $dog->retKennel($id) . $dog->picSex($id);?></strong>
                                <hr>
                       <li>Заводчик: <?php echo $dog->retBreeder($id);?></li>    
                       <li>Хозяин: <?php echo $owner;?></li>
                       <li>Происхождение: <?php echo $dog->retOrignText($id);?></li>
                       <li>Оценка: <?php echo $dog->retMarkText($id) ?></li>
                        <hr>
                       <li>ID собаки: <?php echo $id;?></li>

                       <li>пол: <?php echo $dna->retSexText($dna_id);?></li>
                       <li>Возраст: <?php echo $dog->retAgeText($id);?></li>
                       <li>Вязок: <?php echo $dog->retLitter($id);?></li>
                       <li>Щенков: <?php echo $dog->retPuppy($id);?></li>
                       <li>Состояние:  <?php echo $dog->retEstrusText($id);?></li></div>
                     </td>
			<td class="пусто"></td>
			<td class="картинка"><div class="border_pic"> <?php $dog->picLink($id, 220);?>
                             
                            </div></td>
		</tr>
		<tr class="stroka2">
			<td class="пусто"></td>
			<td class="статус бары" colspan="2"><li>Генетический код: <?php echo $dna->retDna($dna_id);?></li>
                        <button type="button" class="btn btn-dark">Темный</button>
                             <a href="#" class="btn btn btn-dark" role="button" aria-pressed="true">Ссылка</a>
                             <table width="100%">
                                <tbody>
                                    <tr>
                                            <td>Энергия</td>
                                            <td width="75%"><div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $dog->retVitality($id) . '%';?>" aria-valuenow="75" aria-valuemin="0"                                                      aria-valuemax="100"><?php echo $dog->retVitality($id);?></div>
                                            </div></td>
                                            
                                    </tr>
                                    <tr>
                                            <td>Счастье</td>
                                            <td><div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $dog->retJoy($id) . '%';?>" aria-valuenow="75" aria-valuemin="0"                                                      aria-valuemax="100"><?php echo $dog->retJoy($id);?></div>
                                          </div></td>
                                          
                                    </tr>
                                     <tr>
                                            <td>Здоровье</td>
                                            <td><div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $dog->retHP($id) . '%';?>" aria-valuenow="75" aria-valuemin="0"                                                      aria-valuemax="100"><?php echo $dog->retHp($id);?></div>
                                          </div></td>
                                            
                                    </tr>
                                </tbody>
                        </table>   
                        </td>
		</tr>
	</tbody>
</table></div>

    
 