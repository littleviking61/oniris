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

	// var_dump($args);
	
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