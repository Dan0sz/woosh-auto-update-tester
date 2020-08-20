<?php
/**
 * @package   WoOSH! Auto Update Tester
 * @author    Daan van den Bergh
 *            https://woosh.dev
 *            https://daan.dev
 * @copyright © 2020 Daan van den Bergh
 * @license   BY-NC-ND-4.0
 *            http://creativecommons.org/licenses/by-nc-nd/4.0/
 */

defined('ABSPATH') || exit;

class WooshAutoUpdateTester
{
    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        if (is_admin()) {
            $this->do_admin();
        }
    }

    private function do_admin()
    {
        return new WooshAutoUpdateTester_Admin();
    }
}
