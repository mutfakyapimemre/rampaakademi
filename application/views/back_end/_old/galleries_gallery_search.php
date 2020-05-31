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
        <p style="margin: 0px 20px;">Eklenen galeri sayısı: <b><?php echo count($get_search_galleries); ?></b></p>
    </div>
    <!-- content-header -->

    <div class="container-fluid">
        <hr>

        <form method="get" action="<?php echo base_url('yonetici/galeri-yonetimi/galeri-ara'); ?>">
            <input type="text" name="kelime" class="span8" style="float: left;" placeholder="Galeri adı" required="" />
        </form>

        <a href="<?php echo base_url('yonetici/galeri-yonetimi/galeri-ekle'); ?>" class="btn-success" style="float: right;">
            <i class="icon-plus"></i> GALERİ EKLE
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="30">ID</th>
                                    <th><span style="float: left;">GALERİ ADI</span></th>
                                    <th width="120">GALERİ KODU</th>
                                    <th width="120">OLUŞTURULMA TARİHİ</th>
                                    <th width="60">DURUM</th>
                                    <th width="80">DÜZENLE</th>
                                    <th width="55">SİL</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($get_search_galleries as $gallery)
                                {
                            ?>
                                <tr <?php if ($gallery -> gallery_status == 0) echo 'bgcolor="f2dede"'; ?>>
                                    <td style="text-align: center;"><?php echo $gallery -> gallery_id ?></td>
                                    <td>
                                        <?php echo $gallery -> gallery_name; ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php echo $gallery -> gallery_code; ?>
                                        <span style="float: right;" onclick="copy(<?php echo $gallery -> gallery_id; ?>)" title="Kodu kopyala" class="tip-bottom"><i class="icon-copy" style="cursor: pointer;"></i></span>
                                        <input type="text" style="opacity: 0; width: 1px; height: 0px !important;" id="<?php echo $gallery -> gallery_id; ?>" value="<?php echo $gallery -> gallery_code; ?>">
                                    </td>
                                    <td><?php echo date('d/m/Y - H:i:s', $gallery -> gallery_create_time); ?></td>
                                    <td style="text-align: center;">
                                    <?php
                                        if ($gallery -> gallery_status == 1)
                                            echo '<span class="label label-info"><i class="icon-ok"></i> Aktif</span>';
                                        else
                                            echo '<span class="label label-important"><i class="icon-remove"></i> Pasif</span>';
                                    ?>
                                    </td>
                                    <td class="center">
                                        <a href="<?php echo base_url('yonetici/galeri-yonetimi/galeri-duzenle/'.$gallery -> gallery_id); ?>" class="btn-success">
                                            <i class="icon-edit"></i> DÜZENLE
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a href="#Delete<?php echo $gallery -> gallery_id; ?>" data-toggle="modal" class="btn-inverse">
                                            <i class="icon-trash"></i> SİL
                                        </a>   
                                    </td>
                                </tr>
                            

                            <div id="Delete<?php echo $gallery -> gallery_id; ?>" class="modal hide">
                                <div class="modal-header">
                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                    <h3>GALERİ SİL</h3>
                                </div>
                                <!-- modal-header -->

                                <div class="modal-body">
                                    Bu galeriyi silmek istediğinize emin misiniz?
                                    <p><b><?php echo $gallery -> gallery_name ?></b></p>
                                </div>
                                <!-- modal-body -->

                                <div class="modal-footer">
                                    <a class="btn btn-primary" href="<?php echo base_url('yonetici/galeri-yonetimi/galeri-sil/'.$gallery -> gallery_id); ?>">Sil</a>
                                    <a data-dismiss="modal" class="btn" href="#">Geri Dön</a>
                                </div>
                                <!-- modal-footer -->
                            </div>
                            <!-- Delete -->
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
