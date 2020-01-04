<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login_sekolah') == 0) redirect('login/logout');
		if ($this->session->userdata('login') == 1) redirect('login/logout');
		
        $this->session->set_userdata('menu','akademik');
        $this->session->set_userdata('submenu','akademik_siswa');
		$this->load->model('admin/akademik/siswa_model', 'dbObject');
    }
	public function index()
	{
		$data['siswa'] = $this->dbObject->join_general('tb_sekolah', 'tb_siswa', 'sekolah_id', 'sekolah_id')->result(); 
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/akademik/siswa/list', $data);
		$this->load->view('admin/templates/footer');
	}
	public function reset($param="", $param2="")
	{
		$data = array(
			'siswa_password' => md5($param2)
		);
		if($this->dbObject->update_general('tb_siswa', 'siswa_id', $param, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert("Password berhasil direset. ");
					location.replace("<?=base_url()?>admin/akademik/siswa"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert("Password gagal direset. ");
					location.replace("<?=base_url()?>admin/akademik/siswa"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
    }
	public function hapus($param="")
	{
		$where = array(
			'siswa_id' => $param 
		);
		if($this->dbObject->delete_general('tb_siswa', $where)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil dihapus. ");
					location.replace("<?=base_url()?>admin/akademik/siswa"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>admin/akademik/siswa"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
	}
	public function status($param="", $param2=""){
		
		if($param2== "1"){
			$data = array(
				'siswa_status' => "0"
			);
		}elseif($param2=="0"){
			
			$data = array(
				'siswa_status' => "1"
			);
		}else{
			location.replace("<?=base_url()?>admin/akademik/siswa"); 	
		}

		if($this->dbObject->update_general("tb_siswa", 'siswa_id', $param, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Status berhasil diubah. ");
					location.replace("<?=base_url()?>admin/akademik/siswa"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Status gagal diubah. ");
					location.replace("<?=base_url()?>admin/akademik/siswa"); 
				</script>
				<?php
			}

	}
	public function update($param="", $param2=""){
		if($param=='do_update'){
			$nama=trim($this->input->post('nama'));
			$nisn=trim($this->input->post('nisn'));
			$email=trim($this->input->post('email'));
			$hp=trim($this->input->post('hp'));
			$sekolah=trim($this->input->post('sekolah')); 
			
			$data = array(
				'siswa_nama' => $nama, 
				'siswa_nisn' => $nisn,
				'siswa_email' => $email,
				'siswa_hp' => $hp,
				'sekolah_id' => $sekolah
			);
			if($this->dbObject->update_general("tb_siswa", 'siswa_id', $param2, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>admin/akademik/siswa"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>admin/akademik/siswa/update/<?=$param."/".$param2?>"); 
				</script>
				<?php
			}
		}else{
			$where = array(
				'siswa_id' => $param, 
			);
			$data['siswa'] = $this->dbObject->get_general('tb_siswa', $where); 
			$where= array();
			$data['sekolah'] = $this->dbObject->get_general('tb_sekolah', $where);
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/akademik/siswa/update', $data);
            $this->load->view('admin/templates/footer');
		}
	}
    public function tambah($param=""){
        if($param=='do_create'){
            $nama=trim($this->input->post('nama'));
			$nisn=trim($this->input->post('nisn'));
			$email=trim($this->input->post('email'));
			$hp=trim($this->input->post('hp'));
			$sekolah=trim($this->input->post('sekolah'));
			if($this->input->post('password')){
				$password = $this->input->post('password');
			}else{
				$password = $hp;
			}
			
			$data = array(
				'siswa_nama' => $nama, 
				'siswa_nisn' => $nisn,
				'siswa_email' => $email,
				'siswa_hp' => $hp,
				'sekolah_id' => $sekolah, 
				'siswa_password' => $password
			);
			if($this->dbObject->create_general("tb_siswa", $data)===TRUE)		// using direct parameter
			{
				
				?>
				<script> 
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>admin/akademik/siswa"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>admin/akademik/siswa"); 
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
            }
            
		}
		else {
			$where= array();
			$data['sekolah'] = $this->dbObject->get_general('tb_sekolah', $where);
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/akademik/siswa/tambah', $data);
            $this->load->view('admin/templates/footer');
		}
    }
    
}
