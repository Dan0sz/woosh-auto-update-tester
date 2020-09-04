<?php
/**
 * @package   FFWP Auto Update Tester
 * @author    Daan van den Bergh
 *            https://ffwp.dev
 *            https://daan.dev
 * @copyright © 2020 Daan van den Bergh
 * @license   BY-NC-ND-4.0
 *            http://creativecommons.org/licenses/by-nc-nd/4.0/
 */

defined('ABSPATH') || exit;

class FfwpAutoUpdateTester_Admin
{
    /** @var string $plugin_text_domain */
    private $plugin_text_domain = 'ffwp-auto-update-tester';

    /**
     * WooshAutoUpdateTester_Admin constructor.
     */
    public function __construct()
    {
        add_filter('ffwp_license_manager_licenses', [$this, 'do_license_field'], 10, 1);
        add_filter('ffwp_license_manager_api_url', function () { return 'http://daan.local'; }, 10, 1);
    }

    /**
     * @param $licenses
     *
     * @return array
     */
    public function do_license_field($licenses)
    {
        $licenses[] = [
            'id'          => 4685,
            'label'       => __('FFWP Auto Update Tester', $this->plugin_text_domain),
            'plugin_file' => FFWP_AUTO_UPDATE_TESTER_PLUGIN_FILE
        ];

        return $licenses;
    }
}
