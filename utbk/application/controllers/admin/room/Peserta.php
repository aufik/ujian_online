<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login') == 0) redirect('auth/logout');
		
        $this->session->set_userdata('menu','room');
        $this->session->set_userdata('submenu','room_peserta');
		$this->load->model('admin/room/peserta_model', 'dbObject');
    }
	public function index()
	{
		// $data['peserta'] = $this->dbObject->join_general('tb_sekolah', 'tb_peserta', 'sekolah_id', 'sekolah_id')->result(); 
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		// $this->load->view('admin/room/peserta/list', $data);
		$this->load->view('admin/room/peserta/list');
		$this->load->view('admin/templates/footer');
	}
	public function tampil_peserta_room($param=""){
            $where= array(
				'room_id' => $param 
			);
			$data['room']=$this->dbObject->get_general("tb_room", $where);
            $data['peserta'] = $this->dbObject->get_general("tb_peserta", $where);
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/room/peserta/list', $data);
            $this->load->view('admin/templates/footer');
    }
	public function hapus($param="", $param2="")
	{
		$where = array(
			'peserta_id' => $param2 
		);
		
		if($this->dbObject->delete_general('tb_peserta', $where)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil dihapus. ");
					location.replace("<?=base_url()?>admin/room/peserta/tampil_peserta_room/<?=$param;?>"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>admin/room/peserta/tampil_peserta_room/<?=$param?>"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
			
	}
	
	public function update($param="", $param2="", $param3=""){
		//do_update//room//id
		if($param=='do_update'){
			$username=trim($this->input->post('peserta_username'));
			
			$peserta= array(
				'peserta_username' => $username,
			);
			if($this->dbObject->update_general("tb_peserta", 'peserta_id', $param3, $peserta)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>admin/room/peserta/tampil_peserta_room/<?=$param2?>"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>admin/room/peserta/update/<?=$param2?>/<?=$param3?>"); 
				</script>
				<?php
			}
		}else{
			$where = array(
				'peserta_id' => $param2, 
			);
			$data['peserta']=$this->dbObject->get_general("tb_peserta", $where);
			$data['room']=$param;
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/room/peserta/update', $data);
            $this->load->view('admin/templates/footer');
		}
	}
    public function tambah($param="", $param2=""){
        if($param=='do_create'){
			
			$id_pg = $this->dbObject->cek_peserta_max('peserta_id', "tb_peserta")->result();
			
			$jumlah = count($_POST["peserta_username"]);
			$gagal = false;  
				if($jumlah > 0){
					$tambah_id = $id_pg[0]->peserta_id;
					for($i=0; $i<$jumlah; $i++){
						
						 $tambah_id++;
						// echo $pganda."---";
						$password=$tambah_id.random_string('alnum', 6);
						$token=$tambah_id.random_string('alnum', 4);
						$nomor=$i+1;
						$username = url_title(strtolower($this->input->post("peserta_username[$i]")), 'underscore');
						$peserta= array(
							'peserta_id' => $tambah_id,
							'peserta_password' => md5($password),
							'peserta_password_ret' => $password,
							'peserta_token' => $token,
							'peserta_username' => $username,
							'room_id' => $param2
						);
						
						if($this->dbObject->create_general("tb_peserta", $peserta)===TRUE)		{
							$gagal=false;
						}else{
							$gagal=true;
						}
					}
				}
				if($gagal ==false)		// using direct parameter
						{
							
							?>
							<script> 
								alert(" Data berhasil disimpan. ");
								location.replace("<?=base_url()?>admin/room/peserta/tampil_peserta_room/<?=$param2?>"); 
							</script>
							<?php
							//redirect('master/jabatan','refresh');
						}
						else {
							?>
							<script> 
								alert(" Data gagal disimpan. ");
								location.replace("<?=base_url()?>admin/room/peserta/tambah/<?=$param2?>"); 
							</script>
							<?php
							//redirect('master/jabatan_insert','refresh');
						}


            
		}
		else {
			$where= array();
			$data['room']=$param;
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/room/peserta/tambah', $data);
            $this->load->view('admin/templates/footer');
		}
    }
    
}
