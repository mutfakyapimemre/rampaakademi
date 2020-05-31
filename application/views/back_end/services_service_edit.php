<div id="content">
	<div class="row">
		<div class="col-md-12">
			<div style="text-align: left;">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa fa-file fa-fw "></i> 
					<?php echo $page['name']; ?> 
				</h1>
			</div>
		</div>
	</div>
	
	<?php if ($this -> input -> get('editAction') == 'true' ): ?>
	<div class="alert alert-block alert-success" style="margin-top: 20px;">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Başarılı</h4>
		<p>Düzenleme İşlemi Başarılı</p>
	</div>
	<?php endif; ?>

	<div class="alert alert-block alert-info">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading"><i class="fa fa-info-circle"></i> Bilgi!</h4>
		<ul>
			<li>Doldurulması zorunlu olan alanlar * ile belirtilmiştir</li>
		</ul>
	</div>

	<div class="row justify-content-center">
		<article class="col-md-2">
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-link"></i> </span>
					<h2><b>Hızlı Erişim</b></h2>				
				</header>

				<div style="padding: 20px;">
					<div><a href="<?php echo base_url('panel/hizmetler/eklenen-hizmetler'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'eklenen-hizmetler') echo ' font-weight: bold;'; ?>"><i class="fa fa-file"></i> Eklenen Hizmetler</a></div>
					<hr style="margin: 10px 0px;">
					<div><a href="<?php echo base_url('panel/hizmetler/hizmet-ekle'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'hizmet-ekle') echo ' font-weight: bold;'; ?>"><i class="fa fa-plus"></i> Hizmet Ekle</a></div>
				</div>

			</div>
		</article>
		<article class="col-md-10">
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" style="margin-bottom: 70px;">
				
				<div style="border: solid 1px #CCCCCC !important;">
					<form method="post" enctype="multipart/form-data">

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<h4 style="font-weight: 400;">Hizmet Bilgileri</h4>
	                            	<div style="margin-top: 10px;">
	                            		<b>Hizmet Linki: </b><a class="link" target="_blank" href="<?php echo $get_service -> service_link; ?>"><?php echo $get_service -> service_link; ?></a><br>
	                            		<b>Oluşturulma Tarihi: </b><?php echo date('d/m/Y - H:i:s', $get_service -> service_create_time); ?><br>
	                            		<b>Güncellenme Tarihi: </b><?php echo $get_service -> service_edit_time != '' ? date('d/m/Y - H:i:s', $get_service -> service_edit_time) : 'Hiç güncellenmedi'; ?>
	                            	</div>
                            	</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="label-control">Hizmet Adı *</label>
									<input type="text" class="form-control" name="service_edit_title" placeholder="Hizmet Adı" value="<?php echo $get_service -> service_title; ?>" required="">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Anahtar Kelimeler (Meta)</label>
									<input type="text" class="form-control" name="service_edit_keyword" placeholder="Anahtar Kelimeler" value="<?php echo $get_service -> service_meta_keywords; ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Açıklama (Meta)</label>
									<input type="text" class="form-control" name="service_edit_description" placeholder="Açıklama" value="<?php echo $get_service -> service_meta_description; ?>">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label class="label-control">Açıklama</label>
									<textarea name="service_edit_text" class="ckeditor"><?php echo $get_service -> service_text; ?></textarea>
								</div>
							</div>

							<hr>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Kapak Fotoğrafı</label>
									<input type="file" name="service_edit_cover_photo">
	                            </div>
							</div>

							<div class="col-md-12">
								<label class="label-control">Durum *</label>
								<div class="form-group">
								<?php
									if ($get_service -> service_status):
										echo '<label class="radio radio-inline no-margin">';
			                            	echo '<input type="radio" name="service_edit_status" value="1" class="radiobox style-3" checked="">';
			                            	echo '<span>Aktif</span>';
			                            echo '</label>';
			                            echo '<label class="radio radio-inline no-margin">';
			                            	echo '<input type="radio" name="service_edit_status" value="0" class="radiobox style-3">';
			                            	echo '<span>Pasif</span>';
			                            echo '</label>';
									else:
										echo '<label class="radio radio-inline no-margin">';
			                            	echo '<input type="radio" name="service_edit_status" value="1" class="radiobox style-3">';
			                            	echo '<span>Aktif</span>';
			                            echo '</label>';
			                            echo '<label class="radio radio-inline no-margin">';
			                            	echo '<input type="radio" name="service_edit_status" value="0" class="radiobox style-3" checked="">';
			                            	echo '<span>Pasif</span>';
			                            echo '</label>';
									endif;
								?>
	                            </div>
							</div>
						</div>

						
						<hr>

						<footer>
							<div class="form-group">
								<button type="submit" name="send" class="btn btn-success">
									<i class="fa fa-check"></i> KAYDET
								</button>
							</div>
						</footer>
					</form>
				</div>
			</div>
		</article>
	</div>
</div>