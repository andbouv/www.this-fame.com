<?
/*
Activation de la traduction.
Mettre les .mo et .po dans un dossier languages du theme

Utilisation : <? _e('Lire la suite' , $_GLOBAL['theme']); ?>
*/
function theme_name_setup(){
  $theme = get_template_directory();
  $theme = explode('/', $theme);
  $theme = $theme[(count($theme)-1)];
  $_GLOBAL['theme'] = $theme;
	load_theme_textdomain( $theme, trailingslashit( WP_LANG_DIR ) . $theme );
	load_theme_textdomain( $theme, get_stylesheet_directory() . '/languages' );
	load_theme_textdomain( $theme, get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'theme_name_setup' );
