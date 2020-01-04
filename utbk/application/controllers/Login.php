<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	$this->load->model('auth_model', 'dbObject');
    }
	public function index()
	{
		$this->load->view('login_sekolah');
    }
    public function login()
	{
		$email= $this->input->post('email');
		$password= $this->input->post('password');
		$where = array(
			'sekolah_email' => $email,
			'sekolah_password' => md5($password)
		);
        $result = $this->dbObject->get_user($where, 'tb_sekolah');
        
		if(count($result) > 0){
			foreach($result as $row)
			{

				if($row->sekolah_status == 1){

					$this->session->set_userdata('sekolah_id', $row->sekolah_id);
					$this->session->set_userdata('username', $row->sekolah_nama);
					$this->session->set_userdata('email', $row->sekolah_email);
					$this->session->set_userdata('hp', $row->sekolah_hp);
					$this->session->set_userdata('login_sekolah', 1);

					/* session kcfinder */
					$_SESSION['ses_sekolah']="sekolah";
					$_SESSION['KCFINDER']=array();
					$_SESSION['KCFINDER']['disabled'] = false;
					$_SESSION['KCFINDER']['uploadURL'] = base_url('assets/soal');
					$_SESSION['KCFINDER']['uploadDir'] = "";
					$this->sekolah();
				
			}else{
					
					?>
						<script> 
							alert("Maaf Anda Sedang Tidak aktive ");
						</script>
					<?php

					redirect('login', 'refresh');
				}
			}
		}
		else{
			echo "<script> alert('Username atau password salah...:'); </script>";
			redirect("login", 'refresh');
		
		}
	}
	public function sekolah(){
        
		 $session=isset($_SESSION['ses_sekolah']) ? $_SESSION['ses_sekolah']:'';
		
		if($session==""){
			
			$this->login();
		}else { redirect('sekolah/dashboard', 'refresh'); }



					
				// 	/* session kcfinder */
				
					
				// 
	}
	public function logout(){
		// die;
		$this->session->set_userdata('login_sekolah', 0);
		$this->session->sess_destroy();
		$this->session->set_flashdata('logout_notification', 'logged_out');
		// session_destroy();
		// die;
		redirect(base_url(), 'refresh');
	}
}
