 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <small>Room ujian / Utbk</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Room Ujian
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <!-- <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a> -->
                                    
                                    <!-- <div class="button-demo js-modal-buttons"> -->
                                        <a href="<?=base_url();?>admin/room/utbk/tambah"><button class="btn btn-primary waves-effect" type="button">Tambah Ujian utbk</button></a>    
                                    <!-- </div> -->
                                    <!-- <a href="<?=base_url();?>admin/room/utbk/tambah"><button class="btn btn-warning waves-effect" type="button">Token Mulai</button></a>
                                    <a href="<?=base_url();?>admin/room/utbk/tambah"><button class="btn btn-danger waves-effect" type="button">Token Selesai</button></a> -->
                                    
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
                                            <th>Time Start</th>
                                            <th>Total Waktu</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Jumlah Soal</th>
                                            <th>Peserta</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Time Start</th>
                                            <th>Total Waktu</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Jumlah Soal</th>
                                            <th>Peserta</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        foreach($utbk as $ut){
                                    ?>
                                        <tr>
                                            <th>1</th> 
                                            <td><?=$ut->room_nama;?></td>
                                            <td><?=$ut->room_time_start;?></td>
                                            <td><?=$ut->room_total_waktu;?></td>
                                            <td><?=$ut->room_date;?></td>
                                            <td><?=$ut->room_date_finish;?></td>
                                            <td><?=$ut->room_jumlah_soal;?></td>
                                            <td><a href="<?=base_url()?>admin/room/peserta/tampil_peserta_room/<?=$ut->room_id?>"><i class="material-icons">search</i></a></td>
                                            <td><?php if(date($ut->room_date_finish) < date('Y-m-d')){ echo "<span class='label label-success'>Selesai</span>";}
                                                    else{
                                                        echo "<span class='label label-primary'>Belum Selesai</span";
                                                    }
                                            ?></td>
                                            
                                            <td> 
                                                <a href="<?=base_url()?>admin/room/utbk/update/<?=$ut->room_id?>"><button class="btn btn-info waves-effect" type="button">Edit</button></a>
                                                <a href="<?=base_url()?>admin/room/utbk/hapus/<?=$ut->room_id?>"><button class="btn btn-danger waves-effect" type="button">Hapus</button>
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
