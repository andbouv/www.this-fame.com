<?
/*------------------------------------------------------------*\
    CREATION DE LOGSCUSTOM
\*------------------------------------------------------------*/

function customLogs($logs){
  $log          = '-----'.date("d/m/Y - H:i:s").'-----'."\n";
  $log         .= $logs."\n";
  $log         .= '-------------------------------'."\n";
  $log         .= "\n";
  $log         .= "\n";

  file_put_contents(get_template_directory().'/logs/log.txt', $log, FILE_APPEND);
}


add_filter('cron_schedules', 'cyb_cron_schedules');
function cyb_cron_schedules( $schedules ) {
   $schedules['monthly'] = array(
      'interval' => 2592000,
       'display' => __('monthly')
   );
   return $schedules;
}


if ( ! wp_next_scheduled( 'my_task_hook' ) ) {
  wp_schedule_event( time(), 'monthly', 'my_task_hook' );
}

add_action( 'my_task_hook', 'my_task_function' );

function my_task_function() {
  file_put_contents(get_template_directory().'/logs/log.txt', '');
}
