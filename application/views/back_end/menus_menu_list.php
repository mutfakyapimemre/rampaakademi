<div id="content" style="margin-bottom: 40px;">
	<div class="row">
		<div class="col-md-12">
			<div style="text-align: left;">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa fa-link fa-fw "></i> 
					<?php echo $page['name']; ?> 
				</h1>
			</div>

			<div style="text-align: right; margin-top: -55px;">
				<a>
					<button type="submit" class="btn btn-default">
						<i class="fa fa-search"></i> FİLTRELE
					</button>
				</a>

				<a href="<?php echo base_url('panel/menu-yonetimi/menu-ekle'); ?>">
					<button type="submit" class="btn btn-default">
						<i class="fa fa-plus"></i> MENÜ EKLE
					</button>
				</a>
			</div>
		</div>
	</div>	

	<?php if ($this -> input -> get('deleteAction') == 'true' ): ?>
	<div class="alert alert-block alert-success" style="margin-top: 20px;">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Başarılı</h4>
		<p>Silme İşlemi Başarılı</p>
	</div>
	<?php endif; ?>
	
	<?php
		if (!empty($get_menus)):
	?>

	<section id="widget-grid" style="margin-top: 20px;">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-sortable="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2><?php echo count($get_menus).' kayıt bulundu'; ?> </h2>
					</header>

					<div>
						<div class="widget-body no-padding">

							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th width="100" data-hide="phone">ID</th>
										<th data-class="expand">BAŞLIK</th>
										<th class="hidden-md hidden-sm hidden-xs" data-hide="phone">URL</th>
										<th width="160" class="hidden-md hidden-sm hidden-xs" data-hide="phone,tablet">OLUŞTURULMA TARİHİ</th>
										<th width="60" class="hidden-md hidden-sm hidden-xs" data-hide="phone,tablet">SIRALA</th>
										<th width="140" data-hide="phone,tablet">İŞLEMLER</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_menus AS $menu): ?>
									 <tr <?php if ($menu -> menu_status == 0) echo 'style="background-color: #E6E6E6;"'; ?>>
										<td>
											<?php echo $menu -> menu_id ?>	
										</td>
										<td>
											<?php echo $menu -> menu_name; ?>	
										</td>
										<td class="hidden-md hidden-sm hidden-xs">
											<?php echo $menu -> menu_link; ?>
										</td>
										<td class="hidden-md hidden-sm hidden-xs">
											<?php echo date('d/m/Y - H:i:s', $menu -> menu_create_time); ?>	
										</td>
										<td class="hidden-md hidden-sm hidden-xs" style="text-align: center; cursor: move;" class="sortable">
											<i rel="tooltip" data-placement="top" data-original-title="Sürükle" class="fa fa-arrows"></i>
										</td>
										<td>
											<?php
		                                        if ($menu -> menu_status == 1)
		                                            echo '<a rel="tooltip" data-placement="top" data-original-title="Pasif Et" class="label label-success"><i class="fa fa-check"></i></a>';
		                                        else
		                                            echo '<a rel="tooltip" data-placement="top" data-original-title="Aktif Et" class="label label-danger"><i class="fa fa-close"></i></a>';
		                                    ?>
										
											<a rel="tooltip" data-placement="top" data-original-title="Önizle" href="<?php echo $menu -> menu_link; ?>" target="_blank" class="label label-info">
												<i class="fa fa-eye"></i>
											</a>
										
											<a rel="tooltip" data-placement="top" data-original-title="Düzenle" href="<?php echo base_url('panel/menuler/menu-duzenle/'.$menu -> menu_id); ?>" class="label label-primary">
												<i class="fa fa-edit"></i>
											</a>
										
											<a rel="tooltip" data-placement="top" data-original-title="Sil" data-toggle="modal" data-target="#delete<?php echo $menu -> menu_id; ?>" href="#" class="label label-danger">
												<i class="fa fa-trash-o"></i>
											</a>

											<div class="modal fade" id="delete<?php echo $menu -> menu_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
																&times;
															</button>
															<h4 class="modal-title" id="myModalLabel">ONAYLA</h4>
														</div>
														<div class="modal-body">
											
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<h5><b><?php echo $menu -> menu_name; ?></b></h5>
																		SİLMEK İSTEDİĞİNİZE EMİN MİSİNİZ?
																	</div>
																</div>
															</div>
												
														</div>
														<div class="modal-footer">
															<a href="#" style="font-size: 11px; font-weight: 400; margin-top: -1px !important; display: inline-block; padding: 7px 8px; margin-right: 5px;" class="label label-default" data-dismiss="modal">
																VAZGEÇ
															</button>
															<a href="<?php echo base_url('panel/menuler/menu-sil/'.$menu -> menu_id); ?>" class="label label-danger">
																<i class="fa fa-trash-o"></i> SİL
															</a>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>

						</div>
					</div>
				</div>

			</article>
		</div>
	</section>

	<?php
		else:
			echo '<p style="margin-top: 10px;">Kayıt yok</p>';
		endif;
	?>
</div>


