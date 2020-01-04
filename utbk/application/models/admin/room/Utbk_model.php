<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Utbk_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function get_general($table, $where)
    {
		return $this->db->get_where($table,$where)->result(); 
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
	function join_room(){

		$this->db->select('*');
		$this->db->from("tb_room");
		$this->db->join("tb_option", "tb_room.room_id = tb_option.room_id");
		return $query = $this->db->get();

	}
	function join_room_update($id){

		$this->db->select('*');
		$this->db->from("tb_room");
		$this->db->join("tb_option", "tb_room.room_id = tb_option.room_id");
		$this->db->where("tb_room.room_id", $id);
		return $query = $this->db->get();

	}

	function auto_number_room(){
		$q = $this->db->query("SELECT MAX(RIGHT(room_id, 8)) AS max_id FROM tb_room ");
		$this->db->order_by('room_id','DESC');    
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->max_id)+1;
                $kd = sprintf("%08s", $tmp);
            }
        }else{
            $kd = "000000004";
        }
        return "RM".$kd;
    }
	
}
?>