
//variables
const imgContenedor = document.querySelector('.contenedor svg');
const contenedor = document.querySelector('.contenedor');
const listadoContenedor = document.querySelector('.contenedor .listado-contenedor');
const listadoProductos = document.querySelector('.listado-productos');
const btnVaciarCarrito = document.querySelector('.btn-vaciarCarrito');
const btnAgregarContenedor = document.querySelector('.btn-agregarContenedor');
let productosContenedor = [];

eventListener()

//agregar el evento

function eventListener(){

    //mostrar el contenedor
    imgContenedor.addEventListener('click',mostrarContenedor);

    //agregar producto al contenedor
    listadoProductos.addEventListener('click',addProducto);

    //vaciar el contenedor
    btnVaciarCarrito.addEventListener('click',borrarContenedor);

    //agregar al contenedor
    btnAgregarContenedor.addEventListener('click',agregarContenedor);

    //borrar producto
    listadoContenedor.addEventListener('click',eliminarProducto);
}


//funciones
///agregar contenedor a la base de datos
function agregarContenedor(e){
    if(productosContenedor.length > 0){

        const productos = document.querySelector('#ProductosContenedor');
        productos.value=JSON.stringify(productosContenedor);
        vaciarHTML();
        articulosCarrito = [];

    }else{
        e.preventDefault();
        alert('Agrega un producto al contededor');
    }
}
//borrar el contenedor
function borrarContenedor(){
    swal({
        title: "Vaciar Contenedor?",
        text: "Estas seguro de vaciar el contenedor!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Tu contenedor a sido vaciado!", 
            {
                icon: "success",
            });

            //llamar la funcion para limpiar el carrito 
            vaciarHTML();
            productosContenedor=[];
            listadoContenedor.classList.add('d-none');

        } else {
          swal("Tu Contenedor no se a vaciado!");
        }
      });

}

//agregar producto
function addProducto(e){

    if(e.target.classList.contains('btn-agregar'))
    {
        leerDatos(e.target.parentElement.parentElement)
    }
}

//leer los datos del cotenedor
function leerDatos(producto){

    const idProducto = producto.querySelector('.id').innerHTML;
    const nombreProducto = producto.querySelector('.nombre').innerHTML;
    const skuProducto = producto.querySelector('.sku').innerHTML;
    const nombreProveedor = producto.querySelector('.prov').innerHTML;
    const precioVenta = parseInt(producto.querySelector('.venta').innerHTML);
    const precioCompra = parseInt(producto.querySelector('.compra').innerHTML);
    const idPrecio = producto.querySelector('.idPreci').innerHTML;
    const datoCantidad = producto.querySelector('.cantidad');
    const cantidadProducto =  parseInt(datoCantidad.innerHTML);

    let cantidad;

    swal("Agrega la cantidad:", {
        content: "input",
      })
      .then((value) => {

        if(parseInt(value)){

            cantidad=parseInt(value);
            total = cantidadProducto - cantidad;
            if(total >= 0){

                datoCantidad.innerHTML=total;
                //agregar datos JSON
                const infoProducto = {
                    id: idProducto,
                    nombre: nombreProducto,
                    sku: skuProducto,
                    proveedor: nombreProveedor,
                    cantidad: parseInt(value),
                    venta: precioVenta,
                    compra: precioCompra,
                    idPrecio: idPrecio
                }
                //verificar si el producto ya existe

                const exist = productosContenedor.some(producto => producto.id === infoProducto.id && producto.idPrecio === infoProducto.idPrecio);

                if(exist){
                   
                    const productos = productosContenedor.map(producto => {
                        if(producto.id === infoProducto.id)
                        {
                            producto.cantidad = producto.cantidad+infoProducto.cantidad;
                            producto.idPrecio = infoProducto.idPrecio;
                            return producto;
                        }else{
                            return producto;
                        }
                    });
                }else {
                    productosContenedor = [...productosContenedor,infoProducto];
                }
                swal("Agregado!", `Se a agregado ${nombreProducto}! al carrito`, "success");
                agregarHTML();
            }else
            {
                swal("Error!", "No hay suficientes productos!", "error");
            }
        }else
        {
            swal("Error!", "Solo se permiten numeros!", "error");
        }
      });

}

//mostrar datos en el carrito
function agregarHTML(){

    vaciarHTML();

    const tabla = listadoContenedor.querySelector('table tbody');
    
    productosContenedor.forEach(producto =>
        {
            const {id, nombre, proveedor, sku, cantidad } = producto;

            
            const fila = document.createElement('tr');
            fila.innerHTML = `

                <td> ${id}</td>
                <td> ${nombre}</td>  
                <td> ${sku}</td>  
                <td> ${cantidad}</td>  
                <td> ${proveedor}</td>
                <td> <a href="#" class="btn-borrarProducto rounded-circle" data-id="${id}">X</a></td> 
            `;
           
           tabla.appendChild(fila);
       });
}

//eliminar producto
function eliminarProducto(e){

    if(e.target.classList.contains('btn-borrarProducto')){

        e.preventDefault();

        swal({
            title: "Eliminar producto?",
            text: `Estas seguro de quitar, ${e.target.parentElement.parentElement.children[1].textContent}, del carrito!`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal(`${e.target.parentElement.parentElement.children[1].textContent} a sido eliminado del carrito!`, 
                {
                    icon: "success",
                });
    
                //eliminar articulo del carrito
                const idProduct = e.target.getAttribute('data-id');
                productosContenedor = productosContenedor.filter(product => product.id !== idProduct);
                agregarHTML();
        
            } else {
              swal("No se a quitado tu producto del carrito!");
            }
          });
    }
}



//vaciar el HTML 
function vaciarHTML(){
    const tabla = listadoContenedor.querySelector('table tbody');

    while(tabla.firstChild){
        tabla.removeChild(tabla.firstChild);
    }
}


//mostrar el contenedor
function mostrarContenedor(){

    if(listadoContenedor.classList.contains('d-none')){
        listadoContenedor.classList.remove('d-none');
    }else{
        listadoContenedor.classList.add('d-none');
    }
}

