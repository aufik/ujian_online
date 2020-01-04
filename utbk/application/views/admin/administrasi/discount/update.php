<?php foreach($discount as $s): ?>
    

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                <a href="<?=base_url();?>admin/administrasi/discount/"><button class="btn btn-warning waves-effect" type="button">Kembali</button></a>
                    <small>administrasi / Promo / tambah</small>
                </h2>
            </div>
            <!-- Advanced Validation -->
            <div class="row clearfix">
                <div
                 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Promo</h2>

                        </div>
                        <div class="body">
                        <form id="form_advanced_validation" method="POST" action="<?=base_url();?>admin/administrasi/discount/update/do_update/<?=$s->harga_dicount_id?>">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-10">
                                <input name="harga_dicount_kode" type="text"  class="form-control"  style="border:1.5px solid grey; border-radius:5px;" value="<?=$s->harga_dicount_kode?>">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah Promo</label>
                                <div class="col-sm-2">
                                <select name="harga_dicount_tipe" class="form-control " style="border:1.5px solid grey; border-radius:5px; " >
                                            <option value="RUPIAH" <?php if($s->harga_dicount_tipe == "RUPIAH"){ echo"selected"; }?>>Rp. </option>
                                            <option value="PERSENT" <?php if($s->harga_dicount_tipe == "PERSENT"){ echo"selected";} ?>>% </option>
                                        </select>
                                </div>
                                <div class="col-sm-8">
                                <input name="harga_dicount_jumlah" type="number" class="form-control form_contoh" placeholder="jumlah diskon" style="border:1.5px solid grey; border-radius:5px; "value="<?=$s->harga_dicount_jumlah?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Dan waktu Mulai </label>
                                <div class="col-sm-10 ">
                                <input name="harga_dicount_date_start" type="datetime-local"  class="form-control" style="border:1.5px solid grey; border-radius:5px;" value="<?php echo date('Y-m-d\TH:i:s', strtotime($s->harga_dicount_date_start)); ?>">
                                
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Dan waktu Selesai </label>
                                <div class="col-sm-10 ">
                                <input name="harga_dicount_date_finnish" type="datetime-local"  class="form-control" style="border:1.5px solid grey; border-radius:5px;" value="<?php echo date('Y-m-d\TH:i:s', strtotime($s->harga_dicount_date_finnish)); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Limit User</label>
                                <div class="col-sm-10">
                                <input type="text"  class="form-control"  style="border:1.5px solid grey; border-radius:5px;" name="harga_dicount_limit" value="<?=$s->harga_dicount_limit?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                <textarea name="harga_dicount_keterangan" class="form-control"  style="border:1.5px solid grey; border-radius:5px; min-height:150px;" ><?=$s->harga_dicount_keterangan?></textarea >
                                </div>
                            </div>

                            <center><button class="btn btn-primary waves-effect" type="submit">Tambah</button></center>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->
           
        </div>
    </section>
<?php endforeach; ?>