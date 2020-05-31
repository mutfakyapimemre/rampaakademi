<div id="content" style="margin-bottom: 40px;">
	<div class="row">
		<div class="col-md-12">
			<div style="text-align: left;">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa fa-star fa-fw "></i> 
					<?php echo $page['name']; ?> 
				</h1>
			</div>

			<div style="text-align: right; margin-top: -55px;">
				<a>
					<button type="submit" class="btn btn-default">
						<i class="fa fa-search"></i> FİLTRELE
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
		if ($get_reservation_count):
	?>

	<section id="widget-grid" style="margin-top: 20px;">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-sortable="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2><?php echo $get_reservation_count.' kayıt bulundu'; ?> </h2>
					</header>

					<div>
						<div class="widget-body no-padding">

							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th width="100" data-hide="phone">ID</th>
										<th width="80" data-hide="phone">EĞİTİM</th>
										<th data-class="expand">KULLANICI</th>
										<th data-class="expand">TELEFON</th>
										<th data-class="expand">EMAİL</th>
										<th width="160" class="hidden-md hidden-sm hidden-xs" data-hide="phone,tablet">OLUŞTURULMA TARİHİ</th>
										<th width="140" data-hide="phone,tablet">İŞLEMLER</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_reservations AS $reservation): ?>
									 <tr <?php if ($reservation -> reservation_status == 0) echo 'style="background-color: #E6E6E6;"'; ?>>
										<td><?php echo $reservation -> reservation_id ?></td>
										<td><?php echo $reservation -> product_name; ?></td>
										<td><?php echo $reservation->reservation_name." ".$reservation->reservation_surname?></td>
										<td><?php echo $reservation->reservation_phone?></td>
										<td><?php echo $reservation->reservation_email?></td>
										<td class="hidden-md hidden-sm hidden-xs"><?php echo date('d/m/Y - H:i:s', $reservation -> reservation_date); ?></td>
										<td>
											<?php
		                                        if ($reservation -> reservation_status == 1)
		                                            echo '<a rel="tooltip" data-placement="top" data-original-title="Pasif Et" class="label label-success"><i class=" fa fa-check"></i></a href="">';
		                                        else
		                                            echo '<a rel="tooltip" data-placement="top" data-original-title="Aktif Et" class="label label-danger"><i class=" fa fa-close"></i></a href="">';
		                                    ?>

											<a rel="tooltip" data-placement="top" data-original-title="Düzenle" href="<?php echo base_url('panel/rezervasyonlar/rezervasyon-duzenle/'.$reservation -> reservation_id); ?>" class="label label-primary">
												<i class="fa fa-edit"></i> 
											</a>

											<a rel="tooltip" data-placement="top" data-original-title="Sil" data-toggle="modal" data-target="#delete<?php echo $reservation -> reservation_id; ?>" href="#" class="label label-danger">
												<i class="fa fa-trash-o"></i>
											</a>

											<div class="modal fade" id="delete<?php echo $reservation -> reservation_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
																		<h5><b><?php echo date("d-m-Y",$reservation -> reservation_date); ?> Tarihli "<?php echo $reservation->reservation_name." ".$reservation->reservation_surname?>" Adlı Kişinin Rezervasyonunu</b></h5>
																		SİLMEK İSTEDİĞİNİZE EMİN MİSİNİZ?
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<a href="#" style="font-size: 11px; font-weight: 400; margin-top: -1px !important; display: inline-block; padding: 7px 8px; margin-right: 5px;" class="label label-default" data-dismiss="modal">
																VAZGEÇ
															</button>
															<a href="<?php echo base_url('panel/rezervasyonlar/rezervasyon-sil/'.$reservation -> reservation_id); ?>" class="label label-danger">
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

				<?php
                    if ($pagination_link)
                        echo '<div class="pagination">'.$pagination_link.'</div>';
                ?>

			</article>
		</div>
	</section>

	<?php
		else:
			echo '<p style="margin-top: 10px;">Kayıt yok</p>';
		endif;
	?>
</div>


