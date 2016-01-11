
</main><!-- Container End -->

<?php if (!is_front_page()): ?>
	<section class="related row">
		<h3>Ça vous interessera aussi</h3>
	</section>
<?php endif ?>

<footer class="main" role="contentinfo">
	
	<div class="footer-content">
		
		<div class="row">

			<div class="min-6 liste-dartiste">
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

			<div class="min-2 socials">
				<div class="contain container">
					<h4><?php the_field('titre_sociaux', 'option'); ?></h4>
					<?php the_field('contenu_sociaux', 'option'); ?>
				</div>
			</div>

		</div>
		<div class="row">

			<div class="min-2">
				<div class="container contain">
					<h4><?php the_field('titre_newsletter', 'option'); ?></h4>
					<?php the_field('contenu_newsletter', 'option'); ?>
				</div>
			</div>

			<div class="infos-pratiques min-6">
				<div class="contain container special">
					<h4><?php the_field('titre_infos', 'option'); ?></h4>
					<div class="content has-button">
						<?php the_field('contenu_du_footer', 'option'); ?>
						<a class="button right" href="<?php the_field('page_en_lien', 'option') ?>"><?php the_field('icone_du_lien', 'option') ?> <?php the_field('texte_du_lien', 'option') ?></a>
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