<?php 
namespace App\Models;
use CodeIgniter\Model;

class DetalleModel extends Model {

    protected $DBGroup = 'default';
    protected $defaultGroup = 'default';
    protected $table = 'detalle_envio';
    protected $primary = 'det_id';
    protected $allowedFields = ['det_idEnvio', 'det_idContenedor'];
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $db;
    protected $db1;

    public function __construct()
	{
		$this->db = \Config\Database::connect();
        $this->db1 = \Config\Database::connect('default', false);
	}

    public function getByIdEnvio(){

        $query = $this->db->query("SELECT * FROM $this->table WHERE det_idEnvio=?");
        $resultado = $this->db->query($query, [$this->det_idEnvio])->getResult();
        return $resultado;
    }

    public function add(){
        $query = "INSERT INTO $this->table (det_idEnvio, det_idContenedor) VALUES(?,?)";
        $resultado= $this->db->query($query,[$this->det_idEnvio,$this->det_idContenedor]);
        return $resultado;
    }

    public function getDetalle($id){
        $query =   "SELECT cont_id, cont_cantidad, cont_tamanio FROM $this->table JOIN contenedores ON det_idContenedor = cont_id 
                    WHERE det_idEnvio =?";
        $resultado= $this->db->query($query,[$id]);
        return $resultado->getResult();
    }
}
?>