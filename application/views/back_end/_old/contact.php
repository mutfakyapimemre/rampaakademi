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
          if (@$_GET['editAction'] == 'true'):
            echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Başarılı!</h4>
                 Mesaj güncelleme işlemi başarılı.</div>';
          elseif (@$_GET['editAction'] == 'false'):
            echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Hata!</h4>
                  Mesaj güncelleme işlemi yapılırken bir hata oluştu.</div>';
          endif;

          if (@$_GET['deleteAction'] == 'true'):
            echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Başarılı!</h4>
                 Mesaj silme işlemi başarılı.</div>';
          elseif (@$_GET['deleteAction'] == 'false'):
            echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Hata!</h4>
                  Mesaj silme işlemi yapılırken bir hata oluştu.</div>';
          endif;
        ?>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                        <i class="icon-th"></i>
                        </span>
                        <h5><?php echo $page['name'];; ?></h5>
                    </div>
                    <!-- widget-box -->
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50">ID</th>
                                <th>AD SOYAD</th>
                                <th width="90">KONU</th>
                                <th width="120">TARİH</th>
                                <th width="90">TELEFON</th>
                                <th width="90">DURUM</th>
                                <th width="145">OKUNDU OLARAK İŞARETLE</th>
                                <th width="60">OKU</th>
                                <th width="55">SİL</th>
                            </tr>
                        </thead>
                        <?php foreach ($get_all_messages as $message): ?>
                        <tbody>
                            <tr class="odd gradeX">
                                <td><?php echo $message->message_id ?></td>
                                <td><?php echo $message->message_name_surname; ?></td>
                                <td><?php echo $message->message_subject; ?></td>
                                <td><?php echo date('Y/m/d - H:i:s', $message->message_date); ?></td>
                                <td><?php echo $message->message_phone; ?></td>
                                <td>
                                    <?php
                                      if ($message->message_status == 0)
                                        echo '<span class="label label-info">Yeni</span>';
                                      else
                                        echo '<span class="label label-label">Okundu</span>';
                                    ?>
                                </td>
                                <td class="center"><a href="<?php echo base_url('yonetici/mesaj-yonetimi/okundu-isaretle/'.$message->message_id); ?>" style="padding : 2px 5px;" class="btn-warning">Okundu Olarak İşaretle</a></td>
                                <td>
                                    <a  href="#Read<?php echo $message->message_id; ?>" data-toggle="modal" style="padding : 2px 5px;" class="btn-success">
                                        <i class="icon-edit"></i> OKU
                                    </a>
                                </td>
                                <td>
                                    <a href="#Delete<?php echo $message -> message_id; ?>" data-toggle="modal" class="btn-inverse">
                                        <i class="icon-trash"></i> SİL
                                    </a>
                                </td>
                            </tr>
                        </tbody>

                        <div id="Read<?php echo $message->message_id; ?>" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>MESAJ OKU</h3>
                            </div>
                            <!-- modal-header -->

                            <div class="modal-body">
                                <b>Gönderen: </b> <?php echo $message->message_name_surname; ?><br />
                                <b>E-Posta Adresi: </b> <?php echo $message->message_email; ?><br />
                                <b>Konu: </b> <?php echo $message->message_subject; ?><br />
                                <b>Telefon: </b> <?php echo $message->message_phone; ?><br />
                                <b>Tarih: </b> <?php echo date('Y/m/d - H:i:s', $message->message_date); ?><br />
                                <p><b>Mesaj İçeriği: </b><br /> <?php echo $message->message_text; ?></p>
                            </div>
                            <!-- modal-body -->

                            <div class="modal-footer">
                                <a class="btn btn-warning" href="<?php echo base_url('yonetici/mesaj-yonetimi/okundu-isaretle/'.$message->message_id); ?>">Okundu Olarak İşaretle</a>
                                <a class="btn btn-inverse" href="<?php echo base_url('yonetici/mesaj-yonetimi/mesaj-sil/'.$message->message_id); ?>">Sil</a>
                                <a data-dismiss="modal" class="btn" href="#">Geri Dön</a>
                            </div>
                            <!-- modal-footer -->
                        </div>
                        <!-- Read -->

                        <div id="Delete<?php echo $message->message_id; ?>" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>MESAJ SİL</h3>
                            </div>
                            <!-- modal-header -->

                            <div class="modal-body">
                                <p>
                                    <h5><?php echo $message->message_subject; ?></h5>
                                    <?php echo $message->message_text; ?><br /><br />
                                    Bu mesajı silmek istediğinize eminmisiniz?
                                </p>
                            </div>
                            <!-- modal-body -->

                            <div class="modal-footer">
                                <a class="btn btn-primary" href="<?php echo base_url('yonetici/mesaj-yonetimi/mesaj-sil/'.$message->message_id); ?>">Sil</a>
                                <a data-dismiss="modal" class="btn" href="#">Geri Dön</a>
                            </div>
                            <!-- modal-footer -->
                        </div>
                        <?php endforeach; ?>
                       
                    </table>
                </div>
                <!-- widget-content nopadding -->
            </div>
            <!-- span12 -->
        </div>
        <!-- row-fluid -->
    </div>
    <!-- container-fluid -->

</div>
<!-- content -->