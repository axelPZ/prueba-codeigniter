<?php

namespace App\Controllers;
use App\Models\envioModel;
use App\Models\detalleModel;
use App\Models\contenedorModel;

class EnvioController extends BaseController
{
    // public function __construct(){
    //     $this->model = new EnvioModel();
    //     $this->detalle = new DetalleModel();
    //     $this->contenedor = new contenedorModel();
    // }

	public function index()
	{
        $model = new EnvioModel();
        $respuesta = $model->getAll();
        $respuesta = ['envios'=>$respuesta];
        return view('envio/enviosIndex',$respuesta);
	}

    public function addEnvio(){

        $model = new EnvioModel();
        $detalle = new DetalleModel();
        $contenedor = new ContenedorModel();

        $contenedores = json_decode($_POST['articulos']);
        $fechaTentativa = trim($_POST['fechaTentativa']);
        $idPuerto = trim($_POST['idPuerto']);
        $idUsuario = trim(session()->id);
        $fechaEnvio = date("Y-m-d");

        $model->env_idAeropuerto = $idPuerto;
        $model->env_idUsuario = $idUsuario;
        $model->env_fechaTentativa = $fechaTentativa;
        $model->env_fechaEntrega = '0000-00-00';
        $model->env_fecha = $fechaEnvio;

        $model->add();

        $idEnvio=$model->getMaxId()[0]->idMax;

        $detalle->det_idEnvio=$idEnvio;
        foreach($contenedores as $i){ 

           $detalle->det_idContenedor = $i->id;
           $contenedor->updateEstado($i->id);
           $detalle->add();
        }

        $respuesta = $model->getAll();
        $respuesta = ['envios'=>$respuesta];
        return view('envio/enviosIndex',$respuesta);
    }

    //detalle de los envios
    public function detalleEnvio(){
        
        $model = new EnvioModel();
        $detalle = new DetalleModel();

        $idEnvio = trim($_REQUEST['id']);
        
        $model->env_id=$idEnvio;
        $envio = $model->getDetalle();

        $detalle->det_id = $idEnvio;
        $detalles = $detalle->getDetalle($idEnvio);

        $respuesta = [
            'envio'=>$envio,
            'detalles' => $detalles
        ];
        $data = ['datos'=> $respuesta];
		return view('envio/EnviosDetalle',$data);
    }

    public function updateEnvio(){
        $model = new EnvioModel();

        $idEnvio = $_REQUEST['id'];
        $model->updateEstado($idEnvio);
        
        $respuesta = $model->getAll();
        $respuesta = ['envios'=>$respuesta];
        return view('envio/enviosIndex',$respuesta);
    }
}
?>