<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * This file was originally taken from the twentyten theme
 *
 * @package WordPress
 * @subpackage PPS
 */
?>
			</div><!-- #main -->
			<div id="endcontent">&nbsp;</div>

			<div id="pageend">
				<div class="content">
					<div style="float: right">Powered by <a href="https://wordpress.org/">WordPress</a></div>
					<?php echo __('Design: <a href="https://www.pirateparty.ch/">Pirate Party Switzerland</a>', 'pps'); ?><br />
					<a href="<?php echo __('https://creativecommons.org/licenses/by/2.5/ch/deed.en', 'pps') ?>"><?php echo __('CC-BY 2.5 Switzerland', 'pps'); ?></a>
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
