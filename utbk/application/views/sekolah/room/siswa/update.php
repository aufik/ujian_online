<?php foreach($siswa as $s): ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                <a href="<?=base_url();?>admin/akademik/siswa/"><button class="btn btn-warning waves-effect" type="button">Kembali</button></a>
                    <small>Akademik / Siswa / Tambah</small>
                </h2>
            </div>
            
            <!-- Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Siswa</h2>

                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="<?=base_url();?>admin/akademik/siswa/update/do_update/<?=$s->siswa_id;?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" value="<?=$s->siswa_nama;?>" required>
                                        <label class="form-label">Nama</label>
                                    </div>
                                    <!-- <div class="help-info">Min. 3, Max. 10 characters</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nisn" value="<?=$s->siswa_nisn;?>" required>
                                        <label class="form-label">NISN</label>
                                    </div>
                                    <!-- <div class="help-info">Min. Value: 10, Max. Value: 200</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" value="<?=$s->siswa_email;?>" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                    <!-- <div class="help-info">Min. Value: 10, Max. Value: 200</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="hp" value="<?=$s->siswa_hp;?>" required>
                                        <label class="form-label">HP</label>
                                    </div>
                                    <!-- <div class="help-info">YYYY-MM-DD format</div> -->
                                </div>
                                <div class="form-group ">
                                <small class="form-label">Sekolah</small>
                                    <div class="input-group">
                                        <div class="form-line">
                                        <select class="form-control show-tick" data-live-search="true" name="sekolah">
                                        <?php foreach($sekolah as $sk){
                                            ?>
                                                <option value="<?=$sk->sekolah_id?>" <?php if($sk->sekolah_id == $s->sekolah_id){echo " selected='selected'";} ?>><?=$sk->sekolah_nama?></option>;
                                            <?php
                                        }
                                        ?>
                                             
                                        </select>
                                     </div>
                                    </div>
                                    
                                    <!-- <div class="help-info">YYYY-MM-DD format</div> -->
                                </div> 
                                <center><button class="btn btn-primary waves-effect" type="submit">Update</button></center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->
           
        </div>
    </section>
<?php endforeach; ?>