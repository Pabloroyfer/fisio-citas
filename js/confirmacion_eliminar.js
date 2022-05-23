function confirmacion(e){
    if (confirm("¿Está seguro que desea eliminar la cita?")){
        return true;
    }
    else{
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".link");
for (var i=0; i<linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}