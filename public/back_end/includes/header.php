HEADER -->
<header id="header">
	<div id="logo-group">

		<!-- PLACE YOUR LOGO HERE -->
		<span id="logo"> <img src="img/mutfak-yapim-logo.png"> </span>
		<!-- END LOGO PLACEHOLDER -->

	</div>

	<!-- pulled right: nav area -->
	<div class="pull-right">
		
		<!-- collapse menu button -->
		<div id="hide-menu" class="btn-header pull-right">
			<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
		</div>
		<!-- end collapse menu -->
		
		<!-- #MOBILE -->
		<!-- Top menu profile link : this shows only when top menu is active -->
		<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
			<li class="">
				<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
					<img src="img/avatars/sunny.png" alt="John Doe" class="online" />  
				</a>
				<ul class="dropdown-menu pull-right">
					<li>
						<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
					</li>
				</ul>
			</li>
		</ul>

		<!-- logout button -->
		<div id="logout" class="btn-header transparent pull-right">
			<span> <a href="login.html" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
		</div>
		<!-- end logout button -->

		<!-- search mobile button (this is hidden till mobile view port) -->
		<div id="search-mobile" class="btn-header transparent pull-right">
			<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
		</div>
		<!-- end search mobile button -->
	</div>
	<!-- end pulled right: nav area -->

</header>
<!-- END HEADER -->

<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

	<!-- User info -->
	<div class="login-info">
		<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
			
			<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
				<img src="img/avatars/sunny.png" alt="me" class="online" /> 
				<span>
					john.doe 
				</span>
				<i class="fa fa-angle-down"></i>
			</a> 
			
		</span>
	</div>
	<!-- end user info -->

	<!-- NAVIGATION : This navigation is also responsive-->
	<nav>
		<ul>
			<li class="active">
				<a href="" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Panel</span></a>
			</li>
			<!-- <li> -->
				<!-- <a href="inbox.html"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Inbox</span><span class="badge pull-right inbox-badge">14</span></a> -->
			<!-- </li> -->
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-cogs"></i> <span class="menu-item-parent">Ayarlar</span></a>
				<ul>
					<li>
						<a href=""><i class="fa fa-cog"></i> Site Ayarları</a>
					</li>
					<li>
						<a href=""><i class="fa fa-picture-o"></i> Logo ve Favicon Ayarları</a>
					</li>
					<li>
						<a href="">Tasarım Ayarları</a>
					</li>
					<li>
						<a href=""><i class="fa fa-slack"></i> Sosyal Medya Ayarları</a>
					</li>
					<li>
						<a href=""><i class="fa fa-envelope"></i> E-Posta Ayarları</a>
					</li>
					<li>
						<a href=""><i class="fa fa-code"></i> Harici Kod Ayarları</a>
					</li>
					<li>
						<a href=""><i class="fa fa-bars"></i> Site Haritası Ayarları</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-link"></i> <span class="menu-item-parent">Menüler</span></a>
				<ul>
					<li>
						<a href=""><i class="fa fa-link"></i> Eklenen Menüler</a>
					</li>
					<li>
						<a href=""><i class="fa fa-plus"></i> Menü Ekle</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-file"></i> <span class="menu-item-parent">Sayfalar</span></a>
				<ul>
					<li>
						<a href=""><i class="fa fa-file"></i> Eklenen Sayfalar</a>
					</li>
					<li>
						<a href=""><i class="fa fa-plus"></i> Sayfa Ekle</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-folder"></i> <span class="menu-item-parent">Kategoriler</span></a>
				<ul>
					<li>
						<a href=""><i class="fa fa-folder"></i> Eklenen Kategoriler</a>
					</li>
					<li>
						<a href=""><i class="fa fa-plus"></i> Kategori Ekle</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-star"></i> <span class="menu-item-parent">Ürünler</span></a>
				<ul>
					<li>
						<a href=""><i class="fa fa-star"></i> Eklenen Ürünler</a>
					</li>
					<li>
						<a href=""><i class="fa fa-plus"></i> Ürün Ekle</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-list"></i> Diğer Ürünler</a>
						<ul>
							<li><a href="forum.html"><i class="fa fa-star"></i> Yeni Ürünler</a></li>
							<li><a href="forum.html"><i class="fa fa-star"></i> İndirimli Ürünler</a></li>
							<li><a href="forum.html"><i class="fa fa-star"></i> Çok Satan Ürünler</a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-envelope"><em>0</em></i> <span class="menu-item-parent">Mesajlar</span></a>
			</li>
		
			<li>
				<a href=""><i class="fa fa-lg fa-fw fa-bell"><em>0</em></i> <span class="menu-item-parent">Siparişler</span></a>
			</li>

			<li>
				<a href=""><i class="fa fa-lg fa-fw fa-bar-chart"></i> <span class="menu-item-parent">İstatistikler</span></a>
			</li>

			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-puzzle-piece"></i> <span class="menu-item-parent">Entegrasyon</span></a>
			</li>

			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-puzzle-piece"></i> <span class="menu-item-parent">Modüller</span></a>
				<ul>
					<li>
						<a href=""><i class="fa fa-puzzle-piece"></i> Slayt Modülü</a>
					</li>
					<li>
						<a href=""><i class="fa fa-puzzle-piece"></i> Form Modülü</a>
					</li>
					<li>
						<a href=""><i class="fa fa-puzzle-piece"></i> Galeri Modülü</a>
					</li>
					<li>
						<a href=""><i class="fa fa-puzzle-piece"></i> Blog Modülü</a>
					</li>
				</ul>		
			</li>
		</ul>
	</nav>
	<span class="minifyme" data-action="minifyMenu"> 
		<i class="fa fa-arrow-circle-left hit"></i> 
	</span>

</aside>
<!-- END NAVIGATION