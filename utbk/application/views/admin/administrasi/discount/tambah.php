

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
                        <form id="form_advanced_validation" method="POST" action="<?=base_url();?>admin/administrasi/discount/tambah/do_create">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-10">
                                <input name="harga_dicount_kode" type="text"  class="form-control" value="" style="border:1.5px solid grey; border-radius:5px;">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah Promo</label>
                                <div class="col-sm-2">
                                <select name="harga_dicount_tipe" class="form-control " style="border:1.5px solid grey; border-radius:5px; ">
                                            <option value="RUPIAH">Rp. </option>
                                            <option value="PERSENT">% </option>
                                        </select>
                                </div>
                                <div class="col-sm-8">
                                <input name="harga_dicount_jumlah" type="number" class="form-control form_contoh" placeholder="Password" style="border:1.5px solid grey; border-radius:5px; ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Dan waktu Mulai </label>
                                <div class="col-sm-10 ">
                                <input name="harga_dicount_date_start" type="datetime-local"  class="form-control" value="" style="border:1.5px solid grey; border-radius:5px;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Dan waktu Selesai </label>
                                <div class="col-sm-10 ">
                                <input name="harga_dicount_date_finnish" type="datetime-local"  class="form-control" value="" style="border:1.5px solid grey; border-radius:5px;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Limit User</label>
                                <div class="col-sm-10">
                                <input type="text"  class="form-control" value="" style="border:1.5px solid grey; border-radius:5px;" name="harga_dicount_limit">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                <textarea name="harga_dicount_keterangan" class="form-control" value="" style="border:1.5px solid grey; border-radius:5px; min-height:150px;" ></textarea >
                                <!-- <input type="text"  class="form-control" id="staticEmail" value="" style="border:2px solid grey; border-radius:5px;"> -->
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