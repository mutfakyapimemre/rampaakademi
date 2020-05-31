<?php
	/**
	* MUTFAK YAPIM İÇERİK YÖNETİM SİSTEMİ v2.0.0	
	* 
	* @package			FRONT-END CONTROLLER
	* @version			v2.0.0
	* @author 			Asaf Mirtürk (asaf.mirturk@mutfakyapim.com)
	* @copyright		Mutfak Yapım © 2020		
	* @link				www.mutfakyapim.com
	*/
	class Front_End extends CI_Controller
	{
		/**
		* YEREL DEĞİŞKENLER
		* Veritabanından çekilir ve cache olarak kaydedilir (değiştirmeyin)
		*/
		private $site_settings 							= null; // SİTE AYARLARI
		private $site_settings_social_media 			= null; // SOSYAL MEDYA AYARLARI
		private $site_settings_email 					= null; // E-POSTA AYARLARI 
		private $site_settings_currencies 				= null; // PARA BİRİMİ AYARLARI
		private $site_menus 							= null; // MENÜLER 
		private $site_categories 						= null; // KATEGORİLER 
		private $site_currency 							= null; // AKTİF PARA BİRİMİ 

		/**
		* YÜKLEME DİZİNLERİ
		* Buradan güncelleme işlemi yaparsanız controllers/back_end/Back_End.php sayfasından da aynı güncellemeleri yapın
		*/
		const upload_dir								= 'public/uploads/'; // ANA YÜKLEME DİZİNİ
		const upload_product_photo_index_dir			= self::upload_dir.'products/index/'; //ÜRÜN
		const upload_product_photo_small_dir			= self::upload_dir.'products/small/'; //ÜRÜN
		const upload_product_photo_medium_dir			= self::upload_dir.'products/medium/'; //ÜRÜN
		const upload_product_photo_large_dir			= self::upload_dir.'products/large/'; //ÜRÜN
		const upload_category_cover_dir					= self::upload_dir.'categories/'; // KATEGORİ KAPAK

		/**
		* URI KISALTMALARI
		* Buradan güncelleme işlemi yaparsanız controllers/back_end/Back_End.php ve views/back_end dizinindeki ilgili sayfalardan da aynı güncellemeleri yapın
		*/
		const shortname_category 						= 'k'; // KATEGORİ
		const shortname_page 							= 's'; // SAYFA
		const shortname_product 						= 'u'; // ÜRÜN
		const shortname_service 						= 'h'; // HİZMET
		const shortname_sitemap 						= 'sitemap.xml'; // SİTE HARİTASI
		const shortname_save_contact 					= 'save_contact'; // İletişim Formu Kayıt
		const shortname_join_course						= 'egitim-kayit'; // Eğitim Formu	
		const shortname_register_course					= 'register_course'; // Eğitim Formu Kayıt	

		public function __construct()
		{
			parent::__construct();

			// YÜKLEYİCİLERİ ÇALIŞTIR
			$this -> _auto_loader();
			$this -> _cache_loader();

			// PARA BİRİMİ 
			$this -> _set_currency();
		}

		/**
		* PARA BİRİMİ
		* @return void
		*/
		private function _set_currency ()
		{
			// PARAM BİRİMİNİ KAYDET
			foreach ($this -> site_settings_currencies AS $currency):
				if($currency -> currency_id == $this -> site_settings -> setting_site_currency):
					$this -> site_currency = $currency -> currency_symbol;
				endif;
			endforeach;
		}

		/**
		* OTOMATİK YÜKLEYİCİ
		* @return void
		*/
		private function _auto_loader ()
		{
			// MODEL SAYFALARINI YÜKLE
			$this -> load -> model('Front_End_Model'); 

			// SÜRÜCÜLERİ YÜKLE
			$this -> load -> driver('cache', ['adapter' => 'file', 'backup' => 'file']);

			// KÜTÜPHANELERİ YÜKLE
			$this -> load -> library('pagination');
		}

		/**
		* ÖNBELLEK YÜKLEYİCİ
		* @return void
		*/
		private function _cache_loader ()
		{
			// SİTE GENEL AYARLARINI ÇEK VE ÖNBELLEĞE AL
			if (@!$this -> site_settings = $this -> cache -> get('site_settings')):
				$this -> site_settings = $this -> Front_End_Model -> site_settings();
				$this -> cache -> save('site_settings', $this -> site_settings, (3600 * 24));
			endif;

			// SİTE YAYIN DURUMU PASİF İSE YÖNLENDİR
			if ($this -> site_settings -> setting_site_status != 1):
				redirect(base_url('yayin-kapali'));
			endif;

			// KATEGORİLERİ ÇEK VE ÖNBELLEĞE AL
			if (@!$this -> site_categories = $this -> cache -> get('site_categories')):
				$this -> site_categories = $this -> Front_End_Model -> site_categories();
				$this -> cache -> save('site_categories', $this -> site_categories, (3600 * 24));
			endif;

			// MENÜLERİ ÇEK VE ÖNBELLEĞE AL
			if (@!$this -> site_menus = $this -> cache -> get('site_menus')):
				$site_menus = $this -> Front_End_Model -> get_menus();
				$this -> cache -> save('site_menus', $this -> site_menus, (3600 * 24));

				foreach ($site_menus as $menu_key => $menu_value):
					if ($menu_value -> menu_type == 1)
						$site_menus[$menu_key] -> menu_url = base_url($menu_value -> menu_link_page); 
					else
						$site_menus[$menu_key] -> menu_url = $menu_value -> menu_link_url; 
				endforeach;

				$this -> site_menus = $site_menus;
			endif;

			// SOSYAL MEDYA AYARLARINI ÇEK VE ÖNBELLEĞE AL
			if (@!$this -> site_settings_social_media = $this -> cache -> get('site_settings_social_media')):
				$this -> site_settings_social_media = $this -> Front_End_Model -> site_settings_social_media();
				$this -> cache -> save('site_settings_social_media', $this -> site_settings_social_media, (3600 * 24));
			endif;

			// E-POSTA AYARLARINI ÇEK VE ÖNBELLEĞE AL
			if (@!$this -> site_settings_email = $this -> cache -> get('site_settings_email')):
				$this -> site_settings_email = $this -> Front_End_Model -> site_settings_email();
				$this -> cache -> save('site_settings_email', $this -> site_settings_email, (3600 * 24));
			endif;

			// PARA BİRİMLERİNİ ÇEK VE ÖNBELLEĞE AL
			if (@!$this -> site_settings_currencies = $this -> cache -> get('site_settings_currencies')):
				$this -> site_settings_currencies = $this -> Front_End_Model -> site_settings_currencies();
				$this -> cache -> save('site_settings_currencies', $this -> site_settings_currencies, (3600 * 24));
			endif;
		}

		/**
		* SAYFA METODU
		* @param name string
		* @return array
		*/
		private function _page ($name)
		{
			return [
				'title'					=> $name.' | '.$this -> site_settings -> setting_site_name,
				'name'					=> $name,
				'url'					=> @base_url($_SERVER['PATH_INFO']),
			];
		}

		/**
		* AYARLAR METODU
		* @return array
		*/
		private function _settings ()
		{
			return [
				'general'						=> $this -> site_settings,
				'social_media'					=> $this -> site_settings_social_media,
				'site_menus' 					=> $this -> site_menus,
			];
		}

		/**
		* RENDER METODU
		* @param page string
		* @param view_data any
		* @return void
		*/
		private function _render ($page, $view_data = null)
		{
			// VIEW SAYFASINI YÜKLE
			$this -> load -> view('front_end/includes/head', $view_data);
			$this -> load -> view('front_end/includes/styles', $view_data);
			$this -> load -> view('front_end/includes/header', $view_data);
			$this -> load -> view($page, $view_data);
			$this -> load -> view('front_end/includes/footer', $view_data);
			$this -> load -> view('front_end/includes/scripts', $view_data);
		}

		/**
		* E-POSTA GÖNDERİCİ
		* @param settings array
		* @return boolean
		*/
		private function _email_send ($settings = null)
		{
			// DİZİ ANAHTARLARINI KONTROL ET
			if (is_array($settings)):
				if (array_key_exists('from_title', $settings)):
					if (array_key_exists('to_mails', $settings)):
						if (array_key_exists('subject', $settings)):
							if (array_key_exists('content', $settings)):
								if (array_key_exists('template_file', $settings)):

									// E-POSTA LÜTÜPHANESİNİ YÜKLE
									$this -> load -> library('email', [
										'protocol' 			=> $this -> site_settings_email -> email_setting_protocol,
										'smtp_host' 		=> $this -> site_settings_email -> email_setting_smtp_host,
										'smtp_port'			=> $this -> site_settings_email -> email_setting_smtp_port,
										'smtp_user'			=> $this -> site_settings_email -> email_setting_smtp_user,
										'smtp_pass' 		=> $this -> site_settings_email -> email_setting_password,
										'smtp_crypto' 		=> $this -> site_settings_email -> email_setting_crypto,
										'charset' 			=> 'utf-8',
										'mailtype' 			=> 'html',
										'wordwrap' 			=> true,
										'newline' 			=> '\r\n'
									]);

									// AYARLARI YAP
									$this -> email -> set_header('MIME-Version', '1.0; charset=utf-8');
									$this -> email -> set_header('Content-type', 'text/html');
									$this -> email -> from($this -> site_settings_email -> email_setting_smtp_user, $settings['from_title']);
									$this -> email -> to($settings['to_mails']);
									$this -> email -> subject($settings['subject']);

									// VIEW SAYFASINI YÜKLE
									$view = $this -> load -> view($settings['template_file'], ['subject' => $settings['subject'], 'content' => $settings['content']], true);

									// E-POSTA İÇERİĞİ
									$this -> email -> message($view);

									// MAIL GÖNDER
									if ($this -> email -> send())
										return true;
									else			
										return false;

								else:
									$this -> _error('HATA', 'E-Posta Parametre Hatası (template_file)');
								endif;
							else:
								$this -> _error('HATA', 'E-Posta Parametre Hatası (content)');
							endif;
						else:
							$this -> _error('HATA', 'E-Posta Parametre Hatası (subject)');
						endif;
					else:
						$this -> _error('HATA', 'E-Posta Parametre Hatası (to_mails)');
					endif;
				else:
					$this -> _error('HATA', 'E-Posta Parametre Hatası (from_title)');
				endif;
			else:
				$this -> _error('HATA', 'E-Posta Parametre Hatası');
			endif;			
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

		/**
		*  URI PARÇALAYICI
		* @param module_name string
		* @param module_arg string
		* @return void
		*/
		public function Uri_Parser ($module_name = null, $module_arg = null)
		{
			// GETTEN GELEN VERİLERİ TEMİZLE
			$module_name 			= trim(addslashes(strip_tags($module_name)));
			$module_arg 			= trim(addslashes(strip_tags($module_arg)));

			if ($module_name):
				switch ($module_name):

					case self::shortname_category:
						$this -> _category_detail($module_arg);
						break;

					case self::shortname_product:
						$this -> _product_detail($module_arg);
						break;

					case self::shortname_service:
						$this -> _service_detail($module_arg);
						break;

					case self::shortname_page:
						$this -> _page_detail($module_arg);
						break;

					case self::shortname_sitemap:
						$this -> _sitemap();
						break;

					case self::shortname_save_contact:
						$this -> _save_contact($module_arg);
						break;

					case self::shortname_join_course:
						$this -> _join_course($module_arg);
						break;

					case self::shortname_register_course:
						$this -> _register_course($module_arg);
						break;
						
					default:
						$this -> _error();
						break;

				endswitch;
			else:
				$this -> _index();
			endif;
		}


		private function _index ()
		{
			// ÖNERİLEN ÜRÜNLERİ ÇEK
			$get_suggested			= $this -> Front_End_Model -> get_suggested(6);

			foreach ($get_suggested as $key => $product):
				if (strlen($product -> product_name) > 30):

					if (function_exists('mb_substr'))
						$get_suggested[$key] -> product_shortname = mb_substr($product -> product_name, 0, 30).'...';
					else
						$get_suggested[$key] -> product_shortname = substr($product -> product_name, 0, 30).'...';
						
				else:
					$get_suggested[$key] -> product_shortname = $product -> product_name;
				endif;

				// LİNK BELİRLE
				$get_suggested[$key] -> product_link = base_url('u/'.$product -> product_url.'-'.$product -> product_id);

				// KAPAK FOTOĞRAFI BELİRLE
				$get_suggested[$key] -> product_photo = base_url(self::upload_product_photo_index_dir.$product -> product_cover_photo);

				// FİYATI BELİRLE
				$get_suggested[$key] -> product_price = (!empty($product -> product_price) ? number_format($product -> product_price, 0, '.', '.').' '.$this -> site_currency : "");

				// İNDİRİMLİ FİYATI BELİRLE
				if ($get_suggested[$key] -> product_discount_price):
					$get_suggested[$key] -> product_discount_price = (!empty($product -> product_discount_price) ? number_format($product -> product_discount_price, 0, '.', '.').' '.$this -> site_currency : "");
				endif;
			endforeach;

			// GALERİLERİ ÇEK
			$get_gallery = $this->Front_End_Model->get_gallery_photos ();

			// HİZMETLERİ ÇEK
			$get_services			= $this -> Front_End_Model -> get_services();

			// RENDER ET
			$this -> _render('front_end/index', [
				'page' 					=> $this -> _page('Anasayfa'),
				'settings' 				=> $this -> _settings(),
				'site_menus' 			=> $this -> site_menus,
				'site_categories' 		=> $this -> site_categories,
				'get_slider'			=> $this -> Front_End_Model -> get_slider(),
				'get_suggested'			=> $get_suggested,
				'get_galleries'			=> $get_gallery,
				'get_services'			=> $get_services,
			]);
		}

		private function _product_detail ($arg)
		{
			// GETTEN GELEN VERİYİ AL TEMİZLE
			$explode 					= explode('-', $arg);
			$product_id 				= end($explode);

			// ÜRÜNÜ ÇEK
			$get_product 				= $this -> Front_End_Model -> get_product($product_id);

			if (!empty($get_product)):
				
				if (strlen($get_product -> product_name) > 30):

					if (function_exists('mb_substr'))
						$get_product -> product_shortname = mb_substr($get_product -> product_name, 0, 30).'...';
					else
						$get_product -> product_shortname = substr($get_product -> product_name, 0, 30).'...';
						
				else:
					$get_product -> product_shortname = $get_product -> product_name;
				endif;

				// LİNK BELİRLE
				$get_product -> product_link = base_url('u/'.$get_product -> product_url.'-'.$get_product -> product_id);

				// KAPAK FOTOĞRAFI BELİRLE
				$get_product -> product_photo = base_url(self::upload_product_photo_index_dir.$get_product -> product_cover_photo);


				// STOK DURUNU BELİRLE
				if ($get_product -> product_stock)
					$get_product -> product_stock = 'Var';
				else
					$get_product -> product_stock = 'Yok';


				// ÜRÜN ÖZELLİKLERİNİ BELİRLE
				if ($get_product -> product_new) // YENİ ÜRÜN
					$get_product -> product_new = true;
				else
					$get_product -> product_new = false;

				if ($get_product -> product_suggested) // ÖNERİLEN ÜRÜN
					$get_product -> product_suggested = true;
				else
					$get_product -> product_suggested = false;

				if ($get_product -> product_discount) // İNDİRİMLİ ÜRÜN
					$get_product -> product_discount = true;
				else
					$get_product -> product_discount = false;

				if ($get_product -> product_best_selling) // ÇOK SATAN ÜRÜN
					$get_product -> product_best_selling = true;
				else
					$get_product -> product_best_selling = false;
				
				// FİYATI BELİRLE
				$get_product -> product_price = (!empty($get_product -> product_price) ? number_format($get_product -> product_price, 0, '.', '.').' '.$this -> site_currency:"");

				// İNDİRİMLİ FİYATI BELİRLE
				if ($get_product -> product_discount_price):
					$get_product -> product_discount_price = (!empty($get_product -> product_discount_price) ? number_format($get_product -> product_discount_price, 0, '.', '.').' '.$this -> site_currency:"");
				endif;

				// ÜRÜN FOTOĞRAFLARINI ÇEK
				$get_product_photos = $this -> Front_End_Model -> get_product_photos($get_product -> product_photo_code);
				
				// FOTOĞRAF YOLUNU AYARLA
				foreach ($get_product_photos as $photo_id => $photo_name):
					$get_product_photos[$photo_id] -> product_photo_path_small =  base_url(self::upload_product_photo_small_dir.$photo_name -> product_photo_name);
					$get_product_photos[$photo_id] -> product_photo_path_medium =  base_url(self::upload_product_photo_medium_dir.$photo_name -> product_photo_name);
					$get_product_photos[$photo_id] -> product_photo_path_large =  base_url(self::upload_product_photo_large_dir.$photo_name -> product_photo_name);
				endforeach;

				// ÜRÜN GÖRÜNTÜLENME SAYISINI ARTTIR
				$this -> Front_End_Model -> product_view_count_increment($product_id);

				// RENDER ET
				$this -> _render('front_end/product_detail', [
					'page' 							=> $this -> _page($get_product -> product_name),
					'settings' 						=> $this -> _settings(),
					'site_menus' 					=> $this -> site_menus,
					'site_categories' 				=> $this -> site_categories,
					'get_product'					=> $get_product,
					'get_product_photos'			=> $get_product_photos,
				]);
			
			else:
				$this -> _error();
			endif;
		}

		private function _category_detail ($arg)
		{
			// GETTEN GELEN VERİYİ AL
			$arg 					= trim(addslashes(strip_tags($arg)));

			$category_info 				= null;

			// KATEGORİYİ ÇEK
			foreach ($this -> site_categories as $cat_value):
				if ($cat_value -> category_url == $arg):
					if ($cat_value -> category_status == 1):
						$category_info = $cat_value;
						break;
					endif;
				endif;
			endforeach;

			$sub_categories = [];
			foreach ($this -> site_categories as $cat_value):
				if ($cat_value -> category_id != $category_info -> category_id):
					if ($cat_value -> category_top_category_id == $category_info -> category_id):
						array_push($sub_categories, $cat_value);
					endif;
				endif;
			endforeach;

			foreach ($sub_categories as $sub_category_key => $sub_category_value):
				$sub_categories[$sub_category_key] -> _photo =  base_url(self::upload_category_cover_dir.$sub_category_value -> category_cover_photo);
				$sub_categories[$sub_category_key] -> _url =  base_url('k/'.$sub_category_value -> category_url);
			endforeach;

			if (!empty($category_info)):

				// KÜTÜPHANEYE GÖNDERİLECEK VERİLER
				$pagination_config =
				[
					'base_url' 				=> $this -> uri -> segment(2),
					'total_rows' 			=> $this -> Front_End_Model -> get_category_product_count($category_info->category_id),
					'uri_segment' 			=> 2,
					'per_page' 				=> 80,
					'num_links' 			=> 3,
					'first_link' 			=> 'İlk',
					'last_link' 			=> 'Son',
				];

				// SAYFALAMA BAŞLANGIÇ AYARLARINI YAP
				$this -> pagination -> initialize($pagination_config);

				// URLDEN SAYFA NO GELMEDİYSE
				$page = ($this -> uri -> segment(3)) ? $this -> uri -> segment(3) : 0;

				// MODEL SAYFASINA GÖNDERİLECEK VERİLER
				$model_data =
				[
					'f_min_price'	 				=> 0,
					'f_max_price'	 				=> 100000000,
					// 'f_category'	 				=> $subCategory,
					'f_property_new'	 			=> '0, 1',
					'f_property_suggested'	 		=> '0, 1',
					'f_warranty'	 				=> null,
					'f_delivery'	 				=> null,
					'category_id'					=> $category_info->category_id,
					'per_page'						=> $pagination_config['per_page'],
					'uri_segment'					=> $page
				];

				// KATEGORİDEKİ ÜRÜNLERİ ÇEK
				$get_category_products 								= $this -> Front_End_Model -> get_category_products($model_data);

				// İNİDİRMLİ FİYATINI HESAPLA
				foreach ($get_category_products as $value_product):
					if ($value_product -> product_discount_price):
						$value_product -> product_discount_price = (!empty($value_product -> product_price) ? number_format($value_product -> product_discount_price, 0, '.', '.').' '.$this -> site_currency : "");
					endif;
					if ($value_product -> product_price):
						$value_product -> product_price = (!empty($value_product->product_price) ? number_format($value_product -> product_price, 0, '.', '.').' '.$this -> site_currency : "");
					endif;
				endforeach;



				// KISA İSİM BELİRLE
				foreach ($get_category_products as $key => $product):
					if (strlen($product -> product_name) > 30):

						if (function_exists('mb_substr'))
							$get_category_products[$key] -> product_shortname = mb_substr($product -> product_name, 0, 30).'...';
						else
							$get_category_products[$key] -> product_shortname = substr($product -> product_name, 0, 30).'...';
							
					else:
						$get_category_products[$key] -> product_shortname = $product -> product_name;
					endif;
				endforeach;

				// LİNK BELİRLE
				foreach ($get_category_products as $key => $product):
					$get_category_products[$key] -> product_link = base_url('u/'.$product -> product_url.'-'.$product -> product_id);
				endforeach;

				// KAPAK FOTOĞRAFI BELİRLE
				foreach ($get_category_products as $key => $product):
					$get_category_products[$key] -> product_photo = base_url(self::upload_product_photo_index_dir.$product -> product_cover_photo);
				endforeach;


				$category['detail'] 								= $category_info;
				$category['sub_categories'] 						= $sub_categories;
				$category['product_count'] 							= $pagination_config['total_rows'];
				$category['products'] 								= $get_category_products;
				// $category['slider_photos'] 							= $this -> Front_End_Model -> get_category_slider_photos($category_info -> category_id);

				// VIEW SAYFASINI YÜKLE
				$this -> _render('front_end/category_detail', [
					'page'								=> $this -> _page($category_info -> category_name),
					'settings' 							=> $this -> _settings(),
					'site_menus'						=> $this -> site_menus,
					'category'							=> $category,
				]);
			else:
				// VIEW SAYFASINI YÜKLE
				$this -> _error();
			endif;
		}

		private function _page_detail ($page)
		{
			// SAYFAYI ÇEK
			if (!empty($get_page = $this -> Front_End_Model -> get_page($page))):

				// GÖRÜNTÜLENEM ARTTIR
				$this -> Front_End_Model -> page_view_count_increment($get_page -> page_id);

				// GALERİ KALIBI
				$pattern_gallery = '/\[galeri-[0-9]+\]/i';
				preg_match_all($pattern_gallery, $get_page -> page_text, $results_gallery);
				if (@count($results_gallery) > 0):
					// FORM KODU
					@$gallery_code 									= $results_gallery[0]; 

					foreach ($gallery_code  as $key => $value):
						// GALERİYİ ÇEK
						$get_gallery 									= $this -> Front_End_Model -> get_gallery([
							'gallery_code'			=> $value,
							'gallery_status'		=> 1
						]);

						if (count($get_gallery) > 0):
							unset($gallery_code[0]);
							unset($gallery_code[1]);

							// GALERİ FOTOĞRAFLARINI ÇEK
							$get_gallery_photos 								= $this -> Front_End_Model -> get_gallery_photos($get_gallery -> gallery_id);

							$gallery = '<div style="text-align: center;"><h3 style="color: #333;">'.$get_gallery -> gallery_name.'</h3>';
							foreach ($get_gallery_photos as $value_photo)
							{
								$gallery 	.= '<a href="'.base_url('public/uploads/galleries/580/'.$value_photo -> gallery_photo_name).'" data-fancybox="gallery"><img style="margin: 5px;" width="'.$get_gallery -> gallery_photo_size.'" src="'.base_url('public/uploads/galleries/450x450/'.$value_photo -> gallery_photo_name).'" /></a>';
							}
							$gallery 		.= '</div>';

							$page_content				= $get_page -> page_content;
							$page_content 				= str_replace($value, $gallery, $page_content);

							$get_page -> page_content =  $page_content;
						endif;
					endforeach;
				endif;

				if ($get_page -> page_template_id == 1):

					// RENDER ET
					$this -> _render('front_end/page_detail_blank', [
						'page' 				=> $this -> _page($get_page -> page_title),
						'settings' 				=> $this -> _settings(),
						'site_menus' 			=> $this -> site_menus,
						'get_page' 				=> $get_page
					]);
				elseif ($get_page -> page_template_id == 2):
					// RENDER ET
					$this -> _render('front_end/page_detail_group', [
						'page' 					=> $this -> _page($get_page -> page_title),
						'settings' 				=> $this -> _settings(),
						'site_menus' 			=> $this -> site_menus,
						'get_page' 				=> $get_page
					]);

				elseif ($get_page -> page_template_id == 3):
					// RENDER ET
					$this -> _render('front_end/page_detail_service', [
						'page' 				=> $this -> _page($get_page -> page_title),
						'settings' 				=> $this -> _settings(),
						'site_menus'			=> $this -> site_menus,
						'get_page' 				=> $get_page,
						'services' 				=> $this -> Front_End_Model -> get_services(),
					]);
				elseif ($get_page -> page_template_id == 6):
					// RENDER ET
					$this -> _render('front_end/page_detail_contact', [
						'page' 				=> $this -> _page($get_page -> page_title),
						'settings' 				=> $this -> _settings(),
						'site_menus'			=> $this -> site_menus,
						'get_page' 				=> $get_page,
						'services' 				=> $this -> Front_End_Model -> get_services(),
					]);
				elseif ($get_page -> page_template_id == 5):

					if ($this -> input -> post()):
						// POSTTAN GELEN VERİLERİ AL
						$name = $this -> input -> post('name', TRUE);
						$phone = $this -> input -> post('phone', TRUE);
						$complaint = $this -> input -> post('complaint', TRUE);

						$mail_text 	= '<p>Ad Soyad: '.$name.'</p>';
						$mail_text .= '<p>Telefon: '.$phone.'</p>';
						$mail_text .= '<p>Yaşadığı Problem: '.$complaint.'</p>';

						if ($this -> _email_send([
							'from_title'			=> $this -> site_settings_email -> email_setting_name_surname,
							'to_mails'				=> $this -> site_settings -> setting_site_email,
							'subject'				=> 'Siteden Mesaj',
							'content'				=> $mail_text,
							'template_file'			=> 'front_end/mail_template'
						])):
							redirect(base_url(uri_string().'?sendAction=true'));
						endif;
					endif;

					// RENDER ET
					$this -> _render('front_end/page_detail_contact', [
						'page' 				=> $this -> _page($get_page -> page_title),
						'settings' 				=> $this -> _settings(),
						'site_menus' 			=> $this -> site_menus,
						'get_page' 				=> $get_page
					]);

				endif;
			else:
				$this ->  _error();
			endif;
		}

		private function _service_detail ($service)
		{
			if ($service):
				// HİZMETİ ÇEK
				$get_service = $this -> Front_End_Model -> get_service($service);

				if (!empty($get_service)):
					// RENDER ET
					$this -> _render('front_end/service_detail', [
						'page' 					=> $this -> _page($get_service -> service_title),
						'social_media' 			=> $this -> site_settings_social_media,
						'settings' 						=> $this -> _settings(),
						'site_menus' 			=> $this -> site_menus,
						'get_service' 			=> $get_service,
					]);
				else:
					$this -> _error();
				endif;
			else:
				$this -> _error();
			endif;
		}

		private function _sitemap ()
		{
			// SİTE HARİTASI AYARLARINI ÇEK
			$get_sitemap_settings 					= $this -> Front_End_Model -> get_sitemap_settings();

			if ($get_sitemap_settings -> sitemap_status):
				if ($get_sitemap_settings -> sitemap_list_pages)
					$get_sitemap_pages 						= $this -> Front_End_Model -> get_sitemap_pages();
				else
					$get_sitemap_pages 						= [];

				if ($get_sitemap_settings -> sitemap_list_services)
					$get_sitemap_services 						= $this -> Front_End_Model -> get_sitemap_services();
				else
					$get_sitemap_services 						= [];

				if ($get_sitemap_settings -> sitemap_list_products)
					$get_sitemap_products 					= $this -> Front_End_Model -> get_sitemap_products();
				else
					$get_sitemap_products 					= [];

				if ($get_sitemap_settings -> sitemap_list_categories)
					$get_sitemap_categories 				= $this -> Front_End_Model -> get_sitemap_categories();
				else
					$get_sitemap_categories 				= [];

				if ($get_sitemap_settings -> sitemap_list_articles)
					$get_sitemap_articles 					= $this -> Front_End_Model -> get_sitemap_articles();
				else
					$get_sitemap_articles 					= [];


				// VIEW SAYFASINI YÜKLE
				$this -> load -> view('front_end/sitemap.php', [
					'get_sitemap_pages'					=> $get_sitemap_pages,
					'get_sitemap_services'				=> $get_sitemap_services,
					'get_sitemap_products'				=> $get_sitemap_products,
					'get_sitemap_categories'			=> $get_sitemap_categories,
					'get_sitemap_articles'				=> $get_sitemap_articles,
				]);
			else:
				// VIEW SAYFASINI YÜKLE
				$this -> _error();
			endif;			
		}

		// İLETİŞİM FORMU KAYDETME
		public function _save_contact ()
		{
			if(!empty(rClean($this->input->post())))
			{
				/**
				 * Setting POST Data with rClean (Recursive Array Xss Cleaner)
				 */
				$data = rClean($this->input->post());
				$data["message_date"] = time();

				$err = false;
				// Check $data has empty value
				foreach ($data as $key => $value) {
					$value = clean($value);
					if (empty($value))
						$err = true;
				}
				// If $data has empty value return error
				if($err){
					$this->session->set_flashdata("alert",["success" => false,"title" => "Başarısız!", "msg" => "İletişim Formu Bilgilerini Doldurduğunuzdan Emin Olup, Lütfen Tekrar Deneyin!"]);
				}else{
					// Else save $data to db
					if($this->Front_End_Model->save_contact($data))
					{
						$this->session->set_flashdata("alert",["success" => true,"title" => "Başarılı!", "msg" => "İletişim Formu Başarıyla Gönderildi."]);
					}else{
						$this->session->set_flashdata("alert",["success" => false,"title" => "Başarısız!", "msg" => "İletişim Formu Kayıt Edilirken Hata Oluştu."]);
					}
				}
			}else{
				$this->session->set_flashdata("alert",["success" => false,"title" => "Başarısız!", "msg" => "İletişim Formu Bilgilerini Doldurduğunuzdan Emin Olup, Lütfen Tekrar Deneyin!"]);
			}
			// Reload Page
			redirect(base_url('s/iletisim'));
		}

		// EĞİTİM FORMU
		public function _join_course ()
		{

			// RENDER ET
			$this -> _render('front_end/register_course', [
				'page' 					=> $this -> _page('Anasayfa'),
				'settings' 				=> $this -> _settings(),
				'site_menus' 			=> $this -> site_menus,
				'site_categories' 		=> $this -> site_categories,
				'get_slider'			=> $this -> Front_End_Model -> get_slider(),
				'get_products'			=> $this -> Front_End_Model -> get_product(),
			]);
		}

		// EĞİTİM FORMU KAYDETME
		public function _register_course ()
		{
			if(!empty(rClean($this->input->post())))
			{
				/**
				 * Setting POST Data with rClean (Recursive Array Xss Cleaner)
				 */
				$data = rClean($this->input->post());
				$data["reservation_birthday"] = strtotime(@$data["reservation_birth_year"]."-".@$data["reservation_birth_month"]."-".@$data["reservation_birth_day"]);
				$data["reservation_date"] = time();
				unset($data["reservation_birth_day"]);
				unset($data["reservation_birth_month"]);
				unset($data["reservation_birth_year"]);
				$err = false;
				// Check $data has empty value
				foreach ($data as $key => $value) {
					$value = clean($value);
					if (empty($value))
						$err = true;
				}
				// If $data has empty value return error
				if($err){
					$this->session->set_flashdata("alert",["success" => false,"title" => "Başarısız!", "msg" => "Eğitim Kayıt Formu Bilgilerini Doldurduğunuzdan Emin Olup, Lütfen Tekrar Deneyin!"]);
				}else{
					// Else save $data to db
					if($this->Front_End_Model->save_course($data))
					{
						$this->session->set_flashdata("alert",["success" => true,"title" => "Başarılı!", "msg" => "Eğitim Kayıt Formu Başarıyla Gönderildi. Ödemenizi İletişim Sayfamızdaki IBAN Numarasına Gönderebilirsiniz."]);
					}else{
						$this->session->set_flashdata("alert",["success" => false,"title" => "Başarısız!", "msg" => "Eğitim Kayıt Formu Kayıt Edilirken Hata Oluştu."]);
					}
				}
			}else{
				$this->session->set_flashdata("alert",["success" => false,"title" => "Başarısız!", "msg" => "Eğitim Kayıt Formu Bilgilerini Doldurduğunuzdan Emin Olup, Lütfen Tekrar Deneyin!"]);
			}
			// Reload Page
			redirect(base_url('egitim-kayit'));
		}
	}