<?php get_header(); ?>

	
<main role="document">

	<aside class="main">
		<?php wp_nav_menu( array( 
			'container' => 'aside',
			'container_class' => 'main',
			'theme_location' => 'secondary' )); 
		?>
	</aside>

	<div class="content">
		<?php if ( have_posts() ) : ?>
		
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			
		<?php endif; // end have_posts() check ?>
	</div>

	<?php get_footer(); ?>

</main>