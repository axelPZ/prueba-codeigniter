<?php 
namespace App\Models;
use CodeIgniter\Model;

class ProductoModel extends Model {

    protected $DBGroup = 'default';
    protected $defaultGroup = 'default';
    protected $table = 'productos';
    protected $primary = 'prod_id';
    protected $allowedFields = ['prod_nombre', 'prod_marca','prod_img','prod_sku', 'prod_volumen','prod_estatus'];
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $db;
    protected $db1;

    public function __construct()
	{
		$this->db = \Config\Database::connect();
        $this->db1 = \Config\Database::connect('default', false);
	}

    //traer todos los productos
    public function getAll(){

        $respuesta = $this->db->query("SELECT prod_id, prod_nombre, prod_sku, prod_unidades, prec_id, prec_venta, prec_compra, prec_cantidad, prov_nombre, prov_estatus, prov_direccion 
                                        FROM $this->table
                                        JOIN precios_producto ON prec_idProducto = prod_id
                                        JOIN proveedores ON prov_id = prec_idproveedor
                                        ");
        return $respuesta->getResult();
    }

    //traer los detalles de los productos
    public function detalleProducto($id){
        
        $query = "SELECT prec_venta, prec_compra, prec_cantidad, prov_nombre, prov_estatus, prov_direccion 
                    FROM $this->table
                        JOIN precios_producto ON prec_idProducto = prod_id
                        JOIN proveedores ON prov_id = prec_idproveedor
                        WHERE prod_id = ?";

        $resultado = $this->db->query($query, [$id])->getResult();
        return $resultado;
    }

    //traer el producto por id
    public function getId($id){

        $query = "SELECT * FROM $this->table where prod_id=?";
        $resultado = $this->db->query($query, [$id])->getResult();
        return $resultado;
    }
}


?>