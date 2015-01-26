<?php 
	$class = $post->class; 
	$id = $post->ID;
	$linkID =  get_field('lien')[0];
	$categorie = get_field('category', $linkID);
?>

<section class="actu container <?= $class ?> <?= $categorie ?>">
	<div class="thumbnail">
		<img src="<?php the_field('image') ?>" alt="">
	</div>
	<h5><?= get_field('intitule') ?></h5>
	<a href="<?= get_permalink($linkID) ?>">
		<h3><?= get_field('titre') ?></h3>
		<h4><?= get_field('sous_titre') ?></h4>
	</a>
	<hr>
	<p><?= get_field('resume') ?></p>
</section>