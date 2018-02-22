<?
/*------------------------------------------------------------*\
    Gestion des scripts et css
\*------------------------------------------------------------*/


function theme_scripts() {
    wp_enqueue_style('style-name', get_stylesheet_uri());

    if ($is_IE){ wp_enqueue_script( 'script-ie', get_template_directory_uri() . '/js/html5shiv.js' ); }


    wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');
    wp_enqueue_style( 'googleFonts');

    wp_register_script('jquery2','https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js');
    wp_enqueue_script('jquery2');

    wp_register_script('scroll','https://unpkg.com/scrollreveal/dist/scrollreveal.min.js');
    wp_enqueue_script('scroll');

    wp_enqueue_style( 'styleSlick', get_template_directory_uri() . '/css/slick.css');

    wp_enqueue_style( 'styleSound', get_template_directory_uri() . '/css/jsound.min.css');

    wp_enqueue_script( 'styleSlick', get_template_directory_uri() . '/js/jsound.min.js');

    wp_enqueue_script( 'styleSlick', get_template_directory_uri() . '/css/slick.js');

    wp_enqueue_script('JSinfinite', get_template_directory_uri() . '/js/jquery.jscroll.js');

    wp_register_script('jquerymasonry','https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js');
    wp_enqueue_script('jquerymasonry');

    wp_register_script('jsScroll','https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.js');
    wp_enqueue_script('jsScroll');


   // wp_enqueue_script('JSglobal', get_template_directory_uri() . '/js/global.js');
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );



/*------------------------------------------------------------*\
    Intégration des icones wp
\*------------------------------------------------------------*/

// &:before {
// 	font-family: "dashicons";
// 	content: "\f305";
// }
// https://developer.wordpress.org/resource/dashicons/


//add_action( 'wp_enqueue_scripts', 'themename_scripts' );
function themename_scripts() {
    wp_enqueue_style( 'themename-style', get_stylesheet_uri(), array( 'dashicons' ), '1.0' );
}
