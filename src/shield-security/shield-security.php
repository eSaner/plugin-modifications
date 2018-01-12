<?php

add_action('plugins_loaded', function () {
  // Check if dependant plugin is active
  if (class_exists('ICWP_Wordpress_Simple_Firewall')) :

    add_action('admin_enqueue_scripts', function () {
      wp_register_style('shield-admin-style', plugins_url('shield-admin-style.css', __FILE__), false, '0.1.1');
      wp_enqueue_style('shield-admin-style');
    });

  // If dependant plugin is not active, show admin notice
  elseif ( current_user_can( 'activate_plugins' ) ) :

    add_action( 'admin_notices', function () {
      $dependant_plugin = 'Shield Security';
      echo '<div class="notice notice-error is-dismissible"><p>The <strong>Plugin Modifications</strong> plugin is trying to modify <strong>'. $dependant_plugin .'</strong>, but <strong>'. $dependant_plugin .'</strong> is either deactivated or not installed.</p></div>';
    });

  endif;
});  


