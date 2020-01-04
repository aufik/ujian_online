<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>assets/siswa/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?=base_url();?>assets/siswa/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Sukses Belajar</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <!-- Bootstrap core CSS     -->
    <link href="<?=base_url();?>assets/siswa/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?=base_url();?>assets/siswa/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?=base_url();?>assets/siswa/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="<?=base_url();?>assets/siswa/css/font-awesome.css" rel="stylesheet" />
    <link href="<?=base_url();?>assets/siswa/css/google-roboto-300-700.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="<?=base_url();?>">Sukses Belajar</a>
            </div>
          
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page register-page" filter-color="black" data-image="<?=base_url();?>assets/siswa/img/register.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">HASIL UJIAN</h2>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="card-content">
                                        <div class="info info-horizontal">
                                            <div class="icon icon-rose">
                                                <i class="material-icons">timeline</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Total Nilai</h4>
                                                <p class="description">
                                                    <?= $total_nilai ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="info info-horizontal">
                                            <div class="icon icon-primary">
                                                <i class="material-icons">book</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Jumlah Soal Yang dijawab</h4>
                                                <p class="description">
                                                <?= $total_yang_dijawab ?>
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div class="info info-horizontal">
                                            <div class="icon icon-info">
                                                <i class="material-icons">book</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Total Soal</h4>
                                                <p class="description">
                                                <?= $total_soal  ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="social text-center">
                                        <img src="<?=base_url();?>assets/siswa/img/logo-sbmptn-png-6.png" style="width:100px;"> &nbsp;
                                        <img src="<?=base_url();?>assets/siswa/img/logo-sbmptn-png-6.png" style="width:100px;">
                                    </div>
                                        
                                        <div class="card-content">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <input type="text" class="form-control" value="<?=$peserta->peserta_username?>" disabled>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">room</i>
                                                </span>
                                                <input type="text" class="form-control" value="<?=$room->room_nama?>" disabled>
                                            </div>
                                           
<!--                                             
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">school</i>
                                                </span>
                                                <input type="password" placeholder="Password..." class="form-control" />
                                            </div> -->
                                            <!-- If you want to add a checkbox to this form, uncomment this code -->
                                            <!-- <h3>Selamat <?=$peserta->peserta_username?> Telah Selesai Melakukan Ujain Online</h3> -->
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <!-- <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li> -->
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="<?=base_url();?>">Sukses Belajar</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>

</body>
<!--   Core JS Files   -->
<script src="<?=base_url();?>assets/siswa/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/siswa/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/siswa/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/siswa/js/material.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/siswa/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?=base_url();?>assets/siswa/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?=base_url();?>assets/siswa/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?=base_url();?>assets/siswa/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?=base_url();?>assets/siswa/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?=base_url();?>assets/siswa/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="<?=base_url();?>assets/siswa/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?=base_url();?>assets/siswa/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?=base_url();?>assets/siswa/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?=base_url();?>assets/siswa/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="<?=base_url();?>assets/siswa/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="<?=base_url();?>assets/siswa/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?=base_url();?>assets/siswa/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?=base_url();?>assets/siswa/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?=base_url();?>assets/siswa/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?=base_url();?>assets/siswa/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?=base_url();?>assets/siswa/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?=base_url();?>assets/siswa/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:57 GMT -->
</html>