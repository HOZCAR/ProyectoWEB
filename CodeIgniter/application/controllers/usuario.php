<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

   function __construct()
 {
   parent::__construct();
   $this->load->model('User_model', 'user');
   $this->load->model('Correos_model');

   //configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_timeout' => 30,
			'smtp_user' => 'proyectowebutn@gmail.com',
			'smtp_pass' => 'tonnylazo'
		);
		//cargamos la configuración para enviar con gmail
		$this->load->library("email", $configGmail);
 }
 
 public function index()
 {
   $this->load->helper(array('form'));
   $this->load->view('utilizable/headers');
   $this->load->view('usuario/login');
 }

 public function loginfail()
 {
 	$this->load->view('utilizable/headers');
 	$this->load->view('usuario/loginfail');
 }

 public function autenticar()
	{
		$pass= md5($this->input->post('contrasena'));
		$result = $this->user->autenticar($this->input->post('usuario'), $pass);

		if ($result) {
			redirect('correo', 'refresh');
		}else{
			redirect('fail', 'refresh');
			
		}
	}

 public function registro()
 {
 	$this->load->view('utilizable/headers');
 	$this->load->view('usuario/registro');
 }

 public function registrofail()
 {
 	$this->load->view('utilizable/headers');
 	$this->load->view('usuario/registrofail');
 }

 public function registrar()
	{
		$data = array(
            'usuario' => $this->input->post('usuario'),
            'password' => md5($this->input->post('password')),
            'nombre' => $this->input->post('nombre'),
			'email' => $this->input->post('email'),
            'estado' => 0
        );
        if($this->user->registrar($data))
        {

        $user = $this->input->post('usuario');
        	//$this->email->initialize($configGmail);
 		$this->email->set_newline("\r\n");
		$this->email->from('proyectowebutn@gmail.com', 'Noreply@proyectowebutn@gmail.com');
		$this->email->to($this->input->post('email'));
		$this->email->subject('Confirmacion');
		$this->email->message('Click en este link para verificar su correo
								http://localhost/CodeIgniter/confirmacion/username=$user');
		if ($this->email->send()) {
			echo "Favor confirmar su correo";
		}
		//con esto podemos ver el resultado
		else show_error($this->email->print_debugger());

        redirect('login', 'refresh');
        }else{
			redirect('failreg', 'refresh');
		}
	}

 public function correo()
 {
 	$correos = $this->Correos_model->get_all();	
 	$data['correosa'] = $correos;
 	$this->load->view('utilizable/headers');
 	$this->load->view('usuario/correo');
 }

 public function salir()
 {
 	$this->load->view('utilizable/headers');
 	$this->load->view('usuario/login');
 }

 public function crearcorreo()
 {
 	$this->load->view('utilizable/headers');
 	$this->load->view('usuario/correonuevo');
 }

 public function listacorreosenv()
 {
 	$correos = $this->Correos_model->get_all();	
 	$data['correoenv'] = $correos;
 	$this->load->view('utilizable/headers');
 	$this->load->view('usuario/correo', $data);
 }

 public function guardarcorreo()
 {
 	$estado = false;
 	$time = time();
	$fecha = date("d-m-Y (H:i:s)", $time);
 	$correo = array(
        	'estado' => $estado,
        	'contenido' => $this->input->post('contenido'),
        	'usuarioid' => $this->user->buscarID()->usuarioid,
        	'fechacreacion' => $fecha
        	);

        $resultado = $this->Correos_model->insert($correo);
        if ($resultado) {
        	redirect('correo', 'refresh');
        }
 }

 public function enviarCorreo(){
		
		//$this->email->initialize($configGmail);
 		$this->email->set_newline("\r\n");
		$this->email->from('proyectowebutn@gmail.com', 'Test');
		$listacorreos = array('tonnylaz@gmail.com', 'orfonsecasa@gmail.com', 'tonnylaz@outlook.com');
		$this->email->to($listacorreos);
		$this->email->subject('Funcionalidad');
		$this->email->message('Este correo es para probar la funcionabilidad del proyecto');
		if ($this->email->send()) {
			echo "Sirve en teoria";
		}
		//con esto podemos ver el resultado
		else show_error($this->email->print_debugger());
 }

}
?>