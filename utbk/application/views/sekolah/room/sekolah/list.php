 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <small>Peserta ujian / Sekolah</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Peserta Ujian
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <!-- <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a> -->
                                    <!-- <a href="<?=base_url();?>admin/peserta/sekolah/tambah"><button class="btn btn-primary waves-effect" type="button">Tambah Ujian sekolah</button></a> -->
                                   
                                    <div class="button-demo js-modal-buttons">
                                        <button type="button" data-color="" class="btn bg-light-blue waves-effect">Hubungkan Sekolah dan Room</button>
                                    </div>
                                    
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
                                            <th>Nama Room</th>
                                            <th>Nama Sekolah</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Lihat Peserta</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>NO</th>
                                            <th>Nama Room</th>
                                            <th>Nama Sekolah</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Lihat Peserta</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                       $no=1; foreach($sekolah_peserta as $sp){
                                    ?>
                                        <tr>
                                            <th><?=$no;?></th> 
                                            <td><?=$sp->room_nama;?></td>
                                            <td><?=$sp->sekolah_nama;?></td>
                                            <td><?=$sp->room_date;?></td>
                                            <td><?=$sp->room_date_finish;?></td>
                                            <td> 
                                                <a href="<?=base_url()?>admin/room/sekolah/list_peserta/<?=$sp->sekolah_peserta_id?>/<?=$sp->room_id?>"><i class="material-icons">search</i></a>
                                            </td>
                                            <td><?php if(date($sp->room_date_finish) < date('Y-m-d')){ echo "<span class='label label-success'>Selesai</span>";}
                                                    else{
                                                        echo "<span class='label label-primary'>Belum Selesai</span";
                                                    }
                                            ?></td>
                                            
                                            <td> 
                                                
                                            <a href="<?=base_url()?>admin/peserta/sekolah/update/<?=$sp->sekolah_peserta_id?>"><button class="btn btn-info waves-effect" type="button">Update</button>
                                                <a href="<?=base_url()?>admin/peserta/sekolah/hapus/<?=$sp->sekolah_peserta_id?>"><button class="btn btn-danger waves-effect" type="button">Hapus</button>
                                            </td>
                                        </tr>
                                        
                                
                                    <?php
                                      $no++;  }
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





 

  <!-- For Material Design Colors -->
  <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                <form class="form-horizontal" method="POST" action="<?=base_url();?>admin/room/sekolah/tambah_relasi/">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah Relasi Sekolah</h4>
                        </div>
                        <HR style="border: solid 1px grey;"/>
                        <div class="modal-body">
                        
                                  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Room Ujian</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <select class="form-control show-tick" data-live-search="true" name="room" required>
                                                    <?php foreach($room as $rm){
                                                        echo "<option value='$rm->room_id'>$rm->room_nama</option>";
                                                    }
                                                    ?>
                                                        
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Sekolah</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <select class="form-control show-tick" data-live-search="true" name="sekolah" required>
                                                    <?php foreach($sekolah as $sk){
                                                        echo "<option value='$sk->sekolah_id'>$sk->sekolah_nama</option>";
                                                    }
                                                    ?>
                                                        
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        <HR style="border: solid 1px grey;"/>
                        <div class="modal-footer">
                        <div class="row clearfix ">
                                </div>
                            <button type="submit" class="btn btn-link waves-effect">Tambahkan</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                    </form>

                    
                </div>
            </div>  
                         