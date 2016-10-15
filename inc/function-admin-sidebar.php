<?php


// Generate Sidebar
function perko_sidebar_options() {
  echo 'Customize your sidebar information';
}

function perko_sidebar_profile() {
  $profilePicture = esc_attr(get_option('profile_picture'));

  if(empty($profilePicture)) {
    echo '<input type="button" value="Upload Profile Picture" id="btnUpload" class="button button-secondary" />';
    echo '<input type="hidden" name="profile_picture" value="" id="profile-picture" />';
  } else {
    echo '<input type="button" value="Replace Profile Picture" id="btnUpload" class="button button-secondary" />';
    echo '<input type="button" class="button button-secondary" value="Remove" id="remove-picture" />';
    echo '<input type="hidden" name="profile_picture" value="' . $profilePicture . '" id="profile-picture" />';
  }
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

// Social Networking Section

function perko_sidebar_social() {
  echo 'Customize your social network account information.';
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

function perko_sidebar_google() {
  $google = esc_attr(get_option('google'));
  echo '<input type="text" name="google" value="'.$google.'" placeholder="Google" />';
}
