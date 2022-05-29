/*** BARRA DE MENU ***/

const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");

navToggle.addEventListener("click", ()=>{
    navMenu.classList.toggle("nav-menu_visible");
});

/*** FISIOS */
const fisio= document.querySelectorAll(".pedir_cita");
const cale= document.querySelectorAll(".calendario");
const cierreCale = document.querySelectorAll('.cierreCale');
console.log(fisio, cale);
fisio[0].addEventListener("click", ()=>{
    if(cale[0].style.display="none"){
        cale[0].style.display="block";
        if(cale[1].style.display="block"){
            cale[1].style.display="none";
        }
    }
})
fisio[1].addEventListener("click", ()=>{
    if(cale[1].style.display="none"){
        cale[1].style.display="block";
        if(cale[0].style.display="block"){
            cale[0].style.display="none";
        }
    }
})
cierreCale[0].addEventListener("click", ()=>{
    cale[0].style.display="none";
})
cierreCale[1].addEventListener("click", ()=>{
    cale[1].style.display="none";
})

/*** HORAS DISPONIBLES */

const num = document.querySelectorAll(".num");
//console.log(num);

const lun = document.querySelectorAll(".lun");
const mar = document.querySelectorAll(".mar");
const mier = document.querySelectorAll(".mier");
const jue = document.querySelectorAll(".jue");
const vie = document.querySelectorAll(".vie");
const sab = document.querySelectorAll(".sab");
const dom = document.querySelectorAll(".dom");

//console.log(num, lun, mar);


//Abrir las horas primer fisio
num[0].addEventListener("click", ()=>{
    lun[0].style.display = "block";
    if((mar[0].style.display="block") || (mier[0].style.display="block")
        || (jue[0].style.display="block") || (vie[0].style.display="block")){
        mar[0].style.display="none";
        mier[0].style.display="none";
        jue[0].style.display="none";
        vie[0].style.display="none";
    }
})
num[1].addEventListener("click", ()=>{
    mar[0].style.display = "block";
    if((lun[0].style.display="block") || (mier[0].style.display="block")
    || (jue[0].style.display="block") || (vie[0].style.display="block")){
    lun[0].style.display="none";
    mier[0].style.display="none";
    jue[0].style.display="none";
    vie[0].style.display="none";
}
})
num[2].addEventListener("click", ()=>{
    mier[0].style.display = "block";
    if((mier[0].style.display="block") || (mier[0].style.display="block")
    || (jue[0].style.display="block") || (vie[0].style.display="block")){
    mar[0].style.display="none";
    lun[0].style.display="none";
    jue[0].style.display="none";
    vie[0].style.display="none";
}
})
num[3].addEventListener("click", ()=>{
    jue[0].style.display = "block";
    if((mar[0].style.display="block") || (mier[0].style.display="block")
    || (lun[0].style.display="block") || (vie[0].style.display="block")){
    mar[0].style.display="none";
    mier[0].style.display="none";
    lun[0].style.display="none";
    vie[0].style.display="none";
}
})
num[4].addEventListener("click", ()=>{
    vie[0].style.display = "block";
    if((mar[0].style.display="block") || (mier[0].style.display="block")
    || (jue[0].style.display="block") || (lun[0].style.display="block")){
    mar[0].style.display="none";
    mier[0].style.display="none";
    jue[0].style.display="none";
    lun[0].style.display="none";
}
})

//Abrir las horas segundo fisio
num[7].addEventListener("click", ()=>{
    lun[1].style.display = "block";
    if((mar[1].style.display="block") || (mier[1].style.display="block")
        || (jue[1].style.display="block") || (vie[1].style.display="block")){
        mar[1].style.display="none";
        mier[1].style.display="none";
        jue[1].style.display="none";
        vie[1].style.display="none";
    }
})
num[8].addEventListener("click", ()=>{
    mar[1].style.display = "block";
    if((lun[1].style.display="block") || (mier[1].style.display="block")
    || (jue[1].style.display="block") || (vie[1].style.display="block")){
    lun[1].style.display="none";
    mier[1].style.display="none";
    jue[1].style.display="none";
    vie[1].style.display="none";
}
})
num[9].addEventListener("click", ()=>{
    mier[1].style.display = "block";
    if((mier[1].style.display="block") || (mier[1].style.display="block")
    || (jue[1].style.display="block") || (vie[1].style.display="block")){
    mar[1].style.display="none";
    lun[1].style.display="none";
    jue[1].style.display="none";
    vie[1].style.display="none";
}
})
num[10].addEventListener("click", ()=>{
    jue[1].style.display = "block";
    if((mar[1].style.display="block") || (mier[1].style.display="block")
    || (lun[1].style.display="block") || (vie[1].style.display="block")){
    mar[1].style.display="none";
    mier[1].style.display="none";
    lun[1].style.display="none";
    vie[1].style.display="none";
}
})
num[11].addEventListener("click", ()=>{
    vie[1].style.display = "block";
    if((mar[1].style.display="block") || (mier[1].style.display="block")
    || (jue[1].style.display="block") || (lun[1].style.display="block")){
    mar[1].style.display="none";
    mier[1].style.display="none";
    jue[1].style.display="none";
    lun[1].style.display="none";
}
})

// MIS INFORMES

const muestra = document.querySelectorAll('.info_muestra');
const info = document.querySelectorAll('.gestion_informes');
const cierreInfo = document.querySelectorAll(".cierreInfo");


console.log(info, muestra);
console.log(typeof info);

    info[0].addEventListener("click", ()=>{
        //alert("ey");
        muestra[0].style.display="flex";
    })
    cierreInfo[0].addEventListener("click",()=>{
        muestra[0].style.display = "none";
    })
    info[1].addEventListener("click", ()=>{
        //alert("ey");
        muestra[1].style.display="flex";
    })
    cierreInfo[1].addEventListener("click",()=>{
        muestra[1].style.display = "none";
    })
    info[2].addEventListener("click", ()=>{
        //alert("ey");
        muestra[2].style.display="flex";
    })
    cierreInfo[2].addEventListener("click",()=>{
        muestra[1].style.display = "none";
    })


