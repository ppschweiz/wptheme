<?php
require_once(get_stylesheet_directory() . '/theme-options.php');

define( 'HEADER_IMAGE', sprintf('%s/images/de.png', get_stylesheet_directory_uri()));
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 365 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 116 ) );

function change_home2($menu_text) {
	return preg_replace(
		'/"><a href=".*" title="Home">Home/',
		' first"><a href="' . site_url() . '" title="Home"><img src="/wp-content/themes/pps/images/hnavico_home.png" />',
		$menu_text);
}

function change_home($menu_text) {
	return preg_replace(
		'/ ><a href=".*" title="Home">Home/',
		' class="first"><a href="' . site_url() . '" title="Home"><img src="/wp-content/themes/pps/images/hnavico_home.png" />',
		$menu_text);
}

function add_icons($menu_text) {
	$pages = get_pages(array(
		'depth' => 0,
	));

	foreach ($pages as $page) {
		$id = $page->ID;

		$icon = get_the_post_thumbnail($id);
		if ($icon != '') {
			$menu_text = preg_replace(
				"/page-item-$id\">/",
				"page-item-$id\">$icon",
				$menu_text);
			$menu_text = preg_replace(
				"/page-item-$id current_page_ancestor current_page_parent\"><a/",
				"page-item-$id current_page_ancestor current_page_parent\">$icon<a",
				$menu_text);
			$menu_text = preg_replace(
				"/page-item-$id current_page_item\"><a/",
				"page-item-$id current_page_item\">$icon<a",
				$menu_text);
		}
	}
	return $menu_text;
}

add_filter('wp_page_menu', 'change_home');
add_filter('wp_page_menu', 'change_home2');
add_filter('wp_page_menu', 'add_icons');

register_default_headers(array(
	'ag' => array(
		'url' => sprintf('%s/images/header-aargau.png', get_stylesheet_directory_uri()),
		'thumbnail_url' => sprintf('%s/images/header-aargau-thumbnail.png', get_stylesheet_directory_uri()),
		'description' => 'Sektion Aargau'
	),
	'zh' => array(
		'url' => sprintf('%s/images/header-zuerich.png', get_stylesheet_directory_uri()),
		'thumbnail_url' => sprintf('%s/images/header-aargau-thumbnail.png', get_stylesheet_directory_uri()),
		'description' => 'Sektion Z&uuml;rich'
	)
));

?>
