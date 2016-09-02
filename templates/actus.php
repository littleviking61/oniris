<?php 
	global $post;
	$width = get_sub_field('largeur_du_bloc');
	$flex = $width > 0 ? 'flex-' . $width : 'flex-2';
?>

<h3><?= get_sub_field('titre'); ?></h3>
<section class="actus full">

	<?php 
	$enAvant = get_sub_field('relations');
	if(count($enAvant)>1) : ?>
			<ul class="contain">
				<?php
				foreach ( $enAvant as $post ) : 
					setup_postdata( $post );
					$post->class = 'flex-4';
					get_template_part('templates/actu');
					wp_reset_postdata();
				endforeach;
				?>
			</ul>
	<?php else: ?>
		<?php
			foreach ( $enAvant as $post ) : 
				setup_postdata( $post );
				$post->class = 'flex-12';
				get_template_part('templates/actu-highlight');
				wp_reset_postdata();
			endforeach;
		?>
	<?php endif ?>

</section>