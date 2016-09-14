<div class="site-search">
	<form role="search" method="get" id="searchform" action="<?=	 esc_url( home_url( '/' ) ); ?>">
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?= __('Taper votre recherche ici', 'reverie') ?>"/>
		<button type="submit">
		  <i class="fa fa-search"></i>
		</button>
		<span class="close"><i class="fa fa-close"></i></span>
	</form>
</div>