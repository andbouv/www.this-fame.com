<?

/*


$.ajax({
  type: "POST",
  url: "<? bloginfo('url'); ?>/wp-admin/admin-ajax.php",
  data: {
    'action':'do_action',
    'var_1': 0,
    'var_2': 'test'
  },
  success: function(resp){
    // ACTION IF SUCCESS
  },
  error: function(e){ alert('Erreur: ' + e); }
});

*/

add_action('wp_ajax_nopriv_do_action', 'actionFunc');
add_action('wp_ajax_do_action', 'actionFunc');


function actionFunc(){


    echo 'Success';
   die();
}
