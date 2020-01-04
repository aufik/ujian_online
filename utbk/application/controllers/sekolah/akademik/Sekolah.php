<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login') == 0) redirect('auth/logout');
		
        $this->session->set_userdata('menu','akademik');
        $this->session->set_userdata('submenu','akademik_sekolah');
		$this->load->model('admin/akademik/Sekolah_model', 'dbObject');
    }
	public function index()
	{
		$where = array(
		);
		$data['sekolah'] = $this->dbObject->get_general('tb_sekolah', $where); 
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/akademik/sekolah/list', $data);
		$this->load->view('admin/templates/footer');
	}
	public function reset($param="", $param2="")
	{
		$data = array(
			'sekolah_password' => md5($param2)
		);
		if($this->dbObject->update_general('tb_sekolah', 'sekolah_id', $param, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert("Password berhasil direset. ");
					location.replace("<?=base_url()?>admin/akademik/sekolah"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert("Password gagal direset. ");
					location.replace("<?=base_url()?>admin/akademik/sekolah"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
    }
	public function hapus($param="")
	{
		$where = array(
			'sekolah_id' => $param 
		);
		if($this->dbObject->delete_general('tb_sekolah', $where)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil dihapus. ");
					location.replace("<?=base_url()?>admin/akademik/sekolah"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>admin/akademik/sekolah"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
	}
	public function status($param="", $param2=""){
		
		if($param2== "1"){
			$data = array(
				'sekolah_status' => "0"
			);
		}elseif($param2=="0"){
			
			$data = array(
				'sekolah_status' => "1"
			);
		}else{
			location.replace("<?=base_url()?>admin/akademik/sekolah"); 	
		}

		if($this->dbObject->update_general("tb_sekolah", 'sekolah_id', $param, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Status berhasil diubah. ");
					location.replace("<?=base_url()?>admin/akademik/sekolah"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Status gagal diubah. ");
					location.replace("<?=base_url()?>admin/akademik/sekolah"); 
				</script>
				<?php
			}

	}
	public function update($param="", $param2=""){
		if($param=='do_update'){
			$nama=trim($this->input->post('nama'));
			$email=trim($this->input->post('email'));
			$hp=trim($this->input->post('hp'));
			$alamat=trim($this->input->post('alamat'));
			
			
			$data = array(
				'sekolah_nama' => $nama, 
				'sekolah_email' => $email,
				'sekolah_hp' => $hp,
				'sekolah_alamat' => $alamat, 
				'sekolah_status' => "1"
			);
			
			if($this->dbObject->update_general("tb_sekolah", 'sekolah_id', $param2, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>admin/akademik/sekolah"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>admin/akademik/sekolah/update/<?=$param."/".$param2?>"); 
				</script>
				<?php
			}
		}else{
			$where = array(
				'sekolah_id' => $param, 
			);
			$data['sekolah'] = $this->dbObject->get_general('tb_sekolah', $where); 
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/akademik/sekolah/update', $data);
            $this->load->view('admin/templates/footer');
		}
	}
    public function tambah($param=""){
        if($param=='do_create'){
            $nama=trim($this->input->post('nama'));
			$email=trim($this->input->post('email'));
			$hp=trim($this->input->post('hp'));
			$alamat=trim($this->input->post('alamat'));
			if($this->input->post('password')){
				$password = $this->input->post('password');
			}else{
				$password = $hp;
			}
			
			$data = array(
				'sekolah_nama' => $nama, 
				'sekolah_email' => $email,
				'sekolah_hp' => $hp,
				'sekolah_alamat' => $alamat, 
				'sekolah_password' => md5($password),
				'sekolah_status' => "1"
			);

			
			if($this->dbObject->create_general("tb_sekolah", $data)===TRUE)		// using direct parameter
			{
				
				?>
				<script> 
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>admin/akademik/sekolah"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>admin/akademik/sekolah"); 
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
            }
            
		}
		else {
			
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/akademik/sekolah/tambah');
            $this->load->view('admin/templates/footer');
		}
    }
    
}
