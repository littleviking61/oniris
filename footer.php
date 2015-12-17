</main><!-- Container End -->

<footer class="main" role="contentinfo">
	
	<section class="row stretch">
		<div class="container flex-3">
			<h3>Menu rapide</h3>
			<?php wp_nav_menu( array( 
				'container' => 'nav',
				'container_class' => 'main hide-for-small',
				'theme_location' => 'primary' )); 
			?>
		</div>
		<div class="container flex-3">
			<h3>Infos pratiques</h3>
		</div>
		<div class="container flex-3">
			<h3>La galerie oniris sur les médias sociaux</h3>
			<p>+ flash code</p>
		</div>
	</section>

	<section class="row">
		<p>&copy; <?php bloginfo('name'); ?> - <?php echo date('Y'); ?> - <a href="http://http://www.wordpress-fr.net/" rel="nofollow" title="Wordpress CMS">Wordpress</a> - design by <a href="http://www.nuagegraphik.com" rel="nofollow" title="Nuagegraphik">Nuagegraphik</a></p>
	</section>
</footer>

<?php wp_footer(); ?>

</body>
</html>