<h1>Perko Theme Options</h1>

<?php settings_errors(); ?>

<?php
  $firstName = esc_attr(get_option('first_name'));
  $lastName = esc_attr(get_option('last_name'));
  $fullName = $firstName . ' ' . $lastName;
  $bio = esc_attr(get_option('bio'));
 ?>

<div class="perko-sidebar-preview">
  <div class="perko-sidebar">
    <h1 class="perko-username"><?php print $fullName ?></h1>
    <h2 class="perko-bio"><?php print $bio ?></h2>
    <div class="icons-wrapper">
      <!-- todo -->
    </div>
  </div>
</div>

<form action="options.php" method="post" class="perko-general-form">
  <?php settings_fields('perko-settings-group'); ?>
  <?php do_settings_sections('perko_theme'); ?>
  <?php submit_button(); ?>
</form>
