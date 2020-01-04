<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Siswa_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function get_general($table, $where)
    {
		return $this->db->get_where($table,$where)->result();

	}
	function join_general($table1, $table2, $id1, $id2){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2, "$table1.$id1 = $table2.$id2");
		return $query = $this->db->get();

	}
	function join_general_sekolah($table1, $table2, $id1, $id2, $id3){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->where("$table1.sekolah_id", $id3);
		$this->db->join($table2, "$table1.$id1 = $table2.$id2");
		
		return $query = $this->db->get();

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