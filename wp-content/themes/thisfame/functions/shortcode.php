<?
add_shortcode( 'btn', 'btn_func' );
function btn_func( $atts, $content = null ) {
   return '<span class="btn">' . $content . '</div>';
}

?>
