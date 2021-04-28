<?php

namespace App\Controllers;
use App\Models\usuarioModel;

class UsuarioController extends BaseController
{

	public function __construct()
	{
		$session = \Config\Services::session();
	}

	//ir al login
	public function LoginEmail()
	{
		return view('login/loginEmail');
	}

	//verificar si existe el usuario por el email
	public function identificarUsuario()
	{
		
		$usuario = new UsuarioModel();
		$email = trim(strtoupper($_POST['email']));
		
		echo "$email";
		$usuarioResult = $usuario->getByEmail($email);
		
	
		if($usuarioResult)
		{
			$datos = [
				'email' => $usuarioResult[0]->email,
				'img' => $usuarioResult[0]->img
			];

			$datos = ['datos'=>$datos];
			return view('login/loginPassword',$datos);
		
		}else{
		
			$info = ['mensaje'=>$email];
			return view('login/loginEmail',$info);
		}
	}

	public function loginPassword(){

		$usuario = new UsuarioModel();

		$usuario->usu_email = trim(strtoupper($_POST['email']));
		$usuario->usu_password = trim($_POST['pass']);
		$usuario->usu_imagen = trim($_POST['img']); 

		$resultado = $usuario->login();

		if($resultado){

			session()->set([
				'id' => $resultado[0]->id,
				'nombre' => $resultado[0]->nombre,
				'apellido' => $resultado[0]->apellido,
				'img' => $resultado[0]->img,
				'email' => $resultado[0]->email
			]);


			//echo session()->id;
			return redirect()->to(base_url().'/application/EnvioController/index');

			
		}else{
				
		$datos = [
			'email' => $usuario->usu_email,
			'img' => $usuario->usu_imagen,
			'error'=>true
		];

		$datos = ['datos'=>$datos];		
		return view('login/loginPassword',$datos);
		}

	}

	//ir al formulario de registro
	public function UsuarioRegistrar(){

		return view('registrar/registrar');
	}
	//registrar el usuario
	public function registrarUsuario(){

		$usuario = new UsuarioModel();

		$usuario->usu_nombre = trim(strtoupper($_POST['name']));
		$usuario->usu_apellido = trim(strtoupper($_POST['surname']));
		$usuario->usu_email = trim(strtoupper($_POST['email']));
		$usuario->usu_password = trim(strtoupper($_POST['pass']));
		$usuario->usu_imagen = trim(base_url()."/application/public/img/default/usuario.jpg");

		//verificar si el email ya existe
		$respuesta = $usuario->getByEmail($usuario->usu_email);

		if($respuesta){
			
			$info = ['mensaje'=>$usuario->usu_email];
			return view('registrar/registrar.php',$info);
		}else{
			
			if($usuario->setRegister()){

				$datos = [
					'email' => $usuario->usu_email,
					'img' => $usuario->usu_imagen,
					'mensaje'=>true
				];
	
				$datos = ['datos'=>$datos];
				return view('login/loginPassword',$datos);
			}
		}

	}
	public function cerrarSession(){

		session_destroy();
		return redirect()->to(base_url().'/');
	}
	

}
