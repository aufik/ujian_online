<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utbk extends CI_Controller {
	public function __construct()
    {   parent::__construct();

		if ($this->session->userdata('login_sekolah') == 0) redirect('login/logout');
		if ($this->session->userdata('login') == 1) redirect('login/logout');
		
        $this->session->set_userdata('menu','soal');
        $this->session->set_userdata('submenu','soal_utbk');
		$this->load->model('sekolah/soal/utbk_model', 'dbObject');
		/* session kcfinder */
/* session kcfinder */


    }
	public function index()
	{
		$data['utbk'] = $this->dbObject->join_general_utbk_list()->result(); 
		$this->load->view('sekolah/templates/header');
		$this->load->view('sekolah/templates/sidebar');
		$this->load->view('sekolah/soal/utbk/list', $data);
		$this->load->view('sekolah/templates/footer');
	}
	
	public function hapus($param="")
	{
		$where = array(
			'soal_id' => $param 
		);
		@$this->dbObject->delete_general('tb_jawaban_essay', $where);
		@$this->dbObject->delete_general('tb_jawaban_pg', $where);
		if($this->dbObject->delete_general('tb_soal', $where)===TRUE)		// using direct parameter
			{
				$where = array(
					'soal_id' => $param 
				);
				@$this->dbObject->delete_general('tb_jawaban_essay', $where);
				@$this->dbObject->delete_general('tb_jawaban_pg', $where);
				?>
				<script> 
					alert(" Data berhasil dihapus. ");
					location.replace("<?=base_url()?>sekolah/soal/utbk"); 
				</script>
				<?php
				//redirect('backoffice/master/category','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal dihapus. ");
					location.replace("<?=base_url()?>sekolah/soal/utbk"); 
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
			location.replace("<?=base_url()?>sekolah/soal/utbk"); 	
		}

		if($this->dbObject->update_general("tb_utbk", 'utbk_id', $param, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Status berhasil diubah. ");
					location.replace("<?=base_url()?>sekolah/soal/utbk"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Status gagal diubah. ");
					location.replace("<?=base_url()?>sekolah/soal/utbk"); 
				</script>
				<?php
			}

	}
	public function update($param="", $param2=""){
		if($param=='do_update'){
			$mapel=trim($this->input->post('mapel'));
			$waktupeng=trim($this->input->post('waktupeng'));
			$isi=$this->input->post('isi');
			$jenis_jb=trim($this->input->post('jenis_jb'));
			$jawabanpganda=trim($this->input->post('pganda'));
			$essay=trim($this->input->post('essay'));
			$id_soal = $this->dbObject->auto_number_soal();
			$pg_jawaban_id = 0;

			$where = array(
				'soal_id' => $param2 
			);
			@$this->dbObject->delete_general('tb_jawaban_essay', $where);
			@$this->dbObject->delete_general('tb_jawaban_pg', $where);
			
			if($jenis_jb == "1"){
				$pilihan = count($_POST["pilihan"]);  
				if($pilihan > 0){
					$tambah=0;
					for($i=0; $i<$pilihan; $i++){
						$id_pg = $this->dbObject->auto_number_pg();
						// echo $pganda."---";

						$nomor=$i+1;
						$pg= array(
							'pg_id' => $id_pg,
							'pg_urut' => $nomor,
							'pg_isi' => $this->input->post("pilihan[$i]"),
							'pg_bobot' => $this->input->post("bobot[$nomor]"),
							'soal_id' => $param2
						);
						
						if($this->dbObject->create_general("tb_jawaban_pg",  $pg)===FALSE){ 
							?>
							<script> 
								alert(" Jawaban pilihan berganda <?=$i+1?> gagal di upload. ");
							</script>
							<?php
							print_r($pg);
							
							$tambah++;
						}
						
					}	
				}
				}else if($jenis_jb == "2"){
				
				$bobot=$this->input->post('bobot[0]');
				$essay= array(
					'essay_isi' => $this->input->post('essay'),
					'essay_bobot' => $bobot,
					'soal_id' => $param2
				);
				if($this->dbObject->create_general("tb_jawaban_essay",  $essay)===FALSE){ 
					?>
					<script> 
						alert(" Jawaban essay gagal di upload !!!. ");
					</script>
					<?php
				} 
			}
			@$data = array( 
				'soal_mapel_id' => $mapel, 
				'soal_isi' => $isi, 
				'soal_waktu' => $waktupeng, 
				'soal_type_jawaban' => $jenis_jb
			); 
			
			if($this->dbObject->update_general("tb_soal", 'soal_id', $param2, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>sekolah/soal/utbk"); 
				</script>
				<?php
			}
			else {
				?>
				<script> 
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>sekolah/soal/utbk/update/<?=$param."/".$param2?>"); 
				</script>
				<?php
			}
		}else{
			$where = array(
				'soal_id' => $param, 
			);
			$data['mapel'] = $this->dbObject->join_general('tb_soal_mapel', 'tb_soal_jurusan', 'jurusan_id', 'jurusan_id')->result(); 
			$data['soal'] = $this->dbObject->join_general_utbk_list_update($param)->result();
			@$data['jawaban_pg'] = $this->dbObject->general_utbk_list_update_jawaban($param)->result();
			@$data['jawaban_essay'] = $this->dbObject->general_utbk_list_update_jawaban_essay($param)->row();
			// print_r($data['jawaban_essay']->essay_isi);die;
			
			$this->load->view('sekolah/templates/header');
            $this->load->view('sekolah/templates/sidebar');
            $this->load->view('sekolah/soal/utbk/update', $data);
            $this->load->view('sekolah/templates/footer');
		}
	}
    public function tambah($param=""){

        if($param=='do_create'){
			
            $mapel=trim($this->input->post('mapel'));
			$waktupeng=trim($this->input->post('waktupeng'));
			$isi=$this->input->post('isi');
			$jenis_jb=trim($this->input->post('jenis_jb'));
			// $jawabanpganda=trim($this->input->post('pganda'));
			$essay=trim($this->input->post('essay'));
			$id_soal = $this->dbObject->auto_number_soal();
			// $pganda=trim($this->input->post('pganda'));
			$pg_jawaban_id = 0;
			$this->input->post("bobot[3]");
			
			if($jenis_jb == "1"){
				$pilihan = count($_POST["pilihan"]);  
				if($pilihan > 0){
					
					
					for($i=0; $i<$pilihan; $i++){
						$id_pg = $this->dbObject->auto_number_pg();
						// echo $pganda."---";

						if(@$pganda == "jawaban[$i]"){
							$pg_jawaban_id = $id_pg;
							// echo $pg_jawaban_id."----".$id_pg;
						}
						$nomor=$i+1;
						$pg= array(
							'pg_id' => $id_pg,
							'pg_urut' => $nomor,
							'pg_isi' => $this->input->post("pilihan[$i]"),
							'pg_bobot' => $this->input->post("bobot[$nomor]"),
							'soal_id' => $id_soal
						);
						if($this->dbObject->create_general("tb_jawaban_pg", $pg)===FALSE){
							?>
							<script> 
								alert(" Jawaban pilihan berganda <?=$i?> gagal di upload. ");
							</script>
							<?php
						}
						
					}
					// echo $pg_jawaban_id;
						// print_r($pg);
				
				}

			}else if($jenis_jb == "2"){
				$soal_type_jawaban = 2;
				$bobot=$this->input->post('bobot[0]');
				$essay= array(
					'essay_isi' => $this->input->post('essay'),
					'essay_bobot' => $bobot,
					'soal_id' => $id_soal
				);
				
				if($this->dbObject->create_general("tb_jawaban_essay", $essay)===FALSE){
					?>
					<script> 
						alert(" Jawaban essay gagal di upload !. ");
					</script>
					<?php
				}
			}
				
			$data = array( 
				'soal_id' => $id_soal, 
				'soal_mapel_id' => $mapel, 
				'soal_isi' => $isi, 
				'soal_waktu' => $waktupeng, 
				'soal_type_jawaban' => $jenis_jb
			); 
			
			if($this->dbObject->create_general("tb_soal", $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>sekolah/soal/utbk"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>sekolah/soal/utbk"); 
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
            }
            
		}
		else {
			$where = array(
				
			);
			$data['mapel'] = $this->dbObject->join_general('tb_soal_mapel', 'tb_soal_jurusan', 'jurusan_id', 'jurusan_id')->result(); 
			$where = array(
			);
			$data['jurusan'] = $this->dbObject->get_general('tb_soal_jurusan', $where); 
			$this->load->view('sekolah/templates/header');
            $this->load->view('sekolah/templates/sidebar');
            $this->load->view('sekolah/soal/utbk/tambah', $data);
			$this->load->view('sekolah/templates/footer');
			

			// $this->load->view('sekolah/soal/utbk/editors');
		}
	}
	function tambah_jurusan(){
		$jurusan=trim($this->input->post('jurusan'));
		$mapel=trim($this->input->post('mapel')); 
		
		$data = array(
			'jurusan_id' => $jurusan,  
			'mapel_nama' => $mapel
		);
		if($this->dbObject->create_general("tb_soal_mapel", $data)===TRUE)		// using direct parameter
		{
			?>
			<script> 
				alert(" Mata Pelajaran berhasil disimpan. ");
				location.replace("<?=base_url()?>sekolah/soal/utbk/tambah/"); 
			</script>
			<?php
			//redirect('master/jabatan','refresh');
		}
		else {
			?>
			<script> 
				alert(" Data gagal disimpan. ");
				location.replace("<?=base_url()?>sekolah/soal/utbk/tambah/"); 
			</script>
			<?php
			//redirect('master/jabatan_insert','refresh');
		}
	}
	function media_upload() {
        $config['upload_path'] = base_url()."assets/soal/utbk/";
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')) {
            $this->output->set_header('HTTP/1.0 500 Server Error');
            exit;
        } else {
            $file = $this->upload->data();
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode(['location' => base_url().'LOKASI_IMAGE_AKAN_DISIMPAN/'.$file['file_name']]))
                ->_display();
            exit;
        }
    }
    
}
