
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-6 col-md-offset-3">
                            <div class="card">
                                <form id="" class="form-horizontal" action="<?=base_url();?>siswa/auth/login" method="POST">
                                    <div class="card-header card-header-text" data-background-color="rose">
                                        <h4 class="card-title">Login</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <label class="col-sm-3 label-on-left"><strong>Nomor Peserta</strong></label>
                                            <div class="col-sm-9">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="nomor_peserta" />
                                                </div>
                                            </div>
                                            <!-- <label class="col-sm-3 label-on-right">
                                                <code>minLength="5"</code>
                                            </label> -->
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 label-on-left"><strong>PIN / Password</strong></label>
                                            <div class="col-sm-9">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="Password" name="password" />
                                                </div>
                                            </div>
                                            <!-- <label class="col-sm-3 label-on-right">
                                                <code>maxLength="5"</code>
                                            </label> -->
                                        </div>
                                        
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-rose btn-fill">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            