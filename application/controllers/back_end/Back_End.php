<?php
	/**
	* MUTFAK YAPIM İÇERİK YÖNETİM SİSTEMİ v2.0.0	
	* 
	* @package			BACK-END CONTROLLER
	* @version			v2.0.0
	* @author 			Asaf Mirtürk (asaf.mirturk@mutfakyapim.com)
	* @copyright		Mutfak Yapım © 2020		
	* @link				www.mutfakyapim.com
	*/
	class Back_End extends CI_Controller
	{
		/**
		* YÜKLEME DİZİNLERİ
		* Buradan güncelleme işlemi yaparsanız controllers/Front_End.php sayfasından da aynı güncellemeleri yapın
		*/
		const upload_dir								= 'public/uploads/'; // ANA YÜKLEME DİZİNİ
		const upload_product_photo_index_dir			= self::upload_dir.'products/index/'; //ÜRÜN
		const upload_product_photo_small_dir			= self::upload_dir.'products/small/'; //ÜRÜN
		const upload_product_photo_medium_dir			= self::upload_dir.'products/medium/'; //ÜRÜN
		const upload_product_photo_large_dir			= self::upload_dir.'products/large/'; //ÜRÜN
		const upload_category_cover_photo				= self::upload_dir.'categories/'; // KATEGORİ KAPAK
		const upload_category_slider_photo				= self::upload_dir.'categories/sliders/'; // KATEGORİ SLAYT
		const upload_service_photo						= self::upload_dir.'services/'; // HİZMET
		const upload_gallery_photo						= self::upload_dir.'galleries/580/'; // GALERİ
		const upload_gallery_photo_thumb				= self::upload_dir.'galleries/450x450/'; // GALERİ


		// URI
		const uri =
		[
			'base_url'			=>							'panel',

			'settings'			=>
			[
				'settings'									=> 'ayarlar',
				'site_settings'								=> 'site-ayarlari',
				'logo_and_favicon'							=> 'logo-ve-favicon-ayarlari',
				'social_media'								=> 'sosyal-medya-ayarlari',
				'email'										=> 'e-posta-ayarlari',
				'product'									=> 'urun-ayarlari',
				'external_code'								=> 'harici-kod-ayarlari',
				'sitemap'									=> 'site-haritasi-ayarlari',
				'test_mail'									=> 'sinama-e-postasi-gonder',
			],

			'pages'				=>
			[
				'page_settings'								=> 'sayfalar',
				'list_page'									=> 'eklenen-sayfalar',
				'add_page'									=> 'sayfa-ekle',
				'delete_page'								=> 'sayfa-sil',
				'edit_page'									=> 'sayfa-duzenle',
			],

			'menus'				=>
			[
				'menus_settings'							=> 'menuler',
				'list_menu'									=> 'eklenen-menuler',
				'add_menu'									=> 'menu-ekle',
				'delete_menu'								=> 'menu-sil',
				'edit_menu'									=> 'menu-duzenle',
				'search_menu'								=> 'menu-ara',
				'rank_menu'									=> 'menu-sirala',
			],

			'services'				=>
			[
				'service_settings'							=> 'hizmetler',
				'list_service'								=> 'eklenen-hizmetler',
				'add_service'								=> 'hizmet-ekle',
				'delete_service'							=> 'hizmet-sil',
				'edit_service'								=> 'hizmet-duzenle',
				'search_service'							=> 'hizmet-ara',
				'rank_service'								=> 'hizmet-sirala',
			],

			'products'			=>
			[
				'product_settings'							=> 'urunler',
				'list_product'								=> 'eklenen-urunler',
				'add_product'								=> 'urun-ekle',
				'delete_product'							=> 'urun-sil',
				'edit_product'								=> 'urun-duzenle',
				'search_product'							=> 'urun-ara',
				'new_product'								=> 'yeni-urunler',
				'discount_product'							=> 'indirimli-urunler',
				'best_selling_product'						=> 'cok-satan-urunler',
				'suggested_product'							=> 'onerilen-urunler',
			],

			'reservations' 		=>
			[
				'reservation_settings'							=> 'rezervasyonlar',
				'list_reservation'							=> 'eklenen-rezervasyonlar',
				'delete_reservation'							=> 'rezervasyon-sil',
				'edit_reservation'							=> 'rezervasyon-duzenle',
			], 							

			'categories'		=>
			[
				'category_settings'							=> 'kategoriler',
				'list_category'								=> 'eklenen-kategoriler',
				'add_category'								=> 'kategori-ekle',
				'delete_category'							=> 'kategori-sil',
				'edit_category'								=> 'kategori-duzenle',
				'search_category'							=> 'kategori-ara',
			],

			'messages'		=>
			[
				'message_settings'							=> 'mesajlar',
				'edit_message'								=> 'okundu-isaretle',
				'delete_message'							=> 'mesaj-sil',
			],

			'galleries'		=>
			[
				'gallery_settings'								=> 'galeriler',
				'list_gallery'									=> 'eklenen-galeriler',
				'add_gallery'									=> 'galeri-ekle',
				'delete_gallery'								=> 'galeri-sil',
				'edit_gallery'									=> 'galeri-duzenle',
			],

			'file_manager'									=> 'dosyalar',
			'admin_settings'								=> 'yonetici-ayarlari'
		];

		public function __construct ()
		{
			parent::__construct();

			if (!$this -> session -> userdata('admin_id')):
				redirect(base_url('root'));
				return;
			endif;

			// MODEL SAYFALARINI YÜKLE 
			$this -> load -> model('Back_End_Model');

			// SÜRÜCÜLERİ YÜKLE
			$this -> load -> driver('cache', ['adapter' => 'file', 'backup' => 'file']);

			// KÜTÜPHANELERİ YÜKLE
			$this -> load -> library('verot_net');
			$this -> load -> library('pagination');
		}

		// SAYFA BİLGİLERİ
		private function _page ($name)
		{
			return [
				'title'					=> $name.' | Kontrol Paneli',
				'name'					=> $name,
				'url'					=> @base_url($_SERVER['PATH_INFO']),
			];
		}

		// RENDER METODU
		private function _render ($page, $view_data = null)
		{
			// VIEW SAYFASINI YÜKLE
			$this -> load -> view('back_end/includes/head', $view_data);
			$this -> load -> view('back_end/includes/header', $view_data);
			$this -> load -> view($page, $view_data);
			$this -> load -> view('back_end/includes/footer', $view_data);
		}


		/**
		* HATA METODU
		* @param heading string
		* @param message string
		* @return void
		*/
		private function _error ($heading = 'HATA', $message = 'Bir hata oluştu!')
		{
			// VIEW SAYFASINI YÜKLE
			$this -> load -> view('errors/html/error_404', ['heading' => $heading, 'message' => $message]);
		}

		// URI PARÇALAYICI
		public function Uri_Parser ($module_name = null, $sub_module_name = null, $module_arg = null)
		{

			if ($module_name):
				switch ($module_name):
					case self::uri['settings']['settings']:
						$this -> _settings($sub_module_name, $module_arg);
						break;

					case self::uri['menus']['menus_settings']:
						$this -> _menu_management($sub_module_name, $module_arg);
						break;

					case self::uri['pages']['page_settings']:
						$this -> _page_management($sub_module_name, $module_arg);
						break;

					case self::uri['categories']['category_settings']:
						$this -> _category_management($sub_module_name, $module_arg);
						break;

					case self::uri['products']['product_settings']:
						$this -> _product_management($sub_module_name, $module_arg);
						break;

					case self::uri['reservations']['reservation_settings']:
						$this -> _reservation_management($sub_module_name, $module_arg);
						break;

					case self::uri['services']['service_settings']:
						$this -> _services_management($sub_module_name, $module_arg);
						break;

					case 'slaytler':
						$this -> _slider_management($sub_module_name, $module_arg);
						break;

					case self::uri['messages']['message_settings']:
						$this -> _message_management($sub_module_name, $module_arg);
						break;

					case self::uri['galleries']['gallery_settings']:
						$this -> _gallery_management($sub_module_name, $module_arg);
						break;

					case 'blogler':
						$this -> _blog_management($sub_module_name, $module_arg);
						break;

					case self::uri['file_manager']:
						$this -> _file_manager();
						break;

					case 'e-posta-gonder':
						$this -> _email_send();
						break;

					case self::uri['admin_settings']:
						$this -> _admin_setting_magament();
						break;
		
					default:
						$this -> _error();
						break;
				endswitch;
			else:
				// VIEW SAYFASINI YÜKLE
				$this -> _render('back_end/index.php', [
					'page'							=> $this -> _page('Panel'),
				]);
			endif;
		}

		
		



		########################################################################################
		# MODÜLLER
		########################################################################################


		// AYARLAR MODÜLÜ
		private function _settings ($sub_module_name)
		{
			switch ($sub_module_name):
				case self::uri['settings']['site_settings']:
					$this -> _settings_site_settings();
					break;

				case self::uri['settings']['logo_and_favicon']:
					$this -> _settings_logo_and_favicon();
					break;

				case self::uri['settings']['social_media']:
					$this -> _settings_social_media();
					break;

				case self::uri['settings']['email']:
					$this -> _settings_email();
					break;

				case self::uri['settings']['product']:
					$this -> _settings_product();
					break;

				case self::uri['settings']['external_code']:
					$this -> _settings_external();
					break;

				case self::uri['settings']['sitemap']:
					$this -> _settings_sitemap();
					break;

				case self::uri['settings']['test_mail']:
					$this -> _settings_test_email();
					break;
				
				default:
				$this -> _error();
			endswitch;
		}

		// AYARLAR MODÜLÜ - SİTE AYARLARI
		private function _settings_site_settings ()
		{		
			// POST VAR İSE DEVAM ET
			if ($this -> input -> post()):

				// POSTTAN GELEN VERİLERİ AL
				$site_settings_name 		 = trim(addslashes(strip_tags($this -> input -> post('site_settings_name', TRUE))));
				$site_settings_keyword		 = trim(addslashes(strip_tags($this -> input -> post('site_settings_keyword', TRUE))));
				$site_settings_description 	 = trim(addslashes(strip_tags($this -> input -> post('site_settings_description', TRUE))));
				$site_settings_phone 	 	 = trim(addslashes(strip_tags($this -> input -> post('site_settings_phone', TRUE))));
				$site_settings_phone_2 	 	 = trim(addslashes(strip_tags($this -> input -> post('site_settings_phone_2', TRUE))));
				$site_settings_email 	 	 = trim(addslashes(strip_tags($this -> input -> post('site_settings_email', TRUE))));
				$site_settings_adress 	 	 = trim(addslashes(strip_tags($this -> input -> post('site_settings_adress', TRUE))));
				$site_settings_status 		 = trim(addslashes(strip_tags($this -> input -> post('site_settings_status', TRUE))));

				// SİTE AYARLARINI DÜZENLE
				if ($this -> Back_End_Model -> edit_site_settings([
					'site_settings_name' 				=> $site_settings_name,
					'site_settings_keyword' 			=> $site_settings_keyword,
					'site_settings_description' 		=> $site_settings_description,
					'site_settings_phone' 				=> $site_settings_phone,
					'site_settings_phone_2' 			=> $site_settings_phone_2,
					'site_settings_email' 				=> $site_settings_email,
					'site_settings_adress' 				=> $site_settings_adress,
					'site_settings_status' 				=> $site_settings_status
				])):

					// ÖNBELLEK DOSYASINI SİL
					$this -> cache -> delete('site_settings');

					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/site-ayarlari?editAction=true'));
				else:
					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/site-ayarlari?editAction=false'));
				endif;

			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/settings_site_settings', [
				'page'							=> $this -> _page('Site Ayarları'),
				'get_site_settings'				=> $this -> Back_End_Model -> get_site_settings()
			]);
		}

		private function _settings_logo_and_favicon ()
		{
			$get_site_settings = $this -> Back_End_Model -> get_site_settings();

			if ($_FILES):
				$site_settings_logo 			= $_FILES['site_settings_logo'];
				$site_settings_favicon 			= $_FILES['site_settings_favicon'];

				if(!is_dir('public/uploads'))
					mkdir('public/uploads');

				// LOGO YÜKLE
				if ($site_settings_logo):

					if (($site_settings_logo['type'] == 'image/jpeg') OR $site_settings_logo['type'] == 'image/png'):
						
						$exp = explode('.', $site_settings_logo['name']);
						$ext = end($exp);
						$new_file = rand(10000, 999999);
						$new_file = $new_file.'.'.$ext;

						// YÜKLE
						if (move_uploaded_file($site_settings_logo['tmp_name'], 'public/uploads/'.$new_file)):
							// VERİTABANINI GÜNCELLE
							$this -> Back_End_Model -> set_logo($new_file);

							// ESKİSİNİ SİL
							unlink('public/uploads/'.$get_site_settings -> setting_logo);

							// ÖNBELLEK VERİSİNİ SİL
							$this -> cache -> delete('site_settings');
						else:
							$this -> _error();
							return;
						endif;

					endif;
				endif;

				// FAVICON YÜKLE
				if ($site_settings_favicon):
					if (($site_settings_favicon['type'] == 'image/jpeg') OR $site_settings_favicon['type'] == 'image/png'):
						
						// KAYDEDİLECEK İSMİ VE UZANTIYI HAZIRLA
						$exp = explode('.', $site_settings_favicon['name']);
						$ext = end($exp);
						$new_file = rand(10000, 999999);
						$new_file = $new_file.'.'.$ext;

						// YÜKLE
						if (move_uploaded_file($site_settings_favicon['tmp_name'], 'public/uploads/'.$new_file)):
							// VERİTABANINI GÜNCELLE
							$this -> Back_End_Model -> set_favicon($new_file);

							// ESKİSİNİ SİL
							unlink('public/uploads/'.$get_site_settings -> setting_favicon);

							// ÖNBELLEK VERİSİNİ SİL
							$this -> cache -> delete('site_settings');
						else:
							$this -> _error();
							return;
						endif;
					endif;
				endif;

				// ÖNBELLEK DOSYASINI SİL
				$this -> cache -> delete('get_site_settings');

				// YÖNLENDİR
				redirect(base_url('panel/ayarlar/logo-ve-favicon-ayarlari?editAction=true'));
			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/settings_logo_and_favicon', [
				'page'							=> $this -> _page('Logo ve Favicon Ayarları'),
				'get_site_settings'				=> $get_site_settings
			]);
		}

		// AYARLAR MODÜLÜ - SOSYAL MEDYA AYARLARI
		private function _settings_social_media ()
		{
			// POST VAR İSE DEVAM ET
			if ($this -> input -> post()):
				// POSTTAN GELEN VERİLERİ AL
				$site_settings_facebook 	 			= trim(addslashes(strip_tags($this -> input -> post('site_settings_facebook', TRUE))));
				$site_settings_instagram 	 			= trim(addslashes(strip_tags($this -> input -> post('site_settings_instagram', TRUE))));
				$site_settings_twitter 	 	 			= trim(addslashes(strip_tags($this -> input -> post('site_settings_twitter', TRUE))));
				$site_settings_youtube 	 	 			= trim(addslashes(strip_tags($this -> input -> post('site_settings_youtube', TRUE))));
				$site_settings_linkedin 	 	 		= trim(addslashes(strip_tags($this -> input -> post('site_settings_linkedin', TRUE))));

				// SOSYAL MEDYA AYARLARINI DÜZENLE
				if ($this -> Back_End_Model -> edit_settings_social_media([
					'site_settings_facebook' 			=> $site_settings_facebook,
					'site_settings_instagram'			=> $site_settings_instagram,
					'site_settings_twitter'				=> $site_settings_twitter,
					'site_settings_youtube'				=> $site_settings_youtube,
					'site_settings_linkedin'			=> $site_settings_linkedin
				])):

					// ÖNBELLEK DOSYASINI SİL
					$this -> cache -> delete('site_settings_social_media');

					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/sosyal-medya-ayarlari?editAction=true'));
				else:
					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/sosyal-medya-ayarlari?editAction=true'));
				endif;
			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/settings_social_media', [
				'page'									=> $this -> _page('Sosyal Medya Ayarları'),
				'get_settings_social_media'				=> $this -> Back_End_Model -> get_settings_social_media()
			]);
		}

		// AYARLAR MODÜLÜ - E-POSTA AYARLARI
		private function _settings_email ()
		{
			// POST VAR İSE DEVAM ET
			if ($this -> input -> post()):
				// POSTTAN GELEN VERİLERİ AL
				$site_settings_email_protocol 	 				= trim(addslashes(strip_tags($this -> input -> post('site_settings_email_protocol', TRUE))));
				$site_settings_email_server_adress 	 			= trim(addslashes(strip_tags($this -> input -> post('site_settings_email_server_adress', TRUE))));
				$site_settings_email_server_port 	 	 		= trim(addslashes(strip_tags($this -> input -> post('site_settings_email_server_port', TRUE))));
				$site_settings_user 	 	 					= trim(addslashes(strip_tags($this -> input -> post('site_settings_user', TRUE))));
				$site_settings_user_password 	 	 			= trim(addslashes(strip_tags($this -> input -> post('site_settings_user_password', TRUE))));
				$site_settings_email_crypto 	 	 			= trim(addslashes(strip_tags($this -> input -> post('site_settings_email_crypto', TRUE))));
				$site_settings_name_surname 	 	 			= trim(addslashes(strip_tags($this -> input -> post('site_settings_name_surname', TRUE))));

				// E-POSTA AYARLARINI DÜZENLE
				if ($this -> Back_End_Model -> edit_settings_email([
					'site_settings_email_protocol' 				=> $site_settings_email_protocol,
					'site_settings_email_server_adress'			=> $site_settings_email_server_adress,
					'site_settings_email_server_port'			=> $site_settings_email_server_port,
					'site_settings_user'						=> $site_settings_user,
					'site_settings_user_password'				=> $site_settings_user_password,
					'site_settings_email_crypto'				=> $site_settings_email_crypto,
					'site_settings_name_surname'				=> $site_settings_name_surname
				])):
					// ÖNBELLEK DOSYASINI SİL
					$this -> cache -> delete('site_settings_email');

					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/e-posta-ayarlari?editAction=true'));
				else:
					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/e-posta-ayarlari?editAction=true'));
				endif;
			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/settings_email', [
				'page'								=> $this -> _page('E-Posta Ayarları'),
				'get_settings_email'				=> $this -> Back_End_Model -> get_settings_email()
			]);
		}

		// AYARLAR MODÜLÜ - ÜRÜN AYARLARI
		private function _settings_product ()
		{
			// POST VAR İSE DEVAM ET
			if ($this -> input -> post()):
				// POSTTAN GELEN VERİLERİ AL
				$external_code 	 					= trim(str_replace('"', '\'', $_POST['external_code']));

				// HARİCİ KOD AYARLARINI DÜZENLE
				if ($this -> Back_End_Model -> edit_settings_external($external_code)):

					// ÖNBELLEK DOSYASINI SİL
					$this -> cache -> delete('site_settings');

					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/harici-kod-ayarlari?editAction=true'));
				else:
					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/harici-kod-ayarlari?editAction=true'));
				endif;
			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/settings_external', [
				'page'									=> $this -> _page('Ürün Ayarları'),
				'get_external_code_settings'			=> $this -> Back_End_Model -> get_external_code_settings()
			]);
		}

		// AYARLAR MODÜLÜ - HARİCİ KOD AYARLARI
		private function _settings_external ()
		{
			// POST VAR İSE DEVAM ET
			if ($this -> input -> post()):
				// POSTTAN GELEN VERİLERİ AL
				$external_code 	 					= trim(str_replace('"', '\'', $_POST['external_code']));

				// HARİCİ KOD AYARLARINI DÜZENLE
				if ($this -> Back_End_Model -> edit_settings_external($external_code)):

					// ÖNBELLEK DOSYASINI SİL
					$this -> cache -> delete('site_settings');

					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/harici-kod-ayarlari?editAction=true'));
				else:
					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/harici-kod-ayarlari?editAction=true'));
				endif;
			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/settings_external', [
				'page'									=> $this -> _page('Harici Kod Ayarları'),
				'get_external_code_settings'			=> $this -> Back_End_Model -> get_external_code_settings()
			]);
		}

		// AYARLAR MODÜLÜ - SİTE HARİTASI AYARLARI
		private function _settings_sitemap ()
		{
			// POST VAR İSE DEVAM ET
			if ($this -> input -> post()):
				// POSTTAN GELEN VERİLERİ AL
				$setting_list_product 					= $this -> input -> post('setting_list_product', TRUE);
				$setting_list_category 					= $this -> input -> post('setting_list_category', TRUE);
				$setting_list_page 						= $this -> input -> post('setting_list_page', TRUE);
				$setting_list_article 					= $this -> input -> post('setting_list_article', TRUE);
				$setting_list_service 					= $this -> input -> post('setting_list_service', TRUE);
				$setting_status 						= $this -> input -> post('setting_status', TRUE);

				// SİTE HARİTASI AYARLARINI DÜZENLE
				if ($this -> Back_End_Model -> edit_settings_sitemap([
					'setting_list_product'			=> $setting_list_product,
					'setting_list_category'			=> $setting_list_category,
					'setting_list_page'				=> $setting_list_page,
					'setting_list_article'			=> $setting_list_article,
					'setting_list_service'			=> $setting_list_service,
					'setting_status'				=> $setting_status
				])):

					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/site-haritasi-ayarlari?editAction=true'));
				else:
					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/site-haritasi-ayarlari?editAction=false'));
				endif;
			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/settings_sitemap', [
				'page'							=> $this -> _page('Site Haritası Ayarları'),
				'get_sitemap_settings'			=> $this -> Back_End_Model -> get_sitemap_settings()
			]);
		}

		// AYARLAR MODÜLÜ - TEST MAIL
		private function _settings_test_email ()
		{		 
			// POSTTAN GELEN VERİYİ AL
			$email_address 										= $this -> input -> post('test_mail');

			// E-POSTA AYARLARINI ÇEK
			$get_settings_email 								= $this -> Back_End_Model -> get_settings_email();

			// KÜTÜPHANEYİ YÜKLE
			$this -> load -> library('email', [
				'protocol' 			=> $get_settings_email -> email_setting_protocol,
				'smtp_host' 		=> $get_settings_email -> email_setting_smtp_host,
				'smtp_port'			=> $get_settings_email -> email_setting_smtp_port,
				'smtp_user'			=> $get_settings_email -> email_setting_smtp_user,
				'smtp_pass' 		=> $get_settings_email -> email_setting_password,
				'smtp_crypto' 		=> $get_settings_email -> email_setting_crypto,
				'charset' 			=> 'utf-8',
				'mailtype' 			=> 'html',
				'wordwrap' 			=> true,
				'newline' 			=> '\r\n'
			]);

			$this -> email -> set_header('MIME-Version', '1.0; charset=utf-8');
			$this -> email -> set_header('Content-type', 'text/html');
			$this -> email -> from($get_settings_email -> email_setting_smtp_user, $get_settings_email -> email_setting_name_surname);
			$this -> email -> to($email_address);
			$this -> email -> subject('Sınama E-Postası');

			// MAİL İÇERİĞİ
			$content 					= '<p style="font-size: 13px">Bu bir sınama e-postasıdır.</p>';
			$content 					.= '<p style="font-size: 13px">E-posta ayarlarınızın doğru yapılandırıldığını gösterir. </p>';
			$content 					.= '<hr style="border: none; border-bottom: solid 1px rgba(0,0,0,0.1)"> <span style="color: #999999; font-size: 12px;">powered by Mutfak Yapım</span>';

			$this -> email -> message($content);

			// MAİLİ GONDER
			if ($this -> email -> send()):
				echo 'ok';
			else:
				echo 'error';
			endif;
		}



		// MENÜ MODÜLÜ
		private function _menu_management ($sub_module_name = null, $module_arg = null)
		{
			switch ($sub_module_name):
				case self::uri['menus']['list_menu']:
					$this -> _menu_management_list_menu();
					break;

				case self::uri['menus']['add_menu']:
					$this -> _menu_management_add_menu();
					break;

				case self::uri['menus']['delete_menu']:
					$this -> _menu_management_delete_menu($module_arg);
					break;

				case self::uri['menus']['edit_menu']:
					$this -> _menu_management_edit_menu($module_arg);
					break;

				case self::uri['menus']['search_menu']:
					$this -> _menu_management_search_menu();
					break;

				case self::uri['menus']['rank_menu']:
					$this -> _menu_management_rank_menu();
					break;
				
				default:
					$this -> _error();
			endswitch;
		}

		// MENÜ MODÜLÜ - MENÜ LİSTELE
		private function _menu_management_list_menu ()
		{
			// MENÜLERİ ÇEK
			$get_menus = $this -> Back_End_Model -> get_menus();

			// LİNKLERİ BELİRLE
			foreach ($get_menus as $menu_key => $menu_value):
				if ($menu_value -> menu_type == 1)
					$get_menus[$menu_key] -> menu_link = '/'.$menu_value -> menu_link_page;
				else
					$get_menus[$menu_key] -> menu_link = $menu_value -> menu_link_url;
			endforeach;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/menus_menu_list', [
				'page'					=> $this -> _page('Eklenen Menüler'),
				'get_menus'				=> $get_menus
			]);
		}

		// MENÜ MODÜLÜ - MENÜ EKLE
		private function _menu_management_add_menu ()
		{
			if ($this -> input -> post()):

				// POSTTAN GELEN VERİLERİ AL
				$menu_add_name 						= $this -> input -> post('menu_add_name', TRUE);
				$menu_add_top_menu 					= $this -> input -> post('menu_add_top_menu', TRUE);
				$menu_add_type 						= $this -> input -> post('menu_add_type', TRUE);
				$menu_add_link_page 				= $this -> input -> post('menu_add_link_page', TRUE);
				$menu_add_link_url 					= $this -> input -> post('menu_add_link_url', TRUE);
				$menu_add_target 					= $this -> input -> post('menu_add_target', TRUE);
				$menu_add_status 					= $this -> input -> post('menu_add_status', TRUE);

				// MENÜ EKLE
				if ($this -> Back_End_Model -> add_menu([
					'menu_add_name'					=> $menu_add_name,
					'menu_add_top_menu'				=> $menu_add_top_menu,
					'menu_add_type'					=> $menu_add_type,
					'menu_add_link_page'			=> $menu_add_link_page,
					'menu_add_link_url'				=> $menu_add_link_url,
					'menu_add_target'				=> $menu_add_target,
					'menu_add_status'				=> $menu_add_status,
					'create_time'					=> time()
				])):

					// ÖNBELLEK VERİSİNİ SİL
					$this -> cache -> delete('site_menus');

					// YÖNLENDİR
					redirect(base_url(uri_string().'?addAction=true'));
				endif;
			endif;


			// SAYFALARI ÇEK
			$get_menu_pages 				= $this -> Back_End_Model -> get_menu_pages();

			// ÜRÜN KATEGORİLERİNİ ÇEK
			$get_menu_product_categories 			= $this -> Back_End_Model -> get_menu_product_categories();

			// ÜRÜNLERİ ÇEK
			$get_menu_products 				= $this -> Back_End_Model -> get_menu_products();

			// MAKALELERİ ÇEK
			$get_menu_blogs 				= $this -> Back_End_Model -> get_menu_blogs();
			
			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/menus_menu_add', [
				'page'									=> $this -> _page('Menü Ekle'),
				'get_menus'								=> $this -> Back_End_Model -> get_menus(),
				'get_menu_pages'						=> $get_menu_pages,
				'get_menu_product_categories'			=> $get_menu_product_categories,
				'get_menu_products'						=> $get_menu_products,
				'get_menu_blogs'						=> $get_menu_blogs,
			]);
		}

		// MENÜ MODÜLÜ - MENÜ DÜZENLE
		private function _menu_management_edit_menu ($module_arg)
		{
			if ($module_arg):

				// GETTEN GELEN VERİLERİ
				$id 				= trim(addslashes(strip_tags($module_arg)));

				// MENÜYÜ ÇEK
				$get_menu 			= $this -> Back_End_Model -> get_menu($id);

				if (!empty($get_menu)):

					if ($this -> input -> post()):
						// POSTTAN GELEN VERİLERİ AL
						$menu_edit_name 					= $this -> input -> post('menu_edit_name', TRUE);
						$menu_edit_top_menu 				= $this -> input -> post('menu_edit_top_menu', TRUE);
						$menu_edit_type 					= $this -> input -> post('menu_edit_type', TRUE);
						$menu_edit_link_page 				= $this -> input -> post('menu_edit_link_page', TRUE);
						$menu_edit_link_url 				= $this -> input -> post('menu_edit_link_url', TRUE);
						$menu_edit_target 					= $this -> input -> post('menu_edit_target', TRUE);
						$menu_edit_status 					= $this -> input -> post('menu_edit_status', TRUE);

						// MENÜYÜ GÜNCELLE
						if ($this -> Back_End_Model -> edit_menu([
							'menu_edit_name'				=> $menu_edit_name,
							'menu_edit_top_menu'			=> $menu_edit_top_menu,
							'menu_edit_type'				=> $menu_edit_type,
							'menu_edit_link_page'			=> $menu_edit_link_page,
							'menu_edit_link_url'			=> $menu_edit_link_url,
							'menu_edit_target'				=> $menu_edit_target,
							'menu_edit_status'				=> $menu_edit_status,
							'edit_time'						=> time(),
							'menu_id'						=> $id
						])):

							// ÖNBELLEK VERİSİNİ SİL
							$this -> cache -> delete('site_menus');

							// YÖNLENDİR
							redirect(base_url(uri_string().'?editAction=true'));
						endif;
					endif;

					// SAYFALARI ÇEK
					$get_menu_pages 						= $this -> Back_End_Model -> get_menu_pages();

					// ÜRÜN KATEGORİLERİNİ ÇEK
					$get_menu_product_categories 			= $this -> Back_End_Model -> get_menu_product_categories();

					// ÜRÜNLERİ ÇEK
					$get_menu_products 						= $this -> Back_End_Model -> get_menu_products();

					// MAKALELERİ ÇEK
					$get_menu_blogs 						= $this -> Back_End_Model -> get_menu_blogs();

					if ($get_menu -> menu_type == 1)
						$get_menu -> menu_link = base_url($get_menu -> menu_link_page);
					else
						$get_menu -> menu_link = $get_menu -> menu_link_url;
					

					// VIEW SAYFASINI YÜKLE
					$this -> _render('back_end/menus_menu_edit', [
						'page'							=> $this -> _page('Menü Düzenle'),
						'get_menus'						=> $this -> Back_End_Model -> get_menus(),
						'get_menu'						=> $get_menu,
						'get_menu_pages'				=> $get_menu_pages,
						'get_menu_product_categories'	=> $get_menu_product_categories,
						'get_menu_products'				=> $get_menu_products,
						'get_menu_blogs'				=> $get_menu_blogs,
					]);
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Böyle bir veri bulunamadı!');
				endif;

			else:
				$this -> _error();
			endif;
		}

		// MENÜ MODÜLÜ - MENÜ SİL
		private function _menu_management_delete_menu ($module_arg)
		{
			if ($module_arg):

				// GETTEN GELEN VERİLERİ
				$id 						= trim(addslashes(strip_tags($module_arg)));

				// MÜNÜYÜ ÇEK
				$get_menu 					= $this -> Back_End_Model -> get_menu($id);

				if (!empty($get_menu)):
					// MENÜYÜ SİL
					$this -> Back_End_Model -> delete_menu($id);

					// ÖNBELLEK VERİSİNİ SİL
					$this -> cache -> delete('site_menus');

					// YÖNLENDİR
					redirect(base_url(self::uri['base_url'].'/'.self::uri['menus']['menus_settings'].'/'.self::uri['menus']['list_menu'].'?deleteAction=true'));
			
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Böyle bir veri bulunamadı!');
				endif;
			else:
				$this -> _error();
			endif;
		}

		// MENÜ MODÜLÜ - MENÜ SIRALA
		private function _menu_management_rank_menu ()
		{
			sleep(1);

			// POSTTAN GELEN VERİYİ AL
			$rank 						= $this -> input -> post('rank');

			foreach ($rank as $key => $value):
				// SIRALAMAYI DÜZENLE
				if ($this -> Back_End_Model -> edit_menu_rank([
					'menu_id'		=> $value,
					'rank'			=> $key
				])):
					// ÖNBELLEK VERİSİNİ SİL
					$this -> cache -> delete('site_menus');
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error();
				endif;
			endforeach;


			return;
		}

		// MENÜ MODÜLÜ - MENÜ ARA
		private function _menu_management_search_menu ()
		{
			// GETTEN GELEN VERİYİ AL
			$key 					= trim(addslashes(strip_tags($this -> input -> get('kelime'))));

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/menus_menu_search', [
				'page'						=> $this -> _page('"'.$key.'" için arama sonuçları'),
				'get_search_menus'			=> $this -> Back_End_Model -> get_search_menus($key),
				'key'						=> $key,
			]);
		}



		// SAYFA MODÜLÜ
		private function _page_management ($sub_module_name = null, $module_arg = null)
		{
			switch ($sub_module_name):
				case self::uri['pages']['list_page']:
					$this -> _page_management_list_page();
					break;

				case self::uri['pages']['add_page']:
					$this -> _page_management_add_page();
					break;

				case self::uri['pages']['delete_page']:
					$this -> _page_management_delete_page($module_arg);
					break;

				case self::uri['pages']['edit_page']:
					$this -> _page_management_edit_page($module_arg);
					break;
				
				default:
					$this -> _page_management_search_page();
			endswitch;
		}

		// SAYFA MODÜLÜ - SAYFA LİSTELE
		private function _page_management_list_page ()
		{
			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/pages_page_list', [
				'page'						=> $this -> _page('Eklenen Sayfalar'),
				'get_pages'					=> $this -> Back_End_Model -> get_pages()
			]);
		}

		// SAYFA MODÜLÜ - SAYFA EKLE
		private function _page_management_add_page ()
		{
			if ($this -> input -> post()):
				// POSTTAN GELEN VERİLERİ AL
				$page_add_name 						= $this -> input -> post('page_add_name', TRUE);
				$page_add_keyword 					= $this -> input -> post('page_add_keyword', TRUE);
				$page_add_description 				= $this -> input -> post('page_add_description', TRUE);
				$page_add_group 					= $this -> input -> post('page_add_group', TRUE);
				$page_add_template 					= $this -> input -> post('page_add_template', TRUE);
				$page_add_content 					= str_replace('"', '\'', $this -> input -> post('page_add_content', TRUE));
				$page_add_status 					= $this -> input -> post('page_add_status', TRUE);

				// MODEL SAYFASINA GÖNDERİLECEK VERİLER
				$model_data =
				[
					'page_add_name'					=> $page_add_name,
					'page_add_url'					=> seo($page_add_name),
					'page_add_keyword'				=> $page_add_keyword,
					'page_add_description'			=> $page_add_description,
					'page_add_group'				=> $page_add_group,
					'page_add_template'				=> $page_add_template,
					'page_add_content'				=> $page_add_content,
					'page_add_status'				=> $page_add_status,
					'page_view_count'				=> 0,
					'create_time'					=> time()
				];

				// SAYFA URL ADRESLERİNİ KONTROL ET
				if (count($this -> Back_End_Model -> get_single_page_url($model_data['page_add_url'])) > 0):
					$model_data['page_add_url'] = $model_data['page_add_url'].'-'.substr(md5(time()), 0, 6);
				endif;

				// SAYFA EKLE
				if ($this -> Back_End_Model -> add_page($model_data)):
					redirect(base_url(uri_string().'?addAction=true'));
				else:
					$this -> _error();

				endif;
			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/pages_page_add', [
				'page'							=> $this -> _page('Sayfa Ekle'),
				'get_page_groups'				=> $this -> Back_End_Model -> get_page_groups(),
				'get_page_templates'			=> $this -> Back_End_Model -> get_page_templates(),
			]);
		}

		// SAYFA MODÜLÜ - SAYFA DÜZENLE
		private function _page_management_edit_page ($module_arg)
		{
			if ($module_arg):
				// GETTEN GELEN VERİLERİ
				$id 				= trim(addslashes(strip_tags($module_arg)));
				
				// SAYFAYI ÇEK
				$get_page 			= $this -> Back_End_Model -> get_page($id);

				if (!empty($get_page)):

					if ($this -> input -> post()):
						// POSTTAN GELEN VERİLERİ AL
						$page_edit_name 					= $this -> input -> post('page_edit_name', TRUE);
						$page_edit_keyword 					= $this -> input -> post('page_edit_keyword', TRUE);
						$page_edit_description 				= $this -> input -> post('page_edit_description', TRUE);
						$page_edit_text 					= str_replace('"', '\'', $this -> input -> post('page_edit_text', TRUE));
						$page_edit_group 					= $this -> input -> post('page_edit_group', TRUE);
						$page_edit_template 				= $this -> input -> post('page_edit_template', TRUE);
						$page_edit_status 					= $this -> input -> post('page_edit_status', TRUE);

						// MODEL SAYFASINA GÖNDERİLECEK VERİLER
						$model_data =
						[
							'page_edit_name'				=> $page_edit_name,
							'page_edit_url'					=> seo($page_edit_name),
							'page_edit_keyword'				=> $page_edit_keyword,
							'page_edit_description'			=> $page_edit_description,
							'page_edit_text'				=> $page_edit_text,
							'page_edit_group'				=> $page_edit_group,
							'page_edit_template'			=> $page_edit_template,
							'page_edit_status'				=> $page_edit_status,
							'edit_time'						=> time(),
							'page_edit_page_id'				=> $id
						];

						// SAYFA URL ADRESLERİNİ KONTROL ET
						if (count($this -> Back_End_Model -> get_page_url($model_data['page_edit_url'], $id)) > 0):
							$model_data['page_edit_url'] = $model_data['page_edit_url'].'-'.substr(md5(time()), 0, 6);
						endif;

						// SAYFAYI GÜNCELLE
						if ($this -> Back_End_Model -> edit_page($model_data)):
							redirect(base_url('panel/sayfaler/eklenen-sayfalar?editAction=true'));
						else:
							redirect(base_url('panel/sayfaler/eklenen-sayfalar?editAction=false'));
						endif;
					endif;

					// VIEW SAYFASINI YÜKLE
					$this -> _render('back_end/pages_page_edit', [
						'page'							=> $this -> _page('Sayfa Düzenle'),
						'get_page'						=> $get_page,
						'get_page_groups'				=> $this -> Back_End_Model -> get_page_groups(),
						'get_page_templates'			=> $this -> Back_End_Model -> get_page_templates()
					]);
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Böyle bir veri bulunamadı!');
				endif;
			else:
				$this -> _error();
			endif;
		}

		// SAYFA MODÜLÜ - SAYFA SİL
		private function _page_management_delete_page ($module_arg)
		{
			if ($module_arg):
				// GETTEN GELEN VERİLERİ
				$id 						= trim(addslashes(strip_tags($module_arg)));

				// SAYFAYI ÇEK
				$get_page 					= $this -> Back_End_Model -> get_page($id);

				if (!empty($get_page)):

					// SAYFAYI SİL
					$this -> Back_End_Model -> delete_page($id);
					
					// YÖNLENDİR
					redirect(base_url(self::uri['base_url'].'/'.self::uri['pages']['page_settings'].'/'.self::uri['pages']['list_page'].'?deleteAction=true'));

				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Böyle bir veri bulunamadı!');
				endif;
			else:
				$this -> _error();
			endif;
		}

		// SAYFA MODÜLÜ - SAYFA ARA
		private function _page_management_search_page ()
		{
			// GETTEN GELEN VERİYİ AL
			$key 										= trim(addslashes(strip_tags($this -> input -> get('kelime'))));

			if ($key):
				// VIEW SAYFASINI YÜKLE
				$this -> _render('back_end/pages_page_search', [
					'page'								=> $this -> _page('"'.$key.'" için arama sonuçları'),
					'get_search_pages'					=> $this -> Back_End_Model -> get_search_pages($key),
					'key'								=> $key
				]);
			else:
				$this -> _error();
			endif;
		}

		// KATEGORİ MODÜLÜ - SAYFA LİSTELE
		private function _category_management ($sub_module_name = null, $module_arg = null)
		{
			switch ($sub_module_name):
				case self::uri['categories']['list_category']:
					$this -> _category_management_list_category();
					break;

				case self::uri['categories']['add_category']:
					$this -> _category_management_add_category();
					break;

				case self::uri['categories']['delete_category']:
					$this -> _category_management_delete_category ($module_arg);
					break;

				case self::uri['categories']['edit_category']:
					$this -> _category_management_edit_category ($module_arg);
					break;
				
				default:
					$this -> _error();
			endswitch;
		}

		// KATEGORİ MODÜLÜ
		private function _category_management_list_category ()
		{	
			// KATEGORİLERİ ÇEK
			$get_categories = $this -> Back_End_Model -> get_categories();

			// LİNKi BELİRLE
			foreach ($get_categories as $category_key => $category_value):
				$get_categories[$category_key] -> category_link = '/k/'.$category_value -> category_url;
			endforeach;

			// KAPAK FOTOĞRAFI BELİRLE
			foreach ($get_categories as $key => $category):
				$get_categories[$key] -> category_photo = base_url(self::upload_category_cover_photo.$category -> category_cover_photo);
			endforeach;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/categories_category_list', [
				'page'							=> $this -> _page('Eklenen Kategoriler'),
				'get_categories'				=> $get_categories
			]);
		}

		// KATEGORİ MODÜLÜ - KATEGORİ EKLE
		private function _category_management_add_category ()
		{
			if ($this -> input -> post()):
				// POSTTAN GELEN VERİLERİ AL
				$category_add_name 						= $this -> input -> post('category_add_name', TRUE);
				$category_add_keyword 					= $this -> input -> post('category_add_keyword', TRUE);
				$category_add_description 				= $this -> input -> post('category_add_description', TRUE);
				$category_add_top_category 				= $this -> input -> post('category_add_top_category', TRUE);
				$category_add_text 						= $this -> input -> post('category_add_text', TRUE);
				$category_add_status 					= $this -> input -> post('category_add_status', TRUE);

				// MODEL SAYFASINA GÖNDERİLECEK VERİLER
				$model_data =
				[
					'category_add_name'							=> $category_add_name,
					'category_add_url'							=> seo($category_add_name),
					'category_add_keyword'						=> $category_add_keyword,
					'category_add_description'					=> $category_add_description,
					'category_add_top_category'					=> $category_add_top_category,
					'category_add_text'							=> $category_add_text,
					'category_add_status'						=> $category_add_status,
					'create_time'								=> time(),
				];

				// KATEGORİ URL ADRESİ VERİTABANINDA KAYITLI MI KONTRO LET
				if ($this -> Back_End_Model -> check_category_url(seo($category_add_name)) < 1):
					if ($category_id = $this -> Back_End_Model -> add_category($model_data)):

						// YENİ FOTOĞRAF İSMİ
						$new_file_name 								= $model_data['category_add_url'].'-'.rand(10000,999999);

						@$this -> verot_net -> upload($_FILES['category_add_cover_photo']['tmp_name']);
						// FOTOĞRAFLARI YÜKLE
						if ($this -> verot_net -> uploaded):
							$this -> verot_net -> allowed 					= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
							$this -> verot_net -> file_new_name_body  		= $new_file_name;
							$this -> verot_net -> jpeg_quality 				= 80;
							$this -> verot_net -> image_convert 			= 'png';
							$this -> verot_net -> process(self::upload_category_cover_photo);

							if ($this -> verot_net -> processed):
								// FOTOĞRAFI KAYDET
								$this -> Back_End_Model -> add_category_edit_photo([
									'photo_name' 			=> $new_file_name.'.png',
		                    		'category_id' 			=> $category_id
								]);
							else:
								// VIEW SAYFASINI YÜKLE
								$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
							endif;
						endif;

						if ($_FILES['category_add_slider_photos']['tmp_name']):
							foreach ($_FILES['category_add_slider_photos']['tmp_name'] as $value):
								// YENİ FOTOĞRAF İSMİ
								$new_file_name 								= $model_data['category_add_url'].'-'.rand(10000,999999);

								@$this -> verot_net -> upload($value);
								// FOTOĞRAFLARI YÜKLE
								if ($this -> verot_net -> uploaded):
									$this -> verot_net -> allowed 					= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
									$this -> verot_net -> file_new_name_body  		= $new_file_name;
									$this -> verot_net -> jpeg_quality 				= 80;
									$this -> verot_net -> image_convert 			= 'jpg';
									$this -> verot_net -> process(self::upload_category_slider_photo);

									if ($this -> verot_net -> processed):
										// FOTOĞRAFI KAYDET
										$this -> Back_End_Model -> add_category_slider_photo([
											'photo_name' 			=> $new_file_name.'.jpg',
				                    		'category_id' 			=> $category_id
										]);
									else:
										// VIEW SAYFASINI YÜKLE
										$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
									endif;
								endif;
							endforeach;
						endif;
						
						// ÖNBELLEK DOSYASINI SİL
						$this -> cache -> delete('site_categories');

						// YÖNLENDİR
						redirect(base_url(uri_string().'?addAction=true'));
					else:
						// VIEW SAYFASINI YÜKLE
						$this -> _error('HATA', 'Kategori güncelleme işlemi yapılırken Bir hata oluştu!');
					endif;
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Bu kategori adı başka bir kategori tarafından kullanılıyor!');
				endif;
			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/categories_category_add', [
				'page'							=> $this -> _page('Kategori Ekle'),
				'get_categories'				=> $this -> Back_End_Model -> get_categories()
			]);
		}

		// KATEGORİ MODÜLÜ - KATEGORİ DÜZENLE
		private function _category_management_edit_category ($module_arg)
		{
			if ($module_arg):

				// GETTEN GELEN CERİLERİ AL
				$id 						= trim(addslashes(strip_tags($module_arg)));

				// KATEGORİYİ ÇEK
				$get_category 				= $this -> Back_End_Model -> get_category($id);

				if (!empty($get_category)):

					if ($this -> input -> post()):
						// POSTTAN GELEN VERİLERİ AL
						$category_edit_name 				= $this -> input -> post('category_edit_name', TRUE);
						$category_edit_top_category 		= $this -> input -> post('category_edit_top_category', TRUE);
						$category_edit_keyword 				= $this -> input -> post('category_edit_keyword', TRUE);
						$category_edit_description 			= $this -> input -> post('category_edit_description', TRUE);
						$category_edit_text 				= $this -> input -> post('category_edit_text', TRUE);
						$category_edit_status 				= $this -> input -> post('category_edit_status', TRUE);

						// MODEL SAYFASINA GÖNDERİLECEK VERİLER
						$check_model_data =
						[
							'category_edit_url'						=> seo($category_edit_name),
							'category_id'							=> $id
						];

						if ($this -> Back_End_Model -> check_edit_category_url($check_model_data) < 1):

							// KATEGORİYİ DÜZENLE
							if ($this -> Back_End_Model -> edit_category([
								'category_edit_name'					=> $category_edit_name,
								'category_edit_url'						=> seo($category_edit_name),
								'category_edit_top_category'			=> $category_edit_top_category,
								'category_edit_keyword'					=> $category_edit_keyword,
								'category_edit_description'				=> $category_edit_description,
								'category_edit_text'					=> $category_edit_text,
								'category_edit_status'					=> $category_edit_status,
								'category_id'							=> $id
							])):

								// YENİ FOTOĞRAF İSMİ
								$new_file_name 								= seo($category_edit_name).'-'.rand(10000,999999);

								@$this -> verot_net -> upload($_FILES['category_edit_cover_photo']['tmp_name']);
								// FOTOĞRAFLARI YÜKLE
								if ($this -> verot_net -> uploaded):
									$this -> verot_net -> allowed 					= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
									$this -> verot_net -> file_new_name_body  		= $new_file_name;
									$this -> verot_net -> jpeg_quality 				= 80;
									$this -> verot_net -> image_convert 			= 'png';
									$this -> verot_net -> process(self::upload_category_cover_photo);

									if ($this -> verot_net -> processed):

										// ESKİ FOTORĞAFI SİL
										unlink(self::upload_category_cover_photo.$get_category -> category_cover_photo);

										// FOTOĞRAFI KAYDET
										$this -> Back_End_Model -> add_category_edit_photo([
											'photo_name' 			=> $new_file_name.'.png',
				                    		'category_id' 			=> $id
										]);
									else:
										// VIEW SAYFASINI YÜKLE
										$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
									endif;
								endif;

								if ($_FILES['category_edit_slider_photos']['tmp_name']):
									foreach ($_FILES['category_edit_slider_photos']['tmp_name'] as $value)
									{
										// YENİ FOTOĞRAF İSMİ
										$new_file_name 				= seo($category_edit_name).'-'.rand(10000,999999);

										@$this -> verot_net -> upload($value);
										// FOTOĞRAFLARI YÜKLE
										if ($this -> verot_net -> uploaded):
											$this -> verot_net -> allowed 					= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
											$this -> verot_net -> file_new_name_body  		= $new_file_name;
											$this -> verot_net -> jpeg_quality 				= 80;
											$this -> verot_net -> image_convert 			= 'jpg';
											$this -> verot_net -> process('public/uploads/categories/sliders');

											if ($this -> verot_net -> processed):
												// FOTOĞRAFI KAYDET
												$this -> Back_End_Model -> add_category_slider_photo([
													'photo_name' 			=> $new_file_name.'.jpg',
						                    		'category_id' 				=> $id
												]);
											else:
												// VIEW SAYFASINI YÜKLE
												$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
												return;
											endif;
										endif;
									}
								endif;

								// ÖNBELLEK DOSYASINI SİL
								$this -> cache -> delete('site_categories');

								// YÖNLENDİR
								redirect(base_url(uri_string().'?editAction=true'));
							else:
								// VIEW SAYFASINI YÜKLE
								$this -> _error('HATA', 'Kategori güncelleme işlemi yapılırken Bir hata oluştu!');
							endif;
						else:
							// VIEW SAYFASINI YÜKLE
							$this -> _error('HATA', 'Bu kategori adı başka bir kategori tarafından kullanılıyor!');
							return;
						endif;

					endif;

					$get_category -> category_link = base_url('k/'.$get_category -> category_url);
					
					// VIEW SAYFASINI YÜKLE
					$this -> _render('back_end/categories_category_edit', [
						'page'										=> $this -> _page('Kategori Düzenle'),
						'get_category'								=> $get_category,
						'get_edit_categories'						=> $this -> Back_End_Model -> get_edit_categories($get_category -> category_id),
						'get_category_slider_photos'				=> $this -> Back_End_Model -> get_category_slider_photos($get_category -> category_id)
					]);
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Böyle bir kategori bulunamadı!');
				endif;
			else:
				$this -> _error();
			endif;
		}

		// KATEGORİ MODÜLÜ - KATEGORİ SİL
		private function _category_management_delete_category ($module_arg)
		{
			if ($module_arg):

				// GETTEN GELEN CERİLERİ AL
				$id 				= trim(addslashes(strip_tags($module_arg)));

				// KATEGORİYİ ÇEK
				$get_category 				= $this -> Back_End_Model -> get_category($id);

				if (!empty($get_category)):

					// KATEGORİNİN ALT KATEGORİ SAYISINI ÇEK
					$get_category_sub_category_count 	= $this -> Back_End_Model -> get_category_sub_category_count($get_category->category_id);
					
					if ($get_category_sub_category_count->Count == 0):

						// KATEGORİNİN İÇİNDEKİ ÜRÜN SAYISINI ÇEK
						if ($this -> Back_End_Model -> get_category_product_count($id)->Count == 0):
							// KATEGORİ SLAYT FOTOĞRAFLARINI ÇEK
							$get_category_slider_photos			= $this -> Back_End_Model -> get_category_slider_photos($id);

							 
							if (count($get_category_slider_photos)):

								foreach ($get_category_slider_photos as $value)
								{
						            // FOTOĞRAFLARI SİL
						            unlink(self::upload_category_slider_photo.$value -> category_slider_photo_name);

									// FOTOĞRAFI VERİTABANINDAN SİL
									$this -> Back_End_Model -> delete_category_slider_photo($value -> category_slider_photo_id);
								}
							endif;

							// KATEGORİ FOTOĞRAFINI SİL
				            unlink(self::upload_category_cover_photo.$get_category -> category_cover_photo);
							
							// KATEGORİYİ SİL
							if ($this -> Back_End_Model -> delete_category($id)):

								// ÖNBELLEK DOSYASINI SİL
								$this -> cache -> delete('site_categories');

								// YÖNLENDİR
								redirect(base_url(self::uri['base_url'].'/'.self::uri['categories']['category_settings'].'/'.self::uri['categories']['list_category'].'?deleteAction=true'));
							else:
								// VIEW SAYFASINI YÜKLE
								$this -> _error('HATA', 'Kategori silme işlemi yapılırken Bir hata oluştu!');
							endif;

						else:
							// VIEW SAYFASINI YÜKLE
							$this -> _error('HATA', 'İçinde ürün olan kategoriler silinemez!');
						endif;
						
					else:
						// VIEW SAYFASINI YÜKLE
						$this -> _error('HATA', 'Alt kategorisi olan kategoriler silinemez!');
					endif;

				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Böyle bir kategori bulunamadı!');
				endif;
			else:
				// VIEW SAYFASINI YÜKLE
				$this -> _error();
			endif;
		}

		// KATEGORİ MODÜLÜ - SLAYT FOTOĞRAFINI SİL
		private function _category_management_ajax_slider_photo_delete ()
		{
			// POSTTAN GELEN VERİLERİ AL
			$id = $this -> input -> post('id');
			$name = $this -> input -> post('name');

            // FOTOĞRAFLARI SİL
            unlink(self::upload_category_slider_photo.$name);

			// FOTOĞRAFI VERİTABANINDAN SİL
			$this -> Back_End_Model -> delete_category_slider_photo($id);
		}


		// ÜRÜN MODÜLÜ
		private function _product_management ($sub_module_name = null, $module_arg = null)
		{
			switch ($sub_module_name):
				case self::uri['products']['list_product']:
					$this -> _product_management_list_product();
					break;

				case self::uri['products']['add_product']:
					$this -> _product_management_add_product();
					break;

				case 'kategorideki-urunler':
					$this -> _product_management_product_category($module_arg);
					break;

				case self::uri['products']['delete_product']:
					$this -> _product_management_delete_product($module_arg);
					break;

				case self::uri['products']['new_product']:
					$this -> _product_management_new_product($module_arg);
					break;

				case self::uri['products']['discount_product']:
					$this -> _product_management_discount_product($module_arg);
					break;

				case self::uri['products']['best_selling_product']:
					$this -> _product_management_best_selling_product($module_arg);
					break;

				case self::uri['products']['suggested_product']:
					$this -> _product_management_suggested_product($module_arg);
					break;

				case self::uri['products']['edit_product']:
					$this -> _product_management_edit_product($module_arg);
					break;

				case 'urun-ara':
					$this -> _product_management_product_search();
					break;

				case 'urun-fotografi-sil':
					$this -> _product_management_delete_photo();
					break;

				default:
					$this -> _error();
			endswitch;
		}

		// ÜRÜN MODÜLÜ - ÜRÜN LİSTESİ METODU
		private function _product_management_list_product ()
		{
			// TÜM ÜRÜNLERİ ÇEK
			$get_product_count									= $this -> Back_End_Model -> get_product_count();

			// KÜTÜPHANEYE GÖNDERİLECEK VERİLER
			$pagination_config =
			[
				'base_url' 				=> base_url($this -> uri -> segment(1).'/'.$this -> uri -> segment(2).'/'.$this -> uri -> segment(3)),
				'total_rows' 			=> $get_product_count,
				'uri_segment' 			=> 4,
				'per_page' 				=> 60,
				'num_links' 			=> 7,
				'first_link' 			=> 'İlk',
				'last_link' 			=> 'Son',
			];

			// SAYFALAMA BAŞLANGIÇ AYARLARINI YAP
			$this -> pagination -> initialize($pagination_config);

			$get_products = $this -> Back_End_Model -> get_products([
				'per_page'					=> $pagination_config['per_page'],
				'uri_segment'				=> ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0,
			]);

			// KAPAK FOTOĞRAFI BELİRLE
			foreach ($get_products as $key => $product):
				$get_products[$key] -> product_photo = base_url(self::upload_product_photo_index_dir.$product -> product_cover_photo);
			endforeach;
			
			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/products_product_list', [
				'page'								=> $this -> _page('Eklenen Ürünler'),
				'get_products'						=> $get_products,
				'get_product_count'					=> $get_product_count,
				'pagination_link'					=> $this -> pagination -> create_links()
			]);
		}

		// ÜRÜN MODÜLÜ - YENİ ÜRÜN LİSTESİ METODU
		private function _product_management_new_product ()
		{
			// TÜM ÜRÜNLERİ ÇEK
			$get_new_product_count									= $this -> Back_End_Model -> get_new_product_count();

			// KÜTÜPHANEYE GÖNDERİLECEK VERİLER
			$pagination_config =
			[
				'base_url' 				=> base_url($this -> uri -> segment(1).'/'.$this -> uri -> segment(2).'/'.$this -> uri -> segment(3)),
				'total_rows' 			=> $get_new_product_count,
				'uri_segment' 			=> 4,
				'per_page' 				=> 60,
				'num_links' 			=> 7,
				'first_link' 			=> 'İlk',
				'last_link' 			=> 'Son',
			];

			// SAYFALAMA BAŞLANGIÇ AYARLARINI YAP
			$this -> pagination -> initialize($pagination_config);

			$get_new_products = $this -> Back_End_Model -> get_new_products([
				'per_page'					=> $pagination_config['per_page'],
				'uri_segment'				=> ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0,
			]);

			// KAPAK FOTOĞRAFI BELİRLE
			foreach ($get_new_products as $key => $product):
				$get_new_products[$key] -> product_photo = base_url(self::upload_product_photo_index_dir.$product -> product_cover_photo);
			endforeach;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/products_product_list', [
				'page'								=> $this -> _page('Yeni Ürünler'),
				'get_products'						=> $get_new_products,
				'get_product_count'					=> $get_new_product_count,
				'pagination_link'					=> $this -> pagination -> create_links()
			]);
		}

		// ÜRÜN MODÜLÜ - İNDİRİMLİ ÜRÜN LİSTESİ METODU
		private function _product_management_discount_product ()
		{
			// TÜM ÜRÜNLERİ ÇEK
			$get_discount_product_count									= $this -> Back_End_Model -> get_discount_product_count();

			// KÜTÜPHANEYE GÖNDERİLECEK VERİLER
			$pagination_config =
			[
				'base_url' 				=> base_url($this -> uri -> segment(1).'/'.$this -> uri -> segment(2).'/'.$this -> uri -> segment(3)),
				'total_rows' 			=> $get_discount_product_count,
				'uri_segment' 			=> 4,
				'per_page' 				=> 60,
				'num_links' 			=> 7,
				'first_link' 			=> 'İlk',
				'last_link' 			=> 'Son',
			];

			// SAYFALAMA BAŞLANGIÇ AYARLARINI YAP
			$this -> pagination -> initialize($pagination_config);

			$get_discount_products = $this -> Back_End_Model -> get_discount_products([
				'per_page'					=> $pagination_config['per_page'],
				'uri_segment'				=> ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0,
			]);

			// KAPAK FOTOĞRAFI BELİRLE
			foreach ($get_discount_products as $key => $product):
				$get_discount_products[$key] -> product_photo = base_url(self::upload_product_photo_index_dir.$product -> product_cover_photo);
			endforeach;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/products_product_list', [
				'page'								=> $this -> _page('İndirimli Ürünler'),
				'get_products'						=> $get_discount_products,
				'get_product_count'					=> $get_discount_product_count,
				'pagination_link'					=> $this -> pagination -> create_links()
			]);
		}

		// ÜRÜN MODÜLÜ - ÇOK SATAN ÜRÜN LİSTESİ METODU
		private function _product_management_best_selling_product ()
		{
			// TÜM ÜRÜNLERİ ÇEK
			$get_best_selling_product_count									= $this -> Back_End_Model -> get_best_selling_product_count();

			// KÜTÜPHANEYE GÖNDERİLECEK VERİLER
			$pagination_config =
			[
				'base_url' 				=> base_url($this -> uri -> segment(1).'/'.$this -> uri -> segment(2).'/'.$this -> uri -> segment(3)),
				'total_rows' 			=> $get_best_selling_product_count,
				'uri_segment' 			=> 4,
				'per_page' 				=> 60,
				'num_links' 			=> 7,
				'first_link' 			=> 'İlk',
				'last_link' 			=> 'Son',
			];

			// SAYFALAMA BAŞLANGIÇ AYARLARINI YAP
			$this -> pagination -> initialize($pagination_config);

			$get_best_selling_products = $this -> Back_End_Model -> get_best_selling_products([
				'per_page'					=> $pagination_config['per_page'],
				'uri_segment'				=> ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0,
			]);

			// KAPAK FOTOĞRAFI BELİRLE
			foreach ($get_best_selling_products as $key => $product):
				$get_best_selling_products[$key] -> product_photo = base_url(self::upload_product_photo_index_dir.$product -> product_cover_photo);
			endforeach;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/products_product_list', [
				'page'								=> $this -> _page('Çok Satan Ürünler'),
				'get_products'						=> $get_best_selling_products,
				'get_product_count'					=> $get_best_selling_product_count,
				'pagination_link'					=> $this -> pagination -> create_links()
			]);
		}
			
		// ÜRÜN MODÜLÜ - ÖNERİLEN ÜRÜN LİSTESİ METODU
		private function _product_management_suggested_product ()
		{
			// TÜM ÜRÜNLERİ ÇEK
			$get_best_selling_product_count									= $this -> Back_End_Model -> get_best_selling_product_count();

			// KÜTÜPHANEYE GÖNDERİLECEK VERİLER
			$pagination_config =
			[
				'base_url' 				=> base_url($this -> uri -> segment(1).'/'.$this -> uri -> segment(2).'/'.$this -> uri -> segment(3)),
				'total_rows' 			=> $get_best_selling_product_count,
				'uri_segment' 			=> 4,
				'per_page' 				=> 60,
				'num_links' 			=> 7,
				'first_link' 			=> 'İlk',
				'last_link' 			=> 'Son',
			];

			// SAYFALAMA BAŞLANGIÇ AYARLARINI YAP
			$this -> pagination -> initialize($pagination_config);

			$get_best_selling_products = $this -> Back_End_Model -> get_best_selling_products([
				'per_page'					=> $pagination_config['per_page'],
				'uri_segment'				=> ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0,
			]);

			// KAPAK FOTOĞRAFI BELİRLE
			foreach ($get_best_selling_products as $key => $product):
				$get_best_selling_products[$key] -> product_photo = base_url(self::upload_product_photo_index_dir.$product -> product_cover_photo);
			endforeach;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/products_product_list', [
				'page'								=> $this -> _page('Önerilen Ürünler'),
				'get_products'						=> $get_best_selling_products,
				'get_product_count'					=> $get_best_selling_product_count,
				'pagination_link'					=> $this -> pagination -> create_links()
			]);
		}

		// ÜRÜN MODÜLÜ - KATEGORİDEKİ ÜRÜNLERİ LİSTELE
		private function _product_management_product_category ($module_arg)
		{
			// GETTEN GELEN VERİYİ AL
			$id 														= trim(addslashes(strip_tags($module_arg)));

			// KATEGORİYİ ÇEK
			$get_category 												= $this -> Back_End_Model -> get_category($id);

			if (count($get_category) > 0):

				// VIEW SAYFASINI YÜKLE
				$this -> _render('back_end/products_product_category_list', [
					'page'									=> $this -> _page($get_category->category_name),
					'get_category_products'					=> $this -> Back_End_Model -> get_category_products($id),
				]);
			else:
				// VIEW SAYFASINI YÜKLE
				$this -> _error('HATA', 'Böyle bir kategori bulunamadı!');
			endif;
		}

		// ÜRÜN MODÜLÜ - ÜRÜN ARA
		private function _product_management_product_search ()
		{
			// POSTTAN GELEN VERİLERİ AL
			$key 								= trim(addslashes(strip_tags(($this -> input -> get('kelime')))));

			if ($key):
				// VIEW SAYFASINI YÜKLE
				$this -> _render('back_end/products_product_search', [
					'page'								=> $this -> _page('"'.$key.'" için arama sonuçları'),
					'get_search_products'				=> $this -> Back_End_Model -> get_search_products($key),
					'key'								=> $key,
				]);
			else:
				$this -> _error();
			endif;			
		}

		// ÜRÜN MODÜLÜ - ÜRÜN EKLE
		private function _product_management_add_product ()
		{
			if ($this -> input -> post()):

				// POSTTAN GELEN VERİLERİ AL
				$product_add_name    							= trim(addslashes(strip_tags($this -> input -> post('product_add_name', TRUE))));
				$product_add_code    							= trim(addslashes(strip_tags($this -> input -> post('product_add_code', TRUE))));
				$product_add_notes    							= trim(addslashes(strip_tags($this -> input -> post('product_add_notes', TRUE))));
				$product_add_category    						= trim(addslashes(strip_tags($this -> input -> post('product_add_category', TRUE))));
				$product_add_keyword    						= trim(addslashes(strip_tags($this -> input -> post('product_add_keyword', TRUE))));
				$product_add_description    					= trim(addslashes(strip_tags($this -> input -> post('product_add_description', TRUE))));
				$product_add_price    							= trim(addslashes(strip_tags($this -> input -> post('product_add_price', TRUE))));
				$product_add_discount_price    					= trim(addslashes(strip_tags($this -> input -> post('product_add_discount_price', TRUE))));
				$product_add_quota    							= trim(addslashes(strip_tags($this -> input -> post('product_add_quota', TRUE))));
				$product_add_stock    							= trim(addslashes(strip_tags($this -> input -> post('product_add_stock', TRUE))));
				$product_add_delivery_time    					= trim(addslashes(strip_tags($this -> input -> post('product_add_delivery_time', TRUE))));
				$product_add_warranty_time    					= trim(addslashes(strip_tags($this -> input -> post('product_add_warranty_time', TRUE))));
				$product_add_size    							= trim(addslashes(strip_tags($this -> input -> post('product_add_size', TRUE))));
				$product_add_color    							= trim(addslashes(strip_tags($this -> input -> post('product_add_color', TRUE))));
				$product_add_part    							= trim(addslashes(strip_tags($this -> input -> post('product_add_part', TRUE))));
				$product_add_material    						= trim(addslashes(strip_tags($this -> input -> post('product_add_material', TRUE))));
				$product_add_brand    							= trim(addslashes(strip_tags($this -> input -> post('product_add_brand', TRUE))));
				$product_add_text    							= str_replace('"', '\'', $this -> input -> post('product_add_text', TRUE));
				$product_add_status    							= trim(addslashes(strip_tags($this -> input -> post('product_add_status', TRUE))));
				$product_add_new    							= trim(addslashes(strip_tags($this -> input -> post('product_add_new', TRUE))));
				$product_add_discount    						= trim(addslashes(strip_tags($this -> input -> post('product_add_discount', TRUE))));
				$product_add_best_selling    					= trim(addslashes(strip_tags($this -> input -> post('product_add_best_selling', TRUE))));
				$product_add_suggested    						= trim(addslashes(strip_tags($this -> input -> post('product_add_suggested', TRUE))));

				$photo_code 									= substr(md5(time()), 0, 10);

				$photo_name 									= seo($product_add_name).'-'.rand(10000,999999);

				if ($_FILES['product_add_photos']['name']):

					foreach ($_FILES['product_add_photos']['tmp_name'] as $value):
	                	@$this -> verot_net -> upload($value);
						// FOTOĞRAFLARI YÜKLE
						if ($this -> verot_net -> uploaded):
							$this -> verot_net -> allowed 						= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
							$this -> verot_net -> file_new_name_body  			= $photo_name;
							$this -> verot_net -> image_resize					= true;
							$this -> verot_net -> image_y 						= 700;
							$this -> verot_net -> image_ratio_x 				= true;
							$this -> verot_net -> jpeg_quality 					= 80;
							$this -> verot_net -> image_convert 				= 'jpg';
							$this -> verot_net -> process('public/uploads/products/large');

							$this -> verot_net -> allowed 						= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
							$this -> verot_net -> file_new_name_body  			= $photo_name;
							$this -> verot_net -> image_resize 					= true;
							$this -> verot_net -> image_ratio_crop 				= true;
							$this -> verot_net -> image_x 						= 650;
							$this -> verot_net -> image_y 						= 366;
							$this -> verot_net -> jpeg_quality 					= 80;
							$this -> verot_net -> image_convert 				= 'jpg';
							$this -> verot_net -> process('public/uploads/products/medium');
	
							$this -> verot_net -> allowed 						= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
							$this -> verot_net -> file_new_name_body  			= $photo_name;
							$this -> verot_net -> image_resize 					= true;
							$this -> verot_net -> image_ratio_crop 				= true;
							$this -> verot_net -> image_x 						= 180;
							$this -> verot_net -> image_y 						= 106;
							$this -> verot_net -> jpeg_quality 					= 80;
							$this -> verot_net -> image_convert 				= 'jpg';
							$this -> verot_net -> process('public/uploads/products/small');

							if ($this -> verot_net -> processed):
								// FOTOĞRAFI KAYDET
								 $this -> Back_End_Model -> add_product_photos([
				                	'new_photo_name' 	=> $photo_name.'.jpg',
				                	'photo_code' 		=> $photo_code
				                ]);
							else:
								// VIEW SAYFASINI YÜKLE
								$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
								return;
							endif;
						endif;
					endforeach;	                
				endif;

				$cover_photo_name 									= seo($product_add_name).'-'.rand(10000,999999);

				@$this -> verot_net -> upload($_FILES['product_add_cover_photo']);
				// FOTOĞRAFLARI YÜKLE
				if ($this -> verot_net -> uploaded):
					$this -> verot_net -> allowed 					= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
					$this -> verot_net -> file_new_name_body  		= $cover_photo_name;
					$this -> verot_net -> image_resize 				= true;
					$this -> verot_net -> image_ratio_crop 			= true;
					$this -> verot_net -> image_x 					= 360;
					$this -> verot_net -> image_y 					= 315;
					$this -> verot_net -> jpeg_quality 				= 80;
					$this -> verot_net -> image_convert 			= 'jpg';
					$this -> verot_net -> process('public/uploads/products/index');

					if (!$this -> verot_net -> processed):
						// VIEW SAYFASINI YÜKLE
						$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
						return;
					endif;
				endif;

				// ÜRÜNÜ EKLE
				if($product_id = $this -> Back_End_Model -> add_product([
					'product_add_name'								=> $product_add_name,
					'product_add_url'								=> seo($product_add_name),
					'product_add_code'								=> $product_add_code,
					'product_add_notes'								=> $product_add_notes,
					'product_add_category'							=> $product_add_category,
					'product_add_keyword'							=> $product_add_keyword,
					'product_add_price'								=> $product_add_price,
					'product_add_discount_price'					=> $product_add_discount_price,
					'product_add_quota'								=> $product_add_quota,
					'product_add_description'						=> $product_add_description,
					'product_add_stock'								=> $product_add_stock,
					'product_add_delivery_time'						=> $product_add_delivery_time,
					'product_add_warranty_time'						=> $product_add_warranty_time,
					'product_add_size'								=> $product_add_size,
					'product_add_color'								=> $product_add_color,
					'product_add_part'								=> $product_add_part,
					'product_add_material'							=> $product_add_material,
					'product_add_brand'								=> $product_add_brand,
					'product_add_text'								=> $product_add_text,
					'product_add_status'							=> $product_add_status,
					'product_add_discount'							=> $product_add_discount,
					'product_add_new'								=> $product_add_new,
					'product_add_best_selling'						=> $product_add_best_selling,
					'product_add_suggested'							=> $product_add_suggested,
					'product_add_cover_photo'						=> $cover_photo_name.'.jpg',
					'product_add_photo_code'						=> $photo_code,
					'product_add_create_time'						=> time(),
					'product_add_ranking'							=> 0,
					'product_add_view_count'						=> 0,
				])):

					// YÖNLENDİR
					redirect(base_url(uri_string().'?addAction=true'));
				else:
					$this -> _error('HATA', 'Ürün ekleme işlemi yapılırken Bir hata oluştu!');
				endif;

			else:
				// VIEW SAYFASINI YÜKLE
				$this -> _render('back_end/products_product_add', [
					'page'								=> $this -> _page('Ürün Ekle'),
					'get_product_categories'			=> $this -> Back_End_Model -> get_product_categories(),

				]);
			endif;
		}

		// ÜRÜN MODÜLÜ - ÜRÜN DÜZENLE
		private function _product_management_edit_product ($module_arg)
		{
			if ($module_arg):
				// GETTEN GELEN VERİLERİ AL
				$id 					= trim(addslashes(strip_tags($module_arg)));

				// ÜRÜNÜ ÇEK
				$get_product 			= $this -> Back_End_Model -> get_product($id);

				if (!empty($get_product)):

					if($this -> input -> post()):

						// POSTTAN GELEN VERİLERİ AL
						$product_edit_name    							= trim(addslashes(strip_tags($this -> input -> post('product_edit_name', TRUE))));
						$product_edit_code    							= trim(addslashes(strip_tags($this -> input -> post('product_edit_code', TRUE))));
						$product_edit_notes    							= trim(addslashes(strip_tags($this -> input -> post('product_edit_notes', TRUE))));
						$product_edit_category    						= trim(addslashes(strip_tags($this -> input -> post('product_edit_category', TRUE))));
						$product_edit_keyword    						= trim(addslashes(strip_tags($this -> input -> post('product_edit_keyword', TRUE))));
						$product_edit_description    					= trim(addslashes(strip_tags($this -> input -> post('product_edit_description', TRUE))));
						$product_edit_price    							= trim(addslashes(strip_tags($this -> input -> post('product_edit_price', TRUE))));
						$product_edit_discount_price    				= trim(addslashes(strip_tags($this -> input -> post('product_edit_discount_price', TRUE))));
						$product_edit_quota    							= trim(addslashes(strip_tags($this -> input -> post('product_edit_quota', TRUE))));
						$product_edit_stock    							= trim(addslashes(strip_tags($this -> input -> post('product_edit_stock', TRUE))));
						$product_edit_delivery_time    					= trim(addslashes(strip_tags($this -> input -> post('product_edit_delivery_time', TRUE))));
						$product_edit_warranty_time    					= trim(addslashes(strip_tags($this -> input -> post('product_edit_warranty_time', TRUE))));
						$product_edit_size    							= trim(addslashes(strip_tags($this -> input -> post('product_edit_size', TRUE))));
						$product_edit_color    							= trim(addslashes(strip_tags($this -> input -> post('product_edit_color', TRUE))));
						$product_edit_part    							= trim(addslashes(strip_tags($this -> input -> post('product_edit_part', TRUE))));
						$product_edit_material    						= trim(addslashes(strip_tags($this -> input -> post('product_edit_material', TRUE))));
						$product_edit_brand    							= trim(addslashes(strip_tags($this -> input -> post('product_edit_brand', TRUE))));
						$product_edit_text    							= str_replace('"', '\'', $this -> input -> post('product_edit_text', TRUE));
						$product_edit_status    						= trim(addslashes(strip_tags($this -> input -> post('product_edit_status', TRUE))));
						$product_edit_new    							= trim(addslashes(strip_tags($this -> input -> post('product_edit_new', TRUE))));
						$product_edit_discount    						= trim(addslashes(strip_tags($this -> input -> post('product_edit_discount', TRUE))));
						$product_edit_best_selling    					= trim(addslashes(strip_tags($this -> input -> post('product_edit_best_selling', TRUE))));
						$product_edit_suggested    						= trim(addslashes(strip_tags($this -> input -> post('product_edit_suggested', TRUE))));

						// ÜRÜNÜ GÜNCELLE
						if ($this -> Back_End_Model -> edit_product([
							'product_edit_name'								=> $product_edit_name,
							'product_edit_url'								=> seo($product_edit_name),
							'product_edit_code'								=> $product_edit_code,
							'product_edit_notes'							=> $product_edit_notes,
							'product_edit_category'							=> $product_edit_category,
							'product_edit_keyword'							=> $product_edit_keyword,
							'product_edit_description'						=> $product_edit_description,
							'product_edit_price'							=> $product_edit_price,
							'product_edit_discount_price'					=> $product_edit_discount_price,
							'product_edit_quota'							=> $product_edit_quota,
							'product_edit_stock'							=> $product_edit_stock,
							'product_edit_delivery_time'					=> $product_edit_delivery_time,
							'product_edit_warranty_time'					=> $product_edit_warranty_time,
							'product_edit_size'								=> $product_edit_size,
							'product_edit_color'							=> $product_edit_color,
							'product_edit_part'								=> $product_edit_part,
							'product_edit_material'							=> $product_edit_material,
							'product_edit_brand'							=> $product_edit_brand,
							'product_edit_text'								=> $product_edit_text,
							'product_edit_status'							=> $product_edit_status,
							'product_edit_discount'							=> $product_edit_discount,
							'product_edit_new'								=> $product_edit_new,
							'product_edit_best_selling'						=> $product_edit_best_selling,
							'product_edit_suggested'						=> $product_edit_suggested,
							'edit_time'										=> time(),
							'product_edit_product_id'						=> $id,
						])):

							$photo_name 									= seo($product_edit_name).'-'.rand(10000,999999);

							if ($_FILES['product_edit_photos']['name']):
								foreach ($_FILES['product_edit_photos']['tmp_name'] as $value):
				                	@$this -> verot_net -> upload($value);
									// FOTOĞRAFLARI YÜKLE
									if ($this -> verot_net -> uploaded):
										$this -> verot_net -> allowed 					= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
										$this -> verot_net -> file_new_name_body  		= $photo_name;
										$this -> verot_net -> image_resize					= true;
										$this -> verot_net -> image_y 						= 700;
										$this -> verot_net -> image_ratio_x 				= true;
										$this -> verot_net -> jpeg_quality 					= 80;
										$this -> verot_net -> image_convert 				= 'jpg';
										$this -> verot_net -> process('public/uploads/products/large');

										$this -> verot_net -> allowed 						= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
										$this -> verot_net -> file_new_name_body  			= $photo_name;
										$this -> verot_net -> image_resize 					= true;
										$this -> verot_net -> image_ratio_crop 				= true;
										$this -> verot_net -> image_x 						= 650;
										$this -> verot_net -> image_y 						= 366;
										$this -> verot_net -> jpeg_quality 					= 80;
										$this -> verot_net -> image_convert 				= 'jpg';
										$this -> verot_net -> process('public/uploads/products/medium');
				
										$this -> verot_net -> allowed 						= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
										$this -> verot_net -> file_new_name_body  			= $photo_name;
										$this -> verot_net -> image_resize 					= true;
										$this -> verot_net -> image_ratio_crop 				= true;
										$this -> verot_net -> image_x 						= 180;
										$this -> verot_net -> image_y 						= 106;
										$this -> verot_net -> jpeg_quality 					= 80;
										$this -> verot_net -> image_convert 				= 'jpg';
										$this -> verot_net -> process('public/uploads/products/small');

										if ($this -> verot_net -> processed):
											// FOTOĞRAFI KAYDET
											 $this -> Back_End_Model -> add_product_photos([
							                	'new_photo_name' 	=> $photo_name.'.jpg',
							                	'photo_code' 		=> $get_product -> product_photo_code
							                ]);
										else:
											// VIEW SAYFASINI YÜKLE
											$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
										endif;
									endif;
								endforeach;	                
							endif;

							$cover_photo_name 									= seo($product_edit_name).'-'.rand(10000,999999);

							@$this -> verot_net -> upload($_FILES['product_edit_cover_photo']);
							// FOTOĞRAFLARI YÜKLE
							if ($this -> verot_net -> uploaded):
								$this -> verot_net -> allowed 					= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
								$this -> verot_net -> file_new_name_body  		= $cover_photo_name;
								$this -> verot_net -> image_resize 				= true;
								$this -> verot_net -> image_ratio_crop 			= true;
								$this -> verot_net -> image_x 					= 360;
								$this -> verot_net -> image_y 					= 315;
								$this -> verot_net -> jpeg_quality 				= 80;
								$this -> verot_net -> image_convert 			= 'jpg';
								$this -> verot_net -> process('public/uploads/products/index');

								if ($this -> verot_net -> processed):
									$this -> Back_End_Model -> edit_product_cover_photo([
										'new_photo_name'		=> $cover_photo_name.'.jpg',
										'product_id'			=> $id
									]);
								else:
									// VIEW SAYFASINI YÜKLE
									$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
								endif;
							endif;

							// YÖNLENDİR
							redirect(base_url(uri_string().'?editAction=true'));

						else:
							// VIEW SAYFASINI YÜKLE
							$this -> _error('HATA', 'Ürün güncelleme işlemi yapılıren Bir hata oluştu!');
						endif;
					else:

						// ÜRÜN LİNKİNİ BELİRLE
						$get_product -> product_url = base_url('u/'.$get_product -> product_url.'-'.$get_product -> product_id);

						// VIEW SAYFASINI YÜKLE
						$this -> _render('back_end/products_product_edit', [
							'page'								=> $this -> _page('Ürün Düzenle'),
							'get_product_categories'			=> $this -> Back_End_Model -> get_product_categories(),
							'get_product_photos'				=> $this -> Back_End_Model -> get_product_photos($get_product->product_id),
							'get_product'						=> $get_product,
						]);
					endif;
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Böyle bir ürün bulunamadı!');
				endif;
			else:
				$this -> _error();
			endif;
		}

		// ÜRÜN MODÜLÜ - ÜRÜN SİL
		private function _product_management_delete_product ($module_arg)
		{
			if ($module_arg):
				// GETTEN GELEN VERİLERİ AL
				$id 					= trim(addslashes(strip_tags($module_arg)));

				// ÜRÜNÜ ÇEK
				$get_product 			= $this -> Back_End_Model -> get_product($id);

				if (count($get_product) > 0):

					// KAPAK FOTOĞRAFINI SİL
					@unlink('public/uploads/products/index/'.$get_product->product_cover_photo);

					// ÜRÜN FOTOĞRAF KODUNU AL
					$product_photo_code = $get_product->product_photo_code;

					// ÜRÜNÜ SİL
					$this -> Back_End_Model -> delete_product($id);
					
					// ÜRÜN FOTOĞRAFLARINI ÇEK
					$get_product_photos = $this -> Back_End_Model -> get_product_photos($product_photo_code);

					// ÜRÜN FOTOĞRAFLARINI SİL
					foreach ($get_product_photos as $value):
						$file_path_large    = 'public/uploads/products/large/';
		                $file_path_medium   = 'public/uploads/products/medium/';
		                $file_path_small    = 'public/uploads/products/small/';

		                @unlink($file_path_large.$value->product_photo_name);
		                @unlink($file_path_medium.$value->product_photo_name);
		                @unlink($file_path_small.$value->product_photo_name);
					endforeach;

					// ÜRÜN FOTOĞRAFLARINI SİL
					$this -> Back_End_Model -> delete_product_photos($product_photo_code);

					// YÖNLENDİR
					redirect(base_url(self::uri['base_url'].'/'.self::uri['products']['product_settings'].'/'.self::uri['products']['list_product'].'?deleteAction=true'));
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Böyle bir veri bulunamadı!');
				endif;
			else:
				$this -> _error();
			endif;
		}

		// ÜRÜN FOTOĞRAFI SİL (AJAX)
		private function _product_management_delete_photo ()
		{
			// POSTTAN GELEN VERİLERİ AL
			$id 			= $this -> input -> post('id');
			$name 			= $this -> input -> post('name');

			$file_path_large    = 'public/uploads/products/580/';
            $file_path_medium   = 'public/uploads/products/1033x580/';

            // FOTOĞRAFLARI SİL
            unlink($file_path_large.$name);
            unlink($file_path_medium.$name);

			// // ÜRÜN FOTOĞRAFINI SİL
			$this -> Back_End_Model -> delete_photo_product($id);
		}


		// REZERVASYON MODÜLÜ
		private function _reservation_management ($sub_module_name = null, $module_arg = null)
		{
			switch ($sub_module_name):
				case self::uri['reservations']['list_reservation']:
					$this -> _reservation_management_list_reservation();
					break;

				case self::uri['reservations']['delete_reservation']:
					$this -> _reservation_management_delete_reservation($module_arg);
					break;

				case self::uri['reservations']['edit_reservation']:
					$this -> _reservation_management_edit_reservation($module_arg);
					break;

				case 'rezervasyon-ara':
					$this -> _reservation_management_reservation_search();
					break;

				default:
					$this -> _error();
			endswitch;
		}

		// REZERVASYON MODÜLÜ - REZERVASYON LİSTESİ METODU
		private function _reservation_management_list_reservation ()
		{
			// TÜM REZERVASYONLARI ÇEK
			$get_reservation_count									= $this -> Back_End_Model -> get_reservation_count();

			// KÜTÜPHANEYE GÖNDERİLECEK VERİLER
			$pagination_config =
			[
				'base_url' 				=> base_url($this -> uri -> segment(1).'/'.$this -> uri -> segment(2).'/'.$this -> uri -> segment(3)),
				'total_rows' 			=> $get_reservation_count,
				'uri_segment' 			=> 4,
				'per_page' 				=> 60,
				'num_links' 			=> 7,
				'first_link' 			=> 'İlk',
				'last_link' 			=> 'Son',
			];

			// SAYFALAMA BAŞLANGIÇ AYARLARINI YAP
			$this -> pagination -> initialize($pagination_config);

			$get_reservations = $this -> Back_End_Model -> get_reservations([
				'per_page'					=> $pagination_config['per_page'],
				'uri_segment'				=> ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0,
			]);
			
			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/reservations_reservation_list', [
				'page'								=> $this -> _page('Rezervasyonlar'),
				'get_reservations'						=> $get_reservations,
				'get_reservation_count'					=> $get_reservation_count,
				'pagination_link'					=> $this -> pagination -> create_links()
			]);
		}

		// REZERVASYON MODÜLÜ - REZERVASYON ARA
		private function _reservation_management_reservation_search ()
		{
			// POSTTAN GELEN VERİLERİ AL
			$key 								= trim(addslashes(strip_tags(($this -> input -> get('kelime')))));

			if ($key):
				// VIEW SAYFASINI YÜKLE
				$this -> _render('back_end/reservations_reservation_search', [
					'page'								=> $this -> _page('"'.$key.'" için arama sonuçları'),
					'get_search_reservations'				=> $this -> Back_End_Model -> get_search_reservations($key),
					'key'								=> $key,
				]);
			else:
				$this -> _error();
			endif;			
		}

		// REZERVASYON MODÜLÜ - REZERVASYON DÜZENLE
		private function _reservation_management_edit_reservation ($module_arg)
		{
			if ($module_arg):
				// GETTEN GELEN VERİLERİ AL
				$id 					= trim(addslashes(strip_tags($module_arg)));

				// REZERVASYONU ÇEK
				$get_reservation 			= $this -> Back_End_Model -> get_reservation($id);

				if (!empty($get_reservation)):

					if($this -> input -> post()):

						// POSTTAN GELEN VERİLERİ AL
						$data = rClean($this->input->post());
						$data["reservation_birthday"] = strtotime($data["reservation_birthday"]);

						// ÜRÜNÜ GÜNCELLE
						if ($this -> Back_End_Model -> edit_reservation($data,$id)):

							// YÖNLENDİR
							redirect(base_url(uri_string().'?editAction=true'));

						else:
							// VIEW SAYFASINI YÜKLE
							$this -> _error('HATA', 'Rezervasyon güncelleme işlemi yapılırken Bir hata oluştu!');
						endif;
					else:

						// VIEW SAYFASINI YÜKLE
						$this -> _render('back_end/reservations_reservation_edit', [
							'page'								=> $this -> _page('Rezervasyon Düzenle'),
							'get_reservation'						=> $get_reservation,
							'get_products'						=> $this->Back_End_Model->get_products(),
						]);
					endif;
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Böyle bir rezervasyon bulunamadı!');
				endif;
			else:
				$this -> _error();
			endif;
		}

		// REZERVASYON MODÜLÜ - REZERVASYON SİL
		private function _reservation_management_delete_reservation ($module_arg)
		{
			if ($module_arg):
				// GETTEN GELEN VERİLERİ AL
				$id 					= trim(addslashes(strip_tags($module_arg)));

				// ÜRÜNÜ ÇEK
				$get_reservation 			= $this -> Back_End_Model -> get_reservation($id);

				if (!empty($get_reservation)):

					// REZERVASYONU SİL
					$this -> Back_End_Model -> delete_reservation($id);
					
					// YÖNLENDİR
					redirect(base_url(self::uri['base_url'].'/'.self::uri['reservations']['reservation_settings'].'/'.self::uri['reservations']['list_reservation'].'?deleteAction=true'));
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Böyle bir veri bulunamadı!');
				endif;
			else:
				$this -> _error();
			endif;
		}

		// HİZMETLER MODÜLÜ
		private function _services_management ($sub_module_name = null, $module_arg = null)
		{
			switch ($sub_module_name):
				case self::uri['services']['list_service']:
					$this -> _services_management_list_service();
					break;

				case self::uri['services']['add_service']:
					$this -> _service_management_add_service();
					break;

				case self::uri['services']['delete_service']:
					$this -> _service_management_delete_service($module_arg);
					break;

				case self::uri['services']['edit_service']:
					$this -> _service_management_edit_service($module_arg);
					break;

				case self::uri['services']['search_service']:
					$this -> _service_management_search_service();
					break;
				
				default:
					$this -> _error();
			endswitch;
		}
		
		// HİZMETLER MODÜLÜ - HİZMET LİSTELE
		private function _services_management_list_service ()
		{
			// HİZMETLERİ ÇEK
			$get_services				= $this -> Back_End_Model -> get_services();

			// LİNKLERİ BELİRLE
			foreach ($get_services as $service_key => $service_value):
				$get_services[$service_key] -> link = '/h/'.$service_value -> service_url;
			endforeach;

			// FOTOĞRAFI BELİRLE
			foreach ($get_services as $service_key => $service_value):
				$get_services[$service_key] -> photo = base_url(self::upload_service_photo.$service_value -> service_photo);
			endforeach;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/services_service_list', [
				'page'						=> $this -> _page('Eklenen Hizmetler'),
				'get_services'				=> $get_services
			]);
		}	

		// HİZMETLER MODÜLÜ - HİZMET EKLE
		private function _service_management_add_service ()
		{
			if ($this -> input -> post()):

				// POSTTAN GELEN VERİLERİ AL
				$service_add_title						= $this -> input -> post('service_add_title');
				$service_add_keyword					= $this -> input -> post('service_add_keyword');
				$service_add_description				= $this -> input -> post('service_add_description');
				$service_add_text						= $this -> input -> post('service_add_text');
				$service_add_status						= $this -> input -> post('service_add_status');

				if ($service_id = $this -> Back_End_Model -> add_service([
					'service_add_title'							=> $service_add_title,
					'service_add_url'							=> seo($service_add_title),
					'service_add_keyword'						=> $service_add_keyword,
					'service_add_description'					=> $service_add_description,
					'service_add_text'							=> str_replace('"', '\'', $service_add_text),
					'service_add_status'						=> $service_add_status,
					'service_add_create_time'					=> time(),
					'service_view_count'						=> 0
				])):

					// KAPAK FOTOĞRAFINI YÜKLE
					$this -> verot_net -> upload($_FILES['service_add_cover_photo']);
					$file_name 										= seo($service_add_title).'-'.rand(10000,999999);
					if ($this -> verot_net -> uploaded):
						$this -> verot_net -> allowed 						= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
						$this -> verot_net -> file_new_name_body  			= $file_name;
						$this -> verot_net -> image_resize					= true;
						$this -> verot_net -> image_y 						= 600;
						$this -> verot_net -> image_ratio_x 				= true;
						$this -> verot_net -> jpeg_quality 					= 80;
						$this -> verot_net -> image_convert 				= 'png';
						$this -> verot_net -> process(self::upload_service_photo);

						$this -> verot_net -> process(self::upload_service_photo);

						// YÜKLEME BAŞARILI İSE
						if ($this -> verot_net -> processed):
							// KAPAK FOTOĞRAFINI GÜNCELLE
		                    if ($this -> Back_End_Model -> edit_service_cover_photo([
								'file_name'					=> $file_name.'.png',
								'service_id'				=> $service_id
							])):
		                    	// YÖNLENDİR
								redirect(base_url('panel/'.self::uri['services']['service_settings'].'/'.self::uri['services']['list_service'].'?addAction=true'));
		                    else:
		                    	// VIEW SAYFASINI YÜKLE
								$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
		                    endif;
						else:
							// VIEW SAYFASINI YÜKLE
							$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
						endif;

					endif;
				endif;
			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/services_service_add', [
				'page'					=> $this -> _page('Hizmet Ekle')
			]);
		}

		// HİZMETLER MODÜLÜ - HİZMET DÜZENLE
		private function _service_management_edit_service ($module_arg)
		{
			$id 				= trim(addslashes(strip_tags($module_arg)));

			if ($id):

				// HİZMETİ ÇEK
				$get_service = $this -> Back_End_Model -> get_service($id);

				if (!empty($get_service) > 0):

					// LİNKİ BELİRLE
					$get_service -> service_link = base_url('h/'.$get_service -> service_url);

					if ($this -> input -> post()):
						// POSTTAN GELEN VERİLERİ AL
						$service_edit_title						= $this -> input -> post('service_edit_title');
						$service_edit_keyword					= $this -> input -> post('service_edit_keyword');
						$service_edit_description				= $this -> input -> post('service_edit_description');
						$service_edit_text						= $this -> input -> post('service_edit_text');
						$service_edit_status					= $this -> input -> post('service_edit_status');

						if ($this -> Back_End_Model -> edit_service([
							'service_edit_title'						=> $service_edit_title,
							'service_edit_url'							=> seo($service_edit_title),
							'service_edit_keyword'						=> $service_edit_keyword,
							'service_edit_description'					=> $service_edit_description,
							'service_edit_text'							=> str_replace('"', '\'', $service_edit_text),
							'service_edit_status'						=> $service_edit_status,
							'service_edit_time'							=> time(),
							'service_id'								=> $id
						])):

							if ($_FILES['service_edit_cover_photo']):

								// KAPAK FOTOĞRAFINI YÜKLE
								$this -> verot_net -> upload($_FILES['service_edit_cover_photo']);
								$file_name 										= seo($service_edit_title).'-'.rand(10000,999999);
								if ($this -> verot_net -> uploaded):
									$this -> verot_net -> allowed 						= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
									$this -> verot_net -> file_new_name_body  			= $file_name;
									$this -> verot_net -> image_resize					= true;
									$this -> verot_net -> image_y 						= 600;
									$this -> verot_net -> image_ratio_x 				= true;
									$this -> verot_net -> jpeg_quality 					= 80;
									$this -> verot_net -> image_convert 				= 'png';
									$this -> verot_net -> process(self::upload_service_photo);

									// YÜKLEME BAŞARILI İSE
									if ($this -> verot_net -> processed):

										// ESKİ FOTOĞRAFI SİL
										unlink(self::upload_service_photo.$get_service -> service_photo);

										// KAPAK FOTOĞRAFINI GÜNCELLE
					                    if (!$this -> Back_End_Model -> edit_service_cover_photo([
											'file_name'				=> $file_name.'.png',
											'service_id'			=> $id
										])):

					                    	// VIEW SAYFASINI YÜKLE
											$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
					                    endif;
									else:
										// VIEW SAYFASINI YÜKLE
										$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
									endif;

								endif;

							endif;

							// YÖNLENDİR
							redirect(base_url(uri_string().'?editAction=true'));

						endif;
					endif;

					// VIEW SAYFASINI YÜKLE
					$this -> _render('back_end/services_service_edit', [
						'page'					=> $this -> _page('Hizmet Düzenle'),
						'get_service'			=> $get_service
					]);

				else:
					$this -> _error();
				endif;
			else:
				$this -> _error();
			endif;
		}

		// HİZMETLER MODÜLÜ - HİZMET SİL
		private function _service_management_delete_service ($module_arg)
		{
			if ($module_arg):
				// GETTEN GELEN VERİLERİ
				$id 						= trim(addslashes(strip_tags($module_arg)));

				// HİZMETİ ÇEK
				$get_service 					= $this -> Back_End_Model -> get_service($id);

				if (!empty($get_service)):

					// HİZMETLERİ SİL
					if ($this -> Back_End_Model -> delete_service($id)):

						// FOTOĞRAFI SİL
						unlink(self::upload_service_photo.$get_service -> service_photo);

						// YÖNLENDİR
						redirect(base_url('panel/'.self::uri['services']['service_settings'].'/'.self::uri['services']['list_service'].'?deleteAction=true'));
					endif;
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error('HATA', 'Böyle bir veri bulunamadı!');
				endif;
			else:
				$this -> _error();
			endif;
		}

		// HİZMETLER MODÜLÜ - HİZMET ARA
		private function _service_management_search_service ()
		{
			// GETTEN GELEN VERİYİ AL
			$key 										= trim(addslashes(strip_tags($this -> input -> get('kelime'))));

			if ($key):
				// VIEW SAYFASINI YÜKLE
				$this -> _render('back_end/services_service_search', [
					'page'								=> $this -> _page('"'.$key.'" için arama sonuçları'),
					'get_search_services'				=> $this -> Back_End_Model -> get_search_services($key),
					'key'								=> $key
				]);
			else:
				$this -> _error();
			endif;
		}




		// SLAYT MODÜLÜ
		private function _slider_management ($sub_module_name = null, $module_arg = null)
		{
			switch ($sub_module_name):
				case 'eklenen-fotograflar':
					$this -> _slider_management_list_photo();
					break;

				case 'fotograf-ekle':
					$this -> _slider_management_add_photo();
					break;

				case 'fotograf-duzenle':
					$this -> _slider_management_edit_photo($module_arg);
					break;

				case 'fotograf-sil':
					$this -> _slider_management_delete_photo($module_arg);
					break;

				case 'fotograf-sirala':
					$this -> _slider_management_photo_rank($module_arg);
					break;

				default:
					$this -> _error();
			endswitch;
		}

		// SLAYT MODÜLÜ - FOTOĞRAF LİSTELE
		private function _slider_management_list_photo ()
		{
			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/slider_photo_list', [
				'page'						=> $this -> _page('Slayt Fotoğrafları'),
				'get_slider_photos'			=> $this -> Back_End_Model -> get_slider_photos()
			]);
		}
				
		// SLAYT MODÜLÜ - FOTOĞRAF EKLE
		private function _slider_management_add_photo ()
		{
			// POSTTAN GELEN VERİYİ AL VE VERİYİ YÜKLE
			if($_FILES):
				$new_photo_name = rand(10000,99999).'_'.rand(10000,99999).'_'.substr(md5(microtime()), 0, 20);

				// FOTOĞRAFI YÜKLE
				$this-> verot_net -> upload($_FILES['slider_add_photo']);
				if ($this -> verot_net -> uploaded):
					$this -> verot_net -> allowed 				= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
					$this -> verot_net -> file_new_name_body  	= $new_photo_name;
					$this -> verot_net -> image_resize 			= true;
					$this -> verot_net -> image_ratio_crop 		= true;
					$this -> verot_net -> image_x 				= 1920;
					$this -> verot_net -> image_y 				= 550;
					$this -> verot_net -> jpeg_quality 			= 90;
					$this -> verot_net -> image_convert 		= 'jpg';
					$this -> verot_net -> process('public/uploads/slider');

					if (!$this -> verot_net -> processed):
						$this -> _error('HATA', 'Slayt fotoğrafları veritabanına kaydedilirken Bir hata oluştu!');
					endif;
				endif;

				// FOTOĞRAFI YÜKLE
				$this-> verot_net -> upload($_FILES['slider_add_photo_mobile']);
				if ($this -> verot_net -> uploaded):
					$this -> verot_net -> allowed 				= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
					$this -> verot_net -> file_new_name_body  	= $new_photo_name;
					$this -> verot_net -> image_resize 			= true;
					$this -> verot_net -> image_ratio_crop 		= true;
					$this -> verot_net -> image_x 				= 250;
					$this -> verot_net -> image_y 				= 250;
					$this -> verot_net -> jpeg_quality 			= 90;
					$this -> verot_net -> image_convert 		= 'jpg';
					$this -> verot_net -> process('public/uploads/slider/mobile');

					if (!$this -> verot_net -> processed):
						$this -> _error('HATA', 'Slayt fotoğrafları veritabanına kaydedilirken Bir hata oluştu!');
					endif;
				endif;

				if ($this -> Back_End_Model -> add_slider_photo([
						'photo_name'					=> $new_photo_name.'.jpg',
						'photo_link'					=> $this -> input -> post('slider_add_photo_link', TRUE),
						'status'						=> 1,
						'rank'							=> 0,
						'crate_time'					=> time()
					])):
				endif;

				// VIEW SAYFASINA GÖNDERİLECEK VERİLER
				redirect(base_url('panel/slaytler/eklenen-fotograflar?insertAction=true'));
			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/slider_photo_add', [
				'page'				=> $this -> _page('Slayt Fotoğrafı Ekle')
			]);
		}	

		// SLAYT MODÜLÜ - FOTOĞRAF DÜZENLE
		private function _slider_management_edit_photo ($module_arg)
		{
			// GETTEN GELEN VERİYİ AL
			$id 				= trim(addslashes(strip_tags($module_arg)));

			if ($id):
				// FOTOĞRAFI ÇEK
				$get_slider_photo 		= $this -> Back_End_Model -> get_slider_photo($id);

				if (count($get_slider_photo) > 0):

					if ($this -> input -> post()):
						// POSTTAN GELEN VERİYİ AL
						$slider_edit_photo_link 			= $this -> input -> post('slider_edit_photo_link', TRUE);
						$slider_edit_photo_status 		= $this -> input -> post('slider_edit_photo_status', TRUE);

						if ($this -> Back_End_Model -> edit_slider([
							'slider_edit_photo_link'			=> $slider_edit_photo_link,
							'slider_edit_photo_status'			=> $slider_edit_photo_status,
							'edit_time'							=> time(),
							'id'								=> $id

						])):
							redirect(base_url('panel/slaytler/eklenen-fotograflar?editAction=true'));
						else:
							$this -> _error('HATA', 'Düzenleme işlemi yapılırken Bir hata oluştu!');
						endif;

					endif;


					// VIEW SAYFASINI YÜKLE
					$this -> _render('back_end/slider_photo_edit', [
						'page'						=> $this -> _page('Slayt Fotoğrafı Düzenle'),
						'get_slider_photo'			=> $get_slider_photo
					]);

				else:
					$this -> _error();
				endif;
			else:
				$this -> _error();
			endif;
		}	

		// SLAYT MODÜLÜ - FOTOĞRAF SİL
		private function _slider_management_delete_photo ($arg)
		{
			// GETTEN GELEN VERİYİ TEMİZLE
			$arg = trim(addslashes(strip_tags($arg)));
			
			// SLAYT FOTOĞRAFINI ÇEK
			$get_slider_photo 		= $this -> Back_End_Model -> get_slider_photo($arg);

			if (count($get_slider_photo) > 0):

				// DOSYAYI SİL
	            @unlink('public/uploads/slider/'.$get_slider_photo->slider_photo_name);
	            @unlink('public/uploads/slider/mobile/'.$get_slider_photo->slider_photo_name);

	            // SLAYT FOTOĞRAFINI SİL
	            $delete_slider_photo 		= $this -> Back_End_Model -> delete_slider_photo($arg);

	            // YÖNLENDİR
				if ($delete_slider_photo === true)
					redirect(base_url('panel/slaytler/eklenen-fotograflar?deleteAction=true'));
				else
					$this -> _error();

			else:
				$this -> _error();
			endif;
			
		}

		// SLAYT MODÜLÜ - FOTOĞRAF SIRALA
		private function _slider_management_photo_rank ()
		{
			sleep(1);

			// POSTTAN GELEN VERİYİ AL
			$rank 						= $this -> input -> post('rank');

			foreach ($rank as $key => $value)
			{
				// MODEL SAYFASIAN GÖNDERİLECEK VERİLER
				$model_data =
				[
					'photo_id'		=> $value,
					'rank'			=> $key
				];
				
				// SIRALAMAYI DÜZENLE
				if (!$this -> Back_End_Model -> edit_slider_rank($model_data)):
					$this -> _error();
				endif;
			}
		}



		
		// MESAJ MODÜLÜ
		private function _message_management ($sub_module_name = null, $module_arg = null)
		{
			switch ($sub_module_name):
				case self::uri['messages']['edit_message']:
					$this -> _message_management_message_edit($module_arg);
					break;

				case self::uri['messages']['delete_message']:
					$this -> _message_management_message_delete($module_arg);
					break;

				default:
					$this -> _message_management_message_list();
			endswitch;
		}

		// MESAJ MODÜLÜ - MESAJ LİSTELE
		private function _message_management_message_list ()
		{
			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/contact', [
				'page'						=> $this -> _page('Mesajlar'),
				'get_all_messages'			=> $this -> Back_End_Model -> get_all_messages()
			]);
		}

		// MESAJ MODÜLÜ - MESAJ SİL
		private function _message_management_message_delete ($module_arg)
		{			
			// MESAJI SİL
			$delete_message 		= $this -> Back_End_Model -> delete_message($module_arg);

			if ($delete_message === true):
				redirect(base_url('panel/'.self::uri['messages']['message_settings'].'?deleteAction=true'));
			elseif ($delete_message === false):
				redirect(base_url('panel/'.self::uri['messages']['message_settings'].'?deleteAction=false'));
			endif;
		}

		// MESAJ MODÜLÜ - MESAJ DÜZENLE
		private function _message_management_message_edit($module_arg)
		{
			// GETTEN GELEN VERİYİ TEMİZLE
			$arg = trim(addslashes(strip_tags($module_arg)));
			
			if ($this -> Back_End_Model -> edit_message($arg)):
				// OKUNMAMIŞ MESAJ SAYISINI 1 AZALT
				$this -> session -> set_userdata('unreadMessages', $this -> session -> userdata('unreadMessages') - 1);
				redirect(base_url('panel/'.self::uri['messages']['message_settings'].'?editAction=true'));
			/*elseif ($set_message === false):
				redirect(base_url('panel/'.self::uri['messages']['message_settings'].'?editAction=true'));*/
			endif;
		}


		// GALERİ MODÜLÜ
		private function _gallery_management ($sub_module_name = null, $module_arg = null)
		{
			switch ($sub_module_name):
				case self::uri['galleries']['list_gallery']:
					$this -> _gallery_management_list_gallery();
					break;

				case self::uri['galleries']['add_gallery']:
					$this -> _gallery_management_add_gallery();
					break;

				case self::uri['galleries']['edit_gallery']:
					$this -> _gallery_management_edit_gallery($module_arg);
					break;

				case self::uri['galleries']['delete_gallery']:
					$this -> _gallery_management_delete_gallery($module_arg);
					break;

				case 'galeri-ara':
					$this -> _gallery_management_search_gallery($module_arg);
					break;

				case 'fotograf-sil':
					$this -> _gallery_management_delete_photo($module_arg);
					break;

				default:
					$this -> _error();
			endswitch;
		}

		// GALERİ MODÜLÜ - GALERİ LİSTELE
		private function _gallery_management_list_gallery ()
		{
			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/galleries_gallery_list', [
				'page'						=> $this -> _page('Eklenen Galeriler'),
				'get_galleries'				=> $this -> Back_End_Model -> get_galleries()
			]);
		}

		// GALERİ MODÜLÜ - GALERİ EKLE
		private function _gallery_management_add_gallery ()
		{	
			if ($this -> input -> post()):

				// POSTTAN GELEN VERİLERİ AL
				$gallery_add_name 					= $this -> input -> post('gallery_add_name', TRUE);
				$gallery_add_status 				= $this -> input -> post('gallery_add_status', TRUE);
				$gallery_add_photo_size 			= $this -> input -> post('gallery_add_photo_size', TRUE);

				// GALERİ KODU
				$gallery_code 						= '[galeri-'.substr(rand(10000,50000), 0, 6).']';

				// GALERİ EKLE
				if ($gallery_id = $this -> Back_End_Model -> add_gallery([
					'gallery_add_name'				=> $gallery_add_name,
					'gallery_add_photo_size'		=> $gallery_add_photo_size,
					'gallery_add_status'			=> $gallery_add_status,
					'gallery_code'					=> $gallery_code,
					'create_time'					=> time()
				])):
					// DİĞER FOTOĞRAFLARI YÜKLE
					if ($_FILES['gallery_add_photos']['tmp_name']):
						foreach ($_FILES['gallery_add_photos']['tmp_name'] as $value)
						{
							// YENİ FOTOĞRAF İSMİ
							$photo_name 				= seo($gallery_add_name).'-'.rand(10000,999999);

							@$this -> verot_net -> upload($value);
							// FOTOĞRAFLARI YÜKLE
							if ($this -> verot_net -> uploaded):
								$this -> verot_net -> allowed 					= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
								$this -> verot_net -> file_new_name_body  		= $photo_name;
								$this -> verot_net -> image_resize				= true;
								$this -> verot_net -> image_y 					= 580;
								$this -> verot_net -> image_ratio_x 			= true;
								$this -> verot_net -> jpeg_quality 				= 80;
								$this -> verot_net -> image_convert 			= 'jpg';
								$this -> verot_net -> process(self::upload_gallery_photo);

								$this -> verot_net -> allowed 					= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
								$this -> verot_net -> file_new_name_body  		= $photo_name;
								$this -> verot_net -> image_resize 				= true;
								$this -> verot_net -> image_ratio_crop 			= true;
								$this -> verot_net -> image_x 					= 450;
								$this -> verot_net -> image_y 					= 450;
								$this -> verot_net -> jpeg_quality 				= 80;
								$this -> verot_net -> image_convert 			= 'jpg';
								$this -> verot_net -> process(self::upload_gallery_photo_thumb);

								if ($this -> verot_net -> processed):
									// FOTOĞRAFI KAYDET
									if (!$this -> Back_End_Model -> gallery_add_photo([
									'photo_name' 			=> $photo_name.'.jpg',
		                    		'gallery_id' 			=> $gallery_id
								])):

										// VIEW SAYFASINI YÜKLE
										$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
										return;
									endif;

								else:
									// VIEW SAYFASINI YÜKLE
									$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
									return;
								endif;
							endif;
						}
					endif;

					// YÖNLENDİR
					redirect(base_url(uri_string().'?addAction=true'));
				endif;
			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/galleries_gallery_add', [
				'page'					=> $this -> _page('Galeri Ekle')
			]);
		}

		// GALERİ MODÜLÜ - GALERİ DÜZENLE
		private function _gallery_management_edit_gallery ($module_arg)
		{
			// GETTEN GELEN VERİLERİ AL
			$id 						= trim(addslashes(strip_tags($module_arg)));

			// GALERİYİ ÇEK
			$get_gallery 				= $this -> Back_End_Model -> get_gallery($id);

			if (!empty($get_gallery)):

				if ($this -> input -> post()):
					// POSTTAN GELEN VERİYİ AL
					$gallery_edit_name					= $this -> input -> post('gallery_edit_name', TRUE);
					$gallery_edit_photo_size			= $this -> input -> post('gallery_edit_photo_size', TRUE);
					$gallery_edit_status				= $this -> input -> post('gallery_edit_status', TRUE);

					if ($this -> Back_End_Model -> edit_gallery([
						'gallery_edit_name'				=> $gallery_edit_name,
						'gallery_edit_photo_size'		=> $gallery_edit_photo_size,
						'gallery_edit_status'			=> $gallery_edit_status,
						'gallery_update_time'			=> time(),
						'gallery_id'					=> $id
					])):

						// DİĞER FOTOĞRAFLARI YÜKLE
						if ($_FILES['gallery_edit_photos']['tmp_name']):
							foreach ($_FILES['gallery_edit_photos']['tmp_name'] as $value)
							{
								// YENİ FOTOĞRAF İSMİ
								$photo_name 				= seo($gallery_edit_name).'-'.rand(10000,999999);

								@$this -> verot_net -> upload($value);
								// FOTOĞRAFLARI YÜKLE
								if ($this -> verot_net -> uploaded):
									$this -> verot_net -> allowed 					= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
									$this -> verot_net -> file_new_name_body  		= $photo_name;
									$this -> verot_net -> image_resize				= true;
									$this -> verot_net -> image_y 					= 580;
									$this -> verot_net -> image_ratio_x 			= true;
									$this -> verot_net -> jpeg_quality 				= 80;
									$this -> verot_net -> image_convert 			= 'jpg';
									$this -> verot_net -> process(self::upload_gallery_photo);

									$this -> verot_net -> allowed 					= ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/x-windows-bmp'];
									$this -> verot_net -> file_new_name_body  		= $photo_name;
									$this -> verot_net -> image_resize 				= true;
									$this -> verot_net -> image_ratio_crop 			= true;
									$this -> verot_net -> image_x 					= 450;
									$this -> verot_net -> image_y 					= 450;
									$this -> verot_net -> jpeg_quality 				= 80;
									$this -> verot_net -> image_convert 			= 'jpg';
									$this -> verot_net -> process(self::upload_gallery_photo_thumb);

									if ($this -> verot_net -> processed):
										// FOTOĞRAFI KAYDET
										if (!$this -> Back_End_Model -> gallery_add_photo([
											'photo_name' 			=> $photo_name.'.jpg',
				                    		'gallery_id' 			=> $id
										])):
											// VIEW SAYFASINI YÜKLE
											$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
											return;
										endif;
									else:
										// VIEW SAYFASINI YÜKLE
										$this -> _error('HATA', 'Fotoğraf yükleme işlemi yapılırken Bir hata oluştu!');
										return;
									endif;
								endif;
							}
						endif;

						// YÖNLENDİR
						redirect(base_url(uri_string().'?editAction=true'));

					else:
						// VIEW SAYFASINI YÜKLE
						$this -> _error();
					endif;
				endif;

				// VIEW SAYFASINI YÜKLE
				$this -> _render('back_end/galleries_gallery_edit', [
					'page'								=> $this -> _page('Galeri Düzenle'),
					'get_gallery'						=> $get_gallery,
					'get_gallery_photos'				=> $this -> Back_End_Model -> get_gallery_photos($id)
				]);
			else:
				// VIEW SAYFASINI YÜKLE
				$this -> _error('HATA', 'Böyle bir veri bulunamadı!');
			endif;
		}

		// GALERİ MODÜLÜ - GALERİ SİL
		public function _gallery_management_delete_gallery ($arg)
		{
			// GETTEN GELEN VERİLERİ AL
			$arg 						= trim(addslashes(strip_tags($arg)));

			// GALERİYİ ÇEK
			$get_gallery 				= $this -> Back_End_Model -> get_gallery($arg);

			if (count($get_gallery) > 0):

				// GALERİ FOTOĞRAFLARINI ÇEK
				$get_gallery_photos			= $this -> Back_End_Model -> get_gallery_photos($arg);

				// GALERİ FOTOĞRAFLARINI SİL
				if ($this -> Back_End_Model -> delete_gallery_photos($arg)):
					foreach ($get_gallery_photos as $value)
					{
						// FOTOĞRAFLARI SİL
						@unlink(self::upload_gallery_photo.$value -> gallery_photo_name);
						@unlink(self::upload_gallery_photo_thumb.$value -> gallery_photo_name);
					}

					// GALERİYİ SİL
					if ($this -> Back_End_Model -> delete_gallery($arg))
						// YÖNLENDİR
						redirect(base_url(self::uri['base_url'].'/'.self::uri['galleries']['gallery_settings'].'/'.self::uri['galleries']['list_gallery'].'?deleteAction=true'));
					else
						// VIEW SAYFASINI YÜKLE
						$this -> _error();
				
				else:
					// VIEW SAYFASINI YÜKLE
					$this -> _error();
				endif;

			else:				
				// VIEW SAYFASINI YÜKLE
				$this -> _error('HATA', 'Böyle bir veri bulunamadı!');
			endif;
		}

		//GALERİ MODÜLÜ - FOTOĞRAFI SİL (AJAX)
		private function _gallery_management_delete_photo ()
		{
			// POSTTAN GELEN VERİLERİ AL
			$id = $this -> input -> post('id');
			$name = $this -> input -> post('name');

            // FOTOĞRAFLARI SİL
            unlink(self::upload_gallery_photo.$name);
            unlink(self::upload_gallery_photo_thumb.$name);

			// GALERİ FOTOĞRAFI SİL
			$this -> Back_End_Model -> delete_photo($id);
		}

		// GALERİ MODÜLÜ - GALERİ ARA
		private function _gallery_management_search_gallery ()
		{
			// GETTEN GELEN VERİYİ AL
			$key 										= trim(addslashes(strip_tags($this -> input -> get('kelime'))));
			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/galleries_gallery_search', [
				'page'							=> $this -> _page('"'.$key.'" için arama sonuçları'),
				'get_search_galleries'			=> $this -> Back_End_Model -> get_search_galleries($key),
				'key'							=> $key
			]);
		}


		// TEST MAİL GÖNDER
		private function _email_send ()
		{
			// E-POSTA AYARLARINI ÇEK
			$get_settings_email_send_email 									= $this -> Back_End_Model -> get_settings_email_send_email();

			if ($this -> input -> post()):
				// POSTTAN GELEN VERİLERİ AL
				$email_send_to 				= $this -> input -> post('email_send_to');
				$email_send_content 		= $this -> input -> post('email_send_content');
				$email_send_subject 		= $this -> input -> post('email_send_subject');

				// KÜTÜPHANEYİ YÜKLE
				$this -> load -> library('email', $mail_config =
				[
					'protocol' 			=> $get_settings_email_send_email -> email_setting_protocol,
					'smtp_host' 		=> $get_settings_email_send_email -> email_setting_smtp_host,
					'smtp_port'			=> $get_settings_email_send_email -> email_setting_smtp_port,
					'smtp_user'			=> $get_settings_email_send_email -> email_setting_smtp_user,
					'smtp_pass' 		=> $get_settings_email_send_email -> email_setting_password,
					'smtp_crypto' 		=> $get_settings_email_send_email -> email_setting_crypto,
					'charset' 			=> 'utf-8',
					'mailtype' 			=> 'html',
					'wordwrap' 			=> true,
					'newline' 			=> '\r\n'
				]);

				$this -> email -> set_header('MIME-Version', '1.0; charset=utf-8');
				$this -> email -> set_header('Content-type', 'text/html');
				$this -> email -> from($get_settings_email_send_email['email_setting_smtp_user'], $get_settings_email_send_email['email_setting_name_surname']);
				$this -> email -> to($email_send_to);
				$this -> email -> subject($email_send_subject);

				// E-POSTA İÇERİĞİ
				$this -> email -> message($email_send_content);

				// E-POSTA GÖNDER
				if ($this -> email -> send())
					// YÖNLENDİR
					redirect(base_url('panel/e-posta-gonder?sendAction=true'));
				else
					// YÖNLENDİR
					redirect(base_url('panel/e-posta-gonder?sendAction=false'));

			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> load -> view('back_end/EMail_Send', [
				'page'						=> $this -> _page('E-Posta Gönder'),
				$get_settings_email_send_email 		=> $get_settings_email_send_email
			]);
		}


		// YÖNETİCİ MODÜLÜ
		private function _admin_setting_magament ()
		{
			// YÖNETİCİ BİLGİLERİNİ ÇEK
			$get_admin_settings = $this -> Back_End_Model -> get_admin_settings($this -> session -> userdata('admin_id'));

			// MODEL SAYFASINI YÜKLE
			$this -> load -> model('Back_End_Model');

			// POST VAR İSE DEVAM ET
			if ($this -> input -> post()):
				// POSTTAN GELEN VERİLERİ AL
				$admin_settings_name 		= trim(addslashes(strip_tags($this -> input -> post('admin_settings_name'))));
				$admin_settings_surname 	= trim(addslashes(strip_tags($this -> input -> post('admin_settings_surname'))));
				$admin_settings_e_mail 		= trim(addslashes(strip_tags($this -> input -> post('admin_settings_e_mail'))));
				$admin_settings_password 	= trim(addslashes(strip_tags($this -> input -> post('admin_settings_password'))));

				if ($admin_settings_password):
					$admin_settings_password 			= substr(md5(sha1(base64_encode(crc32($admin_settings_password)))), 0, 13);
				else:
					$admin_settings_password 				= $get_admin_settings -> admin_password;
				endif;

				if ($this -> Back_End_Model -> set_admin_settings([
					'admin_settings_name' 				=> $admin_settings_name,
					'admin_settings_surname' 			=> $admin_settings_surname,
					'admin_settings_e_mail'				=> $admin_settings_e_mail,
					'admin_settings_password' 			=> $admin_settings_password,
					'admin_id' 							=> $get_admin_settings -> admin_id
				]))
					// YÖNLENDİR
					redirect(base_url(uri_string().'?editAction=true'));
				else
					$this -> _error();

			endif;

			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/admin_settings', [
				'page'						=> $this -> _page('Yönetici Ayarları'),
				'get_admin_settings'		=> $get_admin_settings
			]);
		}

		// DOSYA YÖNETİCİSİ MODÜLÜ
		private function _file_manager()
		{		
			// VIEW SAYFASINI YÜKLE
			$this -> _render('back_end/file_manager', ['page' => $this -> _page('Dosyalar')]);
		}

		// YÜKSEKLİĞİ YENIDEN BOYUTLANDIRMA METODU
		function image_height_size ($filePath, $fileName, $uploadPath, $newfileName, $newHeight, $quality)
	    {
	        /*
	            $filePath 		= Fotoğraf yolu
	            $fileName 	    = Fotoğraf Adı
	            $uploadPath 	= Yüklenecek Yol
	            $newfileName 	= Yeni Ad
	            $newHeight      = Yeni Yükseklik
	            $quality        = Kalite
	        */

	        // DOSYA YOLU BAŞINDAKİ / KARAKTERİNİ SİL
	        $filePath 	= ltrim($filePath, '/');
	        $uploadPath = ltrim($uploadPath, '/');

	        // DOSYA YOLU VE ADINI BİRLEŞTİR
	        $file  		= $filePath.'/'.$fileName;
	        $newfile 	= $uploadPath.'/'.$newfileName;

	        // FOTOĞRAFIN MEVCUT GENİŞLİK VE YÜKSEKLİK DEĞERLERİNİ BUL
	        $photoInfo 				= getimagesize($file);
	        $photoAvailableWidth 	= $photoInfo[0];
	        $photoAvailableHeight 	= $photoInfo[1];

	        // FOTOĞRAFIN YENİ GENİŞLİK DEĞERİNİ BUL
	        $photoNewWidth 			= round(($photoAvailableWidth * $newHeight) / $photoAvailableHeight);

	        // YENİ canvas OLUŞTUR
	        $createNewcanvas 		= imagecreatetruecolor($photoNewWidth, $newHeight);

	        // FOTOĞRAFI HAFIZAYA AL
	        $photoMemorize 			= imagecreatefromjpeg($file);

	        // FOTOĞRAFI canvasE YERLEŞTİR
	        $placePhotoTocanvas 	= imagecopyresampled($createNewcanvas, $photoMemorize, 0, 0, 0, 0, $photoNewWidth, $newHeight, $photoAvailableWidth, $photoAvailableHeight);

	        // FOTOĞRAFI KAYDET
	        imagejpeg($createNewcanvas, $newfile, $quality);

	        // HAFIZAYI BOŞALT
	        imagedestroy($createNewcanvas);
	    }

	    // YENIDEN BOYUTLANDIRMA METODU
	    function image_size ($filePath, $fileName, $uploadPath, $newfileName, $NewWidth, $newHeight)
		{
			/*
	            $filePath 		= Fotoğraf yolu
	            $fileName 	    = Fotoğraf Adı
	            $uploadPath 	= Yüklenecek Yol
	            $newfileName 	= Yeni Ad
	            $NewWidth      	= Yeni Genişlik
	            $newHeight      = Yeni Yükseklik
	        */

			// DOSYA YOLU BAŞINDAKİ / KARAKTERİNİ SİL
			$filePath 	= ltrim($filePath, '/');
			$uploadPath = ltrim($uploadPath, '/');

			// DOSYA YOLU VE ADINI BİRLEŞTİR
			$file  		= $filePath.'/'.$fileName;
			$newFile 	= $uploadPath.'/'.$newfileName;

			// FOTOĞRAFIN MEVCUT GENİŞLİK VE YÜKSEKLİK DEĞERLERİNİ BUL
			$photoInfo 				= getimagesize($file);
			$availableNewWidth 		= $photoInfo[0];
			$availableNewHeight 	= $photoInfo[1];
			$formatType 			= $photoInfo["mime"];

			if ($formatType == 'image/jpeg')
			{
				$newPhoto = imagecreatefromjpeg($file);
			} else if ($formatType == 'image/png')
				{
					$newPhoto = imagecreatefrompng($file);
				}

			$canvas 	= imagecreatetruecolor($NewWidth, $newHeight);
			$bigView 	= $availableNewWidth / $availableNewHeight;
			$smallView 	= $NewWidth / $newHeight;

			if ($bigView < $smallView)
			{
				// DAR
				$scale 		= $NewWidth / $availableNewWidth;
				$newSize 	= array($NewWidth, $NewWidth / $bigView);
				$position 	= array(0,($availableNewHeight * $scale - $newHeight) / $scale / 2);
			} else if ($bigView > $smallView)
				{
					// GENİŞ
					$scale 		= $newHeight / $availableNewHeight;
					$newSize 	= array($newHeight * $bigView, $newHeight);
					$position 	= array(($availableNewWidth * $scale - $NewWidth) / $scale / 2, 0);
				} else
					{
						$newSize = array($newHeight, $NewWidth);
						$position = array(0,0);
					}

			$newSize[0] = max($newSize[0], 0);
			$newSize[1] = max($newSize[1], 1);

			imagecopyresampled($canvas, $newPhoto, 0, 0, $position[0], $position[1], $newSize[0], $newSize[1], $availableNewWidth, $availableNewHeight);

			if ($newFile === false)
			{
				return imagepng($canvas);
			} else
				{
					return imagepng($canvas,$newFile);
				}
		}
	}