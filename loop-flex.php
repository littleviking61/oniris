<?php 

if( have_rows('contenu') ):

    while ( have_rows('contenu') ) : the_row();

        if( get_row_layout() == 'ligne' ):

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
        	echo '<div class= "row">';

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
    }

endif;

?>