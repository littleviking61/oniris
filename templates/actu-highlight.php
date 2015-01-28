<?php 
	$class = $post->class; 
	$id = $post->ID;
	$linkID =  get_field('lien')[0];
	$categorie = get_field('category', $linkID);
?>

<a href="<?= get_permalink($linkID) ?>" class="actu highlight container <?= $class ?> <?= $categorie ?>">
	<div class="thumbnail">
		<img src="<?php the_field('image') ?>" alt="">
	</div>
	<h5><?= get_field('intitule') ?></h5>
	<h2><?= get_field('titre') ?></h2>
	<h3><?= get_field('sous_titre') ?></h3>
	<hr>
	<div class="content">
		<p><?= get_field('resume') ?></p>
	</div>
</a>
