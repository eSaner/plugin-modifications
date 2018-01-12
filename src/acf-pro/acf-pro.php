<?php
 
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Check if dependant plugin is active
if (class_exists('acf')) :

  /**
   * Define ACF JSON Directory
   *
   * @see https://www.advancedcustomfields.com/resources/local-json/
   */

  // ACF JSON Save Path
  add_filter('acf/settings/save_json', function ( $path ) {
    
    // update path
    $path = __DIR__ . '/acf-json';

    return $path;  
  });

  // ACF JSON Load Path
  add_filter('acf/settings/load_json', function ( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    // append path
    $paths[] = __DIR__ . '/acf-json';

    return $paths;
  });

// If dependant plugin is not active, show admin notice
else : 
  add_action('plugins_loaded', function () {

    if ( current_user_can( 'activate_plugins' ) ) :

      add_action( 'admin_notices', function () {
        $dependant_plugin = 'Advanced Custom Fields Pro';
        echo '<div class="notice notice-error is-dismissible"><p>The <strong>Plugin Modifications</strong> plugin is trying to modify <strong>'. $dependant_plugin .'</strong>, but <strong>'. $dependant_plugin .'</strong> is either deactivated or not installed.</p></div>';
      });

    endif;
  });

endif;
  