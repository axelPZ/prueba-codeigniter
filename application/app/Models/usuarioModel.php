<?php 
namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model {

    protected $DBGroup = 'default';
    protected $defaultGroup = 'default';
    protected $table = 'usuarios';
    protected $primary = 'usu_id';
    protected $allowedFields = ['usu_nombre', 'usu_apellido', 'usu_email', 'usu_password','usu_imagen'];
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $db;
    protected $db1;

    public function __construct()
	{
		$this->db = \Config\Database::connect();
        $this->db1 = \Config\Database::connect('default', false);
	}

    //traer todos los usuarios
    public function getAll(){

        $usuarios = $this->db->query("SELECT * FROM $this->table");
        return $usuarios->getResult();
    }

    //verificar si existe el email
    public function getByEmail($email){

        $query = "SELECT usu_email as email, usu_imagen as img FROM $this->table  WHERE  usu_email=?";
        $resultado = $this->db->query($query, [$email])->getResult();
        return $resultado;
    }

    //login del usuario
    public function login(){

        $query = "SELECT usu_email as email, usu_imagen as img, usu_nombre as nombre,usu_apellido as apellido, usu_id as id  FROM $this->table  WHERE  usu_email=? AND usu_password=?";
        $resultado = $this->db->query($query,[$this->usu_email, $this->usu_password])->getResult();
        return $resultado;
    }

    //registrar al usuario
    public function setRegister(){

        $query = "INSERT INTO $this->table (usu_nombre, usu_apellido, usu_email, usu_password, usu_imagen) VALUES(?,?,?,?,?)";
        $resultado= $this->db->query($query,[$this->usu_nombre,$this->usu_apellido,$this->usu_email,$this->usu_password,$this->usu_imagen]);
        return $resultado;
    }

}

?>