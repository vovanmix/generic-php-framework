<?php /**
 * @var \App\Helpers\CopyHelper $copy
 * @var string $templates
 * @var StdClass $assets
 */ ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html lang="en" class="ie6 ie no-js" xmlns:og="http://ogp.me/ns#"><![endif]-->
<!--[if IE 7 ]>
<html lang="en" class="ie7 ie no-js" xmlns:og="http://ogp.me/ns#"><![endif]-->
<!--[if IE 8 ]>
<html lang="en" class="ie8 ie no-js" xmlns:og="http://ogp.me/ns#"><![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="ie9 ie no-js" xmlns:og="http://ogp.me/ns#"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-js" xmlns:og="http://ogp.me/ns#"><!--<![endif]-->
	<head>
		<!-- <base href="/" target="_blank"> -->
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<meta name="robots" content="noindex, nofollow"/>

		<!-- Site content -->
		<title><?=$copy->get('meta_title')?></title>
		<meta name="title" content="<?=$copy->get('meta_title')?>"/>
		<meta name="keywords" content="<?=$copy->get('meta_keywords')?>"/>
		<meta name="description" content="<?=$copy->get('meta_description')?>"/>
		<meta name="google-site-verification" content=""/>

		<!-- OG:TAGS -->
		<meta property="og:type" content="website"/>
		<meta property="og:locale" content=""/>
		<meta property="og:site_name" content=""/>

		<!-- FACEBOOK - Open Graph: https://developers.facebook.com/docs/opengraph -->
		<meta property="og:title" content="<?=$copy->get('meta_title')?>"/>
		<meta name="og:title" content="<?=$copy->get('meta_title')?>"/>

		<meta property="og:description" content="<?=$copy->get('meta_description')?>"/>
		<meta name="og:description" content="<?=$copy->get('meta_description')?>"/>

		<meta property="og:url" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:image:width" content="1200"/>
		<meta property="og:image:height" content="630"/>

		<!-- TWITTER CARD - PLAYER -->
		<meta name="twitter:card" content="player">
		<meta name="twitter:player" content="">
		<meta name="twitter:player:width" content="640">
		<meta name="twitter:player:height" content="360">
		<meta name="twitter:site" content="">
		<meta name="twitter:title" content="<?=$copy->get('meta_title')?>">
		<meta name="twitter:description" content="<?=$copy->get('meta_description')?>">
		<meta name="twitter:image" content="">
		<meta name="twitter:url" content=""/>

		<!-- FAVICONS - http://realfavicongenerator.net -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?=$assets->location?>/website/assets/images/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?=$assets->location?>/website/assets/images/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?=$assets->location?>/website/assets/images/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=$assets->location?>/website/assets/images/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?=$assets->location?>/website/assets/images/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=$assets->location?>/website/assets/images/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?=$assets->location?>/website/assets/images/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=$assets->location?>/website/assets/images/favicons/apple-touch-icon-152x152.png">

		<link rel="icon" type="image/png" href="<?=$assets->location?>/website/assets/images/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?=$assets->location?>/website/assets/images/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?=$assets->location?>/website/assets/images/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="shortcut icon" href="<?=$assets->location?>/website/assets/images/favicons/favicon.ico">

		<link rel="icon" type="image/png" sizes="192x192" href="<?=$assets->location?>/website/assets/images/favicons/android-chrome-144x144.png">
		<link rel="manifest" href="<?=$assets->location?>/website/assets/images/favicons/manifest.json">

		<link rel="mask-icon" href="<?=$assets->location?>/website/assets/images/favicons/safari-pinned-tab.svg" color="#ffffff">

		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?=$assets->location?>/website/assets/images/favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?=$assets->location?>/website/assets/images/favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">

		<!-- VIEWPORT -->
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,minimum-scale=1,maximum-scale=1"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

		<link rel="stylesheet" href="<?=$assets->location?>/website/assets/css/styles<?=$assets->postfix?>.css">

		<script type="text/javascript" src="<?=$assets->location?>/website/assets/js/head<?=$assets->postfix?>.js"></script>
		
	</head>
	<body>

		<div id="content-container"></div>

		<?=$templates?>

		<script type="text/javascript" src="<?=$assets->location?>/website/assets/js/application<?=$assets->postfix?>.js"></script>
	</body>
</html>