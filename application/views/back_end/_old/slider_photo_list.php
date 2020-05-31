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
        <p style="margin: 0px 20px;">Eklenen fotoğraf sayısı: <b><?php echo count($get_slider_photos); ?></b></p>
    </div>
    <!-- content-header -->

    <div class="container-fluid">
        <hr>
        <?php
            if (@$this -> input -> get('insertAction') == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Başarılı!</h4>
                Ekleme işlemi başarılı.</div>';
            endif;

            if (@$this -> input -> get('editAction') == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Başarılı!</h4>
                Düzenleme işlemi başarılı.</div>';
            endif;

          if (@$this -> input -> get('deleteAction') == 'true'):
            echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Başarılı!</h4>
                 Silme işlemi başarılı.</div>';
          endif;
        ?>

        <a href="<?php echo base_url('yonetici/slayt-yonetimi/fotograf-ekle'); ?>" class="btn-success" style="float: right;">
            <i class="icon-plus"></i> FOTOĞRAF EKLE
        </a>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-th"></i>
                        </span>
                        <h5><?php echo $page['name']; ?></h5>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="30">ID</th>
                                    <th width="200">FOTOĞRAF</th>
                                    <th >LİNK</th>
                                    <th width="30">SIRALAMA</th>
                                    <th width="60">DURUM</th>
                                    <th width="80">DÜZENLE</th>
                                    <th width="55">SİL</th>
                                </tr>
                            </thead>
                            <tbody id="sortable" data-url="<?php echo base_url('yonetici/slayt-yonetimi/fotograf-sirala'); ?>">
                            <?php foreach ($get_slider_photos as $photo): ?>
                                <tr id="rank_<?php echo $photo -> slider_photo_id; ?>" class="odd gradeX">
                                    <td style="text-align: center;"><?php echo $photo -> slider_photo_id; ?></td>
                                    <td><img src="<?php echo base_url('public/uploads/slider/'.$photo -> slider_photo_name); ?>" width="200"></td>
                                    <td><a target="blank" href="<?php echo $photo -> slider_photo_link; ?>"><b><?php echo $photo -> slider_photo_link; ?></b></a></td>
                                    <td style="text-align: center; cursor: move;" class="sortable"><i class="icon-move" title="Sürükle"></i></td>
                                    <td style="text-align: center;">
                                        <?php
                                            if ($photo -> slider_photo_status == 1)
                                                echo '<span class="label label-info"><i class="icon-ok"></i> Aktif</span>';
                                            else
                                                echo '<span class="label label-important"><i class="icon-remove"></i> Pasif</span>';
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo base_url('yonetici/slayt-yonetimi/fotograf-duzenle/'.$photo -> slider_photo_id); ?>" class="btn-success">
                                            <i class="icon-edit"></i> DÜZENLE
                                        </a>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="#Delete<?php echo $photo -> slider_photo_id; ?>" data-toggle="modal" class="btn-danger">
                                            <i class="icon-trash"></i> SİL
                                        </a>
                                    </td>
                                </tr>
                                

                                <div id="Delete<?php echo $photo -> slider_photo_id; ?>" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>FOTOĞRAF SİL</h3>
                                    </div>
                                    <!-- modal-header -->

                                    <div class="modal-body">
                                        <p>Bu fotoğrafı silmek istediğinize emin misiniz?</p>
                                        <img src="<?php echo base_url('public/uploads/slider/'.$photo -> slider_photo_name); ?>" width="700">
                                    </div>
                                    <!-- modal-body -->

                                    <div class="modal-footer">
                                        <a class="btn btn-primary" href="<?php echo base_url('yonetici/slayt-yonetimi/fotograf-sil/'.$photo -> slider_photo_id); ?>">Sil</a>
                                        <a data-dismiss="modal" class="btn" href="#">Geri Dön</a>
                                    </div>
                                    <!-- modal-footer -->
                                </div>
                                <!-- Delete -->

                            <?php endforeach; ?>
                            </tbody>
                        </table>

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