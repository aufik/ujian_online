<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  


<style>
input[type="text"]:disabled {
  background: #dddddd;
}
</style>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                <a href="<?=base_url();?>sekolah/peserta/luar/"><button class="btn btn-warning waves-effect" type="button">Kembali</button></a>
                    <small>Peserta / Luar / Tambah</small>
                </h2>
            </div>
            
            <!-- Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Peserta</h2>

                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="<?=base_url();?>sekolah/room/peserta/tambah/do_create/<?=$room?>">
                            <div class="row clearfix">
                                    
                                        <div class="form-group">
                                            <div class="form-line">
                                            <table class="table table-bordered" id="dynamic_field">  
                                                        <tr>
                                                            <td>Peserta 1</td>    
                                                            <td><input type="text" name="peserta_username[]" class="form-control"  placeholder="Masukan Username Peserta 1" required></td>  
                                                            <td><input type="text" name="nisn[]" class="form-control"  placeholder="Masukan NISN Peserta 1" required></td>  
                                                            <td><button type="button" name="add" id="add" class="btn btn-success">Tambah Jumlah</button></td>  
                                                        </tr>  
                                                </table> 

                                                 
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <center><button class="btn btn-primary waves-effect" type="submit">Tambah</button></center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->
           
        </div>
    </section>


    <script>  
 $(document).ready(function(){  
      var i=1;  
      
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td> Peserta '+i+'</td><td><input type="text" name="peserta_username[]" class="form-control"  placeholder="Masukan Username Peserta '+i+'" ></td><td><input type="text" name="nisn[]" class="form-control"  placeholder="Masukan NISN Peserta '+i+'" ></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });    
 });  
 </script>