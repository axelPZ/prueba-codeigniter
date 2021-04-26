<?php

namespace App\Controllers;
use App\Models\productoModel;

class ProductosController extends BaseController
{
    public function __construct()
    {
        $this->model= new ProductoModel();
    }
	public function indexProducto()
	{
        $respuesta = $this->model->getAll();
        $respuesta = ['productos'=>$respuesta];
		return view('producto/indexProducto',$respuesta);
	}

    public function detalleProducto(){
        
        $id = trim($_REQUEST['id']);
        
        $producto = $this->model->getId($id);
        $detalles = $this->model->detalleProducto($id);

        $data = ([

            'detalles' => $detalles,
            'producto' => $producto
        ]);

        $data = ['datos'=> $data];
        return view('producto/detalleProducto',$data);
    }
}
?>