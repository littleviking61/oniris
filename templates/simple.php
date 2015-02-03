<?php 
	$title = get_sub_field('titre');
	$subTitle = get_sub_field('sous-titre');

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
			<h3 class="title"><?= $title ?></h3>
		<?php endif ?>
		
		<?php if (!empty($subTitle)): ?>
			<h4 class="sub-title"><?= $subTitle ?></h4>
		<?php endif ?>

		<?php the_sub_field('texte'); ?>

		<?php if ($hasButton && !empty($linkButton) && !empty($textButton) ):
			$plusPosition = strrpos($textButton, "+");
			if($plusPosition == 0) :
				$textButton = '<i class="icon-more"></i><span>' . substr($textButton, 1) . '</span>';
			elseif($plusPosition == strlen($textButton) - 1) :
				$textButton =  '<span>' . substr($textButton, 0, -1) . '</span><i class="icon-more"></i>';
			endif ?>
			<a class="button right" href="<?= $linkButton ?>"><?= $textButton ?></a>
		<?php endif ?>

	</div>


</section>