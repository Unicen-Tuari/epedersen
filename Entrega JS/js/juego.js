"use strict";
let Jugar= document.getElementById('Jugar');
let Eleccion= document.getElementById('EnviarEleccion');

let CantMarcas= 0;
let Marcas= [false,false,false,false,false,false,false,false];
let EnPartida= false;
let NumPartida= 0;
let Fila= 0;
let Aciertos= 0;
let Errores= 0;

Jugar.addEventListener('click', function(e) {
  if (!EnPartida) {
    NumPartida++;
    let TablaResultados= document.getElementById('ResultadosBody');
    let Row= TablaResultados.insertRow(Fila);
    let Cell1 = Row.insertCell(0);
    let Cell2 = Row.insertCell(1);
    let Cell3 = Row.insertCell(2);
    Cell1.innerHTML=NumPartida;
    Cell2.innerHTML=0;
    Cell3.innerHTML=0;
    Cell2.id= Fila+'0';
    Cell3.id= Fila+'1';
    Fila++;
    let Probabilidad=document.getElementById('Probabilidad').value;
    let Celda;
    EnPartida= true;
    for (let j = 1; j <= 8; j++) {
      let n = numero_random(Probabilidad);
      //si es 1, hay marca
      if(n == 1){
        Celda=document.getElementById(j);
        Marcas[j-1]= true;
        Celda.classList.add("fa-circle");
        CantMarcas++;
      }
    }
    // if (Marcas[0]==false){
    //   Celda=document.getElementById(1);
    //   Marcas[0]= true;
    //   Celda.classList.add("fa-circle");
    //   CantMarcas++;
    // }

    let Milisegundos= document.getElementById('Timer').value;
    console.log(Milisegundos);
    setTimeout(function(){
      let Celdas = document.getElementsByClassName('fa');
      for (let i = 0; i < Celdas.length; i++) {
        Celdas[i].classList.remove('fa-circle');
      }
    }, Milisegundos);
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

Eleccion.addEventListener('click', function(e){
  if (EnPartida) {
    let valor_imput = document.getElementById('Eleccion').value;
    if (Marcas[valor_imput-1] == true){
      CantMarcas--;
      Aciertos++;
      let id= (Fila-1) + '0';
      let aciertos = document.getElementById(id);
      aciertos.innerText = Aciertos;
    }else{
      Errores++;
      let id= (Fila-1) + '1';
      let errores = document.getElementById(id);
      errores.innerText=Errores;
    }
    TerminarPartida();
  }
});

function TerminarPartida() {
  if (CantMarcas == 0){
    let Celdas = document.getElementsByClassName('fa');
    for (let i = 0; i < Celdas.length; i++) {
      Celdas[i].classList.remove('fa-circle');
      Marcas[i] = false;
    }
    EnPartida = false;
    Aciertos = 0;
    Errores = 0;

    setTimeout(function(){
      alert('Fin de la partida');
    }, 500);
  }
}
