
<?php echo view('cabecera/cabecera');?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-9">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Usuario</th>
                        <th>Puerto</th>
                        <th>FechaTentativa</th>
                        <th>Fecha entrega</th>
                        <th>Fecha salida</th>
                        <th>Estatus</th>
                        <th></th>
                    </tr>
                </thead>
                <?php foreach($envios as $envio):?>
                    <tr>
                        <td><?php echo $envio->env_id?></td>
                        <td><?php echo $envio->usu_nombre." ".$envio->usu_apellido ?> </td>
                        <td><?php echo $envio->aero_nombre?></td>
                        <td><?php echo $envio->env_fechaTentativa?></td>
                        <td><?php echo $envio->env_fechaEntrega?></td>
                        <td><?php echo $envio->env_fecha?></td>
                        <td><?php echo ($envio->env_estatus == 0 )? 'ENCAMINO': 'ENTREGADO'?></td>
                    </tr>
                
                <?php endforeach;?>
            </table>
        </div>
    </div>
</div>
<?php echo view('footer/footer');?>