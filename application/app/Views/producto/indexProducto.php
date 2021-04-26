
<?php echo view('cabecera/cabecera');?>
<div class="container-fluid">
    <div class="row justify-content-center py-4 producto">
        <div class="col-9">
            <div class="contenedor bg-warning rounded-bottom p-2 text-white text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg>
                <div class="listado-contenedor d-none rounded shadow p-2">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Nombre</td>
                                <td>SKU</td>
                                <td>Unidades</td>
                                <td>Proveedor</td>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody> 
                    </table>
                    <div class="spinner-grow d-none" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="btn-group mb-1" role="group" aria-label="Basic outlined example">

                        <form action="<?php echo base_url()?>/application/ContenedorController/addContenedor" method='POST'>
                            <input type='hidden' id='ProductosContenedor' name='articulos'>

                            <button type="submit" class="btn btn-warning btn-agregarContenedor text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                </svg>
                                Agregar al Contenedor
                            </button>

                        </form>
                   
                    <button type="button" class="btn btn-success btn-vaciarCarrito text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clipboard-x" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z"/>
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                        </svg>
                        Vaciar contenedor
                    </button>
                </div>
                </div>
            </div>
            <div class="tabla listado-productos">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Nombre</td>
                                <td>Pre. Compra</td>
                                <td>SKU</td>
                                <td>Pre. Venta</td>
                                <td>Volumen</td>
                                <td>Proveedor</td>
                                <td>Unidades</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($productos as $producto):?>
                            <tr>
                                <th class='id'><?php echo $producto->prod_id;?></th>
                                <th class='nombre'><?php echo $producto->prod_nombre;?></th>
                                <th class='compra'><?php echo $producto->prec_compra;?></th>
                                <th class='sku'><?php echo $producto->prod_sku;?></th>
                                <th class='venta'><?php echo $producto->prec_venta;?></th>
                                <th class='cantidad'><?php echo $producto->prec_cantidad;?></th>
                                <th class='prov'><?php echo $producto->prov_nombre;?></th>
                                <th><?php echo $producto->prod_unidades;?></th>
                                <th class='d-none idPreci'><?php echo $producto->prec_id;?></th>                                
                                <th> 
                                    <a class="btn btn-outline-warning" href="<?php echo base_url()?>/application/ProductosController/detalleProducto?id=<?php echo $producto->prod_id?>" role="button">Detalles</a>
                                </th>
                                <th>
                                    <button type="button" class="btn btn-outline-info btn-agregar">Agregar</button>
                                </th>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>/application/public/js/producto/app.js"></script>
<?php echo view('footer/footer');?>