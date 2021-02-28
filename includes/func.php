<?php
 /*                                *************************    РАСПЕЧАТКА Собаки на экране КАРТИНКА  */
class PrintDog extends Dog{
    private $array = [];
    
    public function pic(){
        print 'все работает';
    }
    function data_animals($id){
        return R::getRow( 'SELECT * FROM animals WHERE id = :id',
        [':id' => $id]);

    }
   
    function bdika_url($id){
        $data_dog= take_data_from($id, 'animals');
   
        if (13>$data_dog['age_id']){   //age_id = 4 (6 мес)  age_id = 9 (15 мес = 1 год 3 мес)
            return  $data_dog['url_puppy'];
        }else{
            return $data_dog['url'];
        }
    }
     /*Функция печатает собаку  */
    function dog_pic($id){
        $url=bdika_url($id);
        ?><img src="<?php echo $url;?>"><?php
    }
    function dog_pic_mesh(){
        ?><img style="position:relative;left:-200px" src="pici/mesh.png"><?php
    }
    /*Функция печатает собаку  c заданным размером в% или пикселях + пишет имя во всплыв. окне*/
    function dog_pic_size($id,$size){
        ?><img src="<?php echo bdika_url($id);?>" height="<?php echo $size?>"><?php
    }
    /*функция печатает собаку как ссылку, можно указать размер картинки в пикселях. проверяет щенок или нет(печатает из ANIMALS)*/
    function pic_link($id,$size){
        ?><a href="/name.php?id=<?php echo $id?>">
            <img src="<?php echo bdika_url($id);?>" title="<?php echo ret_Cell('name', $id, 'animals')?> " width="<?php echo $size?>">
                </a><?php
    }


    /*функция берет дааные из таблицы рандодна и возвращает URL который создала*/
    function UrlFromDna($id_dna,$size){
        $dna= ret_Cell('dna', $id_dna,'randodna');
        $urlFromDna = do_url($dna);
        return $urlFromDna;
    }
    /*функция печатает собаку из ее URL рандомно, можно указать размер картинки в %. из RANDODNA*/
    function printUrlFromDna($urlFromDna){
        ?>
        <img src = "<?php echo $urlFromDna;?>" width="<?php echo $size?>%"> 
        <?php
    }


    /*Функция пишет тип собаки по русски в зависимоти от Генетического типа*/
    function print_hr($id){

       ret_dna($id);
       $hr_val=take_data_from(ret_dna($id), 'randodna');
       //echo $hr_val['hr'];

        if ('Hrhr'==$hr_val['hr'])
            return 'голая';
        else
            return 'пуховая';
    }
     /*Функция возвращает данные по собаке по ее ID*/
    function print_all_d($id){

      $array =  R::getAll( 'SELECT * FROM animals WHERE id = :id',
            [':id' => $id]); 
            foreach($array as $item) {
                  foreach ($item as $key => $value) {
                     echo " | " . " $value";
                    }    
                  echo "<br><br>";
                }
    }
    function print_stats_d($id){

      $array =  R::getAll( 'SELECT * FROM stats WHERE dog_id = :id',
            [':id' => $id]); 
      foreach($array as $item) {
                  foreach ($item as $key => $value) {
                     echo " | " . "$value";
                    }    
                  echo "<br><br>";
                }
    }

    /*Функция возвращает название картинки в зависимости от пола собаки по ее ID*/
    function ret_pic_sex($id){

        $sex=ret_sex($id);
            if(0==$sex){
                    return '<img src = "/pic/female_mini.png">';
            }
            else{
                    return '<img src = "/pic/male_mini.png">';
            }

    }
    /*  Функция дает ссылку на страничку lit/puppy*/
    function print_lit_pup($id){

        $lit= ret_Cell('litter', $id,'animals');
        $pup=ret_cell('puppy', $id,'animals');
        $array='<a href="/lit&pup.php?id=' . $id . '">' . "<br> вязки/дети: ". $lit .'/'. $pup. '</a>';
        echo $array;
    }

}

