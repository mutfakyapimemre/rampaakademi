<?php
	/**
	* MUTFAK YAPIM İÇERİK YÖNETİM SİSTEMİ 
	* 
	* ROOT CONTROLLER
	* @copyright		Mutfak Yapım 2020		
	* @link				www.mutfakyapim.com
	* @version			v1.0.0
	* @author 			Asaf Mirtürk (asaf.mirturk@mutfakyapim.com)
	*/
	class Root extends CI_Controller
	{
		public function Index ()
		{
			if ($this -> session -> userdata('admin_id'))
				$this -> _redirect();
			else
				$this -> _sign_in();
		}

		private function _sign_in ()
		{
			// POST VAR ISE DEVAT ET
			if ($this -> input -> post()):
				// MODEL DOSYASINI YÜKLE
				$this -> load -> model('Be_Cms');

				// POSTTAN GELEN VERİLERİ AL
				$e_mail 							= trim(addslashes(strip_tags($this -> input -> post('sign_in_e_mail', true))));
				$password 							= substr(md5(sha1(base64_encode(crc32($this -> input -> post('sign_in_password'))))), 0, 13);

				// MODEL SAYFASINI YÜKLE
				$login_response = $this -> Be_Cms -> sign_in($e_mail, $password);

				// KAYIT VARMI KONTROL ET
				if (count($login_response) > 0):
					// OKUNMAMIŞ MESAJLARI ÇEK
					$unreadMessages = $this -> Be_Cms -> unreadMessages();

					// VIEW A GONDERİELCEK DEĞİŞKENLERİ TANIMLA
					foreach ($login_response as $key => $value):
						$this -> session -> set_userdata($key, $value);
					endforeach;
		
					// YÖNLENDİR
					redirect(base_url('panel/ayarlar/site-ayarlari'));
				else:
					$this -> load -> view('errors/html/error_404', ['heading' => 'HATA', 'message' => '<b>E-Posta Adresi</b> yada <b>Şifre</b> hatalı!']);
				endif;
			else:
				// POST YOK ISE OTURUM AÇ SAYFASINA YÖNLENDIR
				$this -> load -> view('back_end/sign_in');
			endif;
		}

		private function _redirect()
		{
			// YÖNLENDİR
			redirect(base_url('panel'));
		}

		public function Sign_Out()
		{
			// OTURUMU SONLANDIR
			$this -> session -> sess_destroy();

			// YÖNLENDİR
			redirect(base_url('root'));
		}		
	}
