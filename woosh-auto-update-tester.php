<?php
/**
 * @formatter:off
 * Plugin Name: WoOSH! Auto Update Tester
 * Description: A plugin which makes it easier to test automatic updates for Easy Digital Downloads Software Licensing.
 * Version: 1.0.0
 * Author: Daan van den Bergh
 * Author URI: https://daan.dev
 * Text Domain: woosh-auto-update-tester
 * @formatter:on
 */

/**
 * Define constants.
 */
define('WOOSH_AUTO_UPDATE_TESTER_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WOOSH_AUTO_UPDATE_TESTER_PLUGIN_FILE', __FILE__);
define('WOOSH_AUTO_UPDATE_TESTER_PLUGIN_VERSION', '1.0.0');

/**
 * Takes care of loading classes on demand.
 *
 * @param $class
 *
 * @return mixed|void
 */
function woosh_auto_update_tester_autoload($class)
{
    $path = explode('_', $class);

    if ($path[0] != 'WooshAutoUpdateTester') {
        return;
    }

    if (!class_exists('Woosh_Autoloader')) {
        require_once(WOOSH_AUTO_UPDATE_TESTER_PLUGIN_DIR . 'woosh-autoload.php');
    }

    $autoload = new Woosh_Autoloader($class);

    return include WOOSH_AUTO_UPDATE_TESTER_PLUGIN_DIR . 'includes/' . $autoload->load();
}

spl_autoload_register('woosh_auto_update_tester_autoload');

/**
* @return WooshAutoUpdateTester
 */
function woosh_auto_update_tester_init()
{
    static $wlm = null;

    if ($wlm === null) {
        $wlm = new WooshAutoUpdateTester();
    }

    return $wlm;
}

woosh_auto_update_tester_init();
