<link rel="stylesheet" href="<?=base_url();?>assets/siswa/css/vue_style_wizard.css">
          
            <div class="content">
            <form method="POST" action="<?=base_url()?>pendaftaran/tambah_peserta">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-8 offset-md-1">
                       
                            <div class="card" style="padding:5%;">
                            
                                    <h3 class="text-center">Form Pendaftaran</h3>
                                    
                                        <div id="app">
                                            <step-navigation :steps="steps" :currentstep="currentstep">
                                            </step-navigation>
                                            
                                            <div v-show="currentstep == 1">
                                                <h3>Jadwal Ujian</h3>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kelompok Ujian</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control"  name="jurusan" id="jurusan">
                                                                <option value="0">----Pilih----</option>
                                                                <option value="1">Saintek</option>
                                                                <option value="2">Soshum</option>
                                                                <option  value="3">Campuran</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Sesi / Room</label>
                                                        <div class="col-sm-10">
                                                        <select class="room form-control"  name="room" id="room">
                                                                <option value="0"> ---Pilih---</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal ujian</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control room_date" name="room_date" id="room_date" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Waktu ujian</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control room_time_start" name="room_time_start" id="room_time_start" disabled>
                                                        </div>
                                                    </div>  
                                                     
                                            </div>

                                            <div v-show="currentstep == 2">
                                                <h3>BIODATA</h3>
                                               
                                                <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">NISN</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="peserta_biodata_nisn" placeholder="NISN" class="form-control"/>
                                                        </div>
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">NPSN</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="peserta_biodata_npsn" placeholder="NPSN" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" name="peserta_biodata_tgl_lahir" placeholder="Tanggal Lahir" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                             <input type="email" name="peserta_biodata_email" placeholder="Email" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Konfirmasi Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" name="peserta_biodata_email_konf" placeholder="Email" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-4">
                                                            <input type="password" name="peserta_biodata_password" placeholder="password" class="form-control"/>
                                                        </div>
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                                        <div class="col-sm-4">
                                                            <input type="password" name="peserta_biodata_password_konf" placeholder="password" class="form-control"/>
                                                        </div>
                                                    </div>   

                                            </div>

                                            <div v-show="currentstep == 3">
                                                <h3>Konfirmasi</h3>

                                                <div class="form-check row">
                                                    <input type="checkbox" class="form-check-input col-md-1">
                                                    <label class="form-check-label  col-md-11" for="exampleCheck1">Saya menyatakan bahwa data yang saya isikan dalam borang ini sudah benar. saya bersedia menerima sanksi pembatalan keikutsertaan ujian apabila saya melanggar pernyataan ini</label>
                                                </div>
                                            </div>

                                            <step v-for="step in steps" :currentstep="currentstep" :key="step.id" :step="step" :stepcount="steps.length" @step-change="stepChanged">
                                            </step>

                                           
                                        </div>
                                    
                            </div>
                           
                        </div>
                        <div class="col-md-3 col-offside-1">
                            <div class="card" style="padding:5%;">
                                <div class="card-content">
                                    <div class="row">
                                            <label class="col-sm-5 label-on-left"><strong>Harga</strong></label>
                                            <div class="col-sm-7">
                                                <div class="    label-floating harga_umum" id="harga_umum">
                                                    Gratis
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row potongan_harga">
                                          
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                            <label class="col-sm-5 label-on-left"><strong>Total harga</strong></label>
                                            <div class="col-sm-7">
                                                <div class="    label-floating total_harga" id="total_harga">
                                                    Gratis
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="card "  style="padding:5%;">
                                     <div class="row form_tambah_kupan" id="form_tambah_kupan">
                                                <div class="col-sm-8" > 
                                                    <input type="text" name="kode_kupon" id="kode_kupon" class="form-control" style="border:solid 1px grey; border-radius:5px; margin:0; "  placeholder="Kode Promo">
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="label-floating">
                                                        <input type="button" id="btn_tambah_kupon" class="form-control btn btn-success" style="margin:0;" value="Gunakan">
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="row detail_kupon" id="detail_kupon">
                                            <div class="col-sm-11" style="border:dotted 2px green; padding:2%; margin:2%;"> 
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                    <button type="button" class="close text-danger btn_hapus_kupon" id="btn_hapus_kupon" style="font-color:black;">
                                                        <span class="text-danger">X</span>
                                                    </button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 " > 
                                                        Kode Promo: <span class="text-success kode_promonya"></span>
                                                    </div>
                                                    <div class="col-sm-12 " > 
                                                        Selamat Anda mendapatkan Diskon <span class="detail_keterangan_promo"></span> 
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                               

                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
            </div>
            

          
            <script type="x-template" id="step-navigation-template">
                                                <ol class="step-indicator">
                                                    <li v-for="step in steps" is="step-navigation-step" :key="step.id" :step="step" :currentstep="currentstep">
                                                    </li>
                                                </ol>
                                            </script>

                                            <script type="x-template" id="step-navigation-step-template">
                                                <li :class="indicatorclass">
                                                    <div class="step"><i :class="step.icon_class"></i></div>
                                                    <div class="caption hidden-xs hidden-sm">Step <span v-text="step.id"></span>: <span v-text="step.title"></span></div>
                                                </li>
                                            </script>

                                            <script type="x-template" id="step-template">
                                                <div class="step-wrapper" :class="stepWrapperClass">
                                                    <button type="button" class="btn btn-primary" @click="lastStep" :disabled="firststep">
                                                        Sebelumnya
                                                    </button>
                                                    <button type="button" class="btn btn-primary" @click="nextStep" :disabled="laststep">
                                                        Selanjutnya
                                                    </button>
                                                    <button type="submit" class="btn btn-primary" v-if="laststep">
                                                        Submit
                                                    </button>
                                                </div>
                                            </script>

