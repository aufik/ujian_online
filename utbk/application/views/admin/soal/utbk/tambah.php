<style>
    body {
  font-family: arial;
}
.hidee {
  display: none;
}
p {
  font-weight: bold;
}
</style>
<script>
    function jwbshow1(){
  document.getElementById('pilihan_ganda').style.display ='block';
  document.getElementById('jwb_essay').style.display = 'none';
}
jwb_essay
function jwbshow2(){
  document.getElementById('pilihan_ganda').style.display = 'none';
  document.getElementById('jwb_essay').style.display ='block';
}

</script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                <a href="<?=base_url();?>admin/soal/utbk/"><button class="btn btn-warning waves-effect" type="button">Kembali</button></a>
                    <small>Soal / UTBK / tambah</small>
                </h2>
            </div>
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah Soal
                            </h2>
                             
                        </div>
                        <div class="body">
                            <?php 
                            // echo form_open_multipart(base_url().'admin/soal/utbk/tambah/do_create');?>
                            <form id="form_advanced_validation" method="POST" action="<?=base_url();?>admin/soal/utbk/tambah/do_create">
                                <div class="row clearfix">
                                    
                                    <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-10 col-xs-10 form-control-label">
                                        <label for="email_address_2">Mata Pelajaran</label>
                                    </div>
                                    <div class="col-lg-8 col-md-0 col-sm-7 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" data-live-search="true" name="mapel" required>
                                                    <?php foreach($mapel as $mp){
                                                        echo "<option value='$mp->mapel_id'>$mp->mapel_nama ($mp->jurusan_nama )</option>";
                                                    }
                                                    ?>
                                                        
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                    <div class="button-demo js-modal-buttons">
                                        <button type="button" data-color="" class="btn bg-light-blue waves-effect">Tambah Pelajaran</button>
                                                </div>

                            
                                    </div>
                                </div>
                                
                                <!-- <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="">Audio <sup>(Tidak wajib)</sup></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="file" name="audio" size="20" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 -->
<!--                                   
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Bobot Soal</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="number" name="bobot" class="form-control" required/>
                                

                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Waktu Pengerjaan soal</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="time" name="waktupeng" class="form-control" />
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Isi Soal</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
                                            <textarea id="ckeditor" name="isi" class="form-control" required></textarea>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Pilih Jenis Jawaban</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                            <div class="form-line">
                                            <input name="jenis_jb" type="radio" class="with-gap" id="pga" value="1" onclick="jwbshow1();"/>
                                            <label for="pga">Pilihan Berganda</label>
                                            <input name="jenis_jb" type="radio" id="essaay" class="with-gap" value="2" onclick="jwbshow2();" />
                                            <label for="essaay">Essay</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div  id="jwb_essay" class="hidee">
                                    <div class="header">
                                        
                                        <h2>Jawaban Essay <sup>(Kunci Jawaban)</sup></h2> 
                                        <br/>BOBOT:<input type="number" name="bobot[]" style="width:100px"/>
                                    </div>
                                    <div class="body">
                                        <textarea id="ckeditor" name="essay" class="form-control" ></textarea>
                                    </div>
                                </div>
                                <div  id="pilihan_ganda" class="hidee">
                                    <div class="header">
                                        <h2>Jawaban Pilihan Berganda</h2> 
                                    </div>
                                    <div class="body">
                                    <table class="table table-bordered" id="dynamic_field">  
                                                        <tr>
                                                            <td>
                                                            <label for="radio_1">Jawaban A</label>
                                                            <br/>BOBOT:<input type="number" name="bobot[]" style="width:100px"  value="1"/>
                                            
                                                            
                                                            </td>    
                                                            <td><textarea id="ckeditor" name="pilihan[]" class="form-control" ></textarea></td>  
                                                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                                        </tr>  
                                                </table> 
                                    </div>
                                    
                                </div>
                                <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <center><button type="submit" class="btn btn-primary waves-effect" style="padding:2%;"> Simpan Soal</button></center>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
            
           
        </div>
    </section>

                <!-- For Material Design Colors -->
            <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                <form class="form-horizontal" method="POST" action="<?=base_url();?>admin/soal/utbk/tambah_jurusan/">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Jurusan</h4>
                        </div>
                        <HR style="border: solid 1px grey;"/>
                        <div class="modal-body">
                        
                                  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Jurusan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" data-live-search="true" name="jurusan" required>
                                                    <?php foreach($jurusan as $jr){
                                                        echo "<option value='$jr->jurusan_id'>$jr->jurusan_nama</option>";
                                                    }
                                                    ?>
                                                        
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Mata Pelajaran</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="" name="mapel" class="form-control" placeholder="Masukan Matapelajaran">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                
                                
                            
                        </div>
                        <HR style="border: solid 1px grey;"/>
                        <div class="modal-footer">
                        <div class="row clearfix">
                                </div>
                            <button type="submit" class="btn btn-link waves-effect">Tambahkan</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                    </form>

                    
                </div>
            </div>
            
            <script> 
                var ckeditor = CKEDITOR.replace('ckeditor',{
                    height:'200px',
                    
                    filebrowserImageBrowseUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/browse.php?type=images');?>', 
                    // filebrowserImageUploadUrl : '<?php echo base_url('assets/soal/');?>', 
                    filebrowserBrowserUrl: '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/browse.php?type=files');?>', 
                    filebrowserFlashBrowseUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/browse.php?type=flash');?>',
                    filebrowserUploadUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/upload.php?type=files');?>',
                   
                    filebrowserFlashUploadUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/upload.php?type=flash');?>'
                });
                var ckeditor = CKEDITOR.replace('essay',{
                    height:'200px',
                    filebrowserImageBrowseUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/browse.php?type=images');?>', 
                    filebrowserImageUploadUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/upload.php?type=images');?>', 
                    filebrowserBrowserUrl: '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/browse.php?type=files');?>',
                    filebrowserFlashBrowseUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/browse.php?type=flash');?>',
                    filebrowserUploadUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/upload.php?type=files');?>',
                    filebrowserFlashUploadUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/upload.php?type=flash');?>'
                });
                
                var ckeditor = CKEDITOR.replace('pilihana',{
                    height:'200px',
                    filebrowserImageBrowseUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/browse.php?type=images');?>', 
                    filebrowserImageUploadUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/upload.php?type=images');?>', 
                    filebrowserBrowserUrl: '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/browse.php?type=files');?>',
                    filebrowserFlashBrowseUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/browse.php?type=flash');?>',
                    filebrowserUploadUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/upload.php?type=files');?>',
                    filebrowserFlashUploadUrl : '<?php echo base_url('assets/admin/plugins/editorku/kcfinder/upload.php?type=flash');?>'
                });
                CKEDITOR.disableAutoInline = true;
                CKEDITOR.inline('editable');
            </script>
<script>  
 $(document).ready(function(){  
      var i=1;  
      
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td> <label for="radio_'+i+'">Jawaban '+(i + 9).toString(36).toUpperCase()+' </label><br/>BOBOT:<input type="number" name="bobot[]" style="width:100px" value="0"/></td><td><textarea id="ckeditor" name="pilihan[]" class="form-control name_list" ></textarea></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });    
 });  
 </script>