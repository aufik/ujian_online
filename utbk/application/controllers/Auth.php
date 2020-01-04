<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	$this->load->model('auth_model', 'dbObject');
    }
	public function index()
	{
		$this->load->view('login');
    }
    public function login()
	{
		$username= $this->input->post('username');
		$password= $this->input->post('password');
		$where = array(
			'admin_username' => $username,
			'admin_password' => md5($password)
		);
		$result = $this->dbObject->get_user($where, 'tb_admin');
		if(count($result) > 0){
			foreach($result as $row)
			{
				if($row->admin_status == 1){

					$this->session->set_userdata('id', $row->admin_id);
					$this->session->set_userdata('username', $row->admin_username);
					$this->session->set_userdata('email', $row->admin_email);
					$this->session->set_userdata('hp', $row->admin_hp);
					$this->session->set_userdata('login', 1);

					/* session kcfinder */
					$_SESSION['ses_admin']="admin";
					$_SESSION['KCFINDER']=array();
					$_SESSION['KCFINDER']['disabled'] = false;
					$_SESSION['KCFINDER']['uploadURL'] = base_url('assets/soal');
					$_SESSION['KCFINDER']['uploadDir'] = "";
					$this->admin();
				
			}else{
					
					?>
						<script> 
							alert("Maaf Anda Sedang Tidak aktive ");
						</script>
					<?php

					redirect('Auth', 'refresh');
				}
			}
		}
		else{
			echo "<script> alert('Username atau password salah...:'); </script>";
			redirect('Auth', 'refresh');
		
		}
	}
	public function admin(){
		$session=isset($_SESSION['ses_admin']) ? $_SESSION['ses_admin']:'';
		if($session==""){
			$this->login();
		}else { redirect('admin/dashboard', 'refresh'); }



					
				// 	/* session kcfinder */
				
					
				// 
	}
	public function logout(){
		$this->session->set_userdata('login', 0);
		$this->session->sess_destroy();
		$this->session->set_flashdata('logout_notification', 'logged_out');
		// session_destroy();
		// die;
		redirect(base_url(), 'refresh');
	}
}
