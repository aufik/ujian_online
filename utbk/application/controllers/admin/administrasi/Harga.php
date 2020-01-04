<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login') == 0) redirect('auth/logout');
		
        $this->session->set_userdata('menu','administrasi');
        $this->session->set_userdata('submenu','administrasi_harga');
		$this->load->model('admin/administrasi/Harga_model', 'dbObject');
    }
	public function index()
	{   
        $data['harga'] = $this->dbObject->get_harga('tb_harga')->row();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/administrasi/harga/list', $data);
		$this->load->view('admin/templates/footer');
	}
	
    public function update($param=""){
        if($param=='do_update'){
            $harga=trim($this->input->post('harga'));
			$date = date("Y-m-d h:m:i");
			$data = array(
				'harga_jumlah' => $harga, 
				'harga_start_date' =>$date
			);

			
			if($this->dbObject->create_general("tb_harga", $data)===TRUE)		// using direct parameter
			{
				
				?>
				<script> 
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>admin/administrasi/harga"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>admin/administrasi/harga"); 
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
            }
            
		}
		else {
            $data['harga'] = $this->dbObject->get_harga('tb_harga')->row();
            $data['update'] = "true";
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/administrasi/harga/list', $data);
            $this->load->view('admin/templates/footer');
		}
    }
    
}
