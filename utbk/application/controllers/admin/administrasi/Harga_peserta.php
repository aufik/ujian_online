<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga_peserta extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login') == 0) redirect('auth/logout');
		
        $this->session->set_userdata('menu','administrasi');
        $this->session->set_userdata('submenu','administrasi_discount');
		$this->load->model('admin/administrasi/discount_model', 'dbObject');
    }
	public function index()
	{   
        $data['discount'] = $this->dbObject->get_discount('tb_harga_discount')->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/administrasi/discount/list', $data);
		$this->load->view('admin/templates/footer');
	}
	
    public function tambah($param=""){
        if($param=='do_create'){
			$harga_dicount_kode=trim($this->input->post('harga_dicount_kode'));
			$harga_dicount_keterangan=trim($this->input->post('harga_dicount_keterangan'));
			$harga_dicount_jumlah=trim($this->input->post('harga_dicount_jumlah'));
			$harga_dicount_tipe=trim($this->input->post('harga_dicount_tipe'));
			$harga_dicount_date_start=trim($this->input->post('harga_dicount_date_start'));
			$harga_dicount_date_finnish=trim($this->input->post('harga_dicount_date_finnish'));
			$harga_dicount_limit=trim($this->input->post('harga_dicount_limit'));

			
			$data = array(
				'harga_dicount_kode' => $harga_dicount_kode, 
				'harga_dicount_keterangan' =>$harga_dicount_keterangan,
				'harga_dicount_jumlah' => $harga_dicount_jumlah, 
				'harga_dicount_tipe' =>$harga_dicount_tipe,
				'harga_dicount_date_start' => $harga_dicount_date_start, 
				'harga_dicount_date_finnish' => $harga_dicount_date_finnish, 
				'harga_dicount_limit' =>$harga_dicount_limit, 
				'harga_dicount_sisa_limit' =>$harga_dicount_limit
			);
			
			if($this->dbObject->create_general("tb_harga_discount", $data)===TRUE)		// using direct parameter
			{
				
				?>
				<script> 
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>admin/administrasi/discount"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>admin/administrasi/discount"); 
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
            }
            
		}
		else {
			$data['']=0;
            $this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/administrasi/discount/tambah', $data);
		$this->load->view('admin/templates/footer');
		}
	}
	public function update($param="", $param2=""){
        if($param=='do_update'){
			$harga_dicount_kode=trim($this->input->post('harga_dicount_kode'));
			$harga_dicount_keterangan=trim($this->input->post('harga_dicount_keterangan'));
			$harga_dicount_jumlah=trim($this->input->post('harga_dicount_jumlah'));
			$harga_dicount_tipe=trim($this->input->post('harga_dicount_tipe'));
			$harga_dicount_date_start=trim($this->input->post('harga_dicount_date_start'));
			$harga_dicount_date_finnish=trim($this->input->post('harga_dicount_date_finnish'));
			$harga_dicount_limit=trim($this->input->post('harga_dicount_limit'));

			
			$data = array(
				'harga_dicount_kode' => $harga_dicount_kode, 
				'harga_dicount_keterangan' =>$harga_dicount_keterangan,
				'harga_dicount_jumlah' => $harga_dicount_jumlah, 
				'harga_dicount_tipe' =>$harga_dicount_tipe,
				'harga_dicount_date_start' => $harga_dicount_date_start, 
				'harga_dicount_date_finnish' => $harga_dicount_date_finnish, 
				'harga_dicount_limit' =>$harga_dicount_limit, 
				'harga_dicount_sisa_limit' =>$harga_dicount_limit
			);
			if($this->dbObject->update_general("tb_harga_discount", "harga_dicount_id", $param2, $data)===TRUE)		// using direct parameter
			{
				
				?>
				<script> 
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>admin/administrasi/discount"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>admin/administrasi/discount"); 
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
            }
            
		}
		else {
			$data['']=0;
			$where= array(
				'harga_dicount_id' => $param
			);
			$data['discount'] = $this->dbObject->get_general('tb_harga_discount', $where);
            $this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/administrasi/discount/update', $data);
		$this->load->view('admin/templates/footer');
		}
	}
	public function hapus($param="")
	{
		$where = array(
			'harga_dicount_id' => $param 
		);
		if($this->dbObject->delete_general('tb_harga_discount', $where)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil dihapus. ");
					location.replace("<?=base_url()?>admin/administrasi/discount"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>admin/administrasi/discount"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
	}
    
}
