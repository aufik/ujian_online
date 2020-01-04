
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <small>Peserta / Luar</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Peserta
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <!-- <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a> -->
                                    <a href="<?=base_url();?>admin/peserta/luar/tambah"><button class="btn btn-primary waves-effect" type="button">Tambah luar</button></a>
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
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>NISN</th>
                                            <th>Email</th>
                                            <th>HP</th>
                                            <th>SEKOLAH</th> 
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>NISN</th>
                                            <th>Email</th>
                                            <th>HP</th>
                                            <th>SEKOLAH</th> 
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        foreach($luar as $s){
                                    ?>
                                        <tr>
                                            <th>1</th>
                                            <td><?=$s->luar_nama;?></td>
                                            <td><?=$s->luar_nisn;?></td>
                                            <td><?=$s->luar_email;?></td>
                                            <td><?=$s->luar_hp;?></td>
                                            <td><?=$s->sekolah_nama;?></td> 
                                            <td>
                                                <a href="<?=base_url()?>admin/peserta/luar/update/<?=$s->luar_id?>"><button class="btn btn-info waves-effect" type="button">Edit</button></a>
                                                <a href="<?=base_url()?>admin/peserta/luar/reset/<?=$s->luar_id?>/<?=$s->luar_hp?>"><button class="btn btn-warning waves-effect" type="button">Reset Password</button></a>
                                                <a href="<?=base_url()?>admin/peserta/luar/hapus/<?=$s->luar_id?>"><button class="btn btn-danger waves-effect" type="button">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php
                                        }
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
