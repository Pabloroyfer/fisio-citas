/*** SESION ***/

const cierreSesion = document.querySelector(".cierreSesion");
const inicio = document.querySelector(".inicio");
const desplegableSesion = document.querySelector(".desplegableSesion");
const sesion = document.querySelector(".sesion")
const nuevo = document.querySelector(".nuevo");
const registro = document.querySelector(".registro");

console.log(inicio, desplegableSesion, nuevo, cierreSesion, sesion);

inicio.addEventListener("click", ()=>{
    desplegableSesion.style.display="flex";
    desplegableSesion.style.height="200px";
    sesion.style.display="flex";
    if(registro.style.display="flex"){
        registro.style.display="none";
    }        
});
nuevo.addEventListener("click", ()=>{
    desplegableSesion.style.display="flex";
    desplegableSesion.style.height="250px";
    registro.style.display="flex";
    if(sesion.style.display="flex"){
        sesion.style.display="none";
    }
});
cierreSesion.addEventListener("click",()=>{
    if(registro.style.display="flex"){
        registro.style.display="none";
    }
    if(sesion.style.display="flex"){
        sesion.style.display="none";
    }
    desplegableSesion.style.display = "none";
})

/*** BARRA DE MENU ***/

const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");

navToggle.addEventListener("click", ()=>{
    navMenu.classList.toggle("nav-menu_visible");
});

/*** MEDIDAS COVID ***/

const protocolo = document.querySelector('.protocolo');
const desplegable = document.querySelector('.desplegableCovid');
const cierreCovid = document.querySelector(".cierreCovid");
console.log(protocolo, desplegable, cierreCovid);

protocolo.addEventListener("click",() => {
    desplegable.style.display = "block";
})
cierreCovid.addEventListener("click",()=>{
    desplegable.style.display = "none";
})