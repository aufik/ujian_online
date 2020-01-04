<?php
$active_menu=$this->session->userdata('menu');
$active_submenu=$this->session->userdata('submenu');
?>

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?=base_url();?>assets/sekolah/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$this->session->userdata('username');?></div>
                    <div class="email"><?=$this->session->userdata('email')?></div>
                    <div class="btn-group user-helper-dropdown">
                        
                            <a href="<?=base_url();?>auth/logout"  style="color:white; text-decoration:none; ">Keluar <i class="material-icons" >input</i> </a>
                        
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php if($active_menu=='dashboard') echo "active"; ?>">
                        <a href="<?=base_url();?>sekolah/dashboard">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?php if($active_menu=='akademik') echo "active"; ?>">
                         <a href="<?=base_url();?>sekolah/akademik/siswa">
                            <i class="material-icons">swap_calls</i>
                            <span>Siswa</span>
                        </a>
                    </li>
                   
                    <li class="<?php if($active_menu=='room') echo "active"; ?>">
                        <a href="<?=base_url();?>sekolah/room/utbk">
                            <i class="material-icons">swap_calls</i>
                            <span>Room Ujian</span>
                        </a>
                        
                    </li>
                    <li class="<?php if($active_menu=='Soal') echo "active"; ?>">
                    <a href="<?=base_url();?>sekolah/soal/utbk">
                            <i class="material-icons">swap_calls</i>
                            <span>Soal Ujian</span>
                        </a>
                        
                    </li>
                  
                   
                    <li class="header">Profile</li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-amber">donut_large</i>
                            <span>Ganti Password</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">sekolahBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->