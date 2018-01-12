<?php
/*
 * Plugin Name: Frazier Quarry Plugin Modifications
 * Description: Modify or extend plugins used for frazierquarry.com.
 * Author: eSaner
 * Version: 0.1.0
 * Author URI: http://esaner.com
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load all files in includes with naming pattern /includes/file-name/file-name.php
$dir_names = glob(__DIR__ . '/src/*' , GLOB_ONLYDIR);
foreach ( $dir_names as $dir ) :
  $name = basename($dir);
  require $dir . '/' . $name . '.php';
endforeach;