<aside class="main" id="aside">

	<?php 

	the_nav_section(8, [
		'meta_key' => 'nom',
		'orderby' => 'meta_value',
		'order' => 'ASC'
	]);

	the_nav_section(1390, [
		'meta_key' => 'date_de_debut', 
		'orderby' => 'meta_value', 
		'order'	=> 'DESC'
	]);

	the_nav_section(2191, [
		'meta_key' => 'date_de_debut', 
		'orderby' => 'meta_value', 
		'order'	=> 'DESC'
	]);
	?>
</aside>