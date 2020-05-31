<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo base_url('yonetici'); ?>" title="Anasayfaya Git" class="tip-bottom">
                <i class="icon-home"></i> Ana Sayfa
            </a>
            <a href="<?php echo $page['url']; ?>" class="current"><?php echo $page['name']; ?></a>
        </div>
        <!-- breadcrumb -->

        <h1><?php echo $page['name']; ?></h1>
    </div>
    <!-- content-header -->
        
    <div class="container-fluid">
        <hr>
        <?php
            if (@$this -> input -> get('editAction') == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Başarılı!</h4>
                    Güncelleme işlemi başarılı.</div>';
            elseif (@$this -> input -> get('editAction') == 'false'):
                echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Hata!</h4>
                    Güncelleme işlemi yapılırken bir hata oluştu.</div>';
            endif;
        
            if ($this -> session -> userdata('admin_id') == 1):
                echo '<div class="alert alert-info alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Bilgi!</h4>
                    <ul>
                        <li>Bu sayfa <b>info@mutfakyapim.com</b> kullanıcısının bilgilerini değil <b>'.$get_admin_settings->admin_email.'</b> kullanıcının bilgilerini güncellemektedir.</li>
                        <li><b>'.$get_admin_settings->admin_email.'</b> kullanıcısı ile oturum açıldığında bu uyarı görüntülenmeyecektir.</li>
                    </ul>
                    </div>';
            endif;
        ?>

        <div class="alert alert-info alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Bilgi!</h4>
            <ul>
                <li>Doldurulması zorunlu olan alanlar <b>*</b> ile belirtilmiştir.</li>
            </ul>
        </div>
        <!-- alert alert-info alert-block -->
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                        <i class="icon-align-justify"></i>
                        </span>
                        <h5><?php echo $page['name']; ?></h5>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content nopadding">
                        <form action="#" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Ad *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="admin_settings_name" value="<?php echo $get_admin_settings->admin_name; ?>" required="" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Soyad *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="admin_settings_surname" value="<?php echo $get_admin_settings->admin_surname; ?>" required="" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">E-Posta Adresi *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="admin_settings_e_mail" value="<?php echo $get_admin_settings->admin_email; ?>" required="" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Şifre *</label>
                                <div class="controls">
                                    <input type="password" class="span11" name="admin_settings_password" value="" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Gönder</button>
                            </div>
                            <!-- form-action -->
                        </form>
                    </div>
                    <!-- widget-content nopadding -->
                </div>
                <!-- widget-box -->
            </div>
            <!-- span12 -->
        </div>
        <!-- row-fluid -->
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->
