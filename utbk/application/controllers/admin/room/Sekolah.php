<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login') == 0) redirect('auth/logout');
		
        $this->session->set_userdata('menu','room');
        $this->session->set_userdata('submenu','peserta_sekolah');
		$this->load->model('admin/room/sekolah_model', 'dbObject');
		
    }
	public function index()
	{
		$where = array(
		);
		$data['sekolah'] = $this->dbObject->get_general('tb_sekolah', $where); 
		$data['room'] = $this->dbObject->get_general('tb_room', $where); 
		$data['sekolah_peserta'] = $this->dbObject->join_peserta('tb_room', $where)->result(); 
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/room/sekolah/list', $data);
		$this->load->view('admin/templates/footer');
	} 
	public function hapus($param="", $param2)
	{
		$where = array(
			'peserta_id' => $param2 
		);
		if($this->dbObject->delete_general('tb_peserta', $where)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil dihapus. ");
					location.replace("<?=base_url()?>admin/room/sekolah"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>admin/room/sekolah"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
	} 
	public function update($param="", $param2=""){
		if($param=='do_update'){
			 $room=$this->input->post('room');
		$sekolah=$this->input->post('sekolah'); 

		$room = array(
			'room_id' => $room, 
			'sekolah_id' => $sekolah 
		);

			if($this->dbObject->update_general("tb_sekolah_room",'sekolah_room_id', $param2, $room)===TRUE)	// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>admin/room/sekolah"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>admin/room/sekolah/update/<?=$param."/".$param2?>"); 
				</script>
				<?php
			}
		}else{
			$where = array(
			);
			$data['sekolah'] = $this->dbObject->get_general('tb_sekolah', $where); 
			$data['room'] = $this->dbObject->get_general('tb_room', $where); 
			$data['sekolah_peserta'] = $this->dbObject->join_sekolah_peserta_update($param)->result(); 

			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/room/sekolah/update', $data);
            $this->load->view('admin/templates/footer');
		}
	}
	public function list_peserta($sekolah_peserta="", $room=""){
		$where = array(
		
		);
		// $data['sekolah'] = $this->dbObject->get_general('tb_sekolah', $where); 
		// $data['room'] = $this->dbObject->get_general('tb_room', $where); 
		// $data['sekolah_peserta'] = $this->dbObject->join_peserta('tb_room', $where)->result(); 
		$data['ditail_peserta'] = $this->dbObject->detail_peserta($sekolah_peserta)->result();
		$data['sekolah'] = $this->dbObject->data_sekolah($sekolah_peserta)->result(); 
		$data['room'] = $room;
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/room/sekolah/list_peserta', $data);
		$this->load->view('admin/templates/footer');
	}
    public function tambah_relasi($param=""){
        
		$room=trim($this->input->post('room'));
		$sekolah=trim($this->input->post('sekolah')); 
		$id_soal = $this->dbObject->auto_number_peserta();
		

		$room = array(
			'sekolah_peserta_id' => $id_soal, 
			'room_id' => $room, 
			'sekolah_id' => $sekolah 
		);
			if($this->dbObject->create_general("tb_sekolah_peserta", $room)===TRUE)		// using direct parameter
			{
				?>
					<script> 
						alert(" Data berhasil disimpan. ");
						location.replace("<?=base_url()?>admin/room/sekolah"); 
					</script>
					<?php
					//redirect('master/jabatan','refresh');
				 
            
		}
		else {
			
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/room/sekolah/tambah');
            $this->load->view('admin/templates/footer');
		}
	}

	public function tambah($param="", $param2=""){
        if($param=='do_create'){
			
			$id_pg = $this->dbObject->cek_peserta_max('peserta_id', "tb_peserta")->result();
			
			$jumlah = count($_POST["peserta_username"]);  
				if($jumlah > 0){
					
					for($i=0; $i<$jumlah; $i++){
						$tambah_id = $id_pg[0]->peserta_id+1;
						 
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
						$sekolah_peserta = array(
							'peserta_id' => $tambah_id,
							'room_id' => $tambah_id,
							'sekolah_id' => $param2,
						);
						if($this->dbObject->create_general("tb_peserta", $peserta)===TRUE)		// using direct parameter
						{
							$this->dbObject->create_general("tb_sekolah_peserta", $sekolah_peserta);
							
							?>
							<script> 
								alert(" Data berhasil disimpan. ");
								location.replace("<?=base_url()?>admin/room/sekolah/tampil_peserta_room/<?=$param2?>"); 
							</script>
							<?php
							//redirect('master/jabatan','refresh');
						}
						else {
							?>
							<script> 
								alert(" Data gagal disimpan. ");
								location.replace("<?=base_url()?>admin/room/sekolah/tambah/<?=$param2?>"); 
							</script>
							<?php
							//redirect('master/jabatan_insert','refresh');
						}
						
					}
				}


            
		}
		else {
			$where= array();
			$data['sekolah']=$param;
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/room/sekolah/tambah_peserta', $data);
            $this->load->view('admin/templates/footer');
		}
    }
	
	
	














	//peserta
	public function hapus_peserta($param="", $param2="", $param3="")
	{
		$where = array(
			'peserta_id' => $param3
		);
		if($this->dbObject->delete_general('tb_peserta', $where)===TRUE)		// using direct parameter
			{
				$this->dbObject->delete_general('tb_peserta_dari_sekolah', $where)
				?>
				<script> 
					alert(" Data berhasil dihapus. ");
					location.replace("<?=base_url()?>admin/room/sekolah/list_peserta/<?=$param?>/<?=$param2?>"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>admin/room/sekolah/list_peserta/<?=$param?>/<?=$param2?>"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
	} 
	public function tambah_peserta($param="", $param2="", $param3=""){
		
        if($param=='do_create'){
			
			$id_pg = $this->dbObject->cek_peserta_max('peserta_id', "tb_peserta")->result();
			
			$jumlah = count($_POST["peserta_username"]);  
			$gagal=false;
				if($jumlah > 0){
					 $tambah_id = $id_pg[0]->peserta_id;
					for($i=0; $i<$jumlah; $i++){
						// echo $tambah_id = $id_pg[0]->peserta_id+1;
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
							'room_id' => $param3
						);
						$sekolah_peserta = array(
							'peserta_id' => $tambah_id,
							'sekolah_peserta_id' => $param2,
						);
						
						if($this->dbObject->create_general("tb_peserta", $peserta)===true)		// using direct parameter
						{
							$this->dbObject->create_general("tb_peserta_dari_sekolah", $sekolah_peserta);
							$gagal= false;
						}else{
							$gagal=true;
						}
					}
				}
						if($gagal==false)		// using direct parameter
						{
							
							
							?>
							<script> 
								alert(" Data berhasil disimpan. ");
								location.replace("<?=base_url()?>admin/room/sekolah/list_peserta/<?=$param2?>/<?=$param3?>"); 
							</script>
							<?php
							//redirect('master/jabatan','refresh');
						}
						else {
							?>
							<script> 
								alert(" Data gagal disimpan. ");
								location.replace("<?=base_url()?>admin/room/sekolah/tambah_peserta/<?=$param2?>/<?=$param3?>"); 
							</script>
							<?php
							//redirect('master/jabatan_insert','refresh');
						}
						
				


            
		}
		else {
			$where= array();
			$data['sekolah']=$param;
			$data['room']=$param2;
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/room/sekolah/tambah_peserta', $data);
            $this->load->view('admin/templates/footer');
		}
	}
	
	public function update_peserta($param="", $param2="", $param3=""){
		if($param=='do_update'){
			 $username=$this->input->post('username');

		$room = array(
			'peserta_username' => $room
		);

			if($this->dbObject->update_general("tb_peserta",'peserta_id', $param3, $room)===TRUE)	// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>admin/room/sekolah/list_peserta/<?=$param?>/<?=$param2?>"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>admin/room/sekolah/update_peserta/<?=$param."/".$param2."/".$param3?>"); 
				</script>
				<?php
			}
		}else{
			$where_room = array(
				'room_id' => $param2
			);
			$data['sekolah'] = $param; 
			$data['room'] = $param2; 
			$data['peserta'] = $this->dbObject->join_sekolah_peserta_update($param3)->result(); 
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/room/sekolah/update_peserta', $data);
            $this->load->view('admin/templates/footer');
		}
	}
}
