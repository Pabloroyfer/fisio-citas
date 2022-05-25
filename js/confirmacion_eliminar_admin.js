function confirmacion_admin(e){
    if (confirm("¿Está seguro que desea eliminar la cita?")){
        return true;
    }
    else{
        e.preventDefault();
    }
}

let linkBorrar = document.querySelectorAll(".cita_admin");
for (var i=0; i<linkBorrar.length; i++){
    linkBorrar[i].addEventListener('click', confirmacion_admin);
}