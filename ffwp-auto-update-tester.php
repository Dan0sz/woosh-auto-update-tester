<?php
/**
 * @formatter:off
 * Plugin Name: FFWP Auto Update Tester
 * Description: A plugin which makes it easier to test automatic updates for Easy Digital Downloads Software Licensing.
 * Version: 1.0.2
 * Author: Daan van den Bergh
 * Author URI: https://ffwp.dev
 * Text Domain: ffwp-auto-update-tester
 * @formatter:on
 */

/**
 * Define constants.
 */
define('FFWP_AUTO_UPDATE_TESTER_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('FFWP_AUTO_UPDATE_TESTER_PLUGIN_FILE', __FILE__);

/**
 * Takes care of loading classes on demand.
 *
 * @param $class
 *
 * @return mixed|void
 */
function ffwp_auto_update_tester_autoload($class)
{
    $path = explode('_', $class);

    if ($path[0] != 'FfwpAutoUpdateTester') {
        return;
    }

    if (!class_exists('FFWP_Autoloader')) {
        require_once(FFWP_AUTO_UPDATE_TESTER_PLUGIN_DIR . 'ffwp-autoload.php');
    }

    $autoload = new FFWP_Autoloader($class);

    return include FFWP_AUTO_UPDATE_TESTER_PLUGIN_DIR . 'includes/' . $autoload->load();
}

spl_autoload_register('ffwp_auto_update_tester_autoload');

/**
* @return FfwpAutoUpdateTester
 */
function ffwp_auto_update_tester_init()
{
    static $wlm = null;

    if ($wlm === null) {
        $wlm = new FfwpAutoUpdateTester();
    }

    return $wlm;
}

ffwp_auto_update_tester_init();
