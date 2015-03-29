<?php
/**
 * The Sidebar containing the primary widget area.
 */
?>
<?php if ( is_active_sidebar( 'optional-widget-area' ) ) : ?>
				<div id="sidebar-left" class="sidebar">
					<ul>
     <?php dynamic_sidebar('optional-widget-area'); ?>
					</ul>
				</div>
<?php endif; ?>
