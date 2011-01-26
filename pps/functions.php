<?php
define( 'HEADER_IMAGE', '/wp-content/themes/piraten/images/de.png' );
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 365 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 116 ) );

function change_home2($menu_text) {
	return preg_replace(
		'/"><a href=".*" title="Home">Home/',
		' first"><a href="http://www.piraten-aargau.ch/" title="Home"><img src="/wp-content/themes/piraten/images/hnavico_home.png" />',
		$menu_text);
}

function change_home($menu_text) {
	return preg_replace(
		'/ ><a href=".*" title="Home">Home/',
		' class="first"><a href="http://www.piraten-aargau.ch/" title="Home"><img src="/wp-content/themes/piraten/images/hnavico_home.png" />',
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
		'url' => '/wp-content/themes/piraten/images/header-aargau.png',
		'thumbnail_url' => '/wp-content/themes/piraten/images/header-aargau-thumbnail.png',
		'description' => 'Sektion Aargau'
	),
	'zh' => array(
		'url' => '/wp-content/themes/piraten/images/header-zuerich.png',
		'thumbnail_url' => '/wp-content/themes/piraten/images/header-zuerich-thumbnail.png',
		'description' => 'Sektion Z&uuml;rich'
	)
));
?>
