/*** BARRA DE MENU ***/

const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");

navToggle.addEventListener("click", ()=>{
    navMenu.classList.toggle("nav-menu_visible");
});

/*** MEDIDAS COVID ***/

const protocolo = document.querySelector('.protocolo');
const desplegable = document.querySelector('.desplegable');
console.log(protocolo, desplegable);

protocolo.addEventListener("click",() => {
    desplegable.style.display = "block";
})