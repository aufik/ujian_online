<style type="text/css">
    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-track {
      background-color: #333;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #2799ff;
    }


    .wrapper {
      text-align: center;
    }

    h1 {
      color: white;
    }

    .countdown {
      display: flex;
      padding:1%;
    }

  </style>
<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?=base_url();?>assets/siswa/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com/" class="simple-text">
                <img src="<?=base_url();?>assets/siswa/img/logo-sbmptn-png-6.png" style="width:100px;">
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com/" class="simple-text">
                    SB
                </a>
                
            </div>
            
            <div class="sidebar-wrapper" style="width:100%; padding:2%;">
            
            <div class="nav" style="padding:4%;">
                <div class="card text-white bg-secondary" style="padding:0.5%; margin:0;">
                            <h6>&nbsp;&nbsp; Jawab Setiap  Soal</h6>
                                <!-- <div class="row"> -->
                                <?php
                                                // if(isset($links)){
                                                //     echo $links;
                                                // } 
                                                
                                            ?>
                            <?php
                            $peserta_id = 123;
                                            for($i=0; $i<count($id_soal)-1; $i++){
                                              $soal_telah_dijawab = false;
                                              $k=$i+1;
                                                for($j=0; $j<count($id_soal_dijawab)-1; $j++){
                                                  if($id_soal[$i] == $id_soal_dijawab[$j]){
                                                    $soal_telah_dijawab = true;
                                                  }
                                                }
                                                // $j=$i+1;
                                                  // echo "<a><button  class=' btn-xs "if($soal_telah_dijawab == true)"' style='margin:1px;'>$is</button></a>";
                                                  ?>
                                                    <a href="<?=base_url();?>siswa/ujian/proses/<?=$k?>"><button  class="btn-xs <?php if($soal_telah_dijawab == true){echo "btn-success";} ?>" style='margin:1px;'><?=$k?></button></a>
                                                  <?php
                                                
                                                
                                            }
                                    ?>
                                    <!-- </div> -->
                        </div>
                </div>
                <!-- <div class="nav" style="padding:2%;">
                    <div class="card text-white bg-secondary" style="padding:0.5%; margin:0;">
                    
                        <div class="countdown" data-date="<?=$date_start;?>" data-time="<?=$waktu_selesai?>">
                            Sisa Waktu: 
                            <div class="day"><span class="num"></span><span class="word"></span></div>
                            <div class="hour"><span class="num"></span><span class="word"></span></div>
                            <div class="min"><span class="num"></span><span class="word"></span></div>
                            <div class="sec"><span class="num"></span><span class="word"></span></div>
                        </div>
                    </div>
                </div>     -->
                 
                
              
            </div>
        </div>
        <div class="main-panel" >
            <nav class="navbar navbar navbar-absolute " >
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <!-- <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button> -->
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> SBMPTN 2020 </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                   <li>
                      <div style="background:grey; padding:10% 10%; width:100px; color:white;">
                        Sisa Waktu: 
                      </div>
                   </li>
                    <li>
                      <div style="background:black; width:100px; padding:10% 15%; color:white;">
                          <span id="hm_timer"></span>
                        </div>
                        
                        <!-- <div class="countdown" data-date="<?=$date_start;?>" data-time="<?=$waktu_selesai?>" style="background:black; width:100px; padding:10% 15%; color:white;"> -->
                        <!-- <div class="countdown" data-date="27-12-2019" data-time="23:00">
                            
                            
                              <div class="day"><span class="num"></span><span class="word"></span></div>
                              <div class="hour"><span class="num"></span><span class="word"></span></div>
                              <div class="min"><span class="num"></span><span class="word"></span></div>
                              <div class="sec"><span class="num"></span><span class="word"></span></div>
                            
                        </div> -->
                    </li>
                </ul>
            </div>
                    <!-- <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                           
                        </ul>
                        
                    </div> -->
                </div>
            </nav>


            
