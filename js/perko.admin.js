jQuery(document).ready(function($) {
  var mediaUploader;

  $('#btnUpload').on('click', function(e) {
    e.preventDefault();
    if(mediaUploader) {
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_file = wp.media({
      title: 'Choose a Profile Picture',
      button: {
        text: 'Choose Picture'
      },
      multiple: false
    });

    mediaUploader.on('select', function() {
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#profile-picture').val(attachment.url);

      $('#profile-picture-preview').css('background-image', 'url('+attachment.url+')');
    });

    mediaUploader.open();
  });
});
