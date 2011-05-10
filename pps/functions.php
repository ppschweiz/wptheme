<?php
//
// i18n
//

// Make theme available for translation
load_theme_textdomain('pps', TEMPLATEPATH . '/po');
//load_theme_textdomain('twentyten', TEMPLATEPATH . '/po/twentyten');

//
// Stuff that concerns the navigation menu
//

register_nav_menus(array(
	'primary' => __('Primary Navigation', 'PPS'),
));

// Enable post thumbnails
add_theme_support('post-thumbnails');

// Add post thumbnails as icons in the menu
function addMenuIcons($menu_text) {
	$pages = get_pages(array(
		'depth' => 0,
	));

	foreach ($pages as $page) {
		$id = $page->ID;
		$title = $page->post_title;

		$icon = get_the_post_thumbnail($id);
		if ($icon != '') {
			$menu_text = preg_replace(
				"/>$title</",
				">$icon$title<",
				$menu_text);
		}
	}
	return $menu_text;
}
add_filter('wp_nav_menu', 'addMenuIcons');
add_filter('wp_page_menu', 'addMenuIcons');

// Add the home link to the menu
function new_nav_menu_items($items) {
	$img = sprintf('%s/images/hnavico_home.png',
		get_stylesheet_directory_uri());
	$url = home_url( '/' );

	$expimg = sprintf('%s/images/navup.png',
		get_stylesheet_directory_uri());
	$expand = '<br /><a id="expand" href="#" onclick="hideMenu();return false"><img id="nav-expand" src="' . $expimg . '" alt="Close navigation" /></a>';
	$homelink = '<li class="home"><span><a href="' . $url . '"><img src="' . $img . '" alt="' . __('Home') .'" /></a> ' . $expand . '</span></li>';
	$items = $homelink . $items;
	return $items;
}
add_filter('wp_list_pages', 'new_nav_menu_items');
add_filter('wp_nav_menu_items', 'new_nav_menu_items');

//
// Other stuff
//

// Function to fill in the <title> tag. TODO: move somewhere else
function showPageTitle() {
	//
	// Print the content for the <title> tag based on what is being viewed.
	//
	global $page, $paged;

	wp_title('|', true, 'right');

	// Add the blog name.
	bloginfo('name');

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page()))
		echo " | $site_description";

	// Add a page number if necessary:
	if ($paged >= 2 || $page >= 2)
		echo ' | ' . sprintf(__('Page %s', 'pps'), max($paged, $page));
}

//
// Widgets
//

