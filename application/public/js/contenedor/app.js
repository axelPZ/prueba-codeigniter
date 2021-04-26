
//variables
const imgContenedor = document.querySelector('.contenedor svg');
const contenedor = document.querySelector('.contenedor');
const lista = document.querySelector('.contenedor .listado-contenedor');
const listadoContenedor = document.querySelector('.lista-contenedores');
const btnAgregarContenedor = document.querySelector('.btn-agregarContenedor');
const form = document.querySelector('#form');

const contenedores = document.querySelector('#productosContenedor');
const fecha = document.querySelector('#fechaTentativa');
const idPuerto = document.querySelector('#idPuerto');

let contenedoresEnvio = [];

eventListener()

//agregar el evento

function eventListener(){

    //mostrar el contenedor
    imgContenedor.addEventListener('click',mostrarContenedor);

    //agregar producto al contenedor
    listadoContenedor.addEventListener('click',addContenedor);

    //Agregar envio
    form.addEventListener('submit',agregarEnvio);

    //borrar producto
    lista.addEventListener('click',eliminarContenedor);
}


//mostrar el contenedor
function agregarEnvio(e){
   
    if(contenedoresEnvio.length <= 0){
        swal("Error!", "Agrega al envio un contenedor!", "error");
        e.preventDefault();

    }else{
            //datos enviar
            const select = document.querySelector('.select select');
            const fechaTentativa = document.querySelector('#datepicker').value;

            if(select.value == 0 || fechaTentativa.length ===0)
            { e.preventDefault();
                swal("Error!", "Por favor seleccione un puerto e ingrese un fecha!", "error");
            }else{

                contenedores.value=JSON.stringify(contenedoresEnvio);
                fecha.value=fechaTentativa;
                idPuerto.value = select.value;
            }
    }

    console.log(select);
    console.log(fechaTentativa.length);
   

}


//eliminar contenedor
function eliminarContenedor(e){
    if(e.target.classList.contains('btn-borrarProducto')){

        e.preventDefault();

        swal({
            title: "Eliminar producto?",
            text: `Estas seguro de quitar el contenedor de la lista de envios!`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal(`el contenedor a sido eliminado del envio!`, 
                {
                    icon: "success",
                });
    
                //eliminar articulo del carrito
                const idContenedor = e.target.getAttribute('data-id');
                contenedoresEnvio = contenedoresEnvio.filter(contenedor => contenedor.id !== idContenedor);
                agregarHTML();
        
            } else {
              swal("No se a quitado tu producto del carrito!");
            }
          });
    }
}

//funcion agregar al contenedor
function addContenedor(e){

    if(e.target.classList.contains('btn-agregar'))
    {
        leerDatos(e.target.parentElement.parentElement)
    }
    
}

//funcion de leer los datos que me enviar
function leerDatos(contenedor){
    const id = contenedor.querySelector('.id').innerHTML;
    const cantidad = contenedor.querySelector('.cantidad').innerHTML;
    const tamanio = contenedor.querySelector('.tamanio').innerHTML;

    const infoProducto = {
        id,
        cantidad,
        tamanio
    }

    const exist = contenedoresEnvio.some(contenedor => contenedor.id === infoProducto.id);

    if(exist){
        swal("Error!", "Contenedor ya agregado!", "error");
    }else {
        swal("Correct!", "Contenedor agregado!", "success");
        contenedoresEnvio = [...contenedoresEnvio,infoProducto];
        agregarHTML();
    }
}

//mostrar datos en el envio
function agregarHTML(){

    vaciarHTML();

    const tabla = lista.querySelector('table tbody');
    
    contenedoresEnvio.forEach(contenedor =>
        {
            const {id, tamanio, cantidad } = contenedor;

            
            const fila = document.createElement('tr');
            fila.innerHTML = `

                <td> ${id}</td>
                <td> ${cantidad}</td>  
                <td> ${cantidad}</td>
                <td> <a href="#" class="btn-borrarProducto rounded-circle" data-id="${id}">X</a></td> 
            `;
           tabla.appendChild(fila);
       });
}


//vaciar el HTML 
function vaciarHTML(){
    const tabla = lista.querySelector('table tbody');

    while(tabla.firstChild){
        tabla.removeChild(tabla.firstChild);
    }
}

function mostrarContenedor(){

    if(lista.classList.contains('d-none')){
        lista.classList.remove('d-none');
    }else{
        lista.classList.add('d-none');
    }
}