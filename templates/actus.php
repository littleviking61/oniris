<?php 
	$width = get_sub_field('largeur_du_bloc');
	$auto = get_sub_field('auto'); 
?>

<section class="actus <?= $width > 0 ? 'flex-' . $width : 'full' ?>">
	<?php $title = get_sub_field('titre'); ?>

	<?php if (!empty($title)): ?>
		<header>
			<h2 class="title full"><?= $title ?></h2>
		</header>
	<?php endif ?>

	<div class="actualities full row">
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
				$post->class = 'highlight flex-4';
				get_template_part('templates/actu');
			endforeach;
		
		} 
		wp_reset_postdata();?>
	</div>
</section>