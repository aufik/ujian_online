<?php foreach($sekolah_peserta as $sp){ ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                <a href="<?=base_url();?>admin/room/sekolah/"><button class="btn btn-warning waves-effect" type="button">Kembali</button></a>
                    <small>Room / Peserta / update</small>
                </h2>
            </div>
             <!-- Horizontal Layout -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Buat Room
                            </h2> 
                        </div>
                        <div class="body">
                            <form class="form_advanced_validation" method="POST" action="<?=base_url();?>admin/peserta/sekolah/update/do_update/<?=$sp->sekolah_peserta_id;?>"> 
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label class="form-label">Room Nama</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group form-float">
                                        <select class="form-control show-tick" data-live-search="true" name="room" required>asd
                                                                                        <?php foreach($room as $rm){
                                                                                            ?>
                                                                                                <option value=<?=$rm->room_id?> <?php if($rm->room_id == $sp->room_id) {echo 'selected';}?>><?=$rm->room_nama?></option>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                            
                                                                                    </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="">Sekolah</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group form-float">
                                        <select class="form-control show-tick" data-live-search="true" name="sekolah" required>
                                                                                        <?php foreach($sekolah as $sk){
                                                                                            ?>
                                                                                                <option value=<?=$sk->sekolah_id?> <?php if($sk->sekolah_id == $sp->sekolah_id) {echo 'selected';}?>><?=$sk->sekolah_id?></option>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                            
                                                                                    </select>
                                    </div> 
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
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
                                                                                    <?php } ?>