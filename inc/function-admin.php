<?php

/*
  ADMIN PAGE
*/

require get_template_directory() . '/inc/function-admin-sidebar.php';
require get_template_directory() . '/inc/function-admin-theme-options.php';


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
  add_submenu_page('perko_theme', 'Perko Sidebar Options', 'Sidebar', 'manage_options', 'perko_theme', 'perko_theme_create_page');
  add_submenu_page('perko_theme', 'Perko Theme Options', 'Theme Options', 'manage_options', 'perko_theme_options', 'perko_theme_create_options_page');
  add_submenu_page('perko_theme', 'Perko CSS Options', 'CSS Options', 'manage_options', 'perko_theme_css', 'perko_theme_create_css_page');

  // Activate custom settings
  add_action('admin_init', 'perko_custom_settings');
}
add_action('admin_menu', 'perko_add_admin_page');

function perko_custom_settings() {
  // Sidebar Options
  register_setting('perko-settings-group', 'profile_picture');
  register_setting('perko-settings-group', 'first_name');
  register_setting('perko-settings-group', 'last_name');
  register_setting('perko-settings-group', 'bio');
  register_setting('perko-settings-group', 'twitter', 'perko_sanitize_twitter');
  register_setting('perko-settings-group', 'facebook');
  register_setting('perko-settings-group', 'google');

  add_settings_section('perko-sidebar-options', 'Sidebar Options', 'perko_sidebar_options', 'perko_theme');

  add_settings_field('sidebar-profile-picture', 'Profile Picture', 'perko_sidebar_profile', 'perko_theme', 'perko-sidebar-options');
  add_settings_field('sidebar-name', 'Name', 'perko_sidebar_name', 'perko_theme', 'perko-sidebar-options');
  add_settings_field('sidebar-bio', 'Bio', 'perko_sidebar_bio', 'perko_theme', 'perko-sidebar-options');

  add_settings_section('perko-sidebar-social', 'Social Media', 'perko_sidebar_social', 'perko_social');

  add_settings_field('sidebar-twitter', 'Twitter', 'perko_sidebar_twitter', 'perko_social', 'perko-sidebar-social');
  add_settings_field('sidebar-facebook', 'Facebook', 'perko_sidebar_facebook', 'perko_social', 'perko-sidebar-social');
  add_settings_field('sidebar-google', 'Google+', 'perko_sidebar_google', 'perko_social', 'perko-sidebar-social');

  // Theme Support Options
  register_setting('perko-theme-support', 'post_formats');
  register_setting('perko-theme-support', 'custom_header');
  register_setting('perko-theme-support', 'custom_background');
  add_settings_section('perko-theme-options', 'Theme Options', 'perko_theme_options_create', 'perko_theme_options');
  add_settings_field('post-formats', 'Post Formats', 'perko_post_formats', 'perko_theme_options', 'perko-theme-options');
  add_settings_field('custom-header', 'Custom Header', 'perko_custom_header', 'perko_theme_options', 'perko-theme-options');
  add_settings_field('custom-background', 'Custom Background', 'perko_custom_background', 'perko_theme_options', 'perko-theme-options');
}

// Callback Functions
function perko_sanitize_twitter($val) {
  $val = sanitize_text_field($val);
  $val = str_replace('@', '', $val);
  return $val;
}

// Build Admin Sub Pages
function perko_theme_create_page() {
  require_once(get_template_directory() . '/inc/templates/perko-admin.php');
}

function perko_theme_create_css_page() {
  echo '<h1>Perko Theme CSS Options</h1>';
}

function perko_theme_create_options_page() {
  require_once(get_template_directory() . '/inc/templates/perko-theme-options.php');
}
