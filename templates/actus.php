<?php 
	global $post; 
	$width = get_sub_field('largeur_du_bloc');
	$auto = get_sub_field('auto'); 
?>

<section class="actus <?= $width > 0 ? 'flex-' . $width : 'full' ?>">
	<?php $title = do_shortcode(get_sub_field('titre')); ?>

	<?php if (!empty($title)): ?>
		<header>
			<h2 class="title full"><?= $title ?></h2>
		</header>
	<?php endif ?>

	<?php if ($auto) {
		$args = array( /*'category_name' => 'actu', */'orderby' => 'date', 'posts_per_page' => 6 );
		$lastposts = get_posts( $args ); 

		foreach ( $lastposts as $post ) : 
			setup_postdata( $post );
			get_template_part('templates/actu');
		endforeach;
	
	}else{

		$enAvant = get_sub_field('en_avant');
		foreach ( $enAvant as $post ) : 
			setup_postdata( $post );
			$post->class = 'flex-5';
			get_template_part('templates/actu-highlight');
			wp_reset_postdata();
		endforeach;

		$premiereColonne = get_sub_field('premiere_colonne'); ?>
		<section class="flex-4">
			<ul class="contain">
				<?php foreach ( $premiereColonne as $post ) :
					setup_postdata( $post );
					$post->class = 'full';
					get_template_part('templates/actu');
					wp_reset_postdata();
				endforeach; ?>
			</ul>
		</section>

		<?php	$deuxiemeColonne = get_sub_field('deuxième_colonne'); ?>
		<section class="flex-3">
			<ul class="contain">
				<?php foreach ( $deuxiemeColonne as $post ) : 
					setup_postdata( $post );
					$post->class = 'full no-img';
					get_template_part('templates/actu');
					wp_reset_postdata();
				endforeach; ?>
				<a href="/actualites" class="container yellow button big">Cliquez-ici pour voir plus d'actualites</a>
			</ul>
		</section>

	<?php

	} 
	wp_reset_postdata();?>
</section>