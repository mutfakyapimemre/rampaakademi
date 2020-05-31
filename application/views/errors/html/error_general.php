<!DOCTYPE html>
<html lang="tr">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<meta charset="utf-8">
	<title><?php echo $heading; ?></title>
	<meta name="robots" content="noindex" />
	<style type="text/css">
		body {background-color: #333333; font-family: Arial; color: #FFFFFF; margin: 40px 0px; text-align: center;}
		div.container {max-width: 960px; margin: 0px auto; padding: 20px;}
		div.container h1 {font-size: 80px;}
		span {display: block; margin: 10px auto; font-size: 13px; color: #888888;}
	</style>
</head>
<body>
	<div class="container">
		<h1><?php echo $heading; ?></h1>
		<p><?php echo $message; ?></p>
	</div>
	<span><?php echo date('d/m/y H:i:s'); ?></span>
	<span><?php echo $_SERVER['SERVER_NAME']; ?></span>
</body>
</html>

<?php exit(); ?>