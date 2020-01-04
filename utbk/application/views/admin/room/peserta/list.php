
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
                                List Peserta <?=$room[0]->room_nama?>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <!-- <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a> -->
                                    <button type="button" data-color="indigo" class="btn bg-indigo waves-effect" data-toggle="modal" data-target="#token_mulai">Token Mulai</button>
                                    <button type="button" data-color="deep-orange" class="btn bg-deep-orange waves-effect" data-toggle="modal" data-target="#token_selesai">Token Selesai</button>
                                    <a href="<?=base_url();?>admin/room/peserta/tambah/<?=$room[0]->room_id?>"><button class="btn btn-primary waves-effect" type="button">Tambah luar</button></a>
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
                                        $no=1; foreach($peserta as $s){
                                    ?>
                                        <tr>
                                            <th><?=$no;?></th>
                                            <td><?=$s->peserta_username;?></td>
                                            <td><?=$s->peserta_password_ret;?></td>
                                            <td><?=$s->peserta_token;?></td>
                                            <td>
                                                <a href="<?=base_url()?>admin/room/peserta/update/<?=$room[0]->room_id?>/<?=$s->peserta_id?>"><button class="btn btn-info waves-effect" type="button">Edit</button></a>
                                                <a href="<?=base_url()?>admin/room/peserta/hapus/<?=$room[0]->room_id?>/<?=$s->peserta_id?>"><button class="btn btn-danger waves-effect" type="button">Hapus</button>
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

    
    <div class="modal fade" id="token_mulai" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Token Mulai</h4>
                        </div>
                        <div class="modal-body">
                            <h2 class="text-center"><?=$room[0]->room_token_mulai?></h2>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal fade" id="token_selesai" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Modalee title</h4>
                        </div>
                        <div class="modal-body">
                        <h2 class="text-center"><?=$room[0]->room_token_selesai?></h2>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

