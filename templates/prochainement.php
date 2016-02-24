<?php 
	$width = get_sub_field('largeur_du_bloc');
	$flexClass = $width > 0 ? 'flex-' . $width : '';
	$titre = get_sub_field('titre') ?: false;
	$sousTitre = get_sub_field('sous-titre') ?: false;
	$type = get_sub_field('type') === 'in' ? true : false;
	$now = new DateTime(); 

	$args = [
		'post_parent'    => 2191,
		'meta_key' => 'date_de_debut',
		'orderby' => 'meta_value', 
		'order'	=> 'DESC',
		'post_type' => 'page',
		'posts_per_page' => -1,
	];

	$childPage = get_posts( $args ); 
	$expos = [];

	foreach ( $childPage as $post ) : setup_postdata( $post );
		$startDate = new DateTime(get_field('date_de_debut', $post->ID));
		if ($now < $startDate && $type === get_field('a_la_galerie', $post->ID)) {
			$expos[] = $post;
		}
	endforeach;


?>

<?php if (count($expos) > 0): ?>

	<section class="prochainements events <?= $flexClass ?>">
		<div class="contain">
			<?php if( $titre ): ?>
				<h3><?= do_shortcode($titre) ?></h3>
			<?php endif ?>
			<?php if( $sousTitre ): ?>
				<h4><?= do_shortcode($sousTitre) ?></h4>
			<?php endif ?>
			<ul>
				<?php foreach ( $expos as $post ) : setup_postdata( $post ); ?>
					<li>
						<a href="<?= get_permalink($post->ID) ?>" title="<?= $post->post_title ?>">
							<?php if( has_post_thumbnail($post->ID) ): ?>
									<?= get_the_post_thumbnail( $post->ID, 'thumbnail') ?>
							<?php endif ?>
							<h4>
								<?php the_field('nom', $post->ID) ?>
							</h4>
							<?php if (get_field('intitule',$post->ID)): ?>
								<p><?= do_shortcode(get_field('intitule',$post->ID)) ?></p>
							<?php else: ?>
								<p>
									du <?= date_i18n("d F", strtotime(get_field('date_de_debut',$post->ID))) ?><br>
									au <?= date_i18n("d F Y", strtotime(get_field('date_de_fin',$post->ID	))) ?>
								</p>
							<?php endif ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
	
<?php endif ?>

<?php wp_reset_postdata(); ?>