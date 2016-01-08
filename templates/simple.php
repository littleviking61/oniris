<?php 
	$title = do_shortcode(get_sub_field('titre'));
	$subTitle = do_shortcode(get_sub_field('sous-titre'));

	$hasImage = get_sub_field('has_image');
	$image = get_sub_field('image');
	$imagePosition = get_sub_field('position');

	$width = get_sub_field('largeur_du_bloc');
	$flexClass = $width > 0 ? 'flex-' . $width : 'full';
	$specificClass = $flexClass . ' ' . get_sub_field('specifique_bloc_class') . ($hasImage ? ' has-image' : '');

	
	$hasButton = get_sub_field('has_bouton');
	$linkButton = get_sub_field('lien_btn');
	$textButton = get_sub_field('texte_du_bouton') . get_sub_field('icon');

	// $buttonPosition = get_sub_field('emplacement_du_bouton');
?>

<section class="simple <?= $specificClass ?>">

	<div class="contain container">

		<div class="content<?= $hasButton ? " has-button" : "";?>">

			<?php if (!empty($title)): ?>
				<h3 class="title"><?= $title ?></h3>
			<?php endif ?>
			
			<?php if (!empty($subTitle)): ?>
				<h4 class="sub-title"><?= $subTitle ?></h4>
			<?php endif ?>
		
			<?php $text = apply_filters( 'the_content', get_sub_field('texte') ); ?>
			<?php $text = str_replace('<p><!--more--></p>', '<a class="button right more" href="#more"><span>Lire </span><i class="fa fa-plus"></i></a>', $text); ?>
			<?php $text = str_replace('<!--more--></p>', '</p><a class="button right more" href="#more"><span>Lire </span><i class="fa fa-plus"></i></a>', $text); ?>
			<?= $text ?>

			<?php if ($hasButton && !empty($linkButton) && !empty($textButton) ):
				// $plusPosition = strrpos($textButton, "+");
				// if($plusPosition == 0) :
				// 	$textButton = '<i class="icon-more"></i><span>' . substr($textButton, 1) . '</span>';
				// elseif($plusPosition == strlen($textButton) - 1) :
				// 	$textButton =  '<span>' . substr($textButton, 0, -1) . '</span><i class="icon-more"></i>';
				// endif ?>
				<a class="button right" href="<?= $linkButton ?>"><?= $textButton ?></a>
			<?php endif ?>

		</div>
	</div>


</section>