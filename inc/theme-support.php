<?php

/*
  Theme Support
*/


$options = get_option('post_formats');
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$selectedPostFormats = array();
foreach($formats as $format) {
  $selectedPostFormats[] = ($options[$format] == 1 ? $format : '');
}


if(!empty($selectedPostFormats)) {
  add_theme_support('post-formats', $selectedPostFormats);
}

$header = get_option('custom_header');
if($header == 1) {
  add_theme_support('custom-header');
}

$background = get_option('custom_background');
if($background == 1) {
  add_theme_support('custom-background');
}
