
       
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <small>Soal / Utbk</small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Ujian utbk
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <!-- <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a> -->
                                    <a href="<?=base_url();?>admin/soal/utbk/tambah"><button class="btn btn-primary waves-effect" type="button">Tambah Ujian utbk</button></a>
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
                                            <th>Mata Pelajaran</th>
                                            <th>Jurusan</th>
                                            <th>Type Jawaban</th>
                                            <th>Waktu</th>
                                            <th>Tanggal Create</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Jurusan</th>
                                            <th>Type Jawaban</th>
                                            <th>Waktu</th>
                                            <th>Tanggal Create</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $no=1;
                                        foreach($utbk as $s){
                                    ?>
                                        <tr>
                                            <th><?=$no;?></th>
                                            <td><?=$s->mapel_nama;?></td>
                                            <td><?=$s->jurusan_nama;?></td>
                                            <td><?php
                                                if($s->soal_type_jawaban == '1') echo "Pilihan Ganda";
                                                elseif($s->soal_type_jawaban == '2') echo "Essay";
                                            ?></td>
                                            <td><?=$s->soal_waktu;?></td>
                                            <td>
                                                <?php
                                                $tgl = $s->soal_tanggal_create;
                                                    echo date("Y/m/d");
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?=base_url()?>admin/soal/utbk/update/<?=$s->soal_id?>"><button class="btn btn-info waves-effect" type="button">Edit</button></a>
                                                <a href="<?=base_url()?>admin/soal/utbk/hapus/<?=$s->soal_id?>"><button class="btn btn-danger waves-effect" type="button">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
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
