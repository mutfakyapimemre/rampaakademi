<?php
	class Be_Cms extends CI_Model
	{
		########################################################################################
		# OTURUM AÇ
		########################################################################################

		public function __construct()
		{
			parent::__construct();
		}

		/**
		* OTURUM AÇ
		* @param arg1 string
		* @param arg2 string
		* @return array 
		*/	
		public function sign_in ($arg1, $arg2)
		{
			return $this
					-> db
					-> query('SELECT
						*
						FROM admins AS a
						WHERE a.admin_email 	= "'.$arg1.'" AND
						a.admin_password 		= "'.$arg2.'"')
					-> row();	
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
		* @return boolen
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
		* @return boolen
		*/
		public function set_message ($arg)
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
	}