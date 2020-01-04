
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
        </section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                <small>Administrasi / Discount</small>
            </h2>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            List administrasi
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <!-- <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a> -->
                                <a href="<?=base_url();?>admin/administrasi/discount/tambah"><button class="btn btn-primary waves-effect" type="button">Tambah discount</button></a>
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
                                        <th>Kode</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Limit</th>
                                        <th>Digunakan</th> 
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Limit</th>
                                        <th>Digunakan</th> 
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                    foreach($discount as $s){
                                ?>
                                    <tr>
                                        <th>1</th>
                                        <td><?=$s->harga_dicount_kode;?></td>
                                        <td><?=$s->harga_dicount_tipe." ".$s->harga_dicount_jumlah;?></td>
                                        <td><?=$s->harga_dicount_date_start;?></td>
                                        <td><?=$s->harga_dicount_date_finnish;?></td>
                                        <td><?=$s->harga_dicount_limit;?></td> 
                                        <td><?=$s->harga_dicount_limit - $s->harga_dicount_sisa_limit;?></td> 
                                        <td>
                                            <a href="<?=base_url()?>admin/administrasi/discount/update/<?=$s->harga_dicount_id?>"><button class="btn btn-info waves-effect" type="button">Edit</button></a>
                                            <a href="<?=base_url()?>admin/administrasi/discount/hapus/<?=$s->harga_dicount_id?>"><button class="btn btn-danger waves-effect" type="button">Hapus</button>
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
