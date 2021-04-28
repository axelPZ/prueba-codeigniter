<?php

namespace App\Controllers;
use App\Models\productoModel;

class ProductosController extends BaseController
{
    // public function __construct()
    // {
    //     $this->model= new ProductoModel();
    // }
	public function indexProducto()
	{
        $model = new ProductoModel();
        $respuesta = $model->getAll();
        $respuesta = ['productos'=>$respuesta];
		return view('producto/indexProducto',$respuesta);
	}

    public function detalleProducto(){
        $model = new ProductoModel();
        
        $id = trim($_REQUEST['id']);
        
        $producto = $model->getId($id);
        $detalles = $model->detalleProducto($id);

        $data = ([

            'detalles' => $detalles,
            'producto' => $producto
        ]);

        $data = ['datos'=> $data];
        return view('producto/detalleProducto',$data);
    }
}
?>