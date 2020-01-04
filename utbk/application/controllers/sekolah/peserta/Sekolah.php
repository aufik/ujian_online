<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login_sekolah') == 0) redirect('login/logout');
		if ($this->session->userdata('login') == 1) redirect('login/logout');
		
        $this->session->set_userdata('menu','peserta');
        $this->session->set_userdata('submenu','peserta_sekolah');
		$this->load->model('admin/peserta/sekolah_model', 'dbObject');
		
    }
	public function index()
	{
		$where = array(
		);
		$data['sekolah'] = $this->dbObject->get_general('tb_sekolah', $where); 
		$data['room'] = $this->dbObject->get_general('tb_room', $where); 
		$data['sekolah_peserta'] = $this->dbObject->join_peserta('tb_room', $where)->result(); 
		print_r($data['sekolah_peserta']);
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/peserta/sekolah/list', $data);
		$this->load->view('admin/templates/footer');
	} 
	public function hapus($param="")
	{
		$where = array(
			'sekolah_peserta_id' => $param 
		);
		if($this->dbObject->delete_general('tb_sekolah_peserta', $where)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil dihapus. ");
					location.replace("<?=base_url()?>admin/peserta/sekolah"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>admin/peserta/sekolah"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
	} 
	public function update($param="", $param2=""){
		if($param=='do_update'){
			 $room=$this->input->post('room');
		$sekolah=$this->input->post('sekolah'); 

		$peserta = array(
			'room_id' => $room, 
			'sekolah_id' => $sekolah 
		);

			if($this->dbObject->update_general("tb_sekolah_peserta",'sekolah_peserta_id', $param2, $peserta)===TRUE)	// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>admin/peserta/sekolah"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>admin/peserta/sekolah/update/<?=$param."/".$param2?>"); 
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
            $this->load->view('admin/peserta/sekolah/update', $data);
            $this->load->view('admin/templates/footer');
		}
	}
    public function tambah_relasi($param=""){
        
		$room=trim($this->input->post('room'));
		$sekolah=trim($this->input->post('sekolah')); 
		$id_soal = $this->dbObject->auto_number_peserta();

		$peserta = array(
			'sekolah_peserta_id' => $id_soal, 
			'room_id' => $room, 
			'sekolah_id' => $sekolah 
		);

			if($this->dbObject->create_general("tb_sekolah_peserta", $peserta)===TRUE)		// using direct parameter
			{
				?>
					<script> 
						alert(" Data berhasil disimpan. ");
						location.replace("<?=base_url()?>admin/peserta/sekolah"); 
					</script>
					<?php
					//redirect('master/jabatan','refresh');
				 
            
		}
		else {
			
			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/peserta/sekolah/tambah');
            $this->load->view('admin/templates/footer');
		}
    }
    
}
