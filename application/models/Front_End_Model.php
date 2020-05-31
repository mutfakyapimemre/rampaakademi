<?php
	class Front_End_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		/**
		* SİTE GENEL AYARLARINI ÇEK
		* @return object
		*/
		public function site_settings ()
		{
			return $this
				-> db
				-> query('SELECT
					*
					FROM site_settings')
				-> row();
		}

		/**
		* SOSYAL MEDYA AYARLARINI ÇEK
		* @return object
		*/
		public function site_settings_social_media ()
		{
			return $this
				-> db
				-> query('SELECT
					*
					FROM site_settings_social_media')
				-> row();
		}

		/**
		* PARA BİRİMLERİNİ ÇEK
		* @return array
		*/
		public function site_settings_currencies ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_setting_currencies')
					-> result();
		}

		/**
		* E-POSTA AYARLARINI ÇEK
		* @return object
		*/
		public function site_settings_email ()
		{
			return $this
				-> db
				-> query('SELECT
					*
					FROM site_settings_email')
				-> row();
		}

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
		* KATEGORİLERİ ÇEK
		* @return array
		*/
		public function site_categories ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_categories AS s_c
						WHERE s_c.category_status = 1
						ORDER BY s_c.category_rank ASC')
					-> result();
		}


		########################################################################################
		# ANASAYFA
		########################################################################################

		/**
		* SLAYT FOTOĞRAFINI ÇEK
		* @param array
		*/
		public function get_slider ()
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_home_page_slider_photos AS slider
						WHERE slider.slider_photo_status = 1
						ORDER BY slider.slider_photo_rank ASC')
					-> result();
		}

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
						FROM site_services AS s_s
						WHERE s_s.service_status = 1
						ORDER BY s_s.service_id DESC')
					-> result();
		}

		/**
		* ÖNERİLEN ÜRÜNLERİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_suggested ($limit = 20)
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_id,
						s_p.product_name,
						s_p.product_url,
						s_p.product_code,
						s_p.product_cover_photo,
						s_p.product_price,
						s_p.product_discount_price,
						s_p.product_suggested
						FROM site_products AS s_p
						WHERE s_p.product_status = 1 AND
						s_p.product_suggested = 1
						ORDER BY s_p.product_id DESC
						LIMIT '.$limit)
					-> result();
		}


		/**
		* ÇOK SATAN ÜRÜNLERİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_best_selling ($limit = 20)
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_id,
						s_p.product_name,
						s_p.product_url,
						s_p.product_code,
						s_p.product_cover_photo,
						s_p.product_price,
						s_p.product_discount_price,
						s_p.product_suggested
						FROM site_products AS s_p
						WHERE s_p.product_status = 1 AND
						s_p.product_best_selling = 1
						ORDER BY s_p.product_id DESC
						LIMIT '.$limit)
					-> result();
		}

		/**
		* YENİ ÜRÜNLERİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_new ($limit = 20)
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_id,
						s_p.product_name,
						s_p.product_url,
						s_p.product_code,
						s_p.product_cover_photo,
						s_p.product_price,
						s_p.product_discount_price,
						s_p.product_suggested
						FROM site_products AS s_p
						WHERE s_p.product_status = 1 AND
						s_p.product_new = 1
						ORDER BY s_p.product_id DESC
						LIMIT '.$limit)
					-> result();
		}

		/**
		* YENİ ÜRÜNLERİ ÇEK
		* @param integer
		* @return array
		*/
		public function get_last_products ($limit = 20)
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_id,
						s_p.product_name,
						s_p.product_url,
						s_p.product_code,
						s_p.product_cover_photo,
						s_p.product_price,
						s_p.product_discount_price,
						s_p.product_suggested
						FROM site_products AS s_p
						WHERE s_p.product_status = 1
						ORDER BY s_p.product_id DESC
						LIMIT '.$limit)
					-> result();
		}

		
		

		########################################################################################
		# HİZMETLER
		########################################################################################

		/**
		* HİZMETİ ÇEK
		* @return string
		* @return object
		*/
		public function get_service ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_services AS service
						WHERE service.service_url = "'.$arg.'"
						AND service.service_status = 1')
					-> row();
		}


		########################################################################################
		# SAYFALAR
		########################################################################################

		/**
		* SAYFAYI ÇEK
		* @param string
		* @return object
		*/
		public function get_page ($arg)
		{
			return $this
				-> db
				-> query('SELECT
					*
					FROM site_pages AS page
					WHERE page.page_url = "'.$arg.'"')
				-> row();
		}
		
		/**
		* GÖRÜNTÜLENME SAYISINI ARTTIR
		* @return integer
		* @return boolean
		*/
		public function page_view_count_increment ($id)
		{
			return $this
					-> db
					-> query('UPDATE site_pages
						SET page_view_count = page_view_count + 1
						WHERE page_id = '.$id);
		}

		

		/**
		* FORMU ÇEK
		* @param array
		* @return array
		*/
		public function get_form ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						s_f.form_name,
						s_f.form_description,
						s_f.form_content
						FROM site_forms AS s_f
						WHERE s_f.form_status = '.$arg['form_status'].' AND
						s_f.form_code = "'.$arg['form_code'].'"')
					-> row();
		}


		/**
		* GALERİ ÇEK
		* @param array
		* @return object
		*/
		public function get_gallery ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						s_g.gallery_id,
						s_g.gallery_name,
						s_g.gallery_photo_size
						FROM site_galleries AS s_g
						WHERE s_g.gallery_code = "'.$arg['gallery_code'].'" AND
						s_g.gallery_status = '.$arg['gallery_status'])
					-> row();
		}

		/**
		* GALERİ FOTOĞRAFLARINI ÇEK
		* @param id integer
		* @return array
		*/
		public function get_gallery_photos ($id = null)
		{
			$query = 'SELECT
			s_g_p.gallery_photo_name
			FROM site_gallery_photos AS s_g_p';
			if(!empty($id))
			{
				$query .= ' WHERE s_g_p.gallery_photo_gallery_id = '.$id;
			}
			return $this
					-> db
					-> query($query)
					-> result();
		}
	
		/**
		* E-POSTA AYARLARINI ÇEK
		* @param string
		* @return object
		*/
		public function get_settings_email ($language)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM site_'.$language.'_settings_email')
					-> row();
		}


		########################################################################################
		# ÜRÜNLER
		########################################################################################

		/**
		* ÜRÜNÜ ÇEK
		* @param integer
		* @return object || @return array
		*/
		public function get_product ($id = null)
		{
			if(!empty($id))
			{
				return $this
				-> db
				-> query('SELECT
					*,(SELECT count(reservation_id) FROM site_reservations WHERE reservation_status = 1 AND product_id = '.$id.') as reservation_count
					FROM site_products AS s_p
					WHERE s_p.product_id = '.$id)
				-> row();
			}else{
				return $this
				-> db
				-> query('SELECT
					*
					FROM site_products AS s_p
					')
				-> result();
			}
			
		}

		/**
		* GÖRÜNTÜLENME SAYISINI ARTTIR
		* @return integer
		* @return boolean
		*/
		public function product_view_count_increment ($id)
		{
			return $this
					-> db
					-> query('UPDATE site_products
						SET product_view_count = product_view_count + 1
						WHERE product_id = '.$id);
		}

		/**
		* ÜRÜN FOTOĞRAFLARINI ÇEK
		* @param string
		* @return array
		*/
		public function get_product_photos ($string)
		{
			return $this
					-> db
					-> query('SELECT
						photo.product_photo_id,
						photo.product_photo_name
						FROM site_product_photos AS photo
						WHERE photo.product_photo_product_code = "'.$string.'"')
					-> result();
		}

		/**
		* KATEGORİDEKİ ÜRÜNLERİ SAY
		* @param integer
		* @return integer
		*/
		public function get_category_product_count ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						COUNT(s_p.product_id) AS Count
						FROM site_products AS s_p
						WHERE s_p.product_category_id = '.$arg.' AND
						s_p.product_status = 1')
					-> row() -> Count;
		}

		/**
		* KATEGORİDEKİ ÜRÜNLERİ ÇEK
		* @param array
		* @return array
		*/
		public function get_category_products ($arg)
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_id,
						s_p.product_name,
						s_p.product_url,
						s_p.product_cover_photo,
						s_p.product_price,
						s_p.product_discount_price,
						s_p.product_new,
						s_p.product_suggested,
						s_p.product_discount,
						s_p.product_best_selling
						FROM site_products AS s_p
						WHERE s_p.product_category_id = '.$arg['category_id'].' AND
						s_p.product_new IN('.$arg['f_property_new'].') AND
						s_p.product_suggested IN('.$arg['f_property_suggested'].') AND
						(s_p.product_price >= '.$arg['f_min_price'].' AND s_p.product_price <= '.$arg['f_max_price'].') AND
						s_p.product_warranty_time LIKE "%'.$arg['f_warranty'].'%" AND
						s_p.product_delivery_time LIKE "%'.$arg['f_delivery'].'%" AND
						s_p.product_status = 1 
						ORDER BY s_p.product_id DESC
						LIMIT '.$arg['uri_segment'].','.$arg['per_page'])
					-> result();
		}
		
		########################################################################################
		# SİTE HARİTASI
		########################################################################################

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
		* SAYFALARI ÇEK
		* @return array
		*/
		public function get_sitemap_pages ()
		{
			return $this
					-> db
					-> query('SELECT
						s_p.page_url
						FROM site_pages AS s_p
						WHERE s_p.page_status = 1')
					-> result();
		}	

		/**
		* HİZMETLERİ ÇEK
		* @return array
		*/
		public function get_sitemap_services ()
		{
			return $this
					-> db
					-> query('SELECT
						s_s.service_url
						FROM site_services AS s_s
						WHERE s_s.service_status = 1')
					-> result();
		}

		/**
		* ÜRÜNLERİ ÇEK
		* @return array
		*/
		public function get_sitemap_products ()
		{
			return $this
					-> db
					-> query('SELECT
						s_p.product_id,
						s_p.product_url
						FROM site_products AS s_p
						WHERE s_p.product_status = 1')
					-> result();
		}

		

		/**
		* KATEGORİLERİ ÇEK
		* @return array
		*/
		public function get_sitemap_categories ()
		{
			return $this
					-> db
					-> query('SELECT
						s_c.category_url
						FROM site_categories AS s_c
						WHERE s_c.category_status = 1')
					-> result();
		}	

		/**
		* MAKALELERİ ÇEK
		* @return array
		*/
		public function get_sitemap_articles ()
		{
			return $this
					-> db
					-> query('SELECT
						s_b_a.article_url
						FROM site_blog_articles AS s_b_a
						WHERE s_b_a.article_status = 1')
					-> result();
		}	
		
		
		########################################################################################
		# İLETİŞİM
		########################################################################################

		/**
		 * İLETİŞİM KAYDET
		 * @param array
		 * @return bool
		 */
		public function save_contact($data)
		{
			return $this->db->insert("site_contact",$data);
		}


		/**
		 * EĞİTİM KAYDET
		 * @param array
		 * @return bool
		 */
		public function save_course($data)
		{
			return $this->db->insert("site_reservations",$data);
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
	}