<h1>Perko Theme Options</h1>

<?php settings_errors(); ?>

<form action="options.php" method="post">
  <?php settings_fields('perko-settings-group'); ?>
  <?php do_settings_sections('perko_theme'); ?>
  <?php submit_button(); ?>
</form>
