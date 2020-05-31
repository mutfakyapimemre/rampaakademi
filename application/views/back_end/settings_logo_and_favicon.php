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
	<div class="alert alert-block alert-success">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Başarılı</h4>
		<p>Güncelleme İşlemi Başarılı</p>
	</div>
	<?php endif; ?>

	<div class="alert alert-block alert-info">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading"><i class="fa fa-info-circle"></i> Bilgi!</h4>
		<ul>
			<li>Doldurulması zorunlu olan alanlar * ile belirtilmiştir</li>
			<li>Site Adı en fazla 50 karakter uzunluğunda olmalıdır</li>
			<li>Anahtar kelimeler aralarına virgül koyularak en fazla 11 adet yazılmalıdır</li>
			<li>Site açıklaması en fazla 170 karakter uzunluğunda olmalıdır</li>
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
					<div><a href="<?php echo base_url('panel/ayarlar/site-ayarlari'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'site-ayarlari') echo ' font-weight: bold;'; ?>"><i class="fa fa-cog"></i> Site Ayarları</a></div>
					<hr style="margin: 10px 0px;">
					<div><a href="<?php echo base_url('panel/ayarlar/logo-ve-favicon-ayarlari'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'logo-ve-favicon-ayarlari') echo ' font-weight: bold;'; ?>"><i class="fa fa-file-image-o"></i> Logo ve Favicon Ayarları</a></div>
					<hr style="margin: 10px 0px;">
					<div><a href="<?php echo base_url('panel/ayarlar/sosyal-medya-ayarlari'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'sosyal-medya-ayarlari') echo ' font-weight: bold;'; ?>"><i class="fa fa-slack"></i> Sosyal Medya Ayarları</a></div>
					<hr style="margin: 10px 0px;">
					<div><a href="<?php echo base_url('panel/ayarlar/e-posta-ayarlari'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'e-posta-ayarlari') echo ' font-weight: bold;'; ?>"><i class="fa fa-envelope"></i> E-Posta Ayarları</a></div>
					<hr style="margin: 10px 0px;">
					<div><a href="<?php echo base_url('panel/ayarlar/harici-kod-ayarlari'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'harici-kod-ayarlari') echo ' font-weight: bold;'; ?>"><i class="fa fa-code"></i> Harici Kod Ayarları</a></div>
					<hr style="margin: 10px 0px;">
					<div><a href="<?php echo base_url('panel/ayarlar/site-haritasi-ayarlari'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'site-haritasi-ayarlari') echo ' font-weight: bold;'; ?>"><i class="fa fa-sitemap"></i> Site Haritası Ayarları</a></div>
				</div>
			</div>
		</article>

		<article class="col-md-10">
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2><?php echo $page['name']; ?></h2>				
				</header>

				<div>
					<form method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Logo</label>
									<input type="file" name="site_settings_logo">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Favicon</label>
									<input type="file" name="site_settings_favicon">
								</div>
							</div>
						</div>

						<hr>
						
						<footer>
							<div class="form-group">
								<button type="submit" class="btn btn-success">
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