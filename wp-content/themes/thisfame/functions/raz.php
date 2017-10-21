<?
/*------------------------------------------------------------*\
  Activation des modules wordpress
\*------------------------------------------------------------*/


//GESTION ARRIERE PLAN
//add_theme_support( 'custom-background', array('default-color' => 'f1f1f1',) );

// AJOUT AUTOMATIQUE DU RSS
//add_theme_support( 'automatic-feed-links' );

// GESTION DU STYLE DEPUIS L'INTERFACE D'ADMINISTRATION
//add_editor_style();

// ACTIVATION DES MENUS
add_theme_support('menus');
register_nav_menus(array(
  'menu-principal' => 'Navigation principale',
  'menu-secondaire' => 'Navigation secondaire'
));

// GESTION DES GALERIES DANS LES ARTICLES
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

// GESTION DES MINIATURES DANS LES ARTICLES
add_theme_support( 'post-thumbnails' );

// GESTION DE LA SIDEBAR DANS L'ONGLET WIDGETS
register_sidebar(array(
  'name' => __( 'Sidebar' ),
  'id' => 'sidebar',
  'description' => __( 'Élements présents dans la barre de gauche' )
));


// SUPPRESION DU ?ver=XXX DES RESSOURCES JS ET CSS
function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


// SUPPRESION DES EMOJI + FEED + STYLE COMMENTAIRE

function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );


remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

// SUPPRESION DES ACCENTS DANS LES MEDIAS
add_filter('sanitize_file_name', 'remove_accents' );

