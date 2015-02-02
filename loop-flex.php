<?php 

/* page resume */
$type = get_field('page_type_acf');

if($type){
  // check if template exist and call it
  $template = locate_template( 'elements/intro-'.$type.'.php' );
  if(file_exists($template)) {
    include($template);
  }
}

if( have_rows('contenu') ) :
    while ( have_rows('contenu') ) : the_row();

        if( get_row_layout() == 'ligne' ):

        	$width = get_sub_field('largeur_du_titre');

      		// ferme la ligne suivante si infini ou nouvelle ligne avant la fin
      		if( (isset($closeAtEnd) && $closeAtEnd) || isset($closeAfter) ) {
      			echo '</div>';
      			unset($closeAtEnd);
      		}

        	if(get_sub_field('nombre_de_bloc') > 0) {
        		// save number of bloc in this row
        		$closeAfter = get_sub_field('nombre_de_bloc');
        	}else{
        		// if number is infini
        		$closeAtEnd = true;
        	};

      		// then open a row 
      		echo '<div class= "row '.get_sub_field('alignement').'">';
        
        elseif( get_row_layout() == 'titre_de_section' ):
					
					$title = get_sub_field('titre'); 
        	$width = get_sub_field('largeur_du_titre');

        	if (!empty($title)): ?>
      			<h2 class="title<?= $width > 0 ? ' flex-' . $width : ' full' ?>"><?= $title ?></h2>
      		<?php endif;

      	else:

        	// check if template exist and call it
        	$template = locate_template( 'templates/'.get_row_layout().'.php' );
        	if(file_exists($template)) {
        		include($template);
        	}
        	// todo systeme de log des erreurs...
        	
        	// to save bloc display
        	if(isset($closeAfter)) $closeAfter--;

        endif;

        // to close div.row
        if(isset($closeAfter) && $closeAfter == 0){
	        	echo '</div>';
	        	unset($closeAfter);
        }

    endwhile;

    if(isset($closeAtEnd) && $closeAtEnd) {
    	echo '</div>';
    	unset($closeAtEnd);
    };

else :

  the_content();   

endif;

?>