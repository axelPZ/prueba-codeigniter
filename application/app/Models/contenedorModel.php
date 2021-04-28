<?php 
namespace App\Models;
use CodeIgniter\Model;

class ContenedorModel extends Model {

    protected $DBGroup = 'default';
    protected $defaultGroup = 'default';
    protected $table = 'contenedores';
    protected $primary = 'cont_id';
    protected $allowedFields = [ 'cont_cantidad', 'cont_tamanio', 'cont_estatus'];
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

        $resultado = $this->db->query("SELECT * FROM $this->table ORDER BY cont_id DESC");
        return $resultado->getResult();
    }

    public function add(){
        $query = "INSERT INTO $this->table (cont_cantidad, cont_tamanio) VALUES(?,?)";
        $resultado= $this->db->query($query,[$this->cont_cantidad,$this->cont_tamanio]);
        return $resultado;
    }

    public function getMaxId(){
        $resultado = $this->db->query("SELECT MAX(cont_id) AS idMax FROM $this->table");
        return $resultado->getResult();
    }

    public function getById(){

        $query="SELECT * FROM $this->table WHERE cont_id=?";
        $resultado= $this->db->query($query,[$this->cont_id]);
        return $resultado->getResult();
    }

    public function updateEstado($id){
        $query = "UPDATE ".$this->table." SET cont_estatus=1 WHERE cont_id=?";
        $resultado= $this->db->query($query,[$id]);
        return $resultado;
    }

}
?>