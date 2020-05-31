<header id="header">
	<div id="logo-group">
		<span id="logo"> <img src="<?php echo base_url('public/back_end/img/mutfak-yapim-logo.png'); ?>"> </span>
	</div>

	<div class="pull-right">
		
		<div id="hide-menu" class="btn-header pull-right">
			<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
		</div>
		
		<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
			<li>
				<li>
					<a style="margin-top: -5px; display: inline-block;" href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
						<span style="margin-top: 10px; display: inline-block;">
							<?php echo $this -> session -> userdata('admin_name').' '.$this -> session -> userdata('admin_surname'); ?>
						</span>
						<img style="margin-top: 0px;"  src="<?php echo base_url('public/back_end/img/profile.png'); ?>" alt="John Doe" class="online" />  
					</a>

					<ul class="dropdown-menu pull-right">
						<li>
							<a href="<?php echo base_url('panel/yonetici-ayarlari'); ?>" class="padding-10"><i class="fa fa-cog"></i> Yönetici Ayarları</a>
						</li>
						<li>
							<a href="#" class="padding-10"> <i class="fa fa-user"></i> Log Kayıtları</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="<?php echo base_url('root/oturumu-kapat'); ?>" class="padding-10"><i class="fa fa-sign-out fa-lg"></i> Oturumu Kapat</a>
						</li>
					</ul>
				</li>
			</li>
		</ul>

		<ul class="header-dropdown-list hidden-xs">
			<li>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo base_url('public/back_end/img/blank.gif'); ?>" class="flag flag-tr"> <span> Türkçe (TR) </span> <i class="fa fa-angle-down"></i> </a>
				<ul class="dropdown-menu pull-right">
					<li class="active">
						<a href="javascript:void(0);"><img src="<?php echo base_url('public/back_end/img/blank.gif'); ?>" class="flag flag-tr" alt="TR"> Türkçe (TR)</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>

</header>

