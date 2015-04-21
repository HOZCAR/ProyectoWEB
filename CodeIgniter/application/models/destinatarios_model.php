<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Destinariarios_model extends CI_Model {

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

    	$q = $this->db->get_where('correo', );
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