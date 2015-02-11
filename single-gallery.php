<div class="modal">
	<div class="fotorama-ajax"
		data-nav="thumbs"
		data-autoplay="false"
		data-loop="true"
		data-fit="contain"
		data-width="100%"
		data-ratio="3/2"
		data-thumbwidth="100px"
		data-thumbheight="65px" data-thumbmargin="10"
		data-arrows="false"
		data-click="true"
		data-swipe="true"
		data-keyboard="true"
		data-startindex="<?= $index ?>">
		
	<?php global $nggdb; $gallery = $nggdb->get_gallery($gallerieId, 'sortorder', 'ASC', true, 0, 0); $i = 0; ?>
	<?php foreach ($gallery as $image): $i++; $caption = $image->caption; $caption = strlen($caption) > 1 ? ' - '. $caption : ''; ?>
		<a href="<?= $image->imageURL ?>" title="<?= $image->description ?>" data-caption="<?= $i.'/'.count($gallery) . $caption ?>" <?= $image->thumbcode ?> >
			<?php if ( !$image->hidden ) { ?>
			<img title="<?= $image->description ?>" alt="<?= $image->alttext ?>" src="<?= $image->thumbnailURL ?>" <?= $image->size ?> />
			<?php } ?>
		</a>
	<?php endforeach ?>

	</div>
</div>

