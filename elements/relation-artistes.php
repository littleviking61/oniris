	<?php 

	$artisteID = get_the_id();
	$longevitee = get_field('longevitee') ?: 0;
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
					'value' => 'expositions',
					'compare' => '='
				],
				[
					'key' => 'page_type_acf',
					'value' => 'foires',
					'compare' => '='
				]
			]
		]
	];

	// get results
	$the_query = new WP_Query( $args );

	// The Loop ?>
	<?php if( $the_query->have_posts() ): $i = 0; ?>
		<div class="relationship">
			<h5>Actualitées de l'artiste</h5>
			<ul>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++; ?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<div class="short">
							<p>
								<i><?php the_field('nom') ?></i>
							</p>
							<?php if (get_field('intitule')): ?>
								<p class="intitule"><?php do_shortcode(the_field('intitule')) ?></p>
							<?php else: ?>
								<p>
									du <?= date_i18n($dateformatstring, strtotime(get_field('date_de_debut'))) ?><br>
									au <?= date_i18n($dateformatstring, strtotime(get_field('date_de_fin'))) ?>
								</p>
							<?php endif ?>
						</div>
					</a>
				</li>
				<?php if($i >= 3) break; ?>
			<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>