<div id="content" style="margin-bottom: 40px;">
	<div class="row">
		<div class="col-md-12">
			<div style="text-align: left;">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa fa-envelope fa-fw "></i> 
					<?php echo $page['name']; ?> 
				</h1>
			</div>

			<div style="text-align: right; margin-top: -55px;">
				<a>
					<button type="submit" class="btn btn-default">
						<i class="fa fa-search"></i> FİLTRELE
					</button>
				</a>

				<a href="<?php echo base_url('panel/kategori-yonetimi/kategori-ekle'); ?>">
					<button type="submit" class="btn btn-default">
						<i class="fa fa-plus"></i> KATEGORİ EKLE
					</button>
				</a>
			</div>
		</div>
	</div>

	<?php if ($this -> input -> get('editAction') == 'true' ): ?>
	<div class="alert alert-block alert-success" style="margin-top: 20px;">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Başarılı</h4>
		<p>Okundu Olarak İşaretleme İşlemi Başarılı</p>
	</div>
	<?php endif; ?>	

	<?php if ($this -> input -> get('deleteAction') == 'true' ): ?>
	<div class="alert alert-block alert-success" style="margin-top: 20px;">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Başarılı</h4>
		<p>Silme İşlemi Başarılı</p>
	</div>
	<?php endif; ?>	

	<?php
		if (!empty($get_all_messages)):
	?>

	<section id="widget-grid" style="margin-top: 20px;">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-sortable="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2><?php echo @count($get_all_messages) ?> </h2>
					</header>

					<div>
						<div class="widget-body no-padding">

							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th width="100" data-hide="phone">ID</th>
										<th width="150" data-hide="phone">AD SOYAD</th>
										<th data-class="expand">KONU</th>
										<th class="hidden-md hidden-sm hidden-xs" data-hide="phone">TARİH</th>
										<th width="90" data-hide="phone,tablet">DURUM</th>
										<th width="100" data-hide="phone,tablet">İŞLEMLER</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($get_all_messages AS $message): ?>
									 <tr <?php if ($message -> message_status == 0) echo 'style="background-color: #E6E6E6;"'; ?>>
										<td>
											<?php echo $message -> message_id ?>	
										</td>
										<td>
											<?php echo $message -> message_name_surname ?>	
										</td>
										<td>
											<?php echo $message -> message_subject; ?>	
										</td>
										<td class="hidden-md hidden-sm hidden-xs">
											<?php echo date('d/m/Y - H:i:s', $message -> message_date); ?>	
										</td>
										<td class="hidden-md hidden-sm hidden-xs">
											<?php
		                                        if ($message -> message_status == 0)
		                                            echo '<span class="label label-warning" style="font-size: 12px; font-weight: 400;">YENİ</span>';
		                                        else
		                                            echo '<span class="label label-success" style="font-size: 12px; font-weight: 400;">OKUNDU</span>';
		                                    ?>
										</td>
										<td>
											<a rel="tooltip" data-placement="top" data-original-title="Oku" data-toggle="modal" data-target="#read<?php echo $message -> message_id; ?>" class="label label-primary">
												<i class="fa fa-eye"></i>
											</a>
										
											<a rel="tooltip" data-placement="top" data-original-title="Sil" data-toggle="modal" data-target="#delete<?php echo $message -> message_id; ?>" href="#" class="label label-danger">
												<i class="fa fa-trash-o"></i>
											</a>

											<div class="modal fade" id="read<?php echo $message -> message_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
																&times;
															</button>
															<h4 class="modal-title" id="myModalLabel2"><?php echo $message -> message_name_surname ?>	</h4>
														</div>
														<div class="modal-body">
											
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<b>Gönderen: </b> <?php echo $message->message_name_surname; ?><br />
										                                <b>E-Posta Adresi: </b> <?php echo $message->message_email; ?><br />
										                                <b>Konu: </b> <?php echo $message->message_subject; ?><br />
										                                <b>Telefon: </b> <?php echo $message->message_phone; ?><br />
										                                <b>Tarih: </b> <?php echo date('Y/m/d - H:i:s', $message->message_date); ?><br />
										                                <p><b>Mesaj İçeriği: </b><br /> <?php echo $message->message_text; ?></p>
																	</div>
																</div>
															</div>
												
														</div>
														<div class="modal-footer">
															<a href="#" style="font-size: 11px; font-weight: 400; margin-top: -1px !important; display: inline-block; padding: 7px 8px; margin-right: 5px;" class="label label-default" data-dismiss="modal">
																GERİ DÖN
															</button>
															<a href="<?php echo base_url('panel/mesajlar/okundu-isaretle/'.$message->message_id); ?>" style="font-size: 11px; font-weight: 400; margin-top: -1px !important; display: inline-block; padding: 7px 8px; margin-right: 5px;" class="label label-warning">
																OKUNDU OLARAK İŞARETLE
															</button>
															<a href="<?php echo base_url('panel/mesajlar/mesaj-sil/'.$message -> message_id); ?>" class="label label-danger">
																<i class="fa fa-trash-o"></i> SİL
															</a>
														</div>
													</div>
												</div>
											</div>

											<div class="modal fade" id="delete<?php echo $message -> message_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
																		<h5><b><?php echo $message -> category_name; ?></b></h5>
																		SİLMEK İSTEDİĞİNİZE EMİN MİSİNİZ?
																	</div>
																</div>
															</div>
												
														</div>
														<div class="modal-footer">
															<a href="#" style="font-size: 11px; font-weight: 400; margin-top: -1px !important; display: inline-block; padding: 7px 8px; margin-right: 5px;" class="label label-default" data-dismiss="modal">
																VAZGEÇ
															</button>
															<a href="<?php echo base_url('panel/mesajlar/mesaj-sil/'.$message -> message_id); ?>" class="label label-danger">
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


