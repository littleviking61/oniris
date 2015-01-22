<?php /* list des artiste */

// Artistes sous page
$args = [
	'meta_key' => 'name',
	'orderby' => 'meta_value',
	'order' => 'ASC'
];

the_nav_section(8, $args);

the_nav_section(1390, [], 'name');

the_nav_section(2191);