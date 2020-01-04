
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-6 col-md-offset-3">
                            <div class="card" style="padding:5%;">
                                <table class="col-md-12">
                                <tr >
                                   <td rowspan="5" class="col-md-6 text-center">
                                   <img src="<?=base_url();?>assets/siswa/img/logo-sbmptn-png-6.png" style="width:120px;">
                                   <!-- <i class="fa fa-graduation-cap fa-5x"></i> -->
                                   </td>
                                   <th>
                                        Nomor Peserta
                                   </th>
                                </tr>
                                <tr>
                                    <td>
                                        <?=$_SESSION['nomor_peserta'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Nama
                                    </th>
                                </tr>
                                <tr>
                                    <!-- <td>
                                        Peserta Campuran
                                    </td> -->
                                </tr>
                                <tr>
                                    <td>
                                    <?=$_SESSION['nomor_peserta'];?>
                                    </td>
                                </tr>
                                <td colspan="2" class="text-center">
                                <form method="POST"  action="<?=base_url();?>siswa/biodata/cek_token">
                                Token : 
                                
                                    <input type="text" class="" name="token_mulai"/>
                                    <button type="submit" class="btn btn-rose btn-fill">Mulai</button>
                                
                                </td>
                                </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            