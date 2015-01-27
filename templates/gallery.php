<?php 
	$gallerieId = get_sub_field('gallerie_id')[0]['ngg_id'];
?>

<section class="container gallery flex-6">
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
		data-hash="true"
		data-keyboard="true"
		data-allowfullscreen="true">

	<?php global $nggdb; $gallery = $nggdb->get_gallery($gallerieId, 'sortorder', 'ASC', true, 0, 0); ?>
	<?php foreach ($gallery as $image): ?>
		<img src="<?= $image->imageURL ?>" data-caption="<?= $image->caption ?>">
	<?php endforeach ?>
		
	</div>
</section>