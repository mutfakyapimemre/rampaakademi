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
        
        <div class="alert alert-info alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Bilgi!</h4>
            <ul>
                <li>Doldurulması zorunlu olan alanlar * ile belirtilmiştir</li>
                <li>Tek seferde <b>1 adet</b> fotograf yüklenebilir</li>
                <li>Yüklenen dosyanın dosya boyutu <b>20 MB</b> ı geçmemelidir</li>
                <li>Yüklenen dosyanın formatı resim formatında (<b>JPEG</b>, <b>JPG</b>, <b>PNG</b>, <b>GIF</b>, <b>BMP</b>) olmalıdır</li>
                <li>Yüklenen dosyanın formatı <b>JPG</b> formatına çevrilerek kaydedilip, transparan içerikli resimler transparan özelliğini kaybedecektir</li>
                <li>Yüklenen dosyanın renk uzayı <b>RGB</b> yada <b>CMYK</b> olmalıdır</li>
                <li>Yüklenen dosya <b>1140px X 400px</b> olarak yeniden ebatlandırılacak ve kalite <b>20%</b> oranında düşürülecektir</li>
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
                        <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data">

                            <div class="control-group">
                                <label class="control-label">Fotoğraf Url</label>
                                <div class="controls">
                                    <input type="text" name="slider_edit_photo_link" class="span11" value="<?php echo $get_slider_photo -> slider_photo_link; ?>">
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Yayın Durumu *</label>
                                <div class="controls">
                                    <?php
                                        if ($get_slider_photo -> slider_photo_status == 1):
                                            echo '<input type="radio" name="slider_edit_photo_status" value="1" checked="" /> <span style="font-size: 15px;">Aktif</span>';
                                            echo '<input type="radio" name="slider_edit_photo_status" value="0" /> <span style="font-size: 15px;">Pasif</span>';
                                        else:
                                            echo '<input type="radio" name="slider_edit_photo_status" value="1" /> <span style="font-size: 15px;">Aktif</span>';
                                            echo '<input type="radio" name="slider_edit_photo_status" value="0" checked="" /> <span style="font-size: 15px;">Pasif</span>';
                                        endif;
                                    ?>
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
                <!-- widget-title -->
            </div>
            <!-- span12 -->
        </div>
        <!-- row-fluid -->
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->
