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
                    <img src="<?=base_url();?>assets/admin/images/user.png" width="48" height="48" alt="User" />
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
                        <a href="<?=base_url();?>admin/dashboard">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?php if($active_menu=='akademik') echo "active"; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">school</i>
                            <span>Akademik</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if($active_submenu=='akademik_sekolah') echo "active"; ?>">
                                <a href="<?=base_url();?>admin/akademik/sekolah">Sekolah</a>
                            </li>
                            <!-- <li class="<?php if($active_submenu=='akademik_guru') echo "active"; ?>">
                                <a href="<?=base_url();?>admin/akademik/guru">Guru</a>
                            </li> -->
                            <li class="<?php if($active_submenu=='akademik_siswa') echo "active"; ?>">
                                <a href="<?=base_url();?>admin/akademik/siswa">Siswa</a>
                            </li>
                            
                            <!-- <li class="<?php if($active_submenu=='akademik_kelas') echo "active"; ?>">
                                <a href="<?=base_url();?>admin/akademik/kelas">Kelas</a>
                            </li> -->
                        </ul>
                    </li>
                   
                    <li class="<?php if($active_menu=='room') echo "active"; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">room</i>
                            <span>Room Ujian</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if($active_submenu=='room_utbk') echo "active"; ?>">
                                <a href="<?=base_url();?>admin/room/utbk">Room</a>
                            </li>
                            <!-- <li class="<?php if($active_submenu=='room_unbk') echo "active"; ?>">
                            <a href="<?=base_url();?>admin/room/unbk">UTBK</a>
                            </li> -->
                            <li class="<?php if($active_submenu=='peserta_sekolah') echo "active"; ?>">
                                <a href="<?=base_url();?>admin/room/sekolah">Peserta Sekolah</a>
                            </li> 
                        </ul>
                    </li>
                    <li class="<?php if($active_menu=='Soal') echo "active"; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">description</i>
                            <span>Soal Ujian</span>
                        </a>
                        <ul class="ml-menu">
                             <li class="<?php if($active_submenu=='soal_utbk') echo "active"; ?>">
                                <a href="<?=base_url();?>admin/soal/utbk">UTBK</a>
                            </li>
                            <!-- <li class="<?php if($active_submenu=='soal_unbk') echo "active"; ?>">
                            <a href="<?=base_url();?>admin/soal/unbk">UTBK</a>
                            </li>  -->
                        </ul>
                    </li>
                    <!-- <li class="<?php if($active_menu=='Soal') echo "active"; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">description</i>
                            <span>Peserta</span>
                        </a>
                        <ul class="ml-menu">
                             <li class="<?php if($active_submenu=='soal_utbk') echo "active"; ?>">
                                <a href="<?=base_url();?>admin/soal/utbk">Pendaftar</a>
                            </li>
                            
                            <li class="<?php if($active_submenu=='soal_unbk') echo "active"; ?>">
                            <a href="<?=base_url();?>admin/soal/unbk">Peserta</a>
                            </li> 

                        </ul>
                    </li> -->
                    <li class="<?php if($active_menu=='Soal') echo "active"; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">description</i>
                            <span>Aministrasi</span>
                        </a>
                        <ul class="ml-menu">
                             <li class="<?php if($active_submenu=='harga') echo "active"; ?>">
                                <a href="<?=base_url();?>admin/administrasi/harga">Harga</a>
                            </li>
                            <li class="<?php if($active_submenu=='diskon') echo "active"; ?>">
                            <a href="<?=base_url();?>admin/administrasi/Discount">Promo</a>
                            </li> 
                            <li class="<?php if($active_submenu=='harga_peserta') echo "active"; ?>">
                            <a href="<?=base_url();?>admin/administrasi/harga_peserta">Harga Peserta</a>
                            </li> 
                        </ul>
                    </li>
                  
                   
                    <!-- <li class="header">Profile</li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-amber">donut_large</i>
                            <span>Ganti Password</span>
                        </a>
                    </li> -->
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);">Suksesbelajar</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->