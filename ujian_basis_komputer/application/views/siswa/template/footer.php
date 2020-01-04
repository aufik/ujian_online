<footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
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
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="<?=base_url()?>">Sukses Belajar</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    
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
<!-- Sweet Alert 2 plugin -->
<script src="<?=base_url();?>assets/siswa/js/sweetalert2.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?=base_url();?>assets/siswa/js/demo.js"></script>


<script type="text/javascript">
    function setFormValidation(id) {
        $(id).validate({
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });
    }

    $(document).ready(function() {
        setFormValidation('#RegisterValidation');
        setFormValidation('#TypeValidation');
        setFormValidation('#LoginValidation');
        setFormValidation('#RangeValidation');
    });
    
</script>


<!-- countdown -->
<!-- <script src="<?=base_url();?>assets/siswa/js/countdown.js"></script> -->
<script type="text/javascript" src="<?=base_url();?>assets/siswa/js/jquery.countdownTimer.js"></script>
<script>  
  </script>
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:57 GMT -->
</html>

                            <script>
                                $(function(){
                                    $('#hm_timer').countdowntimer({
                                        dateAndTime : "<?=$waktu_selesai;?>",
                                        size : "lg",
                                        timeUp : timeisUp
                                        });
                                function timeisUp() {
                                    //Code to be executed when timer expires
                                    window.location = "<?=base_url();?>siswa/ujian/hasil/<?=$this->session->userdata('peserta_id')?>";
                                }
                                });
                            </script>



            <script src='<?=base_url();?>assets/siswa/js/vue.js'></script>
            <script  src="<?=base_url();?>assets/siswa/js/vue_style_wizard.js"></script>

