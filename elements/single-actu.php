<?php 
	$flex = 'flex-3'; 
	$linkID =  get_field('lien')[0];
	$specific = get_field('specific_details');
	$actualDate = date('Ymd');

	if($specific === true) {
		$categorie = get_field('category');
		$place = get_field('a_la_galerie');
	}else{
		$categorie = get_field('category', $linkID);
		$relations = get_field('relation_artistes', $linkID);
		$relations = is_array($relations) ? count($relations) : '';
		$startDate = get_field('date_de_debut', $linkID);
		$endDate = get_field('date_de_fin', $linkID);
		$place = get_field('a_la_galerie', $linkID);
	}

  if ($actualDate > $startDate && $actualDate < $endDate){
    $when = "now";
  }elseif($actualDate < $startDate){
  	$when = "upcoming";
  }else{
  	$when = "gone";
  }

	if(is_null($startDate)) $startDate = get_the_date('Ymd');
?>

<?php if( get_field('titre') ): ?>
	<a 	href="<?= get_permalink($linkID) ?>" 
			class="actu highlight container <?= $flex ?> <?= $categorie ?>"
			data-date="<?= $when ?>"
			data-type="<?= $relations > 1 ? 'group' : 'single' ?>"
			data-place="<?= $place || is_null($place) ? 'in' :  'out' ?>">
		
		<?php if( has_post_thumbnail() ): ?>		
			<div class="thumbnail">
				<?php the_post_thumbnail('small') ?>
			</div>
		<?php endif ?>

		<?php if( get_field('intitule') ): ?>
			<h5><?= get_field('intitule') ?></h5>
		<?php endif ?>
		<h2><?= get_field('titre') ?></h2>
		<?php if( get_field('sous_titre') ): ?>
			<h3><?= get_field('sous_titre') ?></h3>
		<?php endif ?>
		<?php if( get_field('resume') ): ?>
			<hr>
			<div class="content">
				<p><?= get_field('resume') ?></p>
			</div>
		<?php endif ?>
	</a>
<?php endif ?>