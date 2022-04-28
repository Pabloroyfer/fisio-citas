//DETAILS



// SLIDER GRID 

(function(){
    const sliders= [...document.querySelectorAll('.slider_body')]
    //console.log(sliders)
    const arrowNext = document.querySelector('#next');    
    const arrowBefore = document.querySelector('#before');
    
    let value;
    arrowNext.addEventListener('click', ()=>changePosition(1));
    arrowBefore.addEventListener('click', ()=>changePosition(-1));
    
    function changePosition(change){
        //console.log(change)
        const currentElement = Number(document.querySelector('.slider_body--show').dataset.id);
        value = currentElement;
        value += change;
        
        console.log(sliders.length)
        if( value === 0 || value == sliders.length +1){
            value = value === 0 ? sliders.length : 1;
        }
        
        sliders[currentElement-1].classList.toggle('slider_body--show');
        sliders[value-1].classList.toggle('slider_body--show');
    
    }

})();



//DETALLES

/*
function mostrarDetalle(){
    detalle.style.display = "block";
}
function ocultarDetalle(){
    detalle.style.display = "none";
}


imagen = document.querySelector('.imagen1');
console.log(imagen);
detalle = document.querySelector('#detalle');
console.log(detalle);
cruz = document.querySelector(".cierre");
console.log(cruz);
imagen.addEventListener("click", mostrarDetalle, false);
cruz.addEventListener('click', ocultarDetalle, false);*/

//Convierto lo anterior a una funcion
(function(){
  const imagen = document.querySelector('.imagen1');
  console.log(imagen);
  const detalle = document.querySelector('#detalle');
  console.log(detalle);
  const cruz = document.querySelector(".cierre");
  console.log(cruz);
  
  imagen.addEventListener('click', mostrarDetalle, false);
  cruz.addEventListener('click', ocultarDetalle, false);
  console.log(imagen, cruz);
  
  function mostrarDetalle(){
      detalle.style.display = "block";
      detalle.scrollIntoView({preventScroll:false, behavior: 'smooth', block:"start"});
  }
  function ocultarDetalle(){
      detalle.style.display = "none";
  }

})();