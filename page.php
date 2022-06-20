<?php
$queried_object = get_queried_object();
$page_name      = $queried_object->post_name;
$parent_id      = $queried_object->post_parent;

ob_start();
get_template_part('templates/pages/page', $page_name);
$output = ob_get_contents();
ob_clean();
ob_end_flush();

if ($output) {
	echo $output;
} else {
	get_template_part('templates/pages/page', 'default');
}
