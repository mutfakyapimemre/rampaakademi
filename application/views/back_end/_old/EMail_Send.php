<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo base_url('admin'); ?>" title="Anasayfaya Git" class="tip-bottom">
                <i class="icon-home"></i> Ana Sayfa
            </a>
            <a href="<?php echo base_url('admin/site-ayarlari'); ?>" class="current"><?php echo $title; ?></a>
        </div>
        <!-- breadcrumb -->

        <h1><?php echo $title; ?></h1>
    </div>
    <!-- content-header -->

    <div class="container-fluid">
        <hr>
        <?php
            if (@$_GET['sendAction'] == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Başarılı!</h4>
                 E-Posta gönderme işlemi başarılı.</div>';
            elseif (@$_GET['sendAction'] == 'false'):
                echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Hata!</h4>
                 E-Posta gönderme işlemi yapılıken bir hata oluştu. Lütfen tekrar deneyin.</div>';
            endif;
        ?>

        <div class="alert alert-info alert-block">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Bilgi!</h4>
            <ul>
                <li>Doldurulması zorunlu olan alanlar <b>*</b> ile belirtilmiştir.</li>
                <li>E-Posta göndermeden önce e-posta ayarlarını yapılandırdığınızdan emin olun.</li>
                <li>E-Posta ayarlarınızı yapılandırmak için <a href="<?php echo base_url('yonetici/ayarlar/e-posta-ayarlari'); ?>"><b>buraya</b></a> tıklayın.</li>
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
                        <h5><?php echo $title; ?></h5>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content nopadding">
                        <form action="#" method="post" action="urun-yonetimi/urun-ekle" enctype="multipart/form-data" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Gönderici E-Posta Adresi *</label>
                                <div class="controls">
                                    <input type="text" class="span11" disabled="" value="<?php echo $get_settings_email -> email_setting_smtp_user; ?>" required="" />
                                    <span style="cursor: help;" title="Sayfa Başlığı" id="example" data-content="" data-placement="top" data-toggle="popover">&nbsp;Nedir?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Gönderici Ad Soyad *</label>
                                <div class="controls">
                                    <input type="text" class="span11" disabled="" value="<?php echo $get_settings_email -> email_setting_name_surname ; ?>" required="" />
                                    <span style="cursor: help;" title="Sayfa Başlığı" id="example" data-content="" data-placement="top" data-toggle="popover">&nbsp;Nedir?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Alıcı E-Posta Adresi *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="email_send_to" placeholder="E-Posta Adresi" value="" required="" />
                                    <span style="cursor: help;" title="Sayfa Başlığı" id="example" data-content="" data-placement="top" data-toggle="popover">&nbsp;Nedir?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Konu *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="email_send_subject" placeholder="Konu" value="" required="" />
                                    <span style="cursor: help;" title="Sayfa Başlığı" id="example" data-content="" data-placement="top" data-toggle="popover">&nbsp;Nedir?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">İçerik</label>
                                <div class="controls" style="width: 80% !important;">
                                    <textarea name="email_send_content" class="ckeditor"></textarea>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Gönder</button>
                            </div>
                            <!-- form-actions -->
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
