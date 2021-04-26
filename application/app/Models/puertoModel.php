<?php 
namespace App\Models;
use CodeIgniter\Model;

class PuertoModel extends Model {

    protected $DBGroup = 'default';
    protected $defaultGroup = 'default';
    protected $table = 'aeropuertos';
    protected $primary = 'aero_id';
    protected $allowedFields = [ 'aero_nombre', 'aero_direccion', 'aero_tipo','aero_estatus'];
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
}
?>