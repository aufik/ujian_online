<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Auth_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    function get_user($where, $table)
    {
        return $this->db->get_where($table,$where)->result();
    }
    function get_by_id_general($table, $id, $val)
    {
        $query = $this->db->where($id, $val)->get($table);
        return $query->result();
    }
    function get_general($table, $where)
    {
		return $this->db->get_where($table,$where);

    }
    // function get_where( $table, $id, $val){
	// 	$this->db->select('*');
    //     $this->db->from($table);
    //     $this->db->where($id, $val);
	// 	return $query = $this->db->result();

	// } 


  	
}
?>