<?php 
	$title = get_sub_field('titre');

	$width = get_sub_field('largeur_du_bloc');
	$specificClass = get_sub_field('specifique_bloc_class');

	$hasImage = get_sub_field('has_image');
	$image = get_sub_field('image');
	$imagePosition = get_sub_field('position');
	
	$hasButton = get_sub_field('has_bouton');
	$linkButton = get_sub_field('lien_du_bouton');
	$textButton = get_sub_field('texte_du_bouton');
	// $buttonPosition = get_sub_field('emplacement_du_bouton');
?>

<section class="container simple <?= $width > 0 ? 'flex-' . $width : 'full' ?> <?= $specificClass ?>">

	<?php if ($hasImage && !empty($image)): ?>
		<div class="thumbnail <?= $imagePosition ?>">
			<img src="<?= $image ?>">
		</div>
	<?php endif ?>

	<div class="content">
		
		<?php if (!empty($title)): ?>
			<h2 class="title"><?= $title ?></h2>
		<?php endif ?>

		<?php the_sub_field('texte'); ?>

		<?php if ($hasButton && !empty($linkButton) && !empty($textButton) ):
			if(strrpos($textButton, "+")> -1) :
				$textButton = '<i class="icon-more"></i> ' . substr($textButton, 1);
			endif ?>
			<a class="button right" href="<?= $linkButton ?>"><?= $textButton ?></a>
		<?php endif ?>

	</div>


</section>