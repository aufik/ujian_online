<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ip_add extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	// if ($this->session->userdata('login') == 0) redirect('auth/logout');
		
        // $this->session->set_userdata('menu','akademik');
        // $this->session->set_userdata('submenu','akademik_sekolah');
		// $this->load->model('admin/akademik/Sekolah_model', 'dbObject');
    }
	public function index()
	{

		// $where = array(
		// );
		// $data['sekolah'] = $this->dbObject->get_general('tb_sekolah', $where); 
		// $this->load->view('admin/templates/header');
		// $this->load->view('admin/templates/sidebar');
		//load library

	
		$this->load->library('user_agent');

	
		//get browser detail 


	   $data['browser'] = $this->agent->browser();
	   $data['browser_version'] = $this->agent->version();
	  $data['os'] = $this->agent->platform();
	  $data['ip_address'] = $this->input->ip_address(); 
		$this->load->view('siswa/ip_address', $data);
		// $this->load->view('admin/templates/footer');
    }
}