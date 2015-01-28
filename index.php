<?php get_header(); ?>

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
