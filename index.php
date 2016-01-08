<?php get_header(); ?>
	
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="wrap row<?= ' '.get_field('page_type_acf') ?>">
					<?php if(is_front_page()) : ?>
							
							<?php get_template_part( 'content', 'home' ); ?>

					<?php endif; ?>

					<?php if ( !empty(get_field('liste')) ) : ?>
						
						<?php get_template_part( 'loop', 'list' ); ?>

					<?php else : ?>

						<?php get_template_part( 'loop', 'flex' ); ?>

					<?php endif; ?>
				</div>

			<?php endwhile; ?>
			
		<?php else : ?>
			<div class="wrap">
				<?php get_template_part( 'content', 'none' ); ?>
			</div>
		<?php endif; ?>

<?php get_footer(); ?>
