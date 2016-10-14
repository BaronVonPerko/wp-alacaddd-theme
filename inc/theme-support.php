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
