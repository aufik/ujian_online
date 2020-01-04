<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	// if ($this->session->userdata('login') == 0) redirect('auth/logout');
		
        $this->session->set_userdata('menu','siswa');
        $this->session->set_userdata('submenu','siswa_pendaftaran');
		$this->load->model('pendaftaran_model', 'dbObject');
    }
	public function index()
	{
		
		$this->load->view('siswa/template/header');
        // $this->load->view('siswa/template/sidebar');
        $this->load->view('pendaftaran');
		// $this->load->view('siswa/template/footer');
		
	}
	public function harga_normal(){
		$data = $this->dbObject->harga_normal()->result(); 
        echo json_encode($data);
	}
	public function get_room(){
		$id=$this->input->post('id');
		$data = $this->dbObject->get_room($id)->result(); 
        echo json_encode($data);
	}
	public function get_room_detail(){
		$room_id=$this->input->post('id');

		$where_room = array(
			'room_id' =>  $room_id
		);
		 $data = $this->dbObject->get_general('tb_room', $where_room)->result(); 

		 
        echo json_encode($data);
	}
	public function tambah_kupon(){
		$kode_kupon=$this->input->post('kode_kupon');

		$where_kupon = array(
			'harga_dicount_kode' =>  $kode_kupon,
			'harga_dicount_sisa_limit >' => "0"
		);
		 $data = $this->dbObject->get_general('tb_harga_discount', $where_kupon)->result(); 

		 
        echo json_encode($data);

	}
	public function tambah_peserta(){
		$jurusan = $this->input->post('jurusan');
		$room = $this->input->post('room');
		$peserta_biodata_nisn = $this->input->post('peserta_biodata_nisn');
		$peserta_biodata_npsn = $this->input->post('peserta_biodata_npsn');
		$peserta_biodata_tgl_lahir = $this->input->post('peserta_biodata_tgl_lahir');
		$peserta_biodata_email = $this->input->post('peserta_biodata_email');
		$peserta_biodata_email_konf = $this->input->post('peserta_biodata_email_konf');
		$peserta_biodata_password = $this->input->post('peserta_biodata_password');
		$jurusan = $this->input->post('kode_promo_input');

		$data = array(
			'jurusan' =>  $jurusan,
			'room' =>  $room,
			'peserta_biodata_nisn' =>  $peserta_biodata_nisn,
			'peserta_biodata_npsn' =>  $peserta_biodata_npsn,
			'peserta_biodata_tgl_lahir' =>  $peserta_biodata_tgl_lahir,
			'peserta_biodata_email' =>  $peserta_biodata_email,
			'peserta_biodata_password' =>  $peserta_biodata_password
		);
		print_r($data);
		

	}

    
}
