<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Luar extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login') == 0) redirect('auth/logout');
		
        $this->session->set_userdata('menu','peserta');
        $this->session->set_userdata('submenu','peserta_Luar');
		$this->load->model('admin/peserta/Luar_model', 'dbObject');
    }
	public function index()
	{
		// $data['Luar'] = $this->dbObject->join_general('tb_sekolah', 'tb_Luar', 'sekolah_id', 'sekolah_id')->result(); 
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		// $this->load->view('admin/peserta/Luar/list', $data);
		$this->load->view('admin/peserta/Luar/list');
		$this->load->view('admin/templates/footer');
	}
	public function reset($param="", $param2="")
	{
		$data = array(
			'Luar_password' => md5($param2)
		);
		if($this->dbObject->update_general('tb_Luar', 'Luar_id', $param, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert("Password berhasil direset. ");
					location.replace("<?=base_url()?>admin/peserta/Luar"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert("Password gagal direset. ");
					location.replace("<?=base_url()?>admin/peserta/Luar"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
    }
	public function hapus($param="")
	{
		$where = array(
			'Luar_id' => $param 
		);
		if($this->dbObject->delete_general('tb_Luar', $where)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil dihapus. ");
					location.replace("<?=base_url()?>admin/peserta/Luar"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>admin/peserta/Luar"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
	}
	public function status($param="", $param2=""){
		
		if($param2== "1"){
			$data = array(
				'Luar_status' => "0"
			);
		}elseif($param2=="0"){
			
			$data = array(
				'Luar_status' => "1"
			);
		}else{
			location.replace("<?=base_url()?>admin/peserta/Luar"); 	
		}

		if($this->dbObject->update_general("tb_Luar", 'Luar_id', $param, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Status berhasil diubah. ");
					location.replace("<?=base_url()?>admin/peserta/Luar"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Status gagal diubah. ");
					location.replace("<?=base_url()?>admin/peserta/Luar"); 
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
				'Luar_nama' => $nama, 
				'Luar_nisn' => $nisn,
				'Luar_email' => $email,
				'Luar_hp' => $hp,
				'sekolah_id' => $sekolah
			);
			if($this->dbObject->update_general("tb_Luar", 'Luar_id', $param2, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>admin/peserta/Luar"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>admin/peserta/Luar/update/<?=$param."/".$param2?>"); 
				</script>
				<?php
			}
		}else{
			$where = array(
				'Luar_id' => $param, 
			);
			$data['Luar'] = $this->dbObject->get_general('tb_Luar', $where); 
			$where= array();
			$data['sekolah'] = $this->dbObject->get_general('tb_sekolah', $where);
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/peserta/Luar/update', $data);
            $this->load->view('admin/templates/footer');
		}
	}
    public function tambah($param=""){
        if($param=='do_create'){
            $peserta_username=trim($this->input->post('peserta_username'));
			$peserta_password=trim($this->input->post('peserta_password'));
			$email=peserta_token($this->input->post('peserta_token')); 
			
			$data = array(
				'Luar_nama' => $nama, 
				'Luar_nisn' => $nisn,
				'Luar_email' => $email,
				'Luar_hp' => $hp,
				'sekolah_id' => $sekolah, 
				'Luar_password' => $password
			);
			if($this->dbObject->create_general("tb_Luar", $data)===TRUE)		// using direct parameter
			{
				
				?>
				<script> 
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>admin/peserta/Luar"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>admin/peserta/Luar"); 
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
            }
            
		}
		else {
			$where= array();
			$data['password']=random_string('alnum', 8);
			$data['token']=random_string('alnum', 8);
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/peserta/Luar/tambah', $data);
            $this->load->view('admin/templates/footer');
		}
    }
    
}
