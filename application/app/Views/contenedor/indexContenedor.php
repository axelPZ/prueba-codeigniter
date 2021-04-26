
<?php echo view('cabecera/cabecera');?>
<script>
    $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-9 position-relative ps-4">
        <div class="contenedor bg-warning rounded-bottom p-2 text-white text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-calendar2-check" viewBox="0 0 16 16">
                <path d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
                </svg>
                <div class="listado-contenedor d-none rounded shadow p-2">
                    <div class="cabecera-listado">
                        <div class="select mt-2">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option  value='0' selected>Seleccione el puerto</option>
                                <?php foreach($datos['puertos'] as $puerto):?>
                                    <option value="<?php echo $puerto->aero_id?>"><?php echo $puerto->aero_nombre?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div class="fechaSalidad text-dark">
                            <h6>Fecha Tentativa Entrega:</h6>
                            <p><input class='shadow border rounded' type="text" id="datepicker"></p>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Tamanio</td>
                                <td>Cantidad</td>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody> 
                    </table>
                    <div class="spinner-grow d-none" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="btn-group mb-1" role="group" aria-label="Basic outlined example">

                        <form action="<?php echo base_url()?>/application/EnvioController/addEnvio" id='form' method='POST'>
                            <input type='hidden' id='productosContenedor' name='articulos'>
                            <input type='hidden' id='fechaTentativa' name='fechaTentativa'>
                            <input type='hidden' id='idPuerto' name='idPuerto'>

                            <button type="submit" class="btn btn-warning btn-agregarContenedor text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                </svg>
                                Agrear Envio
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tabla lista-contenedores">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Cantidad</td>
                                <td>Tamanio</td>
                                <td>Estatus</td>
                                <td>Ver Detalles</td>
                                <td>Agregar</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($datos['contenedores'] as $contenedor):?>
                            <tr>
                                <th class='id'><?php echo $contenedor->cont_id;?></th>
                                <th class='cantidad'><?php echo $contenedor->cont_cantidad;?></th>
                                <th  class='tamanio'><?php echo $contenedor->cont_tamanio;?></th>
                                <th>
                                    <?php if($contenedor->cont_estatus == 0):?>
                                        <h6 class='bg-danger p-2 d-inline rounded'> NO ENVIADO</h6>
                                    <?php elseif($contenedor->cont_estatus == 1):?>
                                        <h6 class='bg-warning p-2 d-inline rounded'> ENVIADO</h6>
                                    <?php else :?>
                                        <h6 class='bg-info p-2 d-inline rounded'> ENTREGADO</h6>
                                    <?php endif; ?>
                                </th>
                                <th> 
                                    <a class="btn btn-outline-info" href="<?php echo base_url()?>/application/ContenedorController/detalleContenedor?id=<?php echo $contenedor->cont_id?>" role="button">Detalles</a>
                                </th>
                                    <?php if($contenedor->cont_estatus == 0):?>
                                        <th> 
                                            <button type="button" class="btn btn-outline-warning btn-agregar">Agregar A envio</button>
                                        </th>
                                    <?php else:?>
                                        <th></th>
                                    <?php endif;?>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>/application/public/js/contenedor/app.js"></script>
<?php echo view('footer/footer');?>