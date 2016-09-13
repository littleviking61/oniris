
</main><!-- Container End -->

<footer class="main" role="contentinfo">

	<div class="footer-content">

		<div class="row menus">
				<div class="">
					<?php $menu = wp_nav_menu( array(
						'echo' => false, 
						'container' => 'nav',
						'container_class' => 'hide-for-small',
						'theme_location' => 'footer1' )); 
						$logo = '<img src="'.get_template_directory_uri().'/img/logo-oniris-white.svg" alt="">';
						$menu = str_replace('logo', $logo, $menu); ?>
						<?= $menu ?>
				</div>
				<?php $posts = get_field('relations');
				if( $posts ): ?>
				<div>
					<nav>
						<ul class="menu">
							<li>
								<a href="#">
									<?php the_field('titre_relations'); ?>
								</a>
							</li>
							<ul class="sub-menu">
							<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
								<?php setup_postdata($post); ?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<?php the_field('nom'); ?> <?php the_field('prenom'); ?>
									</a>
								</li>
							<?php endforeach; wp_reset_postdata(); ?>
							</ul>
						</ul>
					</nav>
				</div>
				<?php endif; ?>
				<div class="">
					<?php wp_nav_menu( array( 
						'container' => 'nav',
						'container_class' => 'hide-for-small',
						'theme_location' => 'footer2' )); 
						?>
				</div>
				<div class="">
					<?php wp_nav_menu( array( 
						'container' => 'nav',
						'container_class' => 'hide-for-small',
						'theme_location' => 'footer3' )); 
						?>
						<nav>
							<?php 
								the_nav_section(2191, ['meta_key' => 'date_de_debut', 'orderby' => 'meta_value', 'order'	=> 'DESC', 'posts_per_page' => 8]);
							 ?>
						</nav>
				</div>

			<div class="flex-3 socials">

				<div class="contain">
					<h4><?php the_field('titre_newsletter', 'option'); ?></h4>
					<?php the_field('contenu_newsletter', 'option'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="copyright">
		<div class="copyright-content">
			<p>
				<?php echo date('Y'); ?> &copy; Oniris Néo - <a href="http://http://www.wordpress-fr.net/" rel="nofollow" title="Wordpress CMS">Wordpress</a> - design by <a href="http://www.nuagegraphik.com" rel="nofollow" title="Nuagegraphik">Nuagegraphik</a>
			</p>
			<?php wp_nav_menu( array( 
					'container' => 'nav',
					'container_class' => 'hide-for-small',
					'theme_location' => 'primary' )); 
			?>
		</div>
	</section>
</footer>

<?php wp_footer(); ?>

</body>
</html>