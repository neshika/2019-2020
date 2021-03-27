<?php
//подключение файлов
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');


////перезалить данные из animals - randodna (url)
//for($i=1;$i<=22;$i++){
//    $books = R::getCell('SELECT `url` FROM animals WHERE `id` = ? LIMIT 25', [$i]);
//    echo $books .'<br';
//    $dna_id = R::getCell('SELECT `dna_id` FROM animals WHERE `id` = ? LIMIT 25', [$i]);
//    R::exec( 'UPDATE randodna SET url=:url WHERE id = :id ', array(':url'=> $books, ':id' => $dna_id));
//}


////перезалить данные из animals - randodna (url_puppy)
//for($i=1;$i<=22;$i++){
//    $books = R::getCell('SELECT `url_puppy` FROM animals WHERE `id` = ?', [$i]);
//    echo $books .'<br';
//    $dna_id = R::getCell('SELECT `dna_id` FROM animals WHERE `id` = ?', [$i]);
//    R::exec( 'UPDATE randodna SET url_puppy=:url WHERE id = :id ', array(':url'=> $books, ':id' => $dna_id));
//}
//echo '<br>' . $dna  = R::getCell('SELECT url FROM randodna WHERE id = ? LIMIT 1', [11]); //pici/hr1w0f1b0t0m0_04.png
//
//$offset = strpos($dna, '_'); //берем все до _
//$result = ($offset) ? substr($dna,0,$offset) : $source;
//echo "{$dna} => {$result}";   
//echo '<br>' . $result;
//
//$result = substr($result, strpos($result, '/') + 1, strlen($result)); //берем все после /
//echo '<br>' . $result;
//$result = substr($result, strpos($result, '/') + 1, strlen($result)); //берем все после /
//echo '<br>' . $result;

  $dna='hr0w0f0b0t0m0';
        for($i=1;$i<=strlen($dna);$i++){

                if(!($i%2)){  //еcли четные равны 0 (!1)
                    $dna[$i]=Rand(0,1);
                }
        }   
    echo $dna . "<br>";    
    $test = new RandDog;
    $url = $test->doUrl($dna);
    $test->dogPic($url);
    $url_puppy=$test->DoUrlPuppy($url);
    $test->dogPic($url_puppy);
?>



