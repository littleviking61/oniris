<?php 
	$width = get_sub_field('largeur_du_bloc');
	$title = get_sub_field('titre');
	$image = get_sub_field('image');
	$imagePosition = get_sub_field('position');
?>

<section class="container simple <?= $width > 0 ? 'flex-' . $width : 'full' ?>">

	<?php if (!empty($image)): ?>
		<div class="thumbnail <?= $imagePosition ?>">
			<img src="<?= $image ?>">
		</div>
	<?php endif ?>

	<div class="content">
		<?php if (!empty($title)): ?>
			<h2 class="title"><?= $title ?></h2>
		<?php endif ?>

		<?php the_sub_field('texte'); ?>
	</div>

</section>