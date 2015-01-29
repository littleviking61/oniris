<?php get_header(); ?>
	
	<?php if(is_page() || is_home()) :
		$class[] = '';
		$pageID = get_the_id();
		if (is_home()) $pageID = get_option('page_for_posts'); 
		if(get_field('isotop', $pageID)) $class[] = 'isotop';
	endif ?>

	<div class="wrap">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'loop', 'flex' ); ?>

			<?php endwhile; ?>
			
		<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
