<!DOCTYPE html>
<html lang="tr">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="<?=$settings["general"]->setting_site_author?>">
    <meta name="keywords" content="<?=$settings["general"]->setting_site_keywords?>">
    <meta name="description" content="<?=$settings["general"]->setting_site_description?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?=$page['title']; ?></title>

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="<?=base_url("public/uploads/{$settings['general']->setting_favicon}")?>">

    <?=$settings['general']->setting_site_external_code; ?>
</head>

<body>