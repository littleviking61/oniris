<aside class="main" id="aside">

			<span class="show-for-medium close-menu" data-show="#aside"><i class="fa fa-times"></i></span>
	
			<?php wp_nav_menu( array( 
				'container' => 'div',
				'container_class' => 'quick-nav show-for-small',
				'theme_location' => 'primary' )); 

			wp_nav_menu( array( 
				'container' => false,
				'menu_class' => 'nav-section',
				'theme_location' => 'secondary' )
			);

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