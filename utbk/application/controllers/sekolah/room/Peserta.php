<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login_sekolah') == 0) redirect('login/logout');
		if ($this->session->userdata('login') == 1) redirect('login/logout');
		
        $this->session->set_userdata('menu','room');
        $this->session->set_userdata('submenu','room_peserta');
		$this->load->model('sekolah/room/peserta_model', 'dbObject');
    }
	public function index()
	{
		// $data['peserta'] = $this->dbObject->join_general('tb_sekolah', 'tb_peserta', 'sekolah_id', 'sekolah_id')->result(); 
		$this->load->view('sekolah/templates/header');
		$this->load->view('sekolah/templates/sidebar');
		// $this->load->view('sekolah/room/peserta/list', $data);
		$this->load->view('sekolah/room/peserta/list');
		$this->load->view('sekolah/templates/footer');
	}
	public function tampil_peserta_room($param=""){
            $where= array(
				'room_id' => $param 
			);
			$data['room']=$this->dbObject->get_general("tb_room", $where);
			$sekolah_id = $this->session->userdata('sekolah_id');
			$data['peserta'] = $this->dbObject->get_peserta_sekolah($sekolah_id,  $param)->result();
			
			$this->load->view('sekolah/templates/header');
            $this->load->view('sekolah/templates/sidebar');
            $this->load->view('sekolah/room/peserta/list', $data);
            $this->load->view('sekolah/templates/footer');
	}
	public function kaitkan_siswa($param="", $param2=""){
		if($param=='do_create'){
			
			$id_pg = $this->dbObject->cek_peserta_max('peserta_id', "tb_peserta")->result();
			
			$jumlah = count($_POST["peserta_username"]);
			$gagal = false;  
				if($jumlah > 0){
					$tambah_id = $id_pg[0]->peserta_id;
					for($i=0; $i<$jumlah; $i++){
						
						 $tambah_id++;
						// echo $pganda."---";
						$np=$tambah_id.random_string('numeric', 5);
						$token=$tambah_id.random_string('alnum', 6);
						$nomor=$i+1;
						$username = $this->input->post("peserta_username[$i]");
						$nisn = $this->input->post("nisn[$i]");
						$anp = date('dmy');
						$nomor_peserta = $anp."-".$tambah_id."-".$np;

						$peserta= array(
							'peserta_id' => $tambah_id,
							'peserta_password' => md5($nisn),
							'peserta_password_ret' => $nisn,
							'peserta_token' => $token,
							'peserta_username' => $username,
							'peserta_nomor' =>$nomor_peserta,
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
								location.replace("<?=base_url()?>sekolah/room/peserta/tampil_peserta_room/<?=$param2?>"); 
							</script>
							<?php
							//redirect('master/jabatan','refresh');
						}
						else {
							?>
							<script> 
								alert(" Data gagal disimpan. ");
								location.replace("<?=base_url()?>sekolah/room/peserta/tambah/<?=$param2?>"); 
							</script>
							<?php
							//redirect('master/jabatan_insert','refresh');
						}


            
		}
		else {
			$where= array();
			$data['room']=$param;
			$this->load->view('sekolah/templates/header');
            $this->load->view('sekolah/templates/sidebar');
            $this->load->view('sekolah/room/peserta/kaitkan', $data);
            $this->load->view('sekolah/templates/footer');
		}
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
					location.replace("<?=base_url()?>sekolah/room/peserta/tampil_peserta_room/<?=$param;?>"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>sekolah/room/peserta/tampil_peserta_room/<?=$param?>"); 
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
					location.replace("<?=base_url()?>sekolah/room/peserta/tampil_peserta_room/<?=$param2?>"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>sekolah/room/peserta/update/<?=$param2?>/<?=$param3?>"); 
				</script>
				<?php
			}
		}else{
			$where = array(
				'peserta_id' => $param2, 
			);
			$data['peserta']=$this->dbObject->get_general("tb_peserta", $where);
			$data['room']=$param;
			$this->load->view('sekolah/templates/header');
            $this->load->view('sekolah/templates/sidebar');
            $this->load->view('sekolah/room/peserta/update', $data);
            $this->load->view('sekolah/templates/footer');
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
						$np=$tambah_id.random_string('numeric', 5);
						$token=$tambah_id.random_string('alnum', 6);
						$nomor=$i+1;
						$username = $this->input->post("peserta_username[$i]");
						$nisn = $this->input->post("nisn[$i]");
						$anp = date('dmy');
						$nomor_peserta = $anp."-".$tambah_id."-".$np;

						$peserta= array(
							'peserta_id' => $tambah_id,
							'peserta_password' => md5($nisn),
							'peserta_password_ret' => $nisn,
							'peserta_token' => $token,
							'peserta_username' => $username,
							'peserta_nomor' =>$nomor_peserta,
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
								location.replace("<?=base_url()?>sekolah/room/peserta/tampil_peserta_room/<?=$param2?>"); 
							</script>
							<?php
							//redirect('master/jabatan','refresh');
						}
						else {
							?>
							<script> 
								alert(" Data gagal disimpan. ");
								location.replace("<?=base_url()?>sekolah/room/peserta/tambah/<?=$param2?>"); 
							</script>
							<?php
							//redirect('master/jabatan_insert','refresh');
						}


            
		}
		else {
			$where= array();
			$data['room']=$param;
			$this->load->view('sekolah/templates/header');
            $this->load->view('sekolah/templates/sidebar');
            $this->load->view('sekolah/room/peserta/tambah', $data);
            $this->load->view('sekolah/templates/footer');
		}
	}
	public function lihat_nilai($param=""){
		$sekolah_id= $this->session->userdata('sekolah_id');
		$cek_ujian_peserta = $this->dbObject->cek_nilai_ujian_sekolah($this->session->userdata('sekolah_id'))->row();
		print_r($cek_ujian_peserta);

		$where= array(
			'room_id' => $param 
		);
		$data['room']=$this->dbObject->get_general("tb_room", $where);
		$data['peserta'] = $this->dbObject->get_peserta_sekolah_nilai($sekolah_id,  $param)->result();
		print_r($data['peserta']);
		die;
		foreach($data['peserta'] as $pst => $pt){
			echo $pt->peserta_id;
			$data['nilai'][] = $this->dbObject->get_nilai($pt->peserta_id )->result();
		}
		print_r($data['nilai']);
		die;
		$this->load->view('sekolah/templates/header');
		$this->load->view('sekolah/templates/sidebar');
		$this->load->view('sekolah/room/peserta/nilai', $data);
		$this->load->view('sekolah/templates/footer');
	}
    
}
