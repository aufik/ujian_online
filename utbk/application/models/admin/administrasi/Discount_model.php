<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Discount_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function get_general($table, $where)
    {
		return $this->db->get_where($table,$where)->result();

    	// $query = $this->db->where($id, $val)->get($table);
		// return $query->result();
	}
	function get_discount($table)
    {
		// $this->db->order_by("discount_id", "desc");
		// $this->db->order_by("discount_id", "desc");
		// $this->db->limit(1);
		return $query = $this->db->get($table);
    	// $query = $this->db->where($id, $val)->get($table);
		// return $query->result();
	}
    function create_general($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	function update_general($table, $id, $val, $data)
	{
		$this->db->where($id, $val);
		return $this->db->update($table, $data);
	}

	function delete_general($table, $where)
	{
		return $this->db->delete($table, $where);
	} 
	
}
?>