<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

	$options = get_option('pps_theme_options');

	if (is_array($options) && array_key_exists('lang', $options) && 
		$options['lang'] != '')
	{
		$lang = $options['lang'];
	} else {
		$locale = get_locale();
		$llang = substr($locale, 0, 2);

		if (in_array($llang, array('de', 'fr'))) {
			$lang = $llang;
		} else {
			$lang = 'de';
		}
	}
?>
			</div><!-- #main -->
			<div id="endcontent">&nbsp;</div>

			<div id="pageend">
				<div class="content">
					<div style="float: right">Powered by <a href="http://wordpress.org/">WordPress</a></div>
		<?php	if ($lang == 'fr') { ?>
					Design: <a href="http://www.partipirate.ch/">Parti Pirate Suisse</a><br />
		<?php	} else { ?>
					Design: <a href="http://www.piratenpartei.ch/">Piratenpartei Schweiz</a><br />
		<?php	} ?>
					<a href="http://creativecommons.org/licenses/by/2.5/ch/deed.de">CC-BY 2.5 Schweiz</a>
				</div>
			</div>
		</div>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
	</body>
</html>
