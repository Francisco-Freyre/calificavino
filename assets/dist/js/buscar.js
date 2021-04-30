const inputBuscar = document.querySelector('#buscar');

function eventListeners(){
    if(inputBuscar){
        inputBuscar.addEventListener('input', buscarCatas);
    }
}

eventListeners();

function buscarCatas(e){
    const expresion = new RegExp(e.target.value, "i"),
        registros = document.querySelectorAll('tbody tr');

    registros.forEach(registro =>{
        registro.style.display = 'none';
        if(registro.childNodes[3].childNodes[0].textContent.replace(/\s/g, " ").search(expresion) != -1){
            registro.style.display = 'table-row';
        }
    });
}