<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Correo extends CI_Controller {

   function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
   $this->load->helper(array('form'));
    $this->load->view('utilizable/headers');
   $this->load->view('usuario/correo');
 }
}

?>