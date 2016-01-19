<section class="actus full">

	<?php 
	$enAvant = get_field('en_avant');
	foreach ( $enAvant as $post ) : 
		setup_postdata( $post );
		$post->class = 'flex-6';
		get_template_part('templates/actu-highlight');
		wp_reset_postdata();
	endforeach;

	$premiereColonne = get_field('premiere_colonne'); ?>
	<section class="flex-3">
		<ul class="contain">
			<?php foreach ( $premiereColonne as $post ) :
				setup_postdata( $post );
				$post->class = 'full';
				get_template_part('templates/actu');
				wp_reset_postdata();
			endforeach; ?>
		</ul>
	</section>

	<?php	$deuxiemeColonne = get_field('deuxieme_colonne'); ?>
	<section class="flex-3">
		<ul class="contain">
			<?php foreach ( $deuxiemeColonne as $post ) : 
				setup_postdata( $post );
				$post->class = 'full no-img';
				get_template_part('templates/actu');
				wp_reset_postdata();
			endforeach; ?>
			<a href="/actualites" class="container special"><?php the_field('icon_du_lien') ?><?php the_field('texte_de_lien') ?></a>
		</ul>
	</section>
</section>