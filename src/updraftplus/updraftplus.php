<?php
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action('plugins_loaded', function () {
  // Check if dependant plugin is active
  if (class_exists('UpdraftPlus')) :

    // remove top admin bar menu
    define('UPDRAFTPLUS_ADMINBAR_DISABLE', true);

  // If dependant plugin is not active, show admin notice
  elseif ( current_user_can( 'activate_plugins' ) ) :

    add_action( 'admin_notices', function () {
      $dependant_plugin = 'UpdraftPlus';
      echo '<div class="notice notice-error is-dismissible"><p>The <strong>Plugin Modifications</strong> plugin is trying to modify <strong>'. $dependant_plugin .'</strong>, but <strong>'. $dependant_plugin .'</strong> is either deactivated or not installed.</p></div>';
    });

  endif;
});  