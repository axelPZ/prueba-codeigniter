
//variables
const btnSpinner = document.querySelector('.mostrarSpinner');
const spinner = document.querySelector('.sk-chase');


eventListener();


//agregar el eventeto
function eventListener(){

    //mostrar espinner
    btnSpinner.addEventListener('click',mostrarSpinner);

     //se carge la pagina
     document.addEventListener('DOMContentLoaded', iniciarApp);
}

//funciones

//funcion de mostrar el espinner
function mostrarSpinner(){

    if(spinner.classList.contains('d-none')){
        spinner.classList.remove('d-none');
    }else{
        spinner.classList.add('d-none');
    }
}

//funcion al iniciar la app
function iniciarApp(){
    //mostrarSpinner();

}
