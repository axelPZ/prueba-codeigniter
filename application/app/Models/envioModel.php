<?php 
namespace App\Models;
use CodeIgniter\Model;

class EnvioModel extends Model {

    protected $DBGroup = 'default';
    protected $defaultGroup = 'default';
    protected $table = 'envios';
    protected $primary = 'env_id';
    protected $allowedFields = ['env_idAeropuerto', 'env_idUsuario', 'env_estatus', 'env_fechaTentativa','env_fechaEntrega','env_fecha','env_total'];
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

        $resultado = $this->db->query("SELECT env_id, usu_nombre, usu_apellido, aero_nombre, env_estatus, env_fechaTentativa, env_fecha, env_fechaEntrega
                                        FROM envios
                                        JOIN usuarios ON env_idUsuario = usu_id
                                        JOIN aeropuertos ON env_idAeropuerto = aero_id");
        return $resultado->getResult();
    }

    public function getMaxId(){
        $resultado = $this->db->query("SELECT MAX(env_id) AS idMax FROM $this->table");
        return $resultado->getResult();
    }

    public function add(){
        $query = "INSERT INTO $this->table (env_idAeropuerto, env_idUsuario, env_fechaTentativa, env_fechaEntrega, env_fecha) VALUES(?,?,?,?,?)";
        $resultado= $this->db->query($query,[$this->env_idAeropuerto,$this->env_idUsuario,$this->env_fechaTentativa,$this->env_fechaEntrega,$this->env_fecha]);
       return $resultado;
    }
}
?>