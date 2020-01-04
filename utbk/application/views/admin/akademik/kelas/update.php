<?php foreach($kelas as $s): ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                <a href="<?=base_url();?>admin/akademik/kelas/"><button class="btn btn-warning waves-effect" type="button">Kembali</button></a>
                    <small>Akademik / Kelas / tambah</small>
                </h2>
            </div>
            
            <!-- Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Kelas</h2>

                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="<?=base_url();?>admin/akademik/kelas/update/do_update/<?=$s->kelas_id?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama"  minlength="3" value="<?=$s->kelas_nama?>" required>
                                        <label class="form-label">Nama</label>
                                    </div>
                                    <!-- <div class="help-info">Min. 3, Max. 10 characters</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" value="<?=$s->kelas_email;?>"  required>
                                        <label class="form-label">Email</label>
                                    </div>
                                    <!-- <div class="help-info">Min. Value: 10, Max. Value: 200</div> -->
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="hp" value="<?=$s->kelas_hp;?>" required>
                                        <label class="form-label">HP</label>
                                    </div>
                                    <!-- <div class="help-info">YYYY-MM-DD format</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="alamat"  value="<?=$s->kelas_alamat;?>" required>
                                        <label class="form-label">Alamat</label>
                                    </div>
                                    <!-- <div class="help-info">Numbers only</div> -->
                                </div>
                                <center><button class="btn btn-info waves-effect" type="submit">Update</button></center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->
           
        </div>
    </section>

<?php endforeach; ?>