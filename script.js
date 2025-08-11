const InicioId=document.getElementById('InicioId'); //Id
const moverbtd=document.getElementById('moverbtd');
const moverbti=document.getElementById('moverbti');
const moverbtar=document.getElementById('moverbtar');
const moverbtab=document.getElementById('moverbtab');

let leftposition=0; // voy a declarar el moviemiento del cubo en pixeles


moverbtd.addEventListener('click',()=>{
    leftposition+= 100; //Va a mover el cubo 100 pixeles
    InicioId.style.left=leftposition+'px'
})
moverbti.addEventListener('click',()=>{
    leftposition-= 100; //Va a mover el cubo 100 pixeles
    InicioId.style.left=leftposition+'px'
})

let topposition=0; // 
moverbtar.addEventListener('click',()=>{
    topposition-= 50; //Va a mover el cubo 100 pixeles
    InicioId.style.top=topposition+'px'
})
moverbtab.addEventListener('click',()=>{
    topposition+= 50; //Va a mover el cubo 100 pixeles
    InicioId.style.top=topposition+'px'
})

// Cambio Colores
const $Luzp = document.querySelectorAll('.circulo');
console.log($Luzp)
let contadorLuzp = 0; // Ingresamos contador

const mostrarLuzp = () =>{ // Funcion flecha
    $Luzp[contadorLuzp].className = 'circulo'; // Ya se cambia el color 
    contadorLuzp++; 

    if(contadorLuzp > 4 ) contadorLuzp = 0; // Condicional un contador

    const luzpActual = $Luzp[contadorLuzp]; // Para que cambie los colores
    luzpActual.classList.add(luzpActual.getAttribute('color'))
}
setInterval(mostrarLuzp,2000) // Cambie cada cierto tiempo

