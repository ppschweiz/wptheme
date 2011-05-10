<?php
	get_header();
	get_sidebar();

	$full = $wp_query->query_vars['full'] == 1;
?>
<div id="container">
	<div id="content" role="main">
		<div class="page type-page status-publish hentry">
<?php
	if ($full)
		get_template_part('profile', 'full');
	else
		get_template_part('profile', 'short');
?>
		</div>
	</div>
</div>
<?php
	if (!$full)
		get_template_part('index', 'author');

	get_footer();
?>
