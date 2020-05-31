<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Oturum Aç | Kontrol Paneli</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow">
	<link rel="icon" href="<?php echo base_url('public/back_end/img/favicon.png'); ?>" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/login/vendor/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/login/vendor/animate/animate.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/login/vendor/css-hamburgers/hamburgers.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/login/vendor/select2/select2.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/login/css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/login/css/main.css'); ?>">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url('public/back_end/login/images/background.jpg'); ?>');">
			<div class="wrap-login100 p-t-10 p-b-30">
				<form class="login100-form validate-form" method="post">
					<div class="login100-form-avatar">
						<img src="<?php echo base_url('public/back_end/login/images/mutfak-yapim-logo.jpg'); ?>">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						KONTROL PANELİ
						<p class="text-white"><b>E-Posta Adresi</b> ve <b>Şifrenizi</b> yazarak oturum açabilirsiniz</p>
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Lütfen doldurun">
						<input class="input100" type="text" name="sign_in_e_mail" placeholder="E-Posta Adresi">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Lütfen doldurun">
						<input class="input100" type="password" name="sign_in_password" placeholder="Şifre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Oturum Aç
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-50">
						<a href="#" class="txt1 text-white" style="font-size: 14px;">
							<b>Şifremi Unuttum</b>
						</a>
					</div>

					<div class="text-center w-full text-white" style="font-size: 13px;">
						Content Management System v2.0.0<br>
						All Right Reserved Copyright <?php echo date('Y'); ?><br>
						<a href="https://mutfakyapim.com" class="text-white" style="font-size: 13px;"><b>by Mutfak Yapım</b></a>
					</div>

				</form>
			</div>
		</div>
	</div>
	
	
	<script src="<?php echo base_url('public/back_end/login/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/back_end/login/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo base_url('public/back_end/login/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/back_end/login/vendor/select2/select2.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/back_end/login/js/main.js'); ?>"></script>
</body>
</html>