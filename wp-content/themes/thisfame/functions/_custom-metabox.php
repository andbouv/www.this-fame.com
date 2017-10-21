<?
/*------------------------------------------------------------*\
    Supprimer le dashboard si pas dmin
\*------------------------------------------------------------*/


add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
    //remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    //remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    //remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    //remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
    remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'side' ); // WPML
    remove_meta_box( 'ab_widget', 'dashboard', 'normal' ); // Antispam Bee
    wp_add_dashboard_widget('custom_help_widget', 'Bienvenue', 'custom_dashboard_help');
}
function custom_dashboard_help() {
    echo '<p>Ceci est votre espace d\'administration ! Si vous avez besoin d\'aide à la soumission d\'un article, n\'hésitez pas à consulter le support technique.</p>';
}
