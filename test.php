
<?php
require "db.php";
        //подключение файлов
        
        require "/html/header.html";
        require "/html/nav.html";
        require "/html/aside.html";
        
?><div class="content">

<?php
require "includes/functions.php"; 


//  function do_dna($id){

//  // $data_dna=R::getRow( 'SELECT * FROM dna WHERE dog_id = :id',
//       /// [':id' => $id]);

//  // debug($data_dna);
//   $data_dna[hr]=f_rand_col('HrHr','Hrhr','hrhr');
//   $data_dna[ww]=f_rand_col('WW','Ww','ww');
//   $data_dna[ff]=f_rand_col('FF','Ff','ff');
//   $data_dna[bb]=f_rand_col('BB','Bb','bb');
//   $data_dna[tt]=f_rand_col('TT','Tt','tt');
//   $data_dna[mm]=f_rand_col('MM','Mm','mm');
 
//    ('Hrhr'==$data_dna[hr] ? $Hr='hr1' : $Hr='hr0');   //hr1 Hrhr - голая  // hr0 - hrhr  - пух
//     ('ww'==$data_dna[ww] ? $W='w0' : $W='w1');
//     ('ff'==$data_dna[ff] ? $F='f0' : $F='f1');
//     ('bb'==$data_dna[bb] ? $B='b0' : $B='b1');
//     ('tt'==$data_dna[tt] ? $T='t0' : $T='t1');
//     ('mm'==$data_dna[mm] ? $M='m0' : $M='m1');

//     $dna=$Hr . $W . $F . $B . $T . $M;

//        return $dna;
// }


echo "Тестируем: <br>";

  
       ?> <img src = "<?php echo $url; ?>" width="50%"><?php
// echo $num=Rand(1,5);  //количество варианций окраса собаки

// if(1 == $data_dna[2]){  //если собака голая
//   if(1==$data_dna[10] && 1==$data_dna[12]){ //если и крап и пятна
//     echo 'ТМ';
//     $data_dna[4]=0; //ww=0    собака не модет быть белой
//     $data_dna[6]=0; //ff=0    собака не модет быть рыжей

//     $url="pici/TM/" . $data_dna . '_0' . $num . '.png';
//   }
//   else if(1==$data_dna[12]){  //если крап
//     echo 'MM';
//     $data_dna[4]=0; //ww=0    собака не модет быть белой
//     $url="pici/MM/" . $data_dna . '_0' . $num . '.png';
//   }
//   else if(1==$data_dna[10]){  //если пятна
//     echo 'TT';
//     $data_dna[4]=0; //ww=0    собака не модет быть белой
//     $data_dna[6]=0; //ff=0    собака не модет быть рыжей
//     $url="pici/TT/" . $data_dna . '_0' . $num . '.png';
//   }
//   else{   //если чистая собака

//       $url="pici/" . $data_dna . '_0' . $num . '.png';

      
//   }
// }
// if(0 == $data_dna[2]){  //если собака пуховая
//     $data_dna[10]=0; //tt=0    собака нет крапа
//     if(1==$data_dna[4]){   //если собака бела пух, то нет пятен и крапа    
//         $data_dna[6]=0; //ff=0    собака не модет быть рыжей
//         $data_dna[12]=0; //mm=0    собака нет пятен
        
//         $url="pici/hrhr/" . $data_dna . '_01.png';
//     }
//     else if(1==$data_dna[6]){   //если соабка рыжая
//         $data_dna[4]=0;   //всегда не белая
//         $data_dna[8]=0;   //всегда шоко
        
//         $url="pici/hrhr/" . $data_dna . '_01.png';
//     }   
//     else
      
//     $url="pici/hrhr/" . $data_dna . '_01.png';

// }


// echo $url;  //получаем $URL



 require '/libs/down.php';
 ?>


