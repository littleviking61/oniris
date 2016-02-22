<?php 
	$width = get_sub_field('largeur_du_bloc');
	$flex = $width > 0 ? 'flex-' . $width : 'flex-4';
	$videos = get_sub_field('videos');
	$titre = get_sub_field('titre') ?: false;
	$sousTitre = get_sub_field('sous-titre') ?: false;
	$container = get_sub_field('specifique_bloc_class') === 'no-bg' ? '' : 'container';
?>

<section class="video <?= $flex ?>">
	
	<div class="contain <?= $container ?>">
			<?php if( $titre ): ?>
				<h3><?= do_shortcode($titre) ?></h3>
			<?php endif ?>
			<?php if( $sousTitre ): ?>
				<h4><?= do_shortcode($sousTitre) ?></h4>
			<?php endif ?>
			
		   <?= get_sub_field('id_de_la_video') ?></li>
	</div>		

</section>