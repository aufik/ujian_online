<?php
 if(Count($harga)> 0){ 
    $isi_harga = TRUE;
    $total_harga=$harga->harga_jumlah;
 }else{
    $total_harga="0"; 
 }
 
 
 if(!isset($update)){ 
    $update = "false";
 } 
 ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                <a href="<?=base_url();?>admin/administrasi/harga/"><button class="btn btn-warning waves-effect" type="button">Kembali</button></a>
                    <small>administrasi / harga </small>
                </h2>
            </div>
            
            <!-- Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> harga</h2>

                        </div>
                        <div class="body">
                            
                            <?php 
                                if($update == "true"){
                            ?>
                                <form id="form_advanced_validation" method="POST" action="<?=base_url();?>admin/administrasi/harga/update/do_update/">
                                
                            <?php
                                }else{
                            ?>
                                <form id="form_advanced_validation" method="POST" action="<?=base_url();?>admin/administrasi/harga/update/">
                            <?php
                                }
                            ?>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="harga" value="<?=$total_harga;?>" <?php if(Count($harga) > 0 and $update== "false") echo "disabled"; ?>>
                                        <label class="form-label">Nama</label>
                                    </div>
                                    <!-- <div class="help-info">Min. 3, Max. 10 characters</div> -->
                                </div>
                                <?php 
                                    if($update == "true"){
                                ?>
                                    <center><button class="btn btn-primary waves-effect" type="submit">Update</button></center>
                                <?php
                                    }else{
                                ?>
                                    <center><button class="btn btn-danger waves-effect" type="submit">Ubah Harga</button></center>
                                <?php
                                    }
                                ?>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->
           
        </div>
    </section>
