<?
/*------------------------------------------------------------*\
    Customisation de la css
\*------------------------------------------------------------*/

add_action('admin_head', 'my_custom_backstyle');

function my_custom_backstyle() {
  ?>
  <style>
    .warning.notice-warning.notice.otgs-notice{
      /*display: none !important;*/
    }
    #adminmenuwrap #adminmenu #menu-comments{ display:none; }
    #wp-admin-bar-comments{ display: none;}
  </style>
  <?
}
