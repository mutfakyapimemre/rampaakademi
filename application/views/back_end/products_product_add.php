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
	
	<?php if ($this -> input -> get('addAction') == 'true' ): ?>
	<div class="alert alert-block alert-success" style="margin-top: 20px;">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Başarılı</h4>
		<p>Ekleme İşlemi Başarılı</p>
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
							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Ürün Adı *</label>
									<input type="text" class="form-control" name="product_add_name" placeholder="Ürün Adı" required="">
								</div>
							</div>


							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Ürün Kodu</label>
									<input type="text" class="form-control" name="product_add_code" placeholder="Ürün Kodu">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Ürün Notu</label>
									<input type="text" class="form-control" name="product_add_notes" placeholder="Ürün Notu">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Kategori</label>
										<select name="product_add_category" class="form-control" required="">
											<option value="0">Lütfen Seçin</option>
											<?php
	                                            function list_category($id = 0, $category_list = null, $str = 0)
	                                            {
	                                                foreach ($category_list as $value):
	                                                    if ($value -> category_top_category_id == $id):
	                                                        echo '<option value="'.$value -> category_id.'">'.str_repeat('&nbsp;', $str).$value -> category_name.'</option>';
	                                                        list_category($value -> category_id, $category_list, $str + 2);
	                                                    endif;
	                                                endforeach;
	                                            }

	                                            list_category(0, $get_product_categories, 0);
	                                        ?>
									</select>
								</div>
							</div>

							

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Fiyat </label>
									<input type="text" class="form-control" name="product_add_price" placeholder="Fiyat">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">İndirimli Fiyat</label>
									<input type="text" class="form-control" name="product_add_discount_price" placeholder="İndirimli Fiyat">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Kontenjan</label>
									<input type="number" class="form-control" name="product_add_quota" placeholder="Kontenjan">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Anahtar Kelimeler (Meta)</label>
									<input type="text" class="form-control" name="product_add_keyword" placeholder="Anahtar Kelimeler">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Açıklama (Meta)</label>
									<input type="text" class="form-control" name="product_add_description" placeholder="Açıklama">
								</div>
							</div>

							<div class="col-md-12">
								<hr>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Stok Durumu</label>
									<select name="product_add_stock" class="form-control" required="">
										<option value="0">Lütfen Seçin</option>
										<option value="Var" selected="">Var</option>
										<option value="Yok">Yok</option>
										<option value="Tükenmek Üzere">Tükenmek Üzere</option>
									</select>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Teslimat Süresi</label>
										<select name="product_add_delivery_time" class="form-control" required="">
										<option value="">Lütfen Seçin</option>
                                        <option value="1-5 Gün">1-5 Gün</option>
                                        <option value="5-10 Gün">5-10 Gün</option>
                                        <option value="10-15 Gün">10-15 Gün</option>
                                        <option value="15-20 Gün" selected="">15-20 Gün</option>
                                        <option value="20-25 Gün">20-25 Gün</option>
                                        <option value="25-30 Gün">25-30 Gün</option>
                                        <option value="30-35 Gün">30-35 Gün</option>
                                        <option value="35-40 Gün">35-40 Gün</option>
                                        <option value="40-45 Gün">40-45 Gün</option>
                                        <option value="45-50 Gün">45-50 Gün</option>
                                        <option value="+50 Gün">+50 Gün</option>
									</select>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Garanti Süresi</label>
									<select name="product_add_warranty_time" class="form-control" required="">
										<option value="0">Lütfen Seçin</option>
										<option value="Garanti Yok">Garanti Yok</option>
                                        <option value="1 Ay">1 Ay</option>
                                        <option value="2 Ay">2 Ay</option>
                                        <option value="3 Ay">3 Ay</option>
                                        <option value="4 Ay">4 Ay</option>
                                        <option value="5 Ay">5 Ay</option>
                                        <option value="6 Ay">6 Ay</option>
                                        <option value="7 Ay">7 Ay</option>
                                        <option value="8 Ay">8 Ay</option>
                                        <option value="9 Ay">9 Ay</option>
                                        <option value="10 Ay">10 Ay</option>
                                        <option value="11 Ay">11 Ay</option>
                                        <option value="12 Ay">12 Ay</option>
                                        <option value="18 Ay">18 Ay</option>
                                        <option value="24 Ay" selected>24 Ay</option>
                                        <option value="30 Ay">30 Ay</option>
                                        <option value="36 Ay">36 Ay</option>
									</select>
								</div>								
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Ölçüler</label>
									<input type="text" class="form-control" name="product_add_size" placeholder="Ölçüler">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Renk Seçenekleri</label>
									<input type="text" class="form-control" name="product_add_color" placeholder="Renk Seçenekleri">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="label-control">Parça Sayısı</label>
									<select name="product_add_part" class="form-control">
										<option value="">Lütfen Seçin</option>
										<option value="1" selected="">1</option>
										<?php
											for ($i = 2; $i <= 50; $i++):
												echo '<option value="'.$i.'">'.$i.'</option>';												
											endfor;
										?>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Malzemeler</label>
									<input type="text" class="form-control" name="product_add_material" placeholder="Malzemeler">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Marka</label>
									<input type="text" class="form-control" name="product_add_brand" placeholder="Marka">
								</div>
							</div>

							<div class="col-md-12">
								<hr>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Yeni Ürün</label>
									<div class="form-group">
										<label class="radio radio-inline no-margin">
			                            	<input type="radio" name="product_add_new" value="1" class="radiobox style-3">
			                            	<span>Evet</span>
			                            </label>
			                            <label class="radio radio-inline no-margin">
			                            	<input type="radio" name="product_add_new" value="0" class="radiobox style-3" checked="">
			                            	<span>Hayır</span>
			                            </label>
		                            </div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">İndirimli Ürün</label>
									<div class="form-group">
										<label class="radio radio-inline no-margin">
			                            	<input type="radio" name="product_add_discount" value="1" class="radiobox style-3">
			                            	<span>Evet</span>
			                            </label>
			                            <label class="radio radio-inline no-margin">
			                            	<input type="radio" name="product_add_discount" value="0" class="radiobox style-3" checked="">
			                            	<span>Hayır</span>
			                            </label>
		                            </div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Çok Satan Ürün</label>
									<div class="form-group">
										<label class="radio radio-inline no-margin">
			                            	<input type="radio" name="product_add_best_selling" value="1" class="radiobox style-3">
			                            	<span>Evet</span>
			                            </label>
			                            <label class="radio radio-inline no-margin">
			                            	<input type="radio" name="product_add_best_selling" value="0" class="radiobox style-3" checked="">
			                            	<span>Hayır</span>
			                            </label>
		                            </div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="label-control">Önerilen Ürün</label>
									<div class="form-group">
										<label class="radio radio-inline no-margin">
			                            	<input type="radio" name="product_add_suggested" value="1" class="radiobox style-3">
			                            	<span>Evet</span>
			                            </label>
			                            <label class="radio radio-inline no-margin">
			                            	<input type="radio" name="product_add_suggested" value="0" class="radiobox style-3" checked="">
			                            	<span>Hayır</span>
			                            </label>
		                            </div>
								</div>
							</div>


							<div class="col-md-12">
								<div class="form-group">
									<label class="label-control">Açıklama</label>
									<textarea name="product_add_text" class="ckeditor"></textarea>
								</div>

								<hr>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Kapak Fotoğrafı</label>
									<input type="file" name="product_add_cover_photo" required="">
	                            </div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Fotoğraflar</label>
									<input type="file" name="product_add_photos[]" multiple="" required="">
	                            </div>
							</div>

							<div class="col-md-12">
								<label class="label-control">Durum *</label>
								<div class="form-group">
									<label class="radio radio-inline no-margin">
		                            	<input type="radio" name="product_add_status" value="1" class="radiobox style-3" checked="">
		                            	<span>Aktif</span>
		                            </label>
		                            <label class="radio radio-inline no-margin">
		                            	<input type="radio" name="product_add_status" value="0" class="radiobox style-3">
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