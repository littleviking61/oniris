<?php 
	$width = get_sub_field('largeur_du_bloc');
	$flex = $width > 0 ? 'flex-' . $width : 'flex-4';
	$videos = get_sub_field('videos');
?>

<section class="container videos <?= $flex ?>">
	<?php if( get_sub_field('titre') ): ?>
		<h4><?= get_sub_field('titre') ?></h4>
	<?php endif ?>
	<?php if( get_sub_field('sous_titre') ): ?>
		<h4 class="sub-title"><?= get_sub_field('sous_titre') ?></h4>
	<?php endif ?>
	
	<ul class="videos-list">
	    <?php foreach ($videos as $video): ?>
	    	<li><?= $video['id_de_la_video'] ?></li>		
	    <?php endforeach ?>
	</ul>

</section>