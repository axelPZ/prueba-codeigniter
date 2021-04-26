
<?php echo view('cabecera/cabecera');?>

    <div class="containner-fluid">
        <div class="row justify-content-center">
            <div class="col-9 d-flex justify-content-center my-4 ">  
                <div class="imgDetalleProducto shadow" style="width: 55rem;">
                    <div class="card mb-3">
                        <img  src="<?php echo $datos['producto'][0]->prod_img?>" class="rounded mx-auto d-block" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $datos['producto'][0]->prod_nombre?></h5>
                            <p class="card-text"><small class="text-muted">Marca: <?php echo $datos['producto'][0]->prod_presentacion?></small></p>
                        </div>
                            <u class="list-group list-group-flush">
                                <li  class="list-group-item text-center bg-primary">
                                    <h5 class="card-title text-white"><b>Imformacion de los Proveedores</b></h5>
                                </li>
                            </u>
                            <?php foreach($datos['detalles'] as $detalle):?>

                            <u class="list-group list-group-flush">
                                <li  class="list-group-item">
                                    <h6 class="card-text"><b><?php echo $detalle->prov_nombre?></b></h6>
                                </li>
                            </u>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Precio de Venta Q.<?php echo $detalle->prec_venta?>
                                </li>
                                <li class="list-group-item">
                                    Precio de Compra Q.<?php echo $detalle->prec_compra?>
                                </li>
                                <li class="list-group-item">
                                    Cantidad #.<?php echo $detalle->prec_cantidad?>
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