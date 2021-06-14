<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<link rel="stylesheet" type="text/css" href="css/main.css" />
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
  /*                                *************************   СОЗДАНИЕ НОВОЙ СОБАКИ */
Class GreateNewDog{
    
   public function retDna($id) {
        return R::getCell('SELECT dna FROM randodna WHERE id = ? LIMIT 1', [$id]);
    } 
   

    public function updateDNA($id) {
      $post = R :: getRow('SELECT * FROM `randodna` WHERE `id` = ? LIMIT 1', [$id]);
       // debug($post);
        //for each customer post create a new bean as a row/record          
            $bean = R::dispense('randodna');
             //assign column values 
             $bean->sex = $post['sex'];
             $bean->lucky = $post['lucky'];
             $bean->dna = $post['dna'];
             $bean->about = 'owner';
             $bean->spd = $post['spd'];
             $bean->agl = $post['agl'];
             $bean->tch = $post['tch'];
             $bean->jmp = $post['jmp'];
             $bean->nuh = $post['nuh'];
             $bean->fnd = $post['fnd'];
             $bean->mut = $post['mut'];
             $bean->url = $post['url'];
             $bean->url_puppy = $post['url_puppy'];
            
       //store the whole array of beans at once               
        return R::store($bean);
    }
   public function insertDogAnimals($owner,$dna_id){
    $kennel=R::getCell('SELECT `name_k` FROM `kennels` WHERE `owner_k` = ? LIMIT 1', [$owner]);
    
    $date=date('d.m.Y');
    $dogs = R::dispense('animals');
     $dogs->name='Без имени';
     $dogs->race='КХС';
     $dogs->origin='1';
     $dogs->breeder='Бесты-первый лучший';
     $dogs->owner=$owner;
     $dogs->kennel=$kennel;
     $dogs->age_id=13;
     $dogs->dna_id=$dna_id;
     $dogs->family_id=0;
     $dogs->mark_id=1; //отлично оценка
     $dogs->birth=$date;
     
     /*сохраняем id новой собаки*/
     $id_new_dog1 = R::store($dogs);
     
    return $id_new_dog1;
 
    }
    public function insertDogFamilyTree($id){
    $dog22 = R::dispense('family');
        foreach ($dog22 as $key) {
            if($key!='id'){
                $dog22->$key=0;  //вносим всех предков по нулям
            }
        }      
    $family_id2 = R::store($dog22);  
    
    /* созраняем данные о семье в таблице animals*/
    $book = R::load('animals', $id);
    $book->family_id = $family_id2;
    return R::store($book);
    
 }
        
    
} //end class GreateNewDog
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
    /* функция проверяет и возвращает ссылку на собаку в зависимости от возраста*/ 
     public function bdikaUrl($id){
         //возвращаем age_id из animals
         $age_id = $this->retAgeId($id);
         $dna_id = $this->retDnaId($id);
         
        if (13<=$age_id){   //age_id = 4 (6 мес)  age_id = 9 (15 мес = 1 год 3 мес)
            return $this->retCell('url', $dna_id, 'randodna');
        }
        else{
           return $this->retCell('url_puppy', $dna_id, 'randodna');
        }
    }
 
    /*функция печатает собаку как ссылку, можно указать размер картинки в пикселях. проверяет щенок или нет(печатает из ANIMALS)*/
    function picLink($id,$size='100%'){
        // $dna_id=$this->retDnaId($id);
         //$url=$this->retCell('url', $dna_id, 'randodna');
        $owner = $this->retOwner($id);
         $url = $this->bdikaUrl($id);
         ?><a href="/name.php?id=<?php echo $id . "&owner=" . $owner; ?>">
                <img src="<?php echo $url;?>" width="<?php echo $size?>">
                    </a>
             <?php 
         
    
    }
    
    /* функция печатает собаку по ее URL */
    public function dogPic($url){
       ?><img src="<?php echo $url;?>"><?php
    }
    public function picSex($id_dog) {
        $dna_id = $this->retDnaId($id_dog);
        
        $sex = R::getCell('SELECT sex FROM randodna WHERE id = ? LIMIT 1', [$dna_id]);
      
        if(0==$sex){
            return '<img src = "/pici/female_mini.png">';
        }
        else{
            return '<img src = "/pici/male_mini.png">';
        }
    }
 

}
class Kennels{
    ///////////////////////  Работа с kennels питомники ////////////////
    public function retCountDog($owner) {
        
       return R::getcell('SELECT dogs FROM kennels WHERE owner_k =:owner', array(':owner'=> $owner));
        
    }
}
class Family extends PrintDog{
    ///////////////////////  Работа с FAMILY СЕМЬЕЙ ////////////////
    public function retFamilyId($id) {
        return R::getcell('SELECT family_id FROM animals WHERE id =:id', array(':id'=> $id));
    }
    public function retPicMumDad($id) {
        if($id!=0)
            return $this->picLink($id,100);
        else 
            return "нет данных";
    }
    public function retMum($id) {
        $f_id=$this->retFamilyId($id);
        return R::getcell('SELECT mum FROM family WHERE id =:id', array(':id'=> $f_id));
    }
    public function retDad($id) {
        $data_dad=0;
        $f_id=$this->retFamilyId($id);
        return R::getcell('SELECT dad FROM family WHERE id =:id', array(':id'=> $f_id));
        
    }
    /*бабушка по линии мамы*/
    public function retG0Mum($id) {
        $f_id=$this->retFamilyId($id);
        return R::getcell('SELECT g0mum FROM family WHERE id =:id', array(':id'=> $f_id));
    }
    /*дедушка по линии мамы*/
    public function retG0Dad($id) {
        $f_id=$this->retFamilyId($id);
       return R::getcell('SELECT g0dad FROM family WHERE id =:id', array(':id'=> $f_id));
        
    }
    /*бабушка по линии папы*/
    public function retG1Mum($id) {
        $f_id=$this->retFamilyId($id);
        return R::getcell('SELECT g1mum FROM family WHERE id =:id', array(':id'=> $f_id));
    }
    /*дедушка по линии папы*/
    public function retG1Dad($id) {
        $f_id=$this->retFamilyId($id);
       return R::getcell('SELECT g1dad FROM family WHERE id =:id', array(':id'=> $f_id));
     
    }
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
    public function retDogByOwner($owner){
        return R::getCol ('SELECT id FROM animals WHERE owner =:owner and status=1', array(':owner' => $owner));
         
    }
}

