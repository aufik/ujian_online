<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Peserta_model extends CI_Model
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
    function cek_peserta_max($id, $table){
        $this->db->select_max($id);
        return $this->db->get($table);
	}
	function cek_nilai_ujian_sekolah($sekolah_id){
		$this->db->select('*');
		$this->db->from('tb_peserta_dari_sekolah');
		$this->db->where("tb_peserta_dari_sekolah.sekolah_peserta_id", $sekolah_id);
		// $this->db->join("tb_peserta", "tb_peserta.peserta_id = tb_peserta_dari_sekolah.peserta_id");
		// $this->db->join("tb_ujian", "tb_ujian.peserta_id = tb_peserta.peserta_id");
		return $this->db->get();
	}
	function get_peserta_sekolah($sekolah, $room){
		$this->db->select('*');
		$this->db->from("tb_peserta");
		$this->db->join("tb_peserta_dari_sekolah", "tb_peserta_dari_sekolah.peserta_id = tb_peserta.peserta_id");
		$this->db->join("tb_sekolah_peserta", "tb_sekolah_peserta.sekolah_peserta_id = tb_peserta_dari_sekolah.sekolah_peserta_id");
		$this->db->where("tb_sekolah_peserta.room_id", $room);
		$this->db->where("tb_sekolah_peserta.sekolah_id", $sekolah);


		return $this->db->get();
	}
	function get_nilai($peserta_id){
		$this->db->select("*");
		$this->db->where('peserta_id', $peserta_id);
		return $this->db->get("tb_ujian");
	}

	function get_peserta_sekolah_nilai($sekolah, $room){
		$this->db->from("tb_peserta");
		$this->db->join("tb_peserta_dari_sekolah", "tb_peserta_dari_sekolah.peserta_id = tb_peserta.peserta_id");
		$this->db->join("tb_sekolah_peserta", "tb_sekolah_peserta.sekolah_peserta_id = tb_peserta_dari_sekolah.sekolah_peserta_id");
		
		$this->db->where("tb_sekolah_peserta.room_id", $room);
		$this->db->where("tb_sekolah_peserta.sekolah_id", $sekolah);
		
		
		return $this->db->get();
	}
}
?>