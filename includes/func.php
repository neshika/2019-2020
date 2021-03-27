<style>
.table {
	width: 100%;
	margin-bottom: 20px;
	border: 15px solid #F2F8F8;
	border-top: 5px solid #F2F8F8;
	border-collapse: collapse; 
}
.table th {
	font-weight: bold;
	padding: 5px;
	background: #F2F8F8;
	border: none;
	border-bottom: 5px solid #F2F8F8;
}
.table td {
	padding: 5px;
	border: none;
	border-bottom: 5px solid #F2F8F8;
}
</style>
<?php

 /*                                *************************    РАСПЕЧАТКА Собаки на экране КАРТИНКА  */
class PrintDog extends Dog{
    function printStats($id){
      $array =  R::getRow('SELECT * FROM `randodna` WHERE `id` LIKE :search LIMIT 1', [
                'search' => "%$id%"]);  
      //debug($str);
      ?>
       <table class="table">
    <tr>
        <td>удача</td>
        <td><?php echo $array['lucky']?></td>
    </tr>
    <tr>
        <td>скорость</td>
        <td><?php echo $array['spd']?></td>
    </tr>
    <tr>
        <td>уворот</td>
        <td><?php echo $array['agl']?></td>
    </tr>
    <tr>
        <td>обучение</td>
        <td><?php echo $array['tch']?></td>
    </tr>
    <tr>
        <td>прыжки</td>
        <td><?php echo $array['jmp']?></td>
    </tr>
    <tr>
        <td>обоняние</td>
        <td><?php echo $array['nuh']?></td>
    </tr>
    <tr>
        <td>поиск</td>
        <td><?php echo $array['fnd']?></td>
    </tr>
</table>
       <?php
    
    }
    public function picCoins() {
        return ' <img src = "/pici/coins_mini.png">';
    }
    /*функция печатает собаку как ссылку, можно указать размер картинки в пикселях. проверяет щенок или нет(печатает из ANIMALS)*/
    function picLink($id,$size){
         $dna_id=$this->retDnaId($id);
         $url=$this->retCell('url', $dna_id, 'randodna');
             
        ?><a href="/name.php?id=<?php echo $id?>">
            <img src="<?php echo $url;?>" width="<?php echo $size?>">
                </a>
         <?php 
    
    }
    /* функция печатает собаку по ее URL */
    public function dogPic($url){
       ?><img src="<?php echo $url;?>"><?php
    }
 

}
class Kennels{
    ///////////////////////  Работа с kennels питомники ////////////////
    public function retCountDog($owner) {
        
       return R::getcell('SELECT dogs FROM kennels WHERE owner_k =:owner', array(':owner'=> $owner));
        
    }
}
class Family{
    ///////////////////////  Работа с FAMILY СЕМЬЕЙ ////////////////
}
/***************** работа с таблицами ****************************/
class Tabl{
    /*Функция вносит изменения имени собаки по ее Id*/
function UpdateData($tabl,$id,$cell,$value){  //$tabl - название таблицы \\ $id-ай ди выбранного\\ $cell-названия столба\\ $value- значение
     R::exec( 'UPDATE ' .  $tabl . ' SET ' . $cell . '=:aa WHERE id = :id ', [
            ':aa'=> $value,
            ':id' => $id]);
    
}


/*Функция достает даннные из заданного поля($cell) по ее Id из таблицы $tabl*/
function retCellById($id, $cell,$tabl){
    $sql = 'SELECT ' . $cell . ' FROM ' . $tabl . 'WHERE id=' . $id; 
    return R::getCell($sql);
}


/*Функция возвращает данные по параметру $cell из таблицы $tabl по индексу $id*/
function retCell($bdika,$id,$tabl){
    //if('animals'==$tabl){
    $array = R::getAssoc(get_sql($id,$tabl));
        foreach($array as $item) {
            foreach ($item as $key => $value) {
                if($key==$bdika){
                    return $item[$bdika];
                }
            }
        }
}

/*Функция возвращает данные из таблицы $tabl по индексу $id*/
function retRow($id,$tabl){
    
    return R::getRow(get_sql($id,$tabl));   //$id - индекс ; $tabl - таблица с данными
    
}

}
/************************ Работа с таблицей USERS ***************/
class Users{
   static $owner;
   
   //возвращает имя заводчика, который зологинен
   public function retOwner(){
	return $_SESSION['logged_user']->login;
   }
   
   //возвращает ID по имени заводчика
   public function retId($owner) {
       return R::getcell('SELECT id FROM users WHERE login =:log', array(':log'=> $owner));
   }
   //возвращает Питомник по имени заводчика
    public function retKennel($owner){
        return R::getcell('SELECT kennel FROM users WHERE login =:log', array(':log'=> $owner));
    }
    //возвращает Дату создания питомника по имени заводчика
    public function retFTime($owner){
        return R::getcell('SELECT f_time FROM users WHERE login =:log', array(':log'=> $owner));
    }
    //возвращает дату последнего визита по имени заводчика
    public function retLTime($owner){
        return R::getcell('SELECT l_time FROM users WHERE login =:log', array(':log'=> $owner));
    }
    //возвращает статус онлайн 1/неонлайн 0 по имени заводчика
   public function retOnLine($owner){
        return R::getcell('SELECT online FROM users WHERE login =:log', array(':log'=> $owner));
    }
    //возвращает количество визитов по имени заводчика
    public function retVisits($owner){
        return R::getcell('SELECT visits FROM users WHERE login =:log', array(':log'=> $owner));
    }
    
