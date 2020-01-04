<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
    {   parent::__construct();

        $this->load->model('siswa/auth_model', 'dbObject');
        
    }
	public function index()
	{
        $this->load->view('siswa/template/header');
        $this->load->view('siswa/template/sidebar');
        $this->load->view('siswa/login');
        $this->load->view('siswa/template/footer');
        
    }
    public function login()
	{
		$nomor_peserta= $this->input->post('nomor_peserta');
		$password= $this->input->post('password');
		$where = array(
			'peserta_nomor' => $nomor_peserta,
			'peserta_password' => md5($password)
		);
		$result = $this->dbObject->get_user($where, 'tb_peserta');
		
		if(count($result) > 0){
			foreach($result as $row)
			{
					
					
					$option = array(
						'room_id' => $row->room_id
					);
					$room = $this->dbObject->get_general('tb_option', $option)->row();

					
					$this->session->set_userdata('id_peserta', $row->peserta_id);
					$this->session->set_userdata('username', $row->peserta_username);
					$this->session->set_userdata('nomor_peserta', $row->peserta_nomor);
					$this->session->set_userdata('login', 1);
					// if($room->option_jenis_jawaban == 1){
					// 	$jenis = "p";
					// }
					// $this->session->set_userdata('jenis_ujian', $room->option_jenis_jawaban);
					

					/* session kcfinder */
					$_SESSION['ses_admin']="siswa";
					// $_SESSION['KCFINDER']=array();
					// $_SESSION['KCFINDER']['disabled'] = false;
					// $_SESSION['KCFINDER']['uploadURL'] = base_url('assets/soal');
					// $_SESSION['KCFINDER']['uploadDir'] = "";
					$this->siswa();
				
				}
		}
		else{
			echo "<script> alert('Username atau password salah...:'); </script>";
			redirect('siswa/Auth', 'refresh');
		
		}
	}
	public function siswa(){
		$session=isset($_SESSION['ses_admin']) ? $_SESSION['ses_admin']:'';
		if($session==""){
			$this->login();
		}else { redirect('siswa/biodata/', 'refresh'); }

 
	}
	public function logout(){
		$this->session->set_userdata('login', 0);
		$this->session->sess_destroy();
		$this->session->set_flashdata('logout_notification', 'logged_out');
		// session_destroy();
		redirect(base_url()."siswa/auth", 'refresh');
	}
}
