<?php get_header(); ?>
	
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>


				<div class="wrap row<?= ' '.get_field('page_type_acf') ?>">
					<?php 
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('<div class="breadcrumbs">','</div>');
					} ?>
					<?php if ( !empty(get_field('liste')) ) : ?>
						
						<?php get_template_part( 'loop', 'list' ); ?>

					<?php else : ?>

						<?php get_template_part( 'loop', 'flex' ); ?>

					<?php endif; ?>
					
					<!-- <section class="related row">
						<h2>À lire aussi</h2>
						<?php wpb_related_pages(); ?>
					</section> -->
				</div>


			<?php endwhile; ?>
			
		<?php else : ?>
			<div class="wrap">
				<?php get_template_part( 'content', 'none' ); ?>
			</div>
		<?php endif; ?>

<?php get_footer(); ?>
