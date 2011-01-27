<?php
function pps_theme_options_init() {
	register_setting('pps_options', 'pps_theme_options', 'pps_theme_options_validate');
}

function pps_theme_options_validate($input) {
	$languages = array('de', 'fr');
	if (!in_array($input['lang'], $languages)) {
		$input['lang'] = 'de';
	}
	return $input;
}

function pps_theme_options_add_page() {
	add_theme_page( __( 'Theme Options' ), __( 'Theme Options' ), 'edit_theme_options', 'theme_options', 'pps_theme_options_do_page');
}

function pps_theme_options_do_page() {
?>
<div class="wrap">
        <h2>PPS Theme Options</h2>
        <form method="post" action="options.php">
            <?php settings_fields('pps_options'); ?>
            <?php $options = get_option('pps_theme_options'); ?>
            <table class="form-table">
		<tr valign="top"><th scope="row">Language</th>
		    <td>
			<select name="pps_theme_options[lang]">
				<option <?php if ($options['lang'] == 'de') { ?>selected="selected"<?php } ?>>de</option>
				<option <?php if ($options['lang'] == 'fr') { ?> selected="selected"<?php } ?>>fr</option>
			</select>
		    </td>
                </tr>
            </table>
            <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>
        </form>
</div>
<?php
}

add_action('admin_init', 'pps_theme_options_init');
add_action('admin_menu', 'pps_theme_options_add_page');
?>
