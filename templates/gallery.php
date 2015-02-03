<?php 
	$gallerieId = get_sub_field('gallerie_id')[0]['ngg_id'];
	$galleryWp = get_sub_field('gallerie_img');
	$width = get_sub_field('largeur_du_bloc');
?>

<section class="container gallery <?= $width > 0 ? 'flex-' . $width : 'flex-6' ?>">
	<div class="fotorama"
		data-nav="thumbs"
		data-autoplay="true"
		data-loop="true"
		data-width="100%"
		data-maxwidth="100%"
		data-ratio="3/2"
		data-thumbwidth="80px"
		data-thumbheight="80px" thumbmargin="10px"
		data-arrows="false"
		data-click="true"
		data-swipe="true"
		data-keyboard="true"
		data-allowfullscreen="true">

	<?php if (!empty($gallerieId)): ?>
		
		<?php global $nggdb; $gallery = $nggdb->get_gallery($gallerieId, 'sortorder', 'ASC', true, 0, 0); ?>
		<?php foreach ($gallery as $image): ?>
			<img src="<?= $image->imageURL ?>" data-caption="<?= $image->caption ?>">
		<?php endforeach ?>

	<?php elseif(!empty($galleryWp)): ?>
		<?php foreach ($galleryWp as $image): ?>
			<img src="<?= $image['url'] ?>" data-caption="<?= $image['title'] ?>">
		<?php endforeach ?>

	<?php endif ?>
		
	</div>
</section>