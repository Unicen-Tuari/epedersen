"use strict";
let Jugar= document.getElementById('Jugar');

Jugar.addEventListener('click', function(e) {
  let Probabilidad=document.getElementById('Probabilidad').value;
  let Celda;

  for (let i = 1; i <= 2; i++) {
    for (let j = 1; j <= 4; j++) {

      let n = numero_random(Probabilidad);

      //si es 1, hay marca
      if(n == 1){
        let coordenada;

        //fila 1 = A
        if(i == 1){
          Celda=document.getElementById('A'+j);

        //fila 2 = B
        }else if(i == 2){
          Celda=document.getElementById('B'+j);
        }
        Celda.classList.add("fa-circle");

        //no funciona
        setTimeout(function(){
          Celda.classList.remove("fa-circle");
        }, 3000);
      }
    }
  }
});

function numero_random(Probabilidad){
  let n = Math.random();
  if(n<Probabilidad){
    n = Math.floor(n); //redondeo hacia abajo
  }else{
    n = Math.ceil(n); //redondeo hacia arriba
  }

  return n;
}
