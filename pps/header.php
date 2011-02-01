<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php showPageTitle(); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/prototype/prototype.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/pps.js"></script>
<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if (is_singular() && get_option('thread_comments'))
			wp_enqueue_script('comment-reply');

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
?>
	</head>
	<body <?php body_class(); ?>>
		<div id="page">
			<div id="ship"><img src="/wp-content/themes/pps/images/bgship.png" alt="" /></div>
			<div id="header">
				<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" class="logo" />
				<div id="premenu">&nbsp;</div>
				<div id="navigation">
					<?php
wp_nav_menu(array(
	'theme_location' => 'primary',
	'container_class' => 'menu',
));
?>
				</div>
			</div>
			<div id="main">
