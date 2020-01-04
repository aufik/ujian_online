
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-12 ">
                        <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    Soal <?=$page;?>
                                </div>
                                <div class="card-content">
                                <?php foreach ($results as $r => $row) :?>
                                    <div class="isi_soal" style="min-height:350px; text-align:left;">
                                    <hr/>
                                        <p>
                                        <?php echo $row->soal_isi; ?>
                                        </p>
                                        <p>
                                            <?php
                                                if($row->soal_type_jawaban == 1){
                                                    $alphabet = range('A', 'Z');
                                                    foreach($jawaban_pg as $pg){
                                                        echo $alphabet[$pg->pg_urut-1].". ".$pg->pg_isi."<br/>";
                                                    }
                                                }   
                                            ?>
                                        </p>
                                    </div>
                                    <!-- <h4 class="card-title">Stacked Form</h4> -->
                                    <!-- <form method="post" id="form_jawaban" action="<?=base_url()?>siswa/ujian/jawab/<?=$page?>"> -->
                                        <div class="jawaban"  style="text-align:left;">
                                            <span>Pilih Jawaban : </span>
                                            <?php
                                                if($row->soal_type_jawaban == 1){
                                                    $alphabet = range('A', 'Z');
                                                    for($i=0; $i<count($jawaban_pg); $i++){
                                                        $sama = false;
                                                        // echo  $jawaban_pg[$i]->pg_id.">>>";
                                                        for($j=0; $j<count($id_list_dijawab); $j++){
                                                            if($jawaban_pg[$i]->pg_id == $id_list_dijawab[$j]){
                                                                
                                                                   $sama= true;
                                                            }
                                                        }
                                                        ?>
                                                                <a href="<?=base_url()?>siswa/ujian/jawab/<?=$page;?>/<?=$jawaban_pg[$i]->pg_id?>"><button class="<?php if($sama == true){echo 'btn-success';}?>"><?=$alphabet[$i]?></button></a>
                                                        <?php
                                                        // echo $jawaban_pg[$i]->pg_id."<button type='submit' id='jawabannya' name='jawaban' value='".$jawaban_pg[$i]->pg_id."' class=''>".$alphabet[$i]."</button> ";
                                                    }
                                                    // foreach($jawaban_pg as $pg){
                                                    //     echo "$pg->pg_id.<button type='submit' id='jawabannya' name='jawaban' value='".$pg->pg_id."' class=''>".$alphabet[$pg->pg_urut-1]."</button> ";
                                                    // }
                                                }else{
                                                    echo "<textarea class='form-control' style='border:1px solid; min-height:200px;'></textarea>";
                                                }     
                                            ?> 
                                        </div>
                                        
                                        <a href="<?=base_url();?>siswa/ujian/proses/<?=$page-1?>"><button type="submit" class="btn btn-fill btn-normal">Soal Sebelumnya</button></a>

                                        <a href="<?=base_url();?>siswa/ujian/hasil/"><button type="submit" class="btn btn-fill btn-danger">Selesai</button></a>
                                        <?php  if( $page <  count($id_soal)-1){ ?>
                                        <a href="<?=base_url();?>siswa/ujian/proses/<?=$page+1?>"><button type="submit" class="btn btn-fill btn-primary">Soal Selanjutnya</button></a>
                                        <?php  } ?>
                                        

                                        <!-- <a href="<?=base_url();?>siswa/ujian/proses/<?=$page-1?>"><button type="submit" class="btn btn-fill btn-normal">Soal Sebelumnya</button></a>

                                        <a href="<?=base_url();?>siswa/ujian/hasil/"><button type="submit" class="btn btn-fill btn-warning">Ragu - Ragu</button></a>
                                        <?php if(count($id_soal) == $page+1){ ?>
                                                <a href="<?=base_url();?>siswa/ujian/hasil/"><button type="submit" class="btn btn-fill btn-danger">Selesai</button></a>
                                        <?php }else{ ?>
                                            <a href="<?=base_url();?>siswa/ujian/proses/<?=$page+1?>"><button type="submit" class="btn btn-fill btn-primary">Soal Selanjutnya</button></a>
                                        <?php } ?> -->
                                        
                                        
                                    <!-- </form> -->
                                    <?php endforeach; ?>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <script src="<?=base_url();?>assets/siswa/js/jquery-3.1.1.min.js" type="text/javascript"></script>
            <script>

 //Simpan Barang
 $('#jawabannya').on('click',function(){
            var jawabannya=$('#jawabannya').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('siswa/ujian/jawab')?>",
                dataType : "JSON",
                data : {jawabannya:jawabannya },
                success: function(data){
                    $('[name="jawabannya"]').val("");
                }
            });
            return false;
        });
</script>