<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Sekolah_model extends CI_Model
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
	function join_peserta(){

		$this->db->select('*');
		$this->db->from("tb_sekolah_peserta");
		$this->db->join("tb_room","tb_room.room_id = tb_sekolah_peserta.room_id");
		$this->db->join("tb_sekolah", "tb_sekolah.sekolah_id = tb_sekolah_peserta.sekolah_id");
		// $this->db->join("tb_option", "tb_room.room_id = tb_option.room_id");
		
		return $query = $this->db->get();

	}
	function join_sekolah_peserta_update($param){
		$this->db->select('*');
		$this->db->from("tb_sekolah_peserta");
		$this->db->where("tb_sekolah_peserta.sekolah_peserta_id", $param);
		$this->db->join("tb_room","tb_room.room_id = tb_sekolah_peserta.room_id");
		$this->db->join("tb_sekolah", "tb_sekolah.sekolah_id = tb_sekolah_peserta.sekolah_id");
		// $this->db->join("tb_option", "tb_room.room_id = tb_option.room_id");
		
		return $query = $this->db->get();
	}
	function join_room_update($id){

		$this->db->select('*');
		$this->db->from("tb_room");
		$this->db->join("tb_option", "tb_room.room_id = tb_option.room_id");
		$this->db->where("tb_room.room_id", $id);
		return $query = $this->db->get();

	}

	function auto_number_peserta(){
        $q = $this->db->query("SELECT MAX(RIGHT(sekolah_peserta_id, 4)) AS max_id FROM tb_sekolah_peserta");
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->max_id)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "00004";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$kd;
    }
	
}
?>