<script src='<?=base_url();?>assets/siswa/js/vue.js'></script>
<script  src="<?=base_url();?>assets/siswa/js/vue_style_wizard.js"></script>



<script src="<?=base_url();?>assets/siswa/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/siswa/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/siswa/js/bootstrap.min.js" type="text/javascript"></script>



<script type="text/javascript">
    $(document).ready(function(){
        
        $('#jurusan').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>pendaftaran/get_room",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html_room = '<option value="0">----Pilih----</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html_room += '<option value='+data[i].room_id+'>'+data[i].room_nama+'</option>';
                    }
                    $('.room').html(html_room);
                     
                }
            });
        });
        $('#room').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>pendaftaran/get_room_detail",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var i;
                    for(i=0; i<data.length; i++){
                        $('.room_time_start').val(data[i].room_time_start);
                        $('.room_date').val(data[i].room_date);
                    }
                     
                }
            });
        });

    });
</script>

<!-- kupon/promo -->
<script>
$(document).ready(function(){
    // alert("Normal Alert!");
    
        tampil_data_harga();   //pemanggilan fungsi tampil barang.
         
        // $('#mydata').dataTable();
          
        //fungsi tampil barang
        function tampil_data_harga(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url()?>pendaftaran/harga_normal',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html_total_harga = '';
                    var html_harga_umum = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html_total_harga += data[i].harga_jumlah;
                        html_harga_umum += data[i].harga_jumlah;
                        
                    }
                    $('#total_harga').html(html_total_harga);
                    $('#harga_umum').html(html_harga_umum);

                }
 
            });
        }
        $("#detail_kupon").hide();
     
    
     $('#btn_hapus_kupon').on('click',function(){
         
         $.ajax({
             success: function(){
                 $('#form_tambah_kupan').show();
                 $('#kode_promo_input').remove();
                 $("#detail_kupon").hide();
                 $('.potongan_harga').hide();
                 alert('Kupon telah dihapus!')
             }
         });
         tampil_data_harga(); 
         return false;
     });

});

    
    $('#btn_tambah_kupon').on('click',function(){
        var kode_kupon=$('#kode_kupon').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('pendaftaran/tambah_kupon')?>",
            method : "POST",
            data : {kode_kupon: kode_kupon},
            async : false,
            dataType : 'json',


         
            success: function(data){
                if(data.length > 0){
                var html_ket_promo = '';
                var html_kode_promo='';
                var html_potongan_harga='';
                var html_th=''
                var html_total_harga = '';
                var html_total_harga_last =$('#total_harga').html();
                var potongang_har='';
                if (data.length > 0){
                var i;

                for(i=0; i<data.length; i++){
                        
                    
                        // html_ket_promo += data[i].harga_dicount_jumlah+" "+data[i].harga_dicount_tipe;
                        // html_kode_promo += data[i].harga_dicount_kode;
                        // html_kode_promo += "<input type='hidden' name='kode_promo_input' id='kode_promo_input' value='"+data[i].harga_dicount_kode+"'/>";
                        // html_potongan_harga += "<label class='col-sm-5 label-on-left'><strong>Potongan</strong></label><div class='col-sm-7'><div class='    label-floating  id=''>"+data[i].harga_dicount_jumlah+"</div></div>";
                        
                        
                            html_kode_promo += data[i].harga_dicount_kode;
                            html_kode_promo += "<input type='hidden' name='kode_promo_input' id='kode_promo_input' value='"+data[i].harga_dicount_kode+"'/>";
                            
                            if(data[i].harga_dicount_tipe == "RUPIAH"){
                                
                                    html_total_harga += html_total_harga_last-data[i].harga_dicount_jumlah;
                                    html_potongan_harga += "<label class='col-sm-5 label-on-left'><strong>Potongan</strong></label><div class='col-sm-7'><div class='    label-floating  id=''> Rp. "+data[i].harga_dicount_jumlah+"</div></div>";
                                    html_ket_promo += "Rp. "+data[i].harga_dicount_jumlah;
                            }else{
                                
                                potongang_har=(html_total_harga_last*data[i].harga_dicount_jumlah)/100;
                                html_total_harga += html_total_harga_last-potongang_har;
                                html_potongan_harga += "<label class='col-sm-5 label-on-left'><strong>Potongan</strong></label><div class='col-sm-7'><div class='    label-floating  id=''> "+data[i].harga_dicount_jumlah+"% (Rp. "+potongang_har+")</div></div>";
                                html_ket_promo += "Rp. "+potongang_har;
                            }
                        
                        
                        
                }
                $('#form_tambah_kupan').hide();
                $('#detail_kupon').show();
                $('.potongan_harga').show();
                }
                
                $('#total_harga').html(html_total_harga);
                $('.detail_keterangan_promo').html(html_ket_promo);
                $('.kode_promonya').html(html_kode_promo);
                $('.potongan_harga').html(html_potongan_harga);
                alert('Kupon dimasukan');
                
                }else{
                    alert('Kupon Tidak Tersedia');
                }
            }
        });
        return false;
    });

    
    
</script>