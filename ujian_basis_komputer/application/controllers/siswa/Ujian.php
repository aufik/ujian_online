<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {
	public function __construct()
    {   parent::__construct();

		if ($this->session->userdata('login') == 0) redirect('siswa/auth/logout');
		if ($this->session->userdata('token_berhasil') == 0) redirect('siswa/biodata');
		if ($this->session->userdata('telah_ujian') == 1) redirect('siswa/biodata');
		
        $this->session->set_userdata('menu','siswa');
        $this->session->set_userdata('submenu','siswa_biodata');
		$this->load->model('siswa/ujian_model', 'dbObject');
    }
	public function index()
	{
				
		
		
		$where_peserta = array(
			'peserta_id' =>  $_SESSION['id_peserta']
		);
		$data['peserta'] = $this->dbObject->get_general('tb_peserta', $where_peserta)->row(); 
		// echo $data['biodata']->peserta_id;
		$where_room = array(
			'room_id' =>  $data['peserta']->room_id,
		);
		$data['room'] = $this->dbObject->get_general('tb_room', $where_room)->row(); 
		$data['status_ujian'] = $data['peserta'] ->status_ujian; 
		
		
		
		
		if($data['status_ujian'] == '0' ){
			$where_option = array(
				'room_id' =>  $data['peserta']->room_id,
			);
			$option = $this->dbObject->get_general('tb_option', $where_option)->row(); 
			// if($option->option_ujian_jawaban == "1" or $option->option_ujian_jawaban == "3"){
				$where_mapel_soalnya = array(
				
				);
				if($option->option_ujian_jawaban == "1"){
					$where_mapel_soalnya = array(
						"tb_soal_mapel.jurusan_id" => "1",
					);
				}elseif($option->option_ujian_jawaban == "2"){
					$where_mapel_soalnya = array(
						"tb_soal_mapel.jurusan_id" => "2",
					);
				}

				if($option->option_acak == "on"){
					$urut = "RANDOM";
				}else{
					$urut = "ASC";
				}
			
			
			
				$soal_test = $this->dbObject->soal($data['room']->room_jumlah_soal, $urut, $where_mapel_soalnya);
				$soal = $soal_test->result_Array();
				$jumlah_soal = $soal_test->num_rows();

			$list_soal = "";
			foreach($soal as $s){
				 $list_soal .= $s['soal_id']."#####";
			};
			
			 $id_ujian = $this->dbObject->auto_number_ujian();
			$this->session->set_userdata('ujian_id', $id_ujian);

			$update_data_peserta = array(
				'status_ujian'=> $id_ujian
			);
			
			$time=$data['time_start']= date("Y-m-d H:i:s");
		// echo date("H:i:s");
		
		  $time2=$data['total_waktu']= date("H:i:s", strtotime($data['room']->room_total_waktu));
		
		 $secs = strtotime($time2)-strtotime("00:00:00");
		 $waktu_selesai = date("Y-m-d H:i:s", strtotime($time)+$secs);
		 
			
			$date_mulai = date("Y-m-d h:i:s");
			$data_ujian = array(
				'ujian_id'=>$id_ujian,
				'peserta_id'=>$_SESSION['id_peserta'],
				'ujian_list_soal'=>$list_soal,
				'ujian_list_jawaban'=>'',
				'ujian_jumlah_benar'=>'',
				'ujian_nilai'=>'',
				'ujian_waktu_mulai'=>$date_mulai,
				'ujian_waktu_selesai'=>$waktu_selesai,
				'ujian_jumlah_soal'=>$jumlah_soal
			);
			$this->dbObject->update_general("tb_peserta", 'peserta_id', $_SESSION['id_peserta'] ,$update_data_peserta);
			if($this->dbObject->create_general("tb_ujian", $data_ujian)===TRUE){
				?>
				<script> 
					alert(" Soal Telah dipilih. ");
				</script>
				<?php
				redirect('siswa/ujian/proses','refresh');
			}else{
				?>
				<script> 
					alert(" Soal Tidak Bisa dipilih. ");
				</script>
				<?php
				redirect('siswa/biodata','refresh');
			}
			// print_r($soal);
			// echo $soal['0']['soal_id'];
			// paginitation
			

			

			// $this->load->view('siswa/template/header');
			// $this->load->view('siswa/template/sidebar_ujian', $data);
			// $this->load->view('siswa/soal', $data);
			// $this->load->view('siswa/template/footer');
		}else{
			$where_ujian = array(
				'peserta_id' =>  $_SESSION['id_peserta']
			);
			$ujian = $this->dbObject->get_general('tb_ujian', $where_ujian)->row(); 
			
			$this->session->set_userdata('ujian_id', $ujian->ujian_id);
			redirect('siswa/ujian/proses','refresh');
		} 
        
	}
	public function proses(){
		
		$where_ujian = array(
			'ujian_id' =>  $_SESSION['ujian_id']
		);
		$data['ujian']=$ujian = $this->dbObject->get_general('tb_ujian', $where_ujian)->row(); 

		$where_peserta = array(
			'peserta_id' =>  $_SESSION['id_peserta']
		);
		$data['peserta'] = $this->dbObject->get_general('tb_peserta', $where_peserta)->row(); 
		$where_peserta = array(
			'peserta_id' =>  $_SESSION['id_peserta']
		);
		$data['peserta'] = $this->dbObject->get_general('tb_peserta', $where_peserta)->row(); 
		// echo $data['biodata']->peserta_id;
		
		$where_room = array(
			'room_id' =>  $data['peserta']->room_id,
		);
		$data['room'] = $this->dbObject->get_general('tb_room', $where_room)->row(); 
		// date("Y-m-d h:i:s")
		$data['status_ujian'] = $data['peserta'] ->status_ujian;
		// echo $ujian->ujian_waktu_mulai;
		 


		// $data['date_start']= date("d-m-Y", strtotime($data['room']->room_date));
		// $data['date_finnish']= date("d-m-Y", strtotime($data['room']->room_date_finish));
		// $limit_page = 1;
		 $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
		 $data['page'] = $page+1;
		//  $total = $ujian->ujian_jumlah_soal;
		$data['waktu_selesai'] = $ujian->ujian_waktu_selesai;
		// $random_soal = $this->dbObject->random_soal($data['room']->room_jumlah_soal);
		// $soal = $random_soal->result_Array();
		
		
		
		$where_soal = array(
			'soal_id' =>  $_SESSION['id_peserta']
		);
		$data['id_soal'] = $array_soal =  explode("#####",$ujian->ujian_list_soal);
		$data['id_soal_dijawab'] = $array_soal_dijawab =  explode("#####",$ujian->ujian_list_soal_dijawab);
		$data['id_list_dijawab'] = $array_soal_dijawab =  explode("#####",$ujian->ujian_list_jawaban);
		$result_soal = $this->dbObject->get_by_id_general("tb_soal", 'soal_id', $array_soal[$page]);
		$data['results'] = $result_soal;
		if($result_soal[0]->soal_type_jawaban == 1){
			$data['jawaban_pg'] = $this->dbObject->get_by_id_general_pg_jw("tb_jawaban_pg", 'soal_id', $array_soal[$page]);
			
		}else{
			$data['jawaban_essay'] = $this->dbObject->get_by_id_general("tb_jawaban_essay", 'soal_id', $array_soal[$page]);
			
		}
		
		$this->load->view('siswa/template/header');
		$this->load->view('siswa/template/sidebar_ujian', $data);
		$this->load->view('siswa/soal', $data);
		$this->load->view('siswa/template/footer', $data);
		
		// $data['peserta'] = $this->dbObject->get_general('tb_peserta', $where_peserta)->row(); 
		// $get_by_id
	
	}
	public function jawab($param="", $jawabannya=""){
		// echo $jawabannya;
		$data['ket_jawaban'] = $this->dbObject->get_by_id_general("tb_jawaban_pg", 'pg_id', $jawabannya);
		$data['ket_ujian'] = $this->dbObject->get_by_id_general("tb_ujian", 'ujian_id', $_SESSION['ujian_id']);
		
		$array_jawaban_db =  explode("#####",$data['ket_ujian'][0]->ujian_list_jawaban);
		$array_ujian_list_soal_dijawab =  explode("#####",$data['ket_ujian'][0]->ujian_list_soal_dijawab);
		$ujian_list_jawaban='';
		$ujian_list_soal_dijawab='';
		
		for($ast = 0; $ast<count($array_ujian_list_soal_dijawab)-1; $ast++){
			if($array_ujian_list_soal_dijawab[$ast] != $data['ket_jawaban'][0]->soal_id){
				
				$ujian_list_jawaban = $ujian_list_jawaban.$array_jawaban_db[$ast]."#####";
				$ujian_list_soal_dijawab = $ujian_list_soal_dijawab.$array_ujian_list_soal_dijawab[$ast]."#####";
			}
		}
		$ujian_list_jawaban = $ujian_list_jawaban.$jawabannya."#####";
		$ujian_list_soal_dijawab = $ujian_list_soal_dijawab.$data['ket_jawaban'][0]->soal_id."#####";
		
		 $data_ujian = array(
			'peserta_id'=>$_SESSION['id_peserta'],
			'ujian_list_soal_dijawab'=>$ujian_list_soal_dijawab,
			'ujian_list_jawaban'=>$ujian_list_jawaban,
			// 'ujian_jumlah_benar'=>'',
		);
		// print_r($data_ujian);
		
		if($this->dbObject->update_general("tb_ujian", 'ujian_id', $_SESSION['ujian_id'],$data_ujian)===TRUE){
			
			redirect("siswa/ujian/proses/$param",'refresh');
		}else{
			
			redirect('siswa/ujian/proses','refresh');
		}


	}

	
	public function hasil(){
		$where_peserta = array(
			'peserta_id' =>  $_SESSION['id_peserta']
		);
		$data['peserta'] = $this->dbObject->get_general('tb_peserta', $where_peserta)->row(); 
		
		$where_room = array(
			'room_id' => $data['peserta']->room_id,
		);
		$data['room'] = $this->dbObject->get_general('tb_room', $where_room)->row(); 
		$where_ujian = array(
			'ujian_id' =>  $_SESSION['ujian_id']
		);
		$data['ujian']=$ujian = $this->dbObject->get_general('tb_ujian', $where_ujian)->row(); 
		
		$array_soal_dijawab =  explode("#####",$ujian->ujian_list_jawaban);
		$array_soal =  explode("#####",$ujian->ujian_list_soal);
		$nilai = 0;
		$total_yang_dijawab=0;
		
		for($i=0; $i<count($array_soal_dijawab)-1; $i++){
			// echo $array_soal_dijawab[$i];
			$ket_pg = $this->dbObject->get_by_id_general_pg_jw("tb_jawaban_pg", 'pg_id', $array_soal_dijawab[$i]);
			$nilai += $ket_pg[0]->pg_bobot;
			$total_yang_dijawab++;
			
		}

		$data_ujian = array(
			'ujian_nilai'=>$nilai,
			'ujian_status'=> '1'
		);
		$this->session->set_userdata('telah_ujian', "1");
		$this->dbObject->update_general("tb_ujian", 'ujian_id', $_SESSION['ujian_id'],$data_ujian);
		
		 $data['total_nilai']=$nilai;
		$data['total_yang_dijawab']=$total_yang_dijawab;
		
		$data['total_soal']=count($array_soal)-1;

		$this->load->view('siswa/hasil', $data);
	}
    
}
