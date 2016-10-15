<?php


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

function perko_custom_header() {
  $option = get_option('custom_header');
  $checked = ($option == 1 ? 'checked' : '');
  echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'/>Activate Custom Header</label>';
}

function perko_custom_background() {
  $option = get_option('custom_background');
  $checked = ($option == 1 ? 'checked' : '');
  echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'/>Activate Custom Background</label>';
}
