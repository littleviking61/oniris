
</main><!-- Container End -->

<?php if (!is_front_page()): ?>
	<section class="related row">
		<h3>Ça vous interessera aussi</h3>
	</section>
<?php endif ?>

<footer class="main" role="contentinfo">
	
	<div class="footer-content">
		
		<div class="row">

			<?php get_template_part('content', 'infospratique') ?>

			<div class="flex-6 grow row">
				<div class="full liste-dartiste">
					<div class="contain container">
						
						<?php

							$args = array(
								'post_parent'    => 8,
								'meta_key' => 'nom',
								'orderby' => 'meta_value',
								'order' => 'ASC',
								'post_type'      => 'page',
								'posts_per_page' => -1,
								'asTitle'				 => false
							);

							$childPage = get_posts( $args ); 
						?>

						
						<ul class="block-grid-4 artistes">
							<li>
								<h3>
									<a href="<?= get_permalink(8) ?>">Artistes</a>
								</h3>
							</li>
							<?php foreach ( $childPage as $post ) : setup_postdata( $post ); ?>
								<?php if (get_field('visible', $post->ID) == 'true'): ?>
									<li>
										<?php 
											$text = isset($result)
												? get_field($result, $post->ID)
												: $post->post_title; ?>
										<a href="<?= get_permalink($post->ID) ?>" title="<?= $text ?>">
											<?= apply_filters('the_title', $text) ?>
										</a>
									</li>
								<?php endif ?>
							
							<?php endforeach ?>
						</ul>

						<?php wp_reset_postdata(); ?>
					</div>
				</div>
				<div class="flex-6">
					<div class="container contain">
						<h4><?php the_field('titre_newsletter', 'option'); ?></h4>
						<?php the_field('contenu_newsletter', 'option'); ?>
					</div>
				</div>

				<div class="flex-4">
					<div class="contain container">
						<h4><?php the_field('titre_sociaux', 'option'); ?></h4>
						<?php the_field('contenu_sociaux', 'option'); ?>
					</div>
				</div>
			</div>
		</div>

	</div>

	<section class="copyright">
		<?php wp_nav_menu( array( 
				'container' => 'nav',
				'container_class' => 'main hide-for-small',
				'theme_location' => 'primary' )); 
		?>
		<p>
			<?php echo date('Y'); ?> &copy; Oniris Néo - <a href="http://http://www.wordpress-fr.net/" rel="nofollow" title="Wordpress CMS">Wordpress</a> - design by <a href="http://www.nuagegraphik.com" rel="nofollow" title="Nuagegraphik">Nuagegraphik</a>
		</p>
	</section>
</footer>

<?php wp_footer(); ?>

</body>
</html>