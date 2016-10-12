<?php

/*
  ADMIN ENQUEUE FUNCTIONS
*/

function perko_load_admin_scripts($hook) {
  if($hook != 'toplevel_page_perko_theme') return;

  wp_register_style(  'perko_admin',
                      get_template_directory_uri() . '/css/perko.admin.css',
                      array(), '1.0.0', 'all');
  wp_enqueue_style('perko_admin');
}
add_action('admin_enqueue_scripts', 'perko_load_admin_scripts');
