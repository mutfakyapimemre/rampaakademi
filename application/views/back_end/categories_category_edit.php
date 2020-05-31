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
					<div><a href="<?php echo base_url('panel/kategoriler/eklenen-kategoriler'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'eklenen-kategoriler') echo ' font-weight: bold;'; ?>"><i class="fa fa-file"></i> Eklenen Kategoriler</a></div>
					<hr style="margin: 10px 0px;">
					<div><a href="<?php echo base_url('panel/kategoriler/kategori-ekle'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'kategori-ekle') echo ' font-weight: bold;'; ?>"><i class="fa fa-plus"></i> Kategori Ekle</a></div>
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
									<h4 style="font-weight: 400;">Kategori Bilgileri</h4>
	                            	<div style="margin-top: 10px;">
	                            		<b>Kategori Linki: </b><a class="link" target="_blank" href="<?php echo $get_category -> category_link; ?>"><?php echo $get_category -> category_link; ?></a><br>
	                            		<b>Oluşturulma Tarihi: </b><?php echo date('d/m/Y - H:i:s', $get_category -> category_create_time); ?><br>
	                            		<b>Güncellenme Tarihi: </b><?php echo $get_category -> category_edit_time != '' ? date('d/m/Y - H:i:s', $get_category -> category_edit_time) : 'Hiç güncellenmedi'; ?>
	                            	</div>
                            	</div>
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="label-control">Kategori Adı *</label>
									<input type="text" class="form-control" name="category_edit_name" value="<?php echo $get_category -> category_name; ?>" placeholder="Kategori Adı" required="">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Üst Kategori</label>
										<select name="category_edit_top_category" class="form-control">
											<option value="0">Lütfen Seçin</option>
											<?php
	                                            function list_category($id = 0, $category_list = null, $str = 0, $edit_category_id = 1)
	                                            {
	                                                foreach ($category_list as $value)
	                                                {
	                                                    if ($value -> category_top_category_id == $id):
	                                                        if ($edit_category_id == $value -> category_id):
	                                                            echo '<option value="'.$value -> category_id.'" selected>'.str_repeat('&nbsp;', $str).$value -> category_name.'</option>';
	                                                        else:
	                                                            echo '<option value="'.$value -> category_id.'">'.str_repeat('&nbsp;', $str).$value -> category_name.'</option>';
	                                                        endif;
	                                                            list_category($value -> category_id, $category_list, $str + 2, $edit_category_id);
	                                                    endif;
	                                                }
	                                            }

	                                            list_category(0, $get_edit_categories, 0, $get_category -> category_top_category_id);
	                                        ?>
									</select>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Anahtar Kelimeler (Meta)</label>
									<input type="text" class="form-control" name="category_edit_keyword" value="<?php echo $get_category -> category_meta_keywords; ?>" placeholder="Anahtar Kelimeler">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Açıklama (Meta)</label>
									<input type="text" class="form-control" name="category_edit_description" value="<?php echo $get_category -> category_meta_description; ?>" placeholder="Açıklama">
								</div>
							</div>
							

							<div class="col-md-12">
								<div class="form-group">
									<label class="label-control">Açıklama</label>
									<textarea name="category_edit_text" class="ckeditor"><?php echo $get_category -> category_text; ?></textarea>
								</div>
							</div>

							<hr>

							<div class="col-md-12">
								<div class="form-group">
									<?php
                                        foreach ($get_category_slider_photos as $value)
                                        {
                                          echo '<div style="margin: 5px; padding: 5px; float: left; border: solid 1px #CCCCCC;">';
                                          echo '<img src="'.base_url('public/uploads/categories/sliders/'.$value->category_slider_photo_name).'" width="150">';
                                          echo '<a data-url="'.base_url('admin/kategori-yonetimi/ajax/kategori-slayt-fotografi-sil').'" data-name="'.$value->category_slider_photo_name.'"  id="'.$value->category_slider_photo_id.'" class="category-slider-photo-delete" style="font-weight: bold;" href=""><br> Sil</a>';
                                          echo '</div>';
                                        }
                                    ?>
                                    <div style="clear: both;"></div>
	                            </div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Kapak Fotoğrafı</label>
									<input type="file" name="category_edit_cover_photo">
	                            </div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Slayt Fotoğrafları</label>
									<input type="file" name="category_edit_slider_photos[]" multiple="">
	                            </div>
							</div>

							<div class="col-md-12">
								<label class="label-control">Durum *</label>
								<div class="form-group">
									<?php
										if ($get_category -> category_status == 1):
											echo '<label class="radio radio-inline no-margin">';
												echo '<input type="radio" name="category_edit_status" value="1" class="radiobox style-3" checked="">';
												echo '<span>Aktif</span>';
											echo ' </label>';
										
											echo '<label class="radio radio-inline no-margin">';
			                            		echo '<input type="radio" name="category_edit_status" value="0" class="radiobox style-3">';
			                            		echo '<span>Pasif</span>';
		                            		echo '</label>';
		                            	else:
		                            		echo '<label class="radio radio-inline no-margin">';
												echo '<input type="radio" name="category_edit_status" value="1" class="radiobox style-3">';
												echo '<span>Aktif</span>';
											echo ' </label>';
										
											echo '<label class="radio radio-inline no-margin">';
			                            		echo '<input type="radio" name="category_edit_status" value="0" class="radiobox style-3" checked="">';
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