    //возвращает все данные(*) по имени заводчика
    public function retAll($owner) {
        return R::getRow('SELECT * FROM users WHERE login =:log', array(':log'=> $owner));
    }
}

/************************ Работа с таблицей RANDODNA ***************/
Class Dna{
        
}

/************************ Работа с ANIMALS ***************/
Class Dog extends Tabl{
    static $id;
    static $dog_arr;
    static $owner;
    
    //Возвращает все id собак по владельцу
    public function allDog($owner){
        $this->dog_id = $_SESSION['logged_user']->login;
        $this->dog_arr = R::getAssoc ('SELECT id FROM animals WHERE owner =:owner and status=1', array(':owner' => $owner));
        return $this->dog_arr;
    }
    public function retName($id){
        return R::getCell('SELECT name FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retRace($id){
        return R::getCell('SELECT race FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retOrign($id){
        return R::getCell('SELECT orign FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retBreeder($id){
        return R::getCell('SELECT breeder FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retOwner($id){
        return R::getCell('SELECT owner FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retKennel($id){
        return R::getCell('SELECT kennel FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retEstrus($id){
        return R::getCell('SELECT estrus FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retRegId($id){
        return R::getCell('SELECT reg_id FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retAgeId($id){
        return R::getCell('SELECT age_id FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retDnaId($id){
        return R::getCell('SELECT dna_id FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retFamilyId($id){
        return R::getCell('SELECT family_id FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retMarkId($id){
        return R::getCell('SELECT mark_id FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retWeight($id){
        return R::getCell('SELECT weight FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retHeight($id){
        return R::getCell('SELECT height FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retVitality($id){
        return R::getCell('SELECT vitality FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retHp($id){
        return R::getCell('SELECT hp FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retJoy($id){
        return R::getCell('SELECT joy FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retBirth($id){
        return R::getCell('SELECT birth FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retNow($id){
        return R::getCell('SELECT now FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retStatus($id){
        return R::getCell('SELECT status FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retPuppy($id){
        return R::getCell('SELECT puppy FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retLitter($id){
        return R::getCell('SELECT litter FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
   

    public function countDogs($owner){ // функция пересчитывает количество собак и списываем в kennel
        $books = R::getAll('SELECT `id` FROM `animals` WHERE `owner` = ?', [$owner]);
        $cont = count($books);

        //возвращаем строку питомника
        $id_ken = R::getCell('SELECT `id` FROM `kennels` WHERE `owner_k` = ? LIMIT 1', [$owner]);

        //вносим обновленные данные в таблицу
       $book = R::load('kennels', $id_ken);
        $book->dogs = $cont;
        R::store($book);
    }
}
 /*                                *************************    РАСПЕЧАТКА Собаки на экране КАРТИНКА  */
Class RandDog extends PrintDog{
    public function randDna(){
        $dna='hr0w0f0b0t0m0';
        for($i=1;$i<=strlen($dna);$i++){

                if(!($i%2)){  //еcли четные равны 0 (!1)
                    $dna[$i]=Rand(0,1);
                }
        }
        return $dna;
    }

    public function insertData($id){
        $dna = $this->randDna();
        
        //$id = 3;
        // Загружаем объект с ID = 3
       // echo '<br>insertData';
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
        //$dog->dna = $this->startDna();
        $dog->dna = $dna;
        $dog->about='shop';
        $dog->sex = Rand(0,1);

        // Сохраняем объект
       R::store($dog);
       
       //создаем картинки собак
      
       $dog->url = $this->doUrl($dna);
       $dog->url_puppy = $this->DoUrlPuppy($dog->url);
       
       return R::store($dog);
    }

    public function doUrl($data_dna){ //получаем данные DNA hr0w0f0b0t0m0
       // echo '<br>DoUrl';
        //$data_dna = R::getCell('SELECT dna FROM randodna WHERE id = ? LIMIT 1', [$id]);
        $num=Rand(1,3);  //количество вариаций окраса собаки взрослые
        
        if(1 == $data_dna[2]){  //если собака голая hr1
            if(1==$data_dna[10] && 1==$data_dna[12]){ //если и крап и пятна
              $data_dna[4]=0; //ww=0    собака не модет быть белой
              $data_dna[6]=0; //ff=0    собака не модет быть рыжей
             $url="pici/TM/" . $data_dna . '_0' . $num . '.png';
            }
            else if(1==$data_dna[10]){  //если крап TT
             $data_dna[4]=0; //ww=0    собака не модет быть белой
             $data_dna[6]=0; //ff=0    собака не модет быть рыжей
             $url="pici/TT/" . $data_dna . '_0' . $num . '.png';
            }
            else if(1==$data_dna[12]){  //если пятна MM
              //$data_dna[4]=0; //ww=0    собака не модет быть белой
              
              $url="pici/MM/" . $data_dna . '_0' . $num . '.png';
            }
            else{   //если чистая собака
                $url="pici/" . $data_dna . '_0' . $num . '.png';
            }
          }
          if(0 == $data_dna[2]){  //если собака пуховая
              $data_dna[10]=0; //tt=0    собака нет крапа
              $num2=Rand(3,5);  //количество варианций окраса собаки
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
        return $url;  //получаем $URL
    }
    public function dogPic($url){
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
    
    
    public function picSex($id) {
        $sex = R::getCell('SELECT sex FROM randodna WHERE id = ? LIMIT 1', [$id]);
      
        if(0==$sex){
            return '<img src = "/pici/female_mini.png">';
        }
        else{
            return '<img src = "/pici/male_mini.png">';
        }
    }
    public function DoUrlPuppy($url){  //получаем данные из url
      //  echo '<br>' . $dna  = R::getCell('SELECT url FROM randodna WHERE id = ? LIMIT 1', [$dna_id]); //pici/hr1w0f1b0t0m0_04.png
        
       $offset = strpos($url, '_'); //берем все до _
        $result = ($offset) ? substr($url,0,$offset) : $source;
        //echo "{$url} => {$result}";   
       // echo '<br>' . $result;

        $result = substr($result, strpos($result, '/') + 1, strlen($result)); //берем       все после /
        //echo '<br>' . $result;
        if(strripos($result, '/')){
            $result = substr($result, strpos($result, '/') + 1, strlen($result)); //берем все после /
        }
//echo '<br>' . $result;

        $dna=$result;
        $num = Rand(1,4);  //количество варианций окраса собаки щенки
        
        if(0 == $dna['2']){   //если пух
               if(0 == $dna['4']){   //если не белый 
                     if(0 == $dna['6']){ //если не рыжий
                         if(0 == $dna['8'])  //если шоко
                           $url_dna='hr0b0';
                         if(1 == $dna['8'])  //еcли черный
                           $url_dna='hr0b1';
                     }
                     if(1 == $dna['6']) //если рыжий
                       $url_dna='hr0f1';
               }      
               else    //если белый
               $url_dna='hr0w1';
             }
             if(1 == $dna['2']){    //если голый
                 if(1 == $dna['10'] && 1 == $dna['12']){ //и крап и пятна
                     $url_dna='hr1w1';
                     
                 }
                if(0 == $dna['4'] && 0 == $dna['10']){   //если не белый и нет крапа TT
                     if(0 == $dna['6']){ //если не рыжий
                         if(0 == $dna['8'])  //если шоко
                           $url_dna='hr1b0';
                         if(1 == $dna['8'])  //ечли черный
                           $url_dna='hr1b1';
                     }
                     if(1 == $dna['6']) //если рыжий
                         $url_dna='hr1f1';
                 }
               else    //если белый
               $url_dna='hr1w1';
             }

           
           return $url = "pici/puppy/" . $url_dna . '_0' . $num . '.png';
       
    }
    public function dogPrice($id){
      $sex = R::getCell('SELECT sex FROM randodna WHERE id = ? LIMIT 1', [$id]);
      $dna = R::getCell('SELECT dna FROM randodna WHERE id = ? LIMIT 1', [$id]);

        if(1 == $sex) //кобель
        { 
            //echo ' кобель/';
            if(1 == $dna[2]){ //голая
                $cost=35000;
               // echo 'голый/';
                if(0 == $dna[8]){ //шоко
                    //echo ' шоко.';    
                    $cost=$cost+20000;
                }
            }

            if(0 == $dna[2]){ //пух
               // echo ' пух/';
                $cost=10000;
                if(0 == $dna[8]){ //шоко
                   // echo 'шоко.';    
                    $cost=$cost+25000;
                }
            }

        }
        if(0 == $sex){ //cука
            //echo ' сука/';
           if(1 == $dna[2]){//голая
              //echo ' голая/';
                $cost=45000;
                 if(0 == $dna[8]){ //шоко
                   // echo ' шоко.';    
                   $cost=$cost+30000;
                }
            }

            if(0 == $dna[2]){ //пух
               // echo ' пуховая/';
                $cost=25000;
                 if(0 == $dna[8]){ //шоко
                   // echo ' шоко.';    
                   $cost=$cost+15000;
                }
            }

        }
         return $cost;  
    }
    public function retDna($id) {
        return R::getCell('SELECT dna FROM randodna WHERE id = ? LIMIT 1', [$id]);
    }
    public function retUrl($id) {
        return R::getCell('SELECT url FROM randodna WHERE id = ? LIMIT 1', [$id]);
    }
    public function retUrlPuppy($id) {
        return R::getCell('SELECT url_puppy FROM randodna WHERE id = ? LIMIT 1', [$id]);
    }
   
}// end class NewDog
