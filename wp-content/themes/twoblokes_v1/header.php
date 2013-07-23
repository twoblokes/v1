<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?><!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. --> 

<head id="<?php echo of_get_option('meta_headid'); ?>" data-template-set="html5-reset-wordpress-theme">

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->

	<?php if (is_search()) echo '<meta name="robots" content="noindex, nofollow" />'; ?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">

	<meta name="description" content="<?php bloginfo('description'); ?>" />

	<?php if (true == of_get_option('meta_author')) echo '<meta name="author" content="'.of_get_option("meta_author").'" />'; ?>
	
	<?php if (true == of_get_option('meta_google')) echo '<meta name="google-site-verification" content="'.of_get_option("meta_google").'" />'; ?>

	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico" />

	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/_/img/apple-touch-icon.png"/>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/reset.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/application.css" />
	<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,900,300italic' rel='stylesheet' type='text/css'>
	
	<script src="<?php echo get_template_directory_uri(); ?>/_/js/modernizr-2.6.2.dev.js"></script>

	<!-- Application-specific meta tags -->
	<?php if (true == of_get_option('meta_app_win_name')) {
	echo '<meta name="application-name" content="'.of_get_option("meta_app_win_name").'" /> ';
	echo '<meta name="msapplication-TileColor" content="'.of_get_option("meta_app_win_color").'" /> ';
	echo '<meta name="msapplication-TileImage" content="'.of_get_option("meta_app_win_image").'" />';
	} ?>

	<?php if (true == of_get_option('meta_app_twt_card')) {
	echo '<meta name="twitter:card" content="'.of_get_option("meta_app_twt_card").'" />';
	echo '<meta name="twitter:site" content="'.of_get_option("meta_app_twt_site").'" />';
	echo '<meta name="twitter:title" content="'.of_get_option("meta_app_twt_title").'">';
	echo '<meta name="twitter:description" content="'.of_get_option("meta_app_twt_description").'" />';
	echo '<meta name="twitter:url" content="'.of_get_option("meta_app_twt_url").'" />';
	} ?>

	<?php if (true == of_get_option('meta_app_fb_title')) {
	echo '<meta property="og:title" content="'.of_get_option("meta_app_fb_title").'" />';
	echo '<meta property="og:description" content="'.of_get_option("meta_app_fb_description").'" />';
	echo '<meta property="og:url" content="'.of_get_option("meta_app_fb_url").'" />';
	echo '<meta property="og:image" content="'.of_get_option("meta_app_fb_image").'" />';
	} ?>

</head>

<body <?php body_class(); ?>>
	
	<div id="wrapper">

		<header id="main-header">
			<h1 class="logo">Two Blokes. Website Design. Leicester.</h1>
		</header>

