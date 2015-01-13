<?php get_header(); ?>

	<div class="content">
		<?php if ( have_posts() ) : ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php if (is_front_page()): ?>

					<?php get_template_part( 'content', 'home' ); ?>

				<?php endif; ?>

				<?php get_template_part( 'loop', 'flex' ); ?>

			<?php endwhile; ?>
			
		<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
