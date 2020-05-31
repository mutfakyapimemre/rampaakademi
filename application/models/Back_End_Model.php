<?php
	/**
	* MUTFAK YAPIM E-TİCARET SİSTEMİ 
	* 
	* BACK-END MODEL
	* @copyright		Mutfak Yapım 2019		
	* @link				www.mutfakyapim.com
	* @version			v1.0.0
	* @author 			Asaf Mirtürk (asaf.mirturk@mutfakyapim.com)
	*/
	class Back_End_Model extends CI_Model
	{
		########################################################################################
		# AYARLAR
		########################################################################################

		public function __construct()
		{
			parent::__construct();
		}

		/**
		* SİTE AYARLARI ÇEK
		* @return object
		*/
		public function get_site_settings ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_settings')
					-> row();
		}

		/**
		* SİTE AYARLARI DÜZENLE
		* @param  array
		* @return boolean
		*/
		public function edit_site_settings ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_settings
						SET setting_site_name 		= "'.$arg["site_settings_name"].'",
						setting_site_keywords 		= "'.$arg["site_settings_keyword"].'",
						setting_site_description 	= "'.$arg["site_settings_description"].'",
						setting_site_email 			= "'.$arg["site_settings_email"].'",
						setting_site_adress 		= "'.$arg["site_settings_adress"].'",
						setting_site_phone 			= "'.$arg["site_settings_phone"].'",
						setting_site_phone_2 		= "'.$arg["site_settings_phone_2"].'",
						setting_site_status 		= '.$arg["site_settings_status"]);
					
						 
		}

		/**
		* LOGO KAYDET
		* @return file_name string
		* @return boolean
		*/
		public function set_logo ($file_name)
		{
			return $this
					-> db
					-> query('UPDATE site_settings
						SET setting_logo 				= "'.$file_name.'"');
		}


		/**
		* LOGO KAYDET
		* @return file_name string
		* @return boolean
		*/
		public function set_favicon ($file_name)
		{
			return $this
					-> db
					-> query('UPDATE site_settings
						SET setting_favicon 			= "'.$file_name.'"');
		}

		/**
		* SOSYAL MEDYA AYARLARINI ÇEK
		* @return object
		*/
		public function get_settings_social_media ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_settings_social_media')
					-> row();
		}

		/**
		* SOSYAL MEDYA AYARLARINI DÜZENLE
		* @return array
		* @return boolean
		*/
		public function edit_settings_social_media ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_settings_social_media
						SET social_media_instagram 			= "'.$arg["site_settings_instagram"].'",
						social_media_twitter 				= "'.$arg["site_settings_twitter"].'",
						social_media_facebook 				= "'.$arg["site_settings_facebook"].'",
						social_media_youtube 				= "'.$arg["site_settings_youtube"].'",
						social_media_linkedin 				= "'.$arg["site_settings_linkedin"].'"');

		}
		
		/**
		* HARİCİ ÇOK AYARLARINI ÇEK
		* @return object
		*/
		public function get_external_code_settings ()
		{
			return $this
					-> db
					-> query('SELECT
						s_s.setting_site_external_code
						FROM site_settings AS s_s')
					-> row();
		}

		/**
		* SİTE HARİTASI AYARLARINI ÇEK
		* @return object
		*/
		public function get_sitemap_settings ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_settings_sitemap AS s_s_s')
					-> row();
		}

		
		/**
		* E-POSTA AYARLARINI DÜZENLE
		* @return string
		* @return boolean
		*/
		public function edit_settings_external ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_settings
						SET setting_site_external_code 			= "'.$arg.'"');

		}

		/**
		* E-POSTA AYARLARINI ÇEK
		* @return object
		*/
		public function get_settings_email ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_settings_email')
					-> row();
		}
		
		/**
		* E-POSTA AYARLARINI DÜZENLE
		* @return array
		* @return boolean
		*/
		public function edit_settings_email ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_settings_email
						SET email_setting_protocol 				= "'.$arg["site_settings_email_protocol"].'",
						email_setting_smtp_host 				= "'.$arg["site_settings_email_server_adress"].'",
						email_setting_smtp_port 				= "'.$arg["site_settings_email_server_port"].'",
						email_setting_smtp_user 				= "'.$arg["site_settings_user"].'",
						email_setting_password 					= "'.$arg["site_settings_user_password"].'",
						email_setting_crypto 					= "'.$arg["site_settings_email_crypto"].'",
						email_setting_name_surname 				= "'.$arg["site_settings_name_surname"].'"');

		}

		/**
		* SİTE HARİTASI AYARLARINI DÜZENLE
		* @return array
		* @return boolean
		*/
		public function edit_settings_sitemap ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_settings_sitemap
						SET sitemap_list_products 			= "'.$arg["setting_list_product"].'",
						sitemap_list_pages 					= "'.$arg["setting_list_page"].'",
						sitemap_list_categories 			= "'.$arg["setting_list_category"].'",
						sitemap_list_articles 				= "'.$arg["setting_list_article"].'",
						sitemap_list_services 				= "'.$arg["setting_list_service"].'",
						sitemap_status 						= "'.$arg["setting_status"].'"');

		}



		########################################################################################
		# MENÜLER
		########################################################################################

		/**
		* MENÜLERİ ÇEK
		* @return array
		*/
		public function get_menus ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_menus AS s_m
						ORDER BY s_m.menu_rank ASC')
					-> result();
		}

		/**
		* MENÜ EKLE
		* @param array
		* @return boolean
		*/
		public function add_menu ($arg)
		{
			return $this
					-> db
					-> query('INSERT INTO site_menus
						SET menu_name = "'.$arg['menu_add_name'].'",
						menu_link_page = "'.$arg['menu_add_link_page'].'",
						menu_link_url = "'.$arg['menu_add_link_url'].'",
						menu_top_menu_id = "'.$arg['menu_add_top_menu'].'",
						menu_status = "'.$arg['menu_add_status'].'",
						menu_create_time = '.$arg['create_time'].',
						menu_target = "'.$arg['menu_add_target'].'",
						menu_type = "'.$arg['menu_add_type'].'"');
		}

		/**
		* MENÜYÜ ÇEK
		* @param integer
		* @return array
		*/

		public function get_menu ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_menus AS s_m
						WHERE s_m.menu_id = '.$arg)
					-> row();
		}

		/**
		* MENÜYÜ SİL
		* @param integer
		* @return boolean
		*/

		public function delete_menu ($arg)
		{
			return $this
					-> db
					-> query('DELETE FROM site_menus
						WHERE menu_id = '.$arg);
		}


		/**
		* MENÜYÜ DÜZENLE
		* @param array
		* @return boolean
		*/
		public function edit_menu ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_menus
						SET menu_name = "'.$arg['menu_edit_name'].'",
						menu_link_page = "'.$arg['menu_edit_link_page'].'",
						menu_link_url = "'.$arg['menu_edit_link_url'].'",
						menu_top_menu_id = "'.$arg['menu_edit_top_menu'].'",
						menu_status = "'.$arg['menu_edit_status'].'",
						menu_target = "'.$arg['menu_edit_target'].'",
						menu_type = "'.$arg['menu_edit_type'].'",
						menu_edit_time = '.$arg['edit_time'].'
						WHERE menu_id = '.$arg['menu_id']);
		}

		/**
		* MENÜ ARA
		* @param string
		* @return array
		*/
		public function get_search_menus ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_menus AS s_m
						WHERE MATCH(s_m.menu_name) 
						AGAINST ("'.$arg.'" IN NATURAL LANGUAGE MODE) OR
						s_m.menu_name LIKE "%'.$arg.'%"')
					-> result();
		}

		/**
		* MENÜ SIRALAMASINI DÜZENLE
		* @param array
		* @return boolean
		*/
		public function edit_menu_rank ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_menus
						SET menu_rank = '.$arg['rank'].'
						WHERE menu_id = '.$arg['menu_id']);
		}

		/**
		* SAYFALARI ÇEK
		* @return array
		*/
		public function get_menu_pages ()
		{
			return $this
					-> db
					-> query('SELECT
						s_p.page_title,
						s_p.page_url
						FROM site_pages AS s_p
						WHERE s_p.page_status = 1')
					-> result();
		}

		/**
		* ÜRÜNLERİ ÇEK
		* @return array
		*/
		public function get_menu_products ()
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_name,
						s_p.product_url
						FROM site_products AS s_p
						WHERE s_p.product_status = 1')
					-> result();
		}

		/**
		* ÜRÜN KATEGORİLERİNİ ÇEK
		* @return array
		*/
		public function get_menu_product_categories ()
		{
			return $this
					-> db
					-> query('SELECT
						s_c.category_name,
						s_c.category_url
						FROM site_categories AS s_c
						WHERE s_c.category_status = 1')
					-> result();
		}

		/**
		* MAKALELERİ ÇEK
		* @return array
		*/
		public function get_menu_blogs ()
		{
			return $this
					-> db
					-> query('SELECT
						s_b_a.article_title,
						s_b_a.article_url
						FROM site_blog_articles AS s_b_a
						WHERE s_b_a.article_status = 1')
					-> result();
		}


		########################################################################################
		# KATEGORİLER
		########################################################################################

		/**
		* KATEGORİLERİ ÇEK
		* @return array
		*/
		public function get_categories ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_categories AS s_c
						ORDER BY s_c.category_rank ASC')
					-> result();
		}


		/**
		* KATEGORİYİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_category ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_categories AS s_p_c
						WHERE s_p_c.category_id = '.$arg)
					-> row();
		}

		/**
		* KATEGORİ EKLE
		* @param array
		* @return integer
		*/
		public function add_category ($arg)
		{
			$this
				-> db
				-> query('INSERT INTO site_categories
					SET category_name = "'.$arg['category_add_name'].'",
					category_url = "'.$arg['category_add_url'].'",
					category_meta_keywords = "'.$arg['category_add_keyword'].'",
					category_meta_description = "'.$arg['category_add_description'].'",
					category_text = "'.$arg['category_add_text'].'",
					category_status = '.$arg['category_add_status'].',
					category_top_category_id = '.$arg['category_add_top_category'].',
					category_create_time = "'.$arg['create_time'].'"');

			return $this
					-> db
					-> insert_id();
		}

		/**
		* KATEGORİ KAPAK FOTOĞRAFINI EKLE
		* @param array
		* @return integer
		*/
		public function add_category_edit_photo ($arg)
		{
			$this
				-> db
				-> query('UPDATE site_categories
					SET category_cover_photo = "'.$arg['photo_name'].'"
					WHERE category_id = '.$arg['category_id']);

			return $this
					-> db
					-> insert_id();
		}


		/**
		* KATEGORİ SLAYT FOTOĞRAFLARINI YÜKLE
		* @param array
		* @return boolean
		*/
		public function add_category_slider_photo ($arg)
		{
			return $this
					-> db
					-> query('INSERT site_category_slider_photos
						SET category_slider_photo_name = "'.$arg['photo_name'].'",
						category_slider_photo_category_id = "'.$arg['category_id'].'"');
		}

		/**
		* KATEGORİLERİ ÇEK (EDIT)
		* @param integer
		* @return array
		*/
		public function get_edit_categories ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_categories as s_c
						WHERE s_c.category_id != '.$arg)
					-> result();
		}

		/**
		* KATEGORİYİ DÜZENLE
		* @param array
		* @return boolean
		*/
		public function edit_category ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_categories
						SET category_name = "'.$arg['category_edit_name'].'",
						category_url = "'.$arg['category_edit_url'].'",
						category_status = '.$arg['category_edit_status'].',
						category_top_category_id = '.$arg['category_edit_top_category'].'
						WHERE category_id = '.$arg['category_id']);
		}

		/**
		* KATEGORİ URL ADRESİNİ KONTROL ET
		* @param string
		* @return array
		*/
		public function check_category_url ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						COUNT(s_c.category_id) AS Count
						FROM site_categories AS s_c
						WHERE s_c.category_url = "'.$arg.'"')
					-> row() -> Count;
		}

		/**
		* KATEGORİ URL ADRESİNİ KONTROL ET (DÜZENLE)
		* @param array
		* @return array
		*/
		public function check_edit_category_url ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						COUNT(s_c.category_id) AS Count
						FROM site_categories AS s_c
						WHERE s_c.category_url = "'.$arg['category_edit_url'].'" AND
						s_c.category_id != '.$arg['category_id'])
					-> row() -> Count;
		}

		/**
		* KATEGORİ SLAYT FOTOĞRAFLARINI ÇEK
		* @param integer
		* @return array
		*/
		public function get_category_slider_photos ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						s_c_s_p.category_slider_photo_id,
						s_c_s_p.category_slider_photo_name
						FROM site_category_slider_photos AS s_c_s_p
						WHERE s_c_s_p.category_slider_photo_category_id = '.$arg)
					-> result();
		}

		/**
		* KATEGORİ SLAYT FOTOĞRAFINI SİL
		* @param integer
		* @return boolean
		*/
		public function delete_category_slider_photo ($arg)
		{
			return $this
					-> db
					-> query('DELETE
						FROM site_category_slider_photos
						WHERE category_slider_photo_id = '.$arg);
		}

		/**
		* ALT KATEGORİ SAYISINI ÇEK
		* @param integer
		* @return object
		*/
		public function get_category_sub_category_count ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						COUNT(s_c.category_id) AS Count
						FROM site_categories AS s_c
						WHERE s_c.category_top_category_id = '.$arg)
					-> row();
		}

		/**
		* KATEGORİDEKİ ÜRÜN SAYISINI ÇEK
		* @param integer
		* @return object
		*/
		public function get_category_product_count ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						COUNT(s_p.product_id) AS Count
						FROM site_products AS s_p
						WHERE s_p.product_category_id = '.$arg)
					-> row();
		}

		/**
		* KATEGORİYİ SİL
		* @param integer
		* @return boolean
		*/
		public function delete_category ($arg)
		{
			return $this
					-> db
					-> query('DELETE FROM site_categories
						WHERE category_id = '.$arg);
		}
		
		

		########################################################################################
		# ÜRÜNLER
		########################################################################################

		/**
		* ÜRÜNLERİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_products ($arg = null)
		{
			$query = 'SELECT
			s_p.product_id,
			s_p.product_notes,
			s_p.product_name,
			s_p.product_url,
			s_p.product_cover_photo,
			s_p.product_category_id,
			s_p.product_ranking,
			s_p.product_status,
			s_p.product_price,
			s_p.product_create_time,
			s_p.product_view_count,
			s_p.product_quota,
			s_p_c.category_name,
			s_p_c.category_url
			FROM site_products AS s_p
			LEFT JOIN site_categories AS s_p_c
			ON s_p.product_category_id = s_p_c.category_id
			ORDER BY s_p.product_id DESC';
			if(!empty($arg))
				$query.= ' LIMIT '.$arg['uri_segment'].','.$arg['per_page'];
			return $this
					-> db
					-> query($query)
					-> result();
		}

		/**
		* KATEGORİDEKİ ÜRÜNLERİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_category_products ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_id,
						s_p.product_notes,
						s_p.product_name,
						s_p.product_url,
						s_p.product_cover_photo,
						s_p.product_category_id,
						s_p.product_ranking,
						s_p.product_status,
						s_p.product_price
						FROM site_products AS s_p
						WHERE s_p.product_category_id = '.$arg)
					-> result();
		}

		/**
		* ÜRÜNLERİN SAYISINI ÇEK
		* @return integer
		*/
		public function get_product_count ()
		{
			return $this
					-> db
					-> query('SELECT
						COUNT(s_p.product_id) AS Count
						FROM site_products AS s_p')
					-> row() -> Count;
		}

		/**
		* YENİ ÜRÜNLERİN SAYISINI ÇEK
		* @return integer
		*/
		public function get_new_product_count ()
		{
			return $this
					-> db
					-> query('SELECT
						COUNT(s_p.product_id) AS Count
						FROM site_products AS s_p
						WHERE s_p.product_new = 1')
					-> row() -> Count;
		}

		/**
		* YENİ ÜRÜNLERİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_new_products ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_id,
						s_p.product_notes,
						s_p.product_name,
						s_p.product_url,
						s_p.product_cover_photo,
						s_p.product_category_id,
						s_p.product_ranking,
						s_p.product_status,
						s_p.product_price,
						s_p.product_create_time,
						s_p.product_view_count,
						s_p_c.category_name,
						s_p_c.category_url
						FROM site_products AS s_p
						LEFT JOIN site_categories AS s_p_c
						ON s_p.product_category_id = s_p_c.category_id
						WHERE s_p.product_new = 1
						ORDER BY s_p.product_id DESC
						LIMIT '.$arg['uri_segment'].','.$arg['per_page'])
					-> result();
		}

		/**
		* YENİ ÜRÜNLERİN SAYISINI ÇEK
		* @return integer
		*/
		public function get_discount_product_count ()
		{
			return $this
					-> db
					-> query('SELECT
						COUNT(s_p.product_id) AS Count
						FROM site_products AS s_p
						WHERE s_p.product_discount = 1')
					-> row() -> Count;
		}
		
		/**
		* YENİ ÜRÜNLERİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_discount_products ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_id,
						s_p.product_notes,
						s_p.product_name,
						s_p.product_url,
						s_p.product_cover_photo,
						s_p.product_category_id,
						s_p.product_ranking,
						s_p.product_status,
						s_p.product_price,
						s_p.product_create_time,
						s_p.product_view_count,
						s_p_c.category_name,
						s_p_c.category_url
						FROM site_products AS s_p
						LEFT JOIN site_categories AS s_p_c
						ON s_p.product_category_id = s_p_c.category_id
						WHERE s_p.product_new = 1
						ORDER BY s_p.product_discount DESC
						LIMIT '.$arg['uri_segment'].','.$arg['per_page'])
					-> result();
		}


		/**
		* YENİ ÜRÜNLERİN SAYISINI ÇEK
		* @return integer
		*/
		public function get_best_selling_product_count ()
		{
			return $this
					-> db
					-> query('SELECT
						COUNT(s_p.product_id) AS Count
						FROM site_products AS s_p
						WHERE s_p.product_best_selling = 1')
					-> row() -> Count;
		}
		
		/**
		* ÇOK SATAN ÜRÜNLERİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_best_selling_products ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_id,
						s_p.product_notes,
						s_p.product_name,
						s_p.product_url,
						s_p.product_cover_photo,
						s_p.product_category_id,
						s_p.product_ranking,
						s_p.product_status,
						s_p.product_price,
						s_p.product_create_time,
						s_p.product_view_count,
						s_p_c.category_name,
						s_p_c.category_url
						FROM site_products AS s_p
						LEFT JOIN site_categories AS s_p_c
						ON s_p.product_category_id = s_p_c.category_id
						WHERE s_p.product_best_selling = 1
						ORDER BY s_p.product_id DESC
						LIMIT '.$arg['uri_segment'].','.$arg['per_page'])
					-> result();
		}
		

		/**
		* EŞLEŞEN ÜRÜNLERİ ÇEK
		* @param string
		* @return array
		*/
		public function get_search_products ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_id,
						s_p.product_name,
						s_p.product_notes,
						s_p.product_url,
						s_p.product_cover_photo,
						s_p.product_category_id,
						s_p.product_ranking,
						s_p.product_price,
						s_p.product_status,
						s_p.product_create_time,
						s_p.product_view_count,
						s_p_c.category_name,
						s_p_c.category_url
						FROM site_products AS s_p
						LEFT JOIN site_categories AS s_p_c
						ON s_p.product_category_id = s_p_c.category_id
						WHERE s_p.product_name LIKE "%'.$arg.'%" OR s_p.product_notes LIKE "%'.$arg.'%" 
						ORDER BY s_p.product_id DESC')
					-> result();
		}


		/**
		* KATEGORİLERİ ÇEK
		* @return array
		*/
		public function get_product_categories ()
		{
			return $this
					-> db
					-> query('SELECT
						s_c.category_id,
						s_c.category_name,
						s_c.category_top_category_id
						FROM site_categories AS s_c
						WHERE s_c.category_status = 1')
					-> result();
		}

		/**
		* ÜRÜN EKLE
		* @param array
		* @return array
		*/
		public function add_product ($arg)
		{
			$this
				-> db
				-> query('INSERT INTO site_products
					SET product_name = "'.$arg['product_add_name'].'",
					product_url = "'.$arg['product_add_url'].'",
					product_notes = "'.$arg['product_add_notes'].'",
					product_code = "'.$arg['product_add_code'].'",
					product_category_id = "'.$arg['product_add_category'].'",
					product_stock = "'.$arg['product_add_stock'].'",
					product_brand = "'.$arg['product_add_brand'].'",
					product_materials = "'.$arg['product_add_material'].'",
					product_size = "'.$arg['product_add_size'].'",
					product_color = "'.$arg['product_add_color'].'",
					product_warranty_time = "'.$arg['product_add_warranty_time'].'",
					product_delivery_time = "'.$arg['product_add_delivery_time'].'",
					product_new = "'.$arg['product_add_new'].'",
					product_suggested = "'.$arg['product_add_suggested'].'",
					product_discount = "'.$arg['product_add_discount'].'",
					product_best_selling = "'.$arg['product_add_best_selling'].'",
					product_part = "'.$arg['product_add_part'].'",
					product_price = "'.$arg['product_add_price'].'",
					product_discount_price = "'.$arg['product_add_discount_price'].'",
					product_quota = "'.$arg['product_add_quota'].'",
					product_text = "'.$arg['product_add_text'].'",
					product_create_time = "'.$arg['product_add_create_time'].'",
					product_view_count = "'.$arg['product_add_view_count'].'",
					product_meta_keywords = "'.$arg['product_add_keyword'].'",
					product_meta_description = "'.$arg['product_add_description'].'",
					product_ranking = "'.$arg['product_add_ranking'].'",
					product_cover_photo = "'.$arg['product_add_cover_photo'].'",
					product_photo_code = "'.$arg['product_add_photo_code'].'",
					product_status = "'.$arg['product_add_status'].'"');

			return $this
					-> db
					-> insert_id();

		}

		/**
		* ÜRÜN FOTOĞRAFLARINI EKLE
		* @param arg array 
		* @return boolen 
		*/
		public function add_product_photos ($arg)
		{
			return $this
					-> db
					-> query('INSERT INTO site_product_photos
						SET product_photo_name 		= "'.$arg["new_photo_name"].'",
						product_photo_product_code 	= "'.$arg["photo_code"].'"');
		} 


		/**
		* ÜRÜN KAPAK FOTOĞRAFINI GÜNCELLE
		* @param array
		* @return boolean
		*/
		public function edit_product_cover_photo ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_products
						SET product_cover_photo 	= "'.$arg["new_photo_name"].'"
						WHERE product_id 		= '.$arg["product_id"]);
		}


		/**
		* ÜRÜN FOTOĞRAFI EKLE
		* @param array
		* @return boolean
		*/
		public function add_photo ($arg)
		{
			return $this
					-> db
					-> query('INSERT INTO site_product_photos
						SET product_photo_name = "'.$arg['photo_name'].'",
						product_photo_product_code = "'.$arg['product_id'].'"');
		}

		/**
		* ÜRÜNÜ ÇEK
		* @param integer
		* @return array
		*/
		public function get_product ($id)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_products AS s_p
						WHERE s_p.product_id = '.$id.'
						LIMIT 1')
					-> row();
		}

		/**
		* ÜRÜN FOTOĞRAFLARINI ÇEK
		* @param integer
		* @return array
		*/
		public function get_product_photos ($id)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_product_photos AS s_p_p
						WHERE s_p_p.product_photo_product_code= "'.$id.'"')
					-> result();
		}

		/**
		* ÜRÜN FOTOĞRAFLARINI SİL
		* @param integer
		* @return boolean
		*/
		public function delete_product_photos ($arg)
		{
			return $this
					-> db
					-> query('DELETE FROM site_product_photos
						WHERE product_photo_product_code = "'.$arg.'"');
		}

		/**
		* ÜRÜNÜ SİL
		* @param integer
		* @return boolean
		*/
		public function delete_product ($id)
		{
			return $this
					-> db
					-> query('DELETE FROM site_products
						WHERE product_id = '.$id);
		}

		/**
		* ÜRÜNÜ GÜNCELLE
		* @param arg integer
		* @return boolean
		*/
		public function edit_product ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_products
						SET product_name = "'.$arg['product_edit_name'].'",
						product_url = "'.$arg['product_edit_url'].'",
						product_notes = "'.$arg['product_edit_notes'].'",
						product_code = "'.$arg['product_edit_code'].'",
						product_category_id = "'.$arg['product_edit_category'].'",
						product_stock = "'.$arg['product_edit_stock'].'",
						product_brand = "'.$arg['product_edit_brand'].'",
						product_materials = "'.$arg['product_edit_material'].'",
						product_size = "'.$arg['product_edit_size'].'",
						product_color = "'.$arg['product_edit_color'].'",
						product_warranty_time = "'.$arg['product_edit_warranty_time'].'",
						product_delivery_time = "'.$arg['product_edit_delivery_time'].'",
						product_new = "'.$arg['product_edit_new'].'",
						product_suggested = "'.$arg['product_edit_suggested'].'",
						product_discount = "'.$arg['product_edit_discount'].'",
						product_best_selling = "'.$arg['product_edit_best_selling'].'",
						product_part = "'.$arg['product_edit_part'].'",
						product_price = "'.$arg['product_edit_price'].'",
						product_discount_price = "'.$arg['product_edit_discount_price'].'",
						product_quota = "'.$arg['product_edit_quota'].'",
						product_text = "'.$arg['product_edit_text'].'",
						product_meta_keywords = "'.$arg['product_edit_keyword'].'",
						product_meta_description = "'.$arg['product_edit_description'].'",
						product_edit_time = "'.$arg['edit_time'].'",
						product_status = "'.$arg['product_edit_status'].'"
						WHERE product_id = '.$arg['product_edit_product_id']);
		}

		/**
		* ÜRÜN FOTOĞRAFINI SİL
		* @param arg integer
		* @return boolen
		*/
		public function delete_photo_product ($arg)
		{
			return $this
					-> db
					-> query('DELETE FROM site_product_photos
						WHERE product_photo_id = '.$arg);
		}


		########################################################################################
		# REZERVASYONLAR
		########################################################################################

		/**
		* REZERVASYONLARI ÇEK
		* @param integer
		* @return array
		*/
		public function get_reservations ($arg)
		{
			$this
					-> db
					-> from('site_reservations')
					-> select('
						reservation_id,
						site_products.product_id as product_id,
						site_products.product_name as product_name,
						site_products.product_price as product_price,
						site_products.product_discount_price as product_discount_price,
						reservation_name,
						reservation_surname,
						reservation_phone,
						reservation_email,
						reservation_city,
						reservation_country,
						reservation_birthday,
						reservation_gender,
						reservation_date,
						reservation_status,
						reservation_address
					')
					-> join('site_products','site_reservations.product_id = site_products.product_id','LEFT')
					-> order_by('reservation_id','DESC')
					-> limit($arg['per_page'],$arg['uri_segment']);
					return $this->db->get()->result();
			 
		}

		/**
		* REZERVASYONLARIN SAYISINI ÇEK
		* @param array
		* @return integer
		*/
		public function get_reservation_count ($where = [])
		{
			if(!empty($where)):
				$this->db->where($where);
			endif;
			return $this->db->count_all_results('site_reservations');
		}

		/**
		* REZERVASYONU ÇEK
		* @param integer
		* @return array
		*/
		public function get_reservation ($id)
		{
			return $this
					-> db
					-> from('site_reservations')
					-> select('
						reservation_id,
						site_products.product_id as product_id,
						site_products.product_name as product_name,
						site_products.product_price as product_price,
						site_products.product_discount_price as product_discount_price,
						reservation_name,
						reservation_surname,
						reservation_phone,
						reservation_email,
						reservation_city,
						reservation_country,
						reservation_birthday,
						reservation_gender,
						reservation_date,
						reservation_status,
						reservation_address,
					')
					-> join('site_products','site_products.product_id = site_reservations.product_id','LEFT')
					-> where(['reservation_id' => $id])
					-> get()
					-> row();
		}

		/**
		* REZERVASYONU SİL
		* @param integer
		* @return boolean
		*/
		public function delete_reservation ($id)
		{
			return $this
					-> db
					-> where(["reservation_id" => $id])
					-> delete('site_reservations');
		}

		/**
		* REZERVASYONU GÜNCELLE
		* @param arg integer
		* @return boolean
		*/
		public function edit_reservation ($data,$id)
		{
			return $this
					-> db
					-> where(["reservation_id" => $id])
					-> update('site_reservations',$data);
		}


		########################################################################################
		# HİZMETLER
		########################################################################################

		/**
		* HİZMETLERİ ÇEK
		* @return array
		*/
		public function get_services ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_services AS service
						ORDER BY service.service_id DESC')
					-> result();
		}

		/**
		* HİZMET EKLE
		* @param array
		* @return boolean
		*/
		public function add_service ($arg)
		{
			$this
				-> db
				-> query('INSERT INTO site_services
					SET service_title = "'.$arg['service_add_title'].'",
					service_meta_keywords = "'.$arg['service_add_keyword'].'",
					service_meta_description = "'.$arg['service_add_description'].'",
					service_url = "'.$arg['service_add_url'].'",
					service_text = "'.$arg['service_add_text'].'",
					service_create_time = "'.$arg['service_add_create_time'].'",
					service_view_count = "'.$arg['service_view_count'].'",
					service_status = '.$arg['service_add_status']);

			return $this
					-> db
					-> insert_id();
		}

		/**
		* HİZMET ARA
		* @param string
		* @return array
		*/
		public function get_search_services ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_services AS service
						WHERE service.service_title LIKE "%'.$arg.'%"')
					-> result();
		}

		/**
		* HİZMET KAPAK FOTOĞRAFINI GÜNCELLE
		* @param array
		* @return boolean
		*/
		public function edit_service_cover_photo ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_services
						SET service_photo = "'.$arg['file_name'].'"
						WHERE service_id = "'.$arg['service_id'].'"');
		}

		/**
		* HİZMETİ ÇEK
		* @param array
		* @return object
		*/
		public function get_service ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_services AS s_s
						WHERE s_s.service_id = '.$arg)
					-> row();
		}


		/**
		* HİZMET DÜZENLE
		* @param array
		* @return boolean
		*/
		public function edit_service ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_services
						SET service_title = "'.$arg['service_edit_title'].'",
						service_url = "'.$arg['service_edit_url'].'",
						service_meta_keywords = "'.$arg['service_edit_keyword'].'",
						service_meta_description = "'.$arg['service_edit_description'].'",
						service_text = "'.$arg['service_edit_text'].'",
						service_edit_time = "'.$arg['service_edit_time'].'",
						service_status = "'.$arg['service_edit_status'].'"
						WHERE service_id = '.$arg['service_id']);
		}

		/**
		* HİZMETİ SİL
		* @param integer
		* @return boolean
		*/
		public function delete_service ($arg)
		{
			return $this
					-> db
					-> query('DELETE FROM site_services
						WHERE service_id = '.$arg);
		}

		



		########################################################################################
		# SAYFALAR
		########################################################################################

		/**
		* SAYFALARI ÇEK
		* @return array
		*/
		public function get_pages ()
		{
			return $this
					-> db
					-> query('SELECT
						s_p.page_id,
						s_p.page_title,
						s_p.page_status,
						s_p.page_url,
						s_p.page_create_time,
						s_p.page_view_count,
						s_p_t.page_template_name,
						s_p_g.page_group_name
						FROM site_pages AS s_p
						LEFT JOIN site_page_templates AS s_p_t
						ON s_p.page_template_id = s_p_t.page_template_id
						LEFT JOIN site_pages_groups AS s_p_g
						ON s_p.page_group_id = s_p_g.page_group_id
						ORDER BY s_p.page_id DESC')
					-> result();
		}

		/**
		* SAYFAYI ÇEK
		* @param integer
		* @return array
		*/
		public function get_page ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_pages AS s_p
						LEFT JOIN site_page_templates AS s_p_t
						ON s_p.page_template_id = s_p_t.page_template_id
						LEFT JOIN site_pages_groups AS s_p_g
						ON s_p.page_group_id = s_p_g.page_group_id
						WHERE s_p.page_id = '.$arg)
					-> row();
		}

		/**
		* SAYFA EKLE
		* @param array
		* @return boolean
		*/
		public function add_page ($arg)
		{
			return $this
					-> db
					-> query('INSERT INTO site_pages
						SET page_title = "'.$arg['page_add_name'].'",
						page_url = "'.$arg['page_add_url'].'",
						page_text = "'.$arg['page_add_content'].'",
						page_keywords = "'.$arg['page_add_keyword'].'",
						page_description = "'.$arg['page_add_description'].'",
						page_group_id = "'.$arg['page_add_group'].'",
						page_template_id = "'.$arg['page_add_template'].'",
						page_status = "'.$arg['page_add_status'].'",
						page_create_time = "'.$arg['create_time'].'",
						page_view_count = "'.$arg['page_view_count'].'"');
		}

		/**
		* SAYFA DÜZENLE
		* @param array
		* @return boolean
		*/
		public function edit_page ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_pages
						SET page_title = "'.$arg['page_edit_name'].'",
						page_url = "'.$arg['page_edit_url'].'",
						page_text = "'.$arg['page_edit_text'].'",
						page_keywords = "'.$arg['page_edit_keyword'].'",
						page_description = "'.$arg['page_edit_description'].'",
						page_group_id = "'.$arg['page_edit_group'].'",
						page_template_id = "'.$arg['page_edit_template'].'",
						page_status = "'.$arg['page_edit_status'].'",
						page_edit_time = "'.$arg['edit_time'].'"
						WHERE page_id = '.$arg['page_edit_page_id']);
		}

		/**
		* SAYFAYI SİL
		* @param integer
		* @return boolean
		*/

		public function delete_page ($arg)
		{
			return $this
					-> db
					-> query('DELETE FROM site_pages
						WHERE page_id = '.$arg);
		}

		/**
		* SAYFA URL ADRESLERİNİ KONTROL ET
		* @param string
		* @return array
		*/
		public function get_single_page_url ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_pages AS s_p
						WHERE s_p.page_url = "'.$arg.'"')
					-> result();
		}

		/**
		* SAYFA URL ADRESLERİNİ KONTROL ET
		* @param arg1 string
		* @param arg2 integer
		* @return array
		*/
		public function get_page_url ($arg1, $arg2)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_pages AS s_p
						WHERE s_p.page_url = "'.$arg1.'" AND
						page_id != '.$arg2)
					-> result();
		}

		/**
		* SAYFA GRUPLARINI ÇEK
		* @return array
		*/
		public function get_page_groups ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_pages_groups')
					-> result();
		}

		/**
		* SAYFA ŞABLONLARINI ÇEK
		* @return array
		*/
		public function get_page_templates ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_page_templates')
					-> result();
		}

		/**
		* SAYFA ARA
		* @param string
		* @return array
		*/
		public function get_search_pages ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_pages AS s_p
						LEFT JOIN site_page_templates AS s_p_t
						ON s_p.page_template_id = s_p_t.page_template_id
						LEFT JOIN site_pages_groups AS s_p_g
						ON s_p.page_group_id = s_p_g.page_group_id
						WHERE MATCH(s_p.page_title) 
						AGAINST ("'.$arg.'" IN NATURAL LANGUAGE MODE) OR
						s_p.page_title LIKE "%'.$arg.'%"')
					-> result();
		}




		########################################################################################
		# SLAYT FOTOĞRAFLARI
		########################################################################################

		/**
		* SLAYT FOTOĞRAFLARINI ÇEK
		* @return array
		*/
		public function get_slider_photos ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_home_page_slider_photos AS s_h_p_s_p
						ORDER BY s_h_p_s_p.slider_photo_rank ASC')
					-> result();
		}

		/**
		* SLAYT FOTOĞRAFINI ÇEK
		* @param integer
		* @return array
		*/
		public function get_slider_photo ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_home_page_slider_photos AS s_h_p_s_p
						WHERE s_h_p_s_p.slider_photo_id = '.$arg)
					-> row();
		}

		/**
		* SLAYT FOTOĞRAFI SİL
		* @param arg integer
		* @return boolean
		*/
		public function delete_slider_photo ($arg)
		{
			return $this
					-> db
					-> query('DELETE FROM site_home_page_slider_photos
						WHERE slider_photo_id = '.$arg);
		}

		/**
		* SLAYT FOTOĞRAFI EKLE
		* @param array
		* @return boolean
		*/
		public function add_slider_photo ($arg)
		{
			return $this
					-> db
					-> query('INSERT INTO site_home_page_slider_photos
						SET slider_photo_name = "'.$arg['photo_name'].'",
						slider_photo_link = "'.$arg['photo_link'].'",
						slider_photo_status = "'.$arg['status'].'",
						slider_photo_rank = "'.$arg['rank'].'",
						slider_photo_create_time = "'.$arg['crate_time'].'"');
		}

		/**
		* SLAYT SIRALAMASINI DÜZENLE
		* @param array
		* @return boolean
		*/
		public function edit_slider_rank ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_home_page_slider_photos
						SET slider_photo_rank = '.$arg['rank'].'
						WHERE slider_photo_id = '.$arg['photo_id']);
		}

		/**
		* SLAYT DÜZENLE
		* @param array
		* @return boolean
		*/
		public function edit_slider ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_home_page_slider_photos
						SET slider_photo_link = "'.$arg['slider_edit_photo_link'].'",
						slider_photo_status = '.$arg['slider_edit_photo_status'].',
						slider_photo_edit_time = '.$arg['edit_time'].'
						WHERE slider_photo_id = '.$arg['id']);
		}





		########################################################################################
		# GALERİ
		########################################################################################

		/**
		* GALERİLERİ ÇEK
		* @return array
		*/
		public function get_galleries ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_galleries AS s_g
						ORDER BY s_g.gallery_id DESC')
					-> result();
		}

		/**
		* GALERİ EKLE
		* @param array
		* @return boolean
		*/
		public function add_gallery ($arg)
		{
			$this
				-> db
				-> query('INSERT INTO site_galleries
					SET gallery_name = "'.$arg['gallery_add_name'].'",
					gallery_photo_size = "'.$arg['gallery_add_photo_size'].'",
					gallery_code = "'.$arg['gallery_code'].'",
					gallery_status = "'.$arg['gallery_add_status'].'",
					gallery_create_time = "'.$arg['create_time'].'"');

			return $this
					-> db
					-> insert_id();
		}

		/**
		* FOTOĞRAF EKLE
		* @param array
		* @return boolean
		*/
		public function gallery_add_photo ($arg)
		{
			return $this
					-> db
					-> query('INSERT INTO site_gallery_photos
						SET gallery_photo_name = "'.$arg['photo_name'].'",
						gallery_photo_gallery_id = '.$arg['gallery_id']);
		}

		/**
		* GALERİYİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_gallery ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_galleries AS s_g
						WHERE s_g.gallery_id = '.$arg)
					-> row();
		}

		/**
		* GALERİYİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_gallery_photos ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_gallery_photos AS s_g_p
						WHERE s_g_p.gallery_photo_gallery_id = '.$arg)
					-> result();
		}

		/**
		* GALERİ FOTOĞRAFLARINI SİL
		* @param integer
		* @return boolean
		*/
		public function delete_gallery_photos ($arg)
		{
			return $this
					-> db
					-> query('DELETE FROM
						site_gallery_photos
						WHERE gallery_photo_gallery_id = '.$arg);
		}

		/**
		* GALERİYİ SİL
		* @param integer
		* @return boolean
		*/
		public function delete_gallery ($arg)
		{
			return $this
					-> db
					-> query('DELETE FROM
						site_galleries
						WHERE gallery_id = '.$arg);
		}

		/**
		* GALERİYİ DÜZENLE
		* @param integer
		* @return boolean
		*/
		public function edit_gallery ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_galleries
						SET gallery_name = "'.$arg['gallery_edit_name'].'",
						gallery_photo_size = "'.$arg['gallery_edit_photo_size'].'",
						gallery_update_time = "'.$arg['gallery_update_time'].'",
						gallery_status = "'.$arg['gallery_edit_status'].'"
						WHERE gallery_id = '.$arg['gallery_id']);
		}

		/**
		* GALERİ FOTOĞRAFI SİL
		* @param integer
		* @return boolean
		*/
		public function delete_photo ($arg)
		{
			return $this
					-> db
					-> query('DELETE FROM
						site_gallery_photos
						WHERE gallery_photo_id = '.$arg);
		}

		/**
		* GALERİ ARA
		* @param string
		* @return array
		*/
		public function get_search_galleries ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_galleries AS s_g
						WHERE MATCH(s_g.gallery_name) 
						AGAINST ("'.$arg.'" IN NATURAL LANGUAGE MODE) OR
						s_g.gallery_name LIKE "%'.$arg.'%"')
					-> result();
		}





		########################################################################################
		# MESAJLAR
		########################################################################################


		/**
		* TÜM MESAJLARI ÇEK
		* @return array
		*/
		public function get_all_messages ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_contact AS s_c
						ORDER BY s_c.message_id DESC')
					-> result();
		}

		/**
		* MESAJI SİL
		* @param arg integer
		* @return boolean
		*/
		public function delete_message ($arg)
		{
			return $this
					-> db
					-> query('DELETE FROM site_contact
						WHERE message_id = '.$arg);
		}

		/**
		* MESAJI GÜNCELLE
		* @param arg integer
		* @return boolean
		*/
		public function edit_message ($arg)
		{
			return $this
					-> db
					-> query('UPDATE site_contact
						SET message_status = 1
						WHERE message_id = '.$arg);
		}

		/**
		* OKUNMAMIŞ MESAJLARI ÇEK
		* @return array 
		*/	
		public function unreadMessages ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_contact AS s_c
						WHERE s_c.message_status = 0')
					-> result();	
		}





		########################################################################################
		# YÖNETİCİ AYARLARI
		########################################################################################

		/**
		* YÖNETİCİ BİLGİLERİNİ GÜNCELLE
		* @param arg array
		* @return boolean
		*/
		public function set_admin_settings ($arg)
		{
			return $this
					-> db
					-> query('UPDATE admins
						SET admin_name = "'.$arg["admin_settings_name"].'",
						admin_surname = "'.$arg["admin_settings_surname"].'",
						admin_email = "'.$arg["admin_settings_e_mail"].'",
						admin_password = "'.$arg["admin_settings_password"].'"
						WHERE admin_id != 1 AND
						admin_id = '.$arg['admin_id']);
		}

		/**
		* YÖNETİCİ BİLGİLERİNİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_admin_settings ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM admins AS a
						WHERE a.admin_id != 1
						LIMIT 1')
					-> row();
		}



		########################################################################################
		# E-POSTA GÖNDER
		########################################################################################

		/**
		* E-POSTA AYARLARINI ÇEK
		* @return array
		*/
		public function get_settings_email_send_email ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_settings_email')
					-> row();
		}
	}