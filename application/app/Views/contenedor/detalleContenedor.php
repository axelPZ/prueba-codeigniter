<?php echo view('cabecera/cabecera');?>

    <div class="containner-fluid">
        <div class="row justify-content-center">
            <div class="col-9 d-flex justify-content-center my-4 ">  
                <div class="imgDetalleProducto shadow" style="width: 55rem;">
                    <div class="card mb-3">
                        <img  src="<?php echo base_url().'/application/public/img/default/contenedor.jpg'?>" class="rounded mx-auto d-block" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Cantidad <?php echo $datos['contenedor'][0]->cont_cantidad?></h5>
                            <p class="card-text"><small class="text-muted">Contenedor No.: <?php echo $datos['contenedor'][0]->cont_id?></small></p>
                            
                            <?php if($datos['contenedor'][0]->cont_estatus == 0):?>
                                <h6 class='bg-danger p-2 d-inline'> NO ENVIADO</h6>

                            <?php elseif($datos['contenedor'][0]->cont_estatus == 1):?>
                                <h6 class='bg-warning p-2 d-inline'> ENVIADO</h6>

                            <?php else :?>
                                <h6 class='bg-info p-2 d-inline'> ENTREGADO</h6>
                            <?php endif; ?>

                        </div>
                            <u class="list-group list-group-flush">
                                <li  class="list-group-item text-center bg-primary">
                                    <h5 class="card-title text-white"><b>Informacion de los productos cargados</b></h5>
                                </li>
                            </u>
                            <?php foreach($datos['detalles'] as $detalle):?>
                                <u class="list-group list-group-flush">
                                    <li  class="list-group-item">
                                        <h6 class="card-text"><b> <?php echo $detalle->prov_nombre?></b></h6>
                                    </li>
                                </u>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        Nombre: Q.<?php echo $detalle-> prod_nombre?>
                                    </li>
                                    <li class="list-group-item">
                                        SKU: Q.<?php echo $detalle-> prod_sku?>
                                    </li>
                                    <li class="list-group-item">
                                        Precio de Venta Q.<?php echo $detalle->prec_venta?>
                                    </li>
                                    <li class="list-group-item">
                                        Precio de Compra Q.<?php echo $detalle->prec_compra?>
                                    </li>
                                    <li class="list-group-item">
                                        Cantidad #.<?php echo $detalle->car_cantidad?>
                                    </li>
                                </ul>
                            <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <?php //var_dump($datos);?>

<?php echo view('footer/footer');?>