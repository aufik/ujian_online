<?php foreach($peserta as $ps): ?>
<style>
input[type="text"]:disabled {
  background: #dddddd;
}
</style>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                <a href="<?=base_url();?>admin/peserta/luar/"><button class="btn btn-warning waves-effect" type="button">Kembali</button></a>
                    <small>Peserta / Update</small>
                </h2>
            </div>
            
            <!-- Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Update Peserta</h2>

                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="<?=base_url();?>admin/room/peserta/update/do_update/<?=$room?>/<?=$ps->peserta_id?>">
                            <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Username</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <input type="text" name="peserta_username" class="form-control" value="<?=$ps->peserta_username?>"  placeholder="Masukan Username" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="peserta_password" value="<?=$ps->peserta_password_ret;?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Token</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="peserta_token" class="form-control" value="<?=$ps->peserta_token;?>" disabled>
                                            </div>
                                        </div>
                                    </div>
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
    <?php endforeach ?>