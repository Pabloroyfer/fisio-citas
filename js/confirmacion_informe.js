function confirmacion_informe(e){
    if (confirm("¿Está seguro que desea subir el informe?")){
        return true;
    }
    else{
        e.preventDefault();
    }
}

let linkInf = document.querySelector(".inf");
console.log(linkInf);
    linkInf.addEventListener('click', confirmacion_informe);