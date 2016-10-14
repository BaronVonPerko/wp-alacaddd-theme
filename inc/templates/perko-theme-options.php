<h1>Perko Theme Options</h1>

<?php settings_errors(); ?>


<form action="options.php" method="post" class="perko-general-form">
  <?php settings_fields('perko-theme-support'); ?>
  <?php do_settings_sections('perko_theme_options'); ?>
  <?php submit_button(); ?>
</form>
