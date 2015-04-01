<?php 
	$width = get_sub_field('largeur_du_bloc');
	$col = get_sub_field('nombre_de_colonne');
	$flex = $width > 0 ? 'flex-' . $width : 'flex-5';
	$col = $col > 0 ? ' block-grid-' . $col : ' block-grid-2';
	$videos = get_sub_field('videos');
?>

<section class="container videos <?= $flex ?>">
	<?php if( get_sub_field('titre') ): ?>
		<h4><?= do_shortcode(get_sub_field('titre')) ?></h4>
	<?php endif ?>
	<?php if( get_sub_field('sous_titre') ): ?>
		<h4 class="sub-title"><?= do_shortcode(get_sub_field('sous_titre')) ?></h4>
	<?php endif ?>
	
	<ul class="videos-list<?= $col ?>">
	    <?php foreach ($videos as $video): ?>
	    	<li><?= $video['id_de_la_video'] ?></li>		
	    <?php endforeach ?>
	</ul>

</section>