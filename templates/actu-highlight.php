<?php 
	$flex = $post->class; 
	$id = $post->ID;
	$linkID =  get_field('lien')[0];
	$categorie = get_field('category', $linkID);
?>

<?php if( get_field('titre') ): ?>
	<a href="<?= get_permalink($linkID) ?>" class="actu highlight container <?= $flex ?> <?= $categorie ?>">
		<?php if( has_post_thumbnail() ): ?>
			<div class="thumbnail">
				<?php the_post_thumbnail('medium') ?>
			</div>
		<?php endif ?>
		<?php if( get_field('intitule') ): ?>
			<h5><?= get_field('intitule') ?></h5>
		<?php endif ?>
		<h2><?= get_field('titre') ?></h2>
		<?php if( get_field('sous_titre') ): ?>
			<h3><?= get_field('sous_titre') ?></h3>
		<?php endif ?>
		<?php if( get_field('resume') ): ?>
			<hr>
			<div class="content">
				<p><?= get_field('resume') ?></p>
			</div>
		<?php endif ?>
	</a>
<?php endif ?>