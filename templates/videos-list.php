<?php 
	$width = get_sub_field('largeur_du_bloc');
	$col = get_sub_field('nombre_de_colonne');
	$flex = $width > 0 ? 'flex-' . $width : 'flex-5';
	$col = $col > 0 ? ' block-grid-' . $col : '';
	$videos = get_sub_field('videos');
	$titre = get_sub_field('titre') ?: false;
	$sousTitre = get_sub_field('sous_titre') ?: false;
?>

<section class="videos <?= $flex ?>">
	<div class="contain container">
		<?php if( $titre ): ?>
			<h3><?= do_shortcode($titre) ?></h3>
		<?php endif ?>
		<?php if( $sousTitre ): ?>
			<h4><?= do_shortcode($sousTitre) ?></h4>
		<?php endif ?>
		
		<ul class="videos-list">
		    <?php foreach ($videos as $video): ?>
		    	<li class="embed-container"><?= $video['id_de_la_video'] ?></li>		
		    <?php endforeach ?>
		</ul>
	</div>
</section>