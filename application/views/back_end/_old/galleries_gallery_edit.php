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

        <div class="alert alert-info alert-block">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Bilgi!</h4>
            <ul>
                <li>Doldurulması zorunlu olan alanlar <b>*</b> ile belirtilmiştir.</li>
                <li>Yayın durumu <b>Pasif</b> olarak işaretlenen galeriler site içerisinde görüntülenemez.</li>
            </ul>
        </div>
        <!-- alert alert-info alert-block -->
    
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5><?php echo $page['name']; ?></h5>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content nopadding">
                        <div class="widget-box" style="margin: 10px;">
                            <div class="widget-title">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab1">Galeri Ayarları</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Fotoğraflar</a></li>
                                </ul>
                            </div>
                            <!-- widget-title -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="widget-content tab-content">

                                    <div class="control-group">
                                        <div class="controls">
                                            <h4>Galeri Bilgileri</h4>
                                            <b>Galeri Kodu: </b><?php echo $get_gallery -> gallery_code; ?><br>
                                            <b>Oluşturulma Tarihi: </b><?php echo date('d/m/Y - H:i:s', $get_gallery -> gallery_create_time); ?><br>
                                            <b>Güncellenme Tarihi: </b><?php echo $get_gallery -> gallery_update_time != '' ? date('d/m/Y - H:i:s', $get_gallery -> gallery_update_time) : 'Hiç güncellenmedi'; ?>
                                        </div>
                                        <!-- controls -->
                                    </div>
                                    <!-- control-group -->

                                    <div id="tab1" class="tab-pane active">
                                        
                                        <form action="#" method="post" action="urun-yonetimi/urun-ekle" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="control-group">
                                                <label class="control-label">Galeri Adı *</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="gallery_edit_name" placeholder="Galeri Adı" value="<?php echo $get_gallery -> gallery_name; ?>" required="" />
                                                </div>
                                                <!-- controls -->
                                            </div>
                                            <!-- control-group -->

                                            <div class="control-group">
                                                <label class="control-label">Küçük Fotoğraf Boyutu (px)*</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" name="gallery_edit_photo_size" placeholder="Örn; 100" value="<?php echo $get_gallery -> gallery_photo_size; ?>" required="" />
                                                </div>
                                                <!-- controls -->
                                            </div>
                                            <!-- control-group -->

                                            <div class="control-group">
                                                <label class="control-label">Durum *</label>
                                                <div class="controls">
                                                    <?php
                                                        if ($get_gallery -> gallery_status == 1):
                                                            echo '<label style="font-size: 14px;"><input type="radio" name="gallery_edit_status" value="1" checked="" />  Aktif</label>';
                                                            echo '<label style="font-size: 14px;"><input type="radio" name="gallery_edit_status" value="0" />  Pasif</label>';
                                                        else:
                                                            echo '<label style="font-size: 14px;"><input type="radio" name="gallery_edit_status" value="1" />  Aktif</label>';
                                                            echo '<label style="font-size: 14px;"><input type="radio" name="gallery_edit_status" value="0" checked="" />  Pasif</label>';
                                                        endif;
                                                    ?>
                                                </div>
                                                <!-- controls -->
                                            </div>
                                            <!-- control-group -->

                                        </form>
                                    </div>

                                    <div id="tab2" class="tab-pane">
                                        
                                        <div class="control-group">
                                            <label class="control-label">Fotoğraflar *</label>
                                            <div class="controls">
                                                <input type="file" name="gallery_edit_photos[]" multiple="">
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Fotoğraflar</label>
                                            <div class="controls">
                                                <?php
                                                    foreach ($get_gallery_photos as $value)
                                                    {
                                                        echo '<div style="margin: 5px; float: left; border: solid 2px rgba(0,0,0,0.1); padding: 5px;" class="'.$value -> gallery_photo_id.'">';
                                                        echo '<img src="'.base_url('public/uploads/galleries/450x450/'.$value -> gallery_photo_name).'" width="150">';
                                                        echo '<a data-url="'.site_url('yonetici/galeri-yonetimi/fotograf-sil').'" data-name="'.$value -> gallery_photo_name.'"  id="'.$value -> gallery_photo_id.'" class="photo" style="font-weight: bold;" href=""><br> Sil</a>';
                                                        echo '</div>';
                                                    }
                                                ?>
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-success">Gönder</button>
                                </div>
                            </form>

                        </div>
                        <!-- widget-box -->
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