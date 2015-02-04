<?php 
	$galleryType = get_sub_field('type');
	$gallerieId = get_sub_field('gallerie_id')[0]['ngg_id'];
	$galleryWp = get_sub_field('gallerie_img');
	$width = get_sub_field('largeur_du_bloc');
?>
<section class="container gallery <?= $width > 0 ? 'flex-' . $width : 'flex-6' ?>">

	<?php if( get_sub_field('titre') ): ?>
		<h4><?= get_sub_field('titre') ?></h4>
	<?php endif ?>

	<?php if ($galleryType == 'slideshowNg'): ?>
		<div class="fotorama"
			data-nav="thumbs"
			data-autoplay="true"
			data-loop="true"
			data-width="100%"
			data-maxwidth="100%"
			data-ratio="3/2"
			data-thumbwidth="100px"
			data-thumbheight="100px" thumbmargin="10px"
			data-arrows="false"
			data-click="true"
			data-swipe="true"
			data-keyboard="true"
			data-allowfullscreen="true">
	<?php else: ?>
		<div class="fotorama-special"
			data-nav="thumbs"
			data-allowfullscreen="true">
	<?php endif ?>

	<?php if (!empty($gallerieId)): ?>
		
		<?php global $nggdb; $gallery = $nggdb->get_gallery($gallerieId, 'sortorder', 'ASC', true, 0, 0); $i = 0; ?>
		<?php foreach ($gallery as $image): $i++; ?>
			<a href="<?= $image->imageURL ?>" title="<?= $image->description ?>" data-caption="<?= $i.'/'.count($gallery).' - '.$image->caption ?>" <?= $image->thumbcode ?> >
				<?php if ( !$image->hidden ) { ?>
				<img title="<?= $image->description ?>" alt="<?= $image->alttext ?>" src="<?= $image->thumbnailURL ?>" <?= $image->size ?> />
				<?php } ?>
			</a>
		<?php endforeach ?>

	<?php elseif(!empty($galleryWp)): ?>
		<?php foreach ($galleryWp as $image): ?>
			<img src="<?= $image['url'] ?>" data-caption="<?= $image['title'] ?>">
		<?php endforeach ?>

	<?php endif ?>
		
	</div>
</section>