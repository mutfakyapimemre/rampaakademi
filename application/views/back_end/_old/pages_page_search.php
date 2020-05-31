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
        <p style="margin: 0px 20px;">Eklenen sayfa sayısı: <b><?php echo count($get_search_pages); ?></b></p>
    </div>
    <!-- content-header -->

    <div class="container-fluid">
        <hr>
        <?php
          if (@$_GET['addAction'] == 'true'):
            echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Başarılı!</h4>
                 Sayfa ekleme işlemi başarılı.</div>';
          elseif (@$_GET['addAction'] == 'false'):
            echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Hata!</h4>
                  Sayfa ekleme işlemi yapılırken bir hata oluştu.</div>';
          endif;

          if (@$_GET['editAction'] == 'true'):
            echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Başarılı!</h4>
                 Sayfa düzenleme işlemi başarılı.</div>';
          elseif (@$_GET['editAction'] == 'false'):
            echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Hata!</h4>
                  Sayfa düzenleme işlemi yapılırken bir hata oluştu.</div>';
          endif;

          if (@$_GET['deleteAction'] == 'true'):
            echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Başarılı!</h4>
                 Sayfa silme işlemi başarılı.</div>';
          elseif (@$_GET['deleteAction'] == 'false'):
            echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Hata!</h4>
                  Sayfa silme işlemi yapılırken bir hata oluştu.</div>';
          endif;
        ?>

        <form method="get" action="<?php echo base_url('yonetici/sayfa-yonetimi/sayfa-ara'); ?>">
            <input type="text" name="kelime" class="span8" style="float: left;" placeholder="Sayfa adı" required="" value="<?php echo @$key; ?>" />
        </form>
        
        <a href="<?php echo base_url('yonetici/sayfa-yonetimi/sayfa-ekle'); ?>" class="btn-success" style="float: right;">
            <i class="icon-plus"></i> SAYFA EKLE
        </a>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"> <i class="icon-th"></i>
                        </span>
                        <h5><?php echo $page['name']; ?></h5>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="30">ID</th>
                                    <th>AD</th>
                                    <th>URL ADRESİ</th>
                                    <th width="60">ŞABLON</th>
                                    <th width="60">GRUP</th>
                                    <th width="120">OLUŞTURULMA TARİHİ</th>
                                    <th width="90">GÖRÜNTÜLENME</th>
                                    <th width="60">DURUM</th>
                                    <th width="80">DÜZENLE</th>
                                    <th width="55">SİL</th>
                                </tr>
                            </thead>
                            <?php
                                foreach ($get_search_pages as $value)
                                {
                            ?>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td style="text-align: center;"><?php echo $value -> page_id ?></td>
                                    <td><?php echo $value -> page_title; ?></td>
                                    <td>
                                        /<?php echo $value -> page_url; ?>
                                        <a style="float: right;" target="_blank" title="Adrese git" class="tip-bottom" href="<?php echo base_url($value -> page_url); ?>"><i class="icon-external-link"></i></a>
                                        <span style="float: right;" onclick="copy(<?php echo $value -> page_id; ?>)" title="Adresi kopyala" class="tip-bottom"><i class="icon-copy" style="cursor: pointer;"></i>&nbsp;&nbsp;</span>
                                        <input type="text" style="opacity: 0; height: 0px" id="<?php echo $value -> page_id ?>" value="<?php echo base_url($value -> page_url); ?>">
                                        <a style="float: right;" target="_blank" title="Bu sayfa için menü oluştur" Git" class="tip-bottom" href="<?php echo base_url('yonetici/menu-yonetimi/menu-ekle/'.$value -> page_id); ?>"><i class="icon-plus-sign"></i>&nbsp;&nbsp;</a>
                                    </td>
                                    <td>
                                        <?php
                                            echo $value -> page_template_name;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $value -> page_group_name;
                                        ?>
                                    </td>
                                    <td><?php echo date('d/m/Y - H:i:s', $value -> page_create_time); ?></td>
                                    <td>
                                        <span style="font-size: 11px;"><?php echo $value -> page_view_count; ?></span>
                                        <div style="height: 13px;" class="progress-success">
                                            <div style="height: 13px; border-radius: 3px; width: <?php echo $value -> page_view_count / 10; ?>%; min-width: 1px;  max-width: 90px;" class="bar"></div>
                                        </div>
                                    </td>
                                    <td style="text-align: center;">
                                    <?php
                                        if ($value -> page_status == 1)
                                            echo '<span class="label label-info"><i class="icon-ok"></i> Aktif</span>';
                                        else
                                            echo '<span class="label label-important"><i class="icon-remove"></i> Pasif</span>';
                                    ?>
                                    </td>
                                    <td class="center">
                                        <a href="<?php echo base_url('yonetici/sayfa-yonetimi/sayfa-duzenle/'.$value -> page_id); ?>" class="btn-success">
                                            <i class="icon-edit"></i> DÜZENLE
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a href="#Delete<?php echo $value -> page_id; ?>" data-toggle="modal" class="btn-inverse">
                                            <i class="icon-trash"></i> SİL
                                        </a>
                                    </td>
                                   
                                    <div id="Delete<?php echo $value -> page_id; ?>" class="modal hide">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close" type="button">×</button>
                                            <h3>SAYFA SİL</h3>
                                        </div>
                                        <!-- modal-header -->

                                        <div class="modal-body">
                                            <p>Bu sayfayı silmek istediğinize emin misiniz?</p>
                                            <h4><?php echo $value -> page_title; ?></h4>                                           
                                        </div>
                                        <!-- modal-body -->

                                        <div class="modal-footer">
                                            <a class="btn btn-primary" href="<?php echo base_url('yonetici/sayfa-yonetimi/sayfa-sil/'.$value -> page_id); ?>">Sil</a>
                                            <a data-dismiss="modal" class="btn" href="#">Geri Dön</a>
                                        </div>
                                        <!-- modal-footer -->
                                    </div>
                                    <!-- Delete -->

                                 
                                </tr>
                            </tbody>
                            <?php } ?>
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