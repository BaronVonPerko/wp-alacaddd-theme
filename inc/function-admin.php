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

  // Activate custom settings
  add_action('admin_init', 'perko_custom_settings');
}
add_action('admin_menu', 'perko_add_admin_page');

function perko_custom_settings() {
  register_setting('perko-settings-group', 'first_name');
  add_settings_section('perko-sidebar-options', 'Sidebar Options', 'perko_sidebar_options', 'perko_theme');
  add_settings_field('sidebar-name', 'First Name', 'perko_sidebar_name', 'perko_theme', 'perko-sidebar-options');
}

function perko_sidebar_options() {
  echo 'Customize your sidebar information';
}

function perko_sidebar_name() {
  $firstName = esc_attr(get_option('first_name'));
  echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name" />';
}

function perko_theme_create_page() {
  require_once(get_template_directory() . '/inc/templates/perko-admin.php');
}

function perko_theme_create_css_page() {
  echo '<h1>Perko Theme CSS Options</h1>';
}
