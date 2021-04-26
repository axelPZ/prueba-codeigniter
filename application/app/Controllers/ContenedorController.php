<?php

namespace App\Controllers;
use App\Models\contenedorModel;
use App\Models\detalleCargaModel;
use App\Models\preciosModel;
use App\Models\puertoModel;
class ContenedorController extends BaseController
{
    public function __construct()
    {
        $this->model= new ContenedorModel();
        $this->carga = new DetalleCargaModel();
        $this->precios = new PreciosModel();
        $this->puerto = new PuertoModel();
    }

    public function indexContenedor()
	{
        $contenedores = $this->model->getAll();
        $puertos = $this->puerto->getAll();

        $respuesta = [
            'contenedores'=>$contenedores,
            'puertos' => $puertos
        ];
        $data = ['datos'=> $respuesta];
		return view('contenedor/indexcontenedor',$data);
	}

    public function addContenedor()
    {
        $info = json_decode($_POST['articulos']);

        $cantidad=0;
        foreach($info as $i){ 
            $cantidad +=$i->cantidad;
        }

        //datos del contenedor
        $this->model->cont_cantidad = $cantidad;
        $this->model->cont_tamanio = '35"';
        $this->model->add();

        //datos del detalle de la carga
        $this->carga->car_idContenedor = $this->model->getMaxId()[0]->idMax;
        $this->carga->car_fecha = ''.date("Y-m-d");

        foreach($info as $producto){

            $this->carga->car_idPrecios = $producto->idPrecio;
            $this->carga->car_cantidad = $producto->cantidad;
            $this->carga->add();

            //editar los productos cargados
            $this->precios->prec_id=$producto->idPrecio;
            $this->precios->updateCantidad($producto->cantidad);
        }

        $contenedores = $this->model->getAll();
        $puertos = $this->puerto->getAll();

        $respuesta = [
            'contenedores'=>$contenedores,
            'puertos' => $puertos
        ];
        $data = ['datos'=> $respuesta];
		return view('contenedor/indexcontenedor',$data);
    }

    public function detalleContenedor(){

        $idcontenedor = trim($_REQUEST['id']);

        //traer el contenedor
        $this->model->cont_id = $idcontenedor;
        $contenedor = $this->model->getById();

        //traer los detalles
        $this->carga->car_idContenedor =$idcontenedor;
        $detalles = $this->carga->getDetalle();

       
        $datos =[
            'contenedor' => $contenedor,
            'detalles' => $detalles
        ];

        $data = ['datos'=> $datos];
        return view('contenedor/detalleContenedor',$data);
    }
}
?>