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
									<label class="label-control">Hizmet Adı *</label>
									<input type="text" class="form-control" name="service_add_title" placeholder="Hizmet Adı" required="">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Anahtar Kelimeler (Meta)</label>
									<input type="text" class="form-control" name="service_add_keyword" placeholder="Anahtar Kelimeler">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Açıklama (Meta)</label>
									<input type="text" class="form-control" name="service_add_description" placeholder="Açıklama">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label class="label-control">Açıklama</label>
									<textarea name="service_add_text" class="ckeditor"></textarea>
								</div>
							</div>

							<hr>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Kapak Fotoğrafı</label>
									<input type="file" name="service_add_cover_photo">
	                            </div>
							</div>

							<div class="col-md-12">
								<label class="label-control">Durum *</label>
								<div class="form-group">
									<label class="radio radio-inline no-margin">
		                            	<input type="radio" name="service_add_status" value="1" class="radiobox style-3" checked="">
		                            	<span>Aktif</span>
		                            </label>
		                            <label class="radio radio-inline no-margin">
		                            	<input type="radio" name="service_add_status" value="0" class="radiobox style-3">
		                            	<span>Pasif</span>
		                            </label>
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