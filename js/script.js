function getRandomInRange(min, max) {  // функция высчитывает рандомное число в пределах минимума и максисмума
    return Math.floor(Math.random() * (max - min + 1)) + min; 
  }
function Well(vit,hp,joy){    //обрабатывает значения до 100
  if(vit>100)
    vit=100;
  if(hp>100)
    hp=100;
  if(joy>100)
    joy=100;
  

  var param = new Array();


  param[0]=vit;
  param[1]=hp;
  param[2]=joy;

  return param;

}

var vit = getRandomInRange(1, 100);
var hp = getRandomInRange(1, 100);
var joy = getRandomInRange(1, 100);



function FoodOn() {     //если нажали кнопку "еда"
  alert("Выжал еду!");
  console.log(vit + ' ' + hp + ' ' + joy);
  vit +=35;
  joy +=1;
  alert("Подсчитал!");

   window.parama=Well(vit,hp,joy);

   //alert(parama);


   return parama;



  // parama[0]=vit;
  // parama[1]=hp;
  // parama[2]=joy;
  
 //  for (var i=0; i<parama.length;i++ ){

 //  document.write(parama[i]);
 //  document.write(' / ');
 // }


}