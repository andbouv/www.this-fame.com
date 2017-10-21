<?
/*------------------------------------------------------------*\
    Bloquer l'admin
\*------------------------------------------------------------*/


add_action('admin_init', 'no_dashboard');
function no_dashboard() {
  if (!current_user_can('manage_options') && $_SERVER['DOING_AJAX'] != '/wp-admin/admin-ajax.php') {
  	wp_redirect(home_url()); exit;
  }
}

function my_function_admin_bar(){
   return false;
}

if (!current_user_can('manage_options')){
	add_filter( 'show_admin_bar' , 'my_function_admin_bar');
}