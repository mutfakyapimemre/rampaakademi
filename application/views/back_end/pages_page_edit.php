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
		<p>Güncelleme İşlemi Başarılı</p>
	</div>
	<?php endif; ?>

	<div class="alert alert-block alert-info" style="margin-top: 20px;">
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
					<div><a href="<?php echo base_url('panel/sayfalar/eklenen-sayfalar'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'eklenen-sayfalar') echo ' font-weight: bold;'; ?>"><i class="fa fa-file"></i> Eklenen Sayfalar</a></div>
					<hr style="margin: 10px 0px;">
					<div><a href="<?php echo base_url('panel/sayfalar/sayfa-ekle'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'sayfa-ekle') echo ' font-weight: bold;'; ?>"><i class="fa fa-plus"></i> Sayfa Ekle</a></div>
				</div>

			</div>
		</article>
		<article class="col-md-10">
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" style="margin-bottom: 70px;">
				<div style="border: solid 1px #CCCCCC !important;">
					<form method="post">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<h4 style="font-weight: 400;">Sayfa Bilgileri</h4>
	                            	<div style="margin-top: 10px;">
	                            		<b>Sayfa Linki: </b><a class="link" target="_blank" href="<?php echo base_url('s/'.$get_page -> page_url); ?>"><?php echo base_url('s/'.$get_page -> page_url); ?></a><br>
	                            		<b>Oluşturulma Tarihi: </b><?php echo date('d/m/Y - H:i:s', $get_page -> page_create_time); ?><br>
	                            		<b>Güncellenme Tarihi: </b><?php echo $get_page -> page_edit_time != '' ? date('d/m/Y - H:i:s', $get_page -> page_edit_time) : 'Hiç güncellenmedi'; ?>
	                            	</div>
                            	</div>
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="label-control">Sayfa Adı *</label>
									<input type="text" class="form-control" name="page_edit_name" placeholder="Sayfa Adı" value="<?php echo $get_page -> page_title; ?>" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Anahtar Kelimeler (Meta) *</label>
									<input type="text" class="form-control" name="page_edit_keyword" placeholder="Anahtar Kelimeler" value="<?php echo $get_page -> page_keywords; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Açıklama (Meta) *</label>
									<input type="text" class="form-control" name="page_edit_description" placeholder="Açıklama" value="<?php echo $get_page -> page_description; ?>">
								</div>
							</div>
						</div>

					
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Sayfa Grubu *</label>
										<select name="page_edit_group" class="form-control" required="">
											<option value="">Lütfen Seçin</option>
											<?php
		                                        foreach ($get_page_groups as $page_group):
		                                            if ($page_group -> page_group_id == $get_page -> page_group_id)
		                                                echo '<option value="'.$page_group -> page_group_id.'" selected>'.$page_group -> page_group_name.'</option>';
		                                            else
		                                                echo '<option value="'.$page_group -> page_group_id.'">'.$page_group -> page_group_name.'</option>';
		                                       	endforeach;
		                                    ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Sayfa Şablonu *</label>
									<select name="page_edit_template" class="form-control" required="">
										<option value="">Lütfen Seçin</option>
										<?php
	                                        foreach ($get_page_templates as $page_template):
	                                            if ($page_template -> page_template_id == $get_page -> page_template_id)
	                                                echo '<option value="'.$page_template -> page_template_id.'" selected>'.$page_template -> page_template_name.'</option>';
	                                            else
	                                                echo '<option value="'.$page_template -> page_template_id.'">'.$page_template -> page_template_name.'</option>';
	                                       	endforeach;
	                                    ?>
									</select>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="label-control">İçerik *</label>
									<textarea name="page_edit_text" class="ckeditor"><?php echo $get_page -> page_text; ?></textarea>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label class="label-control">Durum *</label>
								<div class="form-group">
									<?php
		                                if ($get_page -> page_status == 1):
		                                    echo '<label class="radio radio-inline no-margin">';
		                                    	echo '<input type="radio" name="page_edit_status" value="1" class="radiobox style-2" checked="">';
		                                    	echo '<span>Aktif</span>';
		                                    echo '</label>';
		                                    echo '<label class="radio radio-inline no-margin">';
		                                    	echo '<input type="radio" name="page_edit_status" value="0" class="radiobox style-2">';
		                                    	echo '<span>Pasif</span>';
		                                    echo '</label>';
		                                else:
		                                    echo '<label class="radio radio-inline no-margin">';
		                                    	echo '<input type="radio" name="page_edit_status" value="1" class="radiobox style-2">';
		                                    	echo '<span>Aktif</span>';
		                                    echo '</label>';
		                                    echo '<label class="radio radio-inline no-margin">';
		                                    	echo '<input type="radio" name="page_edit_status" value="0" class="radiobox style-2" checked="">';
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