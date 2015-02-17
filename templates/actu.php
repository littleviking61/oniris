<?php 
	$class = $post->class; 
	$id = $post->ID;
	$linkID =  get_field('lien')[0];
	$categorie = get_field('category', $linkID);
?>

<?php if( get_field('titre') ): ?>
	<a href="<?= get_permalink($linkID) ?>" class="actu container <?= $class ?> <?= $categorie ?>">
		<?php if( has_post_thumbnail() ): ?>
			<div class="thumbnail">
				<?php the_post_thumbnail('small') ?>
			</div>
		<?php endif ?>
		<?php if( get_field('intitule') ): ?>
			<h5><?= get_field('intitule') ?></h5>
		<?php endif ?>
		<h3><?= get_field('titre') ?></h3>
		<?php if( get_field('sous_titre') ): ?>
			<hr>
			<div class="content">
				<p><?= get_field('sous_titre') ?></p>
			</div>
		<?php endif ?>

		<?php if ($hasButton && !empty($textButton) ):
			$plusPosition = strrpos($textButton, "+");
			if($plusPosition == 0) :
				$textButton = '<i class="icon-more"></i><span>' . substr($textButton, 1) . '</span>';
			elseif($plusPosition == strlen($textButton) - 1) :
				$textButton =  '<span>' . substr($textButton, 0, -1) . '</span><i class="icon-more"></i>';
			endif ?>
			<a class="button right" href="<?= get_permalink(6) ?>"><?= $textButton ?></a>
		<?php endif ?>

	</a>
<?php endif ?>