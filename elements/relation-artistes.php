<?php

	// for bloc add manualy
	if (!empty(get_sub_field('relation_artistes')[0])) {
		$artisteID = get_sub_field('relation_artistes')[0];
		$hideId = get_the_id();
	}elseif (!empty(get_field('relation_artistes')[0])) {
		$artisteID = get_field('relation_artistes')[0];
		$hideId = get_the_id();
	}else{
		$artisteID = get_the_id();
		$hideId = null;
	};

	$longevitee = get_field('longevitee') ?: 0;
	$categorie = get_field('category');
	$period = $longevitee > 0 ? [date('Ymd', strtotime("-{$longevitee} month")), date('Ymd')] : null;
	$dateformatstring = "d F";
	// args  
	$args = [
		'numberposts' => -1,
		'post_type' => 'page',
		// 'date_query' => [
		// 	'before' => $period !== 0 ?  : null,
		// ],
		'meta_query' => [
			'relation' => 'AND',
			[
				'key' => 'relation_artistes',
				'value' => '"'.$artisteID.'"',
				// 'type' => 'NUMERIC',
				'compare' => 'LIKE'
			],
			[
				'key' => 'date_de_debut',
				'value' => $period,
        'compare' => 'BETWEEN',
        'type' => 'DATE'
			],
			'meta_query' => [
				'relation' => 'OR',
				[
					'key' => 'page_type_acf',
					'value' => 'foires',
					'compare' => '='
				],
				[
					'key' => 'page_type_acf',
					'value' => 'expositions',
					'compare' => '='
				]
			]
		]
	];

	// get results
	$the_query = new WP_Query( $args );

	// The Loop ?>
	<?php if( $the_query->have_posts() ): $i = 0; ?>
	  <div class="relation-artiste">
	  	<hr>
	  	<?php if (get_field('titre_actualites')): ?>
		  	<div class="info">
  				<h2><?= get_field('titre_actualites') ?></h2>
  			</div>
  		<?php endif; ?>
			<div class="links contain">
				<h3><?= __('Actualitées de l\'artiste') ?></h3>
				<ul class="links-list">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++; ?>
					<?php if ($hideId === get_the_id()) continue; ?>
					<li class="link <?= $categorie ?>">
						<a href="<?php the_permalink(); ?>">
							<?php if( has_post_thumbnail() ): ?>
									<?php the_post_thumbnail('thumbnail') ?>
							<?php endif ?>
							<h4>
								<?php the_field('nom') ?>
							</h4>
							<?php if (get_field('intitule')): ?>
								<p><?= do_shortcode(get_field('intitule')) ?></p>
							<?php else: ?>
								<p>
									du <?= date_i18n("d F", strtotime(get_field('date_de_debut'))) ?><br>
									au <?= date_i18n("d F Y", strtotime(get_field('date_de_fin'))) ?>
								</p>
							<?php endif ?>
						</a>
					</li>
					<?php if($i >= 3) break; ?>
				<?php endwhile; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>

	<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>