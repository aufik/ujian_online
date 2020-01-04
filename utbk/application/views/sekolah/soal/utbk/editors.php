<script src="<?=base_url();?>assets/sekolah/plugins/tinymce/tinymce.min.js"></script>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                <a href="<?=base_url();?>sekolah/soal/utbk/"><button class="btn btn-warning waves-effect" type="button">Kembali</button></a>
                    <small>Soal / UTBK / tambah</small>
                </h2>
            </div>
            
            <!-- Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah UTBK</h2>

                        </div>
                        <div class="body">
                            <?php echo form_open_multipart(base_url().'sekolah/soal/utbk/tambah/do_create');?>
                            <!-- <form id="form_advanced_validation" method="POST" action="<?=base_url();?>sekolah/soal/utbk/tambah/do_create"> -->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama"  minlength="3" required>
                                        <label class="form-label">Nama</label>
                                    </div>
                                    <!-- <div class="help-info">Min. 3, Max. 10 characters</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email"  required>
                                        <label class="form-label">Email</label>
                                    </div>
                                    <!-- <div class="help-info">Min. Value: 10, Max. Value: 200</div> -->
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="hp" required>
                                        <label class="form-label">HP</label>
                                    </div>
                                    <!-- <div class="help-info">YYYY-MM-DD format</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="alamat" required>
                                        <label class="form-label">Alamat</label>
                                    </div>
                                    <!-- <div class="help-info">Numbers only</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <!-- TinyMCE -->new
                                        <textarea name="catatan" id="catatan" rows="4" class="form-control <strong>mceEditor</strong>"></textarea>


        <textarea name="berita" id="" cols="30" rows="15"></textarea>
         <input name="image" type="file" id="upload" class="hidden" onchange="">
    
            <!-- #END# TinyMCE -->
                                        <!-- <label class="form-label">Password <small> (optional)</small></label> -->
                                    </div>
                                    <!-- <div class="help-info">Numbers only</div> -->
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

    <script type="text/javascript">
    
  tinymce.init({
    selector: "textarea",
    theme: "modern",
    paste_data_images: true,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    
    image_advtab: true,
        templates: [
          { title: 'Test template 1', content: 'Test 1' },
          { title: 'Test template 2', content: 'Test 2' }
        ],
        // content_css: [
        //     base_url+'assets/sekolah/plugins/tinymce/font_googleapis.css',
        //     base_url+'assets/sekolah/plugins/tinymce/codepen.min.css'
        // ],
        file_browser_callback: function(field, url, type, win) {
            tinyMCE.activeEditor.windowManager.open({
                file: base_url()+"assets/sekolah/plugins/kcfinder/browse.php?opener=tinymce4&field=" + field + "&type=" + type,// sesuikan direktory KCfinder
                title: 'File Manager',
                width: 900,
                height: 550,
                inline: true,
                close_previous: false
            }, {
                window: win,
                input: field
            });
            return false;
        },
        setup: function (editor) {
                editor.on('change', function () {
                    tinyMCE.triggerSave();
                });
            }

  });
</script>


<!-- <script>
 
tinyMCE.init({
        theme : "modern",
        
        mode: "specific_textareas",
        editor_selector : "mceEditor",
        plugins: 'print preview fullpage searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
        templates: [
          { title: 'Test template 1', content: 'Test 1' },
          { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            base_url+'assets/sekolah/plugins/editor/tinymce/font_googleapis.css',
            base_url+'assets/sekolah/plugins/editor/tinymce/codepen.min.css'
        ],
        file_browser_callback: function(field, url, type, win) {
            tinyMCE.activeEditor.windowManager.open({
                file: base_url+'assets/sekolah/plugins/editor/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,// sesuikan direktory KCfinder
                title: 'File Manager',
                width: 900,
                height: 550,
                inline: true,
                close_previous: false
            }, {
                window: win,
                input: field
            });
            return false;
        },
        setup: function (editor) {
                editor.on('change', function () {
                    tinyMCE.triggerSave();
                });
            }
       });
 
</script> -->