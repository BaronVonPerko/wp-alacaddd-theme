<?php

/*
  ADMIN PAGE
*/


function perko_add_admin_page() {
  add_menu_page('Perko Theme Options',
                'Perko Theme',                  // menu text
                'manage_options',               // permissions level
                'perko-theme',                  // slug for options page
                'perko_theme_create_page',      // function to call to create the page
                'dashicons-admin-customizer',   // custom icon uri or font icons
                110);                           // location in menu
}
add_action('admin_menu', 'perko_add_admin_page');


function perko_theme_create_page() {
  echo '<h1>Perko Theme Options</h1>';
}
