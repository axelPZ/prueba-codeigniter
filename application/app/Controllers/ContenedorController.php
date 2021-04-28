<?php

namespace App\Controllers;
use App\Models\contenedorModel;
use App\Models\detalleCargaModel;
//use App\Models\DetalleModel;
use App\Models\preciosModel;
use App\Models\puertoModel;
class ContenedorController extends BaseController
{
    // public function __construct()
    // {
    //     $this->model= new ContenedorModel();
    //     $this->carga = new DetalleCargaModel();
    //     $this->precios = new PreciosModel();
    //     $this->puerto = new PuertoModel();
    // }

    public function indexContenedor()
	{
        $contenedor  = new ContenedorModel();
        $puerto = new PuertoModel();
        $contenedores = $contenedor->getAll();
        $puertos = $puerto->getAll();

        //$contenedores = $this->model->getAll();
        //$puertos = $this->puerto->getAll();

        $respuesta = [
            'contenedores'=>$contenedores,
            'puertos' => $puertos
        ];
        $data = ['datos'=> $respuesta];
		return view('contenedor/indexcontenedor',$data);
	}

    public function addContenedor()
    {
        $contenedor  = new ContenedorModel();
        $puerto = new PuertoModel();
        $carga = new DetalleCargaModel();
        $precios = new preciosModel();
        
        $info = json_decode($_POST['articulos']);
        $cantidad=0;
        foreach($info as $i){ 
            $cantidad +=$i->cantidad;
        }

        //datos del contenedor
        $contenedor->cont_cantidad = $cantidad;
        $contenedor->cont_tamanio = '35"';
        $contenedor->add();

        //datos del detalle de la carga
        $carga->car_idContenedor = $contenedor->getMaxId()[0]->idMax;
        $carga->car_fecha = ''.date("Y-m-d");

        foreach($info as $producto){

            $carga->car_idPrecios = $producto->idPrecio;
            $carga->car_cantidad = $producto->cantidad;
            $carga->add();

            //editar los productos cargados
            $precios->prec_id=$producto->idPrecio;
            $precios->updateCantidad($producto->cantidad);
        }

        $contenedores = $contenedor->getAll();
        $puertos = $puerto->getAll();

        $respuesta = [
            'contenedores'=>$contenedores,
            'puertos' => $puertos
        ];
        $data = ['datos'=> $respuesta];
		return view('contenedor/indexcontenedor',$data);
    }

    public function detalleContenedor(){
        $contenedor  = new ContenedorModel();
        $carga = new DetalleCargaModel();

        $idcontenedor = trim($_REQUEST['id']);
        //traer el contenedor
        $contenedor->cont_id = $idcontenedor;
        $contenedor = $contenedor->getById();

        //traer los detalles
        $carga->car_idContenedor = $idcontenedor;
        $detalles = $carga->getDetalle();

       
        $datos =[
            'contenedor' => $contenedor,
            'detalles' => $detalles
        ];

        $data = ['datos'=> $datos];
        return view('contenedor/detalleContenedor',$data);
    }
}
?>