/************************ Работа с таблицей RANDODNA ***************/
Class Dna extends Dog{
    public function retDna($dna_id) {
        return R::getCell('SELECT dna FROM randodna WHERE id = ? LIMIT 1', [$dna_id]);
    }
    public function retUrl($dna_id) {
        return R::getCell('SELECT url FROM randodna WHERE id = ? LIMIT 1', [$dna_id]);
    }
    public function retUrlPuppy($dna_id) {
        return R::getCell('SELECT url_puppy FROM randodna WHERE id = ? LIMIT 1', [$dna_id]);
    }
    public function retSex($id_dna) {
        return R::getCell('SELECT sex FROM randodna WHERE id = ? LIMIT 1', [$id_dna]);
    }
   
    public function retSexText($dna_id) {
        if($this->retSex($dna_id)){
            return 'кобель';
        }
        else {
            return 'сука';
        }
    }
    public function retGolPooh($dna_id) {
        $string = $this->retDna($dna_id);
        if(0 == $string[2]){
           return 'Пуховая (шерстная)';
        }
        if(1 == $string[2]){
            return 'Голая(бесшерстная)';    
        }
    }
    public function retShocoGen($dna_id) {
        $string = $this->retDna($dna_id);
        if(0 == $string[8]){
           return 'Ген шоколадности есть';
        }
        if(1 == $string[8]){
            return 'Нет гена шоколадности';    
        }
    }
    
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
        return R::getCell('SELECT origin FROM animals WHERE id = ? LIMIT 1', [$id]);
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
     public function retSex($id) {
         $dna_id = $this->retDnaId($id);
        return R::getCell('SELECT sex FROM randodna WHERE id = ? LIMIT 1', [$dna_id]);
    }
     public function retSexPartner($id) {
         
      return $this->retSex($id) ? '0' : '1';
           
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
    public function retAgeText($id){
        $age_id = $this->retAgeId($id);
     //находим аналог(2 месяца) этой цыфры в таблице ages и выводим текст возраста
        return R::getcell('SELECT age FROM ages WHERE id =:id', array(':id'=> $age_id));
             
    }
    public function retMarkText($id){
        $mark_id = $this->retMarkId($id);
        return R::getcell('SELECT namerus FROM marks WHERE id =:id', array(':id'=> $mark_id));
        
    }
     public function retOrignText($id){
         if($this->retOrign($id)){
         //if(R::getCell('SELECT orign FROM animals WHERE id = ? LIMIT 1', [$id])){
             return 'РКФ';
         }
        else {
            return 'не известно';
        }
    }
    public function retEstrusText($id) {
        $est_id= $this->retEstrus($id);
        return R::getCell('SELECT age FROM ages WHERE id =:id', array(':id'=> $est_id));
        
    }
    public function retEstrusStatus($id){
      // сделать функцию
        $est = $this->retEstrus($id);
        $age = $this->retAgeId($id);
        $sex = $this->retSex($id);
        $array='';
            //находим аналог(2 месяца) этой цыфры в таблице ages и выводим текст возраста
    
      // echo 'возраст: ' . $age . ' течка: ' .$est . "<br>";
        if( '0' == $sex){   //если собака сука
            
            if($age == $est){

                 $array = 'у суки течка';
             }
            elseif($age < $est){
                                          
                $array = "течка будет в: " . $this->retEstrusText($id);  
            }
            elseif($age > $est){
                $this->addEstus($id,3);
                $est_text= $this->retEstrusText($id);
                $array = 'течка будет в: ' . $est_text;

             }
               return $array; 
         }
      
    }
    /*увеличивает возраст на 1 тик*/
    public function addAge($id){
        $age_id = $this->retAgeId($id); //получаем цыфру возраста из табл animals
        $age_id+=1;  //увеличивает на 1 пункт

        $this->UpdateData('animals',$id,'age_id', $age_id); //вставляем новые данные в таблицу по id 
    }
     public function addEstus($id,$num){
        $est_id = $this->retEstrus($id); //получаем цыфру возраста из табл animals
        $est_id=$est_id+$num;  //увеличивает на 1 пункт
        $this->UpdateData('animals',$id,'estrus', $est_id); //вставляем новые данные в таблицу по id 
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
    
    
    public function picSex($id_dna) {
        $sex = R::getCell('SELECT sex FROM randodna WHERE id = ? LIMIT 1', [$id_dna]);
      
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
class Matting extends Dog {
    
    public function bdikaSexPartner($str,$sex_partner){
       // debug($str);  
        //echo '<br>';
       for($i=0;$i<count($str);$i++){
           if($this->retSex($str[$i]) == $sex_partner){
               $str2[] = $str[$i];
//               $dog = new PrintDog;
//               $dog->picLink($str[$i], '30%');
//               //echo $str[$i];
           }
        }
        return $str2;
        
        
    }
    function bdikaForBreed($id){
    // $tabl = new Tabl;  
     $dog = new Dog;
     
    $sex= $this->retSex($id);
    $mark=$this->retMarkId($id);
   // echo '<br> собака:' . $id;
   // echo '<br> пол:' . $sex;
    //echo '<br> оценка: ' . $mark;
    $error = false;
    $errort = '';
    
   if( '1' != $dog->retOrign($id) ):
       $error = true;
       $errort = 'Не документов РКФ';
 
        elseif( $mark > 2 || 0==$mark): //если  нет "хорошо" или "очень хорошо"
           $error = true;
            $errort = 'не получены положительные оценки';
   
        elseif( '1' == $sex )://кобель
   
            if( $dog->retAgeId($id) < 17 ):
                    $error = true;
                    $errort = 'кобель слишком молодой';
            else:
                $errort = 'Кобель готов к вязке';    
            endif;
        elseif(0 == $sex): //сука
            if( $dog->retEstrus($id) < 15 ||  $dog->retEstrus($id) !=  $dog->retAgeId($id)):
                    $error = true;
                    $errort = 'сука не готова к вязке';
            elseif( $dog->retAgeId($id) >58):
            $error = true;
            $errort = 'возраст суки превышен';
             elseif( $dog->retLitter($id) > 7):
            $error = true;
            $errort = 'количество вязок уже 7';
            else:
                 $errort = 'Сука готова к вязке';    
            endif;
    else:
         echo 'Что-то пошло не так! ';
            
     endif;
     
    // if ($error) {
       //  echo '<br>' . $errort;
     //}
     return $errort;
}

}
