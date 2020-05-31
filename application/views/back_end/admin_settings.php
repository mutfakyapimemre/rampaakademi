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
	
	<article class="container" style="max-width: 500px; margin-left: auto; margin-right: auto;">

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

		<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" style="margin-bottom: 70px;">
			
			<div style="border: solid 1px #CCCCCC !important;">
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="label-control">Ad *</label>
								<input type="text" class="form-control" name="admin_settings_name" placeholder="Ad" required=""  value="<?php echo $get_admin_settings->admin_name; ?>">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label class="label-control">Soyad *</label>
								<input type="text" class="form-control" name="admin_settings_surname" placeholder="Soyad" required="" value="<?php echo $get_admin_settings->admin_surname; ?>">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label class="label-control">E-Posta Adresi *</label>
								<input type="text" class="form-control" name="admin_settings_e_mail" placeholder="E-Posta Adresi" required="" value="<?php echo $get_admin_settings->admin_email; ?>">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label class="label-control">Şifre *</label>
								<input type="password" class="form-control" name="admin_settings_password" placeholder="Şifre">
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