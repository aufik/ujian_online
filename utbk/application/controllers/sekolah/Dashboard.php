<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login_sekolah') == 0) redirect('login/logout');
		if ($this->session->userdata('login') == 1) redirect('login/logout');
		
		$this->session->set_userdata('menu','dashboard');
		$this->session->unset_userdata('submenu');
		// $this->load->model('Dashbord_model', 'dbObject');
    }
	public function index()
	{
		$this->load->view('sekolah/templates/header');
		$this->load->view('sekolah/templates/sidebar');
		$this->load->view('sekolah/dashboard');
		$this->load->view('sekolah/templates/footer');
    }
    
}
