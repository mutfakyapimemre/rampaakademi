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
					<div><a href="<?php echo base_url('panel/menuler/eklenen-menuler'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'eklenen-menuler') echo ' font-weight: bold;'; ?>"><i class="fa fa-link"></i> Eklenen Menüler</a></div>
					<hr style="margin: 10px 0px;">
					<div><a href="<?php echo base_url('panel/menuler/menu-ekle'); ?>" style="color: #333333; display: block; <?php if ($this -> uri -> segment(3) == 'menu-ekle') echo ' font-weight: bold;'; ?>"><i class="fa fa-plus"></i> Menü Ekle</a></div>
				</div>

			</div>
		</article>
		<article class="col-md-10">
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" style="margin-bottom: 70px;">
				
				<div style="border: solid 1px #CCCCCC !important;">
					<form method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Menü Adı *</label>
									<input type="text" class="form-control" name="menu_add_name" placeholder="Menü Adı" required="">
								</div>								
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Üst Menü *</label>
									<select name="menu_add_top_menu" class="form-control">
										<option value="" selected="">Lütfen Seçin</option>
                                        <?php
                                            function get_menu ($id, $string, $get_menus)
                                            {   
                                                foreach ($get_menus as $key => $value):
                                                    if ($value -> menu_top_menu_id == $id):
                                                        echo '<option value="'.$value -> menu_id.'">'.str_repeat('&nbsp;', $string).$value -> menu_name.'</option>';
                                                        get_menu($value -> menu_id, $string + 3, $get_menus);
                                                    endif;
                                                endforeach;
                                            }

                                            get_menu(0, 0, $get_menus);
                                        ?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Menü Türü *</label>
									<select name="menu_add_type" class="form-control" required="">
										<option value="1">Dahili Menü (Site içi)</option>
										<option value="2">Harici Menü (Site dışı)</option>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Menü Linki *</label>
									<select name="menu_add_link_page" class="form-control">
										<option value="" selected="">Lütfen Seçin</option>
										<?php
											echo '<optgroup label="Sayfalar">';
												if (count($get_menu_pages) > 0):
													foreach ($get_menu_pages AS $page):
														echo '<option value="s/'.$page -> page_url.'">'.$page -> page_title.'</option>';
													endforeach;
												endif;
											echo '</optgroup>';

											echo '<optgroup label="Ürün Kategorileri">';
												if (count($get_menu_product_categories) > 0):
													foreach ($get_menu_product_categories AS $category):
														echo '<option value="k/'.$category -> category_url.'">'.$category -> category_name.'</option>';
													endforeach;
												endif;
											echo '</optgroup>';


											echo '<optgroup label="Ürünler">';
												if (count($get_menu_products) > 0):
													foreach ($get_menu_products AS $product):
														echo '<option value="u/'.$product -> product_url.'">'.$product -> product_name.'</option>';
													endforeach;
												endif;
											echo '</optgroup>';


											echo '<optgroup label="Makaleler">';
												if (count($get_menu_blogs) > 0):
													foreach ($get_menu_blogs AS $article):
														echo '<option value="m/'.$article -> article_url.'">'.$article -> article_title.'</option>';
													endforeach;
												endif;
											echo '</optgroup>';
										?>
									</select>
									<input type="text" class="form-control" style="display: none;" name="menu_add_link_url" placeholder="Menü Url">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<label class="label-control">Hedef *</label>
								<div class="form-group">
									<label class="radio radio-inline no-margin">
		                            	<input type="radio" name="menu_add_target" value="0" class="radiobox style-3" checked="">
		                            	<span>Aynı Pencerede</span>
		                            </label>
		                            <label class="radio radio-inline no-margin">
		                            	<input type="radio" name="menu_add_target" value="1" class="radiobox style-3">
		                            	<span>Ayrı Pencerede</span>
		                            </label>
								</div>
							</div>

							<div class="col-md-4">
								<label class="label-control">Durum *</label>
								<div class="form-group">
									<label class="radio radio-inline no-margin">
		                            	<input type="radio" name="menu_add_status" value="1" class="radiobox style-3" checked="">
		                            	<span>Aktif</span>
		                            </label>
		                            <label class="radio radio-inline no-margin">
		                            	<input type="radio" name="menu_add_status" value="0" class="radiobox style-3">
		                            	<span>Pasif</span>
		                            </label>
	                            </div>
							</div>
						</div>
						
						<hr>

						<footer>
							<div class="form-group">
								<button type="submit" name="menu_add_send" class="btn btn-success">
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