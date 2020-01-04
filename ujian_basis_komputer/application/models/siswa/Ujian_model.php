<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Ujian_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    function get_general($table, $where)
    {
		return $this->db->get_where($table,$where);

    }
    function create_general($table, $data)
	{
		return $this->db->insert($table, $data);
	}
    function get_by_id_general($table, $id, $val)
    {
        $query = $this->db->where($id, $val)->get($table);
        return $query->result();
    }
    function get_by_id_general_pg_jw($table, $id, $val)
    {
        $this->db->order_by('pg_urut', 'ASC');
        $query = $this->db->where($id, $val)->get($table);
        return $query->result();
    }
    function update_general($table, $id, $val, $data)
	{
		$this->db->where($id, $val);
		return $this->db->update($table, $data);
	}
    // function random_soal($limit)
    // {
    //     $this->db->order_by('soal_id', 'RANDOM');
    //     // $this->db->select('soal_id');
    //     // $this->db->where()
    //     $this->db->limit($limit);
    //     $query = $this->db->get('tb_soal');
    //     return $query;

    // }
    function soal($limit, $urut, $where){
        $this->db->order_by('soal_id', $urut);
        $this->db->select("*");
        $this->db->limit($limit);
        $this->db->join("tb_soal", "tb_soal.soal_mapel_id = tb_soal_mapel.mapel_id");
        return $this->db->get_where("tb_soal_mapel", $where);
    }
    // function soal_normal($limit)
    // {
    //     $this->db->limit($limit);
    //     $query = $this->db->get('tb_soal');
    //     return $query;

    // }
    function get_soal_list($limit, $start){
        $query = $this->db->get('tb_soal', $limit, $start);
        return $query;
    }
    
    public function get_current_page($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_soal');
        $rows = $query->result();
 
        if ($query->num_rows() > 0) {
            foreach ($rows as $row) {
                $data[] = $row;
            }
 
            return $data;
        }
 
        return false;
    }
 
    public function get_total() {
        return $this->db->count_all('tb_soal');
    }
    
    function auto_number_ujian(){

        $q = $this->db->query("SELECT MAX(ujian_id) AS max_id FROM tb_ujian");
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $kd = ((int)$k->max_id)+1;
            }
            
        }else{
            $kd = "1";
        }
        return $kd;
	}

  	
}
?>