<?php get_header(); ?>
	
	<?php if(is_page() || is_home()) :
		$class[] = '';
		if(get_field('isotop', get_the_id())) $class[] = 'isotop';
	endif ?>

	<div class="wrap<?= join($class, ' ') ?>">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php if ( !empty(get_field('liste')) ) : ?>

					<?php get_template_part( 'loop', 'list' ); ?>

				<?php else : ?>

					<?php get_template_part( 'loop', 'flex' ); ?>

				<?php endif; ?>

			<?php endwhile; ?>
			
		<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
