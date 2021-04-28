
<?php echo view('cabecera/cabecera');?>
<div class="containner-fluid">
        <div class="row justify-content-center">
            <div class="col-9 d-flex justify-content-center my-4 ">  
                <div class="imgDetalleProducto shadow" style="width: 55rem;">
                    <div class="card mb-3">
                        <img  src="<?php echo base_url().'/application/public/img/default/envios.jpg'?>" class="rounded mx-auto d-block img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">No.<?php echo $datos['envio'][0]->env_id?></h5>
                            <p class="card-text"><small class="text-muted">Usuario: <?php echo $datos['envio'][0]->usu_nombre ." ".$datos['envio'][0]->usu_apellido?></small></p>
                            <p class="card-text"><small class="text-muted">Puerto: <?php echo $datos['envio'][0]->aero_nombre?></small></p>

                            <p class="card-text"><small class="text-muted">Estado: <?php echo ($datos['envio'][0]->env_estatus === '0' )? 'PENDIENTE': 'ENTREGADO'?></small></p>
                            <p class="card-text"><small class="text-muted">fecha Tentativa <?php echo $datos['envio'][0]->env_fechaTentativa?></small></p>
                            <p class="card-text"><small class="text-muted">fecha Salida <?php echo $datos['envio'][0]->env_fecha?></small></p>
                            <p class="card-text"><small class="text-muted">Fecha Entrega: <span class='text-danger'><b><?php echo ($datos['envio'][0]->env_estatus === '0' )? 'NO ENTREGADO' : $datos['envio'][0]->env_fechaEntrega?></b></span></small></p>

                            <?php if($datos['envio'][0]->env_estatus === '0'):?>
                                <a class="btn btn-primary" href="<?php echo base_url()?>/application/EnvioController/updateEnvio?id=<?php echo $datos['envio'][0]->env_id?>" role="button">Marcar como recibido</a>
                            <?php endif ?>
                            
                        </div>
                            <u class="list-group list-group-flush">
                                <li  class="list-group-item text-center bg-primary">
                                    <h5 class="card-title text-white"><b>Contenedores del envio</b></h5>
                                </li>
                            </u>
                            <?php foreach($datos['detalles'] as $detalle):?>

                            <u class="list-group list-group-flush">
                                <li  class="list-group-item">
                                    <h6 class="card-text"><b>Contenedor No. <?php echo $detalle->cont_id?></b></h6>
                                </li>
                            </u>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Cantidad de productos #.<?php echo $detalle->cont_cantidad?>
                                </li>
                                <li class="list-group-item">
                                    Tamanio del contenedor <?php echo $detalle->cont_tamanio?>
                                </li>
                                <li class="list-group-item">
                                     <a class="btn btn-primary" href="<?php echo base_url()?>/application/ContenedorController/detalleContenedor?id=<?php echo $detalle->cont_id?>" role="button">Ver detalles del contenedor</a>
                                </li>
                            </ul>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>    
    </div>

<?php echo view('footer/footer');?>