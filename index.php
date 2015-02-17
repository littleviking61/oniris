<?php get_header(); ?>
	
	<div class="wrap">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php if ( !empty(get_field('liste')) ) : ?>
					
					<?php get_template_part( 'loop', 'list' ); ?>

				<?php else : ?>

					<?php get_template_part( 'loop', 'flex' ); ?>

				<?php endif; ?>

			<?php endwhile; ?>
			
		<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
