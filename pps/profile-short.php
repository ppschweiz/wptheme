<?php
	$thisauthor = get_userdata(intval($author));

	function row_if_set($data, $key, $name)
	{
		if ($data[$key])
		{
			printf('<tr><th>%s</th><td>%s</td></tr>',
				$name, $data[$key]);
		}
	}

	$data = array();

	foreach (extraProfileFields() as $key => $spec)
	{
		$data[$key] = get_user_meta($author, $key, true);
		$desc[$key] = $spec['name'];
	}

	if ($thisauthor->first_name || $thisauthor->last_name)
		$name = $thisauthor->first_name . " " . $thisauthor->last_name;
	else
		$name = $thisauthor->display_name;
?>
	<div class="quickProfile">
<?php
	if ($data['picture_url']) {
		printf('<img class="alignright size-full wp-image-62" title="%s %s" src="%s" alt="" width="80" height="80" />',
			$thisauthor->first_name, $thisauthor->last_name,
			$data['picture_url']);
	}
	printf('<h1 class="entry-title">%s</h1>', $name);

?>
				<p>
<?php
	if ($data['ppstitle']) echo $data['ppstitle'] . "<br />";
	printf('<a href="/profile/%s">%s &raquo;</a>',
		$thisauthor->user_login, __('View profile', 'pps'));
?>
				</p>
<?php
?>
	</div>
