<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Biodata_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    function get_general($table, $where)
    {
		return $this->db->get_where($table,$where);

	}
    function get_by_id_general($table, $id, $val)
    {
        $query = $this->db->where($id, $val)->get($table);
        return $query->result();
    }
    function random_soal($limit)
    {
        $this->db->order_by('soal_id', 'RANDOM');
        // $this->db->where()
        $this->db->limit($limit);
        $query = $this->db->get('tb_soal');
        return $query;

    }
    function cek_token_db($token, $room_id)
    {

        $query = $this->db->where('room_id', $room_id)->where('room_token_mulai', $token)->get('tb_room');
        return $query->result();

        // $this->db->select('*');
        // $this->db->get('tb_room');
        // $this->db->where('room_id', $room_id);
        // $this->db->where('room_token_mulai', $token);
        // return $this->db->where('room_token_mulai', $token);
        
    }


  	
}
?>