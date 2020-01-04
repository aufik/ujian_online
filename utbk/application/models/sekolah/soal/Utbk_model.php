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
	function join_general($table1, $table2, $id1, $id2){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2, "$table1.$id1 = $table2.$id2");
		return $query = $this->db->get();

	}
	
	function join_general_utbk_list_update($param){
		$this->db->select('*');
		$this->db->from('tb_soal');
		$this->db->join('tb_soal_mapel', "tb_soal.soal_mapel_id = tb_soal_mapel.mapel_id");
		$this->db->join('tb_soal_jurusan', "tb_soal_mapel.jurusan_id = tb_soal_jurusan.jurusan_id");
		$this->db->where('tb_soal.soal_id', $param);
		return $query = $this->db->get();

	}
	function general_utbk_list_update_jawaban($param){
		$this->db->select('*');
		$this->db->from('tb_jawaban_pg');
		$this->db->where('tb_jawaban_pg.soal_id', $param);
		return $query = $this->db->get();

	}
	function general_utbk_list_update_jawaban_essay($param){
		$this->db->select('*');
		$this->db->from('tb_jawaban_essay');
		$this->db->where('tb_jawaban_essay.soal_id', $param);
		return $query = $this->db->get();

	}

	function join_general_utbk_list(){
		$this->db->select('*');
		$this->db->from('tb_soal');
		$this->db->join('tb_soal_mapel', "tb_soal.soal_mapel_id = tb_soal_mapel.mapel_id");
		$this->db->join('tb_soal_jurusan', "tb_soal_mapel.jurusan_id = tb_soal_jurusan.jurusan_id");
		
		return $query = $this->db->get();

	}
	function auto_number_soal(){
        $q = $this->db->query("SELECT MAX(RIGHT(soal_id, 4)) AS max_id FROM tb_soal WHERE DATE(soal_tanggal_create)=CURDATE()");
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
	function auto_number_pg(){
        $q = $this->db->query("SELECT MAX(RIGHT(pg_id, 4)) AS max_id FROM tb_jawaban_pg");
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