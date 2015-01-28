<?php 
	$args = array(
		'post_parent'    => $post->ID,
		'post_type'      => 'page',
		'meta_key'       => 'name',
		'orderby'        => 'meta_value',
		// 'order'          => 'ASC'
		'posts_per_page' => -1
	);
	$listArtistes = get_posts( $args ); 

	foreach ( $listArtistes as $post ) : setup_postdata( $post ); ?>

			<a href="<?php the_permalink() ?>" class="container flex-2 post-it artiste <?php the_field('category') ?>">
				<div class="thumbnail">
					<img src="<?php the_field('thumbnail') ?>" alt="">
				</div>
				<div class="detail">
					<h3><?= get_field('prenom') . ' ' . get_field('nom') ?></h3>
					<hr>
					<div class="content">
						<?php the_field('courte_biographie') ?>
					</div>
				</div>
			</a>

	<?php endforeach; wp_reset_postdata();
?>