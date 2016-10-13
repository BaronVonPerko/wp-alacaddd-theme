<?php

/*
  ADMIN ENQUEUE FUNCTIONS
*/

function perko_load_admin_scripts($hook) {
  if($hook != 'toplevel_page_perko_theme') return;

  wp_register_style(  'perko_admin',
                      get_template_directory_uri() . '/css/perko.admin.css',
                      array(),
                      '1.0.0',
                      'all');
  wp_enqueue_style('perko_admin');

  wp_enqueue_media(); // This is necessary for the media uploader

  wp_register_script( 'perko-admin-script',
                        get_template_directory_uri() . '/js/perko.admin.js',
                        array('jquery'),
                        '1.0.0');
  wp_enqueue_script('perko-admin-script');
}
add_action('admin_enqueue_scripts', 'perko_load_admin_scripts');
