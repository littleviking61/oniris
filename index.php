<?php get_header(); ?>

<!-- Start the main container -->
<div class="wrap">
	
	<nav class="main"><?php get_sidebar(); ?></nav>

	<!-- Row for main content area -->
	<div class="content" role="document">
	
		<?php if ( have_posts() ) : ?>
		
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			
		<?php endif; // end have_posts() check ?>
	
		<?php get_footer(); ?>

	</div>	
</div>