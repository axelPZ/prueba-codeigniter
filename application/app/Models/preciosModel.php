<?php 
namespace App\Models;
use CodeIgniter\Model;

class PreciosModel extends Model {

    protected $DBGroup = 'default';
    protected $defaultGroup = 'default';
    protected $table = 'precios_producto';
    protected $primary = 'prec_id';
    protected $allowedFields = [ 'prec_idProveedor', 'prec_idProducto', 'prec_venta','prec_compra','prec_cantidad'];
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $db;
    protected $db1;

    public function __construct()
	{
		$this->db = \Config\Database::connect();
        $this->db1 = \Config\Database::connect('default', false);
	}



    public function updateCantidad($descuento){

        //obtener los valores anteriores de la cantidad del producto
        $query1='SELECT prec_cantidad FROM '.$this->table.' WHERE prec_id =?';
        $resultadoCantidad= $this->db->query($query1,[$this->prec_id])->getResult();
        $cantidad = intval($resultadoCantidad[0]->prec_cantidad);

       
        $this->prec_cantidad = intval($cantidad - $descuento);
     
        //modificar los datos de la cantidad de los precios
     
        $query = "UPDATE ".$this->table." SET prec_cantidad=? WHERE prec_id=?";
        $resultado= $this->db->query($query,[$this->prec_cantidad,$this->prec_id]);
        return $resultado;

    }

    public function getMaxId(){
        $resultado = $this->db->query("SELECT MAX(cont_id+1) AS idMax FROM $this->table");
        return $resultado->getResult();
    }
}
?>