<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login') == 0) redirect('auth/logout');
		
		$this->session->set_userdata('menu','dashboard');
		$this->session->unset_userdata('submenu');
		// $this->load->model('Dashbord_model', 'dbObject');
    }
	public function index()
	{
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/templates/footer');
    }
    
}