function pps_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar(array(
		'name' => __('Primary Widget Area', 'pps'),
		'id' => 'primary-widget-area',
		'description' => __('The primary widget area', 'pps'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

// Register sidebars by running pps_widgets_init() on the widgets_init hook
add_action('widgets_init', 'pps_widgets_init');

//
// Header images
//

// The default header image
define('HEADER_IMAGE', sprintf('%s/images/header-de.png',
					get_stylesheet_directory_uri()));
define('HEADER_IMAGE_WIDTH', 365);
define('HEADER_IMAGE_HEIGHT', 116);

function addHeaderImages($images) {
	$headerImages = array();

	foreach ($images as $name => $title) {
		$headerImages[$name] = array(
			'url' => sprintf('%s/images/header-%s.png', 
				get_stylesheet_directory_uri(), $name),
			'thumbnail_url' => 
				sprintf('%s/images/header-%s-thumbnail.png',
				get_stylesheet_directory_uri(), $name),
			'description' => $title
		);
	}
	register_default_headers($headerImages);
}

addHeaderImages(array(
	'de' => 'Piratenpartei',
	'fr' => 'Parti Pirate',
	'it' => 'Partito Pirata',
	'en' => 'Pirate Party',
	'ag' => 'Sektion Aargau',
	'fri' => 'Section Fribourgeoise',
	'ge' => 'Section Genevoise',
	'vd' => 'Section Vaudoise',
	'zh' => 'Sektion Z&uuml;rich',
));

//
// User profile
//

// make wordpress track the 'full' query argument
function pps_add_query_vars($vars)
{
	$vars[] = 'full';
	return $vars;
}

// add and configure rewrite rule for '/profile'
function pps_flush_rules()
{
	$rules = get_option('rewrite_rules');

	if (!isset($rules['(profile)/(.*)$']))
	{
		echo 'FLUSH';
		// force wordpress to refresh its rewrite rules
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}
}

// add our rewrite rule
function pps_insert_rewrite_rules($rules)
{
	$newrules = array(
		'(profile)/(.*)$' => 'index.php?author_name=$matches[2]&full=1'
	);
	return $newrules + $rules;
}

add_filter('rewrite_rules_array', 'pps_insert_rewrite_rules');
add_filter('query_vars', 'pps_add_query_vars');
add_filter('wp_loaded', 'pps_flush_rules');

// extra fields to be added to the user profile
function extraProfileFields()
{
	return array(
		'publicmail' => array(
			'name' => __('Public mail address', 'pps'),
			'desc' => __('Your publicly visible e-mail address', 'pps')
		),
		'picture_url' => array(
			'name' => __('Profile picture', 'pps'),
			'desc' => __('URL to your profile picture (eg. http://foo.com/me.jpg)', 'pps')
		),
		'ppstitle' => array(
			'name' => __('PPS function', 'pps'),
			'desc' => __("Your function in the PPS (eg. 'President of the Pirate Party' or 'PPS webmaster')", 'pps')
		),
		'yearofbirth' => array(
			'name' => __('Year of Birth', 'pps'),
			'desc' => __('The year you were born (eg. 1964)', 'pps')
		),
		'job' => array(
			'name' => __('Job', 'pps'),
			'desc' => __('Your current job (eg. President)', 'pps')
		),
		'education' => array(
			'name' => __('Education', 'pps'),
			'desc' => __('Your education (eg. PhD in Physics)', 'pps')
		),
		'twitter' => array(
			'name' => __('Twitter profile', 'pps'),
			'desc' => __('Your Twitter username (eg. ppsde)', 'pps')
		),
		'politnetz' => array(
			'name' => __('Politnetz profile', 'pps'),
			'desc' => __('Your politnetz.ch profile URL (eg. http://hans.muster.politnetz.ch/ or http://www.politnetz.ch/benutzer/123456/profiles)', 'pps')
		),
	);
}

add_action( 'show_user_profile', 'pps_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'pps_show_extra_profile_fields' );

add_action( 'personal_options_update', 'pps_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'pps_save_extra_profile_fields' );

function pps_show_extra_profile_fields($user)
{
	printf("<h3>%s</h3>\n", __('Extra profile information', 'pps'));
	echo '<table class="form-table">';

	foreach (extraProfileFields() as $key => $values)
	{
?>
<tr>
	<th><label for="<?php echo $key ?>"><?php echo $values['name'] ?></label></th>
		<td>
			<input type="text" name="<?php echo $key ?>" id="<?php echo $key ?>" value="<?php echo esc_attr(get_user_meta($user->ID, $key, true)); ?>" class="regular-text" /><br />
			<span class="description"><?php echo $values['desc'] ?></span>
		</td>
	</tr>
<?php
	}
	echo '</table>';
}

function pps_save_extra_profile_fields($user_id)
{
	if (!current_user_can( 'edit_user', $user_id ))
		return false;

//	echo "user=" . $user_id . "<br/>";

	foreach (extraProfileFields() as $key => $values)
	{
//		echo $key . "=" . $_POST[$key];
//		echo '<br />';
		update_user_meta($user_id, $key, $_POST[$key]);
	}
}

//
// Other stuff
//

// Include some stuff from the twentyten theme
require_once('twentyten.php');

add_custom_image_header('','twentyten_admin_header_style');
?>
