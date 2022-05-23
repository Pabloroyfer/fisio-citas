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

//console.log(num, lun, mar);


//Abrir las horas
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

//seleccion del dia lunes para cambiar su value
const seleccionL = document.querySelectorAll('.seleccionL');
/*seleccionL.forEach(element => {
    seleccionL[0].value="09:00 horas";
    console.log(element, seleccionL);
});*/
seleccionL[0].value="09:00 horas";
seleccionL[1].value="10:00 horas";
seleccionL[2].value="11:00 horas";
console.log(seleccionL);

//seleccion del dia martes para cambiar su value
const seleccionM = document.querySelectorAll('.seleccionM');
seleccionM[0].value="09:00 horas";
seleccionM[1].value="10:00 horas";
//console.log(seleccionM);

//seleccion del dia miercoles para cambiar su value
const seleccionMi = document.querySelectorAll('.seleccionMi');
seleccionMi[0].value="11:00 horas";
seleccionMi[1].value="12:00 horas";
seleccionMi[2].value="13:00 horas";
//console.log(seleccionMi);

//seleccion del dia jueves para cambiar su value
const seleccionJ = document.querySelectorAll('.seleccionJ');
seleccionJ[0].value="09:00 horas";
//console.log(seleccionJ);

//seleccion del dia viernes para cambiar su value
const seleccionV = document.querySelectorAll('.seleccionV');
seleccionV[0].value="09:00 horas";
seleccionV[1].value="12:00 horas";
//console.log(seleccionV);


/*function pepita(){
    let x= document.getElementById("pepita");
    alert("ey");
    x.style.opacity=0;
}*/

//
//const submit1= document.querySelectorAll('.enviar');
//console.log(submit1);
//submit1[0].addEventListener("click", ()=>{
//   alert("ey tronco");
//   seleccionL[2].visibility= "hidden";
//})