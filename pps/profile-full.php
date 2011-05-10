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

	$full = array_key_exists('full', $_GET);

	$full = $wp_query->query_vars['full'] == 1;

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

	printf('<h1 class="entry-title">%s</h1>', $name);

?>
				<p>
<?php
	if ($data['picture_url']) {
		printf('<img class="alignright size-full wp-image-62" title="%s %s" src="%s" alt="" width="200" height="200" />',
			$thisauthor->first_name, $thisauthor->last_name,
			$data['picture_url']);
	}
	if ($data['ppstitle']) echo $data['ppstitle'];
?>
				</p>
<?php
	if ($data['publicmail'])
	{
		printf('<p><a href="mailto:%s">%s</a></p>',
			$data['publicmail'], $data['publicmail']);
	}
?>
				<table>
					<tbody>
<?php
	row_if_set($data, 'yearofbirth', $desc['yearofbirth']);
	row_if_set($data, 'job', $desc['job']);
	row_if_set($data, 'education', $desc['education']);
?>
						<tr>
							<th><?php echo __('Web links', 'pps') ?></th>
							<td>
<?php
	$hasLink = false;

	if ($data['politnetz'])
	{
		$hasLink = true;
		printf('<a href="%s">Politnetz</a> ', $data['politnetz']);
	}
	if ($data['twitter'])
	{
		$hasLink = true;
		printf('<a href="http://twitter.com/%s">Twitter</a> ',
			$data['twitter']);
	}
	if (!$hasLink)
		echo "-";
?>
							</td>
						</tr>
					<tbody>
				</table>
