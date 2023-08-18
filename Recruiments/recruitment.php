<?php
/*
 * Plugin Name:       Al Rhal recruiments
 * Description:       Custom Plugin to handle recruiment process.
 * Version:           1.0
 * Author:            Ahmed Hany
 * Author URI:        https://author.example.com/
 * Text Domain:       alrahal
 * Domain Path:       /languages
 */

 if( ! defined("ABSPATH") ) {
	exit();
}
 
require_once 'core/shortcodes.php';
require_once 'core/recruiments.php';
require_once 'core/wocommercecustom.php';
require_once 'core/employee.php';
require_once 'core/handlerequest.php';
require_once 'core/pluginini.php';




$recruiments = new recruiments();
$employee = new employee();
$handlerequest = new handlerequest($recruiments,$employee);

$shortcodes = new shortcodes($recruiments,$employee,$handlerequest);

$pluginini  = new pluginini($recruiments,$employee,$handlerequest);
$woocommerce_custom = new wocommercecustom($recruiments,$employee,$handlerequest);
