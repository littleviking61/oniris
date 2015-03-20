<?php 
	$galleryType = get_sub_field('type');
	$galleryId = get_sub_field('gallerie_id')[0]['ngg_id'];
	$galleryWp = get_sub_field('gallerie_img');
	$width = get_sub_field('largeur_du_bloc');
	$flex = $width > 0 ? 'flex-' . $width : 'flex-7';
	$limitImage = (int) get_sub_field('nombre_dimage') ?: 8;
	
	global $nggdb; 
	$gallery = 
		($galleryType == 'slideshowNg' || $galleryType == 'galleryNg') 
		? $nggdb->get_gallery($galleryId, 'sortorder', 'ASC', true, 0, 0)
		: $galleryWp;
	$i = 0;

	/*
	slideshowNg : Slideshow NG
	slideshowWP : Slideshow WP
	galleryNg : Gallery NG
	galleryWP : Gallery WP
	 */
	// var_dump($galleryWp);
	
	if (!empty($gallery)):

	$gid = uniqid('gallery_');
	?>

	<section class="container gallery <?= $galleryType ?> <?= $flex ?>">
		
		<?php if ($galleryType == 'slideshowNg' || $galleryType == 'slideshowWP'): ?>

			<?php if( get_sub_field('titre') ): ?>
				<h5><?= do_shortcode(get_sub_field('titre')) ?></h5>
			<?php endif ?>
			<div class="fotorama"
				data-nav="thumbs"
				data-autoplay="true"
				data-loop="true"
				data-fit="cover"
				data-width="100%"
				data-maxwidth="100%"
				data-ratio="3/2"
				data-thumbwidth="100px"
				data-thumbheight="65px" data-thumbmargin="10"
				data-arrows="false"
				data-click="true"
				data-swipe="true"
				data-keyboard="true"
				data-allowfullscreen="true">

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

		<?php elseif ($galleryType == 'galleryNg' || $galleryType == 'galleryWP'): ?>

			<?php if( get_sub_field('titre') ): ?>
				<h4><?= get_sub_field('titre') ?></h4>
			<?php endif ?>
			
			<div class="selection">
				<?php foreach ($gallery as $image): 
					$i++; 

					$caption = $image->caption ?: $image['caption'];
					$thumbnailURL = $image->thumbnailURL ?: $image['sizes']['thumbnail'];
					$description = $image->description ?: $image['title'];
					$altText = $image->alttext ?: $image['alt'];
					$hidden = $image->hidden ?: false;
					
					$caption = strlen($caption) > 1 ? ' - '. $caption : ''; ?>

					<a 	href="#show-gallery" 
							data-gallery-id="<?= $galleryId ?>" 
							data-gallery-img="<?= $gid ?>" 
							data-index="<?= $i-1 ?>" 
							title="<?= $description ?>" 
							data-caption="<?= $i.'/'.count($gallery) . $caption ?>" 
							class="" >
						<?php if ( !$hidden ) { ?>
							<img title="<?= $description ?>" alt="<?= $altText ?>" src="<?= $thumbnailURL ?>" <?= $image->size ?> />
						<?php } ?>
					</a>
					<?php if($i >= $limitImage) break; ?>
				<?php endforeach ?>

			</div>

		<?php endif ?>
			
	</section>

	<?php if( empty($galleryId) ) : ?>
		<script type="text/javascript">
			var <?= $gid ?> = <?= json_encode( $gallery) ?>;
		</script>
	<?php endif; ?>

<?php endif ?>