<aside id="left-panel">
	<nav>
		<ul>
			<li <?php if (!$this -> uri -> segment(2)) echo 'class="active"'; ?>>
				<a href="" title="Panel"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Panel</span></a>
			</li>
			
			<li <?php if ($this -> uri -> segment(2) == 'ayarlar') echo 'class="active"'; ?>>
				<a href="#" title="Ayarlar"><i class="fa fa-lg fa-fw fa-cogs"></i> <span class="menu-item-parent">Ayarlar</span></a>
				<ul>
					<li <?php if ($this -> uri -> segment(3) == 'site-ayarlari') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/ayarlar/site-ayarlari'); ?>"><i class="fa fa-cog"></i> Site Ayarları</a>
					</li>
					<li <?php if ($this -> uri -> segment(3) == 'logo-ve-favicon-ayarlari') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/ayarlar/logo-ve-favicon-ayarlari'); ?>"><i class="fa fa-picture-o"></i> Logo ve Favicon Ayarları</a>
					</li>
					<li <?php if ($this -> uri -> segment(3) == 'sosyal-medya-ayarlari') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/ayarlar/sosyal-medya-ayarlari'); ?>"><i class="fa fa-slack"></i> Sosyal Medya Ayarları</a>
					</li>
					<li <?php if ($this -> uri -> segment(3) == 'e-posta-ayarlari') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/ayarlar/e-posta-ayarlari'); ?>"><i class="fa fa-envelope"></i> E-Posta Ayarları</a>
					</li>
					<li <?php if ($this -> uri -> segment(3) == 'urun-ayarlari') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/ayarlar/urun-ayarlari'); ?>"><i class="fa fa-star"></i> Ürün Ayarları</a>
					</li>
					<li <?php if ($this -> uri -> segment(3) == 'harici-kod-ayarlari') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/ayarlar/harici-kod-ayarlari'); ?>"><i class="fa fa-code"></i> Harici Kod Ayarları</a>
					</li>
					<li <?php if ($this -> uri -> segment(3) == 'site-haritasi-ayarlari') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/ayarlar/site-haritasi-ayarlari'); ?>"><i class="fa fa-sitemap"></i> Site Haritası Ayarları</a>
					</li>
				</ul>
			</li>
			<li <?php if ($this -> uri -> segment(2) == 'menuler') echo 'class="active"'; ?>>
				<a href="#" title="Menüler"><i class="fa fa-lg fa-fw fa-link"></i> <span class="menu-item-parent">Menüler</span></a>
				<ul>
					<li <?php if ($this -> uri -> segment(3) == 'eklenen-menuler') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/menuler/eklenen-menuler'); ?>"><i class="fa fa-link"></i> Eklenen Menüler</a>
					</li>
					<li <?php if ($this -> uri -> segment(3) == 'menu-ekle') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/menuler/menu-ekle'); ?>"><i class="fa fa-plus"></i> Menü Ekle</a>
					</li>
				</ul>
			</li>
			<li <?php if ($this -> uri -> segment(2) == 'sayfalar') echo 'class="active"'; ?>>
				<a href="#" title="Sayfalar"><i class="fa fa-lg fa-fw fa-file"></i> <span class="menu-item-parent">Sayfalar</span></a>
				<ul>
					<li <?php if ($this -> uri -> segment(3) == 'eklenen-sayfalar') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/sayfalar/eklenen-sayfalar'); ?>"><i class="fa fa-file"></i> Eklenen Sayfalar</a>
					</li>
					<li <?php if ($this -> uri -> segment(3) == 'sayfa-ekle') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/sayfalar/sayfa-ekle'); ?>"><i class="fa fa-plus"></i> Sayfa Ekle</a>
					</li>
				</ul>
			</li>

			<li <?php if ($this -> uri -> segment(2) == 'hizmetler') echo 'class="active"'; ?>>
				<a href="#" title="Hizmetler"><i class="fa fa-lg fa-fw fa-briefcase"></i> <span class="menu-item-parent">Hizmetler</span></a>
				<ul>
					<li <?php if ($this -> uri -> segment(3) == 'eklenen-hizmetler') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/hizmetler/eklenen-hizmetler'); ?>"><i class="fa fa-briefcase"></i> Eklenen Hizmetler</a>
					</li>
					<li <?php if ($this -> uri -> segment(3) == 'hizmet-ekle') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/hizmetler/hizmet-ekle'); ?>"><i class="fa fa-plus"></i> Hizmet Ekle</a>
					</li>
				</ul>
			</li>

			<li <?php if ($this -> uri -> segment(2) == 'urunler') echo 'class="active"'; elseif ($this -> uri -> segment(2) == 'kategoriler') echo 'class="active"' ?>>
				<a href="#" title="Ürünler"><i class="fa fa-lg fa-fw fa-star"></i> <span class="menu-item-parent">Ürünler</span></a>
				<ul>
					<li <?php if ($this -> uri -> segment(2) == 'urunler') echo 'class="active"'; ?>>
						<a href="#"><i class="fa fa-star"></i> Ürünler</a>
						<ul>
							<li <?php if ($this -> uri -> segment(3) == 'eklenen-urunler') echo 'class="active"'; ?>>
								<a href="<?php echo base_url('panel/urunler/eklenen-urunler'); ?>">
									<i class="fa fa-star"></i>
									Eklenen Ürünler
								</a>
							</li>
							<li><hr style="margin: 0px; padding: 0px;"></li>
							<li <?php if ($this -> uri -> segment(3) == 'urun-ekle') echo 'class="active"'; ?>>
								<a href="<?php echo base_url('panel/urunler/urun-ekle'); ?>">
									<i class="fa fa-plus"></i>
									Ürün Ekle
								</a>
							</li>
							<li><hr style="margin: 0px; padding: 0px;"></li>
							<li>
								<a href="#"><i class="fa fa-list"></i> Diğer Ürünler</a>
								<ul>
									<li <?php if ($this -> uri -> segment(3) == 'yeni-urunler') echo 'class="active"'; ?>>
										<a href="<?php echo base_url('panel/urunler/yeni-urunler'); ?>">
											<i class="fa fa-star"></i> Yeni Ürünler
										</a>
									</li>
									<li><hr style="margin: 0px; padding: 0px;"></li>
									<li <?php if ($this -> uri -> segment(3) == 'indirimli-urunler') echo 'class="active"'; ?>>
										<a href="<?php echo base_url('panel/urunler/indirimli-urunler'); ?>">
											<i class="fa fa-star"></i> İndirimli Ürünler
										</a>
									</li>
									<li><hr style="margin: 0px; padding: 0px;"></li>
									<li <?php if ($this -> uri -> segment(3) == 'cok-satan-urunler') echo 'class="active"'; ?>>
										<a href="<?php echo base_url('panel/urunler/cok-satan-urunler'); ?>">
											<i class="fa fa-star"></i> Çok Satan Ürünler
										</a>
									</li>
									<li><hr style="margin: 0px; padding: 0px;"></li>
									<li <?php if ($this -> uri -> segment(3) == 'onerilen-urunler') echo 'class="active"'; ?>>
										<a href="<?php echo base_url('panel/urunler/onerilen-urunler'); ?>">
											<i class="fa fa-star"></i> Önerilen Ürünler
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>

					<li><hr style="margin: 0px; padding: 0px;"></li>

					<li <?php if ($this -> uri -> segment(2) == 'kategoriler') echo 'class="active"'; ?>>
						<a href="#" title="Kategoriler"><i class="fa fa-folder"></i> Kategoriler</a>
						<ul>
							<li <?php if ($this -> uri -> segment(3) == 'eklenen-kategoriler') echo 'class="active"'; ?>>
								<a href="<?php echo base_url('panel/kategoriler/eklenen-kategoriler'); ?>">
									<i class="fa fa-folder"></i>
									Eklenen Kategoriler
								</a>
							</li>
							<li><hr style="margin: 0px; padding: 0px;"></li>
							<li <?php if ($this -> uri -> segment(3) == 'kategori-ekle') echo 'class="active"'; ?>>
								<a href="<?php echo base_url('panel/kategoriler/kategori-ekle'); ?>">
									<i class="fa fa-plus"></i>
									Kategori Ekle
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>

			<li <?php if ($this -> uri -> segment(2) == 'rezervasyonlar') echo 'class="active"';?>>
				<a href="<?php echo base_url('panel/rezervasyonlar/eklenen-rezervasyonlar'); ?>" title="Rezervasyonlar"><i class="fa fa-lg fa-fw fa-save"><em><?=$this-> Back_End_Model -> get_reservation_count(["reservation_status" => 0])?></em></i> <span class="menu-item-parent">Rezervasyonlar</span></a>
			</li>

			<li <?php if ($this -> uri -> segment(2) == 'mesajlar') echo 'class="active"'; ?>>
				<a href="<?php echo base_url('panel/mesajlar'); ?>" title="Mesajlar"><i class="fa fa-lg fa-fw fa-envelope"><em>0</em></i> <span class="menu-item-parent">Mesajlar</span></a>
			</li>
		
			<li>
				<a href="<?php echo base_url('panel/siparisler'); ?>" title="Siparişler"><i class="fa fa-lg fa-fw fa-bell"><em>0</em></i> <span class="menu-item-parent">Siparişler</span></a>
			</li>

			<li <?php if ($this -> uri -> segment(2) == 'dosyalar') echo 'class="active"'; ?>>
				<a href="<?php echo base_url('panel/dosyalar'); ?>" title="Dosyalar"><i class="fa fa-lg fa-fw fa-folder"></i> <span class="menu-item-parent">Dosyalar</span></a>
			</li>

			<!-- <li <?php if ($this -> uri -> segment(2) == 'diller') echo 'class="active"'; ?>>
				<a href="#"><i class="fa fa-flag"></i> Diller</a>
				<ul>
					<li <?php if ($this -> uri -> segment(3) == 'eklenen-diller') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/diller/eklenen-diller'); ?>">
							<i class="fa fa-flag"></i>
							Eklenen Diller
						</a>
					</li>
					<li <?php if ($this -> uri -> segment(3) == 'dil-ekle') echo 'class="active"'; ?>>
						<a href="<?php echo base_url('panel/diller/dil-ekle'); ?>">
							<i class="fa fa-plus"></i>
							Dil Ekle
						</a>
					</li>
				</ul>
			</li> -->

			<li <?php if ($this -> uri -> segment(2) == 'galeriler') echo 'class="active"'; ?>>
				<a href="#"><i class="fa fa-lg fa-fw fa-puzzle-piece"></i> <span class="menu-item-parent">Modüller</span></a>
				<ul>
					<li>
						<a href=""><i class="fa fa-puzzle-piece"></i> Slayt Modülü</a>
					</li>
					<li>
						<a href=""><i class="fa fa-puzzle-piece"></i> Form Modülü</a>
					</li>

					<li <?php if ($this -> uri -> segment(2) == 'galeriler') echo 'class="active"'; ?>>
						<a href="#"><i class="fa fa-picture-o"></i> Galeri Modülü</a>
						<ul>
							<li <?php if ($this -> uri -> segment(3) == 'eklenen-galeriler') echo 'class="active"'; ?>>
								<a href="<?php echo base_url('panel/galeriler/eklenen-galeriler'); ?>">
									<i class="fa fa-picture-o"></i> Eklenen Galeriler
								</a>
							</li>
							<li><hr style="margin: 0px; padding: 0px;"></li>
							<li <?php if ($this -> uri -> segment(3) == 'galeri-ekle') echo 'class="active"'; ?>>
								<a href="<?php echo base_url('panel/galeriler/galeri-ekle'); ?>">
									<i class="fa fa-plus"></i> Galeri Ekle
								</a>
							</li>
							</li>
						</ul>
					</li>

					<li>
						<a href=""><i class="fa fa-puzzle-piece"></i> Blog Modülü</a>
					</li>
				</ul>		
			</li>

			<li style="margin-left: 20px;">
				<a class="text-success" target="_blank" href="<?php echo base_url(); ?>"><i class="fa fa-lg fa-fw fa-globe"></i> <span class="menu-item-parent">Önizle</span></a>
			</li>
			<li>
				<a class="text-danger" href="<?php echo base_url('root/oturumu-kapat'); ?>"><i class="fa fa-lg fa-fw fa-close"></i> <span class="menu-item-parent">Çıkış</span></a>
			</li>
		</ul>
	</nav>
	<span class="minifyme" data-action="minifyMenu"> 
		<i class="fa fa-arrow-circle-left hit"></i> 
	</span>

</aside>


<div id="" role="main" style="margin-top: 70px;">

	<div id="ribbon">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>"><i class="fa-fw fa fa-home"></i> Panel</a></li>
			<li><a href="<?php echo $page['url']; ?>"><?php echo $page['name']; ?></a></li>
		</ol>

		<!-- <span class="ribbon-button-alignment pull-right">
			<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
			<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
			<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
		</span> -->

	</div>

