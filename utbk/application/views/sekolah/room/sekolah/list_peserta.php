
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
        </section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
            <a href="<?=base_url();?>admin/room/utbk/"><button class="btn btn-warning waves-effect" type="button">Kembali</button></a>
                <small>Peserta / Luar</small>
            </h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            List Peserta Dari Sekolah 
                            <?=$sekolah[0]->sekolah_nama?>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <!-- <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a> -->
                                <a href="<?=base_url();?>admin/room/sekolah/tambah_peserta/<?=$sekolah[0]->sekolah_peserta_id?>/<?=$room?>"><button class="btn btn-primary waves-effect" type="button">Tambah Peserta</button></a>
                                <!-- <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul> 
                            </li>-->
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Token</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>No</th>
                                     <th>Username</th>
                                        <th>Password</th>
                                        <th>Token</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                    $no=1; foreach($ditail_peserta as $s){
                                ?>
                                    <tr>
                                        <th><?=$no;?></th>
                                        <td><?=$s->peserta_username;?></td>
                                        <td><?=$s->peserta_password_ret;?></td>
                                        <td><?=$s->peserta_token;?></td>
                                        <td>
                                            <a href="<?=base_url()?>admin/room/sekolah/update_peserta/<?=$s->sekolah_peserta_id?>/<?=$room;?>/<?=$s->peserta_id?>"><button class="btn btn-info waves-effect" type="button">Edit</button></a>
                                            <a href="<?=base_url()?>admin/room/sekolah/hapus_peserta/<?=$s->sekolah_peserta_id?>/<?=$room;?>/<?=$s->peserta_id?>"><button class="btn btn-danger waves-effect" type="button">Hapus</button>
                                        </td>
                                    </tr>
                                <?php
                                   $no++; }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>

                                    