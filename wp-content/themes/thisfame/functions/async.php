<?

add_filter( 'script_loader_tag', 'add_async', 10, 2 );
function add_async( $tag, $handle ) {
    return str_replace( ' src', ' async src', $tag );
}
