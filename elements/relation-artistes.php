<div class="relationship">

	<?php 

	$artisteID = get_the_id();
	$longevitee = get_field('longevitee') ?: 0;
	$period = $longevitee > 0 ? [date('Ymd', strtotime("-{$longevitee} month")), date('Ymd')] : null;
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

	// The Loop
	?>
	<?php if( $the_query->have_posts() ): ?>
		<ul>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<li>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			</li>
			<?php //break; ?>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>

	<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
</div>