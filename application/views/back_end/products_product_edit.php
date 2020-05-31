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
					<div><a href="<?php echo base_url('panel/urunler/eklenen-urunler'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'eklenen-urunler') echo ' font-weight: bold;'; ?>"><i class="fa fa-file"></i> Eklenen Ürünler</a></div>
					<hr style="margin: 10px 0px;">
					<div><a href="<?php echo base_url('panel/urunler/urun-ekle'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'urun-ekle') echo ' font-weight: bold;'; ?>"><i class="fa fa-plus"></i> Ürün Ekle</a></div>
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
									<h4 style="font-weight: 400;">Ürün Bilgileri</h4>
	                            	<div style="margin-top: 10px;">
	                            		<b>Ürün Linki: </b><a class="link" target="_blank" href="<?php echo $get_product -> product_url; ?>"><?php echo $get_product -> product_url; ?></a><br>
	                            		<b>Oluşturulma Tarihi: </b><?php echo date('d/m/Y - H:i:s', $get_product -> product_create_time); ?><br>
	                            		<b>Güncellenme Tarihi: </b><?php echo $get_product -> product_edit_time != '' ? date('d/m/Y - H:i:s', $get_product -> product_edit_time) : 'Hiç güncellenmedi'; ?>
	                            	</div>
                            	</div>
							</div>
						</div>
						
						<hr>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Ürün Adı *</label>
									<input type="text" class="form-control" name="product_edit_name" placeholder="Ürün Adı" value="<?php echo $get_product -> product_name; ?>" required="">
								</div>
							</div>


							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Ürün Kodu</label>
									<input type="text" class="form-control" name="product_edit_code" placeholder="Ürün Kodu" value="<?php echo $get_product -> product_code; ?>">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Ürün Notu</label>
									<input type="text" class="form-control" name="product_edit_notes" placeholder="Ürün Notu" value="<?php echo $get_product -> product_notes; ?>">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Kategori</label>
										<select name="product_edit_category" class="form-control" required="">
											<option value="0">Lütfen Seçin</option>
											<?php
	                                            function list_category($id = 0, $category_list = null, $str = 0, $category_id)
	                                            {
	                                                foreach ($category_list as $value):
	                                                    if ($value -> category_top_category_id == $id):

	                                                    	if ($value -> category_id ==  $category_id)
	                                                        	echo '<option value="'.$value -> category_id.'" selected>'.str_repeat('&nbsp;', $str).$value -> category_name.'</option>';
	                                                        else
	                                                        	echo '<option value="'.$value -> category_id.'">'.str_repeat('&nbsp;', $str).$value -> category_name.'</option>';

	                                                        list_category($value -> category_id, $category_list, $str + 2, $category_id);
	                                                    endif;
	                                                endforeach;
	                                            }

	                                            list_category(0, $get_product_categories, 0, $get_product -> product_category_id);
	                                        ?>
									</select>
								</div>
							</div>

							

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Fiyat ₺</label>
									<input type="text" class="form-control" name="product_edit_price" placeholder="Fiyat" value="<?php echo $get_product -> product_price; ?>">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">İndirimli Fiyat</label>
									<input type="text" class="form-control" name="product_edit_discount_price" placeholder="İndirimli  Fiyat" value="<?php echo $get_product -> product_discount_price; ?>">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Kontenjan</label>
									<input type="number" class="form-control" name="product_edit_quota" placeholder="Kontenjan" value="<?php echo $get_product -> product_quota; ?>">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Anahtar Kelimeler (Meta)</label>
									<input type="text" class="form-control" name="product_edit_keyword" placeholder="Anahtar Kelimeler" value="<?php echo $get_product -> product_meta_keywords; ?>">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Açıklama (Meta)</label>
									<input type="text" class="form-control" name="product_edit_description" placeholder="Açıklama" value="<?php echo $get_product -> product_meta_description; ?>">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Robot (Meta)</label>
									<input type="text" class="form-control" name="product_edit_keyword" placeholder="Anahtar Kelimeler" value="<?php echo $get_product -> product_meta_keywords; ?>">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Follow (Meta)</label>
									<input type="text" class="form-control" name="product_edit_description" placeholder="Açıklama" value="<?php echo $get_product -> product_meta_description; ?>">
								</div>
							</div>

							<div class="col-md-12">
								<hr>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Stok Durumu</label>
									<select name="product_edit_stock" class="form-control" required="">
										<option value="0">Lütfen Seçin</option>
										<?php
											if ($get_product -> product_stock == 'Var')
												echo '<option value="Var" selected>Var</option>';
											else
												echo '<option value="Var">Var</option>';

											if ($get_product -> product_stock == 'Yok')
												echo '<option value="Yok" selected>Yok</option>';
											else
												echo '<option value="Yok">Yok</option>';

											if ($get_product -> product_stock == 'Tükenmek Üzere')
												echo '<option value="Tükenmek Üzere" selected>Tükenmek Üzere</option>';
											else
												echo '<option value="Tükenmek Üzere">Tükenmek Üzere</option>';
										?>
									</select>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Teslimat Süresi</label>
										<select name="product_edit_delivery_time" class="form-control" required="">
										<option value="">Lütfen Seçin</option>
                                        <?php
                                          	if($get_product -> product_delivery_time == '1-5 Gün'):
                                            	echo '<option value="1-5 Gün" selected>1-5 Gün</option>';
                                          	else:
                                            	echo '<option value="1-5 Gün">1-5 Gün</option>';
                                          	endif;

                                          	if($get_product -> product_delivery_time == '5-10 Gün'):
                                        	    echo '<option value="5-10 Gün" selected>5-10 Gün</option>';
                                          	else:
                                        	    echo '<option value="5-10 Gün">5-10 Gün</option>';
                                          	endif;

                                          	if($get_product -> product_delivery_time == '10-15 Gün'):
                                            	echo '<option value="10-15 Gün" selected>10-15 Gün</option>';
                                          	else:
                                            	echo '<option value="10-15 Gün">10-15 Gün</option>';
                                          	endif;

                                          	if($get_product -> product_delivery_time == '15-20 Gün'):
                                            	echo '<option value="15-20 Gün" selected>15-20 Gün</option>';
                                          	else:
                                            	echo '<option value="15-20 Gün">15-20 Gün</option>';
                                          	endif;

                                          	if($get_product -> product_delivery_time == '20-25 Gün'):
                                            	echo '<option value="20-25 Gün" selected>20-25 Gün</option>';
                                          	else:
                                            	echo '<option value="20-25 Gün">20-25 Gün</option>';
                                          	endif;

                                          	if($get_product -> product_delivery_time == '25-30 Gün'):
                                            	echo '<option value="25-30 Gün" selected>25-30 Gün</option>';
                                          	else:
                                            	echo '<option value="25-30 Gün">25-30 Gün</option>';
                                          	endif;

                                          	if($get_product -> product_delivery_time == '30-35 Gün'):
                                           		echo '<option value="30-35 Gün" selected>30-35 Gün</option>';
                                          	else:
                                           		echo '<option value="30-35 Gün">30-35 Gün</option>';
                                          	endif;

                                          	if($get_product -> product_delivery_time == '35-40 Gün'):
                                           		echo '<option value="35-40 Gün" selected>35-40 Gün</option>';
                                          	else:
                                           		echo '<option value="35-40 Gün">35-40 Gün</option>';
                                          	endif;

                                          	if($get_product -> product_delivery_time == '40-45 Gün'):
                                           		echo '<option value="40-45 Gün" selected>40-45 Gün</option>';
                                          	else:
                                           		echo '<option value="40-45 Gün">40-45 Gün</option>';
                                          	endif;

                                          	if($get_product -> product_delivery_time == '45-50 Gün'):
                                           		echo '<option value="45-50 Gün" selected>45-50 Gün</option>';
                                          	else:
                                           		echo '<option value="45-50 Gün">45-50 Gün</option>';
                                          	endif;

                                          	if($get_product -> product_delivery_time == '+50 Gün'):
                                            	echo '<option value="+50 Gün" selected>+50 Gün</option>';
                                          	else:
                                            	echo '<option value="+50 Gün">+50 Gün</option>';
                                          	endif;
                                        ?>
									</select>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Garanti Süresi</label>
									<select name="product_edit_warranty_time" class="form-control" required="">
										<option value="0">Lütfen Seçin</option>
										<?php
                                          	if($get_product -> product_warranty_time == 'Garanti Yok'):
                                            	echo '<option value="Garanti Yok" selected>Garanti Yok</option>';
                                          	else:
                                            	echo '<option value="Garanti Yok">Garanti Yok</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '1 Ay'):
                                            	echo '<option value="1 Ay" selected>1 Ay</option>';
                                          	else:
                                            	echo '<option value="1 Ay">1 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '2 Ay'):
                                            	echo '<option value="2 Ay" selected>2 Ay</option>';
                                          	else:
                                            	echo '<option value="2 Ay">2 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '3 Ay'):
                                            	echo '<option value="3 Ay" selected>3 Ay</option>';
                                          	else:
                                            	echo '<option value="3 Ay">3 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '4 Ay'):
                                            	echo '<option value="4 Ay" selected>4 Ay</option>';
                                          	else:
                                            	echo '<option value="4 Ay">4 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '5 Ay'):
                                            	echo '<option value="5 Ay" selected>5 Ay</option>';
                                          	else:
                                            	echo '<option value="5 Ay">5 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '6 Ay'):
                                            	echo '<option value="6 Ay" selected>6 Ay</option>';
                                          	else:
                                            	echo '<option value="6 Ay">6 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '7 Ay'):
                                            	echo '<option value="7 Ay" selected>7 Ay</option>';
                                          	else:
                                            	echo '<option value="7 Ay">7 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '8 Ay'):
                                            	echo '<option value="8 Ay" selected>8 Ay</option>';
                                          	else:
                                            	echo '<option value="8 Ay">8 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '9 Ay'):
                                            	echo '<option value="9 Ay" selected>9 Ay</option>';
                                          	else:
                                            	echo '<option value="9 Ay">9 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '10 Ay'):
                                            	echo '<option value="10 Ay" selected>10 Ay</option>';
                                          	else:
                                            	echo '<option value="10 Ay">10 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '11 Ay'):
                                            	echo '<option value="11 Ay" selected>11 Ay</option>';
                                          	else:
                                            	echo '<option value="11 Ay">11 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '12 Ay'):
                                            	echo '<option value="12 Ay" selected>12 Ay</option>';
                                          	else:
                                            	echo '<option value="12 Ay">12 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '18 Ay'):
                                            	echo '<option value="18 Ay" selected>18 Ay</option>';
                                          	else:
                                            	echo '<option value="18 Ay">18 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '24 Ay'):
                                            	echo '<option value="24 Ay" selected>24 Ay</option>';
                                          	else:
                                            	echo '<option value="24 Ay">24 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '30 Ay'):
                                            	echo '<option value="30 Ay" selected>30 Ay</option>';
                                          	else:
                                            	echo '<option value="30 Ay">30 Ay</option>';
                                          	endif;

                                          	if($get_product -> product_warranty_time == '36 Ay'):
                                            	echo '<option value="36 Ay" selected>36 Ay</option>';
                                          	else:
                                            	echo '<option value="36 Ay">36 Ay</option>';
                                          	endif;
                                        ?>
									</select>
								</div>								
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Ölçüler</label>
									<input type="text" class="form-control" name="product_edit_size" placeholder="Ölçüler" value="<?php echo $get_product -> product_size; ?>">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Renk Seçenekleri</label>
									<input type="text" class="form-control" name="product_edit_color" placeholder="Renk Seçenekleri" value="<?php echo $get_product -> product_color; ?>">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Parça Sayısı</label>
									<select name="product_edit_part" class="form-control">
										<option value="">Lütfen Seçin</option>
										<option value="1" selected="">1</option>
										<?php
											for ($i = 2; $i <= 50; $i++):
												if ($get_product -> product_part == $i)
													echo '<option value="'.$i.'" selected>'.$i.'</option>';												
												else
													echo '<option value="'.$i.'">'.$i.'</option>';												
											endfor;
										?>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Malzemeler</label>
									<input type="text" class="form-control" name="product_edit_material" placeholder="Malzemeler" value="<?php echo $get_product -> product_materials; ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Marka</label>
									<input type="text" class="form-control" name="product_edit_brand" placeholder="Marka" value="<?php echo $get_product -> product_brand; ?>">
								</div>
							</div>

							<div class="col-md-12">
								<hr>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Yeni Ürün</label>
									<div class="form-group">
										<?php
											if ($get_product -> product_new == 1):
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_new" value="1" class="radiobox style-3" checked="">';
													echo '<span>Evet</span>';
												echo '</label>';
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_new" value="0" class="radiobox style-3">';
													echo '<span>Hayır</span>';
												echo '</label>';
											else:
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_new" value="1" class="radiobox style-3">';
													echo '<span>Evet</span>';
												echo '</label>';
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_new" value="0" class="radiobox style-3" checked="">';
													echo '<span>Hayır</span>';
												echo '</label>';
											endif;
										?>
		                            </div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">İndirimli Ürün</label>
									<div class="form-group">
			                            <?php
											if ($get_product -> product_discount == 1):
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_discount" value="1" class="radiobox style-3" checked="">';
													echo '<span>Evet</span>';
												echo '</label>';
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_discount" value="0" class="radiobox style-3">';
													echo '<span>Hayır</span>';
												echo '</label>';
											else:
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_discount" value="1" class="radiobox style-3">';
													echo '<span>Evet</span>';
												echo '</label>';
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_discount" value="0" class="radiobox style-3" checked="">';
													echo '<span>Hayır</span>';
												echo '</label>';
											endif;
										?>
		                            </div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Çok Satan Ürün</label>
									<div class="form-group">
			                            <?php
											if ($get_product -> product_best_selling == 1):
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_best_selling" value="1" class="radiobox style-3" checked="">';
													echo '<span>Evet</span>';
												echo '</label>';
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_best_selling" value="0" class="radiobox style-3">';
													echo '<span>Hayır</span>';
												echo '</label>';
											else:
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_best_selling" value="1" class="radiobox style-3">';
													echo '<span>Evet</span>';
												echo '</label>';
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_best_selling" value="0" class="radiobox style-3" checked="">';
													echo '<span>Hayır</span>';
												echo '</label>';
											endif;
										?>
		                            </div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Önerilen Ürün</label>
									<div class="form-group">
			                            <?php
											if ($get_product -> product_suggested == 1):
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_suggested" value="1" class="radiobox style-3" checked="">';
													echo '<span>Evet</span>';
												echo '</label>';
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_suggested" value="0" class="radiobox style-3">';
													echo '<span>Hayır</span>';
												echo '</label>';
											else:
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_suggested" value="1" class="radiobox style-3">';
													echo '<span>Evet</span>';
												echo '</label>';
												echo '<label class="radio radio-inline no-margin">';
													echo '<input type="radio" name="product_edit_suggested" value="0" class="radiobox style-3" checked="">';
													echo '<span>Hayır</span>';
												echo '</label>';
											endif;
										?>
		                            </div>
								</div>
							</div>


							<div class="col-md-12">
								<div class="form-group">
									<label class="label-control">Açıklama</label>
									<textarea name="product_edit_text" class="ckeditor"><?php echo $get_product -> product_text; ?></textarea>
								</div>

								<hr>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Kapak Fotoğrafı</label>
									<input type="file" name="product_edit_cover_photo">
	                            </div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Fotoğraflar</label>
									<input type="file" name="product_edit_photos[]" multiple="">
	                            </div>
							</div>

							<div class="col-md-12">
								<label class="label-control">Durum *</label>
								<div class="form-group">
								<?php
									if ($get_product -> product_status == 1):
										echo '<label class="radio radio-inline no-margin">';
											echo '<input type="radio" name="product_edit_status" value="1" class="radiobox style-3" checked="">';
											echo '<span>Aktif</span>';
										echo '</label>';
										echo '<label class="radio radio-inline no-margin">';
											echo '<input type="radio" name="product_edit_status" value="0" class="radiobox style-3">';
											echo '<span>Pasif</span>';
										echo '</label>';
									else:
										echo '<label class="radio radio-inline no-margin">';
											echo '<input type="radio" name="product_edit_status" value="1" class="radiobox style-3">';
											echo '<span>Aktif</span>';
										echo '</label>';
										echo '<label class="radio radio-inline no-margin">';
											echo '<input type="radio" name="product_edit_status" value="0" class="radiobox style-3" checked="">';
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