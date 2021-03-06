<?php 
	$galleryType = get_sub_field('type');
	$galleryId = get_sub_field('gallerie_id')[0]['ngg_id'];
	$galleryWp = get_sub_field('gallerie_img');
	$width = get_sub_field('largeur_du_bloc') ;
	$flexClass = $width > 0 ? 'flex-' . $width : 'flex-7';
	$nbCol = get_sub_field('nombre_de_colonne');
	$fit = get_sub_field('format_dimage') ?: 'contain';
	$titre = get_sub_field('titre') ?: false;
	$nextgenPro = get_sub_field('nextgen_pro') ?: false;
	$sousTitre = get_sub_field('sous-titre') ?: false;
	$limitImage = (int) get_sub_field('nombre_dimage') ?: 8;

	if($width === "0" || $width === 0) $flex = 'flex-5 grow max-7';
	elseif ( count(explode(',', $width)) > 1) {
		$width = explode(',', $width);
		$flex = 'flex-' . $width[0] . ' grow max-' . $width[1]; 
	} else $flex = 'flex-' . $width;
	

if ($galleryType == 'nextgenPro') : ?>
	<section class="gallery <?= $galleryType ?> <?= $flexClass ?>">
		
		<div class="contain container">

			<?php if( $titre ): ?>
				<h4 class="title"><?= do_shortcode($titre) ?></h4>
			<?php endif ?>
			<?php if( $sousTitre ): ?>
				<h4><?= do_shortcode($sousTitre) ?></h4>
			<?php endif ?>

			<?php if( $nextgenPro ): ?>
				<div class="content">
					<?= apply_filters('the_content', $nextgenPro) ?>
				</div>
			<?php endif ?>

		</div>
	</section>
		
		
<?php else :

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

	<section class="gallery <?= $galleryType ?> <?= $flexClass ?>">
		
		<div class="contain container">
			<?php if ($galleryType == 'slideshowNg' || $galleryType == 'slideshowWP'): ?>

				<?php if( $titre ): ?>
					<h4 class="title"><?= do_shortcode($titre) ?></h4>
				<?php endif ?>
				<?php if( $sousTitre ): ?>
					<h4><?= do_shortcode($sousTitre) ?></h4>
				<?php endif ?>

				<div class="fotorama"
					data-nav="thumbs"
					data-autoplay="true"
					data-loop="true"
					data-fit="<?= $fit ?>"
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

				<?php if( $titre ): ?>
					<h3 class="title"><?= do_shortcode($titre) ?></h3>
				<?php endif ?>
				<?php if( $sousTitre ): ?>
					<h4><?= do_shortcode($sousTitre) ?></h4>
				<?php endif ?>
				
				<div class="selection bloc">
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
						<?php if($i >= $limitImage && $limitImage !== -1) break; ?>
					<?php endforeach ?>

				</div>

			<?php endif ?>
		</div>
			
	</section>

	<?php if( empty($galleryId) ) : ?>
		<script type="text/javascript">
			var <?= $gid ?> = <?= json_encode( $gallery) ?>;
		</script>
	<?php endif; ?>

	<?php endif ?>
<?php endif ?>