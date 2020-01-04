<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login') == 0) redirect('auth/logout');
		
        $this->session->set_userdata('menu','akademik');
        $this->session->set_userdata('submenu','akademik_kelas');
		$this->load->model('admin/akademik/kelas_model', 'dbObject');
    }
	public function index()
	{
		$where = array(
		);
		$data['kelas'] = $this->dbObject->get_general('tb_kelas', $where); 
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/akademik/kelas/list', $data);
		$this->load->view('admin/templates/footer');
	}
	public function reset($param="", $param2="")
	{
		$data = array(
			'kelas_password' => md5($param2)
		);
		if($this->dbObject->update_general('tb_kelas', 'kelas_id', $param, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert("Password berhasil direset. ");
					location.replace("<?=base_url()?>admin/akademik/kelas"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert("Password gagal direset. ");
					location.replace("<?=base_url()?>admin/akademik/kelas"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
    }
	public function hapus($param="")
	{
		$where = array(
			'kelas_id' => $param 
		);
		if($this->dbObject->delete_general('tb_kelas', $where)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil dihapus. ");
					location.replace("<?=base_url()?>admin/akademik/kelas"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>admin/akademik/kelas"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
	}
	public function status($param="", $param2=""){
		
		if($param2== "1"){
			$data = array(
				'kelas_status' => "0"
			);
		}elseif($param2=="0"){
			
			$data = array(
				'kelas_status' => "1"
			);
		}else{
			location.replace("<?=base_url()?>admin/akademik/kelas"); 	
		}

		if($this->dbObject->update_general("tb_kelas", 'kelas_id', $param, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Status berhasil diubah. ");
					location.replace("<?=base_url()?>admin/akademik/kelas"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Status gagal diubah. ");
					location.replace("<?=base_url()?>admin/akademik/kelas"); 
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
				'kelas_nama' => $nama, 
				'kelas_email' => $email,
				'kelas_hp' => $hp,
				'kelas_alamat' => $alamat, 
				'kelas_status' => "1"
			);
			
			if($this->dbObject->update_general("tb_kelas", 'kelas_id', $param2, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>admin/akademik/kelas"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>admin/akademik/kelas/update/<?=$param."/".$param2?>"); 
				</script>
				<?php
			}
		}else{
			$where = array(
				'kelas_id' => $param, 
			);
			$data['kelas'] = $this->dbObject->get_general('tb_kelas', $where); 
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/akademik/kelas/update', $data);
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
				'kelas_nama' => $nama, 
				'kelas_email' => $email,
				'kelas_hp' => $hp,
				'kelas_alamat' => $alamat, 
				'kelas_password' => md5($password),
				'kelas_status' => "1"
			);

			
			if($this->dbObject->create_general("tb_kelas", $data)===TRUE)		// using direct parameter
			{
				
				?>
				<script> 
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>admin/akademik/kelas"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>admin/akademik/kelas"); 
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
            }
            
		}
		else {
			
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/akademik/kelas/tambah');
            $this->load->view('admin/templates/footer');
		}
    }
    
}
