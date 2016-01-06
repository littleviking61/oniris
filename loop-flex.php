<?php 

/* page resume */
$type = get_field('page_type_acf');

if($type){
	$hasIntro = get_template_file('elements/intro-'.$type);
	// if($hasIntro && $type !== 'expo') $closeAfter = 1;
}

if(get_field('titre_alternatif') && !empty(get_field('titre_alternatif')) ) : ?>
	<h2><?= do_shortcode(get_field('titre_alternatif')) ?></h2>
<?php endif;


if( have_rows('contenu') ) :
		while ( have_rows('contenu') ) : the_row();

				if( get_row_layout() == 'ligne'):

					// $width = get_sub_field('largeur_du_titre');

					// ferme la ligne suivante si infini ou nouvelle ligne avant la fin
					if( (isset($closeAtEnd) && $closeAtEnd) || isset($closeAfter) ) {
						echo '</div>';
						unset($closeAtEnd);
					}

					if(get_sub_field('nombre_de_bloc') > 0) {
					// 	// save number of bloc in this row
						$closeAfter = get_sub_field('nombre_de_bloc');
					}else{
						// if number is infini
						$closeAtEnd = true;
					};

					// then open a row 
					echo '<div class= "sep flex-12"></div>';
				
				elseif( get_row_layout() == 'col' ) :

					$width = get_sub_field('largeur_de_la_colonne');
					$flexClass = $width > 0 ? 'flex-' . $width : 'full';
					// ferme la ligne suivante si infini ou nouvelle ligne avant la fin
					if( (isset($closeColAtEnd) && $closeColAtEnd) || isset($closeColAfter) ) {
						echo '</div>';
						unset($closeColAtEnd);
					}

					if(get_sub_field('nombre_de_bloc') > 0) {
						// save number of bloc in this row
						$closeColAfter = get_sub_field('nombre_de_bloc');
					}else{
						// if number is infini
						$closeColAtEnd = true;
					};

					// then open a row 
					echo '<div class= "col ' . $flexClass . ' ' . get_sub_field('alignement').'">';

				elseif( get_row_layout() == 'titre_de_section' ):
					
					$title = do_shortcode(get_sub_field('titre')); 
					$width = get_sub_field('largeur_du_titre');

					if (!empty($title)): ?>
						<h2 class="title<?= $width > 0 ? ' flex-' . $width : ' full' ?>"><?= $title ?></h2>
					<?php endif;

				else:

					// check if template exist and call it
					get_template_file( 'templates/'.get_row_layout() );

					// todo systeme de log des erreurs...
					
					// to save bloc display
					if(isset($closeAfter)) $closeAfter--;
					if(isset($closeColAfter)) $closeColAfter--;

				endif;

				// to close div.row
				if(isset($closeAfter) && $closeAfter == 0){
						echo '</div>';
						unset($closeAfter);
				}

				if(isset($closeColAfter) && $closeColAfter == 0){
						echo '</div>';
						unset($closeColAfter);
				}

		endwhile;

		if(isset($closeAtEnd) && $closeAtEnd) {
			echo '</div>';
			unset($closeAtEnd);
		};

else : ?>
	<div class="row">
		<?php the_content(); ?>
	</div>   
<?php endif ?>

<?php if (!is_front_page()): ?>
	<section class="row">
		<h3>Ça vous interessera aussi</h3>
	</section>

	<section class="row">
		<h3>Actualités de la galerie</h3>
	</section>
<?php endif ?>