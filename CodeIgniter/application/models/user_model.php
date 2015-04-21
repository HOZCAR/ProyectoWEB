<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_all() 
    {
      $query = $this->db->get('usuario');
      return $query->result();
    }

    function autenticar($user, $pass) 
    {

        $this ->db-> select('*');
        $this ->db-> where('usuario', $user);
        $this ->db-> where('password', $pass);
        $this ->db-> where('estado', 1);
 
   $query = $this ->db-> get('usuario');
   $result = $query->result();
   if($result)
   {
     return true;
   }
   else
   {
     return false;
   }
        
    }
    
    function registrar($data)
    {
        return $this->db->insert('usuario', $data);

    }

    function confirmar($user)
    {
        $this ->db-> update('*');
        $this ->db-> where('usuario', $user);
        $this ->db-> where('password', $pass);
        $this ->db-> where('estado', 1);
 
        $query = $this ->db-> get('usuario');
        $result = $query->result();
    }

    }
}