/*** BARRA DE MENU ***/

const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");

navToggle.addEventListener("click", ()=>{
    navMenu.classList.toggle("nav-menu_visible");
});


/*** HORAS DISPONIBLES */

const num = document.querySelectorAll(".num");

const lun = document.querySelector(".lun");
const mar = document.querySelector(".mar");
const mier = document.querySelector(".mier");
const jue = document.querySelector(".jue");
const vie = document.querySelector(".vie");
const sab = document.querySelector(".sab");
const dom = document.querySelector(".dom");


const disponibles= document.querySelectorAll(".disponibles");
console.log(num, lun, mar, disponibles);


/*disponibles[0].id=1;
disponibles[1].id=2;
disponibles[2].id=3;
disponibles[3].id=4;*/


num[0].addEventListener("click", ()=>{
    lun.style.display = "block";
    if((mar.style.display="block") || (mier.style.display="block")
        || (jue.style.display="block") || (vie.style.display="block")){
        mar.style.display="none";
        mier.style.display="none";
        jue.style.display="none";
        vie.style.display="none";
    }
})
num[1].addEventListener("click", ()=>{
    mar.style.display = "block";
    if((lun.style.display="block") || (mier.style.display="block")
    || (jue.style.display="block") || (vie.style.display="block")){
    lun.style.display="none";
    mier.style.display="none";
    jue.style.display="none";
    vie.style.display="none";
}
})
num[2].addEventListener("click", ()=>{
    mier.style.display = "block";
    if((mier.style.display="block") || (mier.style.display="block")
    || (jue.style.display="block") || (vie.style.display="block")){
    mar.style.display="none";
    lun.style.display="none";
    jue.style.display="none";
    vie.style.display="none";
}
})
num[3].addEventListener("click", ()=>{
    jue.style.display = "block";
    if((mar.style.display="block") || (mier.style.display="block")
    || (lun.style.display="block") || (vie.style.display="block")){
    mar.style.display="none";
    mier.style.display="none";
    lun.style.display="none";
    vie.style.display="none";
}
})
num[4].addEventListener("click", ()=>{
    vie.style.display = "block";
    if((mar.style.display="block") || (mier.style.display="block")
    || (jue.style.display="block") || (lun.style.display="block")){
    mar.style.display="none";
    mier.style.display="none";
    jue.style.display="none";
    lun.style.display="none";
}
})

const seleccion = document.querySelectorAll('.seleccion');
seleccion[0].value=1;
seleccion[1].value=2;
seleccion[2].value=3;



disponibles[0].addEventListener("click", ()=>{
    alert("ey");
    disponibles[0].remove();
})