<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verificar extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('usuarios','user',TRUE);
   echo 'entro';
 }
 
 function index()
 {
  
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('user', 'user', 'trim|required|xss_clean');
   $this->form_validation->set_rules('pass', 'pass', 'trim|required|xss_clean|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('usuario/login');
   }
   else
   {
     //Go to private area
     $this->load->view('usuario/login');
   }
 
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('user');
 
   //query the database
   $result = $this->user->login($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'user' => $row->user
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>