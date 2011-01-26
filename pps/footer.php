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
?>
	</div><!-- #main -->
	<div id="endcontent">&nbsp;</div>
</div><!-- #wrapper -->

	<div id="pageend">
		<div class="content">
			<div style="float: right">Powered by <a href="http://wordpress.org/">WordPress</a></div>
			Design: <a href="http://www.piratenpartei.ch/">Piratenpartei Schweiz</a><br />
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
