<?php 
	$width = get_sub_field('largeur_du_bloc');
	$flex = $width > 0 ? 'flex-' . $width : 'flex-4';
	$videos = get_sub_field('videos');
	$container = get_sub_field('specifique_bloc_class') === 'no-bg' ? '' : 'container';
?>

<section class="video <?= $flex ?>">
	
	<div class="contain <?= $container ?>">
			<?php if( get_sub_field('titre') ): ?>
				<h4><?= do_shortcode(get_sub_field('titre')) ?></h4>
			<?php endif ?>
			<?php if( get_sub_field('sous_titre') ): ?>
				<h4 class="sub-title"><?= do_shortcode(get_sub_field('sous_titre')) ?></h4>
			<?php endif ?>
			
		   <?= get_sub_field('id_de_la_video') ?></li>
	</div>		

</section>