class Family{
    ///////////////////////  Работа с FAMILY СЕМЬЕЙ ////////////////

/*функция получает id собаки и возвращает данные по семье*/
function ret_f_data_by_dog($id){
    $f_id= ret_Cell('family_id', $id, 'animals'); //получаем id на фамилию
    return take_data_from($f_id, 'family'); //Получаем данные из семьи
}
/*проверяет партнера на родство и выводит степень родства*/
function ret_str_contact($partner,$dog){

    
    $f_data = ret_f_data_by_dog($dog); //функция возвращает данные по родственникам собаки
  if( $partner==$f_data['dad'] ){

      return ' отец!';
  }
  if( $partner==$f_data['mum'] ){

      return ' мать!';
  }
  if( ( $partner==$f_data['g1dad'] ) || ( $partner==$f_data['g0dad'] ) ){

      return ' дед!';
  }
  if( ( $partner==$f_data['g1mum'] ) || ( $partner==$f_data['g0mum'] ) ){

      return ' бабка!';
  }
  if( ( $partner==$f_data['gg0dad1'] ) || ( $partner==$f_data['gg0dad3'] ) || ( $partner==$f_data['gg1dad1'] ) || ( $partner==$f_data['gg1dad3'] )){

      return ' прадед!';
  }
  if( ( $partner==$f_data['gg0mum2'] ) || ( $partner==$f_data['gg1mum2'] ) || ( $partner==$f_data['gg0mum4'] ) || ( $partner==$f_data['gg1mum4'] )){

      return ' пробабка!';
  }
  else return '';
    
}
}
/***************** работа с таблицами ****************************/
class Tabl{
    /*Функция вносит изменения имени собаки по ее Id*/
function insert_data($tabl,$id,$cell,$value){  //$tabl - название таблицы \\ $id-ай ди выбранного\\ $cell-названия столба\\ $value- значение
     R::exec( 'UPDATE ' .  $tabl . ' SET ' . $cell . '=:aa WHERE id = :id ', [
            ':aa'=> $value,
            ':id' => $id]);
    
}
/*Функция достает даннные собаки по ее Id из нужно таблицы*/
function take_data_from($id,$tabl){   //$id - индекс ; $tabl - таблица с данными
    
    $sql = 'SELECT * FROM ' . $tabl. ' WHERE id=' . $id; 
    return R::getRow($sql);
      
}

/*Функция достает даннные из заданного поля($cell) по ее Id из таблицы animals*/
function ret_id_by_cell($id, $cell){
    $sql = 'SELECT ' . $cell . ' FROM animals WHERE id=' . $id; 
    return R::getCell($sql);
}



/*Функция создает строку запроса и возвращает ее как тескт*/
function get_sql($id,$tabl){
    $sql = 'SELECT * FROM ' . $tabl . ' WHERE id=' . $id; 
    return $sql;
}


/*Функция возвращает данные по параметру $cell из таблицы $tabl по индексу $id*/
function ret_Cell($bdika,$id,$tabl){
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
function ret_Row($id,$tabl){
    
    return R::getRow(get_sql($id,$tabl));
    
}

}
/************************ Работа с таблицей USERS ***************/
class Users{
   static $owner;
   
   //возвращает имя заводчика, который зологинен
   public function retOwner($owner){
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
    static $id;
    
}

/************************ Работа с ANIMALS ***************/
Class Dog{
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
    public function retUrl($id){
        return R::getCell('SELECT url FROM animals WHERE id = ? LIMIT 1', [$id]);
    }
    public function retUrlPuppy($id){
        return R::getCell('SELECT url_puppy FROM animals WHERE id = ? LIMIT 1', [$id]);
    }   

    public function count_dogs($owner){ // функция пересчитывает количество собак и списываем в kennel
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
