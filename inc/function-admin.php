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
  add_submenu_page('perko_theme', 'Perko Sidebar Options', 'Sidebar', 'manage_options', 'perko_theme', 'perko_theme_create_page');
  add_submenu_page('perko_theme', 'Perko Theme Options', 'Theme Options', 'manage_options', 'perko_theme_options', 'perko_theme_create_options_page');
  add_submenu_page('perko_theme', 'Perko CSS Options', 'CSS Options', 'manage_options', 'perko_theme_css', 'perko_theme_create_css_page');

  // Activate custom settings
  add_action('admin_init', 'perko_custom_settings');
}
add_action('admin_menu', 'perko_add_admin_page');

function perko_custom_settings() {
  register_setting('perko-settings-group', 'profile_picture');
  register_setting('perko-settings-group', 'first_name');
  register_setting('perko-settings-group', 'last_name');
  register_setting('perko-settings-group', 'bio');
  register_setting('perko-settings-group', 'twitter', 'perko_sanitize_twitter');
  register_setting('perko-settings-group', 'facebook');

  add_settings_section('perko-sidebar-options', 'Sidebar Options', 'perko_sidebar_options', 'perko_theme');

  add_settings_field('sidebar-profile-picture', 'Profile Picture', 'perko_sidebar_profile', 'perko_theme', 'perko-sidebar-options');
  add_settings_field('sidebar-name', 'Name', 'perko_sidebar_name', 'perko_theme', 'perko-sidebar-options');
  add_settings_field('sidebar-bio', 'Bio', 'perko_sidebar_bio', 'perko_theme', 'perko-sidebar-options');
  add_settings_field('sidebar-twitter', 'Twitter', 'perko_sidebar_twitter', 'perko_theme', 'perko-sidebar-options');
  add_settings_field('sidebar-facebook', 'Facebook', 'perko_sidebar_facebook', 'perko_theme', 'perko-sidebar-options');


  // Theme Support Options
  register_setting('perko-theme-support', 'post_formats', 'perko_post_formats_callback');
  add_settings_section('perko-theme-options', 'Theme Options', 'perko_theme_options_create', 'perko_theme_options');
  add_settings_field('post-formats', 'Post Formats', 'perko_post_formats', 'perko_theme_options', 'perko-theme-options');
}

// Callback Functions
function perko_post_formats_callback($val) {
  return $val;
}

function perko_sanitize_twitter($val) {
  $val = sanitize_text_field($val);
  $val = str_replace('@', '', $val);
  return $val;
}


// Generate Sidebar
function perko_sidebar_options() {
  echo 'Customize your sidebar information';
}

function perko_sidebar_profile() {
  $profilePicture = esc_attr(get_option('profile_picture'));
  echo '<input type="button" value="Upload Profile Picture" id="btnUpload" class="button button-secondary" />';
  echo '<input type="hidden" name="profile_picture" value="' . $profilePicture . '" id="profile-picture" />';
}

function perko_sidebar_name() {
  $firstName = esc_attr(get_option('first_name'));
  $lastName = esc_attr(get_option('last_name'));
  echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name" />';
  echo '<input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name" />';
}

function perko_sidebar_bio() {
  $bio = esc_attr(get_option('bio'));
  echo '<input class="regular-text" type="text" name="bio" value="' . $bio . '" placeholder="Short Bio" />';
}

function perko_sidebar_twitter() {
  $twitter = esc_attr(get_option('twitter'));
  echo '<input type="text" name="twitter" value="' . $twitter . '" placeholder="Twitter" />';
  echo '<p class="description">Input your Twitter handle without the @ character.</p>';
}

function perko_sidebar_facebook() {
  $facebook = esc_attr(get_option('facebook'));
  echo '<input type="text" name="facebook" value="' . $facebook . '" placeholder="Facebook" />';
}

// Generate for Theme Options
function perko_theme_options_create() {
  echo 'Activate and deactivate specific theme support options.';
}

function perko_post_formats() {
  $options = get_option('post_formats');
  $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
  $output = '';
  foreach($formats as $format) {
    $checked = ($options[$format] == 1 ? 'checked' : '');
    $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' />'.$format.'</label><br/>';
  }
  echo $output;
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
