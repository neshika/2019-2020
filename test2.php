<?php
//подключение файлов
require_once(__DIR__ . '/libs/up.php');
ini_set('display_errors',1);
error_reporting(E_ALL);
echo "Создаем рандомную собаку по-другому: <br>";

Class RandDog{
       
    public function startDna($dna='hr0w0f0b0t0m0'){
        for($i=1;$i<=strlen($dna);$i++){

                if(!($i%2)){  //ечли четные равны 0 (!1)
                    $dna[$i]=Rand(0,1);
                }
            }
           // echo $dna;
            return $dna;

        }

    public function doUrl($data_dna){
        $num=Rand(1,5);  //количество варианций окраса собаки
        if(1 == $data_dna[2]){  //если собака голая
            if(1==$data_dna[10] && 1==$data_dna[12]){ //если и крап и пятна
              $data_dna[4]=0; //ww=0    собака не модет быть белой
              $data_dna[6]=0; //ff=0    собака не модет быть рыжей
             $url="pici/TM/" . $data_dna . '_0' . $num . '.png';
            }
            else if(1==$data_dna[12]){  //если крап
             $data_dna[4]=0; //ww=0    собака не модет быть белой
              $url="pici/MM/" . $data_dna . '_0' . $num . '.png';
            }
            else if(1==$data_dna[10]){  //если пятна
              $data_dna[4]=0; //ww=0    собака не модет быть белой
              $data_dna[6]=0; //ff=0    собака не модет быть рыжей
              $url="pici/TT/" . $data_dna . '_0' . $num . '.png';
            }
            else{   //если чистая собака
                $url="pici/" . $data_dna . '_0' . $num . '.png';
            }
          }
          if(0 == $data_dna[2]){  //если собака пуховая
              $data_dna[10]=0; //tt=0    собака нет крапа
              $num2=Rand(1,3);  //количество варианций окраса собаки
              if(1==$data_dna[4]){   //если собака бела пух, то нет пятен и крапа    
                 $data_dna[6]=0; //ff=0    собака не модет быть рыжей
                 $data_dna[12]=0; //mm=0    собака нет пятен
                  $url="pici/hrhr/" . $data_dna . '_0' . $num2 . '.png';
              }
              else if(1==$data_dna[6]){   //если соабка рыжая
                  $data_dna[4]=0;   //всегда не белая
                  $data_dna[8]=0;   //всегда шоко
                  $url="pici/hrhr/" . $data_dna . '_0' . $num2 . '.png';
              }   
              else{ $url="pici/hrhr/" . $data_dna . '_0' . $num2 . '.png';}
          }


        //echo "<br> $url";  
        return $url;  //получаем $URL
    }
    public function dogPic($url){
        //$url=bdika_url($id);
        ?><img src="<?php echo $url;?>"><?php
    }
    public function randSex(){
        return Rand(0,1);
    }
    public function stats(){
        $arr = [
          "lucky" => Rand(1,100),
          "spd" => rand(9,11),
          "agl" => rand(9,11),
          "tch" => rand(9,11),
          "jmp" => rand(9,11),
          "nuh" => rand(9,11),
          "fnd" => rand(9,11),
          "mut" => rand(1,100)
          ];
        
        return $arr;
    }     
    
    public function insertData($id){
        //$id = 3;
        // Загружаем объект с ID = 3
        $dog = R::load('randodna', $id);
        // Обращаемся к свойству объекта и назначаем ему новое значение
        
        $new = $this->stats();
       // debug($new);
        
        $dog->lucky = $new['lucky'];
        $dog->spd = $new['spd'];
        $dog->agl = $new['agl'];
        $dog->tch = $new['tch'];
        $dog->jmp = $new['jmp'];
        $dog->nuh = $new['nuh'];
        $dog->fnd = $new['fnd'];
        $dog->mut = $new['mut'];
        $dog->dna = $this->startDna();
        $dog->about='shop';
        $dog->sex = Rand(0,1);

        // Сохраняем объект
       R::store($dog);
       $this->dogPic($this->doUrl($dog->dna));
    }
    public function retSex($id) {
        $sex = R::getCell('SELECT sex FROM randodna WHERE id = ? LIMIT 1', [$id]);
      
        if(0==$sex){
	return '<img src = "/pic/female_mini.png">';
        }
        else{
	return '<img src = "/pic/male_mini.png">';
        }
    }
 function dogPrice($id){
      $sex = R::getCell('SELECT sex FROM randodna WHERE id = ? LIMIT 1', [$id]);
      

        if(1==$arr['sex']){
           // echo "кобель";
            if('Hrhr'==$arr['hr']){
                $cost=35000;
                if('bb'==$arr['bb']){
                $cost=$cost+20000;
                }
            }

            if('hrhr'==$arr['hr']){
                $cost=10000;
                if('bb'==$arr['bb']){
                $cost=$cost+25000;
                }
            }

        }
        if(0==$arr['sex']){
            //echo "сука";
            if('Hrhr'==$arr['hr']){ //голая
                $cost=45000;
                if('bb'==$arr['bb']){ //голая шоко
                $cost=$cost+30000;
                }
            }

            if('hrhr'==$arr['hr']){ //пуховая
                $cost=25000;
                if('bb'==$arr['bb']){ //пуховая шоко
                $cost=$cost+15000;
                }
            }

        }
         return $cost;  
}
   
}//class NewDog

/* начало */ 
echo "<br>";
//$new = $obj->stats();
//debug($new);





?>
<style>
   #dogs {
        -webkit-box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35); 
        box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35);
        margin: 0 auto 0 auto;
        padding: 10px;
        border: 10px;
}
</style>
 <form method="POST" action="buydog.php">
    <table border="0" cellpadding="25" text-align="center">
        <caption><h1>Aктуальные предложения на сегодня</h1><br></caption>
    <td><div id="dogs">
    <?php 
    $obj3 = new RandDog;
    $obj3->insertData(3);
    ///////////// рисует пол собаки
   echo $obj3->retSex(3);  
     //////////////////// проверка цены ........
   // echo $_SESSION['dog1_price'] = dogPrice($_SESSION['id_dna']);    
  
     ?><button type="submit" class="knopka" name="buy1" >Купить</button></div></td>
           
        </td>
        <td><div id="dogs">  <?php 
            $obj4 = new RandDog;
            $obj4->insertData(4);
            ///////////// рисует пол собаки
            echo $obj4->retSex(4);
          //  echo $_SESSION['dog2_sex'] = print_sex_pic($_SESSION['id_dna2']);   
            //////////////////// проверка цены ........
          //  echo $_SESSION['dog2_price'] = dogPrice($_SESSION['id_dna2']);   
            ?> <button type="submit" class="knopka" name="buy2" >Купить</button></div></td>
        <td><div id="dogs">  <?php 
           $obj5 = new RandDog;
            $obj5->insertData(5);
            ///////////// рисует пол собаки
            echo $obj5->retSex(5);
          //  echo $_SESSION['dog3_sex'] =  print_sex_pic($_SESSION['id_dna3']);   
            //////////////////// проверка цены ........
           // echo $_SESSION['dog3_price'] = dogPrice($_SESSION['id_dna3']);   
            ?> <button type="submit" class="knopka" name="buy3" >Купить</button></div></td>
      </tr>
     

    </table>
</form>