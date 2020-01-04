<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utbk extends CI_Controller {
	public function __construct()
    {   parent::__construct();

    	if ($this->session->userdata('login_sekolah') == 0) redirect('login/logout');
		if ($this->session->userdata('login') == 1) redirect('login/logout');
		
        $this->session->set_userdata('menu','room');
        $this->session->set_userdata('submenu','room_utbk');
		$this->load->model('sekolah/room/utbk_model', 'dbObject');
		
    }
	public function index()
	{
		$where = array(
		);
		
		$data['utbk'] = $this->dbObject->join_room_sekolah($this->session->userdata('sekolah_id'))->result(); 
		$this->load->view('sekolah/templates/header');
		$this->load->view('sekolah/templates/sidebar');
		$this->load->view('sekolah/room/utbk/list', $data);
		$this->load->view('sekolah/templates/footer');
	} 
	public function hapus($param="")
	{
		$where = array(
			'room_id' => $param 
		);
		if($this->dbObject->delete_general('tb_room', $where)===TRUE)		// using direct parameter
			{
				$this->dbObject->delete_general('tb_option', $where)
				?>
				<script> 
					alert(" Data berhasil dihapus. ");
					location.replace("<?=base_url()?>sekolah/room/utbk"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>sekolah/room/utbk"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}	
	}
	public function status($param="", $param2=""){
		
		if($param2== "1"){
			$data = array(
				'utbk_status' => "0"
			);
		}elseif($param2=="0"){
			
			$data = array(
				'utbk_status' => "1"
			);
		}else{
			location.replace("<?=base_url()?>sekolah/room/utbk"); 	
		}

		if($this->dbObject->update_general("tb_utbk", 'utbk_id', $param, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Status berhasil diubah. ");
					location.replace("<?=base_url()?>sekolah/room/utbk"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Status gagal diubah. ");
					location.replace("<?=base_url()?>sekolah/room/utbk"); 
				</script>
				<?php
			}

	}
	public function update($param="", $param2=""){
		
		if($param=='do_update'){
		$room_nama=trim($this->input->post('room_nama'));
		$room_time_start=trim($this->input->post('room_time_start'));
		$room_total_waktu=trim($this->input->post('room_total_waktu'));
		$room_date=trim($this->input->post('room_date'));
		$room_date_finish=trim($this->input->post('room_date_finish'));
		$room_jumlah_soal=trim($this->input->post('room_jumlah_soal'));
		$option_acak =trim($this->input->post('option_acak'));
		$option_show_kunci_jawaban =trim($this->input->post('option_show_kunci_jawaban'));
		$option_jenis_jawaban =trim($this->input->post('option_jenis_jawaban'));
		$room_keterangan=trim($this->input->post('room_keterangan'));
		$id_room = $this->dbObject->auto_number_room();
		
		$room = array(
			'room_id' => $param2,
			'room_nama' => $room_nama, 
			'room_total_waktu' => $room_total_waktu,
			'room_time_start' => $room_time_start,
			'room_date' => $room_date, 
			'room_date_finish' => $room_date_finish, 
			'room_jumlah_soal' =>$room_jumlah_soal,
			'room_keterangan' => $room_keterangan
		);
		$option = array(
			'room_id' => $param2,
			'option_acak' => $option_acak,
			'option_show_kunci_jawaban' => $option_show_kunci_jawaban ,
			'option_jenis_jawaban' => $option_jenis_jawaban 
			
		);
			if($this->dbObject->update_general("tb_room", 'room_id', $param2, $room)===TRUE)		// using direct parameter
			{
				if($this->dbObject->update_general("tb_option", 'room_id', $param2, $option)===FALSE){
					?>
				<script> 
					alert(" Peraturan gagal diubah. ");
					location.replace("<?=base_url()?>sekolah/room/utbk/update/<?=$param."/".$param2?>"); 
				</script>
				<?php
				}else{
						// using direct parameter
				?>
				<script> 
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>sekolah/room/utbk"); 
				</script>
				<?php
				}
			}
			else {
				?>
				<script> 
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>sekolah/room/utbk/update/<?=$param."/".$param2?>"); 
				</script>
				<?php
			}
		}else{
			$data['room'] = $this->dbObject->join_room_update($param)->result(); 
			$this->load->view('sekolah/templates/header');
            $this->load->view('sekolah/templates/sidebar');
            $this->load->view('sekolah/room/utbk/update', $data);
            $this->load->view('sekolah/templates/footer');
		}
	}

   
    
}
