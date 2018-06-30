"use strict";
//Traigo el botón Empezar
let Jugar= document.getElementById('Jugar');
//Traigo el botón Enviar Elección
let Eleccion= document.getElementById('EnviarEleccion');

//Variables globales
let CantMarcas= 0;
let Marcas= [false,false,false,false,false,false,false,false];
let EnPartida= false;
let NumPartida= 0;
//Fila de la tabla Resultados
let Fila= 0;
let Aciertos= 0;
let Errores= 0;

//Creo evento de empezar partida
Jugar.addEventListener('click', function(e) {
//Si no estoy jugando, juego
  if (!EnPartida) {
    EnPartida= true;
    NumPartida++;
    //Traigo la tabla de resultados (El TBody)
    let TablaResultados= document.getElementById('ResultadosBody');
    //Agrego la fila
    let Row= TablaResultados.insertRow(Fila);
    // Agrego las columnas de la fila
    let Cell1 = Row.insertCell(0);
    let Cell2 = Row.insertCell(1);
    let Cell3 = Row.insertCell(2);
    Cell1.innerHTML=NumPartida;
    Cell2.innerHTML=0;
    Cell3.innerHTML=0;
    Cell2.id= Fila+'0';
    Cell3.id= Fila+'1';
    Fila++;
    //Traigo el valor de la probabilidad indicada
    let Probabilidad=document.getElementById('Probabilidad').value;
    let Casillero;
    //Recorro todos los casilleros, por cada casillero veo si tiene marca o no
    for (let j = 1; j <= 8; j++) {
      let n = numero_random(Probabilidad);
      //Si es 1, hay marca
      if(n == 1){
        //Traigo el casillero y muestro la marca
        Casillero=document.getElementById(j);
        Marcas[j-1]= true;
        Casillero.classList.add("fa-circle");
        CantMarcas++;
      }
    }
    //Si no hay marca en el primero, pongo la marca.
    // if (Marcas[0]==false){
    //   Casillero=document.getElementById(1);
    //   Marcas[0]= true;
    //   Casillero.classList.add("fa-circle");
    //   CantMarcas++;
    // }
    //Traigo el valor del input del tiempo
    let Milisegundos= document.getElementById('Timer').value;
    //Luego de un tiempo, oculto las marcas, luego de "Milisegundos(cantidad)" milisegundos
    setTimeout(function(){
      let Casilleros = document.getElementsByClassName('fa');
      for (let i = 0; i < Casilleros.length; i++) {
        Casilleros[i].classList.remove('fa-circle');
      }
    }, Milisegundos);
  }
});

function numero_random(Probabilidad){
  let n = Math.random();
  if(n>Probabilidad){
    n = Math.floor(n); //redondeo hacia abajo
  }else{
    n = Math.ceil(n); //redondeo hacia arriba
  }
  return n;
}

//Creo evento de elegir el casillero y se lo asigno al botón
Eleccion.addEventListener('click', function(e){
  if (EnPartida) {
    //Leo el valor del input "Elegir casillero"
    let valor_imput = document.getElementById('Eleccion').value;
    //Si en mi elección hay marca (Me fijo en el arreglo Marcas)
    if (Marcas[valor_imput-1] == true){
      CantMarcas--;
      Aciertos++;
      //El 0 es por la columna aciertos, es Fila - 1 porque yo arriba hago Fila++ y el contador sube. Pero yo el que quiero modificar es la fila anterior
      let id= (Fila-1) + '0';
      //Actualizo la tabla "Resultados"
      let aciertos = document.getElementById(id);
      aciertos.innerText = Aciertos;
    }else{
      Errores++;
      //El 1 es por la columna aciertos, es Fila - 1 porque yo arriba hago Fila++ y el contador sube. Pero yo el que quiero modificar es la fila anterior
      let id= (Fila-1) + '1';
      //Actualizo la tabla "Resultados"
      let errores = document.getElementById(id);
      errores.innerText=Errores;
    }
    TerminarPartida();
  }
});

//Me fijo si estoy en condiciones de terminar la partida, si ya gané
function TerminarPartida() {
  //Si gané, reseteo el juego (vuelvo las variables a 0)
  if (CantMarcas == 0){
    //Traigo todos los casilleros (Es un arreglo)
    let Casilleros = document.getElementsByClassName('fa');
    //Recorro los casilleros
    for (let i = 0; i < Casilleros.length; i++) {
      //A todos les quito la marca, uno a uno
      Casilleros[i].classList.remove('fa-circle');
      Marcas[i] = false;
    }
    EnPartida = false;
    Aciertos = 0;
    Errores = 0;

    //Luego de 0.5 segundos, muestro el cartel de fin de partida
    setTimeout(function(){
      alert('Fin de la partida');
    }, 500);
  }
}
