<?php

/*
  ADMIN PAGE
*/


function perko_add_admin_page() {

  // Generate Perko Theme Admin page
  add_menu_page('Perko Theme Options',
                'Perko Theme',                  // menu text
                'manage_options',               // permissions level
                'perko_theme',                  // slug for options page
                'perko_theme_create_page',      // function to call to create the page
                'dashicons-admin-customizer',   // custom icon uri or font icons
                110);                           // location in menu

  // Generate Perko Theme Admin sub-pages
  add_submenu_page('perko_theme',                 // parent slug
                   'Perko Theme Options',         // name
                   'Settings',                    // menu title
                   'manage_options',              // permissions level
                   'perko_theme',                 // subpage slug
                   'perko_theme_create_page');    // function to generate the page

  add_submenu_page('perko_theme',
                   'Perko CSS Options',
                   'CSS Options',
                   'manage_options',
                   'perko_theme_css',
                   'perko_theme_create_css_page');
}
add_action('admin_menu', 'perko_add_admin_page');


function perko_theme_create_page() {
  echo '<h1>Perko Theme Settings</h1>';
}

function perko_theme_create_css_page() {
  echo '<h1>Perko Theme CSS Options</h1>';
}
