<?php

namespace App\Controllers;
use App\Models\envioModel;
use App\Models\DetalleModel;

class EnvioController extends BaseController
{
    public function __construct(){
        $this->model = new EnvioModel();
        $this->detalle = new DetalleModel();
    }

	public function index()
	{
        $respuesta = $this->model->getAll();
        $respuesta = ['envios'=>$respuesta];
        return view('envio/enviosIndex',$respuesta);
	}

    public function addEnvio(){
        $contenedores = json_decode($_POST['articulos']);
        $fechaTentativa = trim($_POST['fechaTentativa']);
        $idPuerto = trim($_POST['idPuerto']);
        $idUsuario = trim(session()->id);
        $fechaEnvio = date("m/d/Y");

        $this->model->env_idAeropuerto = $idPuerto;
        $this->model->env_idUsuario = $idUsuario;
        $this->model->env_fechaTentativa = $fechaTentativa;
        $this->model->env_fechaEntrega = $fechaEnvio;
        $this->model->env_fecha = $fechaEnvio;

        $this->model->add();

        $idEnvio=$this->model->getMaxId()[0]->idMax;

        $this->detalle->det_idEnvio=$idEnvio;
        foreach($contenedores as $i){ 

           $this->detalle->det_idContenedor = $i->id;
           $this->detalle->add();
        }

        $respuesta = $this->model->getAll();
        $respuesta = ['envios'=>$respuesta];
        return view('envio/enviosIndex',$respuesta);
    }
}
?>