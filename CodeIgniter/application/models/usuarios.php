<?php
class Usuarios_model extends CI_Model{
   function login($username, $password)
 {
   /**$this -> db -> select('id, user, pass');
   $this -> db -> from('usuarios');
   $this -> db -> where('user', $username);
   $this -> db -> where('pass', MD5($password));
   $this -> db -> limit(1);
   **/
 
   $query = $this -> db -> query('SELECT * FROM usuarios WHERE user = $username AND pass = $password');
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>