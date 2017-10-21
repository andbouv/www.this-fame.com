<?
/*------------------------------------------------------------*\
	Ajout de nouvelles tailles de vignettes
\*------------------------------------------------------------*/

if (function_exists('add_image_size')) {
	set_post_thumbnail_size(250, 250, true);

   add_image_size('vignette-actu', 700, 200, true); // utilisation : the_post_thumbnail('vignette-actu');
}
