<div>
	<?php if(empty($gallery) && !empty($galleryId)) :
		global $nggdb; 
		$gallery = $nggdb->get_gallery($galleryId, 'sortorder', 'ASC', true, 0, 0); $i = 0; 
	endif; ?>

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
		
		<?php foreach ($gallery as $image):

			$i++;

			$caption = $image->caption ?: $image['caption'];
			$imageURL = $image->imageURL ?: $image['url'];
			$thumbnailURL = $image->thumbnailURL ?: $image['sizes']['small'];
			$description = $image->description ?: $image['title'];
			$altText = $image->alttext ?: $image['title'];
			$hidden = $image->hidden ?: false;

			$caption = strlen($caption) > 1 ? ' - '. $caption : ''; ?>

			<a href="<?= $imageURL ?>" title="<?= $description ?>" data-caption="<?= $i.'/'.count($gallery) . $caption ?>" class="load-it" >
				<?php if ( !$hidden ) { ?>
					<img title="<?= $description ?>" alt="<?= $altText ?>" src="<?= $thumbnailURL ?>" <?= $image->size ?> />
				<?php } ?>
			</a>
		<?php endforeach ?>

	</div>
</div>