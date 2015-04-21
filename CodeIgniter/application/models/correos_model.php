<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Correos_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     *  Obtains all courses from the database
     */
    public function get_all() 
    {

    	$this ->db-> select('*');
        $this ->db-> where('estado', 0);
 
   $q = $this ->db-> get('correo');
    	return $q->result();
    }

    function insert($correos){
        if ( $this->db->insert('correo',$correos) )
        {
            return True;
        }
        else
        {
            return false;
        }
        
    }
}