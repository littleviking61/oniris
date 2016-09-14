<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="wrap row">
	
		<h2><?php _e('Search Results for', 'reverie'); ?> "<?php echo get_search_query(); ?>"</h2>
	
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
			<div class="links row">
				<ul>
					<?php while ( have_posts() ) : the_post(); ?>
						<li class="link">
							<a href="<?= get_permalink(); ?>" class="<?php the_field('category') ?>">
								<?php if( get_field('page_type_acf') ): ?>
									<h4><?= get_field('page_type_acf') ?> > <?= get_field('prenom') . ' ' . get_field('nom') ?></h3>
								<?php else: ?>
									<h4><?= get_the_title( ); ?></h4>
								<?php endif ?>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		
	<?php else : ?>
		<h3><?= __('Désolé, la recherche n\'a donné aucun résultat.', 'reverie') ?></h3>
		
	<?php endif; // end have_posts() check ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>