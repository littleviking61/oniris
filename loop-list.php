<header>
	<h2><?= do_shortcode(get_field('titre_alternatif')) ?: get_the_title() ?></h2>
</header>
<div class="filter-tools">
	<div class="isotop-links" data-filter-group="all">
    <a href="#all" class="button check" data-filter="*">show all</a>
  </div>
  <div class="isotop-links" data-filter-group="cat">
		<a href="#cat" class="button cat-geometrie check" data-filter=".cat-geometrie">geometrie</a>
		<a href="#cat" class="button cat-peinture check" data-filter=".cat-peinture">peinture</a>
		<a href="#cat" class="button cat-photographie check" data-filter=".cat-photographie">photographie</a>
		<a href="#cat" class="button cat-multi check" data-filter=".cat-multi">multi</a>
		<a href="#cat" class="button cat-sculpture check" data-filter=".cat-sculpture">sculpture</a>
	</div>
	<div class="isotop-links" data-filter-group="place">
			<a href="#place" class="button in check" data-filter='[data-place="in"]' data-place="in">in</a>
			<a href="#place" class="button out check" data-filter='[data-place="out"]' data-place="out">out</a>
	</div>
</div>
<div class="list-page <?= get_field('isotop') ? 'isotop' : null ?> full">
	<?php 
		$list = get_field('liste');
		if($list == 'actu') {
			$args = array(
				'posts_per_page' => -1
			);
		}else{
			$args = array(
				'post_parent'    => url_to_postid(get_field('page_parent')),
				'post_type'      => 'page',
				'meta_key'       => get_field('meta_key'),
				'orderby'        => get_field('type_de_meta'),
				// 'order'          => 'ASC'
				'posts_per_page' => -1
			);
		}

		$listPosts = get_posts( $args ); 
		$template = 'elements/single-'.get_field('liste') ;

		foreach ( $listPosts as $post ) :	 
			setup_postdata( $post );
			$post->class = 'flex-4';

	  	if(file_exists(locate_template($template.'.php'))) {
				get_template_part( $template );
			}else{
				get_template_part( 'elements/single' );
			}
		
		endforeach; wp_reset_postdata();
	?>
</div>