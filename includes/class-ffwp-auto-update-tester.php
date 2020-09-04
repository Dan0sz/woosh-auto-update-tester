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

class FfwpAutoUpdateTester
{
    /**
     * FfwpAutoUpdateTester constructor.
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     *
     */
    private function init()
    {
        if (is_admin()) {
            $this->do_admin();
        }
    }

    /**
     * @return FfwpAutoUpdateTester_Admin
     */
    private function do_admin()
    {
        return new FfwpAutoUpdateTester_Admin();
    }
}
