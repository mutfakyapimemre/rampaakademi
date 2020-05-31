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
							<div class="col-md-12">
								<div class="form-group">
									<h4 style="font-weight: 400;">Menü Bilgileri</h4>
	                            	<div style="margin-top: 10px;">
	                            		<b>Menü Linki: </b><a class="link" target="_blank" href="<?php echo $get_menu -> menu_link; ?>"><?php echo $get_menu -> menu_link; ?></a><br>
	                            		<b>Oluşturulma Tarihi: </b><?php echo date('d/m/Y - H:i:s', $get_menu -> menu_create_time); ?><br>
	                            		<b>Güncellenme Tarihi: </b><?php echo $get_menu -> menu_edit_time != '' ? date('d/m/Y - H:i:s', $get_menu -> menu_edit_time) : 'Hiç güncellenmedi'; ?>
	                            	</div>
                            	</div>
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Menü Adı *</label>
									<input type="text" class="form-control" name="menu_edit_name" placeholder="Menü Adı" value="<?php echo $get_menu -> menu_name; ?>" required="">
								</div>								
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Üst Menü *</label>
									<select name="menu_edit_top_menu" class="form-control">
										<option value="">Lütfen Seçin</option>
                                        <?php
                                           	function list_menu ($id, $string, $get_menus, $get_menu)
                                            {  
                                                foreach ($get_menus as $key => $value):
                                                    if ($value -> menu_top_menu_id == $id):
                                                        if ($value -> menu_id != $get_menu -> menu_id):

                                                            if ($value -> menu_id == $get_menu -> menu_top_menu_id):
                                                                echo '<option value="'.$value -> menu_id.'" selected>'.str_repeat('&nbsp;', $string).$value -> menu_name.'</option>';
                                                                list_menu($value -> menu_id, $string + 3, $get_menus, $get_menu);
                                                            else:
                                                                echo '<option value="'.$value -> menu_id.'">'.str_repeat('&nbsp;', $string).$value -> menu_name.'</option>';
                                                                list_menu($value -> menu_id, $string + 3, $get_menus, $get_menu);
                                                            endif;
                                                        endif;
                                                    endif;
                                                endforeach;
                                            }

                                            list_menu(0, 0, $get_menus, $get_menu);
                                        ?>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Menü Türü *</label>
									<select name="menu_edit_type" class="form-control" required="">
										<?php
											if ($get_menu -> menu_type == '1'):
												echo '<option value="1" selected>Dahili Menü</option>';
												echo '<option value="2">Harici Menü</option>';
											else:
												echo '<option value="1">Dahili Menü</option>';
												echo '<option value="2" selected>Harici Menü</option>';
											endif;
										?>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label-control">Menü Linki *</label>
									<?php
										if ($get_menu -> menu_type == 1):
											echo '<select name="menu_edit_link_page" class="form-control">';
												echo '<option value="">Lütfen Seçin</option>';

												echo '<optgroup label="Sayfalar">';
													if (count($get_menu_pages) > 0):
														foreach ($get_menu_pages AS $page):
															if ($get_menu -> menu_link_page == 's/'.$page -> page_url)
																echo '<option value="s/'.$page -> page_url.'" selected>'.$page -> page_title.'</option>';
															else
																echo '<option value="s/'.$page -> page_url.'">'.$page -> page_title.'</option>';
														endforeach;
													endif;
												echo '</optgroup>';

												echo '<optgroup label="Ürün Kategorileri">';
													if (count($get_menu_product_categories) > 0):
														foreach ($get_menu_product_categories AS $category):
															if ($get_menu -> menu_link_page == 'k/'.$category -> category_url)
																echo '<option value="k/'.$category -> category_url.'" selected>'.$category -> category_name.'</option>';
															else
																echo '<option value="k/'.$category -> category_url.'">'.$category -> category_name.'</option>';
														endforeach;
													endif;
												echo '</optgroup>';												

												echo '<optgroup label="Ürünler">';
													if (count($get_menu_products) > 0):
														foreach ($get_menu_products AS $product):
															if ($get_menu -> menu_link_page == 'u/'.$product -> product_url)
																echo '<option value="u/'.$product -> product_url.'" selected>'.$product -> product_name.'</option>';
															else
																echo '<option value="u/'.$product -> product_url.'">'.$product -> product_name.'</option>';
														endforeach;
													endif;
												echo '</optgroup>';

												echo '<optgroup label="Makaleler">';
													if (count($get_menu_blogs) > 0):
														foreach ($get_menu_blogs AS $article):
															if ($get_menu -> menu_link_page == 'm/'.$article -> article_url)
																echo '<option value="m/'.$article -> article_url.'">'.$article -> article_title.'</option>';
															else
																echo '<option value="m/'.$article -> article_url.'">'.$article -> article_title.'</option>';
														endforeach;
													endif;
												echo '</optgroup>';

											echo '</select>';

											echo '<input type="text" class="form-control" style="display: none;" value="'.$get_menu -> menu_link_url.'" name="menu_edit_link_url" placeholder="Menü Url">';
										elseif ($get_menu -> menu_type == 2):
											echo '<select name="menu_edit_link_page" class="form-control" style="display: none;">';
												echo '<option value="">Lütfen Seçin</option>';

												echo '<optgroup label="Sayfalar">';
													if (count($get_menu_pages) > 0):
														foreach ($get_menu_pages AS $page):
															if ($get_menu -> menu_link_page == 's/'.$page -> page_url)
																echo '<option value="s/'.$page -> page_url.'" selected>'.$page -> page_title.'</option>';
															else
																echo '<option value="s/'.$page -> page_url.'">'.$page -> page_title.'</option>';
														endforeach;
													endif;
												echo '</optgroup>';

												echo '<optgroup label="Ürünler">';
													if (count($get_menu_products) > 0):
														foreach ($get_menu_products AS $product):
															if ($get_menu -> menu_link_page == 'u/'.$product -> product_url)
																echo '<option value="u/'.$product -> product_url.'" selected>'.$product -> product_name.'</option>';
															else
																echo '<option value="u/'.$product -> product_url.'">'.$product -> product_name.'</option>';
														endforeach;
													endif;
												echo '</optgroup>';

												echo '<optgroup label="Makaleler">';
													if (count($get_menu_blogs) > 0):
														foreach ($get_menu_blogs AS $article):
															if ($get_menu -> menu_link_page == 'm/'.$article -> article_url)
																echo '<option value="m/'.$article -> article_url.'">'.$article -> article_title.'</option>';
															else
																echo '<option value="m/'.$article -> article_url.'">'.$article -> article_title.'</option>';
														endforeach;
													endif;
												echo '</optgroup>';

											echo '</select>';
											
											echo '<input type="text" class="form-control" value="'.$get_menu -> menu_link_url.'" name="menu_edit_link_url" placeholder="Menü Url">';
										endif;
									?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<label class="label-control">Hedef *</label>
								<div class="form-group">
									<?php
										if ($get_menu -> menu_target == 0):
											echo '<label class="radio radio-inline no-margin">';
												echo '<input type="radio" name="menu_edit_target" value="0" class="radiobox style-3" checked="">';
												echo '<span>Aynı Pencerede</span>';
											echo ' </label>';

											echo '<label class="radio radio-inline no-margin">';
												echo '<input type="radio" name="menu_edit_target" value="1" class="radiobox style-3">';
												echo '<span>Ayrı Pencerede</span>';
											echo '</label>';
										elseif ($get_menu -> menu_target == 1):
											echo '<label class="radio radio-inline no-margin">';
												echo '<input type="radio" name="menu_edit_target" value="0" class="radiobox style-3">';
												echo '<span>Aynı Pencerede</span>';
											echo ' </label>';

											echo '<label class="radio radio-inline no-margin">';
												echo '<input type="radio" name="menu_edit_target" value="1" class="radiobox style-3" checked="">';
												echo '<span>Ayrı Pencerede</span>';
											echo '</label>';
										endif;
									?>
								</div>
							</div>

							<div class="col-md-4">
								<label class="label-control">Durum *</label>
								<div class="form-group">
									<?php
										if ($get_menu -> menu_status == 1):
											echo '<label class="radio radio-inline no-margin">';
												echo '<input type="radio" name="menu_edit_status" value="1" class="radiobox style-3" checked="">';
												echo '<span>Aktif</span>';
											echo '</label>';

											echo '<label class="radio radio-inline no-margin">';
												echo '<input type="radio" name="menu_edit_status" value="0" class="radiobox style-3">';
												echo '<span>Pasif</span>';
											echo ' </label>';
										elseif ($get_menu -> menu_status ==0):
											echo '<label class="radio radio-inline no-margin">';
												echo '<input type="radio" name="menu_edit_status" value="1" class="radiobox style-3">';
												echo '<span>Aktif</span>';
											echo '</label>';

											echo '<label class="radio radio-inline no-margin">';
												echo '<input type="radio" name="menu_edit_status" value="0" class="radiobox style-3" checked="">';
												echo '<span>Pasif</span>';
											echo ' </label>';
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