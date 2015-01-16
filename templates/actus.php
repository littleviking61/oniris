<?php $width = get_sub_field('largeur_du_bloc'); ?>

<section class="actus <?= $width > 0 ? 'flex-' . $width : 'full' ?>">
	<?php $title = get_sub_field('titre'); ?>

	<?php if (!empty($title)): ?>
		<header>
			<h2 class="title full"><?= $title ?></h2>
		</header>
	<?php endif ?>

	<div class="actualities">
		<?php
			$args = array( 'category_name' => 'actu', 'orderby' => 'date', 'posts_per_page' => 6 );
			$lastposts = get_posts( $args ); 

			foreach ( $lastposts as $post ) : 
				setup_postdata( $post );
				get_template_part('templates/actu');
			endforeach;

			wp_reset_postdata(); 
		?>
	</div>
</section>