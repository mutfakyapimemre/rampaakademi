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
					<div><a href="<?php echo base_url('panel/urunler/eklenen-urunler'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'eklenen-urunler') echo ' font-weight: bold;'; ?>"><i class="fa fa-file"></i> Eklenen Rezervasyonlar</a></div>
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
									<h4 style="font-weight: 400;">Rezervasyon Bilgileri</h4>
	                            	<div style="margin-top: 10px;">
	                            		<b>Oluşturulma Tarihi: </b><?php echo date('d/m/Y - H:i:s', $get_reservation -> reservation_date); ?><br>
	                            	</div>
                            	</div>
							</div>
						</div>
						
						<hr>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Rezervasyon Eğitimi *</label>
									<select name="product_id" id="product_id" class="form-control" required>
										<?php foreach($get_products as $product):?>
											<option <?=($get_reservation->product_id == $product->product_id ? "selected" : null)?> value="<?=$product->product_id?>"><?=$product->product_name?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>


							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Ad</label>
									<input type="text" class="form-control" name="reservation_name" placeholder="Ad" value="<?php echo $get_reservation -> reservation_name; ?>" required>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Soyad</label>
									<input type="text" class="form-control" name="reservation_surname" placeholder="Soyad" value="<?php echo $get_reservation -> reservation_surname; ?>" required>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Doğum Tarihi</label>
									<input type="date" class="form-control" name="reservation_birthday" placeholder="Doğum Tarihi" value="<?php echo date("Y-m-d",$get_reservation -> reservation_birthday); ?>" required>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Ülke</label>
									<input class="form-control" name="reservation_country" placeholder="Ülke" value="<?php echo $get_reservation -> reservation_country; ?>" required>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Şehir</label>
									<input class="form-control" name="reservation_city" placeholder="Şehir" value="<?php echo $get_reservation -> reservation_city; ?>" required>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Telefon</label>
									<input class="form-control" name="reservation_phone" placeholder="Telefon" value="<?php echo $get_reservation -> reservation_phone; ?>" required>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Email</label>
									<input class="form-control" name="reservation_email" placeholder="Email" value="<?php echo $get_reservation -> reservation_email; ?>" required>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Rezervasyon Eğitimi *</label>
									<select name="reservation_gender" id="reservation_gender" class="form-control" required>
										<option <?=($get_reservation->reservation_gender == "Erkek" ? "selected" : null)?> value="Erkek">Erkek</option>
										<option <?=($get_reservation->reservation_gender == "Kadın" ? "selected" : null)?> value="Kadın">Kadın</option>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Adres</label>
									<textarea class="form-control" name="reservation_address" placeholder="Adres" required><?php echo $get_reservation -> reservation_address; ?></textarea>
								</div>
							</div>

							<div class="col-md-12">
								<label class="label-control">Durum *</label>
								<div class="form-group">
								<?php
									if ($get_reservation -> reservation_status == 1):
										echo '<label class="radio radio-inline no-margin">';
											echo '<input type="radio" name="reservation_status" value="1" class="radiobox style-3" checked="">';
											echo '<span>Aktif</span>';
										echo '</label>';
										echo '<label class="radio radio-inline no-margin">';
											echo '<input type="radio" name="reservation_status" value="0" class="radiobox style-3">';
											echo '<span>Pasif</span>';
										echo '</label>';
									else:
										echo '<label class="radio radio-inline no-margin">';
											echo '<input type="radio" name="reservation_status" value="1" class="radiobox style-3">';
											echo '<span>Aktif</span>';
										echo '</label>';
										echo '<label class="radio radio-inline no-margin">';
											echo '<input type="radio" name="reservation_status" value="0" class="radiobox style-3" checked="">';
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