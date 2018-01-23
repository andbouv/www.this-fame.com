<?
add_filter('posts_orderby', 'group_by_post_type', 10, 2);
function group_by_post_type($orderby, $query) {
    global $wpdb;
    if ($query->is_search) {
        return $wpdb->posts . '.post_type DESC';
    }
    // provide a default fallback return if the above condition is not true
    return $orderby;
}
