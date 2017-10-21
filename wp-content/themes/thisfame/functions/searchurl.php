<?
// CHANGEMENT DE l'URL DE RECHERCHE par http://xxxxx/rechercher/

function fb_change_search_url_rewrite() {
  if ( !empty( $_GET['s'] ) ) {
    wp_redirect( home_url( "/rechercher/" ) );
    exit();
  }
}
add_action( 'template_redirect', 'fb_change_search_url_rewrite' );

function prefix_url_rewrite_templates() {
  $current_url = $_SERVER['REQUEST_URI'];
  $current_url = explode('page', $current_url);
  $current_url = explode('?', $current_url[0]);

  if($current_url[0] == '/rechercher/'){

    // CHANGER LE TITRE
    add_filter( 'wp_title', 'replace_title', 10, 2 );
    function replace_title() {
       return 'Rechercher';
    }

    // GARGER LE TEMPLATE
    add_filter( 'template_include', function() {
      return get_template_directory() . '/search.php';
    });

    // RENVOYER CODE 200
    status_header( 200 );

    // SUPPRESION DE LA MISE EN 404 DE LA LOOP
    global $wp_query;
    $wp_query->is_404 = false;

    // SURCHARGE DE LA CLASSE DE BODY
    add_filter( 'body_class', 'extra_body_class' );
    function extra_body_class( $classes ) {
      $classes[] = 'rechercher';
      return $classes;
   }
  }
}

add_action( 'template_redirect', 'prefix_url_rewrite_templates' );

?>
