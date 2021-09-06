<?php 
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');


function DoDnaMumDad($mum,$dad) {
    $array1 = $mum;
    $array2 = $dad;
//echo '$array1 ' . $array1 = 'hr0w0f0b0t0m0';
//echo '<br>$array2 ' . $array2 = 'hr1w1f1b1t1m1';
echo '<br>$array3 ' . $array3 = 'hr0w0f0b0t0m0';
    $num = 0;

    for($i = 2; $i < strlen($array1); $i+=2){ // прогоняет первый стринг
        if(($array1[$i] == $array2[$i]) AND ($array1[$i] == 0)){ //hr0 == hr0  100% будет 0
            echo '<br>1 вариант == 0 ';
            $array3[$i] = 0;

            echo '<br>0: ' . $array3;
        }
        if(($array1[$i] == $array2[$i]) AND ($array1[$i] == 1)){ //hr1 == hr1  100% будет 75% - 1, 25% - 0
            echo '<br>2 вариант == 1 ';
            echo '<br>num' . $num = Rand(1,4);   //1 - 25%
            if( 1 == $num ){    //0 - 25%
                 $array3[$i] = 0;
            }
            else{   //1 - 75%
                $array3[$i] = 1;
            }
          echo '<br>1: ' . $array3;  
         }
         if($array1[$i] != $array2[$i]){ // если hr1 -50% hr0 - 50%    hr1 - 75%  hr0 -25%
             echo '<br>3-тий вариант не равны ';
             echo '<br>num' . $num = Rand(1,4);   //1 - 25%
             if( 1 == $num ){    //0 - 25%
                 echo ' 25% - 0 ';
                  $array3[$i] = 0;
             }
             if ( 3 == $num){ //1 - 75%
                 echo ' 75% - 1 ';
                 $array3[$i] = 1;
             }
             else{ // 2,3 - 50%
                  echo '<br>num' . $num = Rand(1,2);   //1 - 50% , 0 - 50%
                  echo ' 2,3 - 50%  = 1';
                   if( 1 == $num ){ //50%
                       $array3[$i] = 1;
                   }
                   else{
                       echo ' 2,3 - 50%  = 0';
                       $array3[$i] = 0;
                   }

             }

        }
    }
    return $array3;
}


$mum = 'hr0w0f0b0t0m0';
$dad = 'hr1w1f1b1t1m1';
$puppy_dna = DoDnaMumDad($mum, $dad);
echo '<br>' . $puppy_dna; /* Не забыть внести DNA в таблицу Randodna*/

$new = new GreateNewDog();
$dna = new Dna();

$id_m = 7;
$id_d = 8;
$owner = 'Nesh';


//debug($dna_m = $dna->retAllDna($id_m));
//debug($dna_d = $dna->retAllDna($id_d));
//
//echo '<br> spd =' . $new ->StatsFromMumDad($dna_m['spd'],$dna_d['spd'], $mutation, $plus);

$dna_id = $new->InsertDogDna($id_m,$id_d,$puppy_dna);
$new->insertDogAnimals($owner, $dna_id);
$new->insertNewPuppyFamilyTree($id_m, $id_d);