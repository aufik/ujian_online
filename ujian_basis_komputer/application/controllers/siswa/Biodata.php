<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	// if ($this->session->userdata('login') == 0) redirect('auth/logout');
		
        $this->session->set_userdata('menu','siswa');
        $this->session->set_userdata('submenu','siswa_biodata');
		$this->load->model('siswa/biodata_model', 'dbObject');
    }
	public function index()
	{
		$where_peserta = array(
			'peserta_id' =>  $_SESSION['id_peserta']
		);
		$data['peserta'] = $this->dbObject->get_general('tb_peserta', $where_peserta)->row(); 
		// echo $data['biodata']->peserta_id;
		$where_room = array(
			'room_id' =>  $data['peserta']->room_id,
		);
		$data['room'] = $this->dbObject->get_general('tb_room', $where_room)->row(); 

		$status_ujian = $data['peserta'] ->status_ujian;
		 $time_start= date("H-i-s", strtotime($data['room']->room_time_start));
		 $total_waktu= date("d-m-Y", strtotime($data['room']->room_total_waktu));
		 $time_start= date("d-m-Y", strtotime($data['room']->room_date));
		 $time_start= date("d-m-Y", strtotime($data['room']->room_date_finish));
		 
		 $where_peserta = array(
			'peserta_id' =>  $_SESSION['id_peserta'],
			'status_ujian' => '1'
		);
		$data['peserta'] = $this->dbObject->get_general('tb_peserta', $where_peserta)->row();  
		
		
		
		$this->load->view('siswa/template/header');
        $this->load->view('siswa/template/sidebar');
        $this->load->view('siswa/biodata');
        $this->load->view('siswa/template/footer');
	}
	public function cek_token(){
		 $token =trim($this->input->post('token_mulai'));

		$where_peserta = array(
			'peserta_id' =>  $_SESSION['id_peserta']
		);
		$data['peserta'] = $this->dbObject->get_general('tb_peserta', $where_peserta)->row(); 
		
		$cek_token = $this->dbObject->cek_token_db($token, $data['peserta']->room_id); 
		
		$where_ujian_cek = array(
			'peserta_id' =>  $_SESSION['id_peserta'],
			'ujian_status' => '1'
		);
		$ujian = $this->dbObject->get_general('tb_ujian', $where_ujian_cek)->row();  
		
		if(count($ujian)> 0){
			$this->session->set_userdata('telah_ujian', "1");
			?>
				<script> 
					alert("Telah Selesai Ujian");
				</script>
			<?php
			redirect('siswa/biodata/', 'refresh');
		}else{
			$this->session->set_userdata('telah_ujian', "0");
		}
		if(count($cek_token) > 0){
			$this->session->set_userdata('token_berhasil', $token);
			redirect('siswa/ujian/', 'refresh');
		}else{
			?>
				<script> 
					alert("Token Salah");
				</script>
			<?php
			redirect('siswa/biodata/', 'refresh');
		}

	}

    
}
