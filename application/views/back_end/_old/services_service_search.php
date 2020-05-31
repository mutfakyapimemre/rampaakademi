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
        <p style="margin: 0px 20px;">Bulunan hizmet sayısı: <b><?php echo count($get_search_services); ?></b></p>
    </div>
    <!-- content-header -->

    <div class="container-fluid">
        <hr>
        <?php
            if (@$this -> input -> get('addAction') == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Başarılı!</h4>
                Ekleme işlemi başarılı.</div>';
            elseif (@$this -> input -> get('addAction') == 'false'):
                echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Hata!</h4>
                Ekleme işlemi yapılırken bir hata oluştu.</div>';
            endif;

            if (@$this -> input -> get('editAction') == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Başarılı!</h4>
                Düzenleme işlemi başarılı.</div>';
            elseif (@$this -> input -> get('editAction') == 'false'):
                echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Hata!</h4>
                Düzenleme işlemi yapılırken bir hata oluştu.</div>';
            endif;

            if (@$this -> input -> get('deleteAction') == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Başarılı!</h4>
                Silme işlemi başarılı.</div>';
            elseif (@$this -> input -> get('deleteAction') == 'false'):
                echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Hata!</h4>
                Silme işlemi yapılırken bir hata oluştu.</div>';
            endif;
        ?>

        <form method="get" action="<?php echo base_url('yonetici/hizmet-yonetimi/hizmet-ara'); ?>">
            <input type="text" name="kelime" class="span8" style="float: left;" placeholder="Hizmet adı" value="<?php echo $key; ?>" required="" />
        </form>
        
        <a href="<?php echo base_url('yonetici/hizmet-yonetimi/hizmet-ekle'); ?>" class="btn-success" style="float: right;">
            <i class="icon-plus"></i> HİZMET EKLE
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="30">ID</th>
                                    <th width="50">ID</th>
                                    <th>AD</th>
                                    <th>URL ADRESİ</th>
                                    <th width="120">OLUŞTURULMA TARİHİ</th>
                                    <th width="90">GÖRÜNTÜLENME</th>
                                    <th width="60">DURUM</th>
                                    <th width="80">DÜZENLE</th>
                                    <th width="55">SİL</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($get_search_services as $value): ?>
                          
                                <tr <?php if ($value -> service_status == 0) echo 'bgcolor="f2dede"'; ?>>
                                    <td style="text-align: center;"><?php echo $value -> service_id ?></td>
                                    <td style="text-align: center;">
                                        <img src="<?php echo base_url('public/uploads/services/50x50/'.$value -> service_img); ?>" width="50">
                                    </td>
                                    <td><?php echo $value -> service_title; ?></td>
                                    <td>
                                        /s/<?php echo $value -> service_url; ?>
                                        <a style="float: right;" target="_blank" title="Adrese git" class="tip-bottom" href="<?php echo base_url('s/'.$value -> service_url); ?>"><i class="icon-external-link"></i></a>
                                        <span style="float: right;" onclick="copy(<?php echo $value -> service_id; ?>)" title="Adresi kopyala" class="tip-bottom"><i class="icon-copy" style="cursor: pointer;"></i>&nbsp;&nbsp;</span>
                                        <input type="text" style="opacity: 0; height: 0px" id="<?php echo $value -> service_id ?>" value="<?php echo base_url('s/'.$value -> service_url); ?>">
                                    </td>
     
                                    <td><?php echo date('d/m/Y - H:i:s', $value -> service_create_time); ?></td>
                                    <td>
                                        <span style="font-size: 11px;"><?php echo $value -> service_view_count; ?></span>
                                        <div style="height: 13px;" class="progress-success">
                                            <div style="height: 13px; border-radius: 3px; width: <?php echo $value -> service_view_count / 10; ?>%; min-width: 1px;  max-width: 90px;" class="bar"></div>
                                        </div>
                                    </td>
                                    <td style="text-align: center;">
                                    <?php
                                        if ($value -> service_status == 1)
                                            echo '<span class="label label-info"><i class="icon-ok"></i> Aktif</span>';
                                        else
                                            echo '<span class="label label-important"><i class="icon-remove"></i> Pasif</span>';
                                    ?>
                                    </td>
                                    <td class="center">
                                        <a href="<?php echo base_url('yonetici/hizmet-yonetimi/hizmet-duzenle/'.$value -> service_id); ?>" class="btn-success">
                                            <i class="icon-edit"></i> DÜZENLE
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a href="#Delete<?php echo $value -> service_id; ?>" data-toggle="modal" class="btn-danger">
                                            <i class="icon-trash"></i> SİL
                                        </a>
                                    </td>
                                </tr>

                                <div id="Delete<?php echo $value -> service_id; ?>" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>SAYFA SİL</h3>
                                    </div>
                                    <!-- modal-header -->

                                    <div class="modal-body">
                                        <p>Bu sayfayı silmek istediğinize emin misiniz?</p>
                                        <h4><?php echo $value -> service_title; ?></h4>                                           
                                    </div>
                                    <!-- modal-body -->

                                    <div class="modal-footer">
                                        <a class="btn btn-primary" href="<?php echo base_url('yonetici/hizmet-yonetimi/hizmet-sil/'.$value -> service_id); ?>">Sil</a>
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
