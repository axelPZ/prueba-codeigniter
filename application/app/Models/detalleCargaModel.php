<?php 
namespace App\Models;
use CodeIgniter\Model;

class DetalleCargaModel extends Model {

    protected $DBGroup = 'default';
    protected $defaultGroup = 'default';
    protected $table = 'detalle_carga';
    protected $primary = 'car_id';
    protected $allowedFields = [ 'car_idContenedor', 'car_idPrecios', 'car_cantidad', 'car_fecha'];
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $db;
    protected $db1;

    public function __construct()
	{
		$this->db = \Config\Database::connect();
        $this->db1 = \Config\Database::connect('default', false);
	}

    public function getAll(){

        $resultado = $this->db->query("SELECT * FROM $this->table");
        return $resultado->getResult();
    }

    public function add(){

        $query = "INSERT INTO $this->table (car_idContenedor, car_idPrecios, car_cantidad, car_fecha) VALUES(?,?,?,?)";
        $resultado= $this->db->query($query,[$this->car_idContenedor,$this->car_idPrecios,$this->car_cantidad, $this->car_fecha]);
        return $resultado;
    }

    public function getDetalle(){
        $query = "SELECT car_cantidad, car_fecha, prec_venta, prec_compra, car_cantidad, prov_nombre, prod_nombre, prod_sku, prod_unidades
                    FROM $this->table
                     JOIN precios_producto ON car_idPrecios = prec_id
                    JOIN proveedores ON prec_idProveedor = prov_id
                    JOIN productos ON prec_idProducto = prod_id
                    WHERE car_idContenedor = ?";
        $resultado= $this->db->query($query,[$this->car_idContenedor])->getResult();
        return $resultado;
    }